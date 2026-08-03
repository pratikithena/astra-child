<?php
/**
 * Plugin Name: ITH - Media Manager
 * Description: Manage Unattached, Attached, Duplicates, Hash Duplicates, Largest Files and Trashed images with bulk actions, correct sorting and CSV export.
 * Version: 5.2.0
 * Author: ITH
 */

if (!defined('ABSPATH')) exit;

if (!class_exists('WP_List_Table')) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

/* ======================================================
MENU
====================================================== */

add_action('admin_menu', function () {

    add_submenu_page(
        'upload.php',
        'ITH - Media Manager',
        'ITH - Media Manager',
        'manage_options',
        'ith-media-manager',
        'ith_mm_admin_page'
    );

});

/* ======================================================
HELPERS
====================================================== */

function ith_mm_get_all_images(){

    $args = [
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'post_status' => ['inherit','trash'],
        'posts_per_page' => -1
    ];

    $query = new WP_Query($args);

    $items = [];

    foreach($query->posts as $post){

        $file = get_attached_file($post->ID);

        $size = ($file && file_exists($file)) ? filesize($file) : 0;

        $hash = ($file && file_exists($file)) ? md5_file($file) : '';

        $items[] = [
            'post'=>$post,
            'file'=>$file,
            'size'=>$size,
            'hash'=>$hash,
            'name'=>basename($file)
        ];
    }

    return $items;
}


function ith_mm_filter_tab($items,$tab){

    $result=[];

    foreach($items as $i){

        $p = $i['post'];

        if($tab === 'trash'){
            if($p->post_status === 'trash'){
                $result[] = $i;
            }
            continue;
        }

        if($p->post_status === 'trash'){
            continue;
        }

        if($tab === 'largest'){
            if($i['size'] >= 1024 * 1024){
                $result[] = $i;
            }
            continue;
        }

        if($tab==='attached' && $p->post_parent>0){
            $result[]=$i;
            continue;
        }

        if($tab==='unattached' && $p->post_parent==0){
            $result[]=$i;
            continue;
        }

    }

    if($tab==='duplicates'){

        $map=[];

        foreach($items as $i){

            if($i['post']->post_status === 'trash') continue;

            $map[$i['name']][]=$i;

        }

        foreach($map as $list){

            if(count($list)>1){

                foreach($list as $i){
                    $result[]=$i;
                }

            }

        }

    }

    if($tab==='hash_duplicates'){

        $map=[];

        foreach($items as $i){

            if($i['post']->post_status === 'trash') continue;

            if(!$i['hash']) continue;

            $map[$i['hash']][]=$i;

        }

        foreach($map as $list){

            if(count($list)>1){

                foreach($list as $i){
                    $result[]=$i;
                }

            }

        }

    }

    return $result;
}

/* ======================================================
SINGLE TRASH ACTION
====================================================== */

add_action('admin_init','ith_mm_single_trash');

function ith_mm_single_trash(){

    if(!isset($_GET['ith_single_trash'])) return;

    if(!current_user_can('manage_options')) return;

    if(!isset($_GET['_wpnonce']) || !wp_verify_nonce($_GET['_wpnonce'],'ith_single_trash')) return;

    $id=intval($_GET['ith_single_trash']);

    if($id){
        wp_trash_post($id);
    }

    wp_redirect(admin_url('upload.php?page=ith-media-manager'));
    exit;

}

/* ======================================================
CSV EXPORT
====================================================== */

add_action('admin_init','ith_mm_export_csv');

function ith_mm_export_csv(){

    if(!isset($_GET['ith_export'])) return;

    if(!current_user_can('manage_options')) return;

    if(!isset($_GET['_wpnonce']) || !wp_verify_nonce($_GET['_wpnonce'],'ith_mm_export')) return;

    $tab = sanitize_text_field($_GET['tab'] ?? 'unattached');

    $items = ith_mm_get_all_images();
    $items = ith_mm_filter_tab($items,$tab);

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename=ith-media-'.$tab.'-'.date('Y-m-d').'.csv');

    $output=fopen('php://output','w');

    fputcsv($output,['ID','Attached To','Size','Title','Upload Date','Author','Status','URL']);

    foreach($items as $row){

        $p=$row['post'];

        fputcsv($output,[

            $p->ID,
            $p->post_parent?get_the_title($p->post_parent):'',
            size_format($row['size'],2),
            $p->post_title,
            $p->post_date,
            get_the_author_meta('display_name',$p->post_author),
            $p->post_status,
            wp_get_attachment_url($p->ID)

        ]);

    }

    fclose($output);

    exit;

}

/* ======================================================
TABLE
====================================================== */

class ITH_MM_Table extends WP_List_Table{

    private $tab;
    private $per_page;

    public function __construct($tab,$per_page){

        parent::__construct([
            'singular'=>'image',
            'plural'=>'images',
            'ajax'=>false
        ]);

        $this->tab=$tab;
        $this->per_page=$per_page;

    }

