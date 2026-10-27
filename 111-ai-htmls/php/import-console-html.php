<?php
/**
 * Plugin Name: ITHENA case-study console import (run once)
 * Description: Writes each case study's dashboard animation into its cs_console_html field.
 *
 * Drop in wp-content/mu-plugins/ (or activate as a plugin), load any wp-admin page once,
 * then delete the file. Re-run by deleting the option 'ith_console_html_imported'.
 */
if (!defined('ABSPATH')) exit;

add_action('admin_init', function () {
    if (get_option('ith_console_html_imported')) return;
    update_option('ith_console_html_imported', 1);

    $blocks = array(
    'system-mapping-visualization-automotive-software' => <<<'HTML'
<!-- System Mapping & Visualization &mdash; dashboard animation. Self-contained fragment: paste it whole into an
     HTML block or the "Animated HTML" field. One section, no document wrapper tags,
     every rule scoped to .ithdash, dark by default. -->
<section class="ithdash ithdash--ecumap" aria-label="System Mapping & Visualization dashboard">
<style>
.ithdash{
  --bg:#0A0A0B;--bg-2:#111113;--card:#17181B;--card-2:#1C1D21;
  --ink:#F2F3F5;--ink-2:rgba(228,230,235,.82);--ink-3:#9A9FA8;
  --line:rgba(255,255,255,.09);--line-2:rgba(255,255,255,.16);
  --brand:#0083C8;--brand-ink:#3FA9E0;--teal:#4FE0D0;--red:#FF8A8A;--amber:#F5B547;
  --chip:rgba(0,131,200,.22);--ease:cubic-bezier(.16,.8,.24,1);
  --acc:#4FE0D0;--acc-soft:rgba(79,224,208,.16);
  color-scheme:dark;display:block;margin:0;
  background:var(--bg);color:var(--ink-2);
  font-family:"Inter",system-ui,-apple-system,"Segoe UI",sans-serif;
  font-size:15px;line-height:1.6;-webkit-font-smoothing:antialiased;
}
.ithdash *{box-sizing:border-box}
.ithdash .ithd{max-width:1060px;margin:0 auto;padding:22px 16px}
.ithdash .panel{border:1px solid var(--line-2);border-radius:16px;background:var(--card);overflow:hidden;
  box-shadow:0 30px 60px -44px rgba(0,0,0,.9)}
.ithdash .bar{display:flex;align-items:center;gap:10px;padding:11px 15px;border-bottom:1px solid var(--line);
  background:linear-gradient(180deg,var(--bg-2),var(--card))}
.ithdash .bar .t{font-family:"Sora",system-ui,sans-serif;font-size:12.5px;font-weight:700;color:var(--ink-2);letter-spacing:.01em}
.ithdash .bar .live{margin-left:auto;display:inline-flex;align-items:center;gap:7px;font-size:10px;font-weight:700;
  letter-spacing:.11em;text-transform:uppercase;color:var(--acc);background:var(--acc-soft);
  border:1px solid var(--acc-soft);padding:4px 10px;border-radius:999px}
.ithdash .bar .live i{width:6px;height:6px;border-radius:50%;background:var(--acc);flex:none;animation:ithPulse 2s ease-in-out infinite}
@keyframes ithPulse{0%,100%{opacity:1;box-shadow:0 0 0 0 var(--acc-soft)}50%{opacity:.55;box-shadow:0 0 0 6px transparent}}
.ithdash .bar .clock{font-family:"Sora",system-ui,sans-serif;font-size:11.5px;font-weight:700;color:var(--ink-3);
  font-variant-numeric:tabular-nums}
.ithdash .lbl{font-size:9.5px;font-weight:700;letter-spacing:.13em;text-transform:uppercase;color:var(--ink-3)}
.ithdash .num{font-family:"Sora",system-ui,sans-serif;font-weight:800;letter-spacing:-.03em;color:var(--ink);
  font-variant-numeric:tabular-nums;line-height:1}
.ithdash .muted{color:var(--ink-3);font-size:11.5px;line-height:1.5}
.ithdash button{font:inherit;color:inherit;background:none;border:0;cursor:pointer}
.ithdash :focus-visible{outline:2px solid var(--acc);outline-offset:2px;border-radius:6px}
@media(prefers-reduced-motion:reduce){.ithdash *{animation:none!important;transition:none!important}}

.ithdash .wire{display:grid;grid-template-columns:minmax(0,1.5fr) minmax(0,1fr)}
@media(max-width:820px){.ithdash .wire{grid-template-columns:minmax(0,1fr)}}
.ithdash .map{position:relative;padding:14px;border-right:1px solid var(--line);min-height:300px}
@media(max-width:820px){.ithdash .map{border-right:0;border-bottom:1px solid var(--line)}}
.ithdash .map svg{width:100%;height:auto;display:block;overflow:visible}
.ithdash .lnk{stroke:var(--line-2);stroke-width:1.4;fill:none;stroke-dasharray:var(--len);stroke-dashoffset:var(--len);
  transition:stroke-dashoffset 1s var(--ease),stroke .3s}
.ithdash .on .lnk{stroke-dashoffset:0}
.ithdash .lnk.bad{stroke:var(--red);stroke-width:2}
.ithdash .lnk.lit{stroke:var(--acc);stroke-width:2.4}
.ithdash .nd rect{fill:var(--card-2);stroke:var(--line-2);rx:7;transition:stroke .25s,fill .25s}
.ithdash .nd text{fill:var(--ink-2);font-size:9px;font-family:"Sora",system-ui,sans-serif;font-weight:700;
  text-anchor:middle;dominant-baseline:middle;pointer-events:none}
.ithdash .nd{cursor:pointer}
.ithdash .nd:hover rect,.ithdash .nd.sel rect{stroke:var(--acc);fill:#14262A}
.ithdash .nd.bad rect{stroke:var(--red)}
.ithdash .nd.bad text{fill:var(--red)}
.ithdash .pkt{fill:var(--acc);opacity:0}
.ithdash .pkt.go{opacity:1}
.ithdash .side{padding:14px 15px;display:grid;gap:12px;align-content:start}
.ithdash .kv{display:flex;align-items:baseline;gap:8px}
.ithdash .kv .num{font-size:26px}
.ithdash .legend{display:flex;gap:14px;flex-wrap:wrap;font-size:11px;color:var(--ink-3)}
.ithdash .legend s{text-decoration:none;display:inline-flex;align-items:center;gap:6px}
.ithdash .legend s::before{content:"";width:9px;height:3px;border-radius:2px;background:var(--line-2)}
.ithdash .legend s.a::before{background:var(--acc)}
.ithdash .legend s.b::before{background:var(--red)}
.ithdash .detail{border:1px solid var(--line);border-radius:11px;padding:11px 12px;background:var(--bg-2);min-height:112px}
.ithdash .detail b{display:block;font-family:"Sora",system-ui,sans-serif;font-size:13px;color:var(--ink);margin-bottom:3px}
.ithdash .simrow{display:flex;align-items:center;gap:9px;font-size:11.5px;color:var(--ink-3);
  padding:7px 0;border-top:1px solid var(--line)}
.ithdash .simrow .dot{width:7px;height:7px;border-radius:50%;background:var(--acc);flex:none}
.ithdash .simrow .t{margin-left:auto;font-variant-numeric:tabular-nums;color:var(--ink-2)}
.ithdash .prog{height:3px;border-radius:2px;background:var(--line);overflow:hidden;margin-top:9px}
.ithdash .prog i{display:block;height:100%;width:0;background:var(--acc);transition:width .9s var(--ease)}
</style>
<div class="ithd">
<div class="panel">
  <div class="bar"><span class="t">ECU Map Designer</span><span class="live"><i></i>Building</span><span class="clock" data-clock>09:24</span></div>
  <div class="wire">
    <div class="map">
      <svg viewBox="0 0 420 260" role="img" aria-label="Vehicle ECU topology: eighteen control units, two links flagged as faulty.">
        <g class="links" data-links></g>
        <g class="nodes" data-nodes></g>
        <circle class="pkt" data-pkt r="3.4" cx="0" cy="0"></circle>
      </svg>
    </div>
    <div class="side">
      <div>
        <span class="lbl">ECUs mapped</span>
        <div class="kv"><span class="num" data-count="248">0</span><span class="muted">of 248 in topology</span></div>
      </div>
      <div class="legend"><s>Link</s><s class="a">Tracing</s><s class="b">Fault</s></div>
      <div class="detail" data-detail>
        <b>Hover a unit</b>
        <span class="muted">Colour-coded links show every connection the map holds for that ECU.</span>
      </div>
      <div>
        <span class="lbl">Digital simulation</span>
        <div class="simrow"><i class="dot"></i>Bus load<span class="t" data-sim="61">61%</span></div>
        <div class="simrow"><i class="dot"></i>Cycles run<span class="t" data-sim="2400">2,400</span></div>
        <div class="simrow"><i class="dot"></i>Rig time saved<span class="t">2 days</span></div>
        <div class="prog"><i data-prog></i></div>
      </div>
    </div>
  </div>
</div>
</div>
<script>
(function () {
  var root = document.currentScript.closest(".ithdash");
  if (!root) return;
  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var $ = function (s, c) { return (c || root).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || root).querySelectorAll(s)); };

  /* count every [data-count] up once, easing out */
  function count(el) {
    var to = parseFloat(el.getAttribute("data-count")), dp = (el.getAttribute("data-dp") | 0);
    if (reduce || !isFinite(to)) { el.textContent = to.toFixed(dp); return; }
    var t0 = null, dur = 1100;
    requestAnimationFrame(function step(now) {
      if (t0 === null) t0 = now;
      var p = Math.min(1, (now - t0) / dur);
      el.textContent = (to * (1 - Math.pow(1 - p, 4))).toFixed(dp);
      if (p < 1) requestAnimationFrame(step);
    });
  }

  /* every timer below is opened on view and torn down off view or on a hidden tab */
  function onView(start, stop) {
    if (reduce || !("IntersectionObserver" in window)) { start(); return; }
    new IntersectionObserver(function (es) {
      es.forEach(function (e) { e.isIntersecting ? start() : stop(); });
    }, { threshold: 0.2 }).observe(root);
    document.addEventListener("visibilitychange", function () { if (document.hidden) stop(); });
  }

  var NODES = [
    ["Gateway",210,130,0],["Body",120,60,0],["Comfort",120,130,1],["Chassis",120,200,0],
    ["Powertrain",300,60,0],["ADAS",300,130,0],["Infotain",300,200,0],
    ["Door FL",40,35,0],["Door FR",40,85,0],["Seat",40,130,1],["Mirror",40,175,0],["Light",40,220,0],
    ["Engine",385,35,0],["Trans",385,85,0],["Radar",385,130,0],["Camera",385,175,0],["Audio",385,220,0]
  ];
  var LINKS = [[0,1],[0,2],[0,3],[0,4],[0,5],[0,6],[1,7],[1,8],[2,9],[2,10],[3,11],[4,12],[4,13],[5,14],[5,15],[6,16]];
  var BAD = [1, 8];                                   /* gateway->comfort, comfort->seat */
  var SVGNS = "http://www.w3.org/2000/svg";
  var gl = $("[data-links]"), gn = $("[data-nodes]"), pkt = $("[data-pkt]");
  var paths = [], W = 54, H = 20;

  LINKS.forEach(function (l, i) {
    var a = NODES[l[0]], b = NODES[l[1]];
    var p = document.createElementNS(SVGNS, "path");
    p.setAttribute("d", "M" + a[1] + "," + a[2] + " C" + ((a[1] + b[1]) / 2) + "," + a[2] +
                        " " + ((a[1] + b[1]) / 2) + "," + b[2] + " " + b[1] + "," + b[2]);
    p.setAttribute("class", "lnk" + (BAD.indexOf(i) > -1 ? " bad" : ""));
    gl.appendChild(p);
    var len = p.getTotalLength();
    p.style.setProperty("--len", len);
    paths.push(p);
  });

  NODES.forEach(function (n, i) {
    var g = document.createElementNS(SVGNS, "g");
    g.setAttribute("class", "nd" + (n[3] ? " bad" : ""));
    g.setAttribute("tabindex", "0");
    var r = document.createElementNS(SVGNS, "rect");
    r.setAttribute("x", n[1] - W / 2); r.setAttribute("y", n[2] - H / 2);
    r.setAttribute("width", W); r.setAttribute("height", H); r.setAttribute("rx", 7);
    var t = document.createElementNS(SVGNS, "text");
    t.setAttribute("x", n[1]); t.setAttribute("y", n[2] + 0.5);
    t.textContent = n[0];
    g.appendChild(r); g.appendChild(t); gn.appendChild(g);
    g.addEventListener("mouseenter", function () { select(i); });
    g.addEventListener("focus", function () { select(i); });
  });

  var nodes = $$(".nd"), detail = $("[data-detail]");
  function select(i) {
    nodes.forEach(function (n, j) { n.classList.toggle("sel", j === i); });
    var lit = 0, bad = 0;
    paths.forEach(function (p, k) {
      var hit = LINKS[k][0] === i || LINKS[k][1] === i;
      p.classList.toggle("lit", hit && BAD.indexOf(k) < 0);
      if (hit) { lit++; if (BAD.indexOf(k) > -1) bad++; }
    });
    detail.innerHTML = "<b>" + NODES[i][0] + "</b><span class=\"muted\">" + lit + " link" +
      (lit === 1 ? "" : "s") + (bad ? ", <span style=\"color:var(--red)\">" + bad + " flagged</span>" : ", all clean") +
      " &middot; rev 2.7</span>";
  }

  /* a packet tracing the harness, one link at a time */
  var at = 0, trace = null, clock = null, mins = 9 * 60 + 24;
  function step() {
    var p = paths[at % paths.length]; at++;
    var len = p.getTotalLength(), t0 = null;
    pkt.classList.add("go");
    pkt.style.fill = p.classList.contains("bad") ? "var(--red)" : "var(--acc)";
    requestAnimationFrame(function fly(now) {
      if (t0 === null) t0 = now;
      var q = Math.min(1, (now - t0) / 760), pt = p.getPointAtLength(len * q);
      pkt.setAttribute("cx", pt.x); pkt.setAttribute("cy", pt.y);
      if (q < 1) requestAnimationFrame(fly); else pkt.classList.remove("go");
    });
  }
  function paint() {
    mins = (mins + 1) % 1440;
    $("[data-clock]").textContent = ("0" + ((mins / 60) | 0)).slice(-2) + ":" + ("0" + (mins % 60)).slice(-2);
  }
  onView(function () {
    if (trace) return;
    root.classList.add("on");
    $$("[data-count]").forEach(count);
    $("[data-prog]").style.width = "61%";
    select(2);
    trace = setInterval(step, 1300);
    clock = setInterval(paint, 3400);
  }, function () { clearInterval(trace); trace = null; clearInterval(clock); clock = null; });

})();
</script>
</section>
HTML,
    'iserv-b2b-ecommerce2-spare-parts-order-management' => <<<'HTML'
<!-- iSERV B2B eCommerce &mdash; dashboard animation. Self-contained fragment: paste it whole into an
     HTML block or the "Animated HTML" field. One section, no document wrapper tags,
     every rule scoped to .ithdash, dark by default. -->
<section class="ithdash ithdash--parts" aria-label="iSERV B2B eCommerce dashboard">
<style>
.ithdash{
  --bg:#0A0A0B;--bg-2:#111113;--card:#17181B;--card-2:#1C1D21;
  --ink:#F2F3F5;--ink-2:rgba(228,230,235,.82);--ink-3:#9A9FA8;
  --line:rgba(255,255,255,.09);--line-2:rgba(255,255,255,.16);
  --brand:#0083C8;--brand-ink:#3FA9E0;--teal:#4FE0D0;--red:#FF8A8A;--amber:#F5B547;
  --chip:rgba(0,131,200,.22);--ease:cubic-bezier(.16,.8,.24,1);
  --acc:#F5B547;--acc-soft:rgba(245,181,71,.16);
  color-scheme:dark;display:block;margin:0;
  background:var(--bg);color:var(--ink-2);
  font-family:"Inter",system-ui,-apple-system,"Segoe UI",sans-serif;
  font-size:15px;line-height:1.6;-webkit-font-smoothing:antialiased;
}
.ithdash *{box-sizing:border-box}
.ithdash .ithd{max-width:1060px;margin:0 auto;padding:22px 16px}
.ithdash .panel{border:1px solid var(--line-2);border-radius:16px;background:var(--card);overflow:hidden;
  box-shadow:0 30px 60px -44px rgba(0,0,0,.9)}
.ithdash .bar{display:flex;align-items:center;gap:10px;padding:11px 15px;border-bottom:1px solid var(--line);
  background:linear-gradient(180deg,var(--bg-2),var(--card))}
.ithdash .bar .t{font-family:"Sora",system-ui,sans-serif;font-size:12.5px;font-weight:700;color:var(--ink-2);letter-spacing:.01em}
.ithdash .bar .live{margin-left:auto;display:inline-flex;align-items:center;gap:7px;font-size:10px;font-weight:700;
  letter-spacing:.11em;text-transform:uppercase;color:var(--acc);background:var(--acc-soft);
  border:1px solid var(--acc-soft);padding:4px 10px;border-radius:999px}
.ithdash .bar .live i{width:6px;height:6px;border-radius:50%;background:var(--acc);flex:none;animation:ithPulse 2s ease-in-out infinite}
@keyframes ithPulse{0%,100%{opacity:1;box-shadow:0 0 0 0 var(--acc-soft)}50%{opacity:.55;box-shadow:0 0 0 6px transparent}}
.ithdash .bar .clock{font-family:"Sora",system-ui,sans-serif;font-size:11.5px;font-weight:700;color:var(--ink-3);
  font-variant-numeric:tabular-nums}
.ithdash .lbl{font-size:9.5px;font-weight:700;letter-spacing:.13em;text-transform:uppercase;color:var(--ink-3)}
.ithdash .num{font-family:"Sora",system-ui,sans-serif;font-weight:800;letter-spacing:-.03em;color:var(--ink);
  font-variant-numeric:tabular-nums;line-height:1}
.ithdash .muted{color:var(--ink-3);font-size:11.5px;line-height:1.5}
.ithdash button{font:inherit;color:inherit;background:none;border:0;cursor:pointer}
.ithdash :focus-visible{outline:2px solid var(--acc);outline-offset:2px;border-radius:6px}
@media(prefers-reduced-motion:reduce){.ithdash *{animation:none!important;transition:none!important}}

.ithdash .split{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1.1fr)}
@media(max-width:860px){.ithdash .split{grid-template-columns:minmax(0,1fr)}}
.ithdash .viewer{padding:16px;border-right:1px solid var(--line);display:grid;gap:12px;align-content:start}
@media(max-width:860px){.ithdash .viewer{border-right:0;border-bottom:1px solid var(--line)}}
.ithdash .stage{position:relative;height:180px;border-radius:12px;border:1px solid var(--line);
  background:radial-gradient(60% 70% at 50% 30%,rgba(245,181,71,.10),transparent 70%),var(--bg-2);
  display:grid;place-items:center;perspective:700px;overflow:hidden}
.ithdash .cube{width:92px;height:92px;position:relative;transform-style:preserve-3d;animation:ithSpin 14s linear infinite}
.ithdash .on .cube{animation-play-state:running}
@keyframes ithSpin{from{transform:rotateX(-22deg) rotateY(0)}to{transform:rotateX(-22deg) rotateY(360deg)}}
.ithdash .cube span{position:absolute;inset:0;border:1px solid var(--acc);background:rgba(245,181,71,.05)}
.ithdash .cube span:nth-child(1){transform:translateZ(46px)}
.ithdash .cube span:nth-child(2){transform:rotateY(180deg) translateZ(46px)}
.ithdash .cube span:nth-child(3){transform:rotateY(90deg) translateZ(46px)}
.ithdash .cube span:nth-child(4){transform:rotateY(-90deg) translateZ(46px)}
.ithdash .cube span:nth-child(5){transform:rotateX(90deg) translateZ(46px)}
.ithdash .cube span:nth-child(6){transform:rotateX(-90deg) translateZ(46px)}
.ithdash .stage .tag{position:absolute;left:12px;bottom:11px;font-size:10px;letter-spacing:.1em;
  text-transform:uppercase;color:var(--acc);font-weight:700}
.ithdash .bom{border:1px solid var(--line);border-radius:12px;overflow:hidden}
.ithdash .bom button{display:grid;grid-template-columns:minmax(0,1fr) auto;gap:10px;align-items:center;width:100%;
  text-align:left;padding:9px 12px;border-top:1px solid var(--line);transition:background .2s}
.ithdash .bom button:first-child{border-top:0}
.ithdash .bom button:hover,.ithdash .bom button[aria-pressed=true]{background:var(--card-2)}
.ithdash .bom b{display:block;font-family:"Sora",system-ui,sans-serif;font-size:12px;color:var(--ink);font-weight:700}
.ithdash .bom em{font-style:normal;font-size:11px;color:var(--ink-3)}
.ithdash .pill{font-size:9.5px;font-weight:700;letter-spacing:.07em;text-transform:uppercase;
  padding:3px 9px;border-radius:999px;border:1px solid;white-space:nowrap}
.ithdash .pill.in{color:var(--teal);border-color:rgba(79,224,208,.4);background:rgba(79,224,208,.12)}
.ithdash .pill.low{color:var(--acc);border-color:rgba(245,181,71,.4);background:rgba(245,181,71,.12)}
.ithdash .pill.out{color:var(--red);border-color:rgba(255,138,138,.4);background:rgba(255,138,138,.1)}
.ithdash .chatw{padding:16px;display:grid;gap:12px;align-content:start}
.ithdash .steps{display:flex;align-items:center;gap:0}
.ithdash .steps div{flex:1;text-align:center;position:relative;font-size:10px;color:var(--ink-3);
  letter-spacing:.06em;text-transform:uppercase;font-weight:700}
.ithdash .steps div::before{content:"";display:block;width:16px;height:16px;border-radius:50%;margin:0 auto 7px;
  border:2px solid var(--line-2);background:var(--card);transition:border-color .4s,background .4s}
.ithdash .steps div::after{content:"";position:absolute;top:8px;left:-50%;width:100%;height:2px;background:var(--line);z-index:-1}
.ithdash .steps div:first-child::after{display:none}
.ithdash .steps div.done{color:var(--acc)}
.ithdash .steps div.done::before{border-color:var(--acc);background:var(--acc)}
.ithdash .chat{border:1px solid var(--line);border-radius:12px;background:var(--bg-2);padding:12px;
  display:grid;gap:9px;min-height:186px;align-content:start}
.ithdash .msg{max-width:86%;font-size:12.5px;line-height:1.55;padding:8px 11px;border-radius:12px;
  opacity:0;transform:translateY(7px);transition:opacity .45s var(--ease),transform .45s var(--ease)}
.ithdash .msg.said{opacity:1;transform:none}
.ithdash .msg.you{justify-self:end;background:var(--card-2);border:1px solid var(--line-2);color:var(--ink-2);border-bottom-right-radius:4px}
.ithdash .msg.bot{justify-self:start;background:rgba(245,181,71,.1);border:1px solid rgba(245,181,71,.28);
  color:var(--ink);border-bottom-left-radius:4px}
.ithdash .msg i{display:block;font-style:normal;font-size:9px;letter-spacing:.11em;text-transform:uppercase;
  color:var(--ink-3);margin-bottom:3px}
.ithdash .caret{display:inline-block;width:6px;height:11px;vertical-align:-1px;margin-left:3px;
  background:var(--acc);animation:ithBlink 1s steps(1,end) infinite}
@keyframes ithBlink{0%,49%{opacity:1}50%,100%{opacity:0}}
.ithdash .totals{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:10px}
.ithdash .totals div{border:1px solid var(--line);border-radius:11px;padding:10px 11px;background:var(--bg-2)}
.ithdash .totals .num{font-size:20px;margin-top:5px}
</style>
<div class="ithd">
<div class="panel">
  <div class="bar"><span class="t">Spare Parts Desk &middot; serial FL-2291</span><span class="live"><i></i>Live stock</span><span class="clock" data-clock>11:06</span></div>
  <div class="split">
    <div class="viewer">
      <div class="stage"><div class="cube"><span></span><span></span><span></span><span></span><span></span><span></span></div><span class="tag" data-part>Sealing jaw kit</span></div>
      <span class="lbl">Bill of materials &middot; rev 9</span>
      <div class="bom" data-bom>
        <button type="button" aria-pressed="true" data-p="Sealing jaw kit" data-s="in" data-q="6 in stock &middot; ships today"><span><b>Sealing jaw kit</b><em>PK-4412-09</em></span><span class="pill in">In stock</span></button>
        <button type="button" aria-pressed="false" data-p="Drive belt" data-s="in" data-q="18 in stock &middot; ships today"><span><b>Drive belt</b><em>PK-2201-03</em></span><span class="pill in">In stock</span></button>
        <button type="button" aria-pressed="false" data-p="Filler nozzle" data-s="low" data-q="2 left &middot; 4-day lead"><span><b>Filler nozzle</b><em>PK-7788-01</em></span><span class="pill low">Low</span></button>
        <button type="button" aria-pressed="false" data-p="Gearbox assembly" data-s="out" data-q="On order &middot; 14-day lead"><span><b>Gearbox assembly</b><em>PK-9010-02</em></span><span class="pill out">Backorder</span></button>
      </div>
    </div>
    <div class="chatw">
      <div class="steps" data-steps><div>Basket</div><div>Stock</div><div>ERP</div><div>Shipped</div></div>
      <div class="chat" data-chat>
        <div class="msg you"><i>Customer</i>I need the jaw kit for the filler, but I am not sure which revision we run.</div>
        <div class="msg bot"><i>iSERV</i>Serial FL-2291 is on BOM rev 9. The kit is highlighted on the 3D model now.</div>
        <div class="msg you"><i>Customer</i>That is the one. When does it land?</div>
        <div class="msg bot"><i>iSERV</i>Epicor shows 6 in stock. Ordered, and it ships today.<span class="caret"></span></div>
      </div>
      <div class="totals">
        <div><span class="lbl">Orders today</span><div class="num" data-count="318">0</div></div>
        <div><span class="lbl">Confirmed live</span><div class="num" data-count="271">0</div></div>
        <div><span class="lbl">RSPL picked</span><div class="num" data-count="94">0</div></div>
      </div>
    </div>
  </div>
</div>
</div>
<script>
(function () {
  var root = document.currentScript.closest(".ithdash");
  if (!root) return;
  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var $ = function (s, c) { return (c || root).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || root).querySelectorAll(s)); };

  /* count every [data-count] up once, easing out */
  function count(el) {
    var to = parseFloat(el.getAttribute("data-count")), dp = (el.getAttribute("data-dp") | 0);
    if (reduce || !isFinite(to)) { el.textContent = to.toFixed(dp); return; }
    var t0 = null, dur = 1100;
    requestAnimationFrame(function step(now) {
      if (t0 === null) t0 = now;
      var p = Math.min(1, (now - t0) / dur);
      el.textContent = (to * (1 - Math.pow(1 - p, 4))).toFixed(dp);
      if (p < 1) requestAnimationFrame(step);
    });
  }

  /* every timer below is opened on view and torn down off view or on a hidden tab */
  function onView(start, stop) {
    if (reduce || !("IntersectionObserver" in window)) { start(); return; }
    new IntersectionObserver(function (es) {
      es.forEach(function (e) { e.isIntersecting ? start() : stop(); });
    }, { threshold: 0.2 }).observe(root);
    document.addEventListener("visibilitychange", function () { if (document.hidden) stop(); });
  }

  var btns = $$("[data-bom] button"), part = $("[data-part]");
  btns.forEach(function (b) {
    b.addEventListener("click", function () {
      btns.forEach(function (o) { o.setAttribute("aria-pressed", String(o === b)); });
      part.textContent = b.getAttribute("data-p");
    });
  });

  var msgs = $$(".msg"), steps = $$("[data-steps] div");
  var at = 0, tape = null, sTimer = null, sAt = 0, clock = null, mins = 11 * 60 + 6;

  function tapeStep() {
    if (at < msgs.length) { msgs[at++].classList.add("said"); tape = setTimeout(tapeStep, 1500); }
    else tape = setTimeout(function () {
      msgs.forEach(function (m) { m.classList.remove("said"); });
      at = 0; tape = setTimeout(tapeStep, 700);
    }, 5200);
  }
  function stepStep() {
    steps.forEach(function (s, i) { s.classList.toggle("done", i <= sAt); });
    sAt = (sAt + 1) % (steps.length + 1);
  }
  function paint() {
    mins = (mins + 1) % 1440;
    $("[data-clock]").textContent = ("0" + ((mins / 60) | 0)).slice(-2) + ":" + ("0" + (mins % 60)).slice(-2);
  }

  onView(function () {
    if (tape) return;
    root.classList.add("on");
    $$("[data-count]").forEach(count);
    tapeStep();
    stepStep();
    sTimer = setInterval(stepStep, 1400);
    clock = setInterval(paint, 3400);
  }, function () {
    clearTimeout(tape); tape = null;
    clearInterval(sTimer); sTimer = null;
    clearInterval(clock); clock = null;
  });

})();
</script>
</section>
HTML,
    'iplan-planning-and-scheduling-predictive-maintenance' => <<<'HTML'
