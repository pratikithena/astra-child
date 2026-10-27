"""Block markup for the partner pages that use template-parts/partner-v2.php.

Writes partner-v2-<slug>.html (raw block markup). The markup is approximate; the uploader
re-serializes it through wp.blocks in the editor, so what lands in post_content is canonical.
Run: python partner-v2-pages.py
"""
import json, os

U = 'https://dev-website.ithena.app/wp-content/uploads/'
CONTACT = '/contact-us/'


def c(name, attrs=None):
    return name + (' ' + json.dumps(attrs) if attrs else '')


def P(t, cls=None, align=None):
    a = {}
    if cls: a['className'] = cls
    if align: a['align'] = align
    k = ' '.join(x for x in [cls, 'has-text-align-' + align if align else None] if x)
    return f'<!-- wp:{c("paragraph", a)} --><p{f" class={json.dumps(k)}" if k else ""}>{t}</p><!-- /wp:paragraph -->'


def EYB(t, align=None): return P(t, 'is-style-eyebrow', align)


def H(n, t, align=None):
    a = {'level': n} if n != 2 else {}
    if align: a['textAlign'] = align
    cls = 'wp-block-heading' + (f' has-text-align-{align}' if align else '')
    return f'<!-- wp:{c("heading", a)} --><h{n} class="{cls}">{t}</h{n}><!-- /wp:heading -->'


def IMG(path, alt, id=None):
    a = {'id': id, 'sizeSlug': 'full', 'linkDestination': 'none'} if id else {'sizeSlug': 'full', 'linkDestination': 'none'}
    return f'<!-- wp:{c("image", a)} --><figure class="wp-block-image size-full"><img src="{U + path}" alt="{alt}"{f" class=\"wp-image-{id}\"" if id else ""}/></figure><!-- /wp:image -->'


def BTNS(*bs, center=False):
    inner = ''
    for t, url, *o in bs:
        cls = 'ith-cta-btn'  # every button is a red CTA (the old outline flag `o` is ignored)
        inner += f'<!-- wp:{c("button", {"className": cls})} --><div class="wp-block-button {cls}"><a class="wp-block-button__link wp-element-button" href="{url}">{t}</a></div><!-- /wp:button -->'
    a = {'layout': {'type': 'flex', 'justifyContent': 'center'}} if center else None
    return f'<!-- wp:{c("buttons", a)} --><div class="wp-block-buttons">{inner}</div><!-- /wp:buttons -->'


def LI(t, sub=None):
    s = LIST(sub) if sub else ''
    return f'<!-- wp:list-item --><li>{t}{s}</li><!-- /wp:list-item -->'


def LIST(items, cls=None):
    a = {'className': cls} if cls else None
    inner = ''.join(i if i.startswith('<!--') else LI(i) for i in items)
    return f'<!-- wp:{c("list", a)} --><ul class="wp-block-list{" " + cls if cls else ""}">{inner}</ul><!-- /wp:list -->'


def CARDS(*cards):
    """cards: (icon, [blocks])"""
    cols = ''
    for icon, blocks in cards:
        cols += f'<!-- wp:{c("column", {"className": "ic-" + icon})} --><div class="wp-block-column ic-{icon}">{"".join(blocks)}</div><!-- /wp:column -->'
    return f'<!-- wp:{c("columns", {"className": "is-style-icon-cards"})} --><div class="wp-block-columns is-style-icon-cards">{cols}</div><!-- /wp:columns -->'


def GROUP(blocks, cls=None, anchor=None):
    a = {'layout': {'type': 'constrained'}}
    if cls: a['className'] = cls
    if anchor: a['anchor'] = anchor
    return f'<!-- wp:{c("group", a)} --><div{f" id={json.dumps(anchor)}" if anchor else ""} class="wp-block-group{" " + cls if cls else ""}">{"".join(blocks)}</div><!-- /wp:group -->'


