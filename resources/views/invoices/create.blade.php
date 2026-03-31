<x-dashboard-layout>

           <div class="glass-card p-8 sm:p-10 min-w-lg">
            <div class="flex items-center gap-3 mb-8">
                <div
                    class="w-9 h-9 rounded-xl bg-indigo-600/20 border border-indigo-500/20 flex items-center justify-center"
                >
                    <svg
                        class="w-4 h-4 text-indigo-400"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-white text-base font-semibold">
                       Add Invoice
                    </h2>
                </div>
            </div>
  
  <form method="POST" action="/invoices" class="flex flex-col gap-5">
      @csrf

    <div class="flex justify-between">
        <div>
         <label class="block text-xs font-semibold text-ghost mb-2" style="font-family:Syne,sans-serif;letter-spacing:0.04em">Client</label>
        <select name="client_id"  class="nx-select">
            @foreach ($clients as $client)
                 <option value="{{ $client->id }}" >{{ $client->name }}</option>
            @endforeach
                 
             </select>
       </div>

          <div>
                <label class="block text-xs font-semibold text-ghost mb-2" style="font-family:Syne,sans-serif;letter-spacing:0.04em">Expiration Date</label>
          <input class="nx-input" name="expiration_date" type="date">
         </div>

 
      </div>

       <div id="services-container">

       </div>

    <div>
        <button type="button" id="add-service-btn" class="btn-primary">Add Service</button>
    </div>



<input type="hidden" name="sub_total"    id="hidden-subtotal">
<input type="hidden" name="tax_value"    id="hidden-tax-value">
<input type="hidden" name="final_value"  id="hidden-total">


  

    <div class="flex justify-between">
      <div>
          <label class="block text-xs font-semibold text-ghost mb-2" style="font-family:Syne,sans-serif;letter-spacing:0.04em">Notes</label>
        <textarea class="nx-input resize-none" name="notes" rows="3" placeholder="Invoice Notes (Optional)"></textarea>
    </div>

   <div class="flex flex-col items-end gap-2 text-sm">
    <div class="flex justify-between w-48">
        <span class="text-ghost">Subtotal:</span>
        <span id="display-subtotal" class="font-semibold text-white">$0</span>
    </div>
    <div class="flex justify-between items-center w-48 gap-2">
        <span class="text-ghost">IVA (%):</span>
        <input class="nx-input w-16 text-center" id="tax_percentage_input"
               name="tax_percentage" type="number" value="19" min="0" max="100"
               oninput="recalculate()">
        <span id="display-tax-value" class="font-semibold text-white">$0</span>
    </div>
    <div class="flex justify-between w-48 border-t border-white/10 pt-2 mt-1">
        <span class="text-ghost font-bold">Total:</span>
        <span id="display-total" class="font-bold text-white text-base">$0</span>
    </div>
</div>
      

      </div>
   <div>             <button type="submit" class="px-5 py-2.5 rounded-xl text-sm font-semibold text-white transition-all duration-200 hover:opacity-90 active:scale-95" style="background:linear-gradient(135deg,#7c3aed,#06b6d4);box-shadow:0 0 20px rgba(124,58,237,0.35);font-family:DM Sans,sans-serif">
      Add
        </button></div>

      </form>   
    
    </div>

<script>
  const optionServices = `
    @foreach ($services as $service)
      <option value="{{ $service->id }}" data-price="{{ $service->price }}">{{ $service->service_name }}</option>
    @endforeach
  `;

  let serviceIdCounter = 0;
  let services = [];

  function createHTMLContent(id) {
    return `
      <div class="flex justify-between items-center gap-4 mb-4" id="service-row-${id}">
        <div>
          <label class="block text-xs font-semibold text-ghost mb-2" style="font-family:Syne,sans-serif;letter-spacing:0.04em">Service</label>
          <select class="nx-select" name="service_id[]" onchange="onServiceChange(this, ${id})">
            ${optionServices}
          </select>
        </div>

        <div>
          <label class="block text-xs font-semibold text-ghost mb-2" style="font-family:Syne,sans-serif;letter-spacing:0.04em">Quantity</label>
          <input class="nx-input" value="1" name="quantity[]" type="number" min="1"
            id="qty-${id}" oninput="recalculate()">
        </div>

        <div>
          <label class="block text-xs font-semibold text-ghost mb-2" style="font-family:Syne,sans-serif;letter-spacing:0.04em">Unit Price</label>
          <input class="nx-input" value="0" name="unit_price[]" type="number" min="0"
            id="price-${id}" oninput="recalculate()">
        </div>

        <div>
          <label class="block text-xs font-semibold text-ghost mb-2" style="font-family:Syne,sans-serif;letter-spacing:0.04em">Subtotal</label>
          <input class="nx-input" id="sub-${id}" type="text" value="$0" readonly
            style="background:transparent;cursor:default;font-weight:700;">
        </div>

        <div class="mt-5">
          <button type="button" class="btn btn-primary" onclick="deleteRow(${id})">✕</button>
        </div>
      </div>
    `;
  }

  function onServiceChange(select, id) {
    // Llena el precio automáticamente al elegir servicio
    const selectedOption = select.options[select.selectedIndex];
    const price = selectedOption.getAttribute('data-price') || 0;
    document.getElementById(`price-${id}`).value = price;
    recalculate();
  }

  const servicesContainer = document.getElementById("services-container");

  function addRow() {
    serviceIdCounter++;
    services.push(serviceIdCounter);
    renderServices();
    recalculate();
  }

  function deleteRow(id) {
    services = services.filter(s => s !== id);
    renderServices();
    recalculate();
  }

  function renderServices() {
    servicesContainer.innerHTML = services
      .map(id => createHTMLContent(id))
      .join('');
  }

  function recalculate() {
    let subtotal = 0;

    services.forEach(id => {
      const qty   = parseFloat(document.getElementById(`qty-${id}`)?.value) || 0;
      const price = parseFloat(document.getElementById(`price-${id}`)?.value) || 0;
      const sub   = qty * price;
      subtotal += sub;

      const subEl = document.getElementById(`sub-${id}`);
      if (subEl) subEl.value = formatCurrency(sub);
    });

    const taxPct  = parseFloat(document.getElementById('tax_percentage_input').value) || 0;
    const taxVal  = subtotal * (taxPct / 100);
    const total   = subtotal + taxVal;

    document.getElementById('display-subtotal').textContent = formatCurrency(subtotal);
    document.getElementById('display-tax-value').textContent = formatCurrency(taxVal);
    document.getElementById('display-total').textContent = formatCurrency(total);

    // Campos hidden que se envían al controller
    document.getElementById('hidden-subtotal').value  = subtotal.toFixed(2);
    document.getElementById('hidden-tax-value').value = taxVal.toFixed(2);
    document.getElementById('hidden-total').value     = total.toFixed(2);
  }

  function formatCurrency(val) {
    return '$' + val.toLocaleString('es-CO', { minimumFractionDigits: 2 });
  }

  document.getElementById("add-service-btn").addEventListener("click", addRow);

  // Arranca con 1 fila por defecto
  addRow();
</script>



</x-dashboard-layout>