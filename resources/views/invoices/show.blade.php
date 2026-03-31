<x-dashboard-layout>

      <div class="grad-border overflow-hidden" style="background:#0d0d12">
        <div class="p-6">
       <div class="flex justify-between">
         <div>
            <div class="w-10 h-10 rounded-xl mb-4 flex items-center justify-center" style="background:linear-gradient(135deg,#7c3aed,#06b6d4)">
          <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
         <h3 class="text-base font-bold text-snow mb-2" style="font-family:Syne,sans-serif">{{ $invoice->invoice_number }}</h3>
        
         </div>
    <h5 class="text-3xl font-bold">${{ $invoice->final_value }}</h5>
       </div>
        <div class="flex flex-wrap gap-2">
          <span class="badge" style="background:rgba(0,229,255,0.08);color:#00e5ff;border:1px solid rgba(0,229,255,0.15)">{{ $invoice->client->name }}</span>
          <span class="badge" style="background:rgba(16,185,129,0.08);color:#10b981;border:1px solid rgba(16,185,129,0.15)">{{ $invoice->created_at }}</span>
          <span class="badge" style="background:rgba(124,58,237,0.08);color:#a78bfa;border:1px solid rgba(124,58,237,0.15)">{{ $invoice->expiration_date }}</span>
       <span class="badge" style="background:rgba(124,58,237,0.08);color:#a78bfa;border:1px solid rgba(124,58,237,0.15)">{{ $invoice->tax_percentage }}$ IVA</span>
        </div>
        </div>
      </div>




              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4 mt-4">
            <!-- Stat cards -->
            <div class="stat-card">
              <div class="flex items-center justify-between mb-4">
                <p class="text-xs text-dim font-semibold" style="font-family:Syne,sans-serif;letter-spacing:0.06em">Services Solicited</p>
                <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background:rgba(16,185,129,0.12)">
                  <svg class="w-4 h-4" style="color:#10b981" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
              </div>
              @foreach ($invoice->services as $service)
                  <p class="text-2xl font-extrabold text-snow" style="font-family:Syne,sans-serif">{{ $service->service_name }}</p>
              <div class="flex items-center gap-2 mt-2">
               
               <p> {{ $service->price }}</p>
                
              </div>
              @endforeach
      </div>
            
       
 
            <div class="stat-card">
              <div class="flex items-center justify-between mb-4">
                <p class="text-xs text-dim font-semibold" style="font-family:Syne,sans-serif;letter-spacing:0.06em">Client</p>
                <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background:rgba(124,58,237,0.12)">
                  <svg class="w-4 h-4" style="color:#a78bfa" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
              </div>
              <p class="text-2xl font-extrabold text-snow" style="font-family:Syne,sans-serif">{{ $invoice->client->name }}</p>
              <div class=" gap-2 mt-2">
                <p class="font-semibold" style="color:#a78bfa;font-family:Syne,sans-serif">{{ $invoice->client->email }}</p>
                <p >{{ $invoice->client->phone }}</p>
                 <p >{{ $invoice->client->address }}</p>
              </div>
              </div>
            
            
 
            <div class="stat-card">
              <div class="flex items-center justify-between mb-4">
                <p class="text-xs text-dim font-semibold" style="font-family:Syne,sans-serif;letter-spacing:0.06em">Actions</p>
                <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background:rgba(0,229,255,0.08)">
                  <svg class="w-4 h-4" style="color:#00e5ff" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                </div>
              </div>
              <form method="POST" action="/invoices/get-pdf/{{ $invoice->id }}">
               @csrf
                <button class="btn btn-primary">
                Download PDF
             </button>
              </form>
             </div>
            </div>


            <div class="flex justify-between">


         <div class="stat-card">
              <div class="flex items-center justify-between mb-4">
                <p class="text-xs text-dim font-semibold" style="font-family:Syne,sans-serif;letter-spacing:0.06em">Notes</p>
                <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background:rgba(0,229,255,0.08)">
                  <svg class="w-4 h-4" style="color:#00e5ff" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                </div>
              </div>
                <p>{{ $invoice->notes }}</p>
             </div>
            


          <div class="stat-card">
              <div class="flex items-center justify-between mb-4">
                <p class="text-xs text-dim font-semibold" style="font-family:Syne,sans-serif;letter-spacing:0.06em">Total: {{ $invoice->final_value }}</p>
             <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background:rgba(16,185,129,0.12)">
                  <svg class="w-4 h-4" style="color:#10b981" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
              </div>
               <p>Subtotal {{ $invoice->sub_total }}</p>
               <p>IVA {{ $invoice->tax_percentage }}</p>
             </div>
            </div>


      

      
     
</x-dashboard-layout>