    public function get_columns(){

        return [
            'cb'=>'<input type="checkbox"/>',
            'id'=>'ID',
            'attached_to'=>'Attached To',
            'thumbnail'=>'Thumbnail',
            'size'=>'Size',
            'title'=>'Title',
            'date'=>'Upload Date',
            'author'=>'Author',
            'status'=>'Status',
            'view'=>'View'
        ];
    }

    protected function get_sortable_columns(){

        return [
            'title'=>['title',false],
            'date'=>['date',true],
            'size'=>['size',false]
        ];
    }

    protected function column_cb($item){

        return '<input type="checkbox" name="image_ids[]" value="'.$item['post']->ID.'"/>';

    }

    protected function column_default($item,$column){

        $p=$item['post'];

        switch($column){

            case 'id':

                $edit = admin_url("post.php?post={$p->ID}&action=edit");

                $html='<a href="'.esc_url($edit).'" target="_blank">'.$p->ID.'</a>';

                if($p->post_status!=='trash'){

                    $trash=wp_nonce_url(
                        admin_url('upload.php?page=ith-media-manager&ith_single_trash='.$p->ID),
                        'ith_single_trash'
                    );

                    $html.='<br><a style="color:#b32d2e;font-size:11px;" href="'.esc_url($trash).'">Move to Trash</a>';

                }

                return $html;

            case 'attached_to':

                if($p->post_parent){

                    $title = get_the_title($p->post_parent);
                    $edit  = admin_url("post.php?post={$p->post_parent}&action=edit");

                    return '<a href="'.esc_url($edit).'" target="_blank">'.esc_html($title).'</a>';

                }

                return '—';

            case 'thumbnail':
                return wp_get_attachment_image($p->ID,[60,60]);

            case 'size':
                return size_format($item['size'],2);

            case 'title':
                return esc_html($p->post_title);

            case 'date':
                return $p->post_date;

            case 'author':
                return get_the_author_meta('display_name',$p->post_author);

            case 'status':
                return $p->post_status;

            case 'view':
                return '<a href="'.esc_url(wp_get_attachment_url($p->ID)).'" target="_blank">View</a>';

        }

        return '';

    }

    protected function get_bulk_actions(){

        if($this->tab === 'trash'){

            return [
                'restore' => 'Restore Selected',
                'delete'  => 'Delete Permanently'
            ];

        }

        return [
            'trash' => 'Move to Trash'
        ];

    }

    public function process_bulk_action(){

        if(empty($_POST['image_ids'])) return;

        foreach($_POST['image_ids'] as $id){

            $id = intval($id);

            switch($this->current_action()){

                case 'trash':
                    wp_trash_post($id);
                break;

                case 'restore':
                    wp_untrash_post($id);
                break;

                case 'delete':
                    wp_delete_attachment($id,true);
                break;

            }

        }

    }

    public function prepare_items(){

        $items = ith_mm_get_all_images();
        $items = ith_mm_filter_tab($items,$this->tab);

        $orderby=$_GET['orderby']??'date';
        $order=$_GET['order']??'desc';

        if($this->tab === 'largest'){
            $orderby = 'size';
            $order   = 'desc';
        }

        usort($items,function($a,$b) use($orderby,$order){

            switch($orderby){

                case 'size':
                    $v1=$a['size'];
                    $v2=$b['size'];
                break;

                case 'title':
                    $v1=strtolower($a['post']->post_title);
                    $v2=strtolower($b['post']->post_title);
                break;

                default:
                    $v1=strtotime($a['post']->post_date);
                    $v2=strtotime($b['post']->post_date);

            }

            if($v1==$v2) return 0;

            if($order==='asc'){
                return ($v1<$v2)?-1:1;
            }

            return ($v1>$v2)?-1:1;

        });

        $total=count($items);
        $paged=$this->get_pagenum();

        $items=array_slice($items,($paged-1)*$this->per_page,$this->per_page);

        $this->items=$items;

        $this->set_pagination_args([
            'total_items'=>$total,
            'per_page'=>$this->per_page,
            'total_pages'=>ceil($total/$this->per_page)
        ]);

        $this->_column_headers=[
            $this->get_columns(),
            [],
            $this->get_sortable_columns()
        ];

    }

}

/* ======================================================
ADMIN PAGE
====================================================== */

