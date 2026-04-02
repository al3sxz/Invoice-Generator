<x-dashboard-layout>
     @if (session('message'))
          <div class="nx-alert mb-4" style="background:rgba(16,185,129,0.06);border-color:rgba(16,185,129,0.2);color:#10b981">
              <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              <div><p class="font-semibold" style="font-family:Syne,sans-serif">System Message:</p><p class="text-sm mt-0.5" style="color:#9898b0">{{ session("message") }}</p></div>
            </div>
@endif
    <section id="clients_section">
    <div class="nx-table-wrap">
    <div class="nx-table-toolbar" style="display: flex;">
      <form method="GET" action="/clients/search">
        @csrf
     <div style="position:relative;flex:1;max-width:260px">
        <svg style="position:absolute;left:10px;top:50%;transform:translateY(-50%);color:#6b6b8a" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        <input class="nx-search" name="client" id="nx-search" placeholder="Search...">
      </div>
      </form>
      <div style="display:flex;gap:6px;align-items:center;margin-left:auto">
        <a href="/dashboard/clients/create" class="nx-btn nx-btn-primary">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 5v14M5 12h14"/></svg>
          Add client
        </a>
      </div>
    </div>

    <div style="overflow-x:auto">
      <table>
        <thead>
          <tr>
            <th class="sortable" id="th-name">
              Name
            </th>
            <th>DNI</th>
            <th ">
              Address
            </th>
            <th>Phone Number</th>
            <th>Email</th>
            <th style="text-align:right">Actions</th>
          </tr>
        </thead>
        <tbody id="nx-tbody">
          @foreach ($clients ?? [] as $client)
           <tr>
        <td><a class="cell-name" href="/dashboard/clients/{{ $client->id }}">{{ $client->name }}</a></td>
        <td><p class="cell-name">{{ $client->DNI}}</p></td>
        <td><span class="cell-name">{{ $client->address }}</span></td>
        <td><p class="cell-name">{{ $client->phone_number}}</p></td>
        <td><p class="cell-name">{{ $client->email}}</p></td>
        <td style="text-align:right">
          <div style="display:inline-flex;gap:6px">
            <a href="/dashboard/clients/{{ $client->id }}/edit" class="action-btn">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
            </a>
            <form method="POST" action="/clients/{{ $client->id }}">
              @csrf
              @method("DELETE")
             <button class="action-btn danger" title="Delete">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/><path d="M10 11v6M14 11v6"/></svg>
            </button>
            </form>
          </div>
        </td>
      </tr>
        @endforeach
        </tbody>
      </table>
    </div>

{{ $clients->links() }} 

</section>
</x-dashboard-layout>