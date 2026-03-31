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
                       Update Service
                    </h2>
                </div>
            </div>
  
  <form method="POST" action="/dashboard/services/{{ $service->id }}" class="flex flex-col gap-5">
      @csrf
      @method("PUT")
      <div>
      <label class="block text-xs font-semibold text-ghost mb-2" style="font-family:Syne,sans-serif;letter-spacing:0.04em">Service Name</label>
      <input class="nx-input" name="service_name" value="{{ $service->service_name }}" placeholder="Service Name">
        </div>

           <div>
                <label class="block text-xs font-semibold text-ghost mb-2" style="font-family:Syne,sans-serif;letter-spacing:0.04em">Description</label>
                <textarea 
                class="nx-input resize-none"
                 name="description"
                  rows="3"
                placeholder="Service Description">{{ $service->description }}</textarea>
              </div>

              <div>
      <label class="block text-xs font-semibold text-ghost mb-2" style="font-family:Syne,sans-serif;letter-spacing:0.04em">Price</label>
      <input class="nx-input" value="{{ $service->price }}" name="price" placeholder="Service Price"">
        </div>

    <div>
      <span>Is Active?</span>
          
  <input type="checkbox"
  class="nx-checkbox"
  {{ $service->is_active ? 'checked' : '' }}
  name="is_active"  >


    </div>

    
       <div>
          <button type="submit" class="px-5 py-2.5 rounded-xl text-sm font-semibold text-white transition-all duration-200 hover:opacity-90 active:scale-95" style="background:linear-gradient(135deg,#7c3aed,#06b6d4);box-shadow:0 0 20px rgba(124,58,237,0.35);font-family:DM Sans,sans-serif">
      Update
        </button>
       </div>
      </div>
      </form>   
    
    </div>
</x-dashboard-layout>