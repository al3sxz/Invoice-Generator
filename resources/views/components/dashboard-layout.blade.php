<x-layout>
    <!-- ───────────────────────────────────────────
     LAYOUT WRAPPER
─────────────────────────────────────────── -->
<div class="flex min-h-screen" style="background:#060608">

  <!-- ─── SIDEBAR ─── -->
  <aside id="sidebar" class="w-60 shrink-0 h-screen sticky top-0 flex flex-col z-40 overflow-hidden" style="background:#0a0a0f;border-right:1px solid #1e1e2e">
    <!-- Logo -->
    <div class="flex items-center gap-3 px-4 h-[60px] border-b border-border shrink-0">
      <div class="w-8 h-8 rounded-xl shrink-0 relative overflow-hidden" style="background:linear-gradient(135deg,#7c3aed,#00e5ff)">
        <div class="absolute inset-0 flex items-center justify-center">
          <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
      </div>
      <span class="sidebar-logo-text font-bold text-white text-base transition-all" style="font-family:Syne,sans-serif;white-space:nowrap">Zysk</span>
    </div>

  
    <nav class="flex-1 overflow-y-auto p-3 space-y-1">
      <p class="sidebar-section-title text-xs font-semibold text-dim px-2 py-2 transition-all" style="font-family:Syne,sans-serif;letter-spacing:0.08em">MAIN</p>
      <a  
       href="/dashboard"
        class="sidebar-item {{  Request::is("dashboard") ? "active" : "";  }}">
        <svg class="sidebar-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
        <span class="sidebar-label transition-all">Dashboard</span>
      </a>
      <a 
      href="/dashboard/services"
       class="sidebar-item {{  Request::is("dashboard/services") ? "active" : "";  }}">
        <svg class="sidebar-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
        <span class="sidebar-label transition-all">Services</span>
      </a>
      <a 
      href="/dashboard/clients"
       class="sidebar-item {{  Request::is("dashboard/clients") ? "active" : "";  }}">
        <svg class="sidebar-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
        <span class="sidebar-label transition-all">Clients</span>
      </a>
      <a 
       href="/dashboard/invoices"
       class="sidebar-item {{  Request::is("dashboard/invoices") ? "active" : "";  }}"
      >
        <svg class="sidebar-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
        <span class="sidebar-label transition-all">Invoices</span>
      </a>

      <p class="sidebar-section-title text-xs font-semibold text-dim px-2 py-2 pt-5 transition-all" style="font-family:Syne,sans-serif;letter-spacing:0.08em">SYSTEM</p>
   
         <a href="/dashboard/company/1" class="sidebar-item">
        <svg class="sidebar-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        <span class="sidebar-label transition-all">My Company</span>
      </a>
   
      <a class="sidebar-item">
        <svg class="sidebar-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        <span class="sidebar-label transition-all">Settings</span>
      </a>

    </nav>

    <!-- User Profile -->
    <div class="p-3 border-t border-border shrink-0">
      <div class="sidebar-item" style="cursor:default">
        <div class="avatar-ring shrink-0">
          <div class="w-8 h-8 rounded-full bg-gradient-to-br from-violet-700 to-cyan-600 flex items-center justify-center text-white text-xs font-bold" style="font-family:Syne,sans-serif">DV</div>
        </div>
        <div class="sidebar-label transition-all overflow-hidden">
          <p class="text-sm font-medium text-snow truncate">{{ Auth::user()->name }}</p>
          <p class="text-xs text-dim truncate">{{ Auth::user()->email }}</p>
        </div>
      </div>
    </div>
  </aside>

  <!-- ─── MAIN CONTENT ─── -->
  <div class="flex-1 min-w-0 flex flex-col">

    <!-- NAVBAR -->
    <header class="nx-navbar">
      <!-- Collapse toggle -->
      <button id="sidebar-toggle" class="w-8 h-8 rounded-lg flex items-center justify-center text-dim hover:text-silver hover:bg-muted transition-all shrink-0">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
      </button>

      <!-- Breadcrumb -->
      <div class="flex items-center gap-2 text-sm text-dim flex-1">
        <span style="font-family:Syne,sans-serif;font-weight:600" class="text-ghost">Zysk</span>
      </div>

      <!-- Actions -->
      <div class="flex items-center gap-4">
        <!-- Notification bell -->
        <div class="relative">
          <button class="w-9 h-9 rounded-xl flex items-center justify-center text-dim hover:text-silver hover:bg-muted transition-all relative border border-border">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
            <span class="absolute -top-1 -right-1 w-4 h-4 text-white text-xs flex items-center justify-center rounded-full font-bold" style="font-family:Syne,sans-serif;background:linear-gradient(135deg,#f43f5e,#e11d48);font-size:9px">3</span>
          </button>
        </div>

        <!-- Avatar -->
        <div class="avatar-ring cursor-pointer">
          <div class="w-8 h-8 rounded-full bg-gradient-to-br from-violet-600 to-cyan-500 flex items-center justify-center text-white text-xs font-bold" style="font-family:Syne,sans-serif">DV</div>
        </div>
        <div>
          <form method="POST" action="/logout">
            @csrf
           <button class="nx-btn" >
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-logout"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" /><path d="M9 12h12l-3 -3" /><path d="M18 15l3 -3" /></svg>
           </button>
          </form>
        </div>
      </div>
    </header>
        <!-- PAGE CONTENT -->
    <main id="main_content" class="flex-1 overflow-y-auto p-6 lg:p-8" style="background:#060608">
   
      {{ $slot }}

  </div>
    </main>
  </div>
</div>


</x-layout>










