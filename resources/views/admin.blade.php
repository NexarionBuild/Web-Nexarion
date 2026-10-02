<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>NEXARION — Admin Control Center</title>
<meta name="robots" content="noindex,nofollow">
<meta name="theme-color" content="#05080a">
<script>(function(){try{if(localStorage.getItem('nx-theme')==='light')document.documentElement.setAttribute('data-theme','light')}catch(e){}})();</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js" defer></script>
<style>
/* ============ DESIGN TOKENS (identik dengan situs publik) ============ */
:root{
  --bg:#05080a; --bg2:#070b0d; --surface:#0b1014; --surface2:#0e151a;
  --line:rgba(235,245,245,.09); --line2:rgba(235,245,245,.2);
  --text:#e9eef2; --muted:#94a2ab; --faint:#5d6b74;
  --accent:#25e6c0; --accent2:#8cf2de; --accent-ink:#04211a;
  --accent-dim:rgba(37,230,192,.1);
  --err:#ff7a76; --warn:#ffcf7a;
  --font-d:'Space Grotesk',sans-serif; --font-b:'Manrope',sans-serif;
  --ease:cubic-bezier(.22,.61,.2,1);
  --radius:18px; --radius-s:12px;
  --sh:0 24px 60px -24px rgba(0,0,0,.55);
}
[data-theme="light"]{
  --bg:#f2f5f4; --bg2:#ecf0ef; --surface:#ffffff; --surface2:#f6f9f8;
  --line:rgba(8,22,22,.1); --line2:rgba(8,22,22,.22);
  --text:#0c1418; --muted:#4d5c64; --faint:#7c898f;
  --accent:#0a9d80; --accent2:#0a9d80; --accent-ink:#ffffff;
  --accent-dim:rgba(10,157,128,.09);
  --err:#c73a35; --warn:#a3741b;
  --sh:0 24px 60px -30px rgba(10,30,30,.25);
}
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
html{-webkit-text-size-adjust:100%}
body{background:var(--bg);color:var(--text);font-family:var(--font-b);font-size:15.5px;line-height:1.6;overflow-x:hidden;transition:background-color .4s var(--ease),color .4s var(--ease)}
img{max-width:100%;display:block}
a{color:inherit;text-decoration:none}
button{font:inherit;color:inherit;background:none;border:0;cursor:pointer}
ul,ol{list-style:none}
::selection{background:var(--accent);color:var(--accent-ink)}
:focus-visible{outline:2px solid var(--accent);outline-offset:2px;border-radius:4px}
::-webkit-scrollbar{width:10px;height:10px}
::-webkit-scrollbar-thumb{background:var(--surface2);border-radius:8px;border:2px solid var(--bg)}
.ic{fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round;flex:none}
h1,h2,h3,h4{font-family:var(--font-d);font-weight:700;line-height:1.12;letter-spacing:-.01em}
.kicker{font-family:var(--font-d);font-size:.72rem;font-weight:600;letter-spacing:.22em;text-transform:uppercase;color:var(--accent);display:flex;align-items:center;gap:.8rem}
.kicker::before{content:"";width:22px;height:1px;background:var(--accent)}
.mono{font-family:var(--font-d);letter-spacing:.08em;font-size:.72rem;font-weight:500;color:var(--faint);text-transform:uppercase}
.lead{color:var(--muted)}
.footnote{margin-top:1rem;font-size:.78rem;color:var(--faint)}
/* ticks dekoratif */
.ticks{position:absolute;inset:0;pointer-events:none}
.ticks i{position:absolute;width:12px;height:12px;border:1px solid var(--line2)}
.ticks i:nth-child(1){top:0;left:0;border-width:1px 0 0 1px}
.ticks i:nth-child(2){top:0;right:0;border-width:1px 1px 0 0}
.ticks i:nth-child(3){bottom:0;left:0;border-width:0 0 1px 1px}
.ticks i:nth-child(4){bottom:0;right:0;border-width:0 1px 1px 0}
/* ============ BUTTONS ============ */
.btn{display:inline-flex;align-items:center;gap:.55rem;font-family:var(--font-d);font-weight:600;font-size:.88rem;padding:.72rem 1.35rem;border-radius:999px;border:1px solid transparent;transition:transform .3s var(--ease),background .25s,border-color .25s,color .25s,box-shadow .3s;white-space:nowrap}
.btn-p{background:var(--accent);color:var(--accent-ink)}
.btn-p:hover{transform:translateY(-2px);box-shadow:0 10px 26px -10px var(--accent)}
.btn-g{border-color:var(--line2);color:var(--text)}
.btn-g:hover{border-color:var(--accent);color:var(--accent);transform:translateY(-2px)}
.btn-d{background:var(--err);color:#fff}
.btn-d:hover{transform:translateY(-2px);box-shadow:0 10px 26px -10px var(--err)}
.btn-sm{padding:.5rem 1rem;font-size:.8rem}
.btn:disabled{opacity:.5;pointer-events:none}
.magnetic{display:inline-flex}
.mag-in{display:inline-flex;align-items:center;gap:.55rem;transition:transform .2s ease-out}
.icon-btn{width:38px;height:38px;border-radius:50%;border:1px solid var(--line2);display:grid;place-items:center;color:var(--muted);transition:color .25s,border-color .25s,transform .3s var(--ease)}
.icon-btn:hover{color:var(--accent);border-color:var(--accent)}
.icon-btn.act:hover{transform:translateY(-2px)}
.icon-btn.danger:hover{color:var(--err);border-color:var(--err)}
.icon-btn.starred{color:var(--warn);border-color:var(--warn)}
/* ============ LOGIN ============ */
.login{min-height:100vh;display:grid;grid-template-columns:1.05fr .95fr}
.l-visual{position:relative;overflow:hidden;border-right:1px solid var(--line);background:var(--bg2);display:flex;align-items:flex-end;padding:clamp(28px,4vw,56px)}
.l-visual .l3d{position:absolute;inset:0;cursor:grab}
.l-visual .l3d:active{cursor:grabbing}
.l-visual .l3d canvas{width:100%!important;height:100%!important;display:block}
.l-copy{position:relative;z-index:2;pointer-events:none}
.l-copy .brand{display:flex;align-items:center;gap:.7rem;font-family:var(--font-d);font-weight:700;letter-spacing:.14em;margin-bottom:1.6rem}
.brand-mark{width:34px;height:34px;border:1px solid var(--accent);border-radius:9px;display:grid;place-items:center;color:var(--accent);flex:none}
.brand-mark svg{width:16px;height:16px}
.brand-mark img{width:100%;height:100%;object-fit:contain;display:block;border-radius:7px}
.l-copy h1{font-size:clamp(2rem,4vw,3.4rem);text-transform:uppercase;line-height:1.05}
.l-copy h1 span{color:transparent;-webkit-text-stroke:1.2px var(--text)}
.l-copy p{color:var(--muted);max-width:44ch;margin-top:1rem}
.l-stats{display:flex;gap:2rem;margin-top:2rem}
.l-stats div b{font-family:var(--font-d);font-size:1.4rem;display:block}
.l-stats div span{font-size:.78rem;color:var(--faint)}
/* Live clock — versi hero (login) */
.l-clock{margin-top:2.2rem;border-left:2px solid var(--accent);padding-left:1.1rem;display:flex;flex-direction:column;gap:.15rem}
.l-clock b{font-family:var(--font-d);font-size:clamp(1.7rem,2.8vw,2.3rem);font-weight:600;letter-spacing:.05em;font-variant-numeric:tabular-nums;line-height:1.1}
.l-clock span{font-family:var(--font-d);font-size:.74rem;letter-spacing:.16em;text-transform:uppercase;color:var(--faint)}
.l-form{display:grid;place-items:center;padding:clamp(24px,4vw,48px);position:relative}
.l-theme{position:absolute;top:20px;right:20px}
.l-card{width:min(420px,100%);border:1px solid var(--line);border-radius:calc(var(--radius) + 4px);background:color-mix(in srgb,var(--surface) 88%,transparent);backdrop-filter:blur(12px);padding:clamp(28px,3.5vw,44px);position:relative;box-shadow:var(--sh);transition:border-color .4s,box-shadow .4s;transform-style:preserve-3d}
.l-card.err-state{border-color:var(--err);animation:shake .5s var(--ease);box-shadow:0 0 0 1px var(--err),var(--sh)}
@keyframes shake{0%,100%{transform:translateX(0)}15%{transform:translateX(-10px)}30%{transform:translateX(9px)}45%{transform:translateX(-7px)}60%{transform:translateX(5px)}75%{transform:translateX(-3px)}}
.l-card h2{font-size:1.6rem;text-transform:uppercase;margin:1.2rem 0 .4rem}
.l-card .lsub{color:var(--muted);font-size:.9rem;margin-bottom:1.6rem}
.l-err{display:none;align-items:flex-start;gap:.7rem;background:rgba(255,122,118,.1);border:1px solid var(--err);border-radius:var(--radius-s);padding:.85rem 1rem;font-size:.85rem;color:var(--err);margin-bottom:1.2rem}
.l-err.show{display:flex;animation:errIn .4s var(--ease)}
.l-err b{display:block;font-family:var(--font-d);font-size:.8rem;letter-spacing:.06em;text-transform:uppercase;margin-bottom:.15rem}
@keyframes errIn{from{opacity:0;transform:translateY(-8px)}to{opacity:1}}
.l-err .ic{margin-top:.15em}
.inwrap{position:relative}
.inwrap>.ic{position:absolute;left:1rem;top:50%;transform:translateY(-50%);color:var(--faint);pointer-events:none}
.inwrap .peek{position:absolute;right:.5rem;top:50%;transform:translateY(-50%);width:32px;height:32px;display:grid;place-items:center;color:var(--faint);border-radius:8px}
.inwrap .peek:hover{color:var(--accent)}
.field{display:flex;flex-direction:column;gap:.45rem;margin-bottom:1.05rem}
.field label{font-family:var(--font-d);font-size:.74rem;letter-spacing:.1em;text-transform:uppercase;color:var(--muted)}
.field label b{color:var(--accent)}
input,select,textarea{background:var(--bg2);border:1px solid var(--line);border-radius:var(--radius-s);padding:.8rem 1rem;color:var(--text);font:inherit;font-size:.93rem;transition:border-color .3s,box-shadow .3s;width:100%;appearance:none}
.inwrap input{padding-left:2.7rem}
.inwrap.has-peek input{padding-right:2.9rem}
input:focus,select:focus,textarea:focus{outline:none;border-color:var(--accent);box-shadow:0 0 0 3px var(--accent-dim)}
textarea{resize:vertical;min-height:90px}
.field.err input,.field.err select,.field.err textarea{border-color:var(--err)}
.f-err{font-size:.75rem;color:var(--err);display:none}
.field.err .f-err{display:block}
.field-help{font-size:.75rem;color:var(--faint);line-height:1.45;margin-top:.05rem}
.field-help strong{color:var(--muted);font-weight:600}
.field-help code{font-family:ui-monospace,Menlo,monospace;color:var(--muted);background:var(--bg2);border:1px solid var(--line);border-radius:5px;padding:.05rem .3rem}
.form-note{grid-column:1/-1;border:1px dashed var(--line2);border-radius:10px;padding:.7rem .85rem;color:var(--faint);font-size:.77rem;line-height:1.5;background:var(--bg2)}
.l-row{display:flex;justify-content:space-between;align-items:center;margin:-.2rem 0 1.3rem;font-size:.85rem}
.ck{display:flex;align-items:center;gap:.55rem;color:var(--muted);cursor:pointer;user-select:none}
.ck input{width:16px;height:16px;accent-color:var(--accent);padding:0}
.l-cred{margin-top:1.4rem;border-top:1px dashed var(--line2);padding-top:1rem;font-size:.78rem;color:var(--faint);display:flex;gap:.5rem;align-items:flex-start}
.l-cred .ic{color:var(--accent);margin-top:.1em}
.l-cred code{font-family:ui-monospace,Menlo,monospace;color:var(--muted);background:var(--bg2);border:1px solid var(--line);border-radius:6px;padding:.05rem .4rem}
/* ============ SHELL ============ */
.shell{display:grid;grid-template-columns:264px 1fr;min-height:100vh}
.side{border-right:1px solid var(--line);background:var(--bg2);position:sticky;top:0;height:100vh;display:flex;flex-direction:column;z-index:60;transition:transform .45s var(--ease)}
.side-head{padding:1.3rem 1.4rem;border-bottom:1px solid var(--line);display:flex;align-items:center;gap:.7rem}
.side-head .brand{font-family:var(--font-d);font-weight:700;letter-spacing:.12em;font-size:.95rem}
.side-head small{display:block;font-family:var(--font-d);font-size:.62rem;letter-spacing:.28em;color:var(--accent)}
.side-nav{flex:1;overflow-y:auto;padding:1.1rem .9rem}
.sn-sec{font-family:var(--font-d);font-size:.64rem;letter-spacing:.26em;text-transform:uppercase;color:var(--faint);padding:1rem .7rem .5rem}
.sn-item{display:flex;align-items:center;gap:.8rem;padding:.62rem .8rem;border-radius:11px;color:var(--muted);font-family:var(--font-d);font-size:.87rem;font-weight:500;position:relative;transition:color .25s,background .25s,transform .3s var(--ease);width:100%;text-align:left}
.sn-item .ic{transition:transform .3s var(--ease)}
.sn-item:hover{color:var(--text);background:var(--accent-dim);transform:translateX(3px)}
.sn-item.on{color:var(--accent);background:var(--accent-dim)}
.sn-item.on::before{content:"";position:absolute;left:-.9rem;top:20%;bottom:20%;width:3px;border-radius:3px;background:var(--accent)}
.sn-item.on .ic{transform:scale(1.1)}
.sn-badge{margin-left:auto;font-family:var(--font-d);font-size:.66rem;font-weight:700;background:var(--accent);color:var(--accent-ink);border-radius:999px;padding:.1rem .5rem;min-width:20px;text-align:center}
.sn-badge.zero{display:none}
.side-foot{border-top:1px solid var(--line);padding:1rem 1.1rem;display:flex;align-items:center;gap:.8rem}
.ava{width:38px;height:38px;border-radius:50%;background:var(--accent-dim);border:1px solid var(--accent);color:var(--accent);display:grid;place-items:center;font-family:var(--font-d);font-weight:700;flex:none}
.side-foot b{font-family:var(--font-d);font-size:.85rem;display:block;line-height:1.2}
.side-foot span{font-size:.72rem;color:var(--faint)}
.side-foot .icon-btn{margin-left:auto}
.main{display:flex;flex-direction:column;min-width:0;position:relative}
.orb{position:absolute;border-radius:50%;filter:blur(60px);pointer-events:none;will-change:transform}
.orb-a{width:420px;height:420px;background:radial-gradient(circle,var(--accent-dim),transparent 65%);top:-120px;right:8%}
.orb-b{width:340px;height:340px;background:radial-gradient(circle,rgba(140,242,222,.05),transparent 65%);bottom:6%;left:-100px}
.topbar{position:sticky;top:0;z-index:50;display:flex;align-items:center;gap:1rem;padding:.9rem clamp(18px,3vw,36px);border-bottom:1px solid var(--line);background:color-mix(in srgb,var(--bg) 82%,transparent);backdrop-filter:blur(14px)}
.topbar h1{font-size:1.05rem;text-transform:uppercase}
.topbar .crumb{display:flex;align-items:center;gap:.6rem}
.topbar .crumb .ic{color:var(--faint)}
.top-right{margin-left:auto;display:flex;align-items:center;gap:.6rem}
.kbd-hint{display:flex;align-items:center;gap:.55rem;border:1px solid var(--line2);border-radius:999px;padding:.5rem .9rem;color:var(--muted);font-size:.82rem;transition:border-color .25s,color .25s}
.kbd-hint:hover{border-color:var(--accent);color:var(--accent)}
.kbd-hint kbd{font-family:var(--font-d);font-size:.66rem;border:1px solid var(--line2);border-bottom-width:2px;border-radius:5px;padding:.08rem .35rem;color:var(--faint)}
/* Live clock — pill di topbar */
.clock-chip{display:flex;align-items:center;gap:.6rem;border:1px solid var(--line2);border-radius:999px;padding:.5rem .95rem;font-family:var(--font-d);color:var(--muted)}
.clock-chip .c-time{color:var(--text);font-size:.86rem;letter-spacing:.05em;font-variant-numeric:tabular-nums}
.clock-chip .c-date{font-size:.7rem;letter-spacing:.1em;text-transform:uppercase;color:var(--faint)}
.clock-chip .c-dot{width:5px;height:5px;border-radius:50%;background:var(--accent);animation:blink 2s ease-in-out infinite}
@keyframes blink{50%{opacity:.2}}
.content{padding:clamp(20px,3.4vw,42px) clamp(18px,3.4vw,44px) 80px;max-width:1280px;width:100%;margin-inline:auto;position:relative;z-index:1}
.pin{animation:pIn .55s var(--ease) both;animation-delay:var(--d,0s)}
@keyframes pIn{from{opacity:0;transform:translateY(18px) perspective(900px) rotateX(2deg)}to{opacity:1;transform:none}}
.page-head{display:flex;justify-content:space-between;align-items:flex-end;gap:1.2rem;flex-wrap:wrap;margin-bottom:1.6rem}
.page-head h1{font-size:clamp(1.5rem,3vw,2.1rem);text-transform:uppercase;margin:.5rem 0 .3rem}
.page-actions{display:flex;gap:.7rem;align-items:center;flex-wrap:wrap}
.search-inline{display:flex;align-items:center;gap:.55rem;border:1px solid var(--line2);border-radius:999px;padding:.55rem 1.05rem;background:var(--surface)}
.search-inline input{background:none;border:0;padding:.1rem 0;font-size:.88rem;min-width:180px}
.search-inline input:focus{outline:none;box-shadow:none}
.search-inline .ic{color:var(--faint)}
/* ============ PANELS / STATS ============ */
.panel{border:1px solid var(--line);border-radius:var(--radius);background:var(--surface);padding:clamp(18px,2.4vw,28px);position:relative;transition:border-color .3s}
.panel h3{font-size:.95rem;text-transform:uppercase;letter-spacing:.04em;margin-bottom:1.1rem;display:flex;align-items:center;gap:.6rem}
.panel h3 .ic{color:var(--accent)}
.stat-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:clamp(12px,1.6vw,18px);margin-bottom:1.6rem}
.stat-card{border:1px solid var(--line);border-radius:var(--radius);background:var(--surface);padding:1.3rem 1.4rem;position:relative;overflow:hidden;transition:border-color .3s;transform-style:preserve-3d}
.stat-card:hover{border-color:var(--line2)}
.stat-card .sc-top{display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem}
.stat-card .sc-ic{width:40px;height:40px;border-radius:11px;border:1px solid var(--line2);display:grid;place-items:center;color:var(--accent)}
.stat-card b{font-family:var(--font-d);font-weight:700;font-size:clamp(1.7rem,2.6vw,2.3rem);line-height:1;display:block}
.stat-card b small{font-size:.85rem;color:var(--faint);font-weight:500}
.stat-card span{color:var(--muted);font-size:.84rem}
.stat-card.alert b{color:var(--warn)}
.dash-grid{display:grid;grid-template-columns:1.5fr 1fr;gap:clamp(14px,1.8vw,20px)}
.dash-grid .panel{min-width:0}
.qa-grid{display:grid;grid-template-columns:1fr 1fr;gap:.7rem}
.qa{display:flex;align-items:center;gap:.8rem;border:1px solid var(--line);border-radius:var(--radius-s);padding:.85rem 1rem;font-family:var(--font-d);font-size:.85rem;font-weight:600;color:var(--muted);transition:all .3s var(--ease);text-align:left}
.qa .ic{color:var(--accent)}
.qa:hover{border-color:var(--accent);color:var(--accent);transform:translateY(-3px);background:var(--accent-dim)}
.act-list li{display:flex;gap:.9rem;padding:.75rem 0;border-bottom:1px solid var(--line);align-items:flex-start;font-size:.88rem}
.act-list li:last-child{border-bottom:0}
.act-ic{width:30px;height:30px;border-radius:9px;border:1px solid var(--line2);display:grid;place-items:center;color:var(--accent);flex:none;margin-top:.1em}
.act-ic.bad{color:var(--err)}
.act-ic.warn{color:var(--warn)}
.act-list p b{font-family:var(--font-d);font-weight:600}
.act-list time{font-size:.72rem;color:var(--faint);display:block}
canvas.chart{width:100%;height:220px;display:block}
.sys-row{display:flex;justify-content:space-between;padding:.55rem 0;border-bottom:1px solid var(--line);font-size:.86rem}
.sys-row:last-child{border:0}
.sys-row span{color:var(--faint)}
.sys-row b{font-family:var(--font-d);font-weight:600}
/* ============ TABLE ============ */
.twrap{overflow-x:auto;margin:0 -6px;padding:0 6px}
table.tbl{width:100%;border-collapse:collapse;min-width:640px}
.tbl th{font-family:var(--font-d);font-size:.68rem;letter-spacing:.16em;text-transform:uppercase;color:var(--faint);text-align:left;padding:.7rem .8rem;border-bottom:1px solid var(--line2);white-space:nowrap}
.tbl td{padding:.85rem .8rem;border-bottom:1px solid var(--line);font-size:.9rem;vertical-align:middle}
.tbl tbody tr{transition:background .25s,transform .3s var(--ease)}
.tbl tbody tr:hover{background:var(--accent-dim)}
.tbl tbody tr{animation:rowIn .45s var(--ease) both;animation-delay:calc(var(--r,0)*.045s)}
@keyframes rowIn{from{opacity:0;transform:translateX(-10px)}to{opacity:1}}
.td-title{font-family:var(--font-d);font-weight:600}
.td-clamp{color:var(--muted);font-size:.85rem;max-width:340px;display:-webkit-box;-webkit-line-clamp:1;-webkit-box-orient:vertical;overflow:hidden}
.timg{width:64px;height:44px;object-fit:cover;border-radius:8px;border:1px solid var(--line)}
.tagchips{display:flex;gap:.35rem;flex-wrap:wrap;max-width:260px}
.tagchips i{font-style:normal;font-family:var(--font-d);font-size:.66rem;letter-spacing:.04em;border:1px solid var(--line);border-radius:999px;padding:.18rem .55rem;color:var(--muted)}
.bdg{font-family:var(--font-d);font-size:.68rem;font-weight:600;letter-spacing:.08em;text-transform:uppercase;border-radius:999px;padding:.24rem .7rem;border:1px solid var(--line2);color:var(--muted);white-space:nowrap}
.bdg.ok{color:var(--accent);border-color:var(--accent);background:var(--accent-dim)}
.bdg.mut{color:var(--faint)}
.td-act{white-space:nowrap;text-align:right;min-width:286px}
.row-actions{display:flex;align-items:center;justify-content:flex-end;gap:.42rem;white-space:nowrap}
.action-group{display:inline-flex;align-items:center;gap:.28rem;padding:.24rem;border:1px solid var(--line);border-radius:11px;background:var(--bg2)}
.action-btn{height:32px;min-width:32px;border:1px solid transparent;border-radius:8px;padding:.35rem .55rem;display:inline-flex;align-items:center;justify-content:center;gap:.35rem;color:var(--muted);font-family:var(--font-d);font-size:.68rem;font-weight:600;letter-spacing:.03em;transition:color .2s,border-color .2s,background .2s,transform .2s}
.action-btn:hover{color:var(--accent);border-color:var(--accent);background:var(--accent-dim);transform:translateY(-1px)}
.action-btn.primary{color:var(--accent);background:var(--accent-dim)}
.action-btn.danger:hover{color:var(--err);border-color:var(--err);background:rgba(255,122,118,.08)}
.action-btn:disabled{opacity:.3;cursor:not-allowed;transform:none;background:transparent;border-color:transparent}
.action-btn .act-label{line-height:1}
.action-sep{width:1px;height:20px;background:var(--line2);margin:0 .08rem}
.tbl th.th-actions{text-align:right;padding-right:1rem}
@media(max-width:760px){
  .td-act{min-width:190px}
  .action-btn{padding:.35rem;width:32px}
  .action-btn .act-label{display:none}
  .action-group{gap:.18rem;padding:.18rem}
}
.count-pill{font-family:var(--font-d);font-size:.72rem;border:1px solid var(--line2);border-radius:999px;padding:.2rem .7rem;color:var(--muted)}
.empty{border:1px dashed var(--line2);border-radius:var(--radius);padding:3rem 1.5rem;text-align:center;color:var(--muted)}
.empty .ic{color:var(--accent);margin-bottom:.8rem}
.empty h3{text-transform:uppercase;margin-bottom:.4rem}
/* ============ MODAL ============ */
.modal-bd{position:fixed;inset:0;background:rgba(3,6,8,.72);backdrop-filter:blur(8px);z-index:200;display:grid;place-items:center;padding:18px;opacity:0;transition:opacity .35s}
.modal-bd.show{opacity:1}
.modal{background:var(--surface);border:1px solid var(--line2);border-radius:var(--radius);width:100%;max-height:90vh;overflow:auto;transform:translateY(26px) perspective(900px) rotateX(6deg);transition:transform .45s var(--ease);position:relative;box-shadow:var(--sh)}
.modal-bd.show .modal{transform:none}
.modal.frm{max-width:680px}
.modal.sm{max-width:440px}
.modal.mw{max-width:560px}
.modal-head{display:flex;align-items:flex-start;gap:1rem;padding:clamp(20px,3vw,30px) clamp(20px,3vw,30px) 0}
.modal-head h3{font-size:1.2rem;text-transform:uppercase}
.modal-head .msub{color:var(--muted);font-size:.87rem;margin-top:.2rem}
.modal-x{margin-left:auto;width:36px;height:36px;border-radius:50%;border:1px solid var(--line2);display:grid;place-items:center;color:var(--muted);flex:none}
.modal-x:hover{color:var(--accent);border-color:var(--accent)}
.modal-body{padding:clamp(18px,3vw,28px)}
.modal-foot{display:flex;gap:.7rem;justify-content:flex-end;padding:0 clamp(20px,3vw,30px) clamp(20px,3vw,28px)}
.form-grid{display:grid;grid-template-columns:1fr 1fr;gap:1rem}
.field.full{grid-column:1/-1}
.confirm-ic{width:64px;height:64px;border-radius:50%;display:grid;place-items:center;margin-bottom:1.1rem}
.confirm-ic.bad{background:rgba(255,122,118,.12);border:1px solid var(--err);color:var(--err)}
.confirm-ic.ok{background:var(--accent-dim);border:1px solid var(--accent);color:var(--accent)}
/* ============ TOAST ============ */
#toast-root{position:fixed;bottom:24px;right:24px;z-index:400;display:flex;flex-direction:column;gap:.6rem;align-items:flex-end;pointer-events:none}
.toast{background:var(--surface);border:1px solid var(--accent);color:var(--text);border-radius:14px;padding:.85rem 1.25rem;font-size:.88rem;display:flex;gap:.65rem;align-items:center;box-shadow:var(--sh);min-width:260px;position:relative;overflow:hidden;animation:tIn .45s var(--ease);pointer-events:auto}
.toast.out{opacity:0;transform:translateX(20px);transition:all .4s}
.toast .ic{color:var(--accent)}
.toast.error{border-color:var(--err)}
.toast.error .ic{color:var(--err)}
.toast .bar{position:absolute;bottom:0;left:0;height:2px;background:var(--accent);animation:tbar 3.6s linear forwards}
.toast.error .bar{background:var(--err)}
@keyframes tIn{from{opacity:0;transform:translateY(16px) scale(.96)}to{opacity:1}}
@keyframes tbar{from{width:100%}to{width:0}}
/* ============ COMMAND PALETTE ============ */
.pal-bd{position:fixed;inset:0;background:rgba(3,6,8,.7);backdrop-filter:blur(8px);z-index:300;display:flex;justify-content:center;align-items:flex-start;padding:14vh 20px 20px;opacity:0;transition:opacity .3s}
.pal-bd.show{opacity:1}
.pal{width:min(560px,100%);background:var(--surface);border:1px solid var(--line2);border-radius:var(--radius);overflow:hidden;box-shadow:var(--sh);transform:translateY(-14px) scale(.98);transition:transform .35s var(--ease)}
.pal-bd.show .pal{transform:none}
.pal-in{display:flex;align-items:center;gap:.7rem;padding:1rem 1.2rem;border-bottom:1px solid var(--line)}
.pal-in input{background:none;border:0;padding:0;font-size:1rem}
.pal-in input:focus{outline:none;box-shadow:none}
.pal-list{max-height:320px;overflow-y:auto;padding:.5rem}
.pal-item{display:flex;align-items:center;gap:.8rem;padding:.65rem .85rem;border-radius:10px;cursor:pointer;font-size:.9rem;color:var(--muted)}
.pal-item .ic{color:var(--faint)}
.pal-item small{margin-left:auto;font-family:var(--font-d);font-size:.66rem;letter-spacing:.1em;text-transform:uppercase;color:var(--faint)}
.pal-item.sel{background:var(--accent-dim);color:var(--text)}
.pal-item.sel .ic{color:var(--accent)}
.pal-empty{padding:2rem;text-align:center;color:var(--faint);font-size:.88rem}
/* ============ MESSAGES ============ */
.msg{border:1px solid var(--line);border-radius:var(--radius);background:var(--surface);margin-bottom:.8rem;overflow:hidden;transition:border-color .3s;animation:rowIn .45s var(--ease) both;animation-delay:calc(var(--r,0)*.05s)}
.msg:hover{border-color:var(--line2)}
.msg.unread{border-left:3px solid var(--accent)}
.msg-head{display:flex;align-items:center;gap:1rem;padding:1rem 1.2rem;width:100%;text-align:left}
.msg-head .ava{width:36px;height:36px;font-size:.8rem}
.msg-head b{font-family:var(--font-d);font-size:.92rem;display:block}
.msg-head span{font-size:.78rem;color:var(--faint)}
.msg-head .subj{color:var(--muted);font-size:.88rem}
.msg-head time{margin-left:auto;font-size:.74rem;color:var(--faint);white-space:nowrap}
.msg-acts{display:flex;gap:.3rem;opacity:0;transition:opacity .25s}
.msg:hover .msg-acts,.msg.open .msg-acts{opacity:1}
.msg-body{max-height:0;overflow:hidden;transition:max-height .45s var(--ease)}
.msg.open .msg-body{max-height:400px}
.msg-body-inner{padding:0 1.2rem 1.2rem;color:var(--muted);font-size:.9rem;border-top:1px dashed var(--line);padding-top:1rem;white-space:pre-wrap}
/* ============ MAINTENANCE ============ */
.mt-grid{display:grid;grid-template-columns:1fr 1fr;gap:clamp(14px,2vw,22px)}
.switch-big{width:74px;height:40px;border-radius:999px;border:1px solid var(--line2);background:var(--bg2);position:relative;transition:background .35s,border-color .35s;flex:none}
.switch-big i{position:absolute;top:4px;left:4px;width:30px;height:30px;border-radius:50%;background:var(--faint);transition:transform .4s var(--ease),background .35s}
.switch-big.on{background:var(--accent-dim);border-color:var(--accent)}
.switch-big.on i{transform:translateX(34px);background:var(--accent)}
.mt-state{display:flex;align-items:center;gap:1.1rem}
.mt-state b{font-family:var(--font-d);font-size:1.15rem;text-transform:uppercase;display:block}
.mt-state span{font-size:.82rem;color:var(--muted)}
.preview-mt{border:1px solid var(--line);border-radius:var(--radius);background:var(--bg2);padding:3rem 1.5rem;text-align:center;position:relative;overflow:hidden}
.preview-mt .pbar{width:180px;height:2px;background:var(--line);margin:1.4rem auto 0;position:relative;overflow:hidden;border-radius:2px}
.preview-mt .pbar::after{content:"";position:absolute;top:0;left:-40%;width:40%;height:100%;background:var(--accent);animation:scan 1.6s var(--ease) infinite}
@keyframes scan{to{left:110%}}
.codebox{font-family:ui-monospace,'SF Mono',Menlo,monospace;font-size:.74rem;line-height:1.8;color:var(--muted);background:var(--bg2);border:1px solid var(--line);border-radius:var(--radius-s);padding:1rem 1.2rem;overflow-x:auto;white-space:pre}
.codebox .k{color:var(--accent)}
/* ============ CLIENT NOTICES ============ */
.nt-grid{display:grid;grid-template-columns:1.45fr 1fr;gap:clamp(14px,2vw,22px);align-items:start}
.nt-side{display:flex;flex-direction:column;gap:clamp(14px,2vw,22px)}
.nlist li{display:flex;gap:.8rem;align-items:flex-start;padding:.6rem 0;border-bottom:1px solid var(--line);font-size:.86rem}
.nlist li:last-child{border-bottom:0}
.nlist .ic{color:var(--accent);margin-top:.2em}
.nlist time{margin-left:auto;font-size:.72rem;color:var(--faint);white-space:nowrap}
.mt-pill{display:inline-flex;align-items:center;gap:.5rem;font-family:var(--font-d);font-size:.74rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;border-radius:999px;padding:.4rem 1rem;border:1px solid var(--line2);color:var(--muted)}
.mt-pill.on{border-color:var(--warn);color:var(--warn);background:rgba(255,207,122,.08)}
.mt-pill.live{border-color:var(--accent);color:var(--accent);background:var(--accent-dim)}
/* ============ ACTIVITY ============ */
.tl{position:relative;padding-left:26px}
.tl::before{content:"";position:absolute;left:8px;top:6px;bottom:6px;width:1px;background:var(--line2)}
.tl li{position:relative;padding:.8rem 0 .8rem .8rem}
.tl li::before{content:"";position:absolute;left:-22px;top:1.25rem;width:9px;height:9px;border-radius:50%;background:var(--bg);border:2px solid var(--faint)}
.tl li.hi::before{border-color:var(--accent);background:var(--accent)}
.tl li b{font-family:var(--font-d);font-weight:600;font-size:.9rem}
.tl li p{color:var(--muted);font-size:.86rem}
.tl li time{font-size:.72rem;color:var(--faint)}
/* ============ SETTINGS ============ */
.set-grid{display:grid;grid-template-columns:1fr 1fr;gap:clamp(14px,2vw,22px)}
.set-grid .full{grid-column:1/-1}
.seg{display:inline-flex;border:1px solid var(--line2);border-radius:999px;padding:4px;gap:4px}
.seg button{font-family:var(--font-d);font-size:.8rem;font-weight:600;padding:.45rem 1.1rem;border-radius:999px;color:var(--muted);transition:all .3s}
.seg button.on{background:var(--accent);color:var(--accent-ink)}
.danger-zone{border:1px solid rgba(255,122,118,.35)}
.danger-zone h3 .ic{color:var(--err)}
/* ============ RESPONSIVE ============ */
.side-overlay{position:fixed;inset:0;background:rgba(3,6,8,.6);z-index:55;opacity:0;pointer-events:none;transition:opacity .35s}
@media(max-width:1180px){.clock-chip .c-date{display:none}}
@media(max-width:1080px){
  .stat-grid{grid-template-columns:repeat(2,1fr)}
  .dash-grid,.mt-grid,.set-grid,.nt-grid{grid-template-columns:1fr}
  .login{grid-template-columns:1fr}
  .l-visual{display:none}
}
@media(max-width:980px){.clock-chip{display:none}}
@media(max-width:900px){
  .shell{grid-template-columns:1fr}
  .side{position:fixed;left:0;top:0;bottom:0;width:280px;transform:translateX(-102%);box-shadow:var(--sh)}
  .side.open{transform:none}
  .side-overlay.show{opacity:1;pointer-events:auto}
  .kbd-hint span{display:none}
  .kbd-hint{padding:.5rem .7rem}
}
@media(max-width:640px){
  .stat-grid{grid-template-columns:1fr}
  .qa-grid{grid-template-columns:1fr}
  .form-grid{grid-template-columns:1fr}
  .page-head{align-items:stretch;flex-direction:column}
  .search-inline{width:100%}
  .search-inline input{min-width:0;flex:1}
  #toast-root{left:16px;right:16px;align-items:stretch}
  .toast{min-width:0}
  .msg-head time{display:none}
}
@media(prefers-reduced-motion:reduce){
  *,*::before,*::after{animation-duration:.01ms!important;transition-duration:.01ms!important}
}
</style>
</head>
<body>

