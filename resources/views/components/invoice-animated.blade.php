
<style>
  #inv { background:#0a0a0f; border:1px solid #1e1e2e; border-radius:16px; overflow:hidden; width:300px; margin:0 auto; box-shadow:0 24px 64px rgba(0,0,0,.7), 0 0 0 1px rgba(255,255,255,.04); font-family:'DM Sans',sans-serif; }

  @keyframes write {
    from { width: 0 }
    to   { width: var(--w) }
  }
  @keyframes fade-row {
    from { opacity:0; transform:translateY(6px) }
    to   { opacity:1; transform:translateY(0) }
  }
  @keyframes blink {
    0%,100% { opacity:1 }
    50%     { opacity:0 }
  }
  @keyframes scan {
    0%   { top:44px;  opacity:0 }
    5%   { opacity:1 }
    90%  { opacity:.6 }
    100% { top:100%;  opacity:0 }
  }
  @keyframes progress {
    0%   { width:0%   }
    60%  { width:72%  }
    85%  { width:92%  }
    100% { width:100% }
  }
  @keyframes pulse-dot {
    0%,100% { opacity:1; transform:scale(1)   }
    50%     { opacity:.4; transform:scale(.7) }
  }
  @keyframes glow-in {
    from { opacity:0 }
    to   { opacity:1 }
  }
  @keyframes stamp {
    0%   { transform:scale(2) rotate(-15deg); opacity:0 }
    60%  { transform:scale(.95) rotate(2deg);  opacity:1 }
    100% { transform:scale(1)   rotate(0deg);  opacity:1 }
  }

  .line {
    height:7px; border-radius:4px;
    background:#1e1e2e; overflow:hidden;
    position:relative;
  }
  .line-fill {
    height:100%; border-radius:4px; width:0;
    animation: write var(--dur,.6s) ease-out var(--delay,0s) forwards;
  }

  .row {
    opacity:0;
    animation: fade-row .35s ease-out var(--rd,0s) forwards;
  }

  #cursor {
    display:inline-block; width:2px; height:11px;
    background:#00e5ff; border-radius:1px; vertical-align:middle;
    animation: blink .75s step-end infinite;
    margin-left:2px;
  }

  #scan-beam {
    position:absolute; left:0; right:0; height:1.5px;
    background:linear-gradient(90deg,transparent,rgba(0,229,255,.5),transparent);
    animation: scan 3s ease-in-out infinite;
    pointer-events:none;
  }

  #prog-fill {
    height:100%; border-radius:2px;
    background:linear-gradient(90deg,#7c3aed,#00e5ff);
    animation: progress 4s cubic-bezier(.4,0,.2,1) .5s forwards;
    width:0; position:relative;
  }
  #prog-fill::after {
    content:''; position:absolute; right:0; top:0;
    width:14px; height:100%;
    background:rgba(255,255,255,.5); filter:blur(3px); border-radius:2px;
  }

  #stamp {
    animation: stamp .5s cubic-bezier(.34,1.56,.64,1) 4.2s both;
  }

  #status-glow {
    animation: glow-in .4s ease 4s both;
  }
</style>