<!-- iPLAN, powered by Ortems &mdash; dashboard animation. Self-contained fragment: paste it whole into an
     HTML block or the "Animated HTML" field. One section, no document wrapper tags,
     every rule scoped to .ithdash, dark by default. -->
<section class="ithdash ithdash--gantt" aria-label="iPLAN, powered by Ortems dashboard">
<style>
.ithdash{
  --bg:#0A0A0B;--bg-2:#111113;--card:#17181B;--card-2:#1C1D21;
  --ink:#F2F3F5;--ink-2:rgba(228,230,235,.82);--ink-3:#9A9FA8;
  --line:rgba(255,255,255,.09);--line-2:rgba(255,255,255,.16);
  --brand:#0083C8;--brand-ink:#3FA9E0;--teal:#4FE0D0;--red:#FF8A8A;--amber:#F5B547;
  --chip:rgba(0,131,200,.22);--ease:cubic-bezier(.16,.8,.24,1);
  --acc:#9B8CFF;--acc-soft:rgba(155,140,255,.16);
  color-scheme:dark;display:block;margin:0;
  background:var(--bg);color:var(--ink-2);
  font-family:"Inter",system-ui,-apple-system,"Segoe UI",sans-serif;
  font-size:15px;line-height:1.6;-webkit-font-smoothing:antialiased;
}
.ithdash *{box-sizing:border-box}
.ithdash .ithd{max-width:1060px;margin:0 auto;padding:22px 16px}
.ithdash .panel{border:1px solid var(--line-2);border-radius:16px;background:var(--card);overflow:hidden;
  box-shadow:0 30px 60px -44px rgba(0,0,0,.9)}