<!-- Sprite ikon -->
<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <defs>
    <symbol id="i-logo" viewBox="0 0 24 24"><path d="M5 20V4l14 16V4"/></symbol>
    <symbol id="i-grid" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></symbol>
    <symbol id="i-cpu" viewBox="0 0 24 24"><rect x="6" y="6" width="12" height="12" rx="2"/><path d="M9 2v3M15 2v3M9 19v3M15 19v3M2 9h3M2 15h3M19 9h3M19 15h3"/></symbol>
    <symbol id="i-brief" viewBox="0 0 24 24"><rect x="2.5" y="7" width="19" height="13.5" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2M2.5 12.5h19"/></symbol>
    <symbol id="i-file" viewBox="0 0 24 24"><path d="M14 2H7a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7l-5-5Z"/><path d="M14 2v5h5M9 13h6M9 17h6"/></symbol>
    <symbol id="i-users" viewBox="0 0 24 24"><circle cx="9" cy="7.5" r="3.5"/><path d="M2.5 20a6.5 6.5 0 0 1 13 0M16 4.2a3.5 3.5 0 0 1 0 6.6M21.5 20a6.5 6.5 0 0 0-4.5-6.2"/></symbol>
    <symbol id="i-star" viewBox="0 0 24 24"><path d="m12 2.5 2.9 6 6.6.9-4.8 4.6 1.2 6.5L12 17.4l-5.9 3.1 1.2-6.5L2.5 9.4l6.6-.9 2.9-6Z"/></symbol>
    <symbol id="i-award" viewBox="0 0 24 24"><circle cx="12" cy="8" r="5.5"/><path d="m8.4 12.8-1.5 8.7 5.1-3 5.1 3-1.5-8.7"/></symbol>
    <symbol id="i-chat" viewBox="0 0 24 24"><path d="M21 11.5a8.5 8.5 0 0 1-8.5 8.5c-1.5 0-3-.4-4.2-1.1L3 21l2.1-5.3A8.5 8.5 0 1 1 21 11.5Z"/></symbol>
    <symbol id="i-db" viewBox="0 0 24 24"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5M3 12c0 1.66 4 3 9 3s9-1.34 9-3"/></symbol>
    <symbol id="i-mail" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7.5 9 6 9-6"/></symbol>
    <symbol id="i-pulse" viewBox="0 0 24 24"><path d="M3 12h4l3-8 4 16 3-8h4"/></symbol>
    <symbol id="i-wrench" viewBox="0 0 24 24"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></symbol>
    <symbol id="i-sliders" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/><circle cx="9" cy="6" r="2"/><circle cx="15" cy="12" r="2"/><circle cx="7" cy="18" r="2"/></symbol>
    <symbol id="i-pen" viewBox="0 0 24 24"><path d="M17 3a2.8 2.8 0 0 1 4 4L8 20l-5 1 1-5L17 3Z"/></symbol>
    <symbol id="i-trash" viewBox="0 0 24 24"><path d="M3 6h18M8 6V4a1.5 1.5 0 0 1 1.5-1.5h5A1.5 1.5 0 0 1 16 4v2M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6M10 11v6M14 11v6"/></symbol>
    <symbol id="i-plus" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></symbol>
    <symbol id="i-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7.5"/><path d="m21 21-4.7-4.7"/></symbol>
    <symbol id="i-check" viewBox="0 0 24 24"><path d="m20 6-11 11-5-5"/></symbol>
    <symbol id="i-x" viewBox="0 0 24 24"><path d="M18 6 6 18M6 6l12 12"/></symbol>
    <symbol id="i-alert" viewBox="0 0 24 24"><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/><path d="M12 9v4M12 17h.01"/></symbol>
    <symbol id="i-info" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 11v5M12 8h.01"/></symbol>
    <symbol id="i-lock" viewBox="0 0 24 24"><rect x="4" y="11" width="16" height="10" rx="2"/><path d="M8 11V7a4 4 0 0 1 8 0v4"/></symbol>
    <symbol id="i-key" viewBox="0 0 24 24"><circle cx="7.5" cy="15.5" r="4.5"/><path d="m11 12 10-10M17 6l3 3M14 9l2 2"/></symbol>
    <symbol id="i-user" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/></symbol>
    <symbol id="i-logout" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><path d="M16 17l5-5-5-5M21 12H9"/></symbol>
    <symbol id="i-menu" viewBox="0 0 24 24"><path d="M3 6h18M3 12h18M3 18h18"/></symbol>
    <symbol id="i-eye" viewBox="0 0 24 24"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12Z"/><circle cx="12" cy="12" r="3"/></symbol>
    <symbol id="i-eye-off" viewBox="0 0 24 24"><path d="M17.94 17.94A10.5 10.5 0 0 1 12 19c-7 0-11-7-11-7a19.8 19.8 0 0 1 5.06-5.94M9.9 4.24A9.6 9.6 0 0 1 12 5c7 0 11 7 11 7a19.9 19.9 0 0 1-3.22 4.31M1 1l22 22M9.88 9.88a3 3 0 1 0 4.24 4.24"/></symbol>
    <symbol id="i-download" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M7 10l5 5 5-5M12 15V3"/></symbol>
    <symbol id="i-upload" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M17 8l-5-5-5 5M12 3v12"/></symbol>
    <symbol id="i-refresh" viewBox="0 0 24 24"><path d="M23 4v6h-6M1 20v-6h6"/><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4-4.64 4.36A9 9 0 0 1 3.51 15"/></symbol>
    <symbol id="i-save" viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2Z"/><path d="M17 21v-8H7v8M7 3v5h8"/></symbol>
    <symbol id="i-send" viewBox="0 0 24 24"><path d="M22 2 11 13M22 2l-7 20-4-9-9-4 20-7Z"/></symbol>
    <symbol id="i-copy" viewBox="0 0 24 24"><rect x="9" y="9" width="12" height="12" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></symbol>
    <symbol id="i-arrow-r" viewBox="0 0 24 24"><path d="M4 12h16M13 5l7 7-7 7"/></symbol>
    <symbol id="i-arrow-ur" viewBox="0 0 24 24"><path d="M7 17 17 7M8 7h9v9"/></symbol>
    <symbol id="i-sun" viewBox="0 0 24 24"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></symbol>
    <symbol id="i-moon" viewBox="0 0 24 24"><path d="M21 12.8A9 9 0 1 1 11.2 3 7 7 0 0 0 21 12.8Z"/></symbol>
    <symbol id="i-zap" viewBox="0 0 24 24"><path d="M13 2 3.5 13.5H11L10 22l9.5-11.5H12L13 2Z"/></symbol>
    <symbol id="i-shield" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5.5L12 2 4 5.5V12c0 6 8 10 8 10Z"/><path d="m9 11.5 2 2 4-4.5"/></symbol>
    <symbol id="i-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2"/></symbol>
    <symbol id="i-code" viewBox="0 0 24 24"><path d="m8 6-6 6 6 6M16 6l6 6-6 6M13 4l-2 16"/></symbol>
    <symbol id="i-layers" viewBox="0 0 24 24"><path d="m12 2 10 6.5L12 15 2 8.5 12 2ZM2 15.5 12 22l10-6.5"/></symbol>
    <symbol id="i-net" viewBox="0 0 24 24"><circle cx="5" cy="12" r="2.4"/><circle cx="19" cy="5" r="2.4"/><circle cx="19" cy="19" r="2.4"/><path d="m7.2 10.8 9.4-4.6M7.2 13.2l9.4 4.6"/></symbol>
    <symbol id="i-spark" viewBox="0 0 24 24"><path d="M12 3l2 5.8L19.8 11 14 13l-2 5.8L10 13 4.2 11 10 8.8 12 3Z"/></symbol>
    <symbol id="i-globe" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a15 15 0 0 1 0 18 15 15 0 0 1 0-18Z"/></symbol>
  </defs>