<div id="inv">

  <!-- Header bar -->
  <div style="background:linear-gradient(135deg,#7c3aed,#5b21b6); padding:18px 20px 16px; position:relative; overflow:hidden;">
    <div id="scan-beam"></div>

    <div style="display:flex; align-items:flex-start; justify-content:space-between;">
      <div>
        <div style="display:flex; align-items:center; gap:8px; margin-bottom:6px;">
          <div style="width:28px;height:28px;border-radius:8px;background:rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
          </div>
          <span style="font-family:'DM Sans',sans-serif;font-size:11px;font-weight:600;color:rgba(255,255,255,.7);letter-spacing:.06em;text-transform:uppercase;">Invoice</span>
        </div>
        <div style="font-family:'DM Sans',sans-serif;font-size:18px;font-weight:700;color:white;letter-spacing:-.01em;">#INV-2026-0391<span id="cursor"></span></div>
      </div>
      <div id="stamp" style="background:rgba(16,185,129,.2);border:1.5px solid rgba(16,185,129,.5);border-radius:8px;padding:5px 10px;">
        <div style="display:flex;align-items:center;gap:5px;">
          <div style="width:6px;height:6px;border-radius:50%;background:#10b981;animation:pulse-dot 2s ease-in-out infinite;"></div>
          <span style="font-size:10px;font-weight:700;color:#10b981;letter-spacing:.05em;font-family:'DM Sans',sans-serif;">GENERATE</span>
        </div>
      </div>
    </div>

    <!-- Progress bar -->
    <div style="margin-top:14px;">
      <div style="display:flex;justify-content:space-between;margin-bottom:5px;">
        <span style="font-size:10px;color:rgba(255,255,255,.5);font-family:'DM Sans',sans-serif;">Generating....</span>
        <span id="status-glow" style="font-size:10px;color:#10b981;font-weight:600;font-family:'DM Sans',sans-serif;">Ready</span>
      </div>
      <div style="height:3px;background:rgba(255,255,255,.1);border-radius:2px;overflow:hidden;">
        <div id="prog-fill"></div>
      </div>
    </div>
  </div>

  <!-- Body -->
  <div style="padding:18px 20px;">

    <!-- From / To -->
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:18px;">
      <div class="row" style="--rd:.3s;">
        <div style="font-size:9px;font-weight:700;color:#6b6b8a;letter-spacing:.08em;margin-bottom:5px;font-family:'DM Sans',sans-serif;">FROM</div>
        <div class="line" style="margin-bottom:5px;"><div class="line-fill" style="--w:85%;background:#7c3aed;opacity:.6;--dur:.5s;--delay:.4s;"></div></div>
        <div class="line" style="--w:62%;"><div class="line-fill" style="--w:62%;background:#2a2a3d;--dur:.4s;--delay:.6s;"></div></div>
        <div class="line" style="margin-top:5px;"><div class="line-fill" style="--w:48%;background:#2a2a3d;--dur:.4s;--delay:.75s;"></div></div>
      </div>
      <div class="row" style="--rd:.5s;">
        <div style="font-size:9px;font-weight:700;color:#6b6b8a;letter-spacing:.08em;margin-bottom:5px;font-family:'DM Sans',sans-serif;">TO</div>
        <div class="line" style="margin-bottom:5px;"><div class="line-fill" style="--w:70%;background:#00e5ff;opacity:.4;--dur:.5s;--delay:.8s;"></div></div>
        <div class="line" style="margin-bottom:5px;"><div class="line-fill" style="--w:55%;background:#2a2a3d;--dur:.4s;--delay:.95s;"></div></div>
        <div class="line"><div class="line-fill" style="--w:80%;background:#2a2a3d;--dur:.4s;--delay:1.1s;"></div></div>
      </div>
    </div>

    <!-- Divider -->
    <div class="row" style="--rd:.7s;height:1px;background:linear-gradient(90deg,#7c3aed22,#1e1e2e,#00e5ff22);margin-bottom:14px;"></div>

    <!-- Table header -->
    <div class="row" style="--rd:.8s;display:grid;grid-template-columns:1fr auto auto;gap:8px;margin-bottom:10px;">
      <div style="font-size:9px;font-weight:700;color:#6b6b8a;letter-spacing:.08em;font-family:'DM Sans',sans-serif;">CONCEPT</div>
      <div style="font-size:9px;font-weight:700;color:#6b6b8a;letter-spacing:.08em;font-family:'DM Sans',sans-serif;">QTY</div>
      <div style="font-size:9px;font-weight:700;color:#6b6b8a;letter-spacing:.08em;font-family:'DM Sans',sans-serif;">TOTAL</div>
    </div>

    <!-- Item 1 -->
    <div class="row" style="--rd:1s;display:grid;grid-template-columns:1fr auto auto;gap:8px;align-items:center;margin-bottom:8px;">
      <div>
        <div class="line" style="margin-bottom:4px;"><div class="line-fill" style="--w:90%;background:#c4c4d4;opacity:.25;--dur:.5s;--delay:1.1s;"></div></div>
        <div class="line"><div class="line-fill" style="--w:65%;background:#3d3d5c;--dur:.4s;--delay:1.25s;"></div></div>
      </div>
      <div class="line" style="width:18px;"><div class="line-fill" style="--w:100%;background:#3d3d5c;--dur:.3s;--delay:1.35s;"></div></div>
      <div class="line" style="width:40px;"><div class="line-fill" style="--w:100%;background:linear-gradient(90deg,#7c3aed,#06b6d4);opacity:.7;--dur:.4s;--delay:1.4s;"></div></div>
    </div>

    <!-- Item 2 -->
    <div class="row" style="--rd:1.2s;display:grid;grid-template-columns:1fr auto auto;gap:8px;align-items:center;margin-bottom:8px;">
      <div>
        <div class="line" style="margin-bottom:4px;"><div class="line-fill" style="--w:75%;background:#c4c4d4;opacity:.25;--dur:.5s;--delay:1.3s;"></div></div>
        <div class="line"><div class="line-fill" style="--w:50%;background:#3d3d5c;--dur:.4s;--delay:1.45s;"></div></div>
      </div>
      <div class="line" style="width:18px;"><div class="line-fill" style="--w:100%;background:#3d3d5c;--dur:.3s;--delay:1.55s;"></div></div>
      <div class="line" style="width:40px;"><div class="line-fill" style="--w:100%;background:linear-gradient(90deg,#7c3aed,#06b6d4);opacity:.7;--dur:.4s;--delay:1.6s;"></div></div>
    </div>

    <!-- Divider -->
    <div class="row" style="--rd:1.9s;height:1px;background:#1e1e2e;margin-bottom:12px;"></div>


    <!-- Total -->
    <div class="row" style="--rd:2.4s;background:linear-gradient(135deg,rgba(124,58,237,.12),rgba(0,229,255,.06));border:1px solid rgba(124,58,237,.2);border-radius:10px;padding:11px 14px;display:flex;justify-content:space-between;align-items:center;">
      <span style="font-size:11px;font-weight:700;color:#9898b0;letter-spacing:.06em;font-family:'DM Sans',sans-serif;">TOTAL</span>
      <div style="display:flex;align-items:center;gap:8px;">
        <div class="line" style="width:22px;height:5px;"><div class="line-fill" style="--w:100%;background:#6b6b8a;--dur:.3s;--delay:2.5s;"></div></div>
        <div class="line" style="width:56px;height:9px;border-radius:5px;"><div class="line-fill" style="--w:100%;background:linear-gradient(90deg,#7c3aed,#00e5ff);--dur:.5s;--delay:2.6s;"></div></div>
      </div>
    </div>

  </div>



</div>