.ithdash .bar{display:flex;align-items:center;gap:10px;padding:11px 15px;border-bottom:1px solid var(--line);
  background:linear-gradient(180deg,var(--bg-2),var(--card))}
.ithdash .bar .t{font-family:"Sora",system-ui,sans-serif;font-size:12.5px;font-weight:700;color:var(--ink-2);letter-spacing:.01em}
.ithdash .bar .live{margin-left:auto;display:inline-flex;align-items:center;gap:7px;font-size:10px;font-weight:700;
  letter-spacing:.11em;text-transform:uppercase;color:var(--acc);background:var(--acc-soft);
  border:1px solid var(--acc-soft);padding:4px 10px;border-radius:999px}
.ithdash .bar .live i{width:6px;height:6px;border-radius:50%;background:var(--acc);flex:none;animation:ithPulse 2s ease-in-out infinite}
@keyframes ithPulse{0%,100%{opacity:1;box-shadow:0 0 0 0 var(--acc-soft)}50%{opacity:.55;box-shadow:0 0 0 6px transparent}}
.ithdash .bar .clock{font-family:"Sora",system-ui,sans-serif;font-size:11.5px;font-weight:700;color:var(--ink-3);
  font-variant-numeric:tabular-nums}
.ithdash .lbl{font-size:9.5px;font-weight:700;letter-spacing:.13em;text-transform:uppercase;color:var(--ink-3)}
.ithdash .num{font-family:"Sora",system-ui,sans-serif;font-weight:800;letter-spacing:-.03em;color:var(--ink);
  font-variant-numeric:tabular-nums;line-height:1}
