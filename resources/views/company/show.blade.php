<x-dashboard-layout>
      @if (session('message'))
          <div class="nx-alert mb-4" style="background:rgba(16,185,129,0.06);border-color:rgba(16,185,129,0.2);color:#10b981">
              <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              <div><p class="font-semibold" style="font-family:Syne,sans-serif">System Message:</p><p class="text-sm mt-0.5" style="color:#9898b0">{{ session("message") }}</p></div>
            </div>
      @endif
       <div class="nx-card">
              <div class="flex items-start gap-4">
                <div>
                  <img class="w-16 h-16 rounded-md" src={{ $company->logo ?? 'https://www.w3schools.com/howto/img_avatar.png' }}>
               <img class="w-16 h-16 rounded-md" src={{ echo asset($company->logo); ?? 'https://www.w3schools.com/howto/img_avatar.png' }}>
                </div>
                <div class="flex-1 min-w-0">
                  <div class="flex items-center gap-2">
                    <h3 class="font-bold text-snow truncate text-3xl" >{{ $company->name }}</h3>
                    <span class="badge shrink-0" style="background:linear-gradient(135deg,rgba(124,58,237,0.2),rgba(0,229,255,0.12));color:#f0f0f8;border:1px solid rgba(124,58,237,0.3)">✦ Info</span>
                    <div>
                     <a href="/dashboard/company/{{ $company->id }}/edit" class="action-btn">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                   </a>
                    </div>
                  </div>
                  <p class=" mt-0.5">{{ $company->nit }}</p>
                  <div class="flex flex-col gap-4 mt-3">
                    <div ><p >Address: {{ $company->address }}</p></div>
                    <div ><p >Email: {{ $company->email }}</p></div>
                    <div ><p >Phone: {{ $company->phone }}</p></div>
                  </div>
                </div>
              </div>
            </div>
</x-dashboard-layout>