def COVER(path, id, blocks, cls):
    a = {'url': U + path, 'dimRatio': 50, 'className': cls} if path else {}
    if id: a['id'] = id
    img = f'<img class="wp-block-cover__image-background{f" wp-image-{id}" if id else ""}" alt="" src="{U + path}" data-object-fit="cover"/>' if path else ''
    if not path: a = {'dimRatio': 50, 'overlayColor': 'black', 'className': cls}
    return (f'<!-- wp:{c("cover", a)} --><div class="wp-block-cover {cls}"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span>'
            f'{img}<div class="wp-block-cover__inner-container">{"".join(blocks)}</div></div><!-- /wp:cover -->')


def MT(path, alt, blocks, id=None, right=False):
    a = {'mediaType': 'image'}
    if id: a['mediaId'] = id
    if right: a['mediaPosition'] = 'right'
    fig = f'<figure class="wp-block-media-text__media"><img src="{U + path}" alt="{alt}"{f" class=\"wp-image-{id} size-full\"" if id else ""}/></figure>'
    body = f'<div class="wp-block-media-text__content">{"".join(blocks)}</div>'
    return f'<!-- wp:{c("media-text", a)} --><div class="wp-block-media-text{" has-media-on-the-right" if right else ""} is-stacked-on-mobile">{(body + fig) if right else (fig + body)}</div><!-- /wp:media-text -->'


def SEC(blocks, anchor=None, tint=False):
    return GROUP(blocks, 'is-style-tinted' if tint else None, anchor)


def ABOUT(logo, alt, text, id=None):
    return GROUP([IMG(logo, alt, id), P(text)], 'is-style-partner-about')


def PAIR(buttons):
    """Hero / closing-band buttons: 1st in brand blue, 2nd inverse (white)."""
    return buttons.replace('ith-cta-btn', 'ith-btn-brand', 2).replace('ith-cta-btn', 'ith-btn-inverse', 2)


def CTA(video, id, blocks):
    blocks = blocks[:-1] + [PAIR(blocks[-1])]
    """Media & Text "CTA split": copy left, looping video right (the template adds autoplay/muted)."""
    a = {'mediaId': id, 'mediaType': 'video', 'mediaPosition': 'right', 'className': 'is-style-cta-split'}
    return (f'<!-- wp:{c("media-text", a)} --><div class="wp-block-media-text has-media-on-the-right is-stacked-on-mobile is-style-cta-split">'
            f'<div class="wp-block-media-text__content">{"".join(blocks)}</div><figure class="wp-block-media-text__media"><video controls src="{U + video}"></video></figure></div><!-- /wp:media-text -->')


def HERO(bg, bg_id, logo, logo_alt, logo_id, eyebrow, h1, deck, buttons):
    return COVER(bg, bg_id, [IMG(logo, logo_alt, logo_id), EYB(eyebrow), H(1, h1), P(deck), PAIR(buttons)], 'is-style-partner-hero')


def card(icon, title, cat=None, text=None, link=None):
    b = []
    if cat: b.append(EYB(cat))
    b.append(H(3, title))
    if text: b.append(P(text))
    if link: b.append(P(f'<a href="{link[1]}">{link[0]}</a>'))
    return (icon, b)


PAGES = {}