.ithdash .muted{color:var(--ink-3);font-size:11.5px;line-height:1.5}
.ithdash button{font:inherit;color:inherit;background:none;border:0;cursor:pointer}
.ithdash :focus-visible{outline:2px solid var(--acc);outline-offset:2px;border-radius:6px}
@media(prefers-reduced-motion:reduce){.ithdash *{animation:none!important;transition:none!important}}

.ithdash .strip{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));border-bottom:1px solid var(--line)}
@media(max-width:700px){.ithdash .strip{grid-template-columns:repeat(2,minmax(0,1fr))}
  .ithdash .strip>div:nth-child(3){border-left:0}.ithdash .strip>div:nth-child(n+3){border-top:1px solid var(--line)}}
.ithdash .strip>div{padding:12px 14px;border-left:1px solid var(--line)}
.ithdash .strip>div:first-child{border-left:0}
.ithdash .strip .num{font-size:23px;margin-top:6px}
.ithdash .strip u{text-decoration:none;font-size:.5em;color:var(--acc);margin-left:1px}
.ithdash .gantt{padding:14px 15px}
.ithdash .hrs{display:grid;grid-template-columns:104px minmax(0,1fr);gap:10px;align-items:center;
  font-size:10px;color:var(--ink-3);letter-spacing:.06em;padding-bottom:8px;border-bottom:1px solid var(--line)}
.ithdash .hrs .sc{display:grid;grid-template-columns:repeat(12,minmax(0,1fr))}
.ithdash .row{display:grid;grid-template-columns:104px minmax(0,1fr);gap:10px;align-items:center;
  padding:9px 0;border-bottom:1px solid var(--line)}
