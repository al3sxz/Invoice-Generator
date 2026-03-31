<x-layout>

<body>

<div id="cursor-glow"></div>

<!-- ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
     HERO
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ -->
<section style="position:relative;min-height:100vh;display:flex;flex-direction:column;overflow:hidden">

  <!-- Background layer -->
  <div style="position:absolute;inset:0;z-index:1">
    <div class="grid-lines"></div>

    <!-- Orbs -->
    <div class="orb" style="width:700px;height:700px;background:#7c3aed;opacity:0.07;top:-200px;left:-100px"></div>
    <div class="orb" style="width:500px;height:500px;background:#00e5ff;opacity:0.05;top:100px;right:-100px"></div>
    <div class="orb" style="width:400px;height:400px;background:#f43f5e;opacity:0.04;bottom:-100px;left:30%"></div>
    <div class="orb" style="width:300px;height:300px;background:#7c3aed;opacity:0.06;bottom:100px;right:10%"></div>

    <!-- Horizontal rule glow -->
    <div style="position:absolute;top:50%;left:0;right:0;height:1px;background:linear-gradient(90deg,transparent,rgba(124,58,237,0.3),rgba(0,229,255,0.2),transparent);transform:translateY(-50%)"></div>
  </div>

  <!-- ─── NAVBAR ─── -->
  <nav style="position:relative;z-index:10;padding:20px 40px;display:flex;align-items:center;gap:16px;backdrop-filter:blur(12px);border-bottom:1px solid rgba(255,255,255,0.04)">
    <!-- Logo -->
    <div style="display:flex;align-items:center;gap:10px;flex:1">
      <div style="width:34px;height:34px;border-radius:10px;background:linear-gradient(135deg,#7c3aed,#00e5ff);display:flex;align-items:center;justify-content:center;flex-shrink:0;position:relative">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
      </div>
      <span style="font-family:Syne,sans-serif;font-weight:800;font-size:17px;color:white;letter-spacing:-0.01em">Invoice<span style="color:#00e5ff">Generator</span></span>
    </div>

    <!-- Right actions -->
    <div style="display:flex;align-items:center;gap:10px;flex:1;justify-content:flex-end">
      <span class="badge" style="background:rgba(16,185,129,0.1);color:#10b981;border:1px solid rgba(16,185,129,0.2)">
        <span style="width:6px;height:6px;border-radius:50%;background:#10b981;animation:pulse-ring 1.5s ease-out infinite"></span>
        v1.0 stable
      </span>
      <a class="btn-secondary" href="/login" style="padding:9px 18px;font-size:13px;border-radius:10px">Log in</a>
      <a class="btn-primary" href="/register" style="padding:9px 18px;font-size:13px;border-radius:10px">Get started</a>
    </div>
  </nav>

  <!-- ─── MAIN HERO CONTENT ─── -->
  <div style="flex:1;display:flex;align-items:center;position:relative;z-index:5;padding:60px 40px 80px">
    <div style="max-width:1200px;margin:0 auto;width:100%;display:grid;grid-template-columns:1fr 1fr;gap:80px;align-items:center">

      <!-- LEFT: Copy -->
      <div>
        <!-- Eyebrow -->


        <!-- Headline -->
        <div class="reveal" style="margin-bottom:24px">
          <h1 class="hero-title" style="font-family:Syne,sans-serif;font-weight:800;font-size:clamp(44px,5.5vw,80px);line-height:1.04;letter-spacing:-0.03em">
            <span class="gt-main">Zysk App</span><br>
            <span class="gt-main">Invoice</span> <span class="gt-accent">Generator.</span>
          </h1>
        </div>

        <!-- Sub -->
        <div class="reveal">
          <p class="hero-sub" style="font-size:18px;line-height:1.7;color:var(--ghost);max-width:440px;font-weight:300">
           A description of how to use this platform called Zysk.
           
          </p>
        </div>

        <!-- CTA row -->
        <div class="reveal" style="display:flex;align-items:center;gap:14px;margin-top:36px;flex-wrap:wrap">
          <a class="btn-primary" href="/register">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
             Get Started
          </a>
          <a class="btn-secondary" href="/login">
            
            Login
          </a>
        </div>


      </div>

      <!-- RIGHT: Floating UI Preview -->
      <div class="floating-cards" style="position:relative;height:520px">

        <!-- Glow behind -->
        <div style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:400px;height:400px;border-radius:50%;background:radial-gradient(circle,rgba(124,58,237,0.2) 0%,transparent 70%);pointer-events:none"></div>

        <!-- MAIN DASHBOARD CARD -->
        <div class="ui-card animate-float" style="position:absolute;top:20px;left:0;right:80px;z-index:4;box-shadow:0 32px 80px rgba(0,0,0,0.7),0 0 0 1px rgba(255,255,255,0.05)">
          <div class="scanline"></div>
          <!-- window chrome -->
          <div class="ui-card-header">
            <div class="dot" style="background:#ff5f57"></div>
            <div class="dot" style="background:#fec02f"></div>
            <div class="dot" style="background:#29c840"></div>
            <span style="flex:1;text-align:center;font-family:Syne,sans-serif;font-size:11px;color:var(--dim);letter-spacing:0.04em">Zysk — IG</span>
          </div>
          <div style="padding:20px">
     
              <x-invoice-animated/>
   
         
          </div>
        </div>

      </div>
    </div>
  </div>

</section>

<script>

  // ── Bar heights ──
  const heights = [40, 58, 48, 44, 100, 60, 80];
  document.querySelectorAll('[id^="bar-"]').forEach((bar, i) => {
    bar.style.height = (heights[i] / 100 * 52) + 'px';
  });

  // ── Reveal on load ──
  window.addEventListener('load', () => {
    document.querySelectorAll('.reveal').forEach((el, i) => {
      setTimeout(() => el.classList.add('show'), i * 120);
    });
  });

  // ── Nav scroll effect ──
  window.addEventListener('scroll', () => {
    const nav = document.querySelector('nav');
    if (window.scrollY > 20) {
      nav.style.background = 'rgba(5,5,7,0.92)';
    } else {
      nav.style.background = 'transparent';
    }
  });
</script>

</x-layout>