# ---------------------------------------------------------------- Rockwell Automation
PAGES['rockwell-automation-partnership-v2'] = ('Rockwell Automation Partnership', [
    HERO('2026/08/factorygpt-control-room.jpg', 82560, '2024/08/rw-gold-white.png', 'Rockwell Automation Gold System Integrator', None,
         'Rockwell Automation &middot; Gold System Integrator',
         'Simplifying industrial transformation <em>with Rockwell Automation</em>',
         'Pre-built, persona-centric, AI-powered applications on Rockwell software, so you get value in weeks, not months.',
         BTNS(('Talk to a Rockwell expert', CONTACT), ('Explore the portfolio', '#portfolio', 1))),
    SEC([EYB('The portfolio', 'center'), H(2, 'Four Rockwell platforms, <em>one trusted data environment</em>', 'center'),
         CARDS(card('gauge', 'Plex MES', 'Production monitoring', link=('How we deliver it', '#plex')),
               card('database', 'FactoryTalk DataMosaix', 'Industrial DataOps', link=('How we deliver it', '#datamosaix')),
               card('wrench', 'Fiix', 'CMMS', link=('How we deliver it', '#fiix')),
               card('monitor', 'FactoryTalk Optix', 'HMI &amp; data visualization', link=('How we deliver it', '#optix')))], 'portfolio'),
    SEC([EYB('The partnership'), H(2, 'IIoT that links every team <em>on one data layer</em>'),
         P('ITHENA and Rockwell Automation partner together to develop <strong>cutting-edge IIoT technologies</strong> that link development, operations, and maintenance teams across a single, trusted data environment. Leveraging our joint expertise, we help manufacturing organizations <strong>increase productivity</strong> and <strong>accelerate time to value</strong>.', 'is-style-lede'),
         P('Our in-depth experience and capabilities around <strong>IIoT, AI/ML and AR/VR</strong> allow teams to prototype, customize, and collaborate digitally, without having to invest in expensive physical equipment. With our persona-centric, pre-packaged applications built on top of Rockwell&#8217;s software suite, we help our clients improve overall plant efficiency, achieve increased productivity and reduce operational risks.'),
         P('Harnessing the power of our IoT-based solutions, manufacturers can securely access and exchange data models with both internal and external stakeholders. Through real-time insights and predictive maintenance capabilities, we help them facilitate long-term growth and innovation. ITHENA&#8217;s IIoT solutions help manufacturers in:'),
         CARDS(card('factory', 'Improving plant efficiency'), card('gauge', 'Maximizing asset performance'), card('trend', 'Increasing business growth'))], 'partnership', tint=True),
    SEC([MT('2026/09/imex-hero-oee.webp', 'CNC machine connected to a live OEE dashboard', [
        EYB('Production monitoring'), H(2, 'Streamline production with <em>Plex MES</em>'),
        P('Plex MES is a powerful manufacturing execution system that streamlines production and enhances operational efficiency. It offers real-time, paperless production management, helping businesses achieve enterprise-wide compliance and quality standards. With Plex, ITHENA gives manufacturers comprehensive control over their plant floors through a unified view of the entire production lifecycle, with seamless connectivity to ERPs to automate tasks and minimize errors.'),
        P('<strong>ITHENA&#8217;s capabilities using Plex include:</strong>'),
        LIST(['<strong>Production finite scheduling</strong> to decide which jobs go to which work centers, with resource availability in mind.',
              '<strong>Closed-loop quality management</strong> to run quality procedures directly from the control plan for repeatable, predictable processes.',
              '<strong>Inventory management</strong> to track inventory in real time, with end-to-end traceability.',
              '<strong>Production management</strong> to make the right quantity of the right product at the right time, for improved OEE.'], 'is-style-checklist'),
        BTNS(('Learn more about Plex MES', 'https://www.plex.com/products/manufacturing-execution-system', 1))], 82891)], 'plex'),
    SEC([MT('2026/09/iserv-scr-uptime.webp', 'Historian trend analysis of equipment efficiency and OEE', [
        EYB('Industrial DataOps'), H(2, 'Extracting value with <em>FactoryTalk DataMosaix</em>'),
        P('FactoryTalk DataMosaix is a versatile data management solution, available as SaaS or as a private cloud / on-premise edition. ITHENA helps you choose the right deployment: a fully managed SaaS service that frees your staff from technology management and updates, or a private edition that you run on Microsoft Azure, AWS, GCP or in your own data center.'),
        P('<strong>ITHENA has deployed many FactoryTalk DataMosaix instances. The foundational use cases include:</strong>'),
        LIST(['<strong>Next-generation historian:</strong> scalable across sites, easy access for all stakeholders, built-in context from many sources, and a single source of truth across the enterprise.',
              '<strong>Enterprise production reporting:</strong> create KPIs quickly, aggregate data, compare OEE across plants, lines and regions, and make informed planning decisions.',
              '<strong>Asset monitoring:</strong> understand sensor trends with alarms and work-order context, find downtime root causes with ad-hoc analysis, and compare equipment reliability across plants.'], 'is-style-checklist'),
        BTNS(('Learn more about DataMosaix', 'https://www.rockwellautomation.com/en-gb/products/software/factorytalk/datamosaix.html', 1))], 82842, right=True)], 'datamosaix', tint=True),
    SEC([MT('2026/05/cmms-top-img.webp', 'Maintenance technician completing an electrical audit work order', [
        EYB('CMMS'), H(2, 'Plan, track and optimize maintenance with <em>Fiix</em>'),
        P('Fiix is a cloud-based, AI-powered computerized maintenance management system that manages all your maintenance, including thousands of assets, work orders and parts, in one place. Over 3,000 companies use Fiix to keep equipment reliable, make fewer capital expenditures, turn operational data into action and hit production targets.'),
        LIST(['<strong>Track and optimize asset performance:</strong> centralize real-time performance data, maintenance tracking and tasks. Build asset hierarchies and manage users, inventory and tasks across shifts, areas or sites.',
              '<strong>Collect, analyze and act on maintenance data:</strong> real-time KPIs, benchmarks and insights on demand. Filter by project, asset or period, compare sites and generate custom reports for planning and audits.',
              '<strong>Create, complete and track work orders:</strong> AI-powered work orders that centralize records, prevent downtime, reduce unexpected repairs and optimize resource use.'], 'is-style-checklist'),
        BTNS(('Learn more about Fiix', 'https://fiixsoftware.com/cmms/cmms-software/', 1))], 79304)], 'fiix'),
    SEC([MT('2024/11/73072-Rockwell-Automation-1.jpg', 'Operators reviewing HMI screens in a Rockwell Automation plant', [
        EYB('HMI &amp; data visualization'), H(2, 'Visualization and IIoT with <em>FactoryTalk Optix</em>'),
        P('FactoryTalk Optix enhances the Human-Machine Interface (HMI) and data visualization experience while raising your capabilities in IIoT, edge computing and data management. Built on modern technologies and design principles, it accelerates value delivery with flexible deployment options.'),
        P('<strong>Improving processes, efficiency and deliverables.</strong> With ITHENA, Optix becomes a single, easy-to-access tool: SaaS-enabled workflows let your team collaborate anytime, anywhere, with built-in change tracking and versioning, and interoperability for your digital transformation vision.'),
        BTNS(('Learn more about Optix', 'https://www.rockwellautomation.com/en-us/products/software/factorytalk/optix.html', 1))], 66203, right=True)], 'optix', tint=True),
    SEC([ABOUT('2024/08/rw-gold-white.png', 'Rockwell Automation',
               '<strong>About Rockwell Automation.</strong> Rockwell Automation is a global pioneer in industrial automation and digital transformation. They offer solutions and services that maximize production throughout the automation lifecycle, and the industry expertise to help design, implement and support automation investments.')]),
    CTA('2026/09/ith-home-hero-montage.mp4', 82831, [EYB('Weeks, not months'), H(2, 'Rockwell software value, <em>in weeks, not months</em>'),
         P('Using Rockwell Automation&#8217;s software, ITHENA helps businesses optimize productivity and move their digital transformation forward with pre-built, persona-centric, AI-powered solutions.', 'is-style-lede'),
         BTNS(('Talk to a Rockwell expert', CONTACT), ('All partnerships', '/company/partnerships/', 1))]),
])