.ithdash .row:last-child{border-bottom:0}
.ithdash .row>span:first-child{font-family:"Sora",system-ui,sans-serif;font-size:11.5px;font-weight:700;color:var(--ink-2);
  overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.ithdash .track{position:relative;height:22px;border-radius:6px;background:
  repeating-linear-gradient(90deg,var(--bg-2) 0 calc(100%/12 - 1px),var(--line) calc(100%/12 - 1px) calc(100%/12))}
.ithdash .job{position:absolute;top:3px;height:16px;border-radius:5px;background:linear-gradient(180deg,var(--acc),#6E5FE0);
  transform:scaleX(0);transform-origin:left;transition:transform .8s var(--ease);cursor:pointer;
  display:flex;align-items:center;padding:0 7px;font-size:9.5px;font-weight:700;color:#10101A;
  white-space:nowrap;overflow:hidden}
.ithdash .on .job{transform:scaleX(1)}
.ithdash .job.risk{background:linear-gradient(180deg,var(--red),#C25C5C);color:#2A0F0F}
.ithdash .job.pm{background:repeating-linear-gradient(45deg,#3A3D4A 0 5px,#2C2F3A 5px 10px);color:var(--ink-2);
  border:1px solid var(--line-2)}
.ithdash .job:hover{filter:brightness(1.15)}
.ithdash .now{position:absolute;top:-4px;bottom:-4px;width:2px;background:var(--teal);border-radius:2px;
  box-shadow:0 0 10px var(--teal);transition:left 1s linear}
.ithdash .tip{margin-top:11px;border:1px solid var(--line);border-radius:11px;padding:10px 12px;background:var(--bg-2);
  font-size:12px;min-height:56px}
.ithdash .tip b{font-family:"Sora",system-ui,sans-serif;color:var(--ink);font-size:12.5px}
</style>
<div class="ithd">
<div class="panel">
  <div class="bar"><span class="t">Production Planner &middot; Cell B</span><span class="live"><i></i>Sequencing</span><span class="clock" data-clock>06:42</span></div>
  <div class="strip">
    <div><span class="lbl">Jobs scheduled</span><div class="num" data-count="164">0</div></div>
    <div><span class="lbl">Machine uptime</span><div class="num"><span data-count="93">0</span><u>%</u></div></div>
    <div><span class="lbl">Bottlenecks</span><div class="num" data-count="4">0</div></div>
    <div><span class="lbl">PM windows</span><div class="num" data-count="9">0</div></div>
  </div>
  <div class="gantt">
    <div class="hrs"><span>Work centre</span><span class="sc"><span>06</span><span>08</span><span>10</span><span>12</span><span>14</span><span>16</span><span>18</span><span>20</span><span>22</span><span>00</span><span>02</span><span>04</span></span></div>
    <div data-rows></div>
    <div class="tip" data-tip><b>Hover a block</b><br><span class="muted">Every job is placed against live machine state, not a fixed calendar.</span></div>
  </div>
</div>
</div>
<script>
(function () {
  var root = document.currentScript.closest(".ithdash");
  if (!root) return;
  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var $ = function (s, c) { return (c || root).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || root).querySelectorAll(s)); };

  /* count every [data-count] up once, easing out */
  function count(el) {
    var to = parseFloat(el.getAttribute("data-count")), dp = (el.getAttribute("data-dp") | 0);
    if (reduce || !isFinite(to)) { el.textContent = to.toFixed(dp); return; }
    var t0 = null, dur = 1100;
    requestAnimationFrame(function step(now) {
      if (t0 === null) t0 = now;
      var p = Math.min(1, (now - t0) / dur);
      el.textContent = (to * (1 - Math.pow(1 - p, 4))).toFixed(dp);
      if (p < 1) requestAnimationFrame(step);
    });
  }

  /* every timer below is opened on view and torn down off view or on a hidden tab */
  function onView(start, stop) {
    if (reduce || !("IntersectionObserver" in window)) { start(); return; }
    new IntersectionObserver(function (es) {
      es.forEach(function (e) { e.isIntersecting ? start() : stop(); });
    }, { threshold: 0.2 }).observe(root);
    document.addEventListener("visibilitychange", function () { if (document.hidden) stop(); });
  }

  var ROWS = [
    ["CNC-14", [["WO-4471 housing", 2, 22, "risk"], ["WO-4468", 26, 30, ""], ["PM window", 74, 14, "pm"]]],
    ["CNC-09", [["WO-4463 tray", 0, 34, ""], ["WO-4477 rush", 38, 26, ""], ["WO-4482", 68, 24, ""]]],
    ["PRESS-3", [["WO-4459", 4, 28, ""], ["Bearing check", 36, 12, "risk"], ["WO-4474", 52, 40, ""]]],
    ["LATHE-2", [["WO-4466", 0, 46, ""], ["PM window", 50, 10, "pm"], ["WO-4480", 64, 32, ""]]],
    ["INSPECT", [["Audit batch", 12, 20, ""], ["WO-4471 QA", 40, 18, ""], ["WO-4477 QA", 66, 26, ""]]]
  ];
  var NOTE = {
    risk: "At risk &middot; setup overrun, resequenced automatically",
    pm: "Predictive maintenance &middot; booked ahead of the forecast failure",
    "": "On plan &middot; material released just in time"
  };
  var wrap = $("[data-rows]"), tip = $("[data-tip]");
  ROWS.forEach(function (r, ri) {
    var row = document.createElement("div");
    row.className = "row";
    var jobs = r[1].map(function (j, i) {
      return '<i class="job ' + j[3] + '" style="left:' + j[1] + '%;width:' + j[2] + '%;transition-delay:' +
             (ri * 90 + i * 70) + 'ms" data-n="' + j[0] + '" data-k="' + j[3] + '">' + j[0] + '</i>';
    }).join("");
    row.innerHTML = "<span>" + r[0] + '</span><span class="track">' + jobs +
                    (ri === 0 ? '<i class="now" data-now style="left:18%"></i>' : "") + "</span>";
    wrap.appendChild(row);
  });
  $$(".job").forEach(function (j) {
    function show() {
      tip.innerHTML = "<b>" + j.getAttribute("data-n") + "</b><br><span class=\"muted\">" +
                      NOTE[j.getAttribute("data-k")] + "</span>";
    }
    j.addEventListener("mouseenter", show);
    j.setAttribute("tabindex", "0");
    j.addEventListener("focus", show);
  });

  var now = $("[data-now]"), pos = 18, t = null, clock = null, mins = 6 * 60 + 42;
  onView(function () {
    if (t) return;
    root.classList.add("on");
    $$("[data-count]").forEach(count);
    t = setInterval(function () { pos = (pos + 1.4) % 100; now.style.left = pos + "%"; }, 900);
    clock = setInterval(function () {
      mins = (mins + 1) % 1440;
      $("[data-clock]").textContent = ("0" + ((mins / 60) | 0)).slice(-2) + ":" + ("0" + (mins % 60)).slice(-2);
    }, 3400);
  }, function () { clearInterval(t); t = null; clearInterval(clock); clock = null; });

})();
</script>
</section>
HTML,
    'digital-factory-performance-monitoring' => <<<'HTML'
<!-- ThingWorx RTPPM &mdash; dashboard animation. Self-contained fragment: paste it whole into an
     HTML block or the "Animated HTML" field. One section, no document wrapper tags,
     every rule scoped to .ithdash, dark by default. -->
<section class="ithdash ithdash--oee" aria-label="ThingWorx RTPPM dashboard">
<style>
.ithdash{
  --bg:#0A0A0B;--bg-2:#111113;--card:#17181B;--card-2:#1C1D21;
  --ink:#F2F3F5;--ink-2:rgba(228,230,235,.82);--ink-3:#9A9FA8;
  --line:rgba(255,255,255,.09);--line-2:rgba(255,255,255,.16);
  --brand:#0083C8;--brand-ink:#3FA9E0;--teal:#4FE0D0;--red:#FF8A8A;--amber:#F5B547;
  --chip:rgba(0,131,200,.22);--ease:cubic-bezier(.16,.8,.24,1);
  --acc:#4ADE80;--acc-soft:rgba(74,222,128,.16);
  color-scheme:dark;display:block;margin:0;
  background:var(--bg);color:var(--ink-2);
  font-family:"Inter",system-ui,-apple-system,"Segoe UI",sans-serif;
  font-size:15px;line-height:1.6;-webkit-font-smoothing:antialiased;
}
.ithdash *{box-sizing:border-box}
.ithdash .ithd{max-width:1060px;margin:0 auto;padding:22px 16px}
.ithdash .panel{border:1px solid var(--line-2);border-radius:16px;background:var(--card);overflow:hidden;
  box-shadow:0 30px 60px -44px rgba(0,0,0,.9)}
.ithdash .bar{display:flex;align-items:center;gap:10px;padding:11px 15px;border-bottom:1px solid var(--line);
  background:linear-gradient(180deg,var(--bg-2),var(--card))}
.ithdash .bar .t{font-family:"Sora",system-ui,sans-serif;font-size:12.5px;font-weight:700;color:var(--ink-2);letter-spacing:.01em}
.ithdash .bar .live{margin-left:auto;display:inline-flex;align-items:center;gap:7px;font-size:10px;font-weight:700;
  letter-spacing:.11em;text-transform:uppercase;color:var(--acc);background:var(--acc-soft);
  border:1px solid var(--acc-soft);padding:4px 10px;border-radius:999px}
.ithdash .bar .live i{width:6px;height:6px;border-radius:50%;background:var(--acc);flex:none;animation:ithPulse 2s ease-in-out infinite}
@keyframes ithPulse{0%,100%{opacity:1;box-shadow:0 0 0 0 var(--acc-soft)}50%{opacity:.55;box-shadow:0 0 0 6px transparent}}
.ithdash .bar .clock{font-family:"Sora",system-ui,sans-serif;font-size:11.5px;font-weight:700;color:var(--ink-3);
  font-variant-numeric:tabular-nums}
.ithdash .lbl{font-size:9.5px;font-weight:700;letter-spacing:.13em;text-transform:uppercase;color:var(--ink-3)}
.ithdash .num{font-family:"Sora",system-ui,sans-serif;font-weight:800;letter-spacing:-.03em;color:var(--ink);
  font-variant-numeric:tabular-nums;line-height:1}
.ithdash .muted{color:var(--ink-3);font-size:11.5px;line-height:1.5}
.ithdash button{font:inherit;color:inherit;background:none;border:0;cursor:pointer}
.ithdash :focus-visible{outline:2px solid var(--acc);outline-offset:2px;border-radius:6px}
@media(prefers-reduced-motion:reduce){.ithdash *{animation:none!important;transition:none!important}}

.ithdash .gauges{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:1px;background:var(--line);
  border-bottom:1px solid var(--line)}
@media(max-width:760px){.ithdash .gauges{grid-template-columns:minmax(0,1fr)}}
.ithdash .g{background:var(--card);padding:16px 14px;text-align:center}
.ithdash .g svg{width:118px;height:118px;display:block;margin:0 auto}
.ithdash .g .ring{fill:none;stroke:var(--line);stroke-width:9}
.ithdash .g .val{fill:none;stroke:var(--acc);stroke-width:9;stroke-linecap:round;
  stroke-dasharray:var(--c);stroke-dashoffset:var(--c);transition:stroke-dashoffset 1.3s var(--ease)}
.ithdash .g.warn .val{stroke:var(--amber)}
.ithdash .g.bad .val{stroke:var(--red)}
.ithdash .g .n{font-family:"Sora",system-ui,sans-serif;font-size:25px;font-weight:800;fill:var(--ink);
  text-anchor:middle;font-variant-numeric:tabular-nums}
.ithdash .g .u{font-size:11px;fill:var(--ink-3);text-anchor:middle}
.ithdash .g h4{margin:9px 0 2px;font-family:"Sora",system-ui,sans-serif;font-size:12.5px;color:var(--ink);font-weight:700}
.ithdash .lines{display:grid;grid-template-columns:minmax(0,1.25fr) minmax(0,1fr)}
@media(max-width:820px){.ithdash .lines{grid-template-columns:minmax(0,1fr)}}
.ithdash .ltab{padding:13px 0;border-right:1px solid var(--line)}
@media(max-width:820px){.ithdash .ltab{border-right:0;border-bottom:1px solid var(--line)}}
.ithdash .lrow{display:grid;grid-template-columns:62px minmax(0,1fr) 78px auto;gap:10px;align-items:center;
  padding:9px 15px;border-top:1px solid var(--line);font-size:12px}
.ithdash .lrow:first-child{border-top:0}
.ithdash .lrow b{font-family:"Sora",system-ui,sans-serif;font-size:12px;color:var(--ink)}
.ithdash .spark{height:26px;display:block;width:100%}
.ithdash .spark path{fill:none;stroke:var(--acc);stroke-width:1.8;stroke-linejoin:round;
  stroke-dasharray:var(--len);stroke-dashoffset:var(--len);transition:stroke-dashoffset 1.4s var(--ease)}
.ithdash .on .spark path{stroke-dashoffset:0}
.ithdash .spark.down path{stroke:var(--red)}
.ithdash .st{font-size:9.5px;font-weight:700;letter-spacing:.07em;text-transform:uppercase;
  padding:3px 9px;border-radius:999px;border:1px solid;text-align:center}
.ithdash .st.run{color:var(--acc);border-color:rgba(74,222,128,.38);background:rgba(74,222,128,.1)}
.ithdash .st.stop{color:var(--red);border-color:rgba(255,138,138,.38);background:rgba(255,138,138,.1)}
.ithdash .st.chg{color:var(--amber);border-color:rgba(245,181,71,.38);background:rgba(245,181,71,.1)}
.ithdash .feed{padding:13px 15px}
.ithdash .feed ul{list-style:none;margin:9px 0 0;padding:0;display:grid;gap:8px;min-height:150px;align-content:start}
.ithdash .feed li{display:grid;grid-template-columns:auto minmax(0,1fr);gap:9px;font-size:11.5px;color:var(--ink-3);
  border-left:2px solid var(--line-2);padding-left:10px}
.ithdash .feed li.fresh{animation:ithIn .5s var(--ease)}
@keyframes ithIn{from{opacity:0;transform:translateX(-8px)}to{opacity:1;transform:none}}
.ithdash .feed li em{font-style:normal;color:var(--ink-2)}
.ithdash .feed li time{font-variant-numeric:tabular-nums;color:var(--ink-3)}
.ithdash .feed li.s{border-left-color:var(--red)}
.ithdash .feed li.g{border-left-color:var(--acc)}
</style>
<div class="ithd">
<div class="panel">
  <div class="bar"><span class="t">Line Performance &middot; RTPPM</span><span class="live"><i></i>Shift running</span><span class="clock" data-clock>14:18</span></div>
  <div class="gauges">
    <div class="g" data-g="87"><svg viewBox="0 0 120 120" role="img" aria-label="Overall equipment effectiveness, 87 per cent."><circle class="ring" cx="60" cy="60" r="48"></circle><circle class="val" cx="60" cy="60" r="48" transform="rotate(-90 60 60)"></circle><text class="n" x="60" y="58" data-count="87" data-suffix="%">0</text><text class="u" x="60" y="76">OEE</text></svg><h4>Overall effectiveness</h4><span class="muted">All running lines</span></div>
    <div class="g warn" data-g="72"><svg viewBox="0 0 120 120" role="img" aria-label="Availability, 72 per cent."><circle class="ring" cx="60" cy="60" r="48"></circle><circle class="val" cx="60" cy="60" r="48" transform="rotate(-90 60 60)"></circle><text class="n" x="60" y="58" data-count="72" data-suffix="%">0</text><text class="u" x="60" y="76">Availability</text></svg><h4>Availability</h4><span class="muted">Six stoppages logged</span></div>
    <div class="g" data-g="98"><svg viewBox="0 0 120 120" role="img" aria-label="Quality, 98 per cent."><circle class="ring" cx="60" cy="60" r="48"></circle><circle class="val" cx="60" cy="60" r="48" transform="rotate(-90 60 60)"></circle><text class="n" x="60" y="58" data-count="98" data-suffix="%">0</text><text class="u" x="60" y="76">Quality</text></svg><h4>Quality</h4><span class="muted">9,400 bottles per hour</span></div>
  </div>
  <div class="lines">
    <div class="ltab" data-lines></div>
    <div class="feed">
      <span class="lbl">Stoppage feed</span>
      <ul data-feed></ul>
    </div>
  </div>
</div>
</div>
<script>
(function () {
  var root = document.currentScript.closest(".ithdash");
  if (!root) return;
  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var $ = function (s, c) { return (c || root).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || root).querySelectorAll(s)); };

  /* count every [data-count] up once, easing out */
  function count(el) {
    var to = parseFloat(el.getAttribute("data-count")), dp = (el.getAttribute("data-dp") | 0);
    if (reduce || !isFinite(to)) { el.textContent = to.toFixed(dp); return; }
    var t0 = null, dur = 1100;
    requestAnimationFrame(function step(now) {
      if (t0 === null) t0 = now;
      var p = Math.min(1, (now - t0) / dur);
      el.textContent = (to * (1 - Math.pow(1 - p, 4))).toFixed(dp);
      if (p < 1) requestAnimationFrame(step);
    });
  }

  /* every timer below is opened on view and torn down off view or on a hidden tab */
  function onView(start, stop) {
    if (reduce || !("IntersectionObserver" in window)) { start(); return; }
    new IntersectionObserver(function (es) {
      es.forEach(function (e) { e.isIntersecting ? start() : stop(); });
    }, { threshold: 0.2 }).observe(root);
    document.addEventListener("visibilitychange", function () { if (document.hidden) stop(); });
  }

  var LINES = [
    ["Line 1", [8,9,9,10,9,10,10,9,10,10], "run", "Running"],
    ["Line 2", [7,8,8,7,8,9,9,8,9,9], "run", "Running"],
    ["Line 3", [9,9,8,4,2,3,7,9,9,9], "stop", "Stopped"],
    ["Line 5", [6,7,7,6,3,4,7,8,8,8], "chg", "Changeover"],
    ["Line 6", [8,8,9,8,7,8,7,8,7,8], "run", "Running"]
  ];
  var FEED = [
    ["s", "Line 3", "Capper starved &middot; infeed jam", "14:12"],
    ["g", "Line 4", "Back up after 4 minutes", "14:04"],
    ["g", "Line 7", "Onboarded to RTPPM", "13:51"],
    ["s", "Line 6", "Capper torque out of band", "13:37"],
    ["g", "Line 2", "Batch complete &middot; 12,480 bottles", "13:18"]
  ];
  var MORE = [
    ["g", "Line 3", "Infeed cleared &middot; cause logged", ""],
    ["s", "Line 5", "Changeover overran by 6 min", ""],
    ["g", "Line 1", "OEE back to 94%", ""],
    ["g", "Line 5", "Clean-down complete", ""],
    ["s", "Line 2", "Labeller speed trimmed", ""]
  ];

  var lt = $("[data-lines]");
  LINES.forEach(function (l) {
    var pts = l[1].map(function (v, i) { return (i * 100 / (l[1].length - 1)) + "," + (26 - v * 2.4); });
    var row = document.createElement("div");
    row.className = "lrow";
    row.innerHTML = "<b>" + l[0] + '</b><svg class="spark ' + (l[2] === "stop" ? "down" : "") +
      '" viewBox="0 0 100 26" preserveAspectRatio="none" aria-hidden="true"><path d="M' + pts.join(" L") +
      '"/></svg><span class="muted">' + (l[1][l[1].length - 1] * 1000).toLocaleString() +
      '/hr</span><span class="st ' + l[2] + '">' + l[3] + "</span>";
    lt.appendChild(row);
  });
  $$(".spark path").forEach(function (p) { p.style.setProperty("--len", p.getTotalLength()); });

  var ul = $("[data-feed]");
  function li(f, fresh) {
    var el = document.createElement("li");
    el.className = f[0] + (fresh ? " fresh" : "");
    el.innerHTML = "<time>" + (f[3] || stamp()) + "</time><span><em>" + f[1] + "</em> &middot; " + f[2] + "</span>";
    return el;
  }
  FEED.forEach(function (f) { ul.appendChild(li(f, false)); });

  var mins = 14 * 60 + 18, at = 0, push = null, clock = null;
  function stamp() { return ("0" + ((mins / 60) | 0)).slice(-2) + ":" + ("0" + (mins % 60)).slice(-2); }

  onView(function () {
    if (push) return;
    root.classList.add("on");
    $$(".g").forEach(function (g) {
      var c = 2 * Math.PI * 48, v = +g.getAttribute("data-g");
      var arc = g.querySelector(".val");
      arc.style.setProperty("--c", c);
      arc.style.strokeDashoffset = c * (1 - v / 100);
    });
    $$("[data-count]").forEach(function (el) {
      var to = +el.getAttribute("data-count"), sfx = el.getAttribute("data-suffix") || "";
      if (reduce) { el.textContent = to + sfx; return; }
      var t0 = null;
      requestAnimationFrame(function s(now) {
        if (t0 === null) t0 = now;
        var p = Math.min(1, (now - t0) / 1200);
        el.textContent = Math.round(to * (1 - Math.pow(1 - p, 4))) + sfx;
        if (p < 1) requestAnimationFrame(s);
      });
    });
    push = setInterval(function () {
      mins = (mins + 3) % 1440;
      ul.insertBefore(li(MORE[at++ % MORE.length], true), ul.firstChild);
      while (ul.children.length > 5) ul.removeChild(ul.lastElementChild);
      $("[data-clock]").textContent = stamp();
    }, 2600);
  }, function () { clearInterval(push); push = null; clearInterval(clock); clock = null; });

})();
</script>
</section>
HTML,
    'imex17-iserv27-digital-factory-performance-monitoring' => <<<'HTML'
<!-- iSERV Smart Service &mdash; dashboard animation. Self-contained fragment: paste it whole into an
     HTML block or the "Animated HTML" field. One section, no document wrapper tags,
     every rule scoped to .ithdash, dark by default. -->
<section class="ithdash ithdash--sites" aria-label="iSERV Smart Service dashboard">
<style>
.ithdash{
  --bg:#0A0A0B;--bg-2:#111113;--card:#17181B;--card-2:#1C1D21;
  --ink:#F2F3F5;--ink-2:rgba(228,230,235,.82);--ink-3:#9A9FA8;
  --line:rgba(255,255,255,.09);--line-2:rgba(255,255,255,.16);
  --brand:#0083C8;--brand-ink:#3FA9E0;--teal:#4FE0D0;--red:#FF8A8A;--amber:#F5B547;
  --chip:rgba(0,131,200,.22);--ease:cubic-bezier(.16,.8,.24,1);
  --acc:#22D3EE;--acc-soft:rgba(34,211,238,.16);
  color-scheme:dark;display:block;margin:0;
  background:var(--bg);color:var(--ink-2);
  font-family:"Inter",system-ui,-apple-system,"Segoe UI",sans-serif;
  font-size:15px;line-height:1.6;-webkit-font-smoothing:antialiased;
}
.ithdash *{box-sizing:border-box}
.ithdash .ithd{max-width:1060px;margin:0 auto;padding:22px 16px}
.ithdash .panel{border:1px solid var(--line-2);border-radius:16px;background:var(--card);overflow:hidden;
  box-shadow:0 30px 60px -44px rgba(0,0,0,.9)}
.ithdash .bar{display:flex;align-items:center;gap:10px;padding:11px 15px;border-bottom:1px solid var(--line);
  background:linear-gradient(180deg,var(--bg-2),var(--card))}
.ithdash .bar .t{font-family:"Sora",system-ui,sans-serif;font-size:12.5px;font-weight:700;color:var(--ink-2);letter-spacing:.01em}
.ithdash .bar .live{margin-left:auto;display:inline-flex;align-items:center;gap:7px;font-size:10px;font-weight:700;
  letter-spacing:.11em;text-transform:uppercase;color:var(--acc);background:var(--acc-soft);
  border:1px solid var(--acc-soft);padding:4px 10px;border-radius:999px}
.ithdash .bar .live i{width:6px;height:6px;border-radius:50%;background:var(--acc);flex:none;animation:ithPulse 2s ease-in-out infinite}
@keyframes ithPulse{0%,100%{opacity:1;box-shadow:0 0 0 0 var(--acc-soft)}50%{opacity:.55;box-shadow:0 0 0 6px transparent}}
.ithdash .bar .clock{font-family:"Sora",system-ui,sans-serif;font-size:11.5px;font-weight:700;color:var(--ink-3);
  font-variant-numeric:tabular-nums}
.ithdash .lbl{font-size:9.5px;font-weight:700;letter-spacing:.13em;text-transform:uppercase;color:var(--ink-3)}
.ithdash .num{font-family:"Sora",system-ui,sans-serif;font-weight:800;letter-spacing:-.03em;color:var(--ink);
  font-variant-numeric:tabular-nums;line-height:1}
.ithdash .muted{color:var(--ink-3);font-size:11.5px;line-height:1.5}
.ithdash button{font:inherit;color:inherit;background:none;border:0;cursor:pointer}
.ithdash :focus-visible{outline:2px solid var(--acc);outline-offset:2px;border-radius:6px}
@media(prefers-reduced-motion:reduce){.ithdash *{animation:none!important;transition:none!important}}

.ithdash .top{display:grid;grid-template-columns:minmax(0,1.4fr) minmax(0,1fr)}
@media(max-width:860px){.ithdash .top{grid-template-columns:minmax(0,1fr)}}
.ithdash .grid{padding:15px;border-right:1px solid var(--line)}
@media(max-width:860px){.ithdash .grid{border-right:0;border-bottom:1px solid var(--line)}}
.ithdash .cells{display:grid;grid-template-columns:repeat(14,minmax(0,1fr));gap:5px;margin-top:10px}
@media(max-width:560px){.ithdash .cells{grid-template-columns:repeat(10,minmax(0,1fr))}}
.ithdash .cell{aspect-ratio:1;border-radius:4px;background:var(--card-2);border:1px solid var(--line);
  opacity:0;transform:scale(.6);transition:opacity .4s var(--ease),transform .4s var(--ease),background .3s,border-color .3s;
  cursor:pointer}
.ithdash .on .cell{opacity:1;transform:none}
.ithdash .cell.up{background:rgba(34,211,238,.24);border-color:rgba(34,211,238,.5)}
.ithdash .cell.warn{background:rgba(245,181,71,.3);border-color:rgba(245,181,71,.6)}
.ithdash .cell.down{background:rgba(255,138,138,.32);border-color:rgba(255,138,138,.65);
  animation:ithAlarm 1.4s ease-in-out infinite}
@keyframes ithAlarm{0%,100%{box-shadow:0 0 0 0 rgba(255,138,138,.5)}50%{box-shadow:0 0 0 5px rgba(255,138,138,0)}}
.ithdash .cell:hover,.ithdash .cell:focus-visible{transform:scale(1.25);z-index:2}
.ithdash .glegend{display:flex;gap:14px;flex-wrap:wrap;margin-top:12px;font-size:11px;color:var(--ink-3)}
.ithdash .glegend s{text-decoration:none;display:inline-flex;align-items:center;gap:6px}
.ithdash .glegend s::before{content:"";width:9px;height:9px;border-radius:3px;background:rgba(34,211,238,.5)}
.ithdash .glegend s.w::before{background:rgba(245,181,71,.7)}
.ithdash .glegend s.d::before{background:rgba(255,138,138,.75)}
.ithdash .rightcol{padding:15px;display:grid;gap:13px;align-content:start}
.ithdash .bigkv{display:flex;align-items:baseline;gap:7px}
.ithdash .bigkv .num{font-size:30px}
.ithdash .bigkv u{text-decoration:none;font-size:15px;color:var(--acc)}
.ithdash .area{width:100%;height:78px;display:block}
.ithdash .area path.ln{fill:none;stroke:var(--acc);stroke-width:2;stroke-dasharray:var(--len);
  stroke-dashoffset:var(--len);transition:stroke-dashoffset 1.6s var(--ease)}
.ithdash .on .area path.ln{stroke-dashoffset:0}
.ithdash .area path.fl{fill:url(#ithGrad);opacity:0;transition:opacity .9s var(--ease) .5s}
.ithdash .on .area path.fl{opacity:1}
.ithdash .sel{border:1px solid var(--line);border-radius:11px;padding:11px 12px;background:var(--bg-2);min-height:86px}
.ithdash .sel b{display:block;font-family:"Sora",system-ui,sans-serif;font-size:13px;color:var(--ink);margin-bottom:3px}
.ithdash .wo{border-top:1px solid var(--line);padding-top:10px;display:grid;gap:7px}
.ithdash .wo div{display:grid;grid-template-columns:auto minmax(0,1fr) auto;gap:9px;align-items:center;font-size:11.5px}
.ithdash .wo i{width:6px;height:6px;border-radius:50%;background:var(--acc);font-style:normal}
.ithdash .wo span{color:var(--ink-2);overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.ithdash .wo b{font-family:"Sora",system-ui,sans-serif;font-size:11px;color:var(--ink-3);font-weight:700}
</style>
<div class="ithd">
<div class="panel">
  <div class="bar"><span class="t">Asset Operations &middot; 1,842 sites</span><span class="live"><i></i>Monitoring</span><span class="clock" data-clock>03:12</span></div>
  <div class="top">
    <div class="grid">
      <span class="lbl">Connected assets &middot; live status</span>
      <div class="cells" data-cells role="img" aria-label="A grid of connected sites; most reporting normally, a few warning, two in alarm."></div>
      <div class="glegend"><s>Reporting</s><s class="w">Warning</s><s class="d">Alarm</s></div>
    </div>
    <div class="rightcol">
      <div>
        <span class="lbl">Uptime &middot; rolling 30 days</span>
        <div class="bigkv"><span class="num" data-count="99.4" data-dp="1">0</span><u>%</u></div>
      </div>
      <svg class="area" viewBox="0 0 200 78" preserveAspectRatio="none" aria-hidden="true">
        <defs><linearGradient id="ithGrad" x1="0" y1="0" x2="0" y2="1">
          <stop offset="0" stop-color="#22D3EE" stop-opacity=".34"></stop>
          <stop offset="1" stop-color="#22D3EE" stop-opacity="0"></stop></linearGradient></defs>
        <path class="fl" data-fill></path><path class="ln" data-line></path>
      </svg>
      <div class="sel" data-sel><b>Site 214 &middot; Power rectifier</b><span class="muted">Temperature has climbed 9&deg;C in four hours. The same pattern preceded the June failure &mdash; work order raised, warranty confirmed.</span></div>
      <div class="wo">
        <div><i></i><span>Predictive alert &middot; 14 days to service</span><b>WO-5521</b></div>
        <div><i></i><span>Logbook digitised on site</span><b>WO-5518</b></div>
        <div><i></i><span>Quarterly inspection scheduled</span><b>WO-5515</b></div>
      </div>
    </div>
  </div>
</div>
</div>
<script>
(function () {
  var root = document.currentScript.closest(".ithdash");
  if (!root) return;
  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var $ = function (s, c) { return (c || root).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || root).querySelectorAll(s)); };

  /* count every [data-count] up once, easing out */
  function count(el) {
    var to = parseFloat(el.getAttribute("data-count")), dp = (el.getAttribute("data-dp") | 0);
    if (reduce || !isFinite(to)) { el.textContent = to.toFixed(dp); return; }
    var t0 = null, dur = 1100;
    requestAnimationFrame(function step(now) {
      if (t0 === null) t0 = now;
      var p = Math.min(1, (now - t0) / dur);
      el.textContent = (to * (1 - Math.pow(1 - p, 4))).toFixed(dp);
      if (p < 1) requestAnimationFrame(step);
    });
  }

  /* every timer below is opened on view and torn down off view or on a hidden tab */
  function onView(start, stop) {
    if (reduce || !("IntersectionObserver" in window)) { start(); return; }
    new IntersectionObserver(function (es) {
      es.forEach(function (e) { e.isIntersecting ? start() : stop(); });
    }, { threshold: 0.2 }).observe(root);
    document.addEventListener("visibilitychange", function () { if (document.hidden) stop(); });
  }

  var N = 98, cells = [], wrap = $("[data-cells]");
  var DOWN = [23, 61], WARN = [7, 30, 44, 72, 88];
  for (var i = 0; i < N; i++) {
    var c = document.createElement("button");
    c.type = "button";
    c.className = "cell " + (DOWN.indexOf(i) > -1 ? "down" : WARN.indexOf(i) > -1 ? "warn" : "up");
    c.style.transitionDelay = (i * 9) + "ms";
    c.setAttribute("aria-label", "Site " + (100 + i));
    wrap.appendChild(c);
    cells.push(c);
  }
  var sel = $("[data-sel]");
  var TXT = {
    down: "In alarm. Rectifier temperature out of band &mdash; work order raised automatically, with the manual attached.",
    warn: "Warning. Cooling fan speed drifting; predictive model puts service inside fourteen days.",
    up: "Reporting normally. KPIs streaming live, last inspection auto-logged and passed."
  };
  cells.forEach(function (c, i) {
    function show() {
      var k = c.classList.contains("down") ? "down" : c.classList.contains("warn") ? "warn" : "up";
      sel.innerHTML = "<b>Site " + (100 + i) + "</b><span class=\"muted\">" + TXT[k] + "</span>";
    }
    c.addEventListener("mouseenter", show);
    c.addEventListener("focus", show);
  });

  /* uptime area, redrawn as the window rolls */
  var line = $("[data-line]"), fill = $("[data-fill]"), series = [], at = 0;
  for (var k = 0; k < 24; k++) series.push(64 + Math.round(Math.sin(k / 2.4) * 8) + (k % 5 === 0 ? -6 : 0));
  function draw() {
    var d = series.map(function (v, j) { return (j * 200 / (series.length - 1)) + "," + (78 - v * 0.92); });
    line.setAttribute("d", "M" + d.join(" L"));
    fill.setAttribute("d", "M" + d.join(" L") + " L200,78 L0,78 Z");
    line.style.setProperty("--len", line.getTotalLength());
  }
  draw();

  var roll = null, mins = 3 * 60 + 12;
  onView(function () {
    if (roll) return;
    root.classList.add("on");
    $$("[data-count]").forEach(count);
    roll = setInterval(function () {
      series.push(series.shift() + (at++ % 3 === 0 ? 3 : -2));
      series[series.length - 1] = Math.max(40, Math.min(76, series[series.length - 1]));
      draw();
      mins = (mins + 1) % 1440;
      $("[data-clock]").textContent = ("0" + ((mins / 60) | 0)).slice(-2) + ":" + ("0" + (mins % 60)).slice(-2);
      var d = cells[DOWN[at % DOWN.length]];
      d.classList.remove("down"); void d.offsetWidth; d.classList.add("down");
    }, 2400);
  }, function () { clearInterval(roll); roll = null; });

})();
</script>
</section>
HTML,
    'cms-modernization-wcag-aria' => <<<'HTML'
<!-- CMS modernization &middot; WCAG / ARIA &mdash; dashboard animation. Self-contained fragment: paste it whole into an
     HTML block or the "Animated HTML" field. One section, no document wrapper tags,
     every rule scoped to .ithdash, dark by default. -->
<section class="ithdash ithdash--a11y" aria-label="CMS modernization &middot; WCAG / ARIA dashboard">
  
  <style>
    .ithdash{
      --bg:#0A0A0B;--bg-2:#111113;--card:#17181B;--card-2:#1C1D21;
      --ink:#F2F3F5;--ink-2:rgba(228,230,235,.82);--ink-3:#9A9FA8;
      --line:rgba(255,255,255,.09);--line-2:rgba(255,255,255,.16);
      --brand:#0083C8;--brand-ink:#3FA9E0;--teal:#4FE0D0;--red:#FF8A8A;--amber:#F5B547;
      --chip:rgba(0,131,200,.22);--ease:cubic-bezier(.16,.8,.24,1);
      --acc:#818CF8;--acc-soft:rgba(129,140,248,.16);
      color-scheme:dark;display:block;margin:0;
      background:var(--bg);color:var(--ink-2);
      font-family:"Inter",system-ui,-apple-system,"Segoe UI",sans-serif;
      font-size:15px;line-height:1.6;-webkit-font-smoothing:antialiased;
    }
    .ithdash *{box-sizing:border-box}
    .ithdash .ithd{max-width:1060px;margin:0 auto;padding:22px 16px}
    .ithdash .panel{border:1px solid var(--line-2);border-radius:16px;background:var(--card);overflow:hidden;
      box-shadow:0 30px 60px -44px rgba(0,0,0,.9)}
    .ithdash .bar{display:flex;align-items:center;gap:10px;padding:11px 15px;border-bottom:1px solid var(--line);
      background:linear-gradient(180deg,var(--bg-2),var(--card))}
    .ithdash .bar .t{font-family:"Sora",system-ui,sans-serif;font-size:12.5px;font-weight:700;color:var(--ink-2);letter-spacing:.01em}
    .ithdash .bar .live{margin-left:auto;display:inline-flex;align-items:center;gap:7px;font-size:10px;font-weight:700;
      letter-spacing:.11em;text-transform:uppercase;color:var(--acc);background:var(--acc-soft);
      border:1px solid var(--acc-soft);padding:4px 10px;border-radius:999px}
    .ithdash .bar .live i{width:6px;height:6px;border-radius:50%;background:var(--acc);flex:none;animation:ithPulse 2s ease-in-out infinite}
    @keyframes ithPulse{0%,100%{opacity:1;box-shadow:0 0 0 0 var(--acc-soft)}50%{opacity:.55;box-shadow:0 0 0 6px transparent}}
    .ithdash .bar .clock{font-family:"Sora",system-ui,sans-serif;font-size:11.5px;font-weight:700;color:var(--ink-3);
      font-variant-numeric:tabular-nums}
    .ithdash .lbl{font-size:9.5px;font-weight:700;letter-spacing:.13em;text-transform:uppercase;color:var(--ink-3)}
    .ithdash .num{font-family:"Sora",system-ui,sans-serif;font-weight:800;letter-spacing:-.03em;color:var(--ink);
      font-variant-numeric:tabular-nums;line-height:1}
    .ithdash .muted{color:var(--ink-3);font-size:11.5px;line-height:1.5}
    .ithdash button{font:inherit;color:inherit;background:none;border:0;cursor:pointer}
    .ithdash :focus-visible{outline:2px solid var(--acc);outline-offset:2px;border-radius:6px}
    @media(prefers-reduced-motion:reduce){.ithdash *{animation:none!important;transition:none!important}}

    .ithdash .score{display:grid;grid-template-columns:auto minmax(0,1fr);gap:20px;align-items:center;
      padding:18px 16px;border-bottom:1px solid var(--line)}
    @media(max-width:640px){.ithdash .score{grid-template-columns:minmax(0,1fr);justify-items:center;text-align:center}}
    .ithdash .ring{width:132px;height:132px;display:block}
    .ithdash .ring circle{fill:none;stroke-width:10}
    .ithdash .ring .bgc{stroke:var(--line)}
    .ithdash .ring .fg{stroke:url(#ithRing);stroke-linecap:round;stroke-dasharray:var(--c);stroke-dashoffset:var(--c);
      transition:stroke-dashoffset 1.6s var(--ease)}
    .ithdash .ring .n{font-family:"Sora",system-ui,sans-serif;font-size:31px;font-weight:800;fill:var(--ink);text-anchor:middle}
    .ithdash .ring .u{font-size:10px;fill:var(--ink-3);text-anchor:middle;letter-spacing:.14em}
    .ithdash .crit{display:grid;gap:9px;width:100%}
    .ithdash .crit div{display:grid;grid-template-columns:130px minmax(0,1fr) 42px;gap:11px;align-items:center;font-size:11.5px}
    @media(max-width:560px){.ithdash .crit div{grid-template-columns:92px minmax(0,1fr) 38px}}
    .ithdash .crit span:first-child{color:var(--ink-2)}
    .ithdash .track{height:6px;border-radius:4px;background:var(--line);overflow:hidden}
    .ithdash .track i{display:block;height:100%;width:0;border-radius:4px;background:linear-gradient(90deg,var(--acc),#34D399);
      transition:width 1.1s var(--ease)}
    .ithdash .crit b{font-family:"Sora",system-ui,sans-serif;font-size:11.5px;color:var(--ink);text-align:right;
      font-variant-numeric:tabular-nums}
    .ithdash .low{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr)}
    @media(max-width:820px){.ithdash .low{grid-template-columns:minmax(0,1fr)}}
    .ithdash .contrast{padding:15px;border-right:1px solid var(--line)}
    @media(max-width:820px){.ithdash .contrast{border-right:0;border-bottom:1px solid var(--line)}}
    .ithdash .swatch{margin-top:10px;border-radius:11px;padding:16px 15px;border:1px solid var(--line);
      background:var(--sw-bg,#2A2C33);color:var(--sw-fg,#7E8593);
      transition:background .7s var(--ease),color .7s var(--ease)}
    .ithdash .swatch b{display:block;font-family:"Sora",system-ui,sans-serif;font-size:15px;margin-bottom:3px}
    .ithdash .ratio{display:flex;align-items:center;gap:9px;margin-top:11px;font-size:12px}
    .ithdash .ratio .v{font-family:"Sora",system-ui,sans-serif;font-weight:800;font-size:19px;color:var(--ink);
      font-variant-numeric:tabular-nums}
    .ithdash .badge{font-size:9.5px;font-weight:700;letter-spacing:.09em;text-transform:uppercase;padding:3px 9px;
      border-radius:999px;border:1px solid;transition:color .4s,border-color .4s,background .4s}
    .ithdash .badge.fail{color:var(--red);border-color:rgba(255,138,138,.4);background:rgba(255,138,138,.1)}
    .ithdash .badge.pass{color:#34D399;border-color:rgba(52,211,153,.4);background:rgba(52,211,153,.12)}
    .ithdash .devices{padding:15px}
    .ithdash .tabs{display:flex;gap:7px;margin-top:9px}
    .ithdash .tabs button{font-size:10.5px;font-weight:700;letter-spacing:.07em;text-transform:uppercase;
      padding:6px 13px;border-radius:999px;border:1px solid var(--line-2);color:var(--ink-3);transition:.25s}
    .ithdash .tabs button[aria-pressed=true]{color:var(--acc);border-color:var(--acc);background:var(--acc-soft)}
    .ithdash .screen{margin-top:12px;border:1px solid var(--line-2);border-radius:10px;background:var(--bg-2);
      height:158px;padding:11px;margin-inline:auto;width:100%;max-width:var(--w,100%);
      transition:max-width .5s var(--ease)}
    .ithdash .screen .b{height:9px;border-radius:3px;background:var(--line-2);margin-bottom:7px}
    .ithdash .screen .b.w60{width:60%}.ithdash .screen .b.w80{width:80%}.ithdash .screen .b.w40{width:40%}
    .ithdash .screen .b.acc{background:var(--acc);opacity:.75}
    .ithdash .screen .cols{display:grid;grid-template-columns:repeat(var(--cols,3),minmax(0,1fr));gap:7px;margin-top:10px;
      transition:grid-template-columns .5s var(--ease)}
    .ithdash .screen .cols i{display:block;height:38px;border-radius:6px;background:var(--card-2);border:1px solid var(--line)}
  </style>
  
  <div class="ithd">
    <div class="panel">
      <div class="bar">
        <span class="t">Accessibility Monitor &middot; 486 pages</span>
        <span class="live"><i></i>Scanning</span>
        <span class="clock" data-clock>10:37</span>
      </div>
      <div class="score">
        <svg class="ring" viewBox="0 0 140 140" role="img" aria-label="Accessibility score, 100 out of 100 at AAA.">
          <defs><linearGradient id="ithRing" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0" stop-color="#818CF8"></stop><stop offset="1" stop-color="#34D399"></stop></linearGradient></defs>
          <circle class="bgc" cx="70" cy="70" r="58"></circle>
          <circle class="fg" cx="70" cy="70" r="58" transform="rotate(-90 70 70)"></circle>
          <text class="n" x="70" y="72" data-count="100">0</text>
          <text class="u" x="70" y="90">AAA SCORE</text>
        </svg>
        <div class="crit" data-crit>
          <div><span>Perceivable</span><span class="track"><i data-w="100"></i></span><b>100</b></div>
          <div><span>Operable</span><span class="track"><i data-w="100"></i></span><b>100</b></div>
          <div><span>Understandable</span><span class="track"><i data-w="100"></i></span><b>100</b></div>
          <div><span>Robust &middot; ARIA</span><span class="track"><i data-w="100"></i></span><b>100</b></div>
          <div><span>Mobile pass</span><span class="track"><i data-w="100"></i></span><b>100</b></div>
        </div>
      </div>
      <div class="low">
        <div class="contrast">
          <span class="lbl">Contrast checker &middot; /newsletters/2026-q1</span>
          <div class="swatch" data-swatch><b>Calculating child support</b>Guidelines, worksheets and the current rate table.</div>
          <div class="ratio"><span class="v" data-ratio>3.9</span><span class="muted">:1</span><span class="badge fail" data-badge>Fails AAA</span></div>
        </div>
        <div class="devices">
          <span class="lbl">Responsive preview</span>
          <div class="tabs" data-tabs>
            <button type="button" aria-pressed="true" data-w="100%" data-cols="3">Desktop</button>
            <button type="button" aria-pressed="false" data-w="60%" data-cols="2">Tablet</button>
            <button type="button" aria-pressed="false" data-w="34%" data-cols="1">Mobile</button>
          </div>
          <div class="screen" data-screen>
            <div class="b acc w40"></div><div class="b w80"></div><div class="b w60"></div>
            <div class="cols"><i></i><i></i><i></i></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
  (function () {
    var root = document.currentScript.closest(".ithdash");
    if (!root) return;
    var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    var $ = function (s, c) { return (c || root).querySelector(s); };
    var $$ = function (s, c) { return Array.prototype.slice.call((c || root).querySelectorAll(s)); };

    /* count every [data-count] up once, easing out */
    function count(el) {
      var to = parseFloat(el.getAttribute("data-count")), dp = (el.getAttribute("data-dp") | 0);
      if (reduce || !isFinite(to)) { el.textContent = to.toFixed(dp); return; }
      var t0 = null, dur = 1100;
      requestAnimationFrame(function step(now) {
        if (t0 === null) t0 = now;
        var p = Math.min(1, (now - t0) / dur);
        el.textContent = (to * (1 - Math.pow(1 - p, 4))).toFixed(dp);
        if (p < 1) requestAnimationFrame(step);
      });
    }

    /* every timer below is opened on view and torn down off view or on a hidden tab */
    function onView(start, stop) {
      if (reduce || !("IntersectionObserver" in window)) { start(); return; }
      new IntersectionObserver(function (es) {
        es.forEach(function (e) { e.isIntersecting ? start() : stop(); });
      }, { threshold: 0.2 }).observe(root);
      document.addEventListener("visibilitychange", function () { if (document.hidden) stop(); });
    }

    var tabs = $$("[data-tabs] button"), screen = $("[data-screen]");
    tabs.forEach(function (b) {
      b.addEventListener("click", function () {
        tabs.forEach(function (o) { o.setAttribute("aria-pressed", String(o === b)); });
        screen.style.setProperty("--w", b.getAttribute("data-w"));
        screen.querySelector(".cols").style.setProperty("--cols", b.getAttribute("data-cols"));
      });
    });

    /* the swatch walks from the failing token to the passing one, and back */
    var sw = $("[data-swatch]"), ratio = $("[data-ratio]"), badge = $("[data-badge]");
    var FAIL = ["#2A2C33", "#7E8593", 3.9], PASS = ["#11131A", "#E8ECF5", 7.4];
    var good = false;
    function flip() {
      good = !good;
      var s = good ? PASS : FAIL;
      sw.style.setProperty("--sw-bg", s[0]);
      sw.style.setProperty("--sw-fg", s[1]);
      ratio.textContent = s[2].toFixed(1);
      badge.textContent = good ? "Passes AAA" : "Fails AAA";
      badge.className = "badge " + (good ? "pass" : "fail");
    }

    var t = null, clock = null, mins = 10 * 60 + 37;
    onView(function () {
      if (t) return;
      root.classList.add("on");
      var c = 2 * Math.PI * 58, fg = $(".ring .fg");
      fg.style.setProperty("--c", c);
      fg.style.strokeDashoffset = 0;
      $$("[data-count]").forEach(count);
      $$("[data-w]", $("[data-crit]")).forEach(function (i, n) {
        i.style.transitionDelay = (n * 110) + "ms";
        i.style.width = i.getAttribute("data-w") + "%";
      });
      t = setInterval(flip, 2800);
      clock = setInterval(function () {
        mins = (mins + 1) % 1440;
        $("[data-clock]").textContent = ("0" + ((mins / 60) | 0)).slice(-2) + ":" + ("0" + (mins % 60)).slice(-2);
      }, 3400);
    }, function () { clearInterval(t); t = null; clearInterval(clock); clock = null; });

  })();
  </script>

</section>
HTML,
    );

    $done = array();
    foreach ($blocks as $slug => $html) {
        $post = get_page_by_path($slug, OBJECT, array('case-study-test', 'post', 'page'));
        if (!$post) { $done[$slug] = 'post not found'; continue; }
        // update_post_meta, not the editor: wp_kses would strip the <script> for any
        // user without unfiltered_html, and the animation needs it.
        update_post_meta($post->ID, 'cs_console_html', $html);
        update_post_meta($post->ID, 'cs_console_enable', 1);
        update_post_meta($post->ID, '_cs_console_html', 'field_cs_console_html');
        $done[$slug] = 'ok (#' . $post->ID . ')';
    }
    update_option('ith_console_html_import_log', $done);
});

// Shows what happened, once, at the top of wp-admin.
add_action('admin_notices', function () {
    $log = get_option('ith_console_html_import_log');
    if (!$log) return;
    delete_option('ith_console_html_import_log');
    echo '<div class="notice notice-info"><p><b>Console HTML import</b></p><ul>';
    foreach ($log as $slug => $res) echo '<li>' . esc_html($slug . ' - ' . $res) . '</li>';
    echo '</ul></div>';
});