function ith_mm_admin_page(){

    if(!current_user_can('manage_options')) return;

    $tab=$_GET['tab']??'unattached';
    $per_page=isset($_GET['per_page'])?intval($_GET['per_page']):50;
    $allowed=[50,100,200,300,500];

    if(!in_array($per_page,$allowed)){ $per_page=50; }

    $items=ith_mm_get_all_images();
    $total_size=0;
    foreach($items as $i){
        $total_size+=$i['size'];
    }

    echo '<div class="wrap">';
    echo '<h1>ITH - Media Manager</h1>';

    echo '<h2 class="nav-tab-wrapper">';

    $tabs=[
        'statistics'=>'Statistics',
        'attached'=>'Attached',
        'unattached'=>'Unattached',
        'largest'=>'Largest Files (> 1)',
        'hash_duplicates'=>'Hash Duplicates',
        'duplicates'=>'Filename Duplicates',
        'trash'=>'Trash',
    ];

    foreach($tabs as $key=>$label){
        echo '<a href="?page=ith-media-manager&tab='.$key.'" class="nav-tab '.($tab==$key?'nav-tab-active':'').'">'.$label.'</a>';
    }
    echo '</h2>';

    /* TAB NOTES */
    echo '<div style="margin:15px 0;padding:15px;border-left:4px solid #ccd0d4;background:#f8f9fa;">';
    switch($tab){

        case 'largest':
            echo '<strong>Largest Files</strong>';
            echo '<ul>';
            echo '<li>Lists all images in the media library sorted by file size.</li>';
            echo '<li>Use this tab to quickly identify heavy media that increases storage and backup size.</li>';
            echo '<li>You can sort by the <strong>Size</strong> column to find the biggest files.</li>';
            echo '</ul>';
        break;

        case 'hash_duplicates':
            echo '<strong>Hash Duplicates</strong>';
            echo '<ul>';
            echo '<li>Detects images that are <strong>exact binary duplicates</strong> using an MD5 file hash.</li>';
            echo '<li>This works even if files were renamed during upload.</li>';
            echo '<li>Example: <code>image.jpg</code> and <code>banner-copy.jpg</code> can still be detected as duplicates.</li>';
            echo '<li>Review before deleting to avoid removing intentionally reused assets.</li>';
            echo '</ul>';
        break;

        case 'duplicates':
            echo '<strong>Filename Duplicates</strong>';
            echo '<ul>';
            echo '<li>Finds images that share the <strong>same filename</strong>.</li>';
            echo '<li>This usually happens when the same image is uploaded multiple times.</li>';
            echo '<li>Note: this method only compares filenames and may not detect renamed duplicates.</li>';
            echo '</ul>';
        break;

        case 'attached':
            echo '<strong>Attached Images</strong>';
            echo '<ul>';
            echo '<li>Shows images uploaded directly inside a post or page.</li>';
            echo '<li>WordPress assigns a <strong>post_parent</strong> to these files.</li>';
            echo '<li>The <strong>Attached To</strong> column links to the post/page where the upload occurred.</li>';
            echo '</ul>';
        break;

        case 'trash':
            echo '<strong>Trashed Images</strong>';
            echo '<ul>';
            echo '<li>Images that have been moved to the WordPress media trash.</li>';
            echo '<li>You can restore them or permanently delete them.</li>';
            echo '<li>Permanent deletion removes the file from the server.</li>';
            echo '</ul>';
        break;

        case 'unattached':
            echo '<strong>Unattached Images</strong>';
            echo '<ul>';
            echo '<li>Images that are not attached to any post or page (post_parent = 0).</li>';
            echo '<li>These may still be used inside page builders, theme settings, or custom fields.</li>';
            echo '<li>Always review before deleting unattached media.</li>';
            echo '</ul>';
    }
    echo '</div>';

    $export = wp_nonce_url(admin_url('upload.php?page=ith-media-manager&tab='.$tab.'&ith_export=1'),'ith_mm_export');
    
    echo '<a href="'.esc_url($export).'" class="button button-secondary" style="margin:10px 0;">Export CSV</a>';
    
    echo '<form method="get" style="margin-bottom:15px;">';
    echo '<input type="hidden" name="page" value="ith-media-manager">';
    echo '<input type="hidden" name="tab" value="'.$tab.'">';
    echo 'Files per page: ';
    echo '<select name="per_page" onchange="this.form.submit()">';

    foreach($allowed as $num){
        echo '<option value="'.$num.'" '.selected($per_page,$num,false).'>'.$num.'</option>';
    }
    echo '</select>';

    echo '</form>';

    if($tab==='statistics'){

        $total_images = count($items);
        $total_size = 0;
        foreach($items as $i){
            $total_size += $i['size'];
        }

        echo '<div style="background:#fff;border:1px solid #ccd0d4;padding:15px;margin-bottom:15px;">';
        echo '<strong>Total Images:</strong> '.$total_images;
        echo ' &nbsp; | &nbsp; ';
        echo '<strong>Total Media Size:</strong> '.size_format($total_size,2);
        echo '</div>';

        echo '<h2>Media Statistics</h2>';

        echo '<table class="widefat striped" style="max-width:700px">';
        echo '<thead><tr><th>Tab</th><th>Images</th><th>Media Size</th></tr></thead>';
        echo '<tbody>';

        foreach($tabs as $key=>$label){
            if($key==='statistics') continue;
            $tab_items=ith_mm_filter_tab($items,$key);
            $size=0;
            foreach($tab_items as $i){
                $size+=$i['size'];
            }
            echo '<tr>';
            echo '<td>'.$label.'</td>';
            echo '<td>'.count($tab_items).'</td>';
            echo '<td>'.size_format($size,2).'</td>';
            echo '</tr>';
        }

        echo '</tbody></table>';
        echo '</div>';
        return;

    }

    echo '<form method="post">';

    $table=new ITH_MM_Table($tab,$per_page);

    $table->process_bulk_action();
    $table->prepare_items();
    $table->display();

    echo '</form>';
    echo '</div>';

}