# ---------------------------------------------------------------- PTC
PAGES['ptc-partnership-v2'] = ('PTC Partnership', [
    HERO('2026/08/factorygpt-robot-cell.jpg', 82563, '2023/07/Rectangle-952.png', 'PTC', 22219,
         'PTC &middot; End-to-end implementation partner',
         'Digitally transform your business with <em>ThingWorx and Vuforia</em>',
         'ITHENA is an end-to-end implementation partner for PTC&#8217;s ThingWorx and Vuforia platforms, with proprietary accelerators for rapid deployment.',
         BTNS(('Talk to a PTC expert', CONTACT), ('Explore the platforms', '#portfolio', 1))),
    SEC([EYB('The platforms', 'center'), H(2, 'Industrial IoT and augmented reality, <em>delivered end to end</em>', 'center'),
         CARDS(card('cpu', 'ThingWorx', 'Innovation with IoT', 'A complete IIoT platform to connect, model and analyze industrial data.', ('How we deliver it', '#thingworx')),
               card('ar', 'Vuforia', 'Enhanced AR/VR experience', 'AR work instructions, training and remote assistance for front-line workers.', ('How we deliver it', '#vuforia')))], 'portfolio'),
    SEC([EYB('The partnership'), H(2, 'Advisory to integration, <em>across the lifecycle</em>'),
         P('We have built proprietary accelerators that enable rapid deployment, providing digital agility and smart industry solutions on the world-class PTC ThingWorx and Vuforia platforms. Backed by experience across many industries, ITHENA offers services from <strong>advisory</strong> to <strong>system integration</strong> and <strong>software development</strong> for PTC&#8217;s smart manufacturing solutions.', 'is-style-lede'),
         P('Using our in-depth capabilities in <strong>IIoT, manufacturing analytics, AI/ML and AR/VR</strong>, we help clients through the entire lifecycle of their manufacturing journey: make, sell, service, sense and respond. We partner with our customers to build their digital transformation roadmap.'),
         P('<strong>iMEX</strong>, our manufacturing excellence solution, and <strong>iSERV</strong>, our smart service application, use ThingWorx and Vuforia to improve operational efficiency and redefine customer service, from integrated workflows to real-time equipment monitoring. ITHENA&#8217;s solutions help organizations accelerate their success by:'),
         CARDS(card('coins', 'Lowering operational costs'), card('gauge', 'Increasing asset efficiency'), card('trend', 'Maximizing revenue growth'))], 'partnership', tint=True),
    SEC([MT('2026/09/pkg-oee-scaled.webp', 'Packaging machine streaming IIoT data to a live dashboard', [
        EYB('Innovation with IoT'), H(2, 'Maximize your IIoT potential with <em>ThingWorx</em>'),
        P('ThingWorx helps industrial enterprises digitally transform every part of their business with solutions that are simple to create, easy to implement, scalable and fast to value. From service to workforce efficiency and asset optimization, ITHENA removes the technical barriers to IIoT, with practical solutions that return value quickly.'),
        P('<strong>Our ThingWorx services:</strong>'),
        LIST(['Roadmap and architecture', 'Platform setup and configuration', 'Thing modelling, services and mashup development', 'Analytics modelling and productionizing',
              'TWX extensions, SPC, SCP, manufacturing apps and more', 'Integrations with external systems', 'Testing and deployment', 'Application support and maintenance'], 'is-style-checklist'),
        BTNS(('Learn more about ThingWorx', 'https://www.ptc.com/en/products/thingworx', 1))], 82985)], 'thingworx'),
    SEC([MT('2024/12/Screenshot-2024-12-02-134234.png', 'Technician using Vuforia augmented reality on a tablet', [
        EYB('Enhanced AR/VR experience'), H(2, 'Address workforce challenges with <em>Vuforia AR</em>'),
        P('Fast, easy, advanced AR, recognized by Quadrant, to help your front line meet business goals.', 'is-style-lede'),
        LIST(['<strong>Scale expert knowledge and deliver AI guidance:</strong> capture the knowledge of experts and use 3D CAD to create, deliver and scale interactive work instructions and AI-enhanced inspection.',
              LI('<strong>Modernize training and work instructions:</strong> turn existing CAD and IoT data into AR experiences that give front-line workers critical information when and where they need it, for:',
                 ['Increasing worker productivity and satisfaction', 'Reducing the cost of errors, waste and accidents', 'Improving customer experiences and competitive advantage']),
              '<strong>Remote assistance powered by AR:</strong> connect a field technician with an expert who can see the situation and draw annotations that stick to 3D objects in the real world, guiding the work step by step.'], 'is-style-checklist'),
        BTNS(('Learn more about Vuforia', 'https://www.ptc.com/en/products/vuforia', 1))], 66919, right=True)], 'vuforia', tint=True),
    SEC([ABOUT('2023/07/Rectangle-952.png', 'PTC',
               '<strong>About PTC.</strong> PTC is a global leader in Product Lifecycle Management software. Its portfolio manages data throughout a product&#8217;s lifecycle, driving excellence in engineering and design, efficiency in manufacturing and supply chain, and optimization in operations and service.', 22219)]),
    CTA('2026/08/factorygpt-hero-line.mp4', 82558, [EYB('Next step'), H(2, 'Take the next big step <em>in digital transformation</em>'),
         P('ITHENA and PTC help manufacturers move from pilots to plant-wide IIoT and AR, with accelerators that shorten time to value.', 'is-style-lede'),
         BTNS(('Talk to a PTC expert', CONTACT), ('All partnerships', '/company/partnerships/', 1))]),
])

