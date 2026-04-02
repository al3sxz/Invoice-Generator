<x-dashboard-layout>
         @if (session('message'))
          <div class="nx-alert mb-4" style="background:rgba(16,185,129,0.06);border-color:rgba(16,185,129,0.2);color:#10b981">
              <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              <div><p class="font-semibold" style="font-family:Syne,sans-serif">System Message:</p><p class="text-sm mt-0.5" style="color:#9898b0">{{ session("message") }}</p></div>
            </div>
      @endif
    <section id="invoices_section">
    <div class="nx-table-wrap">
    <div class="nx-table-toolbar" style="display: flex;">
      <form method="GET" action="/invoices/search">
        @csrf
     <div style="position:relative;flex:1;max-width:260px">
        <svg style="position:absolute;left:10px;top:50%;transform:translateY(-50%);color:#6b6b8a" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        <input class="nx-search" name="invoice" id="nx-search" placeholder="Search...">
      </div>
      </form>
      <div style="display:flex;gap:6px;align-items:center;margin-left:auto">
        <a href="/dashboard/invoices/create" class="nx-btn nx-btn-primary">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 5v14M5 12h14"/></svg>
          Add Invoice
        </a>
      </div>
    </div>

    <div style="overflow-x:auto">
      <table>
        <thead>
          <tr>
            <th class="sortable" id="th-name">
              Invoice Number
            </th>
            <th>Client</th>
            <th >
              Broadcast
            </th>
            <th>Expiration</th>
            <th>Total</th>
            <th>Status</th>
            <th> </th>
          </tr>
        </thead>
        <tbody id="nx-tbody">
          @foreach ($invoices ?? [] as $invoice)
           <tr>
        <td><p class="cell-name">{{ $invoice->invoice_number }}</p></td>
        <td><p class="cell-name">{{ $invoice->client->name ?? "wtf"}}</p></td>
        <td><span class="cell-name">{{ $invoice->created_at }}</span></td>
        <td><p class="cell-name">{{ $invoice->expiration_date}}</p></td>
        <td><p class="cell-name">{{ $invoice->final_value}}</p></td>
        <td><p class="cell-name">{{ $invoice->status}}</p></td>
        <td style="text-align:right">
          <div style="display:inline-flex;gap:6px">
            <a href="/dashboard/invoices/{{ $invoice->id }}" class="action-btn">
              Details
            </a>
          </div>
        </td>
      </tr>
        @endforeach
        </tbody>
      </table>
    </div>



</section>
</x-dashboard-layout>