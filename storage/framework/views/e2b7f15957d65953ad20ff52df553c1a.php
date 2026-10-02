<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>NEXARION — Technology & Digital Solutions</title>
<meta name="description" content="NEXARION builds modern digital solutions — websites, web applications, UI/UX design, and custom software that help businesses grow in the digital era.">
<meta name="robots" content="index,follow">
<link rel="canonical" href="https://nexarion.example.com/"><!-- TODO: ganti dengan domain final -->
<meta property="og:type" content="website">
<meta property="og:title" content="NEXARION — Technology & Digital Solutions">
<meta property="og:description" content="Building digital experiences for the next generation.">
<meta property="og:url" content="https://nexarion.example.com/">
<meta property="og:image" content="https://picsum.photos/seed/nexarion-og/1200/630.jpg">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="NEXARION — Technology & Digital Solutions">
<meta name="twitter:description" content="Building digital experiences for the next generation.">
<meta name="theme-color" content="#05080a">
<script>(function(){try{if(localStorage.getItem('nx-theme')==='light')document.documentElement.setAttribute('data-theme','light')}catch(e){}})();</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js" defer></script>
<script type="application/ld+json" id="orgSchema">
{"@context":"https://schema.org","@type":"Organization","name":"NEXARION","url":"https://nexarion.example.com","description":"Technology & digital solutions company.","contactPoint":{"@type":"ContactPoint","contactType":"customer service","email":"[COMPANY_EMAIL]"},"sameAs":["[INSTAGRAM]","[LINKEDIN]"]}
</script>
<style>
/* ============ DESIGN TOKENS ============ */
:root{
  --bg:#05080a; --bg2:#070b0d; --surface:#0b1014; --surface2:#0e151a;
  --line:rgba(235,245,245,.09); --line2:rgba(235,245,245,.2);
  --text:#e9eef2; --muted:#94a2ab; --faint:#5d6b74;
  --accent:#25e6c0; --accent2:#8cf2de; --accent-ink:#04211a;
  --accent-dim:rgba(37,230,192,.1);
  --err:#ff7a76;
  --font-d:'Space Grotesk',sans-serif; --font-b:'Manrope',sans-serif;
  --ease:cubic-bezier(.22,.61,.2,1);
  --radius:18px; --radius-s:12px;
  --container:1200px;
  --sh:0 24px 60px -24px rgba(0,0,0,.55);
}
[data-theme="light"]{
  --bg:#f2f5f4; --bg2:#ecf0ef; --surface:#ffffff; --surface2:#f6f9f8;
  --line:rgba(8,22,22,.1); --line2:rgba(8,22,22,.22);
  --text:#0c1418; --muted:#4d5c64; --faint:#7c898f;
  --accent:#0a9d80; --accent2:#0a9d80; --accent-ink:#ffffff;
  --accent-dim:rgba(10,157,128,.09);
  --err:#c73a35;
  --sh:0 24px 60px -30px rgba(10,30,30,.25);
}
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth;-webkit-text-size-adjust:100%}
body{background:var(--bg);color:var(--text);font-family:var(--font-b);font-size:16px;line-height:1.65;overflow-x:hidden;transition:background-color .4s var(--ease),color .4s var(--ease)}
img{max-width:100%;display:block}
a{color:inherit;text-decoration:none}
button{font:inherit;color:inherit;background:none;border:0;cursor:pointer}
ul,ol{list-style:none}
::selection{background:var(--accent);color:var(--accent-ink)}
:focus-visible{outline:2px solid var(--accent);outline-offset:3px;border-radius:4px}
::-webkit-scrollbar{width:10px}
::-webkit-scrollbar-thumb{background:var(--surface2);border-radius:8px;border:2px solid var(--bg)}
.container{max-width:var(--container);margin-inline:auto;padding-inline:clamp(20px,4vw,40px)}
.skip{position:fixed;top:-60px;left:16px;z-index:200;background:var(--accent);color:var(--accent-ink);padding:.6rem 1.1rem;border-radius:8px;font-weight:700;transition:top .3s}
.skip:focus{top:14px}
.ic{fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round;flex:none}
h1,h2,h3,h4{font-family:var(--font-d);font-weight:700;line-height:1.08;letter-spacing:-.015em}
.kicker{font-family:var(--font-d);font-size:.78rem;font-weight:600;letter-spacing:.22em;text-transform:uppercase;color:var(--accent);display:flex;align-items:center;gap:.9rem}
.kicker::before{content:"";width:26px;height:1px;background:var(--accent)}
.lead{color:var(--muted);font-size:clamp(1.02rem,1.4vw,1.15rem);max-width:56ch}
.tx-ol{color:transparent;-webkit-text-stroke:1.2px var(--text)}
@supports not (-webkit-text-stroke:1px black){.tx-ol{color:var(--muted)}}
.tx-acc{color:var(--accent)}
.mono{font-family:var(--font-d);letter-spacing:.08em;font-size:.75rem;font-weight:500;color:var(--faint);text-transform:uppercase}
section{position:relative}
.sec{padding-block:clamp(72px,9vw,128px)}
.sec-head{margin-bottom:clamp(36px,5vw,64px);max-width:780px}
.sec-head h2{font-size:clamp(1.9rem,4.4vw,3.2rem);text-transform:uppercase;margin:1rem 0 .9rem}
.sec-head .sub{color:var(--muted);max-width:60ch}
.sec-head.center{margin-inline:auto;text-align:center}
.sec-head.center .kicker{justify-content:center}
.sec-head.center .sub{margin-inline:auto}
.ticks{position:absolute;inset:0;pointer-events:none}
.ticks i{position:absolute;width:14px;height:14px;border:1px solid var(--line2)}
.ticks i:nth-child(1){top:0;left:0;border-width:1px 0 0 1px}
.ticks i:nth-child(2){top:0;right:0;border-width:1px 1px 0 0}
.ticks i:nth-child(3){bottom:0;left:0;border-width:0 0 1px 1px}
.ticks i:nth-child(4){bottom:0;right:0;border-width:0 1px 1px 0}
.btn{display:inline-flex;align-items:center;gap:.6rem;font-family:var(--font-d);font-weight:600;font-size:.95rem;padding:.95rem 1.7rem;border-radius:999px;border:1px solid transparent;transition:transform .35s var(--ease),background .3s,border-color .3s,color .3s;will-change:transform;white-space:nowrap}
.btn .ic{transition:transform .35s var(--ease)}
.btn-p{background:var(--accent);color:var(--accent-ink)}
.btn-p:hover{transform:translateY(-2px);box-shadow:0 10px 30px -10px var(--accent)}
.btn-p:hover .ic{transform:translateX(4px)}
.btn-g{border-color:var(--line2);color:var(--text)}
.btn-g:hover{border-color:var(--accent);color:var(--accent);transform:translateY(-2px)}
.btn-g:hover .ic{transform:translate(3px,-3px)}
.btn-sm{padding:.6rem 1.2rem;font-size:.85rem}
.magnetic{display:inline-flex}
.mag-in{display:inline-flex;align-items:center;gap:.6rem;transition:transform .2s ease-out}
.progress{position:fixed;top:0;left:0;height:2px;width:0;background:var(--accent);z-index:120}
.header{position:fixed;top:0;left:0;right:0;z-index:110;transition:background .4s,border-color .4s;border-bottom:1px solid transparent}
.header.scrolled{background:color-mix(in srgb,var(--bg) 78%,transparent);backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);border-bottom-color:var(--line)}
.nav{display:flex;align-items:center;justify-content:space-between;height:74px;gap:1rem}
.brand{display:flex;align-items:center;gap:.7rem;font-family:var(--font-d);font-weight:700;letter-spacing:.14em;font-size:1.02rem}
.brand-mark{width:34px;height:34px;border:1px solid var(--accent);border-radius:9px;display:grid;place-items:center;color:var(--accent)}
.brand-mark svg{width:16px;height:16px}
.brand-mark img{width:100%;height:100%;object-fit:contain;display:block;border-radius:7px}
.nav-links{display:flex;gap:.35rem;align-items:center}
.nav-links a{font-family:var(--font-d);font-size:.86rem;font-weight:500;letter-spacing:.04em;color:var(--muted);padding:.55rem .85rem;border-radius:999px;transition:color .25s,background .25s}
.nav-links a:hover{color:var(--text)}
.nav-links a.on{color:var(--accent);background:var(--accent-dim)}
.nav-right{display:flex;align-items:center;gap:.7rem}
.icon-btn{width:40px;height:40px;border-radius:50%;border:1px solid var(--line2);display:grid;place-items:center;color:var(--muted);transition:color .25s,border-color .25s}
.icon-btn:hover{color:var(--accent);border-color:var(--accent)}
[data-theme="dark"] .i-sun,[data-theme="dark"] .i-sun *{display:none}
html:not([data-theme]) .i-sun{display:none}
html:not([data-theme]) .i-moon{display:block}
[data-theme="light"] .i-moon{display:none}
.burger{display:none;position:relative;width:42px;height:42px;border:1px solid var(--line2);border-radius:50%}
.burger span{position:absolute;left:12px;right:12px;height:1.6px;background:var(--text);transition:transform .35s var(--ease),top .35s var(--ease)}
.burger span:nth-child(1){top:16px}.burger span:nth-child(2){top:24px}
.burger.open span:nth-child(1){top:20px;transform:rotate(45deg)}
.burger.open span:nth-child(2){top:20px;transform:rotate(-45deg)}
.mmenu{position:fixed;inset:0;z-index:105;background:var(--bg);display:flex;flex-direction:column;justify-content:center;padding:100px clamp(24px,7vw,60px) 40px;transform:translateY(-100%);transition:transform .55s var(--ease);visibility:hidden}
.mmenu.open{transform:none;visibility:visible}
.mmenu a.mlink{font-family:var(--font-d);font-size:clamp(1.7rem,7vw,2.4rem);font-weight:600;text-transform:uppercase;padding:.45rem 0;color:var(--muted);border-bottom:1px solid var(--line);display:flex;justify-content:space-between;align-items:center;opacity:0;transform:translateY(18px);transition:opacity .4s var(--ease),transform .4s var(--ease),color .3s}
.mmenu.open a.mlink{opacity:1;transform:none}
.mmenu a.mlink:hover,.mmenu a.mlink.on{color:var(--accent)}
.mmenu .mm-foot{margin-top:2.4rem}
.hero{min-height:100svh;display:flex;align-items:center;padding-top:110px;padding-bottom:40px;overflow:hidden}
.hero-bg{position:absolute;inset:0;background-image:radial-gradient(circle,rgba(140,242,222,.07) 1px,transparent 1px);background-size:30px 30px;mask-image:radial-gradient(ellipse 90% 80% at 60% 40%,#000 30%,transparent 75%);-webkit-mask-image:radial-gradient(ellipse 90% 80% at 60% 40%,#000 30%,transparent 75%)}
.hero-glow{position:absolute;top:-10%;right:-5%;width:640px;height:640px;border-radius:50%;background:radial-gradient(circle,var(--accent-dim) 0%,transparent 62%)}
.hero-grid{display:grid;grid-template-columns:1.02fr .98fr;gap:clamp(28px,4vw,60px);align-items:center;width:100%}
.hero h1{font-size:clamp(2.4rem,5.6vw,4.4rem);text-transform:uppercase;margin:1.3rem 0 1.4rem}
.hero-cta{display:flex;gap:.9rem;flex-wrap:wrap;margin-top:2rem}
.hero-meta{margin-top:2.6rem;display:flex;gap:1.2rem;flex-wrap:wrap}
.hero-meta span{display:flex;align-items:center;gap:.5rem}
.hero-meta span::before{content:"";width:5px;height:5px;border-radius:50%;background:var(--accent)}
.hero-visual{position:relative}
.h3d{position:relative;aspect-ratio:1/1;max-height:72vh;touch-action:pan-y;cursor:grab}
.h3d:active{cursor:grabbing}
.h3d canvas{width:100%!important;height:100%!important;display:block}
.h3d .hint{position:absolute;bottom:8px;left:50%;transform:translateX(-50%);white-space:nowrap;color:var(--faint);display:flex;align-items:center;gap:.5rem}
.h3d-ctl{position:absolute;top:10px;right:10px;display:flex;flex-direction:column;gap:8px}
.h3d-ctl button{width:36px;height:36px;border-radius:50%;border:1px solid var(--line2);background:color-mix(in srgb,var(--bg) 60%,transparent);backdrop-filter:blur(6px);display:grid;place-items:center;color:var(--muted);transition:color .25s,border-color .25s}
.h3d-ctl button:hover{color:var(--accent);border-color:var(--accent)}
.f-chip{position:absolute;display:flex;align-items:center;gap:.6rem;background:color-mix(in srgb,var(--surface) 82%,transparent);border:1px solid var(--line);border-radius:12px;padding:.7rem 1rem;font-family:var(--font-d);font-size:.8rem;font-weight:600;letter-spacing:.03em;backdrop-filter:blur(8px);box-shadow:var(--sh);will-change:transform}
.f-chip .ic{color:var(--accent)}
.f-chip small{display:block;font-family:var(--font-b);font-weight:400;color:var(--faint);font-size:.7rem;letter-spacing:0}
.fc1{top:8%;left:-4%}
.fc2{bottom:14%;right:-2%}
.scroll-ind{position:absolute;bottom:26px;left:50%;transform:translateX(-50%);display:flex;flex-direction:column;align-items:center;gap:.5rem;color:var(--faint);font-family:var(--font-d);font-size:.7rem;letter-spacing:.3em;text-transform:uppercase;cursor:pointer}
.scroll-ind i{width:1px;height:44px;background:var(--line2);position:relative;overflow:hidden;display:block}
.scroll-ind i::after{content:"";position:absolute;top:-50%;left:0;width:100%;height:50%;background:var(--accent);animation:sInd 2s var(--ease) infinite}
@keyframes sInd{to{top:110%}}
.marquee{border-block:1px solid var(--line);overflow:hidden;padding:1.15rem 0;background:var(--bg2)}
.mq-track{display:flex;width:max-content;animation:mq 30s linear infinite}
.mq-track:hover{animation-play-state:paused}
@keyframes mq{to{transform:translateX(-50%)}}
.mq-item{display:flex;align-items:center;gap:2.2rem;padding-right:2.2rem;font-family:var(--font-d);font-weight:600;font-size:clamp(.95rem,1.6vw,1.25rem);letter-spacing:.14em;text-transform:uppercase;color:var(--faint);white-space:nowrap}
.mq-item::after{content:"";width:7px;height:7px;background:var(--accent);border-radius:1px;transform:rotate(45deg)}
.stats{display:grid;grid-template-columns:repeat(4,1fr);border-block:1px solid var(--line)}
.stat{padding:clamp(28px,3.5vw,52px) clamp(18px,2.5vw,40px);border-left:1px solid var(--line)}
.stat:first-child{border-left:0}
.stat b{font-family:var(--font-d);font-weight:700;font-size:clamp(2.2rem,5vw,3.8rem);line-height:1;display:block}
.stat b em{font-style:normal;color:var(--accent)}
.stat span{color:var(--muted);font-size:.92rem;display:block;margin-top:.5rem}
.footnote{margin-top:1.2rem;font-size:.78rem;color:var(--faint)}
.about-grid{display:grid;grid-template-columns:1.05fr .95fr;gap:clamp(32px,5vw,80px);align-items:center}
.about-grid h2{font-size:clamp(1.9rem,4.2vw,3rem);text-transform:uppercase;margin:1rem 0 1.1rem}
.vm-mini{margin:1.8rem 0 2.2rem;border-top:1px solid var(--line)}
.vm-mini li{display:flex;gap:1.2rem;padding:1.1rem 0;border-bottom:1px solid var(--line)}
.vm-mini b{font-family:var(--font-d);color:var(--accent);font-size:.78rem;letter-spacing:.18em;min-width:74px;padding-top:.2rem}
.vm-mini p{color:var(--muted);font-size:.95rem}
.about-vis{position:relative;border:1px solid var(--line);border-radius:var(--radius);background:var(--surface);padding:clamp(22px,3vw,38px);min-height:420px;display:flex;flex-direction:column;justify-content:space-between;overflow:hidden;box-shadow:var(--sh)}
.codebox{font-family:ui-monospace,'SF Mono',Menlo,monospace;font-size:.78rem;line-height:2;color:var(--faint)}
.codebox .k{color:var(--accent)}
.float-card{background:var(--surface2);border:1px solid var(--line);border-radius:14px;padding:1rem 1.2rem;max-width:230px;box-shadow:var(--sh);will-change:transform}
.float-card b{font-family:var(--font-d);font-size:1.5rem;display:block}
.float-card span{color:var(--muted);font-size:.8rem}
.fc-a{position:absolute;right:22px;bottom:88px}
.fc-b{position:absolute;right:56px;bottom:20px}
.svc-list{border-bottom:1px solid var(--line)}
.svc-row{display:grid;grid-template-columns:74px 52px 1fr 62px;gap:clamp(14px,2.5vw,32px);padding:clamp(24px,3vw,40px) 0;border-top:1px solid var(--line);align-items:start;position:relative}
.svc-row::after{content:"";position:absolute;left:0;bottom:-1px;height:1px;width:0;background:var(--accent);transition:width .5s var(--ease)}
.svc-row:hover::after{width:100%}
.svc-num{font-family:var(--font-d);color:var(--faint);font-size:.85rem;letter-spacing:.12em;padding-top:.55rem}
.svc-ico{width:48px;height:48px;border:1px solid var(--line2);border-radius:12px;display:grid;place-items:center;color:var(--accent);transition:background .3s,color .3s,transform .4s var(--ease)}
.svc-row:hover .svc-ico{background:var(--accent);color:var(--accent-ink);transform:rotate(-6deg)}
.svc-body h3{font-size:clamp(1.25rem,2.4vw,1.7rem);text-transform:uppercase;transition:color .3s}
.svc-row:hover .svc-body h3{color:var(--accent)}
.svc-body p{color:var(--muted);max-width:62ch;margin:.5rem 0 .9rem;font-size:.96rem}
.svc-tags{display:flex;flex-wrap:wrap;gap:.5rem}
.svc-tags li{font-family:var(--font-d);font-size:.72rem;letter-spacing:.06em;border:1px solid var(--line);border-radius:999px;padding:.32rem .75rem;color:var(--muted)}
.svc-arrow{width:52px;height:52px;border:1px solid var(--line2);border-radius:50%;display:grid;place-items:center;color:var(--muted);justify-self:end;transition:background .3s,color .3s,transform .4s var(--ease),border-color .3s}
.svc-row:hover .svc-arrow{background:var(--accent);border-color:var(--accent);color:var(--accent-ink);transform:rotate(45deg)}
.why-grid{display:grid;grid-template-columns:repeat(3,1fr);column-gap:clamp(24px,3vw,48px)}
.why-item{border-top:1px solid var(--line);padding:1.8rem .4rem 2.4rem 0}
.why-item .top{display:flex;justify-content:space-between;align-items:center;margin-bottom:1.2rem}
.why-item .ic{color:var(--accent)}
.why-item h3{font-size:1.08rem;margin-bottom:.5rem}
.why-item p{color:var(--muted);font-size:.93rem}
.work-grid{display:grid;grid-template-columns:1fr 1fr;gap:clamp(16px,2.4vw,28px)}
.work{position:relative;border-radius:var(--radius);overflow:hidden;border:1px solid var(--line);aspect-ratio:16/10;display:block;background:var(--surface)}
.work.b{grid-column:1/-1;aspect-ratio:21/10}
.work.down{transform:translateY(clamp(0px,3vw,44px))}
.work img{width:100%;height:100%;object-fit:cover;transform:scale(1.03);transition:transform .9s var(--ease);filter:saturate(.85)}
[data-theme="light"] .work img{filter:saturate(.9) brightness(1.02)}
.work:hover img{transform:scale(1.09)}
.work-ol{position:absolute;inset:0;display:flex;flex-direction:column;justify-content:flex-end;padding:clamp(18px,2.5vw,30px);background:linear-gradient(180deg,rgba(4,8,10,0) 34%,rgba(4,8,10,.88) 100%);color:#eef4f4}
.work-cat{align-self:flex-start;font-family:var(--font-d);font-size:.68rem;letter-spacing:.16em;text-transform:uppercase;border:1px solid rgba(238,244,244,.35);border-radius:999px;padding:.3rem .8rem;margin-bottom:.8rem;backdrop-filter:blur(4px)}
.work-ol h3{font-size:clamp(1.15rem,2.2vw,1.6rem);text-transform:uppercase}
.work-ol p{color:rgba(238,244,244,.72);font-size:.88rem;max-width:52ch;margin-top:.3rem}
.work-tech{margin-top:.7rem;font-family:var(--font-d);font-size:.72rem;letter-spacing:.08em;color:rgba(238,244,244,.5);text-transform:uppercase}
.work-go{position:absolute;right:clamp(16px,2.5vw,28px);bottom:clamp(16px,2.5vw,28px);width:52px;height:52px;border-radius:50%;border:1px solid rgba(238,244,244,.35);display:grid;place-items:center;transition:background .35s,transform .45s var(--ease),border-color .35s}
.work:hover .work-go{background:var(--accent);border-color:var(--accent);color:var(--accent-ink);transform:rotate(45deg)}
.work.off{display:none}
.proc{position:relative;padding-top:10px}
.proc-grid{display:grid;grid-template-columns:repeat(7,1fr);position:relative}
.proc-rail{position:absolute;top:5px;left:0;right:0;height:1px;background:var(--line)}
.proc-line{position:absolute;top:4px;left:0;height:3px;width:0;background:var(--accent);border-radius:2px;transition:width .15s linear}
.proc-item{padding:2rem 1.2rem 1rem 0;position:relative}
.proc-dot{position:absolute;top:0;left:0;width:11px;height:11px;border-radius:50%;background:var(--bg);border:2px solid var(--faint);transition:border-color .4s,background .4s}
.proc-item.lit .proc-dot{border-color:var(--accent);background:var(--accent)}
.proc-item .n{font-family:var(--font-d);font-size:.78rem;color:var(--accent);letter-spacing:.14em}
.proc-item h3{font-size:1.05rem;margin:.45rem 0 .4rem;text-transform:uppercase}
.proc-item p{color:var(--muted);font-size:.86rem;line-height:1.55}
.tech-tabs{display:flex;gap:.5rem;flex-wrap:wrap;margin-bottom:2rem}
.tech-tab{font-family:var(--font-d);font-size:.85rem;font-weight:600;letter-spacing:.06em;padding:.6rem 1.3rem;border:1px solid var(--line2);border-radius:999px;color:var(--muted);transition:all .3s}
.tech-tab:hover{color:var(--text);border-color:var(--accent)}
.tech-tab.on{background:var(--accent);border-color:var(--accent);color:var(--accent-ink)}
.tech-chips{display:flex;flex-wrap:wrap;gap:.7rem;min-height:120px;align-content:flex-start}
.tech-chips span{border:1px solid var(--line);border-radius:999px;padding:.65rem 1.25rem;font-family:var(--font-d);font-size:.9rem;letter-spacing:.04em;color:var(--muted);transition:all .3s;animation:chipIn .5s var(--ease) both}
.tech-chips span:hover{border-color:var(--accent);color:var(--accent);transform:translateY(-2px)}
@keyframes chipIn{from{opacity:0;transform:translateY(10px)}to{opacity:1}}
.tst-wrap{max-width:860px;margin-inline:auto}
.car-viewport{overflow:hidden;border:1px solid var(--line);border-radius:var(--radius);background:var(--surface);box-shadow:var(--sh)}
.car-track{display:flex;transition:transform .65s var(--ease)}
.car-slide{min-width:100%;padding:clamp(30px,5vw,60px)}
.car-slide .qm{font-family:var(--font-d);font-size:4.5rem;line-height:.6;color:var(--accent);display:block;margin-bottom:1.4rem}
.car-slide blockquote{font-family:var(--font-d);font-weight:500;font-size:clamp(1.1rem,2.2vw,1.5rem);line-height:1.5}
.car-who{display:flex;align-items:center;gap:1rem;margin-top:2rem}
.car-ava{width:52px;height:52px;border-radius:50%;background:var(--accent-dim);border:1px solid var(--accent);display:grid;place-items:center;color:var(--accent)}
.car-who b{display:block;font-family:var(--font-d)}
.car-who span{color:var(--muted);font-size:.85rem}
.car-stars{display:flex;gap:2px;color:var(--accent);margin-left:auto}
.car-ctl{display:flex;align-items:center;gap:1rem;margin-top:1.6rem;justify-content:center}
.car-dots{display:flex;gap:.5rem}
.car-dots button{width:8px;height:8px;border-radius:50%;background:var(--line2);transition:background .3s,transform .3s;padding:0}
.car-dots button.on{background:var(--accent);transform:scale(1.3)}
.cta-band{position:relative;border:1px solid var(--line);border-radius:calc(var(--radius) + 6px);background:var(--surface);padding:clamp(40px,6vw,84px) clamp(24px,5vw,72px);overflow:hidden;text-align:center}
.cta-band::before{content:"";position:absolute;top:-160px;right:-120px;width:480px;height:480px;border-radius:50%;background:radial-gradient(circle,var(--accent-dim),transparent 65%)}
.cta-band h2{font-size:clamp(1.8rem,4.6vw,3.2rem);text-transform:uppercase;max-width:18ch;margin:0 auto 1rem}
.cta-band p{color:var(--muted);max-width:52ch;margin:0 auto 2.2rem}
.cta-band .row{display:flex;gap:.9rem;justify-content:center;flex-wrap:wrap;position:relative}
.art-grid{display:grid;grid-template-columns:1.15fr .85fr;gap:clamp(20px,3vw,40px);align-items:stretch}
.art-feat{border:1px solid var(--line);border-radius:var(--radius);overflow:hidden;background:var(--surface);display:flex;flex-direction:column;transition:transform .4s var(--ease),border-color .3s}
.art-feat:hover{transform:translateY(-4px);border-color:var(--line2)}
.art-feat .cov{aspect-ratio:16/8.5;overflow:hidden}
.art-feat img{width:100%;height:100%;object-fit:cover;transition:transform .8s var(--ease);filter:saturate(.85)}
.art-feat:hover img{transform:scale(1.05)}
.art-body{padding:clamp(20px,2.5vw,30px);display:flex;flex-direction:column;gap:.7rem;flex:1}
.art-body h3{font-size:clamp(1.15rem,2vw,1.5rem)}
.art-feat:hover h3{color:var(--accent)}
.art-body p{color:var(--muted);font-size:.94rem}
.art-meta{display:flex;gap:1rem;flex-wrap:wrap;font-family:var(--font-d);font-size:.74rem;letter-spacing:.08em;text-transform:uppercase;color:var(--faint);margin-top:auto;padding-top:1rem}
.art-meta .cat{color:var(--accent)}
.art-list{display:flex;flex-direction:column;gap:clamp(14px,2vw,20px)}
.art-item{display:flex;gap:1.2rem;border:1px solid var(--line);border-radius:var(--radius);background:var(--surface);padding:1.1rem;align-items:center;transition:transform .35s var(--ease),border-color .3s;flex:1}
.art-item:hover{transform:translateY(-3px);border-color:var(--line2)}
.art-item:hover h4{color:var(--accent)}
.art-item img{width:110px;height:86px;object-fit:cover;border-radius:10px;flex:none;filter:saturate(.85)}
.art-item h4{font-size:1rem;line-height:1.35}
.art-item .art-meta{margin:.3rem 0 0;padding:0}
.page-hero{padding:clamp(140px,18vh,190px) 0 clamp(44px,6vw,70px);position:relative;overflow:hidden}
.page-hero h1{font-size:clamp(2.2rem,5.6vw,4rem);text-transform:uppercase;margin:1.2rem 0 1rem;max-width:16ch}
.page-hero .sub{max-width:60ch}
.crumb{display:flex;gap:.6rem;align-items:center;margin-bottom:1.4rem}
.crumb a{color:var(--faint);transition:color .25s}
.crumb a:hover{color:var(--accent)}
.two-col{display:grid;grid-template-columns:.85fr 1.15fr;gap:clamp(28px,5vw,72px);align-items:start}
.side-sticky{position:sticky;top:110px}
.panel{border:1px solid var(--line);border-radius:var(--radius);background:var(--surface);padding:clamp(22px,3vw,34px)}
.panel h3{font-size:1.15rem;margin-bottom:1rem;text-transform:uppercase}
.prose{max-width:760px}
.prose h2{font-size:clamp(1.4rem,2.6vw,1.9rem);margin:2.4rem 0 .9rem;text-transform:uppercase}
.prose h3{font-size:1.15rem;margin:1.8rem 0 .6rem}
.prose p{color:var(--muted);margin-bottom:1.1rem}
.prose ul{margin:0 0 1.2rem}
.prose ul.num-list li{color:var(--muted);padding:1rem 0;border-bottom:1px solid var(--line);display:flex;gap:1rem;font-size:.95rem}
.check-list li{display:flex;gap:.8rem;padding:.55rem 0;color:var(--muted);font-size:.95rem}
.check-list .ic{color:var(--accent);margin-top:.28em}
.mini-facts{display:grid;grid-template-columns:1fr 1fr;gap:1px;background:var(--line);border:1px solid var(--line);border-radius:var(--radius-s);overflow:hidden;margin-top:1.4rem}
.mini-facts>div{background:var(--surface);padding:1rem 1.2rem}
.mini-facts span{display:block;font-size:.72rem;letter-spacing:.14em;text-transform:uppercase;font-family:var(--font-d);color:var(--faint)}
.mini-facts b{font-family:var(--font-d);font-size:.95rem;word-break:break-word}
.price-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:clamp(16px,2.4vw,26px)}
.price-card{border:1px solid var(--line);border-radius:var(--radius);background:var(--surface);padding:clamp(24px,2.8vw,34px);display:flex;flex-direction:column;position:relative;transition:transform .4s var(--ease),border-color .3s}
.price-card:hover{transform:translateY(-6px);border-color:var(--line2)}
.price-card.hot{border-color:var(--accent)}
.price-badge{position:absolute;top:-13px;left:50%;transform:translateX(-50%);background:var(--accent);color:var(--accent-ink);font-family:var(--font-d);font-size:.68rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;border-radius:999px;padding:.32rem .9rem;white-space:nowrap}
.price-card .pn{font-family:var(--font-d);letter-spacing:.2em;font-size:.8rem;text-transform:uppercase;color:var(--accent)}
.price-card .pv{font-family:var(--font-d);font-weight:700;font-size:clamp(1.9rem,3vw,2.5rem);margin:.9rem 0 .2rem}
.price-card .pv small{font-size:.9rem;color:var(--faint);font-weight:500}
.price-card .pt{color:var(--muted);font-size:.9rem;margin-bottom:1.4rem}
.price-card ul{margin-bottom:1.8rem;flex:1}
.price-card .btn{justify-content:center}
.ent-panel{margin-top:clamp(16px,2.4vw,26px);border:1px solid var(--line);border-radius:var(--radius);background:var(--surface2);padding:clamp(24px,3.4vw,44px);display:flex;align-items:center;justify-content:space-between;gap:2rem;flex-wrap:wrap}
.ent-panel h3{font-size:1.4rem;text-transform:uppercase}
.ent-panel p{color:var(--muted);max-width:52ch}
.team-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:clamp(16px,2vw,24px)}
.team-card{border:1px solid var(--line);border-radius:var(--radius);background:var(--surface);padding:1.6rem;text-align:center;transition:transform .4s var(--ease),border-color .3s}
.team-card:hover{transform:translateY(-6px);border-color:var(--line2)}
.team-ava{width:86px;height:86px;margin:0 auto 1.1rem;border-radius:50%;border:1px solid var(--accent);background:var(--accent-dim);display:grid;place-items:center;color:var(--accent);font-family:var(--font-d);font-size:1.4rem;font-weight:700}
.team-card h3{font-size:1rem}
.team-card .role{color:var(--accent);font-size:.8rem;font-family:var(--font-d);letter-spacing:.06em;margin:.3rem 0 .7rem}
.team-card p{color:var(--muted);font-size:.85rem}
.team-card .skills{display:flex;gap:.4rem;justify-content:center;flex-wrap:wrap;margin-top:1rem}
.team-card .skills span{font-size:.68rem;font-family:var(--font-d);letter-spacing:.05em;border:1px solid var(--line);border-radius:999px;padding:.25rem .6rem;color:var(--faint)}
.team-soc{display:flex;gap:.5rem;justify-content:center;margin-top:1.1rem}
.form-grid{display:grid;grid-template-columns:1fr 1fr;gap:1.1rem}
.field{display:flex;flex-direction:column;gap:.45rem}
.field.full{grid-column:1/-1}
.field label{font-family:var(--font-d);font-size:.78rem;letter-spacing:.1em;text-transform:uppercase;color:var(--muted)}
.field label b{color:var(--accent)}
.field input,.field select,.field textarea{background:var(--bg2);border:1px solid var(--line);border-radius:var(--radius-s);padding:.85rem 1rem;color:var(--text);font:inherit;font-size:.95rem;transition:border-color .3s,box-shadow .3s;width:100%;appearance:none}
.field select{background-image:linear-gradient(45deg,transparent 50%,var(--muted) 50%),linear-gradient(135deg,var(--muted) 50%,transparent 50%);background-position:calc(100% - 20px) 50%,calc(100% - 14px) 50%;background-size:6px 6px;background-repeat:no-repeat}
.field textarea{min-height:130px;resize:vertical}
.field input:focus,.field select:focus,.field textarea:focus{outline:none;border-color:var(--accent);box-shadow:0 0 0 3px var(--accent-dim)}
.field.err input,.field.err select,.field.err textarea{border-color:var(--err)}
.f-err{font-size:.78rem;color:var(--err);display:none}
.field.err .f-err{display:block}
.btn.loading{pointer-events:none;opacity:.75}
.spin{width:16px;height:16px;border:2px solid var(--accent-ink);border-top-color:transparent;border-radius:50%;animation:sp .7s linear infinite}
@keyframes sp{to{transform:rotate(360deg)}}
.form-ok{text-align:center;padding:clamp(30px,5vw,60px) 20px}
.form-ok .okic{width:74px;height:74px;border-radius:50%;background:var(--accent-dim);border:1px solid var(--accent);display:grid;place-items:center;color:var(--accent);margin:0 auto 1.4rem}
.form-ok h3{font-size:1.5rem;text-transform:uppercase;margin-bottom:.7rem}
.form-ok p{color:var(--muted);max-width:46ch;margin:0 auto}
.acc{border:1px solid var(--line);border-radius:var(--radius-s);background:var(--surface);margin-bottom:.8rem;overflow:hidden;transition:border-color .3s}
.acc.open{border-color:var(--line2)}
.acc-head{width:100%;display:flex;justify-content:space-between;align-items:center;gap:1rem;text-align:left;padding:1.15rem 1.3rem;font-family:var(--font-d);font-weight:600;font-size:1rem}
.acc-head .ic{transition:transform .4s var(--ease);color:var(--accent)}
.acc.open .acc-head .ic{transform:rotate(180deg)}
.acc-body{display:grid;grid-template-rows:0fr;transition:grid-template-rows .45s var(--ease)}
.acc.open .acc-body{grid-template-rows:1fr}
.acc-inner{overflow:hidden}
.acc-inner>div{padding:0 1.3rem 1.3rem;color:var(--muted);font-size:.95rem;max-width:70ch}
.job-head{padding:1.3rem 1.4rem}
.job-head h3{font-size:1.1rem}
.job-tags{margin-left:auto;display:flex;gap:.5rem;flex-wrap:wrap}
.job-tags span{font-family:var(--font-d);font-size:.7rem;letter-spacing:.08em;text-transform:uppercase;border:1px solid var(--line);border-radius:999px;padding:.3rem .75rem;color:var(--muted)}
.blog-tools{display:flex;gap:1rem;flex-wrap:wrap;align-items:center;margin-bottom:2.2rem;justify-content:space-between}
.search-box{display:flex;align-items:center;gap:.6rem;border:1px solid var(--line2);border-radius:999px;padding:.55rem 1.1rem;background:var(--surface);min-width:min(300px,100%)}
.search-box input{background:none;border:0;color:var(--text);font:inherit;font-size:.92rem;width:100%}
.search-box input:focus{outline:none}
.search-box .ic{color:var(--faint)}
.chips{display:flex;gap:.5rem;flex-wrap:wrap}
.chips.scroll-x{flex-wrap:nowrap;overflow-x:auto;max-width:100%;padding-bottom:4px;scrollbar-width:none}
.chips.scroll-x::-webkit-scrollbar{display:none}
.chip{font-family:var(--font-d);font-size:.8rem;font-weight:600;letter-spacing:.04em;padding:.5rem 1.05rem;border:1px solid var(--line2);border-radius:999px;color:var(--muted);transition:all .3s;white-space:nowrap}
.chip:hover{border-color:var(--accent);color:var(--text)}
.chip.on{background:var(--accent);border-color:var(--accent);color:var(--accent-ink)}
.empty{border:1px dashed var(--line2);border-radius:var(--radius);padding:3rem 1.5rem;text-align:center;color:var(--muted)}
.p404{min-height:88vh;display:grid;place-items:center;text-align:center;padding-top:100px;position:relative;overflow:hidden}
.p404 .big{font-family:var(--font-d);font-weight:700;font-size:clamp(6rem,22vw,15rem);line-height:1;color:transparent;-webkit-text-stroke:1.5px var(--line2)}
.p404 .big b{color:var(--accent);-webkit-text-stroke:0}
.contact-grid{display:grid;grid-template-columns:.9fr 1.1fr;gap:clamp(28px,4vw,60px);align-items:start}
.c-list li{display:flex;gap:1rem;padding:1.05rem 0;border-bottom:1px solid var(--line);align-items:flex-start}
.c-list .ic{color:var(--accent);margin-top:.2em}
.c-list span{display:block;font-family:var(--font-d);font-size:.72rem;letter-spacing:.14em;text-transform:uppercase;color:var(--faint)}
.c-list b{font-weight:600;font-size:.95rem;word-break:break-word}
.footer{border-top:1px solid var(--line);background:var(--bg2);padding:clamp(48px,6vw,80px) 0 0;margin-top:clamp(60px,8vw,110px)}
.foot-grid{display:grid;grid-template-columns:2fr 1fr 1fr 1fr 1.3fr;gap:clamp(24px,3vw,40px)}
.foot-brand p{color:var(--muted);font-size:.9rem;max-width:32ch;margin-top:1rem}
.foot-col h4{font-family:var(--font-d);font-size:.78rem;letter-spacing:.18em;text-transform:uppercase;color:var(--faint);margin-bottom:1.2rem}
.foot-col a{display:block;color:var(--muted);font-size:.92rem;padding:.32rem 0;transition:color .25s,transform .3s}
.foot-col a:hover{color:var(--accent);transform:translateX(3px)}
.foot-bottom{border-top:1px solid var(--line);margin-top:clamp(36px,5vw,56px);padding:1.4rem 0;display:flex;justify-content:space-between;align-items:center;gap:1rem;flex-wrap:wrap;font-size:.85rem;color:var(--faint)}
.foot-legal{display:flex;gap:1.4rem;flex-wrap:wrap}
.foot-legal a:hover{color:var(--accent)}
.to-top{position:fixed;right:22px;bottom:22px;width:48px;height:48px;border-radius:50%;background:var(--accent);color:var(--accent-ink);display:grid;place-items:center;z-index:100;opacity:0;transform:translateY(16px);pointer-events:none;transition:opacity .4s,transform .4s var(--ease);box-shadow:0 10px 26px -8px var(--accent)}
.to-top.show{opacity:1;transform:none;pointer-events:auto}
#toast-root{position:fixed;bottom:24px;left:50%;transform:translateX(-50%);z-index:300;display:flex;flex-direction:column;gap:.6rem;align-items:center;pointer-events:none}
.toast{background:var(--surface);border:1px solid var(--accent);color:var(--text);border-radius:999px;padding:.75rem 1.4rem;font-size:.9rem;display:flex;gap:.6rem;align-items:center;box-shadow:var(--sh);animation:tIn .4s var(--ease)}
.toast .ic{color:var(--accent)}
@keyframes tIn{from{opacity:0;transform:translateY(14px)}to{opacity:1}}
.modal-bd{position:fixed;inset:0;background:rgba(3,6,8,.7);backdrop-filter:blur(6px);z-index:200;display:grid;place-items:center;padding:20px;opacity:0;transition:opacity .35s}
.modal-bd.show{opacity:1}
.modal{background:var(--surface);border:1px solid var(--line2);border-radius:var(--radius);max-width:520px;width:100%;padding:clamp(24px,3vw,36px);max-height:88vh;overflow:auto;transform:translateY(20px) scale(.98);transition:transform .4s var(--ease)}
.modal-bd.show .modal{transform:none}
.modal h3{font-size:1.3rem;text-transform:uppercase;margin-bottom:.4rem}
.modal .msub{color:var(--muted);font-size:.9rem;margin-bottom:1.4rem}
.modal-x{float:right;width:36px;height:36px;border-radius:50%;border:1px solid var(--line2);display:grid;place-items:center;color:var(--muted)}
.modal-x:hover{color:var(--accent);border-color:var(--accent)}
.reveal{opacity:0;transform:translateY(28px);transition:opacity .75s var(--ease),transform .75s var(--ease);transition-delay:var(--d,0s)}
.reveal.in{opacity:1;transform:none}
.note{display:inline-flex;gap:.5rem;align-items:center;border:1px dashed var(--line2);border-radius:999px;padding:.4rem 1rem;font-size:.78rem;color:var(--faint);margin-top:1.6rem}
.gal{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:1rem}
.gal img{border-radius:var(--radius-s);border:1px solid var(--line);aspect-ratio:4/3;object-fit:cover;width:100%;transition:transform .5s var(--ease)}
.gal img:hover{transform:scale(1.03)}
@media(max-width:1080px){
  .foot-grid{grid-template-columns:1fr 1fr 1fr}
  .foot-brand{grid-column:1/-1}
  .team-grid{grid-template-columns:repeat(2,1fr)}
  .why-grid{grid-template-columns:repeat(2,1fr)}
  .proc-grid{grid-template-columns:repeat(4,1fr);row-gap:2rem}
  .proc-rail,.proc-line{display:none}
  .proc{border-top:1px solid var(--line)}
  .proc-item::before{content:"";position:absolute;top:0;left:0;width:100%;height:1px;background:var(--line)}
}
@media(max-width:900px){
  .nav-links,.nav .btn{display:none}
  .burger{display:block}
  .hero-grid,.about-grid,.two-col,.contact-grid,.art-grid{grid-template-columns:1fr}
  .hero{padding-top:96px}
  .hero-visual{order:-1;max-width:420px;margin-inline:auto;width:100%}
  .h3d{max-height:none}
  .fc1{left:0}.fc2{right:0}
  .side-sticky{position:static}
  .stats{grid-template-columns:repeat(2,1fr)}
  .stat:nth-child(3){border-left:0}
  .stat{border-top:1px solid var(--line)}
  .stat:nth-child(-n+2){border-top:0}
  .price-grid{grid-template-columns:1fr;max-width:460px;margin-inline:auto}
  .svc-row{grid-template-columns:52px 1fr;grid-template-areas:"ico arrow" "body body"}
  .svc-num{display:none}
  .svc-ico{grid-area:ico}.svc-arrow{grid-area:arrow}.svc-body{grid-area:body}
  .work-grid{grid-template-columns:1fr}
  .work.b,.work{aspect-ratio:16/10}
  .work.down{transform:none}
  .gal{grid-template-columns:1fr 1fr}
}
@media(max-width:640px){
  .why-grid{grid-template-columns:1fr}
  .proc-grid{grid-template-columns:1fr}
  .form-grid{grid-template-columns:1fr}
  .team-grid{grid-template-columns:1fr 1fr}
  .foot-grid{grid-template-columns:1fr 1fr}
  .mini-facts{grid-template-columns:1fr}
  .scroll-ind{display:none}
  .art-item img{width:84px;height:70px}
  .stat{padding-inline:14px}
}
@media(prefers-reduced-motion:reduce){
  html{scroll-behavior:auto}
  *,*::before,*::after{animation-duration:.01ms!important;transition-duration:.01ms!important}
  .reveal{opacity:1;transform:none}
  .mq-track{animation:none}
}
</style>
</head>
<body>
<a class="skip" href="#main">Skip to content</a>
<div class="progress" id="progress" aria-hidden="true"></div>

<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <defs>
    <symbol id="i-logo" viewBox="0 0 24 24"><path d="M5 20V4l14 16V4"/></symbol>
    <symbol id="i-arrow-r" viewBox="0 0 24 24"><path d="M4 12h16M13 5l7 7-7 7"/></symbol>
    <symbol id="i-arrow-ur" viewBox="0 0 24 24"><path d="M7 17 17 7M8 7h9v9"/></symbol>
    <symbol id="i-arrow-up" viewBox="0 0 24 24"><path d="M12 20V4M5 11l7-7 7 7"/></symbol>
    <symbol id="i-code" viewBox="0 0 24 24"><path d="m8 6-6 6 6 6M16 6l6 6-6 6M13 4l-2 16"/></symbol>
    <symbol id="i-layers" viewBox="0 0 24 24"><path d="m12 2 10 6.5L12 15 2 8.5 12 2ZM2 15.5 12 22l10-6.5"/></symbol>
    <symbol id="i-cpu" viewBox="0 0 24 24"><rect x="6" y="6" width="12" height="12" rx="2"/><path d="M9 2v3M15 2v3M9 19v3M15 19v3M2 9h3M2 15h3M19 9h3M19 15h3"/></symbol>
    <symbol id="i-net" viewBox="0 0 24 24"><circle cx="5" cy="12" r="2.4"/><circle cx="19" cy="5" r="2.4"/><circle cx="19" cy="19" r="2.4"/><path d="m7.2 10.8 9.4-4.6M7.2 13.2l9.4 4.6"/></symbol>
    <symbol id="i-wrench" viewBox="0 0 24 24"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></symbol>
    <symbol id="i-spark" viewBox="0 0 24 24"><path d="M12 3l2 5.8L19.8 11 14 13l-2 5.8L10 13 4.2 11 10 8.8 12 3Z"/></symbol>
    <symbol id="i-shield" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5.5L12 2 4 5.5V12c0 6 8 10 8 10Z"/><path d="m9 11.5 2 2 4-4.5"/></symbol>
    <symbol id="i-award" viewBox="0 0 24 24"><circle cx="12" cy="8" r="5.5"/><path d="m8.4 12.8-1.5 8.7 5.1-3 5.1 3-1.5-8.7"/></symbol>
    <symbol id="i-users" viewBox="0 0 24 24"><circle cx="9" cy="7.5" r="3.5"/><path d="M2.5 20a6.5 6.5 0 0 1 13 0M16 4.2a3.5 3.5 0 0 1 0 6.6M21.5 20a6.5 6.5 0 0 0-4.5-6.2"/></symbol>
    <symbol id="i-zap" viewBox="0 0 24 24"><path d="M13 2 3.5 13.5H11L10 22l9.5-11.5H12L13 2Z"/></symbol>
    <symbol id="i-mail" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7.5 9 6 9-6"/></symbol>
    <symbol id="i-chat" viewBox="0 0 24 24"><path d="M21 11.5a8.5 8.5 0 0 1-8.5 8.5c-1.5 0-3-.4-4.2-1.1L3 21l2.1-5.3A8.5 8.5 0 1 1 21 11.5Z"/></symbol>
    <symbol id="i-pin" viewBox="0 0 24 24"><path d="M21 10c0 7-9 12-9 12S3 17 3 10a9 9 0 0 1 18 0Z"/><circle cx="12" cy="10" r="3"/></symbol>
    <symbol id="i-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2"/></symbol>
    <symbol id="i-star" viewBox="0 0 24 24"><path d="m12 2.5 2.9 6 6.6.9-4.8 4.6 1.2 6.5L12 17.4l-5.9 3.1 1.2-6.5L2.5 9.4l6.6-.9 2.9-6Z"/></symbol>
    <symbol id="i-check" viewBox="0 0 24 24"><path d="m20 6-11 11-5-5"/></symbol>
    <symbol id="i-chev-d" viewBox="0 0 24 24"><path d="m6 9 6 6 6-6"/></symbol>
    <symbol id="i-x" viewBox="0 0 24 24"><path d="M18 6 6 18M6 6l12 12"/></symbol>
    <symbol id="i-sun" viewBox="0 0 24 24"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></symbol>
    <symbol id="i-moon" viewBox="0 0 24 24"><path d="M21 12.8A9 9 0 1 1 11.2 3 7 7 0 0 0 21 12.8Z"/></symbol>
    <symbol id="i-ig" viewBox="0 0 24 24"><rect x="2.5" y="2.5" width="19" height="19" rx="5"/><circle cx="12" cy="12" r="4.2"/><path d="M17.3 6.7h.01"/></symbol>
    <symbol id="i-li" viewBox="0 0 24 24"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4V9h4v1.5A6 6 0 0 1 16 8Z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></symbol>
    <symbol id="i-plus" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></symbol>
    <symbol id="i-minus" viewBox="0 0 24 24"><path d="M5 12h14"/></symbol>
    <symbol id="i-refresh" viewBox="0 0 24 24"><path d="M23 4v6h-6M1 20v-6h6"/><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4-4.64 4.36A9 9 0 0 1 3.51 15"/></symbol>
    <symbol id="i-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7.5"/><path d="m21 21-4.7-4.7"/></symbol>
    <symbol id="i-brief" viewBox="0 0 24 24"><rect x="2.5" y="7" width="19" height="13.5" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2M2.5 12.5h19"/></symbol>
    <symbol id="i-user" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/></symbol>
    <symbol id="i-send" viewBox="0 0 24 24"><path d="M22 2 11 13M22 2l-7 20-4-9-9-4 20-7Z"/></symbol>
    <symbol id="i-phone" viewBox="0 0 24 24"><rect x="7" y="2" width="10" height="20" rx="2.5"/><path d="M12 18h.01"/></symbol>
    <symbol id="i-drag" viewBox="0 0 24 24"><path d="M5 9l-3 3 3 3M9 5l3-3 3 3M15 19l-3 3-3-3M19 9l3 3-3 3M2 12h20M12 2v20"/></symbol>
  </defs>
</svg>

<header class="header" id="header">
  <div class="container nav">
    <a class="brand" href="#/" aria-label="NEXARION — Home">
      <span class="brand-mark"><svg class="ic" viewBox="0 0 24 24"><use href="#i-logo"/></svg></span>
      NEXARION
    </a>
    <nav class="nav-links" aria-label="Primary">
      <a href="#/" data-nav="home">Home</a>
      <a href="#/about" data-nav="about">About</a>
      <a href="#/services" data-nav="services">Services</a>
      <a href="#/portfolio" data-nav="portfolio">Portfolio</a>
      <a href="#/process" data-nav="process">Process</a>
      <a href="#/pricing" data-nav="pricing">Pricing</a>
      <a href="#/blog" data-nav="blog">Blog</a>
      <a href="#/contact" data-nav="contact">Contact</a>
    </nav>
    <div class="nav-right">
      <button class="icon-btn" id="themeBtn" aria-label="Toggle light / dark mode">
        <svg class="ic i-sun" width="18" height="18"><use href="#i-sun"/></svg>
        <svg class="ic i-moon" width="18" height="18"><use href="#i-moon"/></svg>
      </button>
      <a class="btn btn-p btn-sm" href="#/contact">Let's Talk</a>
      <button class="burger" id="burger" aria-label="Open menu" aria-expanded="false"><span></span><span></span></button>
    </div>
  </div>
</header>

<div class="mmenu" id="mmenu" aria-hidden="true">
  <nav aria-label="Mobile">
    <a class="mlink" href="#/">Home <svg class="ic" width="22" height="22"><use href="#i-arrow-ur"/></svg></a>
    <a class="mlink" href="#/about">About <svg class="ic" width="22" height="22"><use href="#i-arrow-ur"/></svg></a>
    <a class="mlink" href="#/services">Services <svg class="ic" width="22" height="22"><use href="#i-arrow-ur"/></svg></a>
    <a class="mlink" href="#/portfolio">Portfolio <svg class="ic" width="22" height="22"><use href="#i-arrow-ur"/></svg></a>
    <a class="mlink" href="#/process">Process <svg class="ic" width="22" height="22"><use href="#i-arrow-ur"/></svg></a>
    <a class="mlink" href="#/pricing">Pricing <svg class="ic" width="22" height="22"><use href="#i-arrow-ur"/></svg></a>
    <a class="mlink" href="#/blog">Blog <svg class="ic" width="22" height="22"><use href="#i-arrow-ur"/></svg></a>
    <a class="mlink" href="#/team">Team <svg class="ic" width="22" height="22"><use href="#i-arrow-ur"/></svg></a>
    <a class="mlink" href="#/careers">Careers <svg class="ic" width="22" height="22"><use href="#i-arrow-ur"/></svg></a>
    <a class="mlink" href="#/faq">FAQ <svg class="ic" width="22" height="22"><use href="#i-arrow-ur"/></svg></a>
    <a class="mlink" href="#/contact">Contact <svg class="ic" width="22" height="22"><use href="#i-arrow-ur"/></svg></a>
  </nav>
  <div class="mm-foot">
    <a class="btn btn-p" href="#/contact">Start a Project <svg class="ic" width="16" height="16"><use href="#i-arrow-r"/></svg></a>
  </div>
</div>

<main id="main">
  <section class="sec" id="siteBootFallback" style="min-height:60vh;display:grid;place-items:center">
    <div class="container" style="text-align:center">
      <p class="kicker" style="justify-content:center">NEXARION</p>
      <h1 style="font-size:clamp(2rem,6vw,4.6rem);text-transform:uppercase">Building digital experiences</h1>
      <p class="lead" style="margin:1rem auto 0;max-width:54ch;text-align:center">Loading website content…</p>
    </div>
  </section>
</main>

<footer class="footer">
  <div class="container">
    <div class="foot-grid">
      <div class="foot-brand">
        <a class="brand" href="#/"><span class="brand-mark"><svg class="ic" viewBox="0 0 24 24"><use href="#i-logo"/></svg></span>NEXARION</a>
        <p>Technology & digital solutions company. We build modern digital products that combine design, engineering, and business thinking.</p>
      </div>
      <div class="foot-col">
        <h4>Company</h4>
        <a href="#/about">About</a><a href="#/team">Team</a><a href="#/careers">Careers</a><a href="#/blog">Blog</a>
      </div>
      <div class="foot-col">
        <h4>Services</h4>
        <a href="#/services/web-development">Web Development</a><a href="#/services/ui-ux-design">UI/UX Design</a><a href="#/services/custom-software">Custom Software</a><a href="#/services/digital-solutions">Digital Solutions</a><a href="#/services/maintenance">Maintenance</a>
      </div>
      <div class="foot-col">
        <h4>Resources</h4>
        <a href="#/portfolio">Portfolio</a><a href="#/portfolio">Case Studies</a><a href="#/faq">FAQ</a><a href="#/pricing">Pricing</a>
      </div>
      <div class="foot-col">
        <h4>Contact</h4>
        <a href="mailto:[COMPANY_EMAIL]">[COMPANY_EMAIL]</a>
        <a href="#/contact">WhatsApp: [WHATSAPP]</a>
        <a href="#/contact">Instagram: [INSTAGRAM]</a>
        <a href="#/contact">LinkedIn: [LINKEDIN]</a>
      </div>
    </div>
    <div class="foot-bottom">
      <span>© 2026 NEXARION. All Rights Reserved.</span>
      <div class="foot-legal">
        <a href="#/privacy">Privacy Policy</a>
        <a href="#/terms">Terms & Conditions</a>
        <a href="#/cookies">Cookie Policy</a>
      </div>
    </div>
  </div>
</footer>

<button class="to-top" id="toTop" aria-label="Back to top"><svg class="ic" width="18" height="18"><use href="#i-arrow-up"/></svg></button>
<div id="modal-root"></div>
<div id="toast-root" role="status" aria-live="polite"></div>

<script>
'use strict';
const $ = (s, c=document) => c.querySelector(s);
const $$ = (s, c=document) => [...c.querySelectorAll(s)];
// Escape dynamic CMS text before it is inserted into HTML templates.
const esc = v => String(v ?? '').replace(/[&<>"']/g, ch => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[ch]));
const ic = (n, s=18) => `<svg class="ic" width="${s}" height="${s}" aria-hidden="true"><use href="#i-${n}"/></svg>`;
const REDUCED = matchMedia('(prefers-reduced-motion: reduce)').matches;
const FINE = matchMedia('(pointer: fine)').matches;

/* ============ DATA (CMS-ready) ============ */
let DATA = {
  services: [
    { slug:'web-development', num:'01', icon:'code', title:'Website Development',
      desc:'Fast, well-structured websites built to convert — from company profiles to full e-commerce platforms.',
      tags:['Company Profile','Landing Page','Corporate Website','E-Commerce','Web Application'],
      overview:'We design and build websites that load fast, rank well, and turn visitors into customers. Every build is performance-first, mobile-ready, and structured so your team can grow it without rebuilding from zero.',
      problems:['Outdated websites that quietly damage credibility','Slow loading times that push visitors away before they see your offer','Layouts that break on mobile, where most of your audience lives','Platforms that are hard or expensive to update'],
      solution:'A clean, modern build: performance-first architecture, semantic and SEO-ready markup, and a CMS-friendly setup so content updates never require touching code.',
      whatWeBuild:['Company Profile','Landing Page','E-Commerce','Web Application','Dashboard','Booking System','Custom Website'],
      tech:['HTML','CSS','JavaScript','React','Next.js','Node.js'],
      benefits:['Faster load times and better Core Web Vitals','Stronger search visibility from day one','Easy content management for non-technical teams','Architecture that scales with your business'] },
    { slug:'ui-ux-design', num:'02', icon:'layers', title:'UI/UX Design',
      desc:'Research-driven interfaces that feel obvious to use — validated before a single line of code.',
      tags:['User Research','Wireframe','Prototype','Interface Design','Design System'],
      overview:'Good design is not decoration — it is how your product works. We research real users, map their journeys, and design interfaces that make every step feel effortless.',
      problems:['Interfaces that confuse users and increase drop-off','High abandonment during sign-up or checkout flows','Inconsistent visuals across pages and products','Design decisions made on guesswork'],
      solution:'A structured design process: research, wireframes, interactive prototypes, and a documented design system your developers can implement without ambiguity.',
      whatWeBuild:['User Research & Flows','Wireframes','Interactive Prototypes','Interface Design','Design System','Usability Testing'],
      tech:['Figma','Design Tokens','Prototyping','Usability Testing'],
      benefits:['Higher conversion on key flows','Consistent experience across every screen','Faster development with a clear design system','Fewer expensive redesigns later'] },
    { slug:'custom-software', num:'03', icon:'cpu', title:'Custom Software',
      desc:'Business systems, dashboards, and internal tools shaped exactly around how your company works.',
      tags:['Business System','Management System','Dashboard','Internal Tools'],
      overview:'Off-the-shelf tools force your business to follow their rules. We build software that follows yours — management systems, dashboards, and internal tools that fit your workflow precisely.',
      problems:['Teams juggling spreadsheets and manual processes','Data scattered across tools that never talk to each other','Generic software that cannot adapt to your workflow','No single source of truth for business decisions'],
      solution:'We map your process first, then design and build a system around it — with clear data models, role-based access, and reporting your team will actually use.',
      whatWeBuild:['Business Systems','Management Systems','Operational Dashboards','Internal Tools','Reporting Modules','System Integration'],
      tech:['Node.js','Python','PostgreSQL','MySQL'],
      benefits:['Hours of manual work replaced by automation','One reliable source of truth for your data','Software that grows with your operations','Full ownership of your system'] },
    { slug:'digital-solutions', num:'04', icon:'net', title:'Digital Solutions',
      desc:'Automation, integrations, and digital transformation for businesses entering the digital era.',
      tags:['Automation','API Integration','Database System','Digital Transformation'],
      overview:'Digital transformation does not have to be overwhelming. We help businesses automate repetitive work, connect their tools, and structure their data — one practical step at a time.',
      problems:['Repetitive manual tasks consuming your team\'s time','Tools and platforms that cannot exchange data','Unstructured data with no clear ownership','Uncertainty about where to start digitizing'],
      solution:'We audit your current workflow, identify the highest-impact improvements, and implement them incrementally — so transformation is measurable, not disruptive.',
      whatWeBuild:['Workflow Automation','API Integrations','Database Architecture','Migration & Structuring','Transformation Roadmap'],
      tech:['REST API','Webhooks','MySQL','MongoDB'],
      benefits:['Measurable time savings within weeks','Tools that finally work together','Clean, structured, usable data','A clear roadmap instead of guesswork'] },
    { slug:'maintenance', num:'05', icon:'wrench', title:'Maintenance & Support',
      desc:'Keeping your product fast, secure, and reliable long after launch day.',
      tags:['Website Maintenance','Performance Optimization','Security Updates','Technical Support'],
      overview:'Launch is the beginning, not the finish line. Our maintenance keeps your website healthy — updated, monitored, backed up, and improving — so you never think about it.',
      problems:['Websites that slowly get slower and break silently','Security vulnerabilities left unpatched','No backups when something goes wrong','Nobody to call when an issue appears'],
      solution:'A structured maintenance plan: proactive monitoring, regular updates, performance audits, security patches, and a responsive support channel with clear SLAs.',
      whatWeBuild:['Regular Updates','Uptime Monitoring','Performance Audits','Security Patching','Backup Management','Priority Support'],
      tech:['Uptime Monitoring','CDN','Automated Backups','Security Patches'],
      benefits:['Peace of mind — issues are caught early','Consistent speed and reliability','Protection against common attacks','A technical partner who knows your system'] }
  ],
  projects: [
    { slug:'aurora-commerce', title:'Aurora Commerce', cat:'Website', tech:['Next.js','Node.js','PostgreSQL'], year:'2025', seed:'nx-aurora', big:true,
      desc:'A full e-commerce platform with a custom storefront, inventory dashboard, and payment flow.',
      challenge:'The client needed to move from a marketplace-only sales model to an owned platform without losing operational visibility of stock, orders, and fulfilment.',
      research:'We mapped the existing sales workflow and interviewed the operations team to understand how orders actually moved through the business day to day.',
      strategy:'Phase the migration: launch the storefront first, then move inventory and fulfilment into an integrated dashboard behind it.',
      design:'A conversion-focused storefront with a component-driven design system, keeping the product pages fast and the checkout under three steps.',
      development:'Built as a modern web application with a headless architecture — storefront and dashboard share one API and one database.',
      result:[['Conversion','[METRIC]'],['Load time','[METRIC]'],['Monthly orders','[METRIC]']] },
    { slug:'pulse-dashboard', title:'Pulse Analytics Dashboard', cat:'Web Application', tech:['React','Node.js','MySQL'], year:'2025', seed:'nx-pulse',
      desc:'A real-time operations dashboard unifying data from multiple internal tools.',
      challenge:'Data lived in five disconnected tools; management decisions were made from week-old spreadsheet exports.',
      research:'We audited every report the leadership team used and identified the twelve metrics that actually drove decisions.',
      strategy:'One dashboard, one source of truth: consolidate data pipelines first, design the interface second.',
      design:'A dense but calm interface — clear hierarchy, dark-first palette, and charts readable at a glance.',
      development:'Scheduled data sync jobs feed a normalized database; the frontend renders live views with role-based access.',
      result:[['Reporting time','[METRIC]'],['Data sources unified','[METRIC]'],['Active users','[METRIC]']] },
    { slug:'atlas-design-system', title:'Atlas Design System', cat:'UI/UX', tech:['Figma','Design Tokens','Storybook'], year:'2024', seed:'nx-atlas',
      desc:'A complete design system for a growing SaaS product team.',
      challenge:'Three product teams were shipping increasingly inconsistent interfaces, slowing down both design and development.',
      research:'We inventoried every component variant already in production and interviewed both designers and developers about friction points.',
      strategy:'Build the system around tokens, not screens — so themes and platforms can change without redesigning everything.',
      design:'Forty-plus documented components with clear usage rules, states, and accessibility standards baked in.',
      development:'Token export pipeline syncs Figma variables directly to frontend code.',
      result:[['Components documented','40+'],['Design-dev handoff time','[METRIC]'],['UI inconsistencies','[METRIC]']] },
    { slug:'flowops-automation', title:'FlowOps Process Automation', cat:'Digital Solution', tech:['Node.js','Webhooks','MongoDB'], year:'2024', seed:'nx-flowops',
      desc:'Automation pipelines that replaced repetitive manual operations for a logistics team.',
      challenge:'A five-person operations team spent most of each day copying data between systems and sending status updates manually.',
      research:'We shadowed the team for a week and logged every manual touchpoint in the order lifecycle.',
      strategy:'Automate the highest-frequency tasks first; keep humans in the loop for exceptions only.',
      design:'A simple control panel where the team defines rules and monitors automation health.',
      development:'Event-driven pipelines with retry logic and full audit logging.',
      result:[['Manual hours saved / week','[METRIC]'],['Error rate','[METRIC]'],['Processes automated','[METRIC]']] },
    { slug:'kindercare-web', title:'KinderCare School Website', cat:'Website', tech:['Next.js','CMS','MySQL'], year:'2024', seed:'nx-kindercare',
      desc:'A warm, fast school website with an admission funnel and CMS for staff.',
      challenge:'The school\'s old site was slow, hard to update, and losing inquiries from parents on mobile.',
      research:'We interviewed parents about what they look for when choosing a school and analyzed where the old site lost them.',
      strategy:'Lead with trust: programs, teachers, and a one-minute admission inquiry flow.',
      design:'A friendly but professional visual direction with photography-led sections and clear information architecture.',
      development:'CMS-driven content so staff publish announcements without developer help.',
      result:[['Inquiry rate','[METRIC]'],['Mobile bounce','[METRIC]'],['Lighthouse score','[METRIC]']] },
    { slug:'medibook-booking', title:'MediBook Booking System', cat:'Web Application', tech:['React','Node.js','PostgreSQL'], year:'2023', seed:'nx-medibook',
      desc:'An online appointment booking system for a multi-doctor clinic.',
      challenge:'Phone-only booking created queues, double-bookings, and no-shows with no reminder mechanism.',
      research:'We mapped the clinic\'s scheduling rules — doctor availability, room constraints, appointment types.',
      strategy:'Self-service booking with automated confirmations and reminders, fully reflecting real availability.',
      design:'A guided flow that books an appointment in under a minute, with an admin calendar for staff.',
      development:'Conflict-free scheduling engine with transactional slot locking.',
      result:[['No-show rate','[METRIC]'],['Phone workload','[METRIC]'],['Bookings online','[METRIC]']] }
  ],
  posts: [
    { slug:'why-performance-matters', cat:'Web Development', title:'Why Website Performance Directly Affects Revenue', date:'Mar 12, 2026', read:'6 min', author:'[AUTHOR]', seed:'nx-blog-perf',
      excerpt:'Every extra second of load time costs you visitors. Here is the business case for treating speed as a feature, not a technical detail.',
      body:[
        { h:'Speed is a business metric', ps:['When a website takes three seconds to load, a significant portion of visitors leave before seeing anything. Those are not anonymous statistics — they are potential customers who made a judgment about your business in the time it took a page to appear.','That judgment is unfair, but it is predictable. This is why we treat performance as a product feature with a measurable impact, not as a technical afterthought.'] },
        { h:'Where performance is usually lost', ps:['The usual culprits are unoptimized images, heavy third-party scripts, and hosting that was chosen for price rather than suitability. None of these are exotic problems — they are discipline problems.','A performance-first build addresses them from the start: responsive images, minimal JavaScript, and infrastructure sized to real traffic.'] },
        { h:'What to do this week', ps:['Run your site through a performance audit. If it scores below what you would accept from a supplier in any other part of your business, it is costing you money — and it is fixable.'] }
      ] },
    { slug:'design-systems-explained', cat:'UI/UX', title:'Design Systems, Explained for Non-Designers', date:'Feb 28, 2026', read:'5 min', author:'[AUTHOR]', seed:'nx-blog-ds',
      excerpt:'A design system is not a Figma file — it is the agreement that keeps your product consistent while it grows.',
      body:[
        { h:'The consistency problem', ps:['Every growing product eventually hits the same wall: buttons look slightly different on ten different pages, and nobody knows which one is correct. Each fix creates two new inconsistencies.','A design system solves this by defining the components once — buttons, forms, colors, spacing — and making them the single source of truth.'] },
        { h:'Why it saves money', ps:['Without a system, every new feature starts from visual scratch and every developer interprets designs slightly differently. With one, teams assemble interfaces from proven parts.','The result is faster shipping, fewer design debates, and an interface that feels deliberate to your users.'] }
      ] },
    { slug:'digital-transformation-umkm', cat:'Digital Transformation', title:'Digital Transformation for Small Businesses: Where to Start', date:'Feb 10, 2026', read:'7 min', author:'[AUTHOR]', seed:'nx-blog-dt',
      excerpt:'You do not need a moonshot. You need a spreadsheet, a website, and one automated process.',
      body:[
        { h:'Start with the boring repetitive task', ps:['Every small business has one: the manual data entry, the copy-pasted reports, the appointment book. That task is your starting point — not AI, not a company-wide platform.','Automating a single high-frequency process delivers visible savings within weeks and builds momentum for the next step.'] },
        { h:'Own your online presence', ps:['Relying entirely on marketplaces and social platforms means renting your customer relationships. A website you control turns attention into an asset.','It does not need to be complex. It needs to be fast, clear about what you offer, and easy to contact.'] },
        { h:'Measure something', ps:['Digital transformation without measurement is just spending. Pick one number — inquiries per week, hours saved, response time — and watch it move.'] }
      ] },
    { slug:'choosing-tech-stack', cat:'Technology', title:'How to Choose a Tech Stack Without the Hype', date:'Jan 22, 2026', read:'6 min', author:'[AUTHOR]', seed:'nx-blog-stack',
      excerpt:'The best stack is not the newest one — it is the one your team can maintain in five years.',
      body:[
        { h:'Optimize for maintainability', ps:['Every technology choice is a long-term relationship. A framework that is exciting today but poorly documented or shrinking in community will be expensive tomorrow.','We evaluate stacks on four factors: ecosystem maturity, hiring pool, documentation quality, and how boring the boring parts are.'] },
        { h:'Match the stack to the problem', ps:['A marketing site does not need the architecture of a banking system. A dashboard does not need a microservice fleet. Choosing appropriately-sized technology is a sign of maturity, not lack of ambition.','The right question is never "what is trending" — it is "what will still be easy to change in three years."'] }
      ] },
    { slug:'seo-fundamentals', cat:'Business', title:'SEO Fundamentals Every Business Website Needs', date:'Jan 8, 2026', read:'5 min', author:'[AUTHOR]', seed:'nx-blog-seo',
      excerpt:'No tricks — the four foundations that determine whether search engines can actually recommend you.',
      body:[
        { h:'Be understandable to machines', ps:['Search engines read structure: headings, semantic markup, page titles, meta descriptions. If your content is a wall of unstructured divs, you are asking to be misunderstood.','Semantic HTML is not academic purity — it is how your pages get correctly represented in search results.'] },
        { h:'Be fast and be mobile', ps:['Speed and mobile experience are ranking factors because they are user experience factors. The sites that win are the ones that respect the visitor\'s time.'] },
        { h:'Answer real questions', ps:['The most durable SEO strategy is writing content that genuinely answers what your customers search for. Everything else decays; usefulness compounds.'] }
      ] },
    { slug:'company-news-launch', cat:'Company News', title:'NEXARION Launches New Service Line (Placeholder)', date:'Dec 18, 2025', read:'3 min', author:'[AUTHOR]', seed:'nx-blog-news',
      excerpt:'Replace this article with your real company announcements — launches, partnerships, milestones.',
      body:[
        { h:'A template for real news', ps:['This article exists as a placeholder so your blog never looks empty during development. Replace it with actual company news: new services, new team members, event participation, or milestones.','Authentic announcements build more trust than a perfectly polished blog with nothing real in it.'] }
      ] }
  ],
  team: [
    { name:'[TEAM MEMBER 01]', role:'Founder & CEO', bio:'Replace with a short biography: background, what they lead at NEXARION, and one human detail.', skills:['Strategy','Product'] },
    { name:'[TEAM MEMBER 02]', role:'Technology Lead', bio:'Replace with a short biography: technical background, areas of expertise, and how they approach engineering.', skills:['Architecture','Backend'] },
    { name:'[TEAM MEMBER 03]', role:'Frontend Developer', bio:'Replace with a short biography: specialization, favorite kind of problem to solve, and approach to craft.', skills:['React','Performance'] },
    { name:'[TEAM MEMBER 04]', role:'UI/UX Designer', bio:'Replace with a short biography: design philosophy, research background, and what good design means to them.', skills:['Research','Systems'] }
  ],
  jobs: [
    { t:'Frontend Developer', type:'Full-time', loc:'[LOCATION]', desc:'Build fast, accessible interfaces for client projects across industries.', resp:['Develop responsive, accessible web interfaces','Collaborate with designers on implementation quality','Optimize performance and Core Web Vitals','Participate in code reviews and mentoring'], req:['Solid HTML, CSS, and JavaScript fundamentals','Experience with a modern framework (React/Next.js)','Attention to detail and care for users','Portfolio of real projects'] },
    { t:'Backend Developer', type:'Full-time', loc:'[LOCATION]', desc:'Design reliable APIs, data models, and systems that power client products.', resp:['Design and build REST APIs and services','Model databases for clarity and scale','Implement authentication, security, and integrations','Write maintainable, tested code'], req:['Strong Node.js or Python experience','SQL and NoSQL database proficiency','Understanding of security fundamentals','Clear written communication'] },
    { t:'UI/UX Designer', type:'Full-time', loc:'[LOCATION]', desc:'Turn research and business goals into interfaces people understand instantly.', resp:['Run user research and usability testing','Design flows, wireframes, and hi-fi interfaces','Build and maintain design systems','Present and defend design decisions'], req:['Strong Figma and prototyping skills','Portfolio demonstrating process, not just visuals','Understanding of accessibility principles','Empathy for non-technical users'] },
    { t:'Project Manager', type:'Full-time', loc:'[LOCATION]', desc:'Keep projects honest — scope, timeline, and communication between team and client.', resp:['Plan sprints and manage delivery timelines','Communicate progress transparently with clients','Anticipate risks before they become problems','Facilitate between technical and business stakeholders'], req:['2+ years managing digital projects','Excellent written and verbal communication','Familiarity with web development lifecycles','Calm under pressure'] },
    { t:'Digital Marketing', type:'Full-time', loc:'[LOCATION]', desc:'Grow NEXARION\'s presence and help clients understand the value of good digital strategy.', resp:['Plan and execute content marketing','Manage social media channels','Analyze campaign performance and iterate','Support lead nurturing and conversion'], req:['Experience in B2B or tech marketing','Strong copywriting in English','Analytics tool proficiency','Curiosity about technology'] }
  ],
  faqs: [
    { q:'How long does it take to build a website?', a:'It depends on complexity. A focused landing page can be ready in 1–2 weeks; a company profile site typically takes 3–6 weeks; e-commerce platforms and web applications usually take 6–12 weeks or more. After our discovery session, we give you a realistic timeline with clear milestones — and we keep you updated at every stage.' },
    { q:'Can you build a custom website?', a:'Yes. Everything we build is designed and developed around your specific goals — no forced templates. If a template genuinely serves your budget and timeline better, we will tell you that honestly too.' },
    { q:'Do you provide maintenance?', a:'Yes. We offer structured maintenance plans covering updates, security patches, performance monitoring, backups, and priority support, so your product stays healthy long after launch.' },
    { q:'Can you integrate third-party APIs?', a:'Yes. We regularly integrate payment gateways, shipping services, CRM tools, WhatsApp APIs, maps, and custom internal APIs. During discovery we validate the exact services you need.' },
    { q:'Do you provide hosting and domain?', a:'Availability depends on the selected package. Some packages include managed hosting and domain handling; others assume you already have infrastructure. We will recommend the most suitable setup for your project and budget.' },
    { q:'Can I request custom features?', a:'Absolutely. Custom features are our core work. Describe what you need during the inquiry process and we will assess feasibility, effort, and the smartest way to build it.' }
  ],
  testimonials: [
    { q:'Replace this content with an authentic client testimonial. Ask a satisfied client to describe the problem they had, the result they got, and what working with the team felt like.', n:'[CLIENT NAME]', r:'[POSITION], [COMPANY]' },
    { q:'Replace this content with an authentic client testimonial. Specific numbers and concrete outcomes make testimonials far more credible than general praise.', n:'[CLIENT NAME]', r:'[POSITION], [COMPANY]' },
    { q:'Replace this content with an authentic client testimonial. One or two genuine sentences outperform a paragraph of generic superlatives.', n:'[CLIENT NAME]', r:'[POSITION], [COMPANY]' }
  ],
  pricing: [
    { n:'Starter', p:'Rp 3,5 jt', per:'/project*', t:'For simple digital needs — get a credible online presence fast.', hot:false, f:['1–5 page website','Mobile-responsive design','Basic SEO setup','Contact form','1 revision round','Delivery: 2–3 weeks'] },
    { n:'Business', p:'Rp 9,8 jt', per:'/project*', t:'For businesses that need a professional, conversion-ready website.', hot:true, f:['Up to 12 pages','Custom UI/UX design','CMS-ready content management','Performance & SEO optimization','3 revision rounds','30 days post-launch support','Delivery: 4–6 weeks'] },
    { n:'Professional', p:'Rp 24,9 jt', per:'/project*', t:'For companies with more complex requirements and integrations.', hot:false, f:['Unlimited pages / web application','Custom design system','API & third-party integrations','Admin dashboard','Advanced analytics setup','90 days post-launch support','Delivery: 8–12 weeks'] }
  ],
  tech: {
    Frontend:['HTML','CSS','JavaScript','React','Next.js'],
    Backend:['Node.js','Python','Django','Laravel'],
    Database:['MySQL','PostgreSQL','MongoDB'],
    Tools:['Git','GitHub','Figma','VS Code']
  },
  process: [
    { n:'01', t:'Discovery', d:'Understanding business goals and requirements.' },
    { n:'02', t:'Strategy', d:'Planning product structure and technical approach.' },
    { n:'03', t:'Design', d:'Creating UI/UX and visual direction.' },
    { n:'04', t:'Development', d:'Building and integrating the product.' },
    { n:'05', t:'Testing', d:'Testing functionality, responsiveness, and performance.' },
    { n:'06', t:'Launch', d:'Deployment and production setup.' },
    { n:'07', t:'Support', d:'Maintenance, optimization, and improvements.' }
  ],
  values: [
    { i:'spark', t:'Innovation', d:'Constantly exploring new ideas and technologies.' },
    { i:'shield', t:'Integrity', d:'Building trust through transparency and responsibility.' },
    { i:'award', t:'Excellence', d:'Maintaining high standards in every project.' },
    { i:'users', t:'Collaboration', d:'Working closely with clients and partners.' },
    { i:'zap', t:'Impact', d:'Creating technology that delivers meaningful results.' }
  ],
  why: [
    { i:'cpu', t:'Modern Technology', d:'We use current, relevant technology — chosen for longevity, not hype.' },
    { i:'users', t:'User-Centered Design', d:'Every decision starts from what your users actually need, validated by research.' },
    { i:'phone', t:'Responsive by Default', d:'Optimal on desktop, tablet, and mobile — where most of your audience is.' },
    { i:'layers', t:'Scalable Architecture', d:'Built so it can grow. Adding features later should not mean starting over.' },
    { i:'search', t:'Transparent Process', d:'You always know what stage your project is in, what is next, and why.' },
    { i:'shield', t:'Long-Term Support', d:'Maintenance and support plans that keep your product healthy for years.' }
  ]
};

// Fallback content for modules that are now fully managed by Laravel + SQLite.
DATA.site = {
  brand:'NEXARION', tagline:'Technology & Digital Solutions', logo:'',
  vision:'To become a trusted technology partner that helps businesses and organizations create meaningful digital experiences.',
  mission:'Build high-quality digital products, deliver modern user-focused experiences, help businesses adopt technology, continuously innovate, and build long-term client relationships.',
  story1:'NEXARION started from a simple observation: most businesses do not need more technology — they need the right technology, built carefully, by people who understand both the code and the business behind it.',
  story2:'We are a team of designers, engineers, and strategists who believe good digital products come from clarity: clear goals, clear process, and clear communication. That belief shapes everything we ship.',
  founded:'[YEAR]', teamSize:'[TEAM_SIZE]', focus:'Web & Software', city:'[CITY]',
  careersBenefits:'Competitive salary, flexible hours, remote-friendly, hardware budget, and real ownership of your work.',
  footerBlurb:'Technology & digital solutions built around real business goals.', responseTime:'We reply within one business day.'
};
DATA.heroes = {};
DATA.stats = [
  {value:'50',suffix:'+',label:'Projects Completed'}, {value:'30',suffix:'+',label:'Happy Clients'},
  {value:'5',suffix:'+',label:'Digital Services'}, {value:'99',suffix:'%',label:'Commitment'}
];
DATA.legal = {};
DATA.contactOptions = {budgets:['< Rp 5 jt','Rp 5 – 15 jt','Rp 15 – 50 jt','> Rp 50 jt','Not sure yet'], timelines:['< 1 month','1 – 3 months','3 – 6 months','Flexible']};

let SITE_SETTINGS = { email:'[COMPANY_EMAIL]', whatsapp:'[WHATSAPP]', instagram:'[INSTAGRAM]', linkedin:'[LINKEDIN]', address:'[OFFICE_ADDRESS]', hours:'Mon – Fri, 09.00 – 18.00', maintenance:false, mMsg:'' };
const csrfToken = () => document.querySelector('meta[name="csrf-token"]')?.content || '';

/* ============ KOMPONEN REUSABLE ============ */
const siteCopy = () => DATA.site || {};
const heroData = (page, kick, title, subtitle) => ({kick, title, subtitle, ...(DATA.heroes?.[page] || {})});
const syncedHero = (page, kick, title, subtitle, crumbTo, crumbTxt) => {
  const h = heroData(page, kick, title, subtitle);
  return pageHero(esc(h.kicker || kick), esc(h.title || title), esc(h.subtitle || subtitle), crumbTo, crumbTxt);
};
const contentImage = (p, size='1000/540') => (p?.img && String(p.img).trim()) ? p.img : `https://picsum.photos/seed/${p?.seed || p?.slug || 'nexarion'}/${size}.jpg`;

const secHead = (kick, title, sub, center) => `
  <div class="sec-head${center ? ' center' : ''}">
    <p class="kicker">${kick}</p>
    <h2 class="reveal">${title}</h2>
    ${sub ? `<p class="sub reveal" style="--d:.1s">${sub}</p>` : ''}
  </div>`;

const pageHero = (kick, title, sub, crumbTo, crumbTxt) => `
  <section class="page-hero"><div class="ticks"><i></i><i></i><i></i><i></i></div>
    <div class="container">
      ${crumbTo ? `<nav class="crumb mono" aria-label="Breadcrumb"><a href="${crumbTo}">← ${crumbTxt}</a></nav>` : ''}
      <p class="kicker">${kick}</p>
      <h1 class="reveal">${title}</h1>
      ${sub ? `<p class="lead reveal" style="--d:.1s">${sub}</p>` : ''}
    </div>
  </section>`;

const statsBlock = () => `
  <section class="sec" id="stats" style="padding-block:clamp(40px,6vw,80px)">
    <div class="container">
      <div class="stats">
        ${(DATA.stats || []).map((x,i)=>`<div class="stat reveal" style="--d:${i*.08}s"><b><span class="count" data-to="${esc(x.value || '0')}">0</span><em>${esc(x.suffix || '')}</em></b><span>${esc(x.label || '')}</span></div>`).join('')}
      </div>
    </div>
  </section>`;

const serviceRow = s => `
  <a class="svc-row reveal" href="#/services/${s.slug}" aria-label="${s.title} — learn more">
    <span class="svc-num">${s.num}</span>
    <span class="svc-ico">${ic(s.icon, 22)}</span>
    <span class="svc-body">
      <h3>${s.title}</h3>
      <p>${s.desc}</p>
      <ul class="svc-tags">${s.tags.map(t => `<li>${t}</li>`).join('')}</ul>
    </span>
    <span class="svc-arrow">${ic('arrow-ur', 20)}</span>
  </a>`;

const projectImage = (p, size='900/560') => (p.img && String(p.img).trim()) ? p.img : `https://picsum.photos/seed/${p.seed}/${size}.jpg`;
const workCard = (p, i, extra='') => `
  <a class="work reveal ${p.big ? 'b' : ''} ${extra}" href="#/portfolio/${p.slug}" data-cat="${p.cat}" style="--d:${i * .07}s" aria-label="${p.title} — view case study">
    <img loading="lazy" src="${projectImage(p, p.big ? '1400/680' : '900/560')}" alt="${p.title} — project preview">
    <span class="work-ol">
      <span class="work-cat">${p.cat}</span>
      <h3>${p.title}</h3>
      <p>${p.desc}</p>
      <span class="work-tech">${p.tech.join(' · ')} — ${p.year}</span>
    </span>
    <span class="work-go">${ic('arrow-ur', 20)}</span>
  </a>`;

const processBlock = () => `
  <div class="proc" data-procline>
    <div class="proc-grid">
      <div class="proc-rail"></div><div class="proc-line"></div>
      ${DATA.process.map((p, i) => `
        <div class="proc-item reveal" style="--d:${i * .06}s">
          <span class="proc-dot"></span>
          <span class="n">${p.n}</span><h3>${p.t}</h3><p>${p.d}</p>
        </div>`).join('')}
    </div>
  </div>`;

const techBlock = () => {
  const keys = Object.keys(DATA.tech || {});
  if (!keys.length) return `<div class="empty">Technology stack has not been published yet.</div>`;
  return `<div class="tech-tabs" role="tablist" aria-label="Technology categories">
    ${keys.map((k, i) => `<button class="tech-tab${i === 0 ? ' on' : ''}" role="tab" aria-selected="${i === 0}" data-tech="${esc(k)}">${esc(k)}</button>`).join('')}
  </div><div class="tech-chips" id="techChips" aria-live="polite"></div>`;
};

const tstBlock = () => DATA.testimonials?.length ? `
  <div class="tst-wrap" data-carousel>
    <div class="car-viewport"><div class="car-track">
      ${DATA.testimonials.map(t => `<div class="car-slide"><span class="qm" aria-hidden="true">"</span><blockquote>${t.q}</blockquote><div class="car-who"><span class="car-ava">${ic('user',22)}</span><span><b>${t.n}</b><span>${t.r}</span></span><span class="car-stars" aria-label="5 stars">${ic('star',14).repeat(5)}</span></div></div>`).join('')}
    </div></div>
    <div class="car-ctl"><button class="icon-btn" data-car-prev aria-label="Previous testimonial"><svg class="ic" style="transform:rotate(180deg)" width="18" height="18"><use href="#i-arrow-r"/></svg></button><div class="car-dots" role="tablist"></div><button class="icon-btn" data-car-next aria-label="Next testimonial"><svg class="ic" width="18" height="18"><use href="#i-arrow-r"/></svg></button></div>
  </div>` : `<div class="empty">Testimonials have not been published yet.</div>`;

const ctaBand = (h, p) => `
  <section class="sec"><div class="container">
    <div class="cta-band reveal"><div class="ticks"><i></i><i></i><i></i><i></i></div>
      <h2>${h}</h2><p>${p}</p>
      <div class="row">
        <a class="btn btn-p magnetic" href="#/contact"><span class="mag-in">Start a Project ${ic('arrow-r', 16)}</span></a>
        <a class="btn btn-g magnetic" href="#/portfolio"><span class="mag-in">Explore Our Work</span></a>
      </div>
    </div>
  </div></section>`;

const faqList = (items) => items.map((f, i) => `
  <div class="acc reveal" style="--d:${i * .05}s">
    <button class="acc-head" aria-expanded="false"><span>${f.q}</span>${ic('chev-d', 18)}</button>
    <div class="acc-body"><div class="acc-inner"><div>${f.a}</div></div></div>
  </div>`).join('');

const marquee = () => {
  const items = (DATA.services || []).map(x=>x.title).filter(Boolean);
  const safe = items.length ? items : ['Technology','Design','Engineering'];
  const seq = safe.map(t => `<span class="mq-item">${esc(t)}</span>`).join('');
  return `<div class="marquee" aria-hidden="true"><div class="mq-track">${seq}${seq}</div></div>`;
};

const artFeat = p => `
  <a class="art-feat" href="#/blog/${p.slug}">
    <div class="cov"><img loading="lazy" src="${contentImage(p,'1000/540')}" alt="${p.title} — cover"></div>
    <div class="art-body">
      <span class="art-meta"><span class="cat">${p.cat}</span><span>${p.date}</span><span>${p.read} read</span></span>
      <h3>${p.title}</h3><p>${p.excerpt}</p>
      <span class="art-meta"><span>By ${p.author}</span><span style="margin-left:auto;color:var(--accent)">Read →</span></span>
    </div>
  </a>`;

const artItem = p => `
  <a class="art-item" href="#/blog/${p.slug}">
    <img loading="lazy" src="${contentImage(p,'300/240')}" alt="${p.title} — cover">
    <span><span class="art-meta"><span class="cat">${p.cat}</span><span>${p.date}</span></span><h4>${p.title}</h4></span>
  </a>`;


/* ============ PUBLIC DATA GUARD ============ */
const FALLBACK_DATA = JSON.parse(JSON.stringify(DATA));
const asArray = v => Array.isArray(v) ? v : [];
const asObject = v => (v && typeof v === 'object' && !Array.isArray(v)) ? v : {};
function normalizePublicData(){
  const arrayKeys=['services','projects','process','pricing','posts','team','testimonials','jobs','faqs','stats','values','why'];
  arrayKeys.forEach(k=>{ if(!Array.isArray(DATA[k])) DATA[k]=JSON.parse(JSON.stringify(FALLBACK_DATA[k] || [])); });
  DATA.site=asObject(DATA.site); DATA.heroes=asObject(DATA.heroes); DATA.tech=asObject(DATA.tech); DATA.legal=asObject(DATA.legal);
  DATA.contactOptions=asObject(DATA.contactOptions);
  DATA.contactOptions.budgets=asArray(DATA.contactOptions.budgets);
  DATA.contactOptions.timelines=asArray(DATA.contactOptions.timelines);
  DATA.services=DATA.services.filter(Boolean).map((x,i)=>({...x, slug:x.slug||`service-${i+1}`, title:x.title||'Untitled Service', desc:x.desc||'', tags:asArray(x.tags), tech:asArray(x.tech), problems:asArray(x.problems), whatWeBuild:asArray(x.whatWeBuild), benefits:asArray(x.benefits)}));
  DATA.projects=DATA.projects.filter(Boolean).map((x,i)=>({...x, slug:x.slug||`project-${i+1}`, title:x.title||'Untitled Project', cat:x.cat||'Other', desc:x.desc||'', tech:asArray(x.tech), result:asArray(x.result).map(r=>Array.isArray(r)?r:[String(r||''),''])}));
  DATA.posts=DATA.posts.filter(Boolean).map((x,i)=>({...x, slug:x.slug||`post-${i+1}`, title:x.title||'Untitled Article', cat:x.cat||'Article', excerpt:x.excerpt||'', body:asArray(x.body).map(sec=>({h:sec?.h||'',ps:asArray(sec?.ps)}))}));
  DATA.team=DATA.team.filter(Boolean).map(x=>({...x,name:x.name||'Team Member',role:x.role||'',bio:x.bio||'',skills:asArray(x.skills)}));
  DATA.jobs=DATA.jobs.filter(Boolean).map(x=>({...x,t:x.t||x.title||'Position',type:x.type||'',loc:x.loc||'',desc:x.desc||'',resp:asArray(x.resp),req:asArray(x.req),benefits:asArray(x.benefits)}));
  DATA.pricing=DATA.pricing.filter(Boolean).map(x=>({...x,n:x.n||x.name||'Package',p:x.p||x.price||'',per:x.per||'',t:x.t||x.tagline||'',f:asArray(x.f)}));
  DATA.testimonials=DATA.testimonials.filter(Boolean).map(x=>({q:x.q||x.quote||'',n:x.n||x.name||'',r:x.r||x.role||''}));
  DATA.process=DATA.process.filter(Boolean).map((x,i)=>({...x,n:x.n||String(i+1).padStart(2,'0'),t:x.t||x.title||`Step ${i+1}`,d:x.d||x.desc||''}));
  DATA.values=DATA.values.filter(Boolean).map(x=>({...x,i:x.i||x.icon||'spark',t:x.t||x.title||'',d:x.d||x.desc||''}));
  DATA.why=DATA.why.filter(Boolean).map(x=>({...x,i:x.i||x.icon||'spark',t:x.t||x.title||'',d:x.d||x.desc||''}));
  Object.keys(DATA.tech).forEach(k=>{ DATA.tech[k]=asArray(DATA.tech[k]); });
}
normalizePublicData();

/* ============ HALAMAN: HOME ============ */
function pageHome() {
  const h = heroData('home','NEXARION — Technology & Digital Solutions','Building digital experiences for the next generation','NEXARION creates modern digital solutions, powerful websites, and intelligent technology experiences designed to help businesses grow in the digital era.');
  const sc = siteCopy();
  const feat = DATA.projects.slice(0, 3);
  const posts = DATA.posts.slice(0, 3);
  return `
  <section class="hero" id="hero">
    <div class="hero-bg" data-px="0.05" aria-hidden="true"></div>
    <div class="hero-glow" aria-hidden="true"></div>
    <div class="container hero-grid">
      <div class="hero-copy">
        <p class="kicker reveal">${esc(h.kicker)}</p>
        <h1 class="reveal" style="--d:.08s">${esc(h.title)}</h1>
        <p class="lead reveal" style="--d:.16s">${esc(h.subtitle)}</p>
        <div class="hero-cta reveal" style="--d:.24s">
          <a class="btn btn-p magnetic" href="#/contact"><span class="mag-in">Start a Project ${ic('arrow-r', 16)}</span></a>
          <a class="btn btn-g magnetic" href="#/portfolio"><span class="mag-in">Explore Our Work</span></a>
        </div>
        <div class="hero-meta mono reveal" style="--d:.32s">
          ${DATA.services.slice(0,3).map(x=>`<span>${esc(x.title)}</span>`).join('')}
        </div>
      </div>
      <div class="hero-visual reveal" style="--d:.2s">
        <div class="h3d" id="h3d" aria-label="Interactive 3D visualization — drag to rotate" role="img">
          <div class="ticks"><i></i><i></i><i></i><i></i></div>
          <div class="h3d-ctl">
            <button id="zin" aria-label="Zoom in">${ic('plus', 16)}</button>
            <button id="zout" aria-label="Zoom out">${ic('minus', 16)}</button>
            <button id="zreset" aria-label="Reset view">${ic('refresh', 15)}</button>
          </div>
          <span class="hint mono">${ic('drag', 14)} Drag to rotate</span>
        </div>
        <div class="f-chip fc1" data-depth="14">${ic('zap', 16)}<span>Performance-first<small>Fast, measurable builds</small></span></div>
        <div class="f-chip fc2" data-depth="22">${ic('layers', 16)}<span>Design + Engineering<small>One team, end to end</small></span></div>
      </div>
    </div>
    <button class="scroll-ind" id="scrollInd" aria-label="Scroll to content"><span>Scroll</span><i></i></button>
  </section>
  ${marquee()}
  ${statsBlock()}

  <section class="sec"><div class="container about-grid">
    <div>
      ${secHead('01 — About','We turn ideas into digital experiences',esc(heroData('about','','','NEXARION is a technology-driven company focused on modern digital solutions.').subtitle))}
      <ul class="vm-mini reveal">
        <li><b>Vision</b><p>${esc(sc.vision || '')}</p></li>
        <li><b>Mission</b><p>${esc(sc.mission || '')}</p></li>
      </ul>
      <a class="btn btn-g magnetic reveal" href="#/about"><span class="mag-in">Discover NEXARION ${ic('arrow-r', 16)}</span></a>
    </div>
    <div class="about-vis reveal" style="--d:.1s">
      <div class="ticks"><i></i><i></i><i></i><i></i></div>
      <div class="codebox" aria-hidden="true">
        <span class="k">const</span> nexarion = {<br>
        &nbsp;&nbsp;focus: <span class="k">'your business goals'</span>,<br>
        &nbsp;&nbsp;stack: [<span class="k">'design'</span>, <span class="k">'engineering'</span>],<br>
        &nbsp;&nbsp;process: <span class="k">'transparent'</span>,<br>
        &nbsp;&nbsp;support: <span class="k">'long-term'</span><br>
        };
      </div>
      <div class="float-card fc-a" data-px="0.08"><b>100%</b><span>In-house design & engineering</span></div>
      <div class="float-card fc-b" data-px="-0.05"><b>7 Steps</b><span>Transparent delivery process</span></div>
    </div>
  </div></section>

  <section class="sec" style="background:var(--bg2)"><div class="container">
    ${secHead('02 — Services', 'What we <span class="tx-acc">build</span>', 'Five focused practices. One goal: technology designed around your business.')}
    <div class="svc-list">${DATA.services.map(serviceRow).join('')}</div>
  </div></section>

  <section class="sec"><div class="container">
    ${secHead('03 — Why NEXARION', 'Why teams <span class="tx-acc">choose us</span>')}
    <div class="why-grid">
      ${DATA.why.map((w, i) => `
        <div class="why-item reveal" style="--d:${i * .06}s">
          <div class="top"><span class="mono">0${i + 1}</span>${ic(w.i, 22)}</div>
          <h3>${w.t}</h3><p>${w.d}</p>
        </div>`).join('')}
    </div>
  </div></section>

  <section class="sec" style="background:var(--bg2)"><div class="container">
    ${secHead('04 — Selected Work', 'Featured <span class="tx-acc">projects</span>', 'Selected projects and case studies managed directly from the Admin Control Center.')}
    <div class="work-grid">${feat.map((p, i) => workCard(p, i)).join('')}</div>
    <div style="margin-top:2.6rem;text-align:center"><a class="btn btn-g magnetic" href="#/portfolio"><span class="mag-in">View All Projects ${ic('arrow-r', 16)}</span></a></div>
  </div></section>

  <section class="sec"><div class="container">
    ${secHead('05 — Process', 'How we <span class="tx-acc">work</span>', 'Seven transparent stages — you always know where your project stands.')}
    ${processBlock()}
    <div style="margin-top:2.4rem"><a class="btn btn-g magnetic" href="#/process"><span class="mag-in">See the Full Process ${ic('arrow-r', 16)}</span></a></div>
  </div></section>

  <section class="sec" style="background:var(--bg2)"><div class="container">
    ${secHead('06 — Technology', 'Our technology <span class="tx-acc">ecosystem</span>', 'Proven tools across the stack — selected per project, never one-size-fits-all.', true)}
    ${techBlock()}
  </div></section>

  <section class="sec"><div class="container">
    ${secHead('07 — Testimonials', 'What clients <span class="tx-acc">say</span>', '', true)}
    ${tstBlock()}
  </div></section>

  ${ctaBand('Have an idea? <span class="tx-acc">Let\'s build it.</span>', 'Tell us about your project — we will respond within one business day with an honest assessment and a clear next step.')}

  <section class="sec" style="padding-top:0"><div class="container">
    ${secHead('08 — Insights', 'Latest <span class="tx-acc">articles</span>')}
    ${posts.length ? `<div class="art-grid">${artFeat(posts[0])}<div class="art-list">${posts.slice(1).map((p,i)=>artItem(p).replace('class="art-item"',`class="art-item reveal" style="--d:${(i+1)*.08}s"`)).join('')}</div></div>` : `<div class="empty">No published articles yet.</div>`}
    <div style="margin-top:2.4rem;text-align:center"><a class="btn btn-g magnetic" href="#/blog"><span class="mag-in">Read the Blog ${ic('arrow-r', 16)}</span></a></div>
  </div></section>

  <section class="sec" style="padding-top:0"><div class="container">
    <div class="cta-band reveal" style="text-align:left"><div class="ticks"><i></i><i></i><i></i><i></i></div>
      <p class="kicker" style="margin-bottom:1rem">09 — Contact</p>
      <h2 style="margin-inline:0;max-width:none">Let's build something <span class="tx-acc">great together</span></h2>
      <p style="margin-inline:0">Ready when you are — reach out and tell us what you want to build.</p>
      <div class="row" style="justify-content:flex-start">
        <a class="btn btn-p magnetic" href="#/contact"><span class="mag-in">Contact Us ${ic('arrow-r', 16)}</span></a>
        <a class="btn btn-g magnetic" data-company-email href="mailto:${SITE_SETTINGS.email}"><span class="mag-in">${ic('mail',16)} ${esc(SITE_SETTINGS.email)}</span></a>
      </div>
    </div>
  </div></section>`;
}

/* ============ HALAMAN: ABOUT ============ */
function pageAbout() {
  const sc = siteCopy();
  return `
  ${syncedHero('about','01 — About Us','We turn ideas into digital experiences','NEXARION is a technology-driven company focused on creating modern digital solutions that combine design, technology, usability, and business objectives.')}
  <section class="sec" style="padding-top:20px"><div class="container two-col">
    <div class="side-sticky">
      <div class="panel reveal"><div class="ticks"><i></i><i></i><i></i><i></i></div>
        <h3>At a Glance</h3>
        <div class="mini-facts" style="margin-top:0">
          <div><span>Founded</span><b>${esc(sc.founded || '—')}</b></div>
          <div><span>Team</span><b>${esc(sc.teamSize || String(DATA.team.length))}</b></div>
          <div><span>Focus</span><b>${esc(sc.focus || 'Web & Software')}</b></div>
          <div><span>Based in</span><b>${esc(sc.city || '—')}</b></div>
        </div>
      </div>
    </div>
    <div class="prose">
      <h2 class="reveal">Our Story</h2>
      <p class="reveal">${esc(sc.story1 || '')}</p>
      <p class="reveal">${esc(sc.story2 || '')}</p>
      <div class="mini-facts reveal">
        <div><span>Vision</span><b style="font-weight:500;font-size:.9rem;color:var(--muted)">${esc(sc.vision || '')}</b></div>
        <div><span>Mission</span><b style="font-weight:500;font-size:.9rem;color:var(--muted)">${esc(sc.mission || '')}</b></div>
      </div>
      <h2 class="reveal">Core Values</h2>
      <div class="why-grid" style="grid-template-columns:1fr 1fr">
        ${DATA.values.map((v, i) => `
          <div class="why-item reveal" style="--d:${i * .06}s">
            <div class="top">${ic(v.i, 22)}</div><h3>${v.t}</h3><p>${v.d}</p>
          </div>`).join('')}
      </div>
      <div class="reveal" style="margin-top:2.5rem;display:flex;gap:.9rem;flex-wrap:wrap">
        <a class="btn btn-p magnetic" href="#/team"><span class="mag-in">Meet the Team ${ic('arrow-r', 16)}</span></a>
        <a class="btn btn-g magnetic" href="#/careers"><span class="mag-in">Join Us ${ic('arrow-r', 16)}</span></a>
      </div>
    </div>
  </div></section>
  ${ctaBand('Want to work with a team like this?', 'Start with a conversation — no obligations, no sales pressure.')}`;
}

/* ============ HALAMAN: TEAM ============ */
function pageTeam() {
  return `
  ${syncedHero('team','Our Team','The people behind the work','Meet the people responsible for strategy, design, engineering, and delivery.')}
  <section class="sec" style="padding-top:20px"><div class="container">
    <div class="team-grid">
      ${DATA.team.map((m, i) => `
        <div class="team-card reveal" style="--d:${i * .07}s">
          <div class="team-ava" style="overflow:hidden">${m.img ? `<img src="${m.img}" alt="${esc(m.name)}" style="width:100%;height:100%;object-fit:cover">` : `0${i + 1}`}</div>
          <h3>${m.name}</h3><p class="role">${m.role}</p>
          <p>${m.bio}</p>
          <div class="skills">${m.skills.map(s => `<span>${s}</span>`).join('')}</div>
          <div class="team-soc">
            ${m.linkedin ? `<a class="icon-btn" href="${m.linkedin}" target="_blank" rel="noopener noreferrer" aria-label="${m.name} LinkedIn">${ic('li',16)}</a>` : ''}
            ${m.instagram ? `<a class="icon-btn" href="${m.instagram}" target="_blank" rel="noopener noreferrer" aria-label="${m.name} Instagram">${ic('ig',16)}</a>` : ''}
          </div>
        </div>`).join('')}
    </div>
  </div></section>
  ${ctaBand('Want to be part of this team?', 'We are hiring across engineering, design, and delivery.')}`;
}

/* ============ HALAMAN: SERVICES ============ */
function pageServices() {
  return `
  ${syncedHero('services','Services','Technology designed around your business','From your first landing page to complex internal systems — explore what we build and how each service works.')}
  <section class="sec" style="padding-top:20px"><div class="container">
    <div class="svc-list">${DATA.services.map(serviceRow).join('')}</div>
  </div></section>
  ${ctaBand('Not sure which service fits?', 'Describe your problem — we will recommend the right approach, even if it is not ours.')}`;
}

/* ============ HALAMAN: SERVICE DETAIL ============ */
function pageServiceDetail(slug) {
  const s = DATA.services.find(x => x.slug === slug);
  if (!s) return null;
  return `
  ${pageHero(`Service ${s.num}`, s.title, s.desc, '#/services', 'All Services')}
  <section class="sec" style="padding-top:20px"><div class="container two-col">
    <aside class="side-sticky reveal">
      <div class="panel">
        <h3>Key Features</h3>
        <ul class="check-list">${s.tags.map(t => `<li>${ic('check', 16)}${t}</li>`).join('')}</ul>
        <div style="margin-top:1.4rem"><a class="btn btn-p magnetic" style="width:100%;justify-content:center" href="#/contact"><span class="mag-in">Request a Quote ${ic('arrow-r', 15)}</span></a></div>
      </div>
    </aside>
    <div class="prose">
      <h2 class="reveal">Overview</h2>
      <p class="reveal">${s.overview}</p>
      <h2 class="reveal">Problems We Solve</h2>
      <ul class="reveal num-list" style="margin:0 0 1.2rem">${s.problems.map(p => `<li style="counter-increment:none"><span class="mono" style="color:var(--accent)">→</span>${p}</li>`).join('')}</ul>
      <h2 class="reveal">Our Solution</h2>
      <p class="reveal">${s.solution}</p>
      <h2 class="reveal">What We Build</h2>
      <ul class="reveal check-list">${s.whatWeBuild.map(w => `<li>${ic('check', 16)}${w}</li>`).join('')}</ul>
      <h2 class="reveal">Technology</h2>
      <ul class="svc-tags reveal" style="margin-bottom:1rem">${s.tech.map(t => `<li>${t}</li>`).join('')}</ul>
      <h2 class="reveal">Development Process</h2>
      ${processBlock()}
      <h2 class="reveal">Benefits</h2>
      <ul class="reveal check-list">${s.benefits.map(b => `<li>${ic('check', 16)}${b}</li>`).join('')}</ul>
      <h2 class="reveal">FAQ</h2>
      ${faqList(DATA.faqs.slice(0, 3))}
      <div class="cta-band reveal" style="margin-top:2.5rem;text-align:left"><div class="ticks"><i></i><i></i><i></i><i></i></div>
        <h2 style="margin-inline:0;max-width:none;font-size:clamp(1.4rem,3vw,2rem)">Interested in <span class="tx-acc">${s.title}</span>?</h2>
        <p style="margin-inline:0">Tell us about your project — we will get back within one business day.</p>
        <div class="row" style="justify-content:flex-start">
          <a class="btn btn-p magnetic" href="#/contact"><span class="mag-in">Start a Project ${ic('arrow-r', 16)}</span></a>
        </div>
      </div>
    </div>
  </div></section>`;
}

/* ============ HALAMAN: PORTFOLIO ============ */
function pagePortfolio() {
  const cats = ['All', ...new Set(DATA.projects.map(p=>p.cat).filter(Boolean))];
  return `
  ${syncedHero('portfolio','Portfolio','Work that speaks in results','Case studies, products, and digital experiences delivered across different business needs.')}
  <section class="sec" style="padding-top:24px"><div class="container">
    <div class="chips scroll-x" role="group" aria-label="Filter projects">
      ${cats.map((c, i) => `<button class="chip${i === 0 ? ' on' : ''}" data-filter="${c}">${c}</button>`).join('')}
    </div>
    <div class="work-grid" id="workGrid" style="margin-top:2.2rem">
      ${DATA.projects.map((p, i) => workCard(p, i, (i === 3 || i === 5) ? 'down' : '')).join('')}
    </div>
    <div class="empty" id="workEmpty" hidden>No projects in this category yet — check back soon.</div>
  </div></section>
  ${ctaBand('Your project could be next.', 'Tell us what you want to build — we will show you how we would approach it.')}`;
}

/* ============ HALAMAN: CASE STUDY ============ */
function pageProject(slug) {
  const p = DATA.projects.find(x => x.slug === slug);
  if (!p) return null;
  const rel = DATA.projects.filter(x => x.slug !== slug).slice(0, 2);
  return `
  ${pageHero('Case Study', p.title, p.desc, '#/portfolio', 'Portfolio')}
  <section class="sec" style="padding-top:20px"><div class="container two-col">
    <aside class="side-sticky reveal">
      <div class="panel"><div class="ticks"><i></i><i></i><i></i><i></i></div>
        <h3>Project Overview</h3>
        <div class="mini-facts" style="margin-top:0">
          <div><span>Client</span><b>${p.client || '—'}</b></div>
          <div><span>Category</span><b>${p.cat}</b></div>
          <div><span>Year</span><b>${p.year}</b></div>
          <div><span>Status</span><b>${p.status || 'Completed'}</b></div>
        </div>
        <h3 style="margin-top:1.6rem">Technology</h3>
        <ul class="svc-tags">${p.tech.map(t => `<li>${t}</li>`).join('')}</ul>
        <h3 style="margin-top:1.6rem">Results</h3>
        <div class="mini-facts" style="margin-top:0">
          ${p.result.map(r => `<div><span>${r[0]}</span><b>${r[1]}</b></div>`).join('')}
        </div>
      </div>
    </aside>
    <div class="prose">
      <div class="work reveal" style="aspect-ratio:16/9;margin-bottom:2.2rem">
        <img src="${projectImage(p, '1200/680')}" alt="${p.title} — hero preview">
      </div>
      <h2 class="reveal">The Challenge</h2><p class="reveal">${p.challenge}</p>
      <h2 class="reveal">Research</h2><p class="reveal">${p.research}</p>
      <h2 class="reveal">Strategy</h2><p class="reveal">${p.strategy}</p>
      <h2 class="reveal">Design</h2><p class="reveal">${p.design}</p>
      <h2 class="reveal">Development</h2><p class="reveal">${p.development}</p>
      <h2 class="reveal">The Solution</h2><p class="reveal">${p.desc} ${p.development}</p>
      <h2 class="reveal">Gallery</h2>
      <div class="gal reveal">
        <img loading="lazy" src="https://picsum.photos/seed/${p.seed}-g1/600/450.jpg" alt="${p.title} — gallery 1">
        <img loading="lazy" src="https://picsum.photos/seed/${p.seed}-g2/600/450.jpg" alt="${p.title} — gallery 2">
        <img loading="lazy" src="https://picsum.photos/seed/${p.seed}-g3/600/450.jpg" alt="${p.title} — gallery 3">
      </div>
      <div class="reveal" style="margin-top:2.6rem;display:flex;gap:.9rem;flex-wrap:wrap">
        ${p.link ? `<a class="btn btn-p magnetic" href="${p.link}" target="_blank" rel="noopener noreferrer"><span class="mag-in">Visit Project ${ic('arrow-ur',16)}</span></a>` : `<a class="btn btn-p magnetic" href="#/contact"><span class="mag-in">Start a Similar Project ${ic('arrow-r', 16)}</span></a>`}
        <a class="btn btn-g magnetic" href="#/portfolio"><span class="mag-in">More Projects</span></a>
      </div>
      <h2 class="reveal" style="margin-top:3rem">Related Case Studies</h2>
      <div class="work-grid reveal" style="grid-template-columns:1fr 1fr">
        ${rel.map(r => workCard(r, 0)).join('')}
      </div>
    </div>
  </div></section>`;
}

/* ============ HALAMAN: PROCESS ============ */
function pageProcess() {
  return `
  ${syncedHero('process','Our Process','A clear path from idea to launch','A transparent delivery framework. You always know what stage your project is in, what happens next, and what we need from you.')}
  <section class="sec" style="padding-top:20px"><div class="container">
    ${processBlock()}
    <div class="two-col" style="margin-top:4rem">
      <div class="prose reveal"><h2 style="margin-top:0">Why a fixed process?</h2><p>Because surprises are expensive. A clear process turns an ambiguous "we need a website" into a sequence of decisions everyone understands — scope, timeline, and responsibilities included.</p><p>It also protects you: each stage ends with something you review and approve before we move forward. Nothing is built twice, and nothing is built in the dark.</p></div>
      <div class="panel reveal"><div class="ticks"><i></i><i></i><i></i><i></i></div>
        <h3>What you get at each stage</h3>
        <ul class="check-list">${DATA.process.map(x=>`<li>${ic('check',16)}${esc(x.t)} — ${esc(x.d)}</li>`).join('')}</ul>
      </div>
    </div>
  </div></section>
  ${ctaBand('Ready for step one?', 'Book a discovery session — it is free and refreshingly honest.')}`;
}

/* ============ HALAMAN: PRICING ============ */
function pagePricing() {
  return `
  ${syncedHero('pricing','Pricing','Clear packages, honest scope','Choose a starting package or request a custom estimate for more complex requirements.')}
  <section class="sec" style="padding-top:30px"><div class="container">
    <div class="price-grid">
      ${DATA.pricing.map((p, i) => `
        <div class="price-card reveal${p.hot ? ' hot' : ''}" style="--d:${i * .08}s">
          ${p.hot ? '<span class="price-badge">Most Popular</span>' : ''}
          <span class="pn">${p.n}</span>
          <div class="pv">${p.p} <small>${p.per}</small></div>
          <p class="pt">${p.t}</p>
          <ul class="check-list">${p.f.map(f => `<li>${ic('check', 16)}${f}</li>`).join('')}</ul>
          <a class="btn ${p.hot ? 'btn-p' : 'btn-g'} magnetic" href="#/contact"><span class="mag-in">Request a Quote</span></a>
        </div>`).join('')}
    </div>

  </div></section>
  ${ctaBand('Every project starts with a conversation.', 'Tell us your goal and budget — we will tell you honestly what it takes.')}`;
}

/* ============ HALAMAN: BLOG ============ */
function pageBlog() {
  const cats = ['All', ...new Set(DATA.posts.map(p=>p.cat).filter(Boolean))];
  return `
  ${syncedHero('blog','Blog','Insights from the workshop','Practical writing on technology, design, and digital business.')}
  <section class="sec" style="padding-top:24px"><div class="container">
    <div class="blog-tools">
      <div class="search-box">${ic('search', 17)}<input type="search" data-blog-search placeholder="Search articles…" aria-label="Search articles"></div>
      <div class="chips scroll-x" role="group" aria-label="Filter by category">
        ${cats.map((c, i) => `<button class="chip${i === 0 ? ' on' : ''}" data-bcat="${c}">${c}</button>`).join('')}
      </div>
    </div>
    <div class="art-grid" id="blogList"></div>
    <div class="empty" id="blogEmpty" hidden style="margin-top:1rem">No articles match your search — try a different keyword or category.</div>
  </div></section>
  ${ctaBand('Have a topic you want us to cover?', 'Or a project you want us to build? Either way — write to us.')}`;
}

/* ============ HALAMAN: BLOG DETAIL ============ */
function pagePost(slug) {
  const p = DATA.posts.find(x => x.slug === slug);
  if (!p) return null;
  const rel = DATA.posts.filter(x => x.slug !== slug).slice(0, 2);
  return `
  <article>
  ${pageHero(p.cat, p.title, '', '#/blog', 'Blog')}
  <section class="sec" style="padding-top:10px"><div class="container prose">
    <div class="art-meta reveal" style="margin-bottom:1.6rem;font-size:.8rem"><span class="cat">${p.cat}</span><span>${p.date}</span><span>By ${p.author}</span><span>${p.read} read</span></div>
    <div class="work reveal" style="aspect-ratio:16/8;margin-bottom:2.4rem"><img src="${contentImage(p,'1200/600')}" alt="${p.title} — cover image"></div>
    ${p.body.map(s => `<h2 class="reveal">${s.h}</h2>${s.ps.map(x => `<p class="reveal">${x}</p>`).join('')}`).join('')}
    <div class="cta-band reveal" style="margin-top:2.6rem;text-align:left"><div class="ticks"><i></i><i></i><i></i><i></i></div>
      <h2 style="margin-inline:0;max-width:none;font-size:clamp(1.4rem,3vw,2rem)">Want this done for your business?</h2>
      <p style="margin-inline:0">We apply everything we write about — start a conversation and see.</p>
      <div class="row" style="justify-content:flex-start"><a class="btn btn-p magnetic" href="#/contact"><span class="mag-in">Start a Project ${ic('arrow-r', 16)}</span></a></div>
    </div>
    <h2 class="reveal" style="margin-top:3rem">Related Articles</h2>
    <div class="art-grid reveal" style="grid-template-columns:1fr 1fr;align-items:stretch">
      ${rel.map(r => artFeat(r)).join('')}
    </div>
  </div></section>
  </article>`;
}

/* ============ HALAMAN: CAREERS ============ */
function pageCareers() {
  return `
  ${syncedHero('careers','Careers','Join the next generation of builders','We hire for craft, curiosity, and honesty. If you build things carefully and communicate clearly, talk to us.')}
  <section class="sec" style="padding-top:20px"><div class="container" style="max-width:900px">
    <h2 class="reveal" style="font-size:1.3rem;text-transform:uppercase;margin-bottom:1.4rem">Open Positions — ${DATA.jobs.length}</h2>
    ${DATA.jobs.map((j, i) => `
      <div class="acc reveal" style="--d:${i * .05}s">
        <button class="acc-head job-head" aria-expanded="false">
          <span style="display:flex;align-items:center;gap:1rem">${ic('brief', 20)}<h3>${j.t}</h3></span>
          <span class="job-tags"><span>${j.type}</span><span>${j.loc}</span></span>
          ${ic('chev-d', 18)}
        </button>
        <div class="acc-body"><div class="acc-inner"><div>
          <p>${j.desc}</p>
          <h4 style="font-family:var(--font-d);text-transform:uppercase;font-size:.85rem;margin:1.2rem 0 .4rem;color:var(--accent)">Responsibilities</h4>
          <ul class="check-list">${j.resp.map(r => `<li>${ic('check', 15)}${r}</li>`).join('')}</ul>
          <h4 style="font-family:var(--font-d);text-transform:uppercase;font-size:.85rem;margin:1.2rem 0 .4rem;color:var(--accent)">Requirements</h4>
          <ul class="check-list">${j.req.map(r => `<li>${ic('check', 15)}${r}</li>`).join('')}</ul>
          <h4 style="font-family:var(--font-d);text-transform:uppercase;font-size:.85rem;margin:1.2rem 0 .4rem;color:var(--accent)">Benefits</h4>
          ${j.benefits?.length ? `<ul class="check-list">${j.benefits.map(x=>`<li>${ic('check',15)}${esc(x)}</li>`).join('')}</ul>` : `<p>${esc(siteCopy().careersBenefits || '')}</p>`}
          <button class="btn btn-p btn-sm apply-btn" data-job="${j.t}" style="margin-top:1.2rem">Apply for this Position ${ic('arrow-r', 15)}</button>
        </div></div></div>
      </div>`).join('')}
  </div></section>
  ${ctaBand('Don\'t see your role?', 'If you are exceptional at what you do, we want to hear from you anyway.')}`;
}

/* ============ HALAMAN: FAQ ============ */
function pageFAQ() {
  return `
  ${syncedHero('faq','FAQ','Questions, answered','The things clients ask most before starting a project. Something missing? Just ask us directly.')}
  <section class="sec" style="padding-top:20px"><div class="container" style="max-width:820px">
    ${faqList(DATA.faqs)}
  </div></section>
  ${ctaBand('Still have questions?', 'We reply within one business day — promise.')}`;
}

/* ============ HALAMAN: CONTACT ============ */
function pageContact() {
  const svcOpts = [...DATA.services.map(s => s.title), 'Other / Not sure yet'];
  const budgets = DATA.contactOptions?.budgets?.length ? DATA.contactOptions.budgets : ['Not sure yet'];
  const timelines = DATA.contactOptions?.timelines?.length ? DATA.contactOptions.timelines : ['Flexible'];
  return `
  ${syncedHero('contact','Contact',"Let's build something great together",'Fill in the project brief below — the more context you give, the sharper our first response will be.')}
  <section class="sec" style="padding-top:20px"><div class="container contact-grid">
    <div class="reveal">
      <ul class="c-list">
        <li>${ic('mail', 19)}<div><span>Email</span><b>${SITE_SETTINGS.email}</b></div></li>
        <li>${ic('chat', 19)}<div><span>WhatsApp</span><b>${SITE_SETTINGS.whatsapp}</b></div></li>
        <li>${ic('ig', 19)}<div><span>Instagram</span><b>${SITE_SETTINGS.instagram}</b></div></li>
        <li>${ic('li', 19)}<div><span>LinkedIn</span><b>${SITE_SETTINGS.linkedin}</b></div></li>
        <li>${ic('pin', 19)}<div><span>Office</span><b>${SITE_SETTINGS.address}</b></div></li>
        <li>${ic('clock', 19)}<div><span>Business Hours</span><b>${SITE_SETTINGS.hours}</b></div></li>
      </ul>
    </div>
    <div class="panel reveal" style="--d:.1s"><div class="ticks"><i></i><i></i><i></i><i></i></div>
      <form data-form="contact" novalidate>
        <div class="form-grid">
          <div class="field"><label for="cf-name">Full Name <b>*</b></label><input id="cf-name" name="name" data-req autocomplete="name"><span class="f-err">Please enter your name.</span></div>
          <div class="field"><label for="cf-email">Email <b>*</b></label><input id="cf-email" name="email" type="email" data-req data-type="email" autocomplete="email"><span class="f-err">Please enter a valid email address.</span></div>
          <div class="field"><label for="cf-phone">Phone / WhatsApp <b>*</b></label><input id="cf-phone" name="phone" data-req data-type="phone" inputmode="tel" placeholder="+62 …"><span class="f-err">Please enter a valid phone number.</span></div>
          <div class="field"><label for="cf-company">Company</label><input id="cf-company" name="company" autocomplete="organization"></div>
          <div class="field"><label for="cf-service">Service Needed <b>*</b></label>
            <select id="cf-service" name="service" data-req><option value="">Select a service…</option>${svcOpts.map(s => `<option>${s}</option>`).join('')}</select>
            <span class="f-err">Please choose a service.</span></div>
          <div class="field"><label for="cf-budget">Estimated Budget</label>
            <select id="cf-budget" name="budget"><option value="">Select…</option>${budgets.map(x=>`<option>${esc(x)}</option>`).join('')}</select></div>
          <div class="field"><label for="cf-timeline">Project Timeline</label>
            <select id="cf-timeline" name="timeline"><option value="">Select…</option>${timelines.map(x=>`<option>${esc(x)}</option>`).join('')}</select></div>
          <div class="field"><label for="cf-ref">Reference Website</label><input id="cf-ref" name="reference" type="url" placeholder="https://…"></div>
          <div class="field full"><label for="cf-msg">Project Description <b>*</b></label><textarea id="cf-msg" name="message" data-req data-min="20" placeholder="What do you want to build? What problem should it solve?"></textarea><span class="f-err">Please describe your project (min. 20 characters).</span></div>
        </div>
        <button type="submit" class="btn btn-p magnetic" style="margin-top:1.4rem;width:100%;justify-content:center"><span class="mag-in">Send Project Inquiry ${ic('send', 15)}</span></button>
        <p class="footnote" style="margin-top:.9rem">By submitting, you agree to our <a href="#/privacy" style="color:var(--accent)">Privacy Policy</a>.</p>
      </form>
    </div>
  </div></section>`;
}

/* ============ HALAMAN: LEGAL ============ */
function pageLegal(kind) {
  const doc = DATA.legal?.[kind];
  const title = doc?.title || (kind === 'privacy' ? 'Privacy Policy' : kind === 'cookies' ? 'Cookie Policy' : 'Terms & Conditions');
  const intro = doc?.intro || 'This document is managed from the NEXARION Admin Control Center.';
  const sections = Array.isArray(doc?.sections) ? doc.sections : [];
  return `
  ${pageHero('Legal', esc(title), esc(intro))}
  <section class="sec" style="padding-top:20px"><div class="container prose" style="max-width:800px">
    <p class="reveal">Last updated: ${esc(doc?.updated || '—')}</p>
    ${sections.length ? sections.map(x => `<h2 class="reveal">${esc(x[0] || '')}</h2><p class="reveal">${esc(x[1] || '')}</p>`).join('') : `<p class="reveal">Legal content has not been published yet.</p>`}
  </div></section>`;
}

/* ============ HALAMAN: 404 ============ */
function page404() {
  return `
  <section class="p404"><div class="hero-bg" aria-hidden="true"></div>
    <div class="container">
      <p class="kicker" style="justify-content:center">Error 404</p>
      <div class="big reveal" aria-hidden="true">4<b>0</b>4</div>
      <h1 class="reveal" style="font-size:clamp(1.4rem,3vw,2rem);text-transform:uppercase;margin:.5rem 0 1rem">Page Not Found</h1>
      <p class="lead reveal" style="margin:0 auto 2rem;text-align:center">Looks like this digital path doesn't exist.</p>
      <div class="reveal"><a class="btn btn-p magnetic" href="#/"><span class="mag-in">Back to Home ${ic('arrow-r', 16)}</span></a></div>
    </div>
  </section>`;
}

/* ============ ROUTER ============ */
const ROUTES = {
  '': ['Home', pageHome],
  'about': ['About', pageAbout],
  'team': ['Team', pageTeam],
  'services': ['Services', pageServices],
  'portfolio': ['Portfolio', pagePortfolio],
  'process': ['Process', pageProcess],
  'pricing': ['Pricing', pagePricing],
  'blog': ['Blog', pageBlog],
  'careers': ['Careers', pageCareers],
  'faq': ['FAQ', pageFAQ],
  'contact': ['Contact', pageContact],
  'privacy': ['Privacy Policy', () => pageLegal('privacy')],
  'terms': ['Terms & Conditions', () => pageLegal('terms')],
  'cookies': ['Cookie Policy', () => pageLegal('cookies')]
};
let cleanups = [];
const addCleanup = fn => cleanups.push(fn);

function currentRoute() {
  const raw = location.hash.replace(/^#\/?/, '');
  return raw.split('/').filter(Boolean);
}
function render() {
  cleanups.forEach(fn => { try { fn(); } catch (e) {} });
  cleanups = [];
  const seg = currentRoute();
  let title = 'NEXARION — Technology & Digital Solutions';
  let html = null;
  const key = seg[0] || '';
  if (seg.length === 0) {
    html = pageHome();
  } else if (seg.length === 1 && ROUTES[key]) {
    const r = ROUTES[key];
    title = `NEXARION — ${r[0]}`;
    html = r[1]();
  } else if (seg[0] === 'services' && seg[1]) {
    html = pageServiceDetail(seg[1]);
    if (html) {
      const svc = DATA.services.find(x => x.slug === seg[1]);
      title = `NEXARION — ${svc ? svc.title : 'Service'}`;
    }
  } else if (seg[0] === 'portfolio' && seg[1]) {
    html = pageProject(seg[1]);
    if (html) title = 'NEXARION — Case Study';
  } else if (seg[0] === 'blog' && seg[1]) {
    html = pagePost(seg[1]);
    if (html) title = 'NEXARION — Blog';
  }
  if (html === null) { html = page404(); title = '404 — NEXARION'; }

  $('#main').innerHTML = html;
  document.title = title;
  window.scrollTo(0, 0);
  $$('.nav-links a, .mmenu .mlink').forEach(a => {
    const on = a.dataset.nav === key || (key === '' && a.dataset.nav === 'home');
    a.classList.toggle('on', on);
  });
  $('#mmenu').classList.remove('open');
  $('#burger').classList.remove('open');
  document.body.style.overflow = '';
  // Apply content/settings first so enhancement failures never blank the page.
  applySiteSettings();
  try { initCommon(); }
  catch (enhanceErr) { console.error('Non-critical UI enhancement failed:', enhanceErr); }
}
window.addEventListener('hashchange', render);

/* ============ INTERAKSI GLOBAL ============ */
const header = $('#header'), progress = $('#progress'), toTop = $('#toTop');
let pxItems = [], ticking = false;

function onScroll() {
  const y = scrollY, max = document.documentElement.scrollHeight - innerHeight;
  header.classList.toggle('scrolled', y > 24);
  toTop.classList.toggle('show', y > 600);
  progress.style.width = (max > 0 ? (y / max) * 100 : 0) + '%';
  if (!REDUCED) {
    const vh = innerHeight;
    pxItems.forEach(el => {
      const r = el.getBoundingClientRect();
      if (r.bottom < -100 || r.top > vh + 100) return;
      const speed = parseFloat(el.dataset.px);
      const off = (r.top + r.height / 2 - vh / 2) * -speed;
      el.style.transform = `translate3d(0, ${off.toFixed(1)}px, 0)`;
    });
  }
  const pl = $('[data-procline]');
  if (pl) {
    const r = pl.getBoundingClientRect(), vh = innerHeight;
    const p = Math.min(1, Math.max(0, (vh * .85 - r.top) / (r.height + vh * .3)));
    const line = pl.querySelector('.proc-line');
    if (line) line.style.width = (p * 100) + '%';
    $$('.proc-item', pl).forEach(it => it.classList.toggle('lit', it.offsetLeft < p * pl.offsetWidth));
  }
  ticking = false;
}
addEventListener('scroll', () => { if (!ticking) { requestAnimationFrame(onScroll); ticking = true; } }, { passive: true });
toTop.addEventListener('click', () => scrollTo({ top: 0, behavior: REDUCED ? 'auto' : 'smooth' }));

function observeReveals(root) {
  const obs = new IntersectionObserver(es => es.forEach(e => {
    if (e.isIntersecting) { e.target.classList.add('in'); obs.unobserve(e.target); }
  }), { threshold: .12, rootMargin: '0px 0px -6% 0px' });
  $$('.reveal', root).forEach(el => obs.observe(el));
  addCleanup(() => obs.disconnect());
}
function initCounters(root) {
  const obs = new IntersectionObserver(es => es.forEach(e => {
    if (!e.isIntersecting) return;
    const el = e.target, to = +el.dataset.to, t0 = performance.now(), dur = 1500;
    obs.unobserve(el);
    if (REDUCED) { el.textContent = to; return; }
    (function tick(t) {
      const p = Math.min(1, (t - t0) / dur), ease = 1 - Math.pow(1 - p, 3);
      el.textContent = Math.round(to * ease);
      if (p < 1) requestAnimationFrame(tick);
    })(t0);
  }), { threshold: .4 });
  $$('.count', root).forEach(el => obs.observe(el));
  addCleanup(() => obs.disconnect());
}
function initTilt(root) {
  if (!FINE || REDUCED) return;
  /* .work.down dikecualikan agar tidak konflik dengan offset translateY-nya */
  $$('[data-tilt], .work:not(.down), .price-card, .team-card, .about-vis', root).forEach(card => {
    card.addEventListener('pointermove', e => {
      if (e.pointerType !== 'mouse') return;
      const r = card.getBoundingClientRect();
      const x = (e.clientX - r.left) / r.width - .5, y = (e.clientY - r.top) / r.height - .5;
      card.style.transform = `perspective(900px) rotateY(${(x * 5).toFixed(2)}deg) rotateX(${(-y * 5).toFixed(2)}deg) translateY(-3px)`;
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
      inner.style.transform = `translate(${((e.clientX - r.left - r.width / 2) * .28).toFixed(1)}px, ${((e.clientY - r.top - r.height / 2) * .34).toFixed(1)}px)`;
    });
    btn.addEventListener('pointerleave', () => { inner.style.transform = ''; });
  });
}
function initAccordion(root) {
  $$('.acc-head', root).forEach(h => h.addEventListener('click', () => {
    const acc = h.closest('.acc'), open = acc.classList.toggle('open');
    h.setAttribute('aria-expanded', open);
  }));
}
function initTech(root) {
  const chips = $('#techChips', root);
  if (!chips) return;
  const keys = Object.keys(DATA.tech || {}); if (!keys.length) return;
  const renderChips = k => { chips.innerHTML = (DATA.tech[k] || []).map((t,i)=>`<span style="animation-delay:${i*.05}s">${esc(t)}</span>`).join(''); };
  renderChips(keys[0]);
  $$('.tech-tab', root).forEach(b => b.addEventListener('click', () => {
    $$('.tech-tab', root).forEach(x => { x.classList.remove('on'); x.setAttribute('aria-selected', 'false'); });
    b.classList.add('on'); b.setAttribute('aria-selected', 'true');
    renderChips(b.dataset.tech);
  }));
}
function initCarousel(root) {
  const car = $('[data-carousel]', root);
  if (!car) return;
  const track = $('.car-track', car), slides = $$('.car-slide', car), dots = $('.car-dots', car);
  let i = 0, timer;
  slides.forEach((_, n) => {
    const d = document.createElement('button');
    d.setAttribute('aria-label', `Go to testimonial ${n + 1}`);
    if (n === 0) d.classList.add('on');
    d.addEventListener('click', () => { go(n); stop(); });
    dots.appendChild(d);
  });
  const go = n => {
    i = (n + slides.length) % slides.length;
    track.style.transform = `translateX(-${i * 100}%)`;
    $$('button', dots).forEach((d, k) => d.classList.toggle('on', k === i));
  };
  const stop = () => { clearInterval(timer); timer = null; };
  car.querySelector('[data-car-prev]').addEventListener('click', () => { go(i - 1); stop(); });
  car.querySelector('[data-car-next]').addEventListener('click', () => { go(i + 1); stop(); });
  if (!REDUCED) timer = setInterval(() => go(i + 1), 6500);
  car.addEventListener('mouseenter', stop);
  let sx = null;
  car.addEventListener('pointerdown', e => { sx = e.clientX; });
  car.addEventListener('pointerup', e => {
    if (sx === null) return;
    const dx = e.clientX - sx;
    if (Math.abs(dx) > 50) { go(i + (dx < 0 ? 1 : -1)); stop(); }
    sx = null;
  });
  addCleanup(stop);
}
function initWorkFilter(root) {
  const grid = $('#workGrid', root);
  if (!grid) return;
  const chips = $$('[data-filter]', root), empty = $('#workEmpty', root);
  chips.forEach(c => c.addEventListener('click', () => {
    chips.forEach(x => x.classList.remove('on'));
    c.classList.add('on');
    const f = c.dataset.filter;
    let shown = 0;
    $$('.work', grid).forEach(w => {
      const match = f === 'All' || w.dataset.cat === f;
      w.classList.toggle('off', !match);
      w.classList.remove('in');
      if (match) {
        w.style.transitionDelay = (shown * .07) + 's';
        requestAnimationFrame(() => requestAnimationFrame(() => w.classList.add('in')));
        shown++;
      }
    });
    empty.hidden = shown > 0;
  }));
}
function initBlogTools(root) {
  const list = $('#blogList', root);
  if (!list) return;
  let cat = 'All', q = '';
  const input = $('[data-blog-search]', root);
  const empty = $('#blogEmpty', root);
  const paint = () => {
    const res = DATA.posts.filter(p =>
      (cat === 'All' || p.cat === cat) &&
      (p.title + ' ' + p.excerpt + ' ' + p.cat).toLowerCase().includes(q));
    empty.hidden = res.length > 0;
    list.innerHTML = res.length
      ? artFeat(res[0]) +
        `<div class="art-list">${res.slice(1).map(p => artItem(p)).join('')}</div>`
      : '';
  };
  paint();
  input.addEventListener('input', () => { q = input.value.toLowerCase().trim(); paint(); });
  $$('[data-bcat]', root).forEach(c => c.addEventListener('click', () => {
    $$('[data-bcat]', root).forEach(x => x.classList.remove('on'));
    c.classList.add('on'); cat = c.dataset.bcat; paint();
  }));
}
function toast(msg) {
  const t = document.createElement('div');
  t.className = 'toast';
  t.innerHTML = `${ic('check', 16)}<span>${msg}</span>`;
  $('#toast-root').appendChild(t);
  setTimeout(() => { t.style.transition = 'opacity .4s'; t.style.opacity = '0'; setTimeout(() => t.remove(), 400); }, 3400);
}
function bindForm(form) {
  const validate = () => {
    let ok = true;
    $$('[data-req]', form).forEach(inp => {
      const f = inp.closest('.field'), v = inp.value.trim();
      let bad = !v;
      if (inp.dataset.type === 'email') bad = !/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v);
      if (inp.dataset.type === 'phone') bad = !/^\+?[0-9][0-9\s\-]{7,}$/.test(v) || /[a-zA-Z]/.test(v);
      if (inp.dataset.min) bad = v.length < +inp.dataset.min;
      f.classList.toggle('err', bad);
      inp.setAttribute('aria-invalid', bad);
      if (bad) ok = false;
    });
    return ok;
  };
  $$('[data-req]', form).forEach(inp => inp.addEventListener('input', () => inp.closest('.field').classList.remove('err')));
  form.addEventListener('submit', e => {
    e.preventDefault();
    if (!validate()) { toast('Please check the highlighted fields.'); return; }
    const btn = form.querySelector('[type=submit]');
    btn.classList.add('loading');
    btn.innerHTML = '<span class="spin"></span> Sending…';
    const endpoint = form.dataset.endpoint || '/api/inquiry';
    fetch(endpoint, { method:'POST', headers:{ 'X-CSRF-TOKEN': csrfToken(), 'Accept':'application/json' }, body:new FormData(form) })
      .then(async r => { const data = await r.json().catch(() => ({})); if (!r.ok) throw data; return data; })
      .then(() => {
        const panel = document.createElement('div');
        panel.className = 'form-ok';
        panel.innerHTML = `
          <div class="okic">${ic('check', 30)}</div>
          <h3>${form.dataset.successTitle || 'Inquiry Received'}</h3>
          <p>${form.dataset.successMessage || 'Thank you — our team will review your submission and get back to you within one business day.'}</p>`;
        form.replaceWith(panel); toast('Sent successfully.');
      })
      .catch(err => {
        btn.classList.remove('loading'); btn.innerHTML = form.dataset.submitLabel || `<span class="mag-in">Send Project Inquiry ${ic('send',15)}</span>`;
        const first = err?.errors ? Object.values(err.errors).flat()[0] : null; toast(first || err?.message || 'Could not send your inquiry. Please try again.');
      });
  });
}
function initForms(root) { $$('form[data-form]', root).forEach(bindForm); }

function openModal(html) {
  const root = $('#modal-root');
  root.innerHTML = `<div class="modal-bd"><div class="modal" role="dialog" aria-modal="true" aria-label="Apply">
    <button class="modal-x" aria-label="Close">${ic('x', 16)}</button>${html}</div></div>`;
  const bd = root.firstElementChild;
  requestAnimationFrame(() => bd.classList.add('show'));
  const esc = e => { if (e.key === 'Escape') close(); };
  const close = () => { bd.classList.remove('show'); setTimeout(() => root.innerHTML = '', 350); document.removeEventListener('keydown', esc); };
  document.addEventListener('keydown', esc);
  bd.addEventListener('click', e => { if (e.target === bd) close(); });
  $('.modal-x', bd).addEventListener('click', close);
  const first = bd.querySelector('input, textarea');
  if (first) first.focus();
  const f = bd.querySelector('form');
  if (f) bindForm(f);
}
function initJobs(root) {
  $$('.apply-btn', root).forEach(b => b.addEventListener('click', () => {
    const job = b.dataset.job;
    openModal(`
      <h3>Apply — ${job}</h3><p class="msub">Tell us who you are. We read every application personally.</p>
      <form novalidate data-endpoint="/api/application" data-success-title="Application Received" data-success-message="Thank you — your application has been delivered to the NEXARION admin inbox." data-submit-label="Submit Application">
        <input type="hidden" name="job" value="${job}">
        <div class="form-grid">
          <div class="field full"><label for="ap-name">Full Name <b>*</b></label><input id="ap-name" name="name" data-req><span class="f-err">Please enter your name.</span></div>
          <div class="field full"><label for="ap-mail">Email <b>*</b></label><input id="ap-mail" name="email" type="email" data-req data-type="email"><span class="f-err">Please enter a valid email.</span></div>
          <div class="field full"><label for="ap-link">Portfolio / LinkedIn URL</label><input id="ap-link" name="portfolio" type="url" placeholder="https://…"></div>
          <div class="field full"><label for="ap-msg">Why you? <b>*</b></label><textarea id="ap-msg" name="message" data-req data-min="20"></textarea><span class="f-err">Tell us a bit more (min. 20 characters).</span></div>
        </div>
        <button type="submit" class="btn btn-p" style="margin-top:1.2rem;width:100%;justify-content:center">Submit Application ${ic('send', 15)}</button>
      </form>`);
  }));
}
function initPlaceholderLinks(root) {
  $$('.placeholder-link', root).forEach(b => b.addEventListener('click', () =>
    toast('Placeholder link — connect your real profile URL.')));
}
function initScrollInd() {
  const btn = $('#scrollInd');
  if (!btn) return;
  btn.addEventListener('click', () => {
    const t = $('#stats');
    if (t) t.scrollIntoView({ behavior: REDUCED ? 'auto' : 'smooth' });
  });
}

/* ============ HERO 3D (Three.js) ============ */
function initHero3D() {
  const host = $('#h3d');
  if (!host || typeof THREE === 'undefined') return;
  const light = document.documentElement.dataset.theme === 'light';
  const W = () => host.clientWidth, H = () => host.clientHeight;
  const scene = new THREE.Scene();
  const camera = new THREE.PerspectiveCamera(45, W() / H(), .1, 100);
  camera.position.set(0, 0, 6.4);
  const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
  renderer.setPixelRatio(Math.min(devicePixelRatio, 2));
  renderer.setSize(W(), H());
  host.insertBefore(renderer.domElement, host.firstChild);

  const group = new THREE.Group();
  scene.add(group);
  const cAcc = light ? 0x0a9d80 : 0x25e6c0, cDim = light ? 0x0a9d80 : 0x8cf2de, cGrey = light ? 0x55666d : 0x9fb4bd;

  const geo = new THREE.IcosahedronGeometry(2.1, 1);
  const wire = new THREE.LineSegments(new THREE.EdgesGeometry(geo),
    new THREE.LineBasicMaterial({ color: cAcc, transparent: true, opacity: .45 }));
  const core = new THREE.Mesh(new THREE.IcosahedronGeometry(1.22, 0),
    new THREE.MeshBasicMaterial({ color: light ? 0xffffff : 0x0c1418, transparent: true, opacity: .96 }));
  const coreEdge = new THREE.LineSegments(new THREE.EdgesGeometry(new THREE.IcosahedronGeometry(1.22, 0)),
    new THREE.LineBasicMaterial({ color: cAcc, transparent: true, opacity: .95 }));
  const verts = new THREE.Points(geo, new THREE.PointsMaterial({ color: cDim, size: .075, transparent: true, opacity: .9 }));
  group.add(wire, core, coreEdge, verts);

  const mkRing = (rad, col, op) => {
    const pts = [];
    for (let i = 0; i <= 120; i++) { const a = i / 120 * Math.PI * 2; pts.push(new THREE.Vector3(Math.cos(a) * rad, 0, Math.sin(a) * rad)); }
    return new THREE.Line(new THREE.BufferGeometry().setFromPoints(pts),
      new THREE.LineBasicMaterial({ color: col, transparent: true, opacity: op }));
  };
  const r1 = mkRing(3.05, cAcc, .3), r2 = mkRing(3.6, cGrey, .16);
  r1.rotation.x = 1.1; r2.rotation.x = -1.35; r2.rotation.z = .4;
  scene.add(r1, r2);

  const mkParticles = (n, rad, col, size, op) => {
    const pos = new Float32Array(n * 3);
    for (let i = 0; i < n; i++) {
      const r = rad * (0.6 + Math.random() * 0.6), th = Math.random() * Math.PI * 2, ph = Math.acos(2 * Math.random() - 1);
      pos[i * 3] = r * Math.sin(ph) * Math.cos(th);
      pos[i * 3 + 1] = r * Math.sin(ph) * Math.sin(th) * .7;
      pos[i * 3 + 2] = r * Math.cos(ph);
    }
    const g = new THREE.BufferGeometry();
    g.setAttribute('position', new THREE.BufferAttribute(pos, 3));
    return new THREE.Points(g, new THREE.PointsMaterial({ color: col, size, transparent: true, opacity: op, depthWrite: false }));
  };
  const pAcc = mkParticles(160, 4.6, cAcc, .04, .55);
  const pGrey = mkParticles(220, 5.6, cGrey, .03, .4);
  scene.add(pAcc, pGrey);

  let tRX = .15, tRY = 0, rX = .15, rY = 0, dragging = false, lx = 0, ly = 0, vy = 0;
  let camZ = 6.4, tCamZ = 6.4, mx = 0, my = 0, mxS = 0, myS = 0, raf, visible = true;

  const down = e => { dragging = true; lx = e.clientX; ly = e.clientY; host.setPointerCapture?.(e.pointerId); };
  const move = e => {
    if (dragging) {
      const dx = e.clientX - lx, dy = e.clientY - ly;
      tRY += dx * .006; tRX = Math.max(-1.1, Math.min(1.1, tRX + dy * .006)); vy = dx * .006;
      lx = e.clientX; ly = e.clientY;
    }
    if (e.pointerType === 'mouse' || e.type === 'mousemove') {
      const r = host.getBoundingClientRect();
      mx = ((e.clientX - r.left) / r.width - .5) * 2;
      my = ((e.clientY - r.top) / r.height - .5) * 2;
    }
  };
  const up = () => { dragging = false; };
  host.addEventListener('pointerdown', down);
  addEventListener('pointermove', move, { passive: true });
  addEventListener('pointerup', up);
  host.addEventListener('wheel', e => {
    if (!e.ctrlKey) return;
    e.preventDefault();
    tCamZ = Math.max(4, Math.min(9.5, tCamZ + e.deltaY * .01));
  }, { passive: false });
  const zoomBy = dz => { tCamZ = Math.max(4, Math.min(9.5, tCamZ + dz)); };
  $('#zin')?.addEventListener('click', () => zoomBy(-.9));
  $('#zout')?.addEventListener('click', () => zoomBy(.9));
  $('#zreset')?.addEventListener('click', () => { tCamZ = 6.4; tRX = .15; tRY = 0; });

  const io = new IntersectionObserver(es => { visible = es[0].isIntersecting; }, { threshold: 0 });
  io.observe(host);
  const onVis = () => { visible = !document.hidden; };
  document.addEventListener('visibilitychange', onVis);

  const clock = new THREE.Clock();
  function loop() {
    raf = requestAnimationFrame(loop);
    if (!visible) return;
    const dt = Math.min(clock.getDelta(), .05);
    if (!dragging && !REDUCED) { tRY += .0016 + vy; vy *= .94; }
    rX += (tRX - rX) * .08; rY += (tRY - rY) * .08;
    group.rotation.set(rX, rY, 0);
    r1.rotation.z += dt * .05; r2.rotation.z -= dt * .04;
    if (!REDUCED) { pAcc.rotation.y += dt * .02; pGrey.rotation.y -= dt * .012; }
    camZ += (tCamZ - camZ) * .06;
    mxS += (mx - mxS) * .04; myS += (my - myS) * .04;
    camera.position.x = mxS * .5;
    camera.position.y = -myS * .35;
    camera.position.z = camZ;
    camera.lookAt(0, 0, 0);
    renderer.render(scene, camera);
  }
  loop();

  const ro = new ResizeObserver(() => {
    camera.aspect = W() / H(); camera.updateProjectionMatrix(); renderer.setSize(W(), H());
  });
  ro.observe(host);

  const themeObs = new MutationObserver(() => {
    const l = document.documentElement.dataset.theme === 'light';
    const A = l ? 0x0a9d80 : 0x25e6c0, D = l ? 0x0a9d80 : 0x8cf2de, G = l ? 0x55666d : 0x9fb4bd;
    wire.material.color.setHex(A); coreEdge.material.color.setHex(A);
    verts.material.color.setHex(D); pAcc.material.color.setHex(A); pGrey.material.color.setHex(D);
    r1.material.color.setHex(A); r2.material.color.setHex(G);
    core.material.color.setHex(l ? 0xffffff : 0x0c1418);
  });
  themeObs.observe(document.documentElement, { attributes: true, attributeFilter: ['data-theme'] });

  addCleanup(() => {
    cancelAnimationFrame(raf);
    ro.disconnect(); io.disconnect(); themeObs.disconnect();
    removeEventListener('pointermove', move); removeEventListener('pointerup', up);
    document.removeEventListener('visibilitychange', onVis);
    scene.traverse(o => { o.geometry?.dispose?.(); o.material?.dispose?.(); });
    renderer.dispose();
    renderer.domElement.remove();
  });
}

function initHeroDepth() {
  if (!FINE || REDUCED) return;
  const hero = $('#hero');
  if (!hero) return;
  const chips = $$('[data-depth]', hero);
  let tx = 0, ty = 0, cx = 0, cy = 0, raf;
  const mm = e => {
    const r = hero.getBoundingClientRect();
    tx = ((e.clientX - r.left) / r.width - .5) * 2;
    ty = ((e.clientY - r.top) / r.height - .5) * 2;
  };
  const loop = () => {
    raf = requestAnimationFrame(loop);
    cx += (tx - cx) * .06; cy += (ty - cy) * .06;
    chips.forEach(c => {
      const d = +c.dataset.depth;
      c.style.transform = `translate3d(${(cx * d).toFixed(1)}px, ${(cy * d).toFixed(1)}px, 0)`;
    });
  };
  hero.addEventListener('pointermove', mm, { passive: true });
  loop();
  addCleanup(() => { cancelAnimationFrame(raf); });
}

/* ============ NAV / THEME ============ */
const burger = $('#burger'), mmenu = $('#mmenu');
burger.addEventListener('click', () => {
  const open = mmenu.classList.toggle('open');
  burger.classList.toggle('open', open);
  burger.setAttribute('aria-expanded', open);
  mmenu.setAttribute('aria-hidden', !open);
  document.body.style.overflow = open ? 'hidden' : '';
  $$('.mlink', mmenu).forEach((a, i) => a.style.transitionDelay = open ? (.1 + i * .045) + 's' : '0s');
});
 $('#themeBtn').addEventListener('click', () => {
  const el = document.documentElement;
  const next = el.dataset.theme === 'light' ? 'dark' : 'light';
  if (next === 'dark') el.removeAttribute('data-theme'); else el.setAttribute('data-theme', 'light');
  try { localStorage.setItem('nx-theme', next); } catch (e) {}
});

/* ============ BOOT ============ */
function renderMaintenanceScreen() {
  document.querySelector('.header')?.remove(); document.querySelector('.footer')?.remove(); document.querySelector('.to-top')?.remove();
  $('#main').innerHTML = `<section class="p404"><div class="hero-bg" aria-hidden="true"></div><div class="container"><div class="brand-mark" style="margin:0 auto 1rem"><svg class="ic" viewBox="0 0 24 24"><use href="#i-logo"/></svg></div><p class="kicker" style="justify-content:center">${esc(DATA.site?.brand || 'NEXARION')}</p><div class="big reveal" aria-hidden="true" style="font-size:clamp(4rem,16vw,10rem)">UP<b>G</b>RADE</div><h1 class="reveal" style="font-size:clamp(1.4rem,3vw,2rem);text-transform:uppercase;margin:.5rem 0 1rem">Be right back</h1><p class="lead reveal" style="margin:0 auto;text-align:center">${SITE_SETTINGS.mMsg || 'We are upgrading our systems. Please check back shortly.'}</p></div></section>`;
  applySiteSettings();
  observeReveals($('#main'));
}
function applySiteSettings(){
  const mail = SITE_SETTINGS.email || '';
  const brand = DATA.site?.brand || 'NEXARION';
  const tagline = DATA.site?.tagline || 'Technology & Digital Solutions';
  const logo = DATA.site?.logo || '';
  document.querySelectorAll('.brand-mark').forEach(el=>{
    el.innerHTML = logo ? `<img src="${esc(logo)}" alt="${esc(brand)} logo">` : `<svg class="ic" viewBox="0 0 24 24"><use href="#i-logo"/></svg>`;
  });
  let fav=document.querySelector('link[data-dynamic-favicon]');
  if(logo){ if(!fav){fav=document.createElement('link');fav.rel='icon';fav.dataset.dynamicFavicon='1';document.head.appendChild(fav);} fav.href=logo; }
  document.title = `${brand} — ${tagline}`;
  document.querySelectorAll('.brand').forEach(el=>{ const n=[...el.childNodes].find(x=>x.nodeType===3 && x.textContent.trim()); if(n) n.textContent=brand; });
  const footDesc=document.querySelector('.foot-brand p'); if(footDesc) footDesc.textContent=DATA.site?.footerBlurb || tagline;
  const copyright=document.querySelector('.foot-bottom > span'); if(copyright) copyright.textContent=`© ${new Date().getFullYear()} ${brand}. All Rights Reserved.`;
  const schema=document.getElementById('orgSchema'); if(schema) schema.textContent=JSON.stringify({['@'+'context']:'https://schema.org','@type':'Organization',name:brand,url:location.origin,description:tagline,contactPoint:{'@type':'ContactPoint',contactType:'customer service',email:mail},sameAs:[SITE_SETTINGS.instagram,SITE_SETTINGS.linkedin].filter(Boolean)});
  document.querySelectorAll('a[href="mailto:[COMPANY_EMAIL]"],a[data-company-email]').forEach(a=>{a.href='mailto:'+mail; if(a.textContent.includes('[COMPANY_EMAIL]')) a.textContent=a.textContent.replace('[COMPANY_EMAIL]',mail);});
  const footerLinks = document.querySelectorAll('.foot-col a');
  footerLinks.forEach(a=>{
    if(a.textContent.startsWith('WhatsApp:')) { a.textContent='WhatsApp: '+SITE_SETTINGS.whatsapp; const d=String(SITE_SETTINGS.whatsapp||'').replace(/\D/g,''); if(d) a.href='https://wa.me/'+d; }
    if(a.textContent.startsWith('Instagram:')) { a.textContent='Instagram: '+SITE_SETTINGS.instagram; if(/^https?:\/\//i.test(SITE_SETTINGS.instagram||'')) a.href=SITE_SETTINGS.instagram; }
    if(a.textContent.startsWith('LinkedIn:')) { a.textContent='LinkedIn: '+SITE_SETTINGS.linkedin; if(/^https?:\/\//i.test(SITE_SETTINGS.linkedin||'')) a.href=SITE_SETTINGS.linkedin; }
  });
  const cols=[...document.querySelectorAll('.foot-col')];
  const svcCol=cols.find(c=>c.querySelector('h4')?.textContent.trim()==='Services');
  if(svcCol){ const h=svcCol.querySelector('h4'); svcCol.innerHTML=''; svcCol.appendChild(h); DATA.services.slice(0,6).forEach(x=>{const a=document.createElement('a');a.href='#/services/'+x.slug;a.textContent=x.title;svcCol.appendChild(a);}); }
}
let lastSiteSync = 0;
async function loadSiteData(){
  const r=await fetch('/api/site-data?ts='+Date.now(),{headers:{'Accept':'application/json'},cache:'no-store',credentials:'same-origin'});
  if(!r.ok) throw new Error('Could not load site data (HTTP '+r.status+')');
  const j=await r.json(); const p=(j && j.data && typeof j.data==='object') ? {...j.data} : {};
  SITE_SETTINGS={...SITE_SETTINGS,...(p.settings||{})}; delete p.settings;
  Object.keys(p).forEach(k=>{ if(p[k] !== undefined && p[k] !== null) DATA[k]=p[k]; });
  normalizePublicData();
  lastSiteSync=Date.now(); return true;
}
function renderBootError(err){
  console.error('NEXARION public render failed:',err);
  DATA=JSON.parse(JSON.stringify(FALLBACK_DATA));
  normalizePublicData();
  try { render(); applySiteSettings(); return; } catch(fallbackErr){ console.error('Fallback render failed:',fallbackErr); }
  const main=document.getElementById('main');
  if(main) main.innerHTML=`<section class="sec" style="min-height:65vh;display:grid;place-items:center"><div class="container" style="text-align:center"><p class="kicker" style="justify-content:center">NEXARION</p><h1>Website content could not be rendered</h1><p class="lead" style="margin:1rem auto;max-width:54ch;text-align:center">Please refresh the page. If this continues, check the browser console and Laravel log.</p><button class="btn btn-p" onclick="location.reload()">Refresh Page</button></div></section>`;
}
async function boot(){
  try { await loadSiteData(); } catch(e){ console.warn('Using embedded fallback content.',e); normalizePublicData(); }
  if(SITE_SETTINGS.maintenance){ renderMaintenanceScreen(); return; }
  try { render(); applySiteSettings(); } catch(e){ renderBootError(e); }
}
window.addEventListener('focus', async()=>{
  if(Date.now()-lastSiteSync<500) return;
  const wasMaintenance=!!SITE_SETTINGS.maintenance;
  try { await loadSiteData(); if(wasMaintenance!==!!SITE_SETTINGS.maintenance){ location.reload(); return; } render(); applySiteSettings(); } catch(e){ console.warn('Background site sync failed.',e); }
});

function initCommon() {
  const root = $('#main');
  const safe = (label, fn) => { try { fn(); } catch (e) { console.error('UI init failed [' + label + ']:', e); } };
  safe('reveals', () => observeReveals(root));
  safe('counters', () => initCounters(root));
  safe('tilt', () => initTilt(root));
  safe('magnetic', () => initMagnetic(root));
  safe('accordion', () => initAccordion(root));
  safe('technology', () => initTech(root));
  safe('carousel', () => initCarousel(root));
  safe('portfolio filter', () => initWorkFilter(root));
  safe('blog tools', () => initBlogTools(root));
  safe('forms', () => initForms(root));
  safe('careers', () => initJobs(root));
  safe('placeholder links', () => initPlaceholderLinks(root));
  safe('scroll indicator', initScrollInd);
  safe('hero 3D', initHero3D);
  safe('hero depth', initHeroDepth);
  safe('scroll state', () => { pxItems = $$('[data-px]'); onScroll(); });
}
boot();
</script>
</body>
</html><?php /**PATH C:\laragon\www\nexarion-laravel\resources\views/site.blade.php ENDPATH**/ ?>