<x-layout>
     <section class="h-screen flex flex-col justify-center items-center">
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
                        Welcome Back
                    </h2>
                </div>
            </div>

            <form method="POST" action="/login" class="flex flex-col gap-5">
                @csrf
                @error("email")
                    <h2 class="text-red-500">{{ $message }}</h2>
                @enderror
               <div>
                <label class="block text-xs font-semibold text-ghost mb-2" style="font-family:Syne,sans-serif;letter-spacing:0.04em">Email</label>
                <div class="relative">
                  <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-dim pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                  <input id="email-input" name="email" class="nx-input" style="padding-left:38px;padding-right:80px" placeholder="you@zysk.io" >
                  <button type="button" onclick="document.getElementById('email-input').value=''" class="absolute right-3 top-1/2 -translate-y-1/2 text-xs font-semibold text-dim hover:text-ghost transition-colors" style="font-family:Syne,sans-serif">CLEAR</button>
                </div>
              </div>

              <div>
                <label class="block text-xs font-semibold text-ghost mb-2" style="font-family:Syne,sans-serif;letter-spacing:0.04em">Password</label>
                <div class="relative">
                  <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-dim pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                  <input id="pw" type="password" name="password" placeholder="********" class="nx-input" style="padding-left:38px;padding-right:48px">
                  <button type="button" id="togglePwBtn" class="absolute right-3 top-1/2 -translate-y-1/2 text-dim hover:text-ghost transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                  </button>
                </div>
              </div>

                <div class="flex gap-3 pt-1">
              <button type="submit" class="px-5 py-2.5 rounded-xl text-sm font-semibold text-white transition-all duration-200 hover:opacity-90 active:scale-95" style="background:linear-gradient(135deg,#7c3aed,#06b6d4);box-shadow:0 0 20px rgba(124,58,237,0.35);font-family:DM Sans,sans-serif">
                Login
              </button>
                </div>
            </form>
        </div>
    </section>
    <script>
     
   document.getElementById("togglePwBtn").addEventListener("click", () => {
    
    const pw = document.getElementById('pw');
    pw.type = pw.type === 'password' ? 'text' : 'password';
  
   })
    </script>
</x-layout>