<x-layout>

<x-dashboard-layout>
      
      <div class="fixed pointer-events-none overflow-hidden inset-0 z-0">
        <div class="bg-orb w-[500px] h-[500px] opacity-[0.06]" style="background:#7c3aed;top:-100px;left:200px"></div>
        <div class="bg-orb w-[400px] h-[400px] opacity-[0.05]" style="background:#00e5ff;bottom:100px;right:-50px"></div>
      </div>

      <div class="relative z-10 max-w-6xl mx-auto space-y-16">

      
        <div>
          <p class="section-tag">Welcome Back</p>
          <h1 class="gradient-text text-4xl lg:text-5xl font-extrabold leading-tight" style="font-family:Syne,sans-serif">Zysk</h1>
          <p class="text-ghost text-base mt-3 max-w-xl">A description of how to use this platform called Zysk.</p>
          <div class="flex items-center gap-3 mt-5">
            <span class="badge" style="background:rgba(16,185,129,0.12);color:#10b981;border:1px solid rgba(16,185,129,0.2)">
              <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span> v1.0.0 Stable
            </span>
            <span class="badge" style="background:rgba(124,58,237,0.12);color:#a78bfa;border:1px solid rgba(124,58,237,0.2)">INVOICE</span>
            <span class="badge" style="background:rgba(0,229,255,0.08);color:#00e5ff;border:1px solid rgba(0,229,255,0.15)">GENERATOR</span>
          </div>
        </div>


        <section id="cards">

          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
           
            <div class="stat-card">
              <div class="flex items-center justify-between mb-4">
                <p class="text-xs text-dim font-semibold" style="font-family:Syne,sans-serif;letter-spacing:0.06em">TOTAL REVENUE</p>
                <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background:rgba(16,185,129,0.12)">
                  <svg class="w-4 h-4" style="color:#10b981" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
              </div>
              <p class="text-3xl font-extrabold text-snow" style="font-family:Syne,sans-serif">$84,210</p>
              <div class="flex items-center gap-2 mt-2">
                <span class="text-xs font-semibold" style="color:#10b981;font-family:Syne,sans-serif">↑ 12.4%</span>
                <span class="text-xs text-dim">vs last month</span>
              </div>
              <div class="mt-4 progress-track"><div class="progress-fill" style="width:72%"></div></div>
            </div>

            <div class="stat-card">
              <div class="flex items-center justify-between mb-4">
                <p class="text-xs text-dim font-semibold" style="font-family:Syne,sans-serif;letter-spacing:0.06em">ACTIVE USERS</p>
                <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background:rgba(124,58,237,0.12)">
                  <svg class="w-4 h-4" style="color:#a78bfa" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
              </div>
              <p class="text-3xl font-extrabold text-snow" style="font-family:Syne,sans-serif">24,893</p>
              <div class="flex items-center gap-2 mt-2">
                <span class="text-xs font-semibold" style="color:#a78bfa;font-family:Syne,sans-serif">↑ 8.1%</span>
                <span class="text-xs text-dim">vs last week</span>
              </div>
              <div class="mt-4 progress-track"><div class="progress-fill" style="width:58%;background:linear-gradient(90deg,#7c3aed,#a78bfa)"></div></div>
            </div>

            <div class="stat-card">
              <div class="flex items-center justify-between mb-4">
                <p class="text-xs text-dim font-semibold" style="font-family:Syne,sans-serif;letter-spacing:0.06em">UPTIME</p>
                <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background:rgba(0,229,255,0.08)">
                  <svg class="w-4 h-4" style="color:#00e5ff" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                </div>
              </div>
              <p class="text-3xl font-extrabold text-snow" style="font-family:Syne,sans-serif">99.98%</p>
              <div class="flex items-center gap-2 mt-2">
                <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span>
                <span class="text-xs text-dim">All systems operational</span>
              </div>
              <div class="mt-4 progress-track"><div class="progress-fill" style="width:99.98%;background:linear-gradient(90deg,#00e5ff,#10b981)"></div></div>
            </div>
          </div>
        </section>


</x-dashboard-layout>


</x-layout>