# ---------------------------------------------------------------- Ignition
PAGES['partner-ignition-v2'] = ('Ignition Partnership', [
    HERO('2026/03/ignition-banner.jpg', 75248, '2026/04/IGNITION-logo.png', 'Ignition by Inductive Automation', 75438,
         'Inductive Automation &middot; Ignition integrator',
         'Ignition-powered industrial solutions: <em>faster, smarter, more cost-effective</em>',
         'Real-time visibility and smart integration, fueled by Ignition and delivered by ITHENA.',
         BTNS(('Schedule a call', CONTACT), ('Ignition in high gear with FactoryGPT', 'https://ithena-6316277.hs-sites.com/aetherfactorygpt', 1))),
    SEC([EYB('Our services', 'center'), H(2, 'Everything Ignition can do, <em>delivered by ITHENA</em>', 'center'),
         CARDS(card('monitor', 'Vision and Perspective', 'Visualization', 'Responsive industrial applications for any device and accurate HMIs, with Vision clients delivering real-time data, trends and interactive visualization.'),
               card('report', 'Automated industrial data reports', 'Reporting', 'Dynamic, database-driven reports from any SQL database, delivered on schedule by email, file export, or in Perspective and Vision.'),
               card('server', 'Large multi-gateway management', 'EAM', 'Manage many Ignition installations from one place: central monitoring, project sync, user access and backups.'),
               card('signal', 'Remote performance monitoring', 'IIoT', 'Monitor and collect data from distributed assets over MQTT, handling high-volume industrial data efficiently.'),
               card('activity', 'Track OEE, A, P, Q and downtime', 'OEE', 'Deep visibility into availability, performance and quality through a suite of MES modules.'))], 'services'),
    SEC([EYB('The partnership'), H(2, 'Visibility, control and agility <em>through Ignition</em>'),
         P('ITHENA, in partnership with Inductive Automation, brings the power of Ignition, a universal industrial application platform, to connect plant-floor systems, design powerful applications, and deploy them instantly across the enterprise. Ignition becomes the central hub for operations: <strong>real-time visibility, total system integration and data-driven decisions</strong> that bridge production and IT.', 'is-style-lede'),
         P('Manufacturers face growing complexity, from disconnected systems to limited access to real-time data. Ignition solves this with a single platform that connects plant-floor equipment, databases and enterprise systems, bridging OT and IT without limits.'),
         P('As an Inductive Automation integrator, ITHENA deploys and customizes Ignition to unify industrial systems: connecting assets, enabling real-time traceability and standardizing plant-floor workflows. Our low-code solutions and intuitive dashboards help manufacturers improve efficiency, reduce waste and lower TCO. ITHENA helps you maximize the value of Ignition through:'),
         CARDS(card('clock', 'Faster time-to-value'), card('dollar', 'Improved profitability'), card('zap', 'High operational efficiency'), card('layers', 'Long-term scalability'))], 'partnership', tint=True),
    SEC([MT('2026/03/Ignition-Website-Hero-Banner-1280-x-720-px.webp', 'Ignition SCADA connecting plant data sources to role-based applications', [
        EYB('Delivered faster and cost-effectively'), H(2, 'Build your <em>modern industrial operation</em>'),
        P('Empower every role with real-time data and total visibility.', 'is-style-lede'),
        P('From shop floor to top floor, Ignition gives seamless access to industrial data across devices, roles and operations. With one platform, organizations can visualize operations, streamline control and drive better outcomes.'),
        BTNS(('Start free trial', 'https://inductiveautomation.com/downloads/'))], 75249),
        CARDS(card('coins', 'Reduce costs', text='Cut delivery costs by 50% through offshore and nearshore models, while keeping project budgets intact.'),
              card('rocket', 'Accelerate development', text='Fast, structured deployment that shortens time-to-value.'),
              card('wrench', 'Lower maintenance', text='Modular design for seamless scaling, effortless upgrades and lower maintenance overheads.'),
              card('zap', 'Boost efficiency', text='Smart tag modeling, reusable templates and clean architecture that reduce rework.'))], 'operation'),
    SEC([MT('2026/09/ith-home-hero-poster.jpg', 'Bottles moving along a brewery packaging line', [
        EYB('Case study'), H(2, 'A brewery cuts its IT burden with <em>Ignition</em>'),
        H(4, 'Challenge'),
        P('A leading brewery struggled to access real-time production data and coordinate across departments. Its IT team was overwhelmed, and legacy systems made custom tools hard to build or update.'),
        H(4, 'Solution'),
        P('Ignition gave the brewery one platform to connect equipment, access data and build custom applications. The result: real-time visibility, streamlined communication, less reliance on IT and better workflow across the brewery.'),
        BTNS(('Talk to us about this project', CONTACT, 1))], 82828, right=True)], 'case-study', tint=True),
    SEC([ABOUT('2026/04/IGNITION-logo.png', 'Ignition by Inductive Automation',
               '<strong>About Ignition.</strong> Ignition by Inductive Automation is a universal industrial application platform for automation and digital transformation. It enables seamless data connectivity, rapid application development and scalable deployment, so teams can design, integrate and manage industrial systems across the enterprise.', 75438)]),
    CTA('2026/09/ticketing-hero-machine-video.mp4', 82972, [EYB('Get started in 3 minutes'), H(2, 'Free to try, <em>installs in three minutes</em>'),
         P('Start building your SCADA or digital transformation project today, and use it as long as you need.', 'is-style-lede'),
         BTNS(('Start free trial', 'https://inductiveautomation.com/downloads/'), ('Schedule a call', CONTACT, 1))]),
])

if __name__ == '__main__':
    here = os.path.dirname(os.path.abspath(__file__))
    out = {slug: {'title': t, 'content': '\n\n'.join(blocks)} for slug, (t, blocks) in PAGES.items()}
    with open(os.path.join(here, 'partner-v2-pages.json'), 'w', encoding='utf-8') as f:
        json.dump(out, f, ensure_ascii=False)
    assert all(v['content'].count('<!-- wp:') == v['content'].count('<!-- /wp:') + v['content'].count('/-->') for v in out.values()), 'unbalanced block comments'
    print({k: len(v['content']) for k, v in out.items()})