</svg>

<div id="app"></div>
<div id="modal-root"></div>
<div id="toast-root" role="status" aria-live="polite"></div>

<script>
window.NX_AUTH = @json($isAuthenticated);
window.NX_INITIAL_STATE = @json($initialState);
window.NX_PUBLIC_SITE = @json($publicSite ?? []);
window.NX_CSRF = '{{ csrf_token() }}';
</script>
<script>
'use strict';
/* =====================================================
   NEXARION CONTROL CENTER — single-file admin SPA
   Arsitektur: utils → store → auth → efek → views → router
===================================================== */
const $  = (s, c=document) => c.querySelector(s);
const $$ = (s, c=document) => [...c.querySelectorAll(s)];
const ic = (n, s=18) => `<svg class="ic" width="${s}" height="${s}" aria-hidden="true"><use href="#i-${n}"/></svg>`;
const esc = s => String(s ?? '').replace(/[&<>"']/g, m => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m]));
const uid = () => 'id' + Date.now().toString(36) + Math.random().toString(36).slice(2, 7);
const hash = s => { let h = 5381; for (let i = 0; i < s.length; i++) h = ((h << 5) + h + s.charCodeAt(i)) >>> 0; return 'h' + h.toString(36); };
const REDUCED = matchMedia('(prefers-reduced-motion: reduce)').matches;
const FINE = matchMedia('(pointer: fine)').matches;
const fmtAgo = t => {
  const d = Date.now() - t;
  if (d < 60e3) return 'just now';
  if (d < 3600e3) return Math.floor(d / 60e3) + ' min ago';
  if (d < 86400e3) return Math.floor(d / 3600e3) + ' h ago';
  return new Date(t).toLocaleDateString('en-GB', { day: 'numeric', month: 'short' }) + ' · ' +
         new Date(t).toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit' });
};
const fmtBytes = b => b < 1024 ? b + ' B' : (b / 1024).toFixed(1) + ' KB';
const todayStr = () => new Date().toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' });
const adminBranding = () => {
  const site = (DB && Array.isArray(DB.site) && DB.site[0]) || window.NX_PUBLIC_SITE || {};
  return { brand: site.brand || 'NEXARION', logo: site.logo || '' };
};
const brandMarkHtml = (size=16) => {
  const b = adminBranding();
  return b.logo ? `<img src="${esc(b.logo)}" alt="${esc(b.brand)} logo">` : ic('logo', size);
};
function applyAdminBranding(root=document){
  const b=adminBranding();
  root.querySelectorAll?.('.brand-mark').forEach(el=>{ el.innerHTML=brandMarkHtml(16); });
  root.querySelectorAll?.('.brand').forEach(el=>{
    const n=[...el.childNodes].find(x=>x.nodeType===3 && x.textContent.trim());
    if(n) n.textContent=b.brand;
    else if(!el.querySelector('.brand-mark') && el.children.length===0) el.textContent=b.brand;
  });
  document.title = `${b.brand} — Admin Control Center`;
  let fav=document.querySelector('link[data-dynamic-favicon]');
  if(b.logo){ if(!fav){fav=document.createElement('link');fav.rel='icon';fav.dataset.dynamicFavicon='1';document.head.appendChild(fav);} fav.href=b.logo; }
}

/* ============ STORE (Laravel + SQLite) ============ */
const SESSION_KEY = 'nx-admin-session';
const LOCK_KEY = 'nx-admin-lock';
const DEFAULT_USER = 'nexarion.owner';   /* identitas resmi — bukan "admin" */
const DEFAULT_PASS = 'nexarion2026';

const seedDB = () => ({
  v: 1,
  settings: {
    user: DEFAULT_USER, pass: hash(DEFAULT_PASS),
    email: '[COMPANY_EMAIL]', whatsapp: '[WHATSAPP]', instagram: '[INSTAGRAM]', linkedin: '[LINKEDIN]',
    address: '[OFFICE_ADDRESS]', hours: 'Mon – Fri, 09.00 – 18.00',
    maintenance: false,
    mMsg: 'We are upgrading our systems to serve you better. We will be back online shortly — thank you for your patience.'
  },
  site: [{ id:'site-main', brand:'NEXARION', tagline:'Technology & Digital Solutions', logo:'' }],
  services: [
    { id: uid(), title: 'Website Development', icon: 'code', desc: 'Fast, well-structured websites built to convert — from company profiles to full e-commerce platforms.', tags: ['Landing Page', 'Corporate Website', 'E-Commerce', 'Web Application'], tech: ['HTML', 'CSS', 'JavaScript', 'React', 'Next.js'], overview: 'Performance-first, SEO-ready websites structured so your team can grow them without rebuilding from zero.' },
    { id: uid(), title: 'UI/UX Design', icon: 'layers', desc: 'Research-driven interfaces that feel obvious to use — validated before a single line of code.', tags: ['User Research', 'Wireframe', 'Prototype', 'Design System'], tech: ['Figma', 'Design Tokens', 'Prototyping'], overview: 'We research real users, map their journeys, and design interfaces that make every step feel effortless.' },
    { id: uid(), title: 'Custom Software', icon: 'cpu', desc: 'Business systems, dashboards, and internal tools shaped exactly around how your company works.', tags: ['Business System', 'Dashboard', 'Internal Tools'], tech: ['Node.js', 'Python', 'PostgreSQL'], overview: 'Software that follows your workflow — not the other way around — with clear data models and reporting.' },
    { id: uid(), title: 'Digital Solutions', icon: 'net', desc: 'Automation, integrations, and digital transformation — one practical step at a time.', tags: ['Automation', 'API Integration', 'Digital Transformation'], tech: ['REST API', 'Webhooks', 'MongoDB'], overview: 'We audit your workflow, identify the highest-impact improvements, and implement them incrementally.' },
    { id: uid(), title: 'Maintenance & Support', icon: 'wrench', desc: 'Keeping your product fast, secure, and reliable long after launch day.', tags: ['Security Updates', 'Performance', 'Backups', 'Support'], tech: ['Monitoring', 'CDN', 'Automated Backups'], overview: 'Proactive monitoring, regular updates, security patches, and a responsive support channel.' }
  ],
  projects: [
    { id: uid(), title: 'Aurora Commerce', cat: 'Website', year: '2025', tech: ['Next.js', 'Node.js', 'PostgreSQL'], img: 'https://picsum.photos/seed/nx-aurora/900/560.jpg', desc: 'Full e-commerce platform with custom storefront, inventory dashboard, and payment flow.' },
    { id: uid(), title: 'Pulse Analytics Dashboard', cat: 'Web Application', year: '2025', tech: ['React', 'Node.js', 'MySQL'], img: 'https://picsum.photos/seed/nx-pulse/900/560.jpg', desc: 'Real-time operations dashboard unifying data from multiple internal tools.' },
    { id: uid(), title: 'Atlas Design System', cat: 'UI/UX', year: '2024', tech: ['Figma', 'Design Tokens', 'Storybook'], img: 'https://picsum.photos/seed/nx-atlas/900/560.jpg', desc: 'Complete design system with 40+ documented components for a growing SaaS team.' },
    { id: uid(), title: 'FlowOps Process Automation', cat: 'Digital Solution', year: '2024', tech: ['Node.js', 'Webhooks', 'MongoDB'], img: 'https://picsum.photos/seed/nx-flowops/900/560.jpg', desc: 'Automation pipelines that replaced repetitive manual operations for a logistics team.' },
    { id: uid(), title: 'KinderCare School Website', cat: 'Website', year: '2024', tech: ['Next.js', 'CMS', 'MySQL'], img: 'https://picsum.photos/seed/nx-kindercare/900/560.jpg', desc: 'Warm, fast school website with an admission funnel and CMS for staff.' },
    { id: uid(), title: 'MediBook Booking System', cat: 'Web Application', year: '2023', tech: ['React', 'Node.js', 'PostgreSQL'], img: 'https://picsum.photos/seed/nx-medibook/900/560.jpg', desc: 'Online appointment booking system for a multi-doctor clinic.' }
  ],
  posts: [
    { id: uid(), title: 'Why Website Performance Directly Affects Revenue', cat: 'Web Development', date: 'Mar 12, 2026', read: '6 min', author: '[AUTHOR]', status: 'Published', excerpt: 'Every extra second of load time costs you visitors. Here is the business case for treating speed as a feature.', body: 'When a website takes three seconds to load, a significant portion of visitors leave before seeing anything. They made a judgment about your business in the time it took a page to appear.\n\nThis is why we treat performance as a product feature with measurable impact — not a technical afterthought. Run an audit this week; if your site is slow, it is costing you money, and it is fixable.' },
    { id: uid(), title: 'Design Systems, Explained for Non-Designers', cat: 'UI/UX', date: 'Feb 28, 2026', read: '5 min', author: '[AUTHOR]', status: 'Published', excerpt: 'A design system is not a Figma file — it is the agreement that keeps your product consistent while it grows.', body: 'Every growing product hits the same wall: buttons look slightly different on ten pages and nobody knows which is correct.\n\nA design system defines components once and makes them the single source of truth — faster shipping, fewer debates, and an interface that feels deliberate.' },
    { id: uid(), title: 'Digital Transformation for Small Businesses: Where to Start', cat: 'Digital Transformation', date: 'Feb 10, 2026', read: '7 min', author: '[AUTHOR]', status: 'Published', excerpt: 'You do not need a moonshot. You need a spreadsheet, a website, and one automated process.', body: 'Every small business has one boring repetitive task. That task is your starting point — not AI, not a company-wide platform.\n\nAutomate one high-frequency process, own your online presence, and measure one number that matters.' },
    { id: uid(), title: 'How to Choose a Tech Stack Without the Hype', cat: 'Technology', date: 'Jan 22, 2026', read: '6 min', author: '[AUTHOR]', status: 'Draft', excerpt: 'The best stack is not the newest one — it is the one your team can maintain in five years.', body: 'Every technology choice is a long-term relationship. We evaluate stacks on ecosystem maturity, hiring pool, documentation quality, and how boring the boring parts are.\n\nThe right question is never "what is trending" — it is "what will still be easy to change in three years."' },
    { id: uid(), title: 'SEO Fundamentals Every Business Website Needs', cat: 'Business', date: 'Jan 8, 2026', read: '5 min', author: '[AUTHOR]', status: 'Published', excerpt: 'No tricks — the four foundations that determine whether search engines can actually recommend you.', body: 'Search engines read structure: headings, semantic markup, titles, descriptions. Semantic HTML is how your pages get correctly represented.\n\nBe fast, be mobile, and answer real questions. Usefulness compounds; tricks decay.' },
    { id: uid(), title: 'NEXARION Launches New Service Line (Placeholder)', cat: 'Company News', date: 'Dec 18, 2025', read: '3 min', author: '[AUTHOR]', status: 'Draft', excerpt: 'Replace this article with your real company announcements — launches, partnerships, milestones.', body: 'This article exists as a placeholder so your blog never looks empty during development. Replace it with actual company news.' }
  ],
  team: [
    { id: uid(), name: '[TEAM MEMBER 01]', role: 'Founder & CEO', bio: 'Replace with a short biography: background, what they lead, and one human detail.', skills: ['Strategy', 'Product'] },
    { id: uid(), name: '[TEAM MEMBER 02]', role: 'Technology Lead', bio: 'Replace with a short biography: technical background and approach to engineering.', skills: ['Architecture', 'Backend'] },
    { id: uid(), name: '[TEAM MEMBER 03]', role: 'Frontend Developer', bio: 'Replace with a short biography: specialization and approach to craft.', skills: ['React', 'Performance'] },
    { id: uid(), name: '[TEAM MEMBER 04]', role: 'UI/UX Designer', bio: 'Replace with a short biography: design philosophy and research background.', skills: ['Research', 'Systems'] },
    { id: uid(), name: '[TEAM MEMBER 05]', role: 'Project Manager', bio: 'Replace with a short biography: how they keep projects on time, scope honest, and clients informed.', skills: ['Delivery', 'Communication'] }
  ],
  testimonials: [
    { id: uid(), quote: 'Replace this content with an authentic client testimonial. Describe the problem, the result, and what working with the team felt like.', name: '[CLIENT NAME]', role: '[POSITION], [COMPANY]' },
    { id: uid(), quote: 'Replace this content with an authentic client testimonial. Concrete numbers make testimonials far more credible than general praise.', name: '[CLIENT NAME]', role: '[POSITION], [COMPANY]' },
    { id: uid(), quote: 'Replace this content with an authentic client testimonial. One or two genuine sentences outperform a paragraph of superlatives.', name: '[CLIENT NAME]', role: '[POSITION], [COMPANY]' }
  ],
  jobs: [
    { id: uid(), title: 'Frontend Developer', type: 'Full-time', loc: '[LOCATION]', desc: 'Build fast, accessible interfaces for client projects across industries.', status: 'Open' },
    { id: uid(), title: 'Backend Developer', type: 'Full-time', loc: '[LOCATION]', desc: 'Design reliable APIs, data models, and systems that power client products.', status: 'Open' },
    { id: uid(), title: 'UI/UX Designer', type: 'Full-time', loc: '[LOCATION]', desc: 'Turn research and business goals into interfaces people understand instantly.', status: 'Open' },
    { id: uid(), title: 'Project Manager', type: 'Full-time', loc: '[LOCATION]', desc: 'Keep projects honest — scope, timeline, and communication between team and client.', status: 'Open' },
    { id: uid(), title: 'Digital Marketing', type: 'Full-time', loc: '[LOCATION]', desc: 'Grow NEXARION presence and help clients understand good digital strategy.', status: 'Closed' }
  ],
  faqs: [
    { id: uid(), q: 'How long does it take to build a website?', a: 'It depends on complexity. A landing page can take 1–2 weeks; a company profile site 3–6 weeks; e-commerce and web applications 6–12 weeks or more. We give a realistic timeline with milestones after discovery.' },
    { id: uid(), q: 'Can you build a custom website?', a: 'Yes. Everything we build is designed around your specific goals — no forced templates.' },
    { id: uid(), q: 'Do you provide maintenance?', a: 'Yes. Structured maintenance plans cover updates, security patches, monitoring, backups, and priority support.' },
    { id: uid(), q: 'Can you integrate third-party APIs?', a: 'Yes. Payment gateways, shipping, CRM tools, WhatsApp APIs, maps, and custom internal APIs.' },
    { id: uid(), q: 'Do you provide hosting and domain?', a: 'Availability depends on the selected package. Some include managed hosting; others assume existing infrastructure.' },
    { id: uid(), q: 'Can I request custom features?', a: 'Absolutely. Describe what you need and we will assess feasibility, effort, and the smartest way to build it.' }
  ],
  pricing: [
    { id: uid(), name: 'Starter', price: 'Rp 3,5 jt', per: '/project*', tagline: 'For simple digital needs — a credible online presence, fast.', features: '1–5 page website\nMobile-responsive design\nBasic SEO setup\nContact form\nDelivery: 2–3 weeks', popular: false },
    { id: uid(), name: 'Business', price: 'Rp 9,8 jt', per: '/project*', tagline: 'For businesses that need a professional, conversion-ready website.', features: 'Up to 12 pages\nCustom UI/UX design\nCMS-ready content\nPerformance & SEO optimization\n30 days post-launch support\nDelivery: 4–6 weeks', popular: true },
    { id: uid(), name: 'Professional', price: 'Rp 24,9 jt', per: '/project*', tagline: 'For companies with more complex requirements and integrations.', features: 'Unlimited pages / web application\nCustom design system\nAPI & integrations\nAdmin dashboard\n90 days post-launch support\nDelivery: 8–12 weeks', popular: false }
  ],
  messages: [
    { id: uid(), from: '[SAMPLE] Budi Santoso', email: 'budi@example.com', date: Date.now() - 3600e3 * 5, read: false, star: true, subject: 'Website untuk UMKM kopi', body: 'Halo, saya punya brand kopi lokal dan ingin website company profile sederhana + katalog produk. Kira-kira berapa estimasi biaya dan waktunya? Terima kasih.' },
    { id: uid(), from: '[SAMPLE] Sarah Lim', email: 'sarah@company.co', date: Date.now() - 86400e3 * 2, read: true, star: false, subject: 'Redesign dashboard internal', body: 'Kami butuh bantuan meredesain dashboard operasional internal. Bisa jadwalkan discovery call minggu depan?' }
  ],
  notices: [],
  activity: [{ t: Date.now(), type: 'system', msg: 'Workspace initialized' }]
});

let DB;
let saveChain = Promise.resolve();
const csrfToken = () => document.querySelector('meta[name="csrf-token"]')?.content || window.NX_CSRF || '';
const setCsrfToken = token => {
  if (!token) return;
  window.NX_CSRF = token;
  const meta = document.querySelector('meta[name="csrf-token"]');
  if (meta) meta.content = token;
};
const xsrfCookie = () => {
  const m = document.cookie.match(/(?:^|;\s*)XSRF-TOKEN=([^;]+)/);
  return m ? decodeURIComponent(m[1]) : '';
};
const apiHeaders = (json=true) => {
  const h = { ...(json ? {'Content-Type':'application/json'} : {}), 'Accept':'application/json', 'X-Requested-With':'XMLHttpRequest' };
  const csrf = csrfToken(); if (csrf) h['X-CSRF-TOKEN'] = csrf;
  const xsrf = xsrfCookie(); if (xsrf) h['X-XSRF-TOKEN'] = xsrf;
  return h;
};
async function refreshCsrfToken() {
  const r = await fetch('/admin/csrf-token?ts='+Date.now(), {
    method:'GET', headers:{'Accept':'application/json','X-Requested-With':'XMLHttpRequest'},
    credentials:'same-origin', cache:'no-store'
  });
  const j = await r.json().catch(()=>({}));
  if (!r.ok || !j.token) throw new Error('Could not refresh CSRF token. Reload the admin page and sign in again.');
  setCsrfToken(j.token);
  if (window.NX_AUTH && j.authenticated === false) throw new Error('Your admin session has expired. Please sign in again.');
  return j.token;
}
async function apiFetch(url, options={}, retry=true) {
  const method = String(options.method || 'GET').toUpperCase();
  const unsafe = !['GET','HEAD','OPTIONS'].includes(method);
  // Always synchronize the token immediately before a mutating request. This
  // prevents stale Blade tokens after login/session regeneration or old tabs.
  if (unsafe) await refreshCsrfToken();

  const json = !(options.body instanceof FormData);
  if (!json && unsafe && options.body && !options.body.has('_token')) options.body.append('_token', csrfToken());
  const headers = { ...apiHeaders(json), ...(options.headers || {}) };
  if (!json) delete headers['Content-Type'];
  let r = await fetch(url, { ...options, method, headers, credentials:'same-origin', cache: options.cache || 'no-store' });

  if (r.status === 419 && retry) {
    await refreshCsrfToken();
    if (!json && unsafe && options.body) options.body.set('_token', csrfToken());
    const retryHeaders = { ...apiHeaders(json), ...(options.headers || {}) };
    if (!json) delete retryHeaders['Content-Type'];
    r = await fetch(url, { ...options, method, headers:retryHeaders, credentials:'same-origin', cache:'no-store' });
  }
  if (r.status === 401) {
    window.NX_AUTH = false;
    throw new Error('Your admin session has expired. Please sign in again.');
  }
  return r;
}
function loadDB() { DB = window.NX_INITIAL_STATE || seedDB(); }
async function refreshDB() { const r = await apiFetch('/admin/state?ts='+Date.now(),{method:'GET',headers:{'Accept':'application/json'},cache:'no-store'}); if(!r.ok) throw new Error('Could not load admin data'); const j=await r.json(); DB=j.state; window.NX_INITIAL_STATE=DB; return DB; }
function saveDB() {
  if (!window.NX_AUTH) return Promise.resolve(true);
  const snapshot = JSON.parse(JSON.stringify(DB));
  saveChain = saveChain.catch(()=>true).then(async () => {
    const r = await apiFetch('/admin/state',{method:'PUT',body:JSON.stringify({state:snapshot})});
    const j = await r.json().catch(()=>({}));
    if(!r.ok) throw new Error(j.message || Object.values(j.errors||{}).flat()[0] || 'Server save failed');
    return true;
  });
  saveChain.catch(err=>toast(err.message || 'Server save failed — please retry.','error'));
  return saveChain;
}
function logA(type, msg) { DB.activity.unshift({ t: Date.now(), type, msg }); if (DB.activity.length > 300) DB.activity.length = 300; }

/* ============ AUTH ============ */
const getSession = () => window.NX_AUTH ? { u: DB?.settings?.user || 'nexarion.owner', t: Date.now() } : null;
const setSession = (u, remember) => { window.NX_AUTH = true; };
const clearSession = () => { window.NX_AUTH = false; window.NX_INITIAL_STATE = null; apiFetch('/admin/logout',{method:'POST'}).catch(()=>{}); };
const getLock = () => { try { return +localStorage.getItem(LOCK_KEY) || 0; } catch (e) { return 0; } };
const setLock = ms => { try { localStorage.setItem(LOCK_KEY, String(Date.now() + ms)); } catch (e) {} };

/* ============ TOAST ============ */
function toast(msg, type = 'ok') {
  const t = document.createElement('div');
  t.className = 'toast' + (type === 'error' ? ' error' : '');
  t.innerHTML = ic(type === 'error' ? 'alert' : type === 'info' ? 'info' : 'check', 17) +
    `<span>${esc(msg)}</span><span class="bar"></span>`;
  $('#toast-root').appendChild(t);
  setTimeout(() => { t.classList.add('out'); setTimeout(() => t.remove(), 420); }, 3600);
}

/* ============ MODAL ============ */
function openModal(html, cls = '') {
  const root = $('#modal-root');
  root.innerHTML = `<div class="modal-bd"><div class="modal ${cls}" role="dialog" aria-modal="true"><button class="modal-x" aria-label="Close">${ic('x', 15)}</button>${html}</div></div>`;
  const bd = root.firstElementChild;
  requestAnimationFrame(() => bd.classList.add('show'));
  const esc2 = e => { if (e.key === 'Escape') close(); };
  const close = () => { bd.classList.remove('show'); setTimeout(() => root.innerHTML = '', 380); document.removeEventListener('keydown', esc2); };
  document.addEventListener('keydown', esc2);
  bd.addEventListener('click', e => { if (e.target === bd) close(); });
  $('.modal-x', bd).addEventListener('click', close);
  const first = bd.querySelector('input, textarea, select');
  if (first) setTimeout(() => first.focus(), 380);
  return { bd, close };
}
function confirmModal({ title, msg, okText = 'Delete', danger = true, onOk }) {
  const m = openModal(`
    <div class="modal-body" style="text-align:center;padding-top:clamp(26px,4vw,40px)">
      <div class="confirm-ic ${danger ? 'bad' : 'ok'}" style="margin-inline:auto">${ic(danger ? 'trash' : 'check', 24)}</div>
      <h3 style="text-transform:uppercase;font-size:1.15rem;margin-bottom:.5rem">${esc(title)}</h3>
      <p class="lead" style="font-size:.9rem;max-width:40ch;margin:0 auto 1.6rem">${msg}</p>
      <div style="display:flex;gap:.7rem;justify-content:center">
        <button class="btn btn-g" data-c-no>Cancel</button>
        <button class="btn ${danger ? 'btn-d' : 'btn-p'}" data-c-ok>${esc(okText)}</button>
      </div>
    </div>`, 'sm');
  m.bd.querySelector('[data-c-no]').addEventListener('click', m.close);
  m.bd.querySelector('[data-c-ok]').addEventListener('click', () => { m.close(); onOk && onOk(); });
}

/* ============ EFEK: tilt / magnetic / counters / parallax / live clock ============ */
let cleanups = [];
const addCleanup = fn => cleanups.push(fn);
const runCleanups = () => { cleanups.forEach(f => { try { f(); } catch (e) {} }); cleanups = []; };

function initTilt(root) {
  if (!FINE || REDUCED) return;
  $$('.tilt', root).forEach(card => {
    card.addEventListener('pointermove', e => {
      if (e.pointerType !== 'mouse') return;
      const r = card.getBoundingClientRect();
      const x = (e.clientX - r.left) / r.width - .5, y = (e.clientY - r.top) / r.height - .5;
      card.style.transform = `perspective(900px) rotateY(${(x * 4).toFixed(2)}deg) rotateX(${(-y * 4).toFixed(2)}deg) translateY(-2px)`;
    });
    card.addEventListener('pointerleave', () => { card.style.transform = ''; });
  });
}
function initMagnetic(root) {
  if (!FINE || REDUCED) return;
  $$('.magnetic', root).forEach(btn => {
    const inner = btn.querySelector('.mag-in') || btn;
    btn.addEventListener('pointermove', e => {
      const r = btn.getBoundingClientRect();
      inner.style.transform = `translate(${((e.clientX - r.left - r.width / 2) * .25).toFixed(1)}px, ${((e.clientY - r.top - r.height / 2) * .3).toFixed(1)}px)`;
    });
    btn.addEventListener('pointerleave', () => { inner.style.transform = ''; });
  });
}
function initCounters(root) {
  const obs = new IntersectionObserver(es => es.forEach(e => {
    if (!e.isIntersecting) return;
    const el = e.target, to = +el.dataset.to, t0 = performance.now();
    obs.unobserve(el);
    if (REDUCED) { el.textContent = to; return; }
    (function tick(t) {
      const p = Math.min(1, (t - t0) / 1200), ease = 1 - Math.pow(1 - p, 3);
      el.textContent = Math.round(to * ease);
      if (p < 1) requestAnimationFrame(tick);
    })(t0);
  }), { threshold: .4 });
  $$('.count', root).forEach(el => obs.observe(el));
  addCleanup(() => obs.disconnect());
}
function initParallax(root) {
  if (!FINE || REDUCED) return;
  const orbs = $$('.orb', root);
  if (!orbs.length) return;
  let tx = 0, ty = 0, cx = 0, cy = 0, raf;
  const mm = e => { tx = (e.clientX / innerWidth - .5) * 2; ty = (e.clientY / innerHeight - .5) * 2; };
  const loop = () => {
    raf = requestAnimationFrame(loop);
    cx += (tx - cx) * .05; cy += (ty - cy) * .05;
    orbs.forEach((o, i) => { const d = i ? -22 : 26; o.style.transform = `translate3d(${(cx * d).toFixed(1)}px, ${(cy * d).toFixed(1)}px, 0)`; });
  };
  addEventListener('pointermove', mm, { passive: true });
  loop();
  addCleanup(() => { cancelAnimationFrame(raf); removeEventListener('pointermove', mm); });
}
/* Live clock: jam : menit : detik + hari, tanggal, bulan, tahun */
function startClocks(root) {
  const els = $$('[data-clock]', root);
  if (!els.length) return;
  const tick = () => {
    const d = new Date();
    const time = d.toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
    const date = d.toLocaleDateString('en-GB', { weekday: 'short', day: '2-digit', month: 'short', year: 'numeric' });
    els.forEach(el => {
      const t = $('.c-time', el), dt = $('.c-date', el);
      if (t) t.textContent = time;
      if (dt) dt.textContent = date;
    });
  };
  tick();
  const iv = setInterval(tick, 1000);
  addCleanup(() => clearInterval(iv));
}

/* ============ HOLOGRAM "N" — Three.js (login) ============ */
function initHoloN() {
  const host = $('#l3d');
  if (!host || typeof THREE === 'undefined') return;
  const isLight = document.documentElement.dataset.theme === 'light';
  const W = () => host.clientWidth, H = () => host.clientHeight;
  const scene = new THREE.Scene();
  const camera = new THREE.PerspectiveCamera(45, W() / H(), .1, 100);
  camera.position.set(0, 0, 7.4);
  const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
  renderer.setPixelRatio(Math.min(devicePixelRatio, 2));
  renderer.setSize(W(), H());
  host.appendChild(renderer.domElement);

  const cA = isLight ? 0x0a9d80 : 0x25e6c0;   /* aksen */
  const cD = isLight ? 0x0a9d80 : 0x8cf2de;   /* aksen terang */
  const cG = isLight ? 0x55666d : 0x9fb4bd;   /* abu */

  /* --- huruf N: 3 balok di-extrude (tiang kiri, tiang kanan, diagonal) --- */
  const group = new THREE.Group(); scene.add(group);
  const w = 2.05, h = 3.0, t = .58, depth = .55;
  const barPts = [
    [[0, 0], [t, 0], [t, h], [0, h]],                 /* tiang kiri  */
    [[w - t, 0], [w, 0], [w, h], [w - t, h]],         /* tiang kanan */
    [[0, h], [t, h], [w, 0], [w - t, 0]]              /* diagonal    */
  ];
  const holoUniforms = { uTime: { value: 0 }, uColor: { value: new THREE.Color(cA) } };
  const holoMat = new THREE.ShaderMaterial({
    transparent: true, side: THREE.DoubleSide, depthWrite: false,
    uniforms: holoUniforms,
    vertexShader: 'varying vec3 vP; void main(){ vP = position; gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0); }',
    fragmentShader: [
      'uniform float uTime; uniform vec3 uColor; varying vec3 vP;',
      'void main(){',
      '  float scan  = 0.5 + 0.5 * sin(vP.y * 26.0 - uTime * 4.0);',                 /* scanline halus */
      '  float band  = smoothstep(0.25, 0.0, abs(sin((vP.y - uTime * 0.55) * 1.35)));', /* band cahaya merambat */
      '  float flick = 0.9 + 0.1 * sin(uTime * 21.0) * sin(uTime * 7.3);',           /* flicker hologram */
      '  float a = (0.08 + scan * 0.16 + band * 0.30) * flick;',
      '  gl_FragColor = vec4(uColor, a);',
      '}'
    ].join('\n')
  });
  const edgeMats = [];
  barPts.forEach(pts => {
    const s = new THREE.Shape();
    s.moveTo(pts[0][0], pts[0][1]);
    for (let i = 1; i < pts.length; i++) s.lineTo(pts[i][0], pts[i][1]);
    const geo = new THREE.ExtrudeGeometry(s, { depth, bevelEnabled: false });
    geo.translate(-w / 2, -h / 2, -depth / 2);
    group.add(new THREE.Mesh(geo, holoMat));
    const em = new THREE.LineBasicMaterial({ color: cA, transparent: true, opacity: .85 });
    edgeMats.push(em);
    group.add(new THREE.LineSegments(new THREE.EdgesGeometry(geo), em));
  });

  /* partikel energi yang naik di sekitar huruf */
  const PN = 90, pp = new Float32Array(PN * 3), pv = [];
  for (let i = 0; i < PN; i++) {
    const r = 1.7 + Math.random() * 1.3, a = Math.random() * Math.PI * 2;
    pp[i * 3] = Math.cos(a) * r * 1.15;
    pp[i * 3 + 2] = Math.sin(a) * r * .8;
    pp[i * 3 + 1] = -2.6 + Math.random() * 5.2;
    pv.push(.25 + Math.random() * .55);
  }
  const pGeo = new THREE.BufferGeometry(); pGeo.setAttribute('position', new THREE.BufferAttribute(pp, 3));
  const rise = new THREE.Points(pGeo, new THREE.PointsMaterial({ color: cD, size: .05, transparent: true, opacity: .75, depthWrite: false }));
  scene.add(rise);

  /* partikel latar */
  const n = 260, pos = new Float32Array(n * 3);
  for (let i = 0; i < n; i++) { pos[i * 3] = (Math.random() - .5) * 14; pos[i * 3 + 1] = (Math.random() - .5) * 9; pos[i * 3 + 2] = (Math.random() - .5) * 8 - 2; }
  const bgGeo = new THREE.BufferGeometry(); bgGeo.setAttribute('position', new THREE.BufferAttribute(pos, 3));
  const bgPts = new THREE.Points(bgGeo, new THREE.PointsMaterial({ color: cG, size: .035, transparent: true, opacity: .5, depthWrite: false }));
  scene.add(bgPts);

  /* interaksi: drag rotate + parallax kamera */
  let mx = 0, my = 0, drag = false, lx = 0, tRY = 0, raf, visible = true;
  host.addEventListener('pointerdown', e => { drag = true; lx = e.clientX; host.setPointerCapture?.(e.pointerId); });
  addEventListener('pointerup', () => drag = false);
  const mm = e => {
    if (drag) { tRY += (e.clientX - lx) * .006; lx = e.clientX; }
    mx = (e.clientX / innerWidth - .5) * 2; my = (e.clientY / innerHeight - .5) * 2;
  };
  addEventListener('pointermove', mm, { passive: true });
  const io = new IntersectionObserver(es => visible = es[0].isIntersecting); io.observe(host);

  /* warna mengikuti tema */
  const themeObs = new MutationObserver(() => {
    const l = document.documentElement.dataset.theme === 'light';
    const A = l ? 0x0a9d80 : 0x25e6c0, D = l ? 0x0a9d80 : 0x8cf2de, G = l ? 0x55666d : 0x9fb4bd;
    holoUniforms.uColor.value.setHex(A);
    edgeMats.forEach(m => m.color.setHex(A));
    rise.material.color.setHex(D); bgPts.material.color.setHex(G);
  });
  themeObs.observe(document.documentElement, { attributes: true, attributeFilter: ['data-theme'] });

  const clock = new THREE.Clock();
  (function loop() {
    raf = requestAnimationFrame(loop);
    if (!visible) return;
    const dt = Math.min(clock.getDelta(), .05), et = clock.elapsedTime;
    holoUniforms.uTime.value = et;
    if (!REDUCED) tRY += dt * .10;                       /* auto-rotate halus */
    group.rotation.y += (tRY - group.rotation.y) * .08;
    group.rotation.x = Math.sin(et * .32) * .14;         /* bob 3D lembut */
    group.position.y = Math.sin(et * .9) * .07;
    edgeMats.forEach((m, i) => { m.opacity = .68 + .14 * Math.sin(et * 7 + i) + .06 * Math.sin(et * 23); });
    if (!REDUCED) {
      const arr = pGeo.attributes.position.array;
      for (let i = 0; i < PN; i++) { arr[i * 3 + 1] += pv[i] * dt; if (arr[i * 3 + 1] > 2.8) arr[i * 3 + 1] = -2.8; }
      pGeo.attributes.position.needsUpdate = true;
      rise.rotation.y += dt * .05;
      bgPts.rotation.y += dt * .012;
    }
    camera.position.x += (mx * .7 - camera.position.x) * .04;
    camera.position.y += (-my * .5 - camera.position.y) * .04;
    camera.lookAt(0, 0, 0);
    renderer.render(scene, camera);
  })();
  const ro = new ResizeObserver(() => { camera.aspect = W() / H(); camera.updateProjectionMatrix(); renderer.setSize(W(), H()); });
  ro.observe(host);
  addCleanup(() => {
    cancelAnimationFrame(raf); ro.disconnect(); io.disconnect(); themeObs.disconnect();
    removeEventListener('pointermove', mm);
    scene.traverse(o => { o.geometry?.dispose?.(); o.material?.dispose?.(); });
    renderer.dispose(); renderer.domElement.remove();
  });
}

/* ============ SCHEMA CRUD GENERIK ============ */
const ICONS = ['code','layers','cpu','net','wrench','spark','shield','zap','users','award','brief','db','mail','chat','star','globe','phone','search','pin','clock','file'];
// field: [key, label, type, required, options, fullwidth]
const SCHEMAS = {
  site: { label:'Website Content', icon:'globe', nk:'brand', search:['brand','tagline'], single:true,
    cols:[['brand','Brand'],['tagline','Tagline'],['city','Based In']],
    fields:[['brand','Brand / Company Name','text',1],['tagline','Company Tagline','text',1],['logo','Logo URL (optional)','url'],['vision','Vision','textarea',0,0,1],['mission','Mission','textarea',0,0,1],['story1','Company Story — Paragraph 1','textarea',0,0,1],['story2','Company Story — Paragraph 2','textarea',0,0,1],['founded','Founded','text'],['teamSize','Team Size','text'],['focus','Business Focus','text'],['city','Based In','text'],['careersBenefits','Default Career Benefits','textarea',0,0,1],['footerBlurb','Footer Description','textarea',0,0,1],['responseTime','Response Time Message','text',0,0,1]],
    def:{brand:'NEXARION',tagline:'Technology & Digital Solutions'} },
  page_heroes: { label:'Page Heroes', icon:'layers', nk:'page', search:['page','title','subtitle'],
    cols:[['page','Page','badge'],['kicker','Kicker'],['title','Hero Title'],['subtitle','Subtitle']],
    fields:[['page','Page Key','select',1,['home','about','services','portfolio','process','pricing','blog','team','careers','faq','contact']],['kicker','Kicker / Eyebrow','text'],['title','Hero Title','textarea',1,0,1],['subtitle','Hero Subtitle','textarea',0,0,1]],
    def:{page:'home'} },
  stats: { label:'Homepage Statistics', icon:'pulse', nk:'label', search:['label','value'],
    cols:[['value','Value'],['suffix','Suffix'],['label','Label']],
    fields:[['value','Number / Value','text',1],['suffix','Suffix','text'],['label','Label','text',1],['visible','Show on Website','toggle']], def:{suffix:'+',visible:true} },
  services: { label:'Services', icon:'cpu', nk:'title', search:['title','desc'],
    cols:[['title','Service'],['desc','Description'],['tags','Features','tags']],
    fields:[['title','Title','text',1],['icon','Icon','select',0,ICONS],['desc','Short Description','textarea',1,0,1],['tags','Key Features (comma separated)','tags'],['tech','Technologies (comma separated)','tags'],['overview','Overview','textarea',0,0,1],['problems','Problems We Solve (one per line)','lines',0,0,1],['solution','Our Solution','textarea',0,0,1],['whatWeBuild','What We Build (one per line)','lines',0,0,1],['benefits','Benefits (one per line)','lines',0,0,1],['visible','Show on Website','toggle']],
    def:{icon:'code',tags:[],tech:[],problems:[],whatWeBuild:[],benefits:[],visible:true} },
  projects: { label:'Portfolio', icon:'brief', nk:'title', search:['title','desc','link','client'],
    cols:[['img','','img'],['title','Project'],['cat','Category','badge'],['year','Year'],['tech','Stack','tags']],
    fields:[['title','Project Name','text',1],['cat','Category','text',1],['year','Year','text'],['client','Client','text'],['status','Project Status','text'],['link','Project URL','url'],['img','Cover Image URL (optional)','url'],['tech','Technologies (comma separated)','tags'],['desc','Description','textarea',1,0,1],['challenge','The Challenge','textarea',0,0,1],['research','Research','textarea',0,0,1],['strategy','Strategy','textarea',0,0,1],['design','Design','textarea',0,0,1],['development','Development','textarea',0,0,1],['result','Results (one per line: Label | Value)','pairs',0,0,1],['big','Large Featured Card','toggle'],['visible','Show on Website','toggle']],
    def:{cat:'Website',year:String(new Date().getFullYear()),tech:[],result:[],big:false,visible:true} },
  process: { label:'Process', icon:'layers', nk:'t', search:['t','d'], cols:[['n','No.'],['t','Stage'],['d','Description']],
    fields:[['n','Step Number','text',1],['t','Stage Title','text',1],['d','Description','textarea',1,0,1],['visible','Show on Website','toggle']], def:{visible:true} },
  pricing: { label:'Pricing', icon:'db', nk:'name', search:['name','tagline'], cols:[['name','Package'],['price','Price'],['tagline','Tagline'],['popular','Popular','badge']],
    fields:[['name','Package Name','text',1],['price','Price','text',1],['per','Per (e.g. /project)','text'],['tagline','Tagline','textarea',0,0,1],['features','Features (one per line)','textarea',0,0,1],['popular','Mark as Most Popular','toggle'],['visible','Show on Website','toggle']], def:{per:'/project*',popular:false,visible:true} },
  posts: { label:'Blog Posts', icon:'file', nk:'title', search:['title','excerpt'], cols:[['img','','img'],['status','','badge'],['title','Title'],['cat','Category','badge'],['date','Date'],['author','Author']],
    fields:[['title','Title','text',1],['cat','Category','text',1],['status','Status','select',0,['Published','Draft']],['date','Date','text'],['read','Read Time','text'],['author','Author','text'],['img','Cover Image URL (optional)','url'],['excerpt','Excerpt','textarea',1,0,1],['body','Body — use ## Heading and blank lines for paragraphs','textarea',0,0,1]],
    def:{status:'Published',author:'[AUTHOR]',date:todayStr(),read:'5 min'} },
  team: { label:'Team', icon:'users', nk:'name', search:['name','role'], cols:[['img','','img'],['name','Name'],['role','Position','badge'],['bio','Biography']],
    fields:[['name','Full Name','text',1],['role','Position','text',1],['img','Photo URL (optional)','url'],['skills','Skills (comma separated)','tags'],['linkedin','LinkedIn URL','url'],['instagram','Instagram URL','url'],['bio','Short Biography','textarea',0,0,1],['visible','Show on Website','toggle']], def:{visible:true} },
  testimonials: { label:'Testimonials', icon:'star', nk:'name', search:['quote','name'], cols:[['quote','Testimonial'],['name','Client'],['role','Position']],
    fields:[['quote','Testimonial Quote','textarea',1,0,1],['name','Client Name','text',1],['role','Position, Company','text'],['visible','Show on Website','toggle']], def:{visible:true} },
  jobs: { label:'Careers', icon:'award', nk:'title', search:['title','desc'], cols:[['title','Position'],['type','Type','badge'],['loc','Location'],['status','Status','badge']],
    fields:[['title','Job Title','text',1],['type','Type','select',0,['Full-time','Part-time','Contract','Internship']],['loc','Location','text'],['status','Status','select',0,['Open','Closed']],['desc','Short Description','textarea',1,0,1],['resp','Responsibilities (one per line)','lines',0,0,1],['req','Requirements (one per line)','lines',0,0,1],['benefits','Benefits (one per line)','lines',0,0,1]], def:{type:'Full-time',status:'Open',loc:'[LOCATION]',resp:[],req:[],benefits:[]} },
  faqs: { label:'FAQ', icon:'chat', nk:'q', search:['q','a'], cols:[['q','Question'],['a','Answer']], fields:[['q','Question','text',1],['a','Answer','textarea',1,0,1],['visible','Show on Website','toggle']], def:{visible:true} },
  tech: { label:'Technology Stack', icon:'code', nk:'category', search:['category'], cols:[['category','Category'],['items','Technologies','tags']], fields:[['category','Category','text',1],['items','Technologies (comma separated)','tags',1],['visible','Show on Website','toggle']], def:{items:[],visible:true} },
  values: { label:'Core Values', icon:'award', nk:'t', search:['t','d'], cols:[['i','','badge'],['t','Value'],['d','Description']], fields:[['i','Icon','select',0,ICONS],['t','Value Title','text',1],['d','Description','textarea',1,0,1],['visible','Show on Website','toggle']], def:{i:'spark',visible:true} },
  why: { label:'Why NEXARION', icon:'star', nk:'t', search:['t','d'], cols:[['i','','badge'],['t','Reason'],['d','Description']], fields:[['i','Icon','select',0,ICONS],['t','Reason Title','text',1],['d','Description','textarea',1,0,1],['visible','Show on Website','toggle']], def:{i:'cpu',visible:true} },
  legal: { label:'Legal Pages', icon:'shield', nk:'title', search:['title','kind'], cols:[['kind','Page','badge'],['title','Title'],['updated','Last Updated']], fields:[['kind','Legal Page','select',1,['privacy','terms','cookies']],['title','Page Title','text',1],['updated','Last Updated','text'],['intro','Intro / Disclaimer','textarea',0,0,1],['sections','Sections (one per line: Heading | Content)','pairs',0,0,1],['visible','Show on Website','toggle']], def:{kind:'privacy',sections:[],visible:true} },
  contact_options: { label:'Contact Form Options', icon:'mail', nk:'label', search:['group','label'], cols:[['group','Field','badge'],['label','Option']], fields:[['group','Option Group','select',1,['Budget','Timeline']],['label','Option Label','text',1],['visible','Show on Website','toggle']], def:{group:'Budget',visible:true} }
};

const FIELD_HELP = {
  site:{brand:'Nama perusahaan yang digunakan pada judul halaman dan identitas website.',tagline:'Deskripsi singkat bidang perusahaan.',logo:'URL logo eksternal atau biarkan kosong lalu gunakan Upload Logo. PNG/WebP transparan direkomendasikan.',vision:'Visi perusahaan di halaman About dan Home.',mission:'Misi perusahaan di halaman About dan Home.',story1:'Paragraf pertama cerita perusahaan.',story2:'Paragraf kedua cerita perusahaan.',founded:'Tahun berdiri, misalnya 2025.',teamSize:'Jumlah atau deskripsi ukuran tim, misalnya 8 People.',focus:'Fokus bisnis utama.',city:'Kota/lokasi utama perusahaan.',careersBenefits:'Benefit default jika lowongan tidak memiliki benefit khusus.',footerBlurb:'Deskripsi singkat pada footer.',responseTime:'Janji waktu respons yang ditampilkan pada CTA/contact.'},
  page_heroes:{page:'Pilih halaman publik yang dikendalikan.',kicker:'Label kecil di atas judul.',title:'Judul utama halaman. Gunakan teks biasa; tampilan akan mengikuti desain website.',subtitle:'Penjelasan singkat di bawah judul.'},
  stats:{value:'Angka utama tanpa suffix. Contoh: 50.',suffix:'Karakter setelah angka, misalnya + atau %.',label:'Keterangan statistik.',visible:'Matikan untuk menyembunyikan statistik tanpa menghapus data.'},
  services:{title:'Nama layanan yang tampil pada halaman Services.',icon:'Ikon layanan.',desc:'Ringkasan 1–2 kalimat untuk kartu layanan.',tags:'Pisahkan setiap fitur dengan koma.',tech:'Pisahkan teknologi dengan koma.',overview:'Penjelasan utama halaman detail layanan.',problems:'Satu masalah per baris.',solution:'Pendekatan/solusi NEXARION.',whatWeBuild:'Satu output/produk per baris.',benefits:'Satu manfaat per baris.',visible:'Menentukan apakah layanan tampil di website.'},
  projects:{title:'Nama proyek.',cat:'Kategori bebas. Filter Portfolio di website akan mengikuti kategori yang Anda tulis.',year:'Tahun proyek, misalnya 2026.',client:'Nama klien, opsional.',status:'Contoh: Completed, Ongoing, Case Study.',link:'URL proyek publik, opsional.',img:'URL cover eksternal atau biarkan kosong lalu upload file.',tech:'Stack proyek, pisahkan koma.',desc:'Ringkasan pada kartu dan detail.',challenge:'Masalah utama klien.',research:'Riset/penggalian kebutuhan.',strategy:'Strategi proyek.',design:'Arah UI/UX.',development:'Implementasi teknis.',result:'Satu hasil per baris: Label | Value.',big:'Aktifkan agar kartu mendapat layout besar/featured.',visible:'Matikan untuk menyembunyikan proyek dari publik.'},
  process:{n:'Nomor urut yang ditampilkan, misalnya 01.',t:'Nama tahap proses.',d:'Penjelasan singkat tahap.',visible:'Tampilkan/sembunyikan tahap.'},
  pricing:{name:'Nama paket.',price:'Harga yang ditampilkan.',per:'Satuan harga seperti /project.',tagline:'Target atau ringkasan paket.',features:'Satu fitur per baris.',popular:'Memberi label Most Popular.',visible:'Tampilkan/sembunyikan paket.'},
  posts:{title:'Judul artikel.',cat:'Kategori bebas; filter Blog otomatis mengikuti data.',status:'Published tampil di User, Draft hanya Admin.',date:'Tanggal publikasi yang ditampilkan.',read:'Estimasi baca, misalnya 6 min.',author:'Nama penulis.',img:'URL cover atau gunakan upload foto.',excerpt:'Ringkasan kartu Blog.',body:'Gunakan ## Judul Bagian untuk heading dan baris kosong untuk paragraf.'},
  team:{name:'Nama anggota tim.',role:'Jabatan/peran.',img:'URL foto atau upload file.',skills:'Pisahkan skill dengan koma.',linkedin:'URL LinkedIn lengkap.',instagram:'URL Instagram lengkap.',bio:'Biografi singkat.',visible:'Tampilkan/sembunyikan profil.'},
  testimonials:{quote:'Testimoni asli klien.',name:'Nama klien.',role:'Jabatan dan perusahaan.',visible:'Tampilkan/sembunyikan testimoni.'},
  jobs:{title:'Nama posisi.',type:'Jenis pekerjaan.',loc:'Lokasi kerja.',status:'Open tampil di Careers; Closed disimpan di Admin saja.',desc:'Ringkasan posisi.',resp:'Satu tanggung jawab per baris.',req:'Satu persyaratan per baris.',benefits:'Benefit khusus lowongan. Jika kosong, website memakai benefit default dari Website Content.'},
  faqs:{q:'Pertanyaan yang sering ditanyakan.',a:'Jawaban lengkap.',visible:'Tampilkan/sembunyikan FAQ.'},
  tech:{category:'Nama kelompok teknologi, misalnya Backend.',items:'Pisahkan teknologi dengan koma.',visible:'Tampilkan/sembunyikan kategori.'},
  values:{i:'Ikon nilai.',t:'Nama nilai perusahaan.',d:'Penjelasan nilai.',visible:'Tampilkan/sembunyikan nilai.'},
  why:{i:'Ikon alasan.',t:'Judul alasan memilih perusahaan.',d:'Penjelasan alasan.',visible:'Tampilkan/sembunyikan.'},
  legal:{kind:'privacy untuk Privacy Policy, terms untuk Terms & Conditions, cookies untuk Cookie Policy.',title:'Judul halaman legal.',updated:'Tanggal pembaruan yang ditampilkan.',intro:'Pengantar/disclaimer.',sections:'Satu bagian per baris dengan format Heading | Content.',visible:'Matikan bila belum siap dipublikasikan.'},
  contact_options:{group:'Pilih apakah opsi untuk Budget atau Timeline.',label:'Teks opsi yang muncul di form Contact.',visible:'Tampilkan/sembunyikan opsi.'}
};
const fieldHelp = (section,key,type,required) => FIELD_HELP[section]?.[key] || (required ? 'Kolom ini wajib diisi.' : 'Kolom ini opsional; kosongkan jika belum diperlukan.');
const helpHtml = text => `<span class="field-help">${esc(text)}</span>`;

const listQuery = {};
const adminSlug = value => String(value || '').normalize('NFKD').replace(/[\u0300-\u036f]/g,'').toLowerCase().trim().replace(/[^a-z0-9]+/g,'-').replace(/^-+|-+$/g,'');
const publicPreviewUrl = (key, it={}) => {
  const slug = adminSlug(it.slug || it.title || it.name || '');
  const pageMap = {
    site:'/', page_heroes:'/', stats:'/', process:'/#/process', pricing:'/#/pricing', team:'/#/team',
    testimonials:'/', faqs:'/#/faq', tech:'/#/services', values:'/#/about', why:'/#/about', contact_options:'/#/contact'
  };
  if (key === 'services') return slug ? `/#/services/${slug}` : '/#/services';
  if (key === 'projects') return slug ? `/#/portfolio/${slug}` : '/#/portfolio';
  if (key === 'posts') return slug ? `/#/blog/${slug}` : '/#/blog';
  if (key === 'jobs') return '/#/careers';
  if (key === 'legal') return `/#/${it.kind || 'privacy'}`;
  if (key === 'page_heroes') return it.page === 'home' ? '/' : `/#/${it.page || ''}`;
  return pageMap[key] || '/';
};
const isPublicItem = (key, it={}) => {
  if (it.visible === false) return false;
  if (key === 'posts' && String(it.status || 'Published') !== 'Published') return false;
  if (key === 'jobs' && String(it.status || 'Open') !== 'Open') return false;
  return true;
};

/* ============ NAV CONFIG ============ */
const NAV = [
  { sec: 'Overview', items: [['dashboard', 'Dashboard', 'grid'], ['site', 'Website Content', 'globe'], ['page_heroes', 'Page Heroes', 'layers']] },
  { sec: 'Public Content', items: [['stats', 'Homepage Stats', 'pulse'], ['services', 'Services', 'cpu'], ['projects', 'Portfolio', 'brief'], ['process', 'Process', 'layers'], ['pricing', 'Pricing', 'db'], ['posts', 'Blog', 'file'], ['team', 'Team', 'users'], ['jobs', 'Careers', 'award'], ['testimonials', 'Testimonials', 'star'], ['faqs', 'FAQ', 'chat'], ['tech', 'Technology', 'code'], ['values', 'Core Values', 'award'], ['why', 'Why NEXARION', 'star'], ['legal', 'Legal Pages', 'shield'], ['contact_options', 'Contact Options', 'mail']] },
  { sec: 'Engagement', items: [['messages', 'Inbox', 'mail'], ['notices', 'Client Notices', 'send'], ['activity', 'Activity Log', 'pulse']] },
  { sec: 'System', items: [['maintenance', 'Maintenance', 'wrench'], ['settings', 'Settings', 'sliders']] }
];
const PAGE_TITLES = { dashboard: 'Dashboard', messages: 'Inbox', notices: 'Client Notices', activity: 'Activity Log', maintenance: 'Maintenance Mode', settings: 'Settings' };
const ACT_ICONS = { login: 'key', login_failed: 'alert', logout: 'logout', create: 'plus', update: 'pen', delete: 'trash', export: 'download', import: 'upload', maintenance: 'wrench', settings: 'sliders', system: 'zap', reset: 'refresh', mail: 'mail' };

/* ============ VIEW: LOGIN ============ */
function viewLogin() {
  $('#app').innerHTML = `
  <div class="login">
    <div class="l-visual">
      <div class="l3d" id="l3d" aria-hidden="true"></div>
      <div class="l-copy">
        <div class="brand"><span class="brand-mark">${ic('logo', 16)}</span>NEXARION</div>
        <h1>Control <span>Center</span></h1>
        <p>One synchronized workspace for public website content, inbox, maintenance, and system health.</p>
        <div class="l-stats">
          <div><b>17</b><span>Public content modules</span></div>
          <div><b>Live</b><span>Instant save</span></div>
          <div><b>Ctrl K</b><span>Command palette</span></div>
        </div>
        <div class="l-clock" data-clock aria-live="off">
          <b class="c-time">--:--:--</b>
          <span class="c-date">—</span>
        </div>
      </div>
    </div>
    <div class="l-form">
      <button class="icon-btn l-theme" id="themeBtn" aria-label="Toggle theme"></button>
      <div class="l-card tilt" id="lCard">
        <div class="ticks"><i></i><i></i><i></i><i></i></div>
        <div class="brand" style="display:flex;align-items:center;gap:.7rem;font-family:var(--font-d);font-weight:700;letter-spacing:.14em">
          <span class="brand-mark">${ic('logo', 16)}</span>NEXARION
        </div>
        <h2>Admin Access</h2>
        <p class="lsub">Sign in to manage the website. Authorized personnel only.</p>
        <div class="l-err" id="lErr" role="alert">${ic('alert', 18)}<span id="lErrTxt"></span></div>
        <form id="loginForm" novalidate>
          <div class="field" id="fUser">
            <label for="lu">Username</label>
            <div class="inwrap">${ic('user', 17)}<input id="lu" autocomplete="username" placeholder="${DEFAULT_USER}"></div>
            <span class="field-help">Masukkan username akun Admin NEXARION.</span>
            <span class="f-err">Username is required.</span>
          </div>
          <div class="field" id="fPass">
            <label for="lp">Password</label>
            <div class="inwrap has-peek">${ic('lock', 17)}
              <input id="lp" type="password" autocomplete="current-password" placeholder="••••••••••">
              <button type="button" class="peek" id="peek" aria-label="Show password">${ic('eye', 16)}</button>
            </div>
            <span class="field-help">Masukkan password akun Admin. Password bersifat case-sensitive.</span>
            <span class="f-err">Password is required.</span>
          </div>
          <div class="l-row">
            <label class="ck"><input type="checkbox" id="lrem"> Remember me</label>
            <span class="mono" style="font-size:.68rem">Secure area</span>
          </div>
          <button class="btn btn-p magnetic" type="submit" id="lBtn" style="width:100%;justify-content:center"><span class="mag-in">Sign In ${ic('arrow-r', 15)}</span></button>
        </form>
        <div class="l-cred">${ic('info', 15)}<span>Demo credentials — <code>${DEFAULT_USER}</code> / <code>${DEFAULT_PASS}</code>. Change them in Settings after first login. Production deployments should use server-side authentication.</span></div>
      </div>
    </div>
  </div>`;
  applyAdminBranding($('#app'));
  const tb = $('#themeBtn');
  const syncTb = () => { tb.innerHTML = document.documentElement.dataset.theme === 'light' ? ic('moon', 17) : ic('sun', 17); };
  syncTb();
  tb.addEventListener('click', () => {
    const el = document.documentElement, next = el.dataset.theme === 'light' ? 'dark' : 'light';
    if (next === 'dark') el.removeAttribute('data-theme'); else el.setAttribute('data-theme', 'light');
    try { localStorage.setItem('nx-theme', next); } catch (e) {}
    syncTb();
  });

  initHoloN();
  initTilt($('#app'));
  initMagnetic($('#app'));
  startClocks($('#app'));

  $('#peek').addEventListener('click', () => {
    const p = $('#lp'), show = p.type === 'password';
    p.type = show ? 'text' : 'password';
    $('#peek').innerHTML = ic(show ? 'eye-off' : 'eye', 16);
    p.focus();
  });

  let attempts = 0;
  const form = $('#loginForm'), card = $('#lCard'), errBox = $('#lErr'), errTxt = $('#lErrTxt'), btn = $('#lBtn');
  const showErr = html => {
    errTxt.innerHTML = html;
    errBox.classList.remove('show'); void errBox.offsetWidth; errBox.classList.add('show');
    card.classList.remove('err-state'); void card.offsetWidth; card.classList.add('err-state');
    setTimeout(() => card.classList.remove('err-state'), 900);
  };
  const startLock = () => {
    const until = getLock();
    const tick = () => {
      const left = Math.ceil((until - Date.now()) / 1000);
      if (left <= 0) { btn.disabled = false; btn.querySelector('.mag-in').innerHTML = 'Sign In ' + ic('arrow-r', 15); clearInterval(iv); return; }
      btn.disabled = true;
      btn.querySelector('.mag-in').innerHTML = ic('lock', 15) + ` Locked — retry in ${left}s`;
    };
    const iv = setInterval(tick, 500); tick();
    addCleanup(() => clearInterval(iv));
  };
  if (getLock() > Date.now()) startLock();

  form.addEventListener('submit', async e => {
    e.preventDefault();
    if (getLock() > Date.now()) return;
    const u = $('#lu').value.trim(), p = $('#lp').value;
    let bad = false; $('#fUser').classList.toggle('err', !u); bad = bad || !u; $('#fPass').classList.toggle('err', !p); bad = bad || !p; if (bad) return;
    btn.disabled = true; btn.querySelector('.mag-in').innerHTML = '<span class="spin"></span> Signing in…';
    try {
      const r = await apiFetch('/admin/login',{method:'POST',body:JSON.stringify({username:u,password:p,remember:$('#lrem').checked})});
      const j = await r.json().catch(()=>({}));
      if(!r.ok) throw {status:r.status,...j};
      setCsrfToken(j.csrf_token); DB=j.state; window.NX_INITIAL_STATE=DB; setSession(u,$('#lrem').checked); toast('Welcome back, '+u+'.'); location.hash='#/dashboard'; render();
    } catch(err) {
      attempts++; const msg=err.message || 'Invalid username or password.'; showErr(`<b>Sign in failed</b>${esc(msg)}`); toast(msg,'error');
      if(err.status===429){ setLock(30000); startLock(); }
    } finally { if(getLock()<=Date.now()){btn.disabled=false;btn.querySelector('.mag-in').innerHTML='Sign In '+ic('arrow-r',15);} }
  });
}

/* ============ VIEW: SHELL ============ */
function viewShell(seg) {
  const unread = DB.messages.filter(m => !m.read).length;
  const navHtml = NAV.map(g => `
    <div class="sn-sec">${g.sec}</div>
    ${g.items.map(([k, l, i]) => `
      <a class="sn-item${(seg[0] || 'dashboard') === k ? ' on' : ''}" href="#/${k}" data-page="${k}">
        ${ic(i, 17)}<span>${l}</span>
        ${k === 'messages' ? `<span class="sn-badge${unread ? '' : ' zero'}">${unread}</span>` : ''}
      </a>`).join('')}`).join('');

  const key = seg[0] || 'dashboard';
  const title = PAGE_TITLES[key] || (SCHEMAS[key] ? SCHEMAS[key].label : 'Not Found');

  $('#app').innerHTML = `
  <div class="shell">
    <aside class="side" id="side">
      <div class="side-head">
        <span class="brand-mark">${ic('logo', 16)}</span>
        <div><div class="brand">NEXARION</div><small>Control Center</small></div>
      </div>
      <nav class="side-nav" aria-label="Admin">${navHtml}</nav>
      <div class="side-foot">
        <span class="ava">${esc((DB.settings.user || 'N')[0].toUpperCase())}</span>
        <div><b>${esc(DB.settings.user)}</b><span>Webmaster</span></div>
        <button class="icon-btn danger" id="logoutBtn" aria-label="Log out" title="Log out">${ic('logout', 16)}</button>
      </div>
    </aside>
    <div class="side-overlay" id="sideOv"></div>
    <div class="main">
      <div class="orb orb-a" aria-hidden="true"></div>
      <div class="orb orb-b" aria-hidden="true"></div>
      <header class="topbar">
        <button class="icon-btn" id="sideBtn" aria-label="Open menu" style="display:none">${ic('menu', 17)}</button>
        <div class="crumb">${ic(key === 'dashboard' ? 'grid' : (SCHEMAS[key]?.icon || (key === 'notices' ? 'send' : key === 'maintenance' ? 'wrench' : key === 'settings' ? 'sliders' : key === 'activity' ? 'pulse' : key === 'messages' ? 'mail' : 'grid')), 15)}<h1>${esc(title)}</h1></div>
        <div class="top-right">
          <div class="clock-chip" data-clock aria-live="off" title="Local time">
            <span class="c-date">—</span><span class="c-dot"></span><span class="c-time">--:--:--</span>
          </div>
          <a class="btn btn-g btn-sm" href="/" target="_blank" rel="noopener" title="Open public website">${ic('globe',14)} View Site</a>
          <button class="kbd-hint" id="palBtn">${ic('search', 15)}<span>Quick find</span><kbd>Ctrl K</kbd></button>
          <button class="icon-btn" id="themeBtn" aria-label="Toggle theme"></button>
        </div>
      </header>
      <div class="content" id="page"></div>
    </div>
  </div>`;

  const tb = $('#themeBtn');
  const syncTb = () => { tb.innerHTML = document.documentElement.dataset.theme === 'light' ? ic('moon', 17) : ic('sun', 17); };
  syncTb();
  tb.addEventListener('click', () => {
    const el = document.documentElement, next = el.dataset.theme === 'light' ? 'dark' : 'light';
    if (next === 'dark') el.removeAttribute('data-theme'); else el.setAttribute('data-theme', 'light');
    try { localStorage.setItem('nx-theme', next); } catch (e) {}
    syncTb();
  });

  applyAdminBranding($('#app'));
  const side = $('#side'), ov = $('#sideOv'), sBtn = $('#sideBtn');
  const syncSideBtn = () => sBtn.style.display = innerWidth <= 900 ? 'grid' : 'none';
  syncSideBtn();
  addEventListener('resize', syncSideBtn);
  const closeSide = () => { side.classList.remove('open'); ov.classList.remove('show'); };
  sBtn.addEventListener('click', () => { side.classList.add('open'); ov.classList.add('show'); });
  ov.addEventListener('click', closeSide);
  $$('.sn-item').forEach(a => a.addEventListener('click', closeSide));

  $('#logoutBtn').addEventListener('click', () => confirmModal({
    title: 'Log out?', msg: 'You will need to sign in again to access the control center.',
    okText: 'Log Out', danger: false,
    onOk: () => { logA('logout', DB.settings.user + ' signed out'); clearSession(); toast('Signed out safely.'); location.hash = '#/login'; }
  }));

  $('#palBtn').addEventListener('click', openPalette);
  startClocks($('#app'));
  initParallax($('#app'));

  renderPage(key);
}

/* ============ PAGES ============ */
function pageDashboard() {
  const total = Object.keys(SCHEMAS).reduce((a,k)=>a+(Array.isArray(DB[k])?DB[k].length:0),0);
  const unread = DB.messages.filter(m => !m.read).length;
  const drafts = DB.posts.filter(p => p.status === 'Draft').length;
  const size = fmtBytes(new Blob([JSON.stringify(DB)]).size);

  const days = [...Array(7)].map((_, i) => {
    const d = new Date(); d.setHours(0, 0, 0, 0); d.setDate(d.getDate() - (6 - i));
    return d;
  });
  const counts = days.map(d => DB.activity.filter(a => a.t >= d.getTime() && a.t < d.getTime() + 86400e3).length);
  const hasAct = counts.some(c => c > 0);
  const recent = DB.activity.slice(0, 6);
  const actIcon = t => ACT_ICONS[t] || 'pulse';

  $('#page').innerHTML = `
  <div class="page-head pin" style="--d:0s">
    <div>
      <p class="kicker">Overview</p>
      <h1>Welcome back, ${esc(DB.settings.user)}</h1>
      <p class="lead">${new Date().toLocaleDateString('en-GB', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' })} — here is the state of your website.</p>
    </div>
    <div class="page-actions">
      <span class="count-pill">${DB.settings.maintenance ? ic('wrench', 12) + ' Maintenance ON' : ic('check', 12) + ' Site Live'}</span><a class="btn btn-g btn-sm" href="/" target="_blank" rel="noopener">${ic('globe',13)} View Website</a>
    </div>
  </div>

  <div class="stat-grid pin" style="--d:.05s">
    <div class="stat-card tilt"><div class="sc-top"><span class="sc-ic">${ic('layers', 18)}</span></div><b><span class="count" data-to="${total}">0</span></b><span>Total content items</span></div>
    <div class="stat-card tilt ${unread ? 'alert' : ''}"><div class="sc-top"><span class="sc-ic">${ic('mail', 18)}</span></div><b><span class="count" data-to="${unread}">0</span></b><span>Unread messages</span></div>
    <div class="stat-card tilt"><div class="sc-top"><span class="sc-ic">${ic('file', 18)}</span></div><b><span class="count" data-to="${drafts}">0</span></b><span>Draft posts</span></div>
    <div class="stat-card tilt"><div class="sc-top"><span class="sc-ic">${ic('db', 18)}</span></div><b>${esc(size)}</b><span>SQLite-backed data</span></div>
  </div>

  <div class="dash-grid pin" style="--d:.1s">
    <div class="panel tilt"><div class="ticks"><i></i><i></i><i></i><i></i></div>
      <h3>${ic('pulse', 16)} Activity — last 7 days</h3>
      ${hasAct ? '<canvas class="chart" id="actChart" aria-label="Activity chart"></canvas>'
               : `<div class="empty" style="padding:2.4rem">${ic('pulse', 26)}<h3>No activity yet</h3><p>Actions you take — edits, logins, exports — will chart here.</p></div>`}
    </div>
    <div class="panel">
      <h3>${ic('zap', 16)} Quick actions</h3>
      <div class="qa-grid">
        <button class="qa" data-qa="posts">${ic('file', 16)} New Blog Post</button>
        <button class="qa" data-qa="projects">${ic('brief', 16)} New Project</button>
        <button class="qa" data-qa="maintenance">${ic('wrench', 16)} Maintenance Mode</button>
        <button class="qa" data-qa="notices">${ic('send', 16)} Client Notices</button>
        <button class="qa" data-qa="export">${ic('download', 16)} Export Data</button>
        <button class="qa" data-qa="settings">${ic('sliders', 16)} Settings</button>
      </div>
      <h3 style="margin-top:1.6rem">${ic('clock', 16)} Recent activity</h3>
      <ul class="act-list">
        ${recent.map(a => `<li><span class="act-ic ${a.type.includes('fail') || a.type === 'delete' ? 'bad' : ''}">${ic(actIcon(a.type), 14)}</span><div><p><b>${esc(a.type.replace('_', ' '))}</b> — ${esc(a.msg)}</p><time>${fmtAgo(a.t)}</time></div></li>`).join('')}
      </ul>
    </div>
  </div>

  <div class="panel pin tilt" style="--d:.16s;margin-top:clamp(14px,1.8vw,20px)">
    <h3>${ic('shield', 16)} System health</h3>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:0 2rem">
      <div><div class="sys-row"><span>Status</span><b style="color:var(--accent)">All systems operational</b></div>
      <div class="sys-row"><span>Maintenance mode</span><b>${DB.settings.maintenance ? 'ON' : 'OFF'}</b></div></div>
      <div><div class="sys-row"><span>Data engine</span><b>SQLite / Laravel · v${DB.v}</b></div>
      <div class="sys-row"><span>Session user</span><b>${esc(DB.settings.user)}</b></div></div>
    </div>
  </div>`;

  initCounters($('#page'));
  if (hasAct) drawChart($('#actChart'), counts, days);
  $$('.qa', $('#page')).forEach(b => b.addEventListener('click', () => {
    const k = b.dataset.qa;
    if (SCHEMAS[k]) openForm(k);
    else if (k === 'export') exportDB();
    else location.hash = '#/' + k;
  }));
}

function drawChart(cv, counts, days) {
  const dpr = devicePixelRatio || 1, w = cv.clientWidth, h = cv.clientHeight || 220;
  cv.width = w * dpr; cv.height = h * dpr;
  const ctx = cv.getContext('2d'); ctx.scale(dpr, dpr);
  const acc = getComputedStyle(document.documentElement).getPropertyValue('--accent').trim() || '#25e6c0';
  const line = getComputedStyle(document.documentElement).getPropertyValue('--line2').trim();
  const faint = getComputedStyle(document.documentElement).getPropertyValue('--faint').trim();
  const max = Math.max(...counts, 1), pad = 26, bw = (w - pad * 2) / 7;
  const t0 = performance.now();
  (function frame(t) {
    const p = REDUCED ? 1 : Math.min(1, (t - t0) / 800), e = 1 - Math.pow(1 - p, 3);
    ctx.clearRect(0, 0, w, h);
    ctx.strokeStyle = line;
    for (let g = 0; g <= 3; g++) { const y = 14 + (h - 56) * g / 3; ctx.beginPath(); ctx.moveTo(pad, y); ctx.lineTo(w - pad, y); ctx.stroke(); }
    counts.forEach((c, i) => {
      const bh = (c / max) * (h - 70) * e;
      const x = pad + bw * i + bw * .22, y = h - 34 - bh;
      ctx.shadowColor = acc; ctx.shadowBlur = c ? 14 : 0;
      ctx.fillStyle = acc; ctx.globalAlpha = c ? .9 : .25;
      const r = Math.min(6, bw * .28);
      ctx.beginPath();
      ctx.moveTo(x, y + bh); ctx.lineTo(x, y + r); ctx.quadraticCurveTo(x, y, x + r, y);
      ctx.lineTo(x + bw * .56 - r, y); ctx.quadraticCurveTo(x + bw * .56, y, x + bw * .56, y + r);
      ctx.lineTo(x + bw * .56, y + bh); ctx.closePath(); ctx.fill();
      ctx.shadowBlur = 0; ctx.globalAlpha = 1;
      ctx.fillStyle = faint; ctx.font = '10px Space Grotesk'; ctx.textAlign = 'center';
      ctx.fillText(days[i].toLocaleDateString('en-GB', { weekday: 'short' }), x + bw * .28, h - 14);
      if (c && e > .95) ctx.fillText(c, x + bw * .28, y - 7);
    });
    if (p < 1) requestAnimationFrame(frame);
  })(t0);
}

/* ---- generic CRUD pages ---- */
function pageCrud(key) {
  const sc = SCHEMAS[key], items = DB[key], q = (listQuery[key] || '').toLowerCase();
  const filtered = items.filter(it => !q || sc.search.some(f => String(it[f] || '').toLowerCase().includes(q)));
  const cell = (it, c) => {
    const [k, , type] = c, v = it[c[0]];
    if (type === 'img') return `<img class="timg" src="${esc(v || `https://picsum.photos/seed/${it.id}/200/140.jpg`)}" alt="" loading="lazy">`;
    if (type === 'tags') return `<span class="tagchips">${(Array.isArray(v) ? v : []).slice(0, 3).map(t => `<i>${esc(t)}</i>`).join('')}</span>`;
    if (type === 'badge') {
      const cls = /published|open|popular/i.test(v) ? 'ok' : /draft|closed/i.test(v) ? 'mut' : '';
      return `<span class="bdg ${cls}">${esc(v || '—')}</span>`;
    }
    if (k === 'title' || k === 'name' || k === 'q') return `<span class="td-title">${esc(v)}</span>`;
    if (k === 'desc' || k === 'quote' || k === 'a' || k === 'bio' || k === 'tagline') return `<span class="td-clamp">${esc(v)}</span>`;
    return esc(v ?? '—');
  };
  $('#page').innerHTML = `
  <div class="page-head pin" style="--d:0s">
    <div>
      <p class="kicker">Content Manager</p>
      <h1>${sc.label}</h1>
      <p class="lead">${items.length} item${items.length !== 1 ? 's' : ''} published to the website module.</p>
    </div>
    <div class="page-actions">
      <div class="search-inline">${ic('search', 15)}<input data-listq placeholder="Search ${sc.label.toLowerCase()}…" value="${esc(listQuery[key] || '')}" aria-label="Search"></div>
      ${sc.single && items.length ? '' : `<button class="btn btn-p magnetic" data-add><span class="mag-in">${ic('plus', 15)} Add New</span></button>`}
    </div>
  </div>
  <div class="panel pin" style="--d:.06s"><div class="ticks"><i></i><i></i><i></i><i></i></div>
    ${filtered.length ? `
    <div class="twrap"><table class="tbl">
      <thead><tr>${sc.cols.map(c => `<th>${c[1] || ''}</th>`).join('')}<th class="th-actions">Actions</th></tr></thead>
      <tbody>
        ${filtered.map((it, i) => `
          <tr style="--r:${i}">
            ${sc.cols.map(c => `<td>${cell(it, c)}</td>`).join('')}
            <td class="td-act">
              <div class="row-actions">
                <span class="action-group">
                  <button class="action-btn primary" data-view="${it.id}" aria-label="View on public site" title="${isPublicItem(key,it) ? 'View on public site' : 'This item is not currently public'}" ${isPublicItem(key,it) ? '' : 'disabled'}>${ic('eye',14)}<span class="act-label">View</span></button>
                </span>
                ${sc.single || q ? '' : `<span class="action-group"><button class="action-btn" data-up="${it.id}" aria-label="Move up" title="Move up" ${i===0?'disabled':''}><span style="display:inline-block;transform:rotate(180deg)">${ic('chev-d',14)}</span><span class="act-label">Up</span></button><button class="action-btn" data-down="${it.id}" aria-label="Move down" title="Move down" ${i===filtered.length-1?'disabled':''}>${ic('chev-d',14)}<span class="act-label">Down</span></button></span>`}
                <span class="action-group">
                  <button class="action-btn" data-edit="${it.id}" aria-label="Edit" title="Edit">${ic('pen',14)}<span class="act-label">Edit</span></button>
                  ${sc.single ? '' : `<button class="action-btn danger" data-del="${it.id}" aria-label="Delete" title="Delete">${ic('trash',14)}<span class="act-label">Delete</span></button>`}
                </span>
              </div>
            </td>
          </tr>`).join('')}
      </tbody>
    </table></div>`
    : `<div class="empty" style="margin:.4rem">${ic(sc.icon, 28)}<h3>${q ? 'No matches' : 'Nothing here yet'}</h3><p>${q ? `No ${sc.label.toLowerCase()} match "${esc(q)}".` : `Add your first ${sc.label.toLowerCase().replace(/s$/, '')} to publish it to the website.`}</p></div>`}
  </div>`;

  const qInput = $('[data-listq]');
  qInput.addEventListener('input', () => { listQuery[key] = qInput.value; renderPage(key); const n = $('[data-listq]'); n.focus(); n.setSelectionRange(n.value.length, n.value.length); });
  $('[data-add]')?.addEventListener('click', () => openForm(key));
  $$('[data-view]').forEach(b => b.addEventListener('click', () => {
    if (b.disabled) return;
    const it = DB[key].find(x => x.id === b.dataset.view);
    if (!it) return;
    window.open(publicPreviewUrl(key, it), '_blank', 'noopener');
  }));
  $$('[data-edit]').forEach(b => b.addEventListener('click', () => openForm(key, b.dataset.edit)));
  const moveItem = async (id, delta) => {
    const idx=DB[key].findIndex(x=>x.id===id), to=idx+delta; if(idx<0||to<0||to>=DB[key].length) return;
    const before = JSON.parse(JSON.stringify(DB));
    [DB[key][idx],DB[key][to]]=[DB[key][to],DB[key][idx]];
    logA('update', `${sc.label}: display order changed`);
    try{await saveDB();window.NX_INITIAL_STATE=DB;toast('Display order updated.');renderPage(key);}catch(err){DB=before;window.NX_INITIAL_STATE=DB;toast(err.message||'Could not update order.','error');renderPage(key);}
  };
  $$('[data-up]').forEach(b=>b.addEventListener('click',()=>moveItem(b.dataset.up,-1)));
  $$('[data-down]').forEach(b=>b.addEventListener('click',()=>moveItem(b.dataset.down,1)));
  $$('[data-del]').forEach(b => b.addEventListener('click', () => {
    const it = DB[key].find(x => x.id === b.dataset.del);
    confirmModal({
      title: `Delete this item?`,
      msg: `<b style="color:var(--text);font-family:var(--font-d)">${esc(it[sc.nk])}</b><br>This will be permanently removed from the website content. This action cannot be undone.`,
      onOk: async () => {
        const before = JSON.parse(JSON.stringify(DB));
        DB[key] = DB[key].filter(x => x.id !== it.id);
        logA('delete', `${sc.label}: removed "${it[sc.nk]}"`);
        try { await saveDB(); window.NX_INITIAL_STATE=DB; toast('Item deleted.'); renderPage(key); }
        catch (err) { DB=before; window.NX_INITIAL_STATE=DB; toast(err.message || 'Could not delete item.', 'error'); renderPage(key); }
      }
    });
  }));
}

function openForm(key, id) {
  const sc = SCHEMAS[key];
  const it = id ? DB[key].find(x => x.id === id) : { id: uid(), ...JSON.parse(JSON.stringify(sc.def || {})) };
  const isEdit = !!id;
  const fieldHtml = sc.fields.map(([k, l, t, req, opts, full]) => {
    const v = it[k] ?? (k === 'visible' ? true : '');
    const star = req ? ' <b>*</b>' : '';
    const helper = helpHtml(fieldHelp(key, k, t, req));
    if (t === 'textarea' || t === 'lines' || t === 'pairs') {
      let txt = v;
      if (t === 'lines' && Array.isArray(v)) txt = v.join('\n');
      if (t === 'pairs' && Array.isArray(v)) txt = v.map(r => Array.isArray(r) ? r.join(' | ') : r).join('\n');
      return `<div class="field${full ? ' full' : ''}"><label for="ff-${k}">${l}${star}</label><textarea id="ff-${k}" data-k="${k}" rows="4">${esc(txt)}</textarea>${helper}${req ? '<span class="f-err">This field is required.</span>' : ''}</div>`;
    }
    if (t === 'select') return `<div class="field"><label for="ff-${k}">${l}${star}</label><select id="ff-${k}" data-k="${k}">${opts.map(o => `<option${o === v ? ' selected' : ''}>${esc(o)}</option>`).join('')}</select>${helper}${req ? '<span class="f-err">This field is required.</span>' : ''}</div>`;
    if (t === 'toggle') return `<div class="field${full ? ' full' : ''}"><label>${l}</label><label class="ck"><input type="checkbox" data-k="${k}" ${v ? 'checked' : ''}> Enabled</label>${helper}</div>`;
    const inputType = t === 'url' ? 'url' : 'text';
    return `<div class="field${full ? ' full' : ''}"><label for="ff-${k}">${l}${star}</label><input type="${inputType}" id="ff-${k}" data-k="${k}" value="${esc(Array.isArray(v) ? v.join(', ') : v)}" placeholder="${t === 'tags' ? 'item a, item b, item c' : t === 'url' ? 'https://…' : ''}">${helper}${req ? '<span class="f-err">This field is required.</span>' : ''}</div>`;
  }).join('');

  const uploadable = ['projects','posts','team','site'].includes(key);
  const uploadTarget = key === 'site' ? 'logo' : 'img';
  const uploadLabel = key === 'site' ? 'Logo' : (key === 'team' ? 'Photo' : 'Cover Image');
  const currentUpload = it[uploadTarget] || '';
  const uploadHtml = uploadable ? `<div class="field full"><label for="ff-image-upload">Upload ${uploadLabel} (optional)</label><input id="ff-image-upload" type="file" accept="image/jpeg,image/png,image/webp,image/gif"><span class="field-help">JPEG/PNG/WebP/GIF maksimal 5 MB. ${key === 'site' ? 'PNG/WebP transparan direkomendasikan. Logo akan dipakai pada header/footer User dan identitas Admin.' : 'File upload akan menggantikan URL gambar pada item ini.'} Kosongkan jika ingin mempertahankan file/URL lama.</span>${currentUpload ? `<img src="${esc(currentUpload)}" alt="Current ${uploadLabel}" style="margin-top:.7rem;max-width:220px;width:auto;height:90px;object-fit:contain;border-radius:10px;border:1px solid var(--line);padding:8px;background:var(--panel)">` : ''}</div>` : '';

  const m = openModal(`
    <div class="modal-head">
      <div><p class="kicker">${sc.label}</p><h3 style="margin-top:.4rem">${isEdit ? 'Edit Item' : 'Add New Item'}</h3>
      <p class="msub">Changes are saved to SQLite and reflected automatically on the public site.</p></div>
    </div>
    <div class="modal-body"><div class="form-grid"><div class="form-note"><b>*</b> = wajib diisi. Kolom tanpa tanda <b>*</b> bersifat opsional. Perubahan baru dianggap berhasil setelah tersimpan ke SQLite.</div>${fieldHtml}${uploadHtml}</div></div>
    <div class="modal-foot">
      <button class="btn btn-g" data-cancel>Cancel</button>
      <button class="btn btn-p magnetic" data-save><span class="mag-in">${ic('save', 15)} ${isEdit ? 'Save Changes' : 'Create Item'}</span></button>
    </div>`, 'frm');

  m.bd.querySelector('[data-cancel]').addEventListener('click', m.close);
  initMagnetic(m.bd);
  m.bd.querySelector('[data-save]').addEventListener('click', async () => {
    const saveBtn = m.bd.querySelector('[data-save]');
    const out = {};
    let ok = true;
    sc.fields.forEach(([k, l, t, req]) => {
      const el = m.bd.querySelector(`[data-k="${k}"]`);
      let v = t === 'toggle' ? el.checked : el.value.trim();
      if (t === 'tags') v = el.value.split(',').map(s => s.trim()).filter(Boolean);
      if (t === 'lines') v = el.value.split(/\r?\n/).map(s => s.trim()).filter(Boolean);
      if (t === 'pairs') v = el.value.split(/\r?\n/).map(s => s.trim()).filter(Boolean).map(line => { const [a,...rest]=line.split('|'); return [a.trim(), rest.join('|').trim()]; }).filter(r=>r[0]);
      const f = el.closest('.field');
      if (req && (!v || (Array.isArray(v) && !v.length))) { f.classList.add('err'); ok = false; }
      else f.classList.remove('err');
      if (t === 'url' && v && !/^https?:\/\//i.test(v) && !v.startsWith('/')) { f.classList.add('err'); ok = false; }
      out[k] = v;
    });
    if (!ok) { toast('Please fill the required fields and use valid URLs.', 'error'); return; }
    if (key === 'page_heroes' && DB[key].some(x=>x.id!==it.id && x.page===out.page)) { toast('Page Hero untuk halaman tersebut sudah ada. Edit item yang sudah ada.', 'error'); return; }
    if (key === 'legal' && DB[key].some(x=>x.id!==it.id && x.kind===out.kind)) { toast('Legal page tersebut sudah ada. Edit item yang sudah ada.', 'error'); return; }
    if (key === 'tech' && DB[key].some(x=>x.id!==it.id && String(x.category).toLowerCase()===String(out.category).toLowerCase())) { toast('Kategori teknologi tersebut sudah ada.', 'error'); return; }

    const beforeState = JSON.parse(JSON.stringify(DB));
    try {
      saveBtn.disabled = true;
      saveBtn.querySelector('.mag-in').innerHTML = '<span class="spin"></span> Saving…';
      if (uploadable) {
        const file = m.bd.querySelector('#ff-image-upload')?.files?.[0];
        if (file) {
          const fd = new FormData(); fd.append('section', key); fd.append('image', file);
          const r = await apiFetch('/admin/content/upload', { method:'POST', body:fd });
          const j = await r.json().catch(()=>({}));
          if(!r.ok) throw new Error(j.message || Object.values(j.errors||{}).flat()[0] || 'Image upload failed');
          out[uploadTarget] = j.url;
        }
      }
      Object.assign(it, out);
      if (!isEdit) DB[key].unshift(it);
      logA(isEdit ? 'update' : 'create', `${sc.label}: ${isEdit ? 'updated' : 'created'} "${it[sc.nk]}"`);
      await saveDB();
      window.NX_INITIAL_STATE = DB;
      if(key === 'site') { window.NX_PUBLIC_SITE = {...(window.NX_PUBLIC_SITE||{}), ...(DB.site?.[0]||{})}; applyAdminBranding(document); }
      m.close();
      toast(isEdit ? 'Changes saved to SQLite.' : 'Item created and published.');
      listQuery[key] = '';
      if ((location.hash.replace('#/', '') || 'dashboard') === key) renderPage(key);
    } catch(err) {
      DB = beforeState;
      window.NX_INITIAL_STATE = DB;
      toast(err.message || 'Could not save this item.', 'error');
      saveBtn.disabled = false;
      saveBtn.querySelector('.mag-in').innerHTML = `${ic('save',15)} ${isEdit ? 'Save Changes' : 'Create Item'}`;
    }
  });
}

/* ---- Inbox ---- */
function pageMessages() {
  const msgs = DB.messages;
  $('#page').innerHTML = `
  <div class="page-head pin" style="--d:0s">
    <div><p class="kicker">Engagement</p><h1>Inbox</h1>
    <p class="lead">${msgs.filter(m => !m.read).length} unread of ${msgs.length} messages.</p></div>
    <div class="page-actions">
      <button class="btn btn-g btn-sm" id="msgSample">${ic('plus', 14)} Insert Sample</button>
    </div>
  </div>
  ${msgs.length ? msgs.map((msg, i) => `
    <div class="msg pin${msg.read ? '' : ' unread'}" style="--d:${.05 + i * .04}s;--r:${i}" data-id="${msg.id}">
      <button class="msg-head" data-toggle>
        <span class="ava">${esc((msg.from || '?').replace('[SAMPLE]', '').trim()[0] || '?').toUpperCase()}</span>
        <span style="min-width:0;text-align:left"><b>${esc(msg.from)}</b><span>${esc(msg.email)}</span><span class="subj" style="display:block">${esc(msg.subject)}</span></span>
        <span class="msg-acts">
          <span class="icon-btn act ${msg.star ? 'starred' : ''}" data-star role="button" title="Star" tabindex="0">${ic('star', 14)}</span>
          <span class="icon-btn act" data-readbtn role="button" title="${msg.read ? 'Mark unread' : 'Mark read'}" tabindex="0">${ic(msg.read ? 'eye-off' : 'eye', 14)}</span>
          <a class="icon-btn act" href="mailto:${esc(msg.email)}?subject=${encodeURIComponent('Re: ' + msg.subject)}" title="Reply" onclick="event.stopPropagation()">${ic('send', 14)}</a>
          <span class="icon-btn danger" data-del role="button" title="Delete" tabindex="0">${ic('trash', 14)}</span>
        </span>
        <time>${fmtAgo(msg.date)}</time>
      </button>
      <div class="msg-body"><div class="msg-body-inner">${esc(msg.body)}</div></div>
    </div>`).join('')
  : `<div class="empty pin" style="--d:.06s">${ic('mail', 28)}<h3>Inbox zero</h3><p>No messages yet. Connect the public website's contact form (see integration note below) to receive inquiries here.</p></div>`}

  <div class="panel pin" style="--d:.12s;margin-top:1.6rem">
    <h3>${ic('info', 16)} Integration with the public website</h3>
    <p class="lead" style="font-size:.88rem;margin-bottom:1rem">The public contact form is already connected to Laravel. New inquiries are stored in SQLite and appear here automatically.</p>
    <div class="codebox"><span class="k">POST /api/inquiry</span>  → validation → SQLite → Admin Inbox</div>
  </div>`;

  const upd = async () => { try { await saveDB(); } catch(err) { toast(err.message || 'Could not save inbox change.','error'); } const badge = $('.sn-badge'); if (badge) { const n = DB.messages.filter(m => !m.read).length; badge.textContent = n; badge.classList.toggle('zero', !n); } };
  $$('[data-toggle]').forEach(h => h.addEventListener('click', e => {
    if (e.target.closest('[data-star],[data-readbtn],[data-del],a')) return;
    const el = h.closest('.msg'), msg = DB.messages.find(m => m.id === el.dataset.id);
    el.classList.toggle('open');
    if (el.classList.contains('open') && !msg.read) { msg.read = true; el.classList.remove('unread'); upd(); }
  }));
  $$('[data-star]').forEach(b => b.addEventListener('click', e => {
    e.stopPropagation();
    const el = b.closest('.msg'), msg = DB.messages.find(m => m.id === el.dataset.id);
    msg.star = !msg.star; b.classList.toggle('starred', msg.star); upd();
  }));
  $$('[data-readbtn]').forEach(b => b.addEventListener('click', e => {
    e.stopPropagation();
    const el = b.closest('.msg'), msg = DB.messages.find(m => m.id === el.dataset.id);
    msg.read = !msg.read; el.classList.toggle('unread', !msg.read); upd(); renderPage('messages');
  }));
  $$('[data-del]').forEach(b => b.addEventListener('click', e => {
    e.stopPropagation(); const el=b.closest('.msg'), msg=DB.messages.find(m=>m.id===el.dataset.id);
    confirmModal({title:'Delete message?',msg:`From <b style="color:var(--text)">${esc(msg.from)}</b> — this cannot be undone.`,onOk:async()=>{try{const r=await apiFetch('/admin/messages/'+encodeURIComponent(msg.id),{method:'DELETE'});if(!r.ok)throw 0;DB.messages=DB.messages.filter(m=>m.id!==msg.id);logA('delete','Inbox: message from '+msg.from);toast('Message deleted.');renderPage('messages');}catch(_){toast('Could not delete message.','error');}}});
  }));
  const smp = $('#msgSample');
  if (smp) smp.addEventListener('click', async () => {
    DB.messages.unshift({ id: uid(), from: '[SAMPLE] New Inquiry', email: 'visitor@example.com', date: Date.now(), read: false, star: false, subject: 'Sample message (for testing)', body: 'This is a sample message so you can try the inbox features — read/unread, star, reply, and delete. Delete it anytime.' });
    logA('create', 'Inbox: inserted sample message'); try { await saveDB(); toast('Sample message inserted.'); renderPage('messages'); } catch(err) { toast(err.message || 'Could not save sample message.','error'); }
  });
}

/* ---- Client Notices (menu tersendiri) ---- */
function pageNotices() {
  const recips = [...new Set(DB.messages.map(m => m.email).filter(e => /@/.test(e)))].join(', ');
  const MAIL_TEMPLATE = `Dear Valued Client,

We would like to inform you that NEXARION will be performing scheduled maintenance on our systems.

Maintenance window: {WINDOW}
Expected duration: {DURATION}

During this period, our website may be temporarily unavailable. We apologize for any inconvenience and truly appreciate your understanding.

Notice: {MESSAGE}

For urgent matters, please contact us at {EMAIL}.

Best regards,
NEXARION Team`;

  $('#page').innerHTML = `
  <div class="page-head pin" style="--d:0s">
    <div><p class="kicker">Engagement</p><h1>Client Notices</h1>
    <p class="lead">Compose and send maintenance announcements and important updates directly to your clients' inbox.</p></div>
  </div>
  <div class="nt-grid">
    <div class="panel pin tilt" style="--d:.05s"><div class="ticks"><i></i><i></i><i></i><i></i></div>
      <h3>${ic('send', 16)} Compose notice</h3>
      <div class="form-grid">
        <div class="field full">
          <label for="ntTo">Recipients <b>*</b> <span style="color:var(--faint);text-transform:none;letter-spacing:0">(comma or newline separated — prefilled from your inbox)</span></label>
          <textarea id="ntTo" rows="2" placeholder="client@company.com, another@business.co">${esc(recips)}</textarea>
          <span class="field-help">Masukkan satu atau lebih email. Pisahkan dengan koma atau baris baru. Daftar awal diambil dari Inbox.</span><span class="f-err">Enter at least one valid email address.</span>
        </div>
        <div class="field"><label for="ntWin">Maintenance Window</label><input id="ntWin" type="datetime-local"><span class="field-help">Tanggal dan jam mulai maintenance. Opsional; jika kosong akan ditulis “To be announced”.</span></div>
        <div class="field"><label for="ntDur">Expected Duration</label><input id="ntDur" value="approximately 2 hours"><span class="field-help">Estimasi durasi maintenance, misalnya “approximately 2 hours”.</span></div>
        <div class="field full"><label for="ntSub">Subject</label><input id="ntSub" value="Scheduled Maintenance — NEXARION"><span class="field-help">Judul email yang diterima klien. Buat singkat dan jelas.</span></div>
        <div class="field full"><label for="ntMsgBody">Message <span style="color:var(--faint);text-transform:none;letter-spacing:0">({WINDOW} {DURATION} {MESSAGE} {EMAIL} = otomatis terisi)</span></label>
          <textarea id="ntMsgBody" rows="8">${esc(MAIL_TEMPLATE)}</textarea><span class="field-help">Anda boleh mengubah template. Placeholder <code>{WINDOW}</code>, <code>{DURATION}</code>, <code>{MESSAGE}</code>, dan <code>{EMAIL}</code> akan diganti otomatis saat dikirim.</span></div>
      </div>
      <div style="display:flex;gap:.7rem;flex-wrap:wrap;margin-top:1.1rem">
        <button class="btn btn-p magnetic" id="ntSend"><span class="mag-in">${ic('send', 15)} Send via Email App</span></button>
        <button class="btn btn-g btn-sm" id="ntCopy">${ic('copy', 14)} Copy Message</button>
      </div>
      <p class="footnote">* Pengiriman menggunakan Laravel Mail. Jika <code>MAIL_MAILER=log</code>, email hanya dicatat ke log; konfigurasi SMTP diperlukan untuk pengiriman email nyata.</p>
    </div>
    <div class="nt-side">
      <div class="panel pin" style="--d:.1s">
        <h3>${ic('shield', 16)} Maintenance status</h3>
        <span class="mt-pill ${DB.settings.maintenance ? 'on' : 'live'}">${DB.settings.maintenance ? ic('wrench', 13) + ' Maintenance ON' : ic('check', 13) + ' Site is LIVE'}</span>
        <p class="lead" style="font-size:.84rem;margin:.9rem 0 1rem">The current maintenance message is inserted automatically into {MESSAGE} when you send this notice.</p>
        <a class="btn btn-g btn-sm" href="#/maintenance">${ic('wrench', 14)} Open Maintenance Mode</a>
      </div>
      <div class="panel pin" style="--d:.14s">
        <h3>${ic('clock', 16)} Sent notifications</h3>
        ${DB.notices.length ? `
        <ul class="nlist">
          ${DB.notices.slice(0, 6).map(n => `<li>${ic('send', 14)}<div><b style="font-family:var(--font-d)">${esc(n.subject)}</b><p style="font-size:.78rem;color:var(--faint)">${n.to} recipient${n.to > 1 ? 's' : ''}</p></div><time>${fmtAgo(n.t)}</time></li>`).join('')}
        </ul>` : `<p class="lead" style="font-size:.85rem">No notices sent yet — your first send will be recorded here and in the Activity Log.</p>`}
      </div>
    </div>
  </div>`;

  $('#ntSend').addEventListener('click', async () => {
    const to = $('#ntTo').value.split(/[;,\n]/).map(s => s.trim()).filter(e => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(e));
    const fErr = $('#ntTo').closest('.field');
    if (!to.length) { fErr.classList.add('err'); toast('Add at least one valid recipient email.', 'error'); return; }
    fErr.classList.remove('err');
    const winRaw = $('#ntWin').value;
    const winTxt = winRaw
      ? new Date(winRaw).toLocaleString('en-GB', { weekday: 'long', day: 'numeric', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit' })
      : 'To be announced';
    const dur = $('#ntDur').value.trim() || 'to be confirmed';
    const subject = $('#ntSub').value.trim() || 'Scheduled Maintenance — NEXARION';
    const body = $('#ntMsgBody').value
      .replace(/\{WINDOW\}/g, winTxt)
      .replace(/\{DURATION\}/g, dur)
      .replace(/\{MESSAGE\}/g, DB.settings.mMsg)
      .replace(/\{EMAIL\}/g, DB.settings.email);
    const btn = $('#ntSend');
    btn.disabled = true;
    try {
      const r = await apiFetch('/admin/notices/send',{method:'POST',body:JSON.stringify({to,subject,body})});
      const j = await r.json().catch(()=>({}));
      if(!r.ok) throw new Error(j.message || Object.values(j.errors||{}).flat()[0] || 'Could not send notice');
      await refreshDB();
      toast(j.message || 'Notice sent.');
      renderPage('notices');
    } catch(err) { toast(err.message || 'Could not send notice.', 'error'); btn.disabled=false; }
  });
  $('#ntCopy').addEventListener('click', () => {
    const txt = `${$('#ntSub').value}\n\n${$('#ntMsgBody').value}`;
    const done = () => toast('Message copied — paste it into Gmail.');
    const fb = () => {
      const ta = document.createElement('textarea');
      ta.value = txt; document.body.appendChild(ta); ta.select();
      try { document.execCommand('copy'); done(); } catch (e) { toast('Copy failed — select manually.', 'error'); }
      ta.remove();
    };
    if (navigator.clipboard?.writeText) navigator.clipboard.writeText(txt).then(done).catch(fb);
    else fb();
  });
}

/* ---- Maintenance ---- */
function pageMaintenance() {
  const on = DB.settings.maintenance;
  $('#page').innerHTML = `
  <div class="page-head pin" style="--d:0s">
    <div><p class="kicker">System</p><h1>Maintenance Mode</h1>
    <p class="lead">Take the public website offline gracefully while you work on it.</p></div>
  </div>
  <div class="mt-grid">
    <div class="panel pin tilt" style="--d:.05s"><div class="ticks"><i></i><i></i><i></i><i></i></div>
      <h3>${ic('wrench', 16)} Mode switch</h3>
      <div class="mt-state">
        <button class="switch-big ${on ? 'on' : ''}" id="mtSw" role="switch" aria-checked="${on}" aria-label="Toggle maintenance mode"><i></i></button>
        <div><b id="mtLbl" style="color:${on ? 'var(--warn)' : 'var(--accent)'}">${on ? 'Maintenance ON' : 'Site is LIVE'}</b>
        <span id="mtSub">${on ? 'Visitors will see the maintenance screen.' : 'The website is fully accessible to visitors.'}</span></div>
      </div>
      <div class="field" style="margin-top:1.8rem">
        <label for="mtMsg">Maintenance Message</label>
        <textarea id="mtMsg" rows="3">${esc(DB.settings.mMsg)}</textarea>
        <span class="field-help">Pesan ini ditampilkan kepada pengunjung ketika Maintenance Mode aktif. Gunakan kalimat singkat, jelas, dan informatif.</span>
      </div>
      <button class="btn btn-p btn-sm" id="mtSave">${ic('save', 14)} Save Message</button>
      <div class="codebox" style="margin-top:1.6rem"><span class="k">Laravel + SQLite</span>
Maintenance status is saved server-side and read by the public website on load.</div>
      <div style="margin-top:1.4rem;display:flex;align-items:center;gap:.9rem;flex-wrap:wrap">
        <span class="lead" style="font-size:.83rem">Taking the site offline?</span>
        <a class="btn btn-g btn-sm" href="#/notices">Notify Clients ${ic('arrow-r', 13)}</a>
      </div>
    </div>
    <div class="panel pin" style="--d:.1s">
      <h3>${ic('eye', 16)} Live preview</h3>
      <div class="preview-mt">
        <div class="ticks"><i></i><i></i><i></i><i></i></div>
        <span class="brand-mark" style="margin:0 auto 1.1rem">${ic('logo', 16)}</span>
        <p class="mono" style="margin-bottom:.7rem">NEXARION</p>
        <h4 style="text-transform:uppercase;font-size:1.1rem">Be right back</h4>
        <p class="lead" style="font-size:.85rem;max-width:38ch;margin:.5rem auto 0" id="pvMsg">${esc(DB.settings.mMsg)}</p>
        <div class="pbar"></div>
      </div>
      <p class="lead" style="font-size:.8rem;margin-top:1rem;color:var(--faint)">Preview of what visitors see while maintenance mode is enabled. The public site reads the current maintenance status and message directly from Laravel + SQLite.</p>
    </div>
  </div>`;

  $('#mtSw').addEventListener('click', async () => {
    const prev = DB.settings.maintenance, next = !prev;
    DB.settings.maintenance = next;
    logA('maintenance', `Maintenance mode turned ${next ? 'ON' : 'OFF'}`);
    try { await saveDB(); toast(next ? 'Maintenance mode enabled.' : 'Site is live again.'); renderPage('maintenance'); }
    catch(err) { DB.settings.maintenance = prev; toast(err.message || 'Could not update maintenance mode.','error'); renderPage('maintenance'); }
  });
  $('#mtSave').addEventListener('click', async () => {
    DB.settings.mMsg = $('#mtMsg').value.trim() || DB.settings.mMsg;
    logA('settings', 'Maintenance message updated');
    try { await saveDB(); toast('Message saved.'); renderPage('maintenance'); }
    catch(err) { toast(err.message || 'Could not save maintenance message.','error'); }
  });
  $('#mtMsg').addEventListener('input', e => { $('#pvMsg').textContent = e.target.value; });
}

/* ---- Activity Log ---- */
function pageActivity() {
  const types = [...new Set(DB.activity.map(a => a.type))];
  let filter = 'all';
  const paint = () => {
    const items = DB.activity.filter(a => filter === 'all' || a.type === filter);
    $('#actList').innerHTML = items.length ? items.map(a => {
      const icon = ACT_ICONS[a.type] || 'pulse';
      return `<li class="${/login$|create|export|import|mail/.test(a.type) ? 'hi' : ''}">
        <b style="text-transform:capitalize">${esc(a.type.replace('_', ' '))}</b>
        <p>${esc(a.msg)}</p><time>${fmtAgo(a.t)}</time></li>`;
    }).join('') : `<div class="empty">${ic('pulse', 26)}<h3>No entries</h3><p>Nothing recorded for this filter.</p></div>`;
  };
  $('#page').innerHTML = `
  <div class="page-head pin" style="--d:0s">
    <div><p class="kicker">Engagement</p><h1>Activity Log</h1>
    <p class="lead">Every action in the control center is recorded automatically — ${DB.activity.length} entries.</p></div>
    <div class="page-actions">
      <div style="display:flex;gap:.4rem;flex-wrap:wrap">
        <button class="chip-f btn btn-g btn-sm" data-f="all">All</button>
        ${types.map(t => `<button class="chip-f btn btn-g btn-sm" data-f="${t}">${t.replace('_', ' ')}</button>`).join('')}
      </div>
      <button class="btn btn-g btn-sm" id="clrLog">${ic('trash', 14)} Clear Log</button>
    </div>
  </div>
  <div class="panel pin" style="--d:.06s">
    <div class="tl" id="actList"></div>
  </div>`;
  paint();
  $$('.chip-f').forEach(b => b.addEventListener('click', () => {
    filter = b.dataset.f;
    $$('.chip-f').forEach(x => x.style.borderColor = '');
    b.style.borderColor = 'var(--accent)';
    paint();
  }));
  $('#clrLog').addEventListener('click', () => confirmModal({
    title: 'Clear activity log?', msg: 'All recorded entries will be permanently removed.',
    onOk: async () => { DB.activity = [{ t: Date.now(), type: 'system', msg: 'Activity log cleared' }]; try { await saveDB(); toast('Log cleared.'); renderPage('activity'); } catch(err) { toast(err.message || 'Could not clear log.','error'); } }
  }));
}

/* ---- Settings ---- */
function pageSettings() {
  const s = DB.settings;
  const size = fmtBytes(new Blob([JSON.stringify(DB)]).size);
  $('#page').innerHTML = `
  <div class="page-head pin" style="--d:0s">
    <div><p class="kicker">System</p><h1>Settings</h1>
    <p class="lead">Site identity, account, appearance, and data management.</p></div>
  </div>
  <div class="set-grid">
    <div class="panel pin tilt" style="--d:.05s">
      <h3>${ic('globe', 16)} Site identity</h3>
      <div class="form-grid">
        <div class="field"><label for="st-email">Email</label><input id="st-email" type="email" value="${esc(s.email)}"><span class="field-help">Email kontak utama yang ditampilkan pada website.</span></div>
        <div class="field"><label for="st-wa">WhatsApp</label><input id="st-wa" value="${esc(s.whatsapp)}"><span class="field-help">Nomor WhatsApp bisnis. Disarankan format internasional, contoh: +62 812 3456 7890.</span></div>
        <div class="field"><label for="st-ig">Instagram</label><input id="st-ig" value="${esc(s.instagram)}"><span class="field-help">Username atau URL Instagram perusahaan.</span></div>
        <div class="field"><label for="st-li">LinkedIn</label><input id="st-li" value="${esc(s.linkedin)}"><span class="field-help">URL halaman LinkedIn perusahaan.</span></div>
        <div class="field full"><label for="st-addr">Office Address</label><input id="st-addr" value="${esc(s.address)}"><span class="field-help">Alamat kantor yang akan ditampilkan kepada pengunjung.</span></div>
        <div class="field full"><label for="st-hrs">Business Hours</label><input id="st-hrs" value="${esc(s.hours)}"><span class="field-help">Jam operasional. Contoh: Mon – Fri, 09.00 – 18.00.</span></div>
      </div>
      <button class="btn btn-p btn-sm" id="stSave" style="margin-top:1.1rem">${ic('save', 14)} Save Identity</button>
    </div>

    <div class="panel pin" style="--d:.1s">
      <h3>${ic('key', 16)} Account</h3>
      <div class="field"><label for="ac-user">Username</label><input id="ac-user" value="${esc(s.user)}"><span class="field-help">Username untuk login Admin. Minimal 3 karakter dan harus unik.</span></div>
      <div class="field"><label for="ac-old">Current Password <b>*</b></label><input id="ac-old" type="password" autocomplete="current-password"><span class="field-help">Wajib diisi untuk mengonfirmasi perubahan akun.</span></div>
      <div class="form-grid">
        <div class="field"><label for="ac-new">New Password</label><input id="ac-new" type="password" placeholder="min. 8 characters"><span class="field-help">Opsional. Kosongkan jika tidak ingin mengganti password. Minimal 8 karakter jika diisi.</span></div>
        <div class="field"><label for="ac-cfm">Confirm New Password</label><input id="ac-cfm" type="password"><span class="field-help">Ulangi New Password persis sama untuk konfirmasi.</span></div>
      </div>
      <button class="btn btn-p btn-sm" id="acSave">${ic('shield', 14)} Update Account</button>
      <p class="lead" style="font-size:.76rem;margin-top:.9rem;color:var(--faint)">Password is authenticated server-side and stored using Laravel's secure password hashing.</p>
    </div>

    <div class="panel pin" style="--d:.14s">
      <h3>${ic('sun', 16)} Appearance</h3>
      <div class="seg" id="themeSeg">
        <button data-t="dark" class="${document.documentElement.dataset.theme !== 'light' ? 'on' : ''}">Dark</button>
        <button data-t="light" class="${document.documentElement.dataset.theme === 'light' ? 'on' : ''}">Light</button>
      </div>
      <h3 style="margin-top:1.8rem">${ic('db', 16)} Data</h3>
      <div class="qa-grid">
        <button class="qa" id="expBtn">${ic('download', 16)} Export JSON</button>
        <button class="qa" id="impBtn">${ic('upload', 16)} Import JSON</button>
        <button class="qa" id="resetBtn">${ic('refresh', 16)} Reset Demo Data</button>
        <button class="qa" id="clrBtn2">${ic('trash', 16)} Clear Activity</button>
      </div>
      <input type="file" id="impFile" accept=".json,application/json" hidden>
      <div class="sys-row" style="margin-top:1.2rem"><span>Database size</span><b>${esc(size)}</b></div>
      <div class="sys-row"><span>Total records</span><b>${Object.keys(SCHEMAS).reduce((a,k)=>a+(Array.isArray(DB[k])?DB[k].length:0),0)+DB.messages.length}</b></div>
    </div>

    <div class="panel pin danger-zone" style="--d:.18s">
      <h3>${ic('info', 16)} Publishing to the public website</h3>
      <p class="lead" style="font-size:.87rem;margin-bottom:1rem">The public website reads the same SQLite data automatically. Export JSON is available only as a backup/portable snapshot.</p>
      <div class="codebox"><span class="k">/* di file situs publik — ganti objek DATA */</span>
fetch('nexarion-data.json')
  .then(r =&gt; r.json())
  .then(db =&gt; { DATA = mapExportToSiteData(db); });</div>
      <p class="lead" style="font-size:.8rem;margin-top:1rem;color:var(--faint)">Maintenance mode, public content, and inbox sync are handled by Laravel + SQLite.</p>
    </div>
  </div>`;

  $('#stSave').addEventListener('click', async () => {
    Object.assign(s, {
      email: $('#st-email').value.trim(), whatsapp: $('#st-wa').value.trim(),
      instagram: $('#st-ig').value.trim(), linkedin: $('#st-li').value.trim(),
      address: $('#st-addr').value.trim(), hours: $('#st-hrs').value.trim()
    });
    logA('settings', 'Site identity updated');
    try { await saveDB(); toast('Site identity saved.'); } catch(err) { toast(err.message || 'Could not save site identity.','error'); }
  });
  $('#acSave').addEventListener('click', async () => {
    const u=$('#ac-user').value.trim(), old=$('#ac-old').value, nw=$('#ac-new').value, cf=$('#ac-cfm').value;
    if(!old){toast('Current password is required.','error');return;} if(nw && nw.length<8){toast('New password must be at least 8 characters.','error');return;} if(nw!==cf){toast('New passwords do not match.','error');return;}
    try { const r=await apiFetch('/admin/account',{method:'POST',body:JSON.stringify({username:u,current_password:old,new_password:nw||null,new_password_confirmation:cf||null})}); const j=await r.json().catch(()=>({})); if(!r.ok) throw j; DB=j.state; window.NX_INITIAL_STATE=DB; $('#ac-old').value=$('#ac-new').value=$('#ac-cfm').value=''; toast('Account updated.'); render(); } catch(err){toast(err.message || Object.values(err.errors||{}).flat()[0] || 'Account update failed.','error');}
  });
  $('#themeSeg').addEventListener('click', e => {
    const b = e.target.closest('button'); if (!b) return;
    const el = document.documentElement;
    if (b.dataset.t === 'light') el.setAttribute('data-theme', 'light'); else el.removeAttribute('data-theme');
    try { localStorage.setItem('nx-theme', b.dataset.t); } catch (e2) {}
    $$('#themeSeg button').forEach(x => x.classList.toggle('on', x === b));
  });
  $('#expBtn').addEventListener('click', exportDB);
  $('#impBtn').addEventListener('click', () => $('#impFile').click());
  $('#impFile').addEventListener('change', e => {
    const f = e.target.files[0]; if (!f) return;
    const r = new FileReader();
    r.onload = () => {
      try {
        const data = JSON.parse(r.result);
        if (!data.settings || !Array.isArray(data.services)) throw 0;
        confirmModal({
          title: 'Import this data?', danger: false, okText: 'Import & Replace',
          msg: `Found a valid export. Current database will be <b style="color:var(--text)">replaced</b>. Continue?`,
          onOk: async () => { DB = data; if (!Array.isArray(DB.notices)) DB.notices = []; logA('import', 'Data imported from JSON file'); try{await saveDB();toast('Data imported successfully.');renderPage('settings');}catch(e){toast('Import could not be saved.','error');} }
        });
      } catch (err) { toast('Invalid file — not a NEXARION export.', 'error'); }
    };
    r.readAsText(f);
    e.target.value = '';
  });
  $('#resetBtn').addEventListener('click', () => confirmModal({
    title:'Reset all data?', msg:'Everything returns to the original demo content. This cannot be undone.',
    onOk:async()=>{try{const r=await apiFetch('/admin/reset',{method:'POST'});const j=await r.json();if(!r.ok)throw 0;DB=j.state;window.NX_INITIAL_STATE=DB;toast('Demo data restored.');render();}catch(_){toast('Reset failed.','error');}}
  }));
  const clr = () => confirmModal({ title: 'Clear activity log?', msg: 'All entries will be removed.', onOk: async () => { DB.activity = [{ t: Date.now(), type: 'system', msg: 'Activity log cleared' }]; try { await saveDB(); toast('Log cleared.'); } catch(err) { toast(err.message || 'Could not clear log.','error'); } } });
  $('#clrBtn2').addEventListener('click', clr);
}

function exportDB() {
  const blob = new Blob([JSON.stringify(DB, null, 2)], { type: 'application/json' });
  const a = document.createElement('a');
  a.href = URL.createObjectURL(blob);
  a.download = 'nexarion-data-' + new Date().toISOString().slice(0, 10) + '.json';
  a.click(); URL.revokeObjectURL(a.href);
  logA('export', 'Database exported to JSON'); saveDB();
  toast('Export downloaded.');
}

/* ============ COMMAND PALETTE ============ */
function openPalette() {
  let sel = 0, items = [];
  const build = q => {
    q = q.toLowerCase().trim();
    const pages = NAV.flatMap(g => g.items).map(([k, l, i]) => ({ l, i, hint: 'Page', go: '#/' + k }));
    const content = Object.keys(SCHEMAS).flatMap(key => DB[key].map(it => ({ l: SCHEMAS[key].nk === 'q' ? it.q : it[SCHEMAS[key].nk], i: SCHEMAS[key].icon, hint: SCHEMAS[key].label, go: '#/' + key, q: it[SCHEMAS[key].nk] })));
    const sys = [
      { l: 'Toggle Maintenance Mode', i: 'wrench', hint: 'System', go: '#/maintenance' },
      { l: 'Notify Clients — Maintenance Email', i: 'send', hint: 'System', go: '#/notices' },
      { l: 'Export Data (JSON)', i: 'download', hint: 'System', fn: exportDB },
      { l: 'Open Inbox', i: 'mail', hint: 'System', go: '#/messages' },
      { l: 'Sign Out', i: 'logout', hint: 'System', go: '#/__logout' }
    ];
    items = [...pages, ...content, ...sys].filter(x => !q || x.l.toLowerCase().includes(q)).slice(0, 9);
    sel = 0;
  };
  const m = openModal(`
    <div class="pal-in">${ic('search', 17)}<input id="palQ" placeholder="Jump to a page or content… (e.g. Aurora, Blog, Maintenance)" aria-label="Quick find"></div>
    <div class="pal-list" id="palList"></div>
    <div style="padding:.6rem 1.1rem;border-top:1px solid var(--line);display:flex;gap:1rem;font-size:.7rem;color:var(--faint)"><span><kbd style="font-family:var(--font-d);border:1px solid var(--line2);border-radius:4px;padding:.05rem .3rem">↑↓</kbd> navigate</span><span><kbd style="font-family:var(--font-d);border:1px solid var(--line2);border-radius:4px;padding:.05rem .3rem">↵</kbd> open</span><span><kbd style="font-family:var(--font-d);border:1px solid var(--line2);border-radius:4px;padding:.05rem .3rem">esc</kbd> close</span></div>
  `, 'mw');
  const modal = m.bd.querySelector('.modal');
  modal.style.padding = '0';
  modal.querySelector('.modal-x').style.cssText = 'position:absolute;top:12px;right:12px;z-index:2';
  const list = modal.querySelector('#palList'), input = modal.querySelector('#palQ');
  const paint = () => {
    list.innerHTML = items.length ? items.map((x, i) => `
      <div class="pal-item${i === sel ? ' sel' : ''}" data-i="${i}">${ic(x.i, 15)}<span>${esc(x.l)}</span><small>${esc(x.hint)}</small></div>`).join('')
      : '<div class="pal-empty">No results — try another keyword.</div>';
    $$('.pal-item', list).forEach(el => el.addEventListener('click', () => pick(+el.dataset.i)));
  };
  const pick = i => {
    const x = items[i]; if (!x) return;
    if (x.fn) { x.fn(); m.close(); return; }
    if (x.go === '#/__logout') { m.close(); $('#logoutBtn')?.click(); return; }
    if (x.q !== undefined) listQuery[x.go.replace('#/', '')] = x.q; else listQuery[x.go.replace('#/', '')] = '';
    m.close();
    if (location.hash === x.go) render();
    else location.hash = x.go;
  };
  build(''); paint();
  input.addEventListener('input', () => { build(input.value); paint(); });
  input.addEventListener('keydown', e => {
    if (e.key === 'ArrowDown') { e.preventDefault(); sel = (sel + 1) % Math.max(items.length, 1); paint(); }
    if (e.key === 'ArrowUp') { e.preventDefault(); sel = (sel - 1 + items.length) % Math.max(items.length, 1); paint(); }
    if (e.key === 'Enter') { e.preventDefault(); pick(sel); }
  });
  setTimeout(() => input.focus(), 380);
}
addEventListener('keydown', e => {
  if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k') {
    e.preventDefault();
    if (getSession() && !$('#palQ')) openPalette();
  }
});

/* ============ ROUTER ============ */
function renderPage(key) {
  const page = $('#page'); if (!page) return;
  if (SCHEMAS[key]) pageCrud(key);
  else if (key === 'dashboard') pageDashboard();
  else if (key === 'messages') pageMessages();
  else if (key === 'notices') pageNotices();
  else if (key === 'maintenance') pageMaintenance();
  else if (key === 'activity') pageActivity();
  else if (key === 'settings') pageSettings();
  else page.innerHTML = `<div class="empty pin">${ic('search', 28)}<h3>Page not found</h3><p>That admin page doesn't exist.</p><div style="margin-top:1.2rem"><a class="btn btn-p" href="#/dashboard">Back to Dashboard</a></div></div>`;
  applyAdminBranding(page);
  initTilt(page);
  initMagnetic(page);
}
function render() {
  runCleanups();
  const seg = location.hash.replace(/^#\/?/, '').split('/').filter(Boolean);
  const authed = !!getSession();
  if (!authed) {
    if (seg[0] && seg[0] !== 'login') { location.hash = '#/login'; return; }
    viewLogin();
    return;
  }
  if (seg[0] === 'login') { location.hash = '#/dashboard'; return; }
  viewShell(seg);
}
window.addEventListener('hashchange', render);

/* ============ BOOT ============ */
loadDB();
render();
</script>
</body>
</html>