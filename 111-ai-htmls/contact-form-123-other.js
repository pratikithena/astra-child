<script>
/* Contact form 123: show "Other requirements" only when Area of interest = Other */
function form123Init() {
    console.log('[form123] script running');

    var select = document.getElementById('field_area-of-intrest');
    var other  = document.getElementById('field_others-req');
    console.log('[form123] select found:', !!select, '| other field found:', !!other);
    if (!select || !other) return;

    var box = other.closest('.frm_form_field') || other;   // hide the label too, not just the input

    function toggle() {
        var show = select.value.indexOf('Other') === 0;   // "Other" or "Other -Tell us about your requirements."
        box.style.display = show ? '' : 'none';
        console.log('[form123] selected:', select.value, '| other field', show ? 'SHOWN' : 'HIDDEN');
    }

    select.addEventListener('change', toggle);
    toggle();   // hide on load
}
// Airlift delays scripts until the first interaction, after DOMContentLoaded has already fired, so run now if the page is ready
if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', form123Init); else form123Init();
</script>
