 <footer>
     <div class="flex flex-col items-center justify-center bg-gradient-to-b from-sky-600 to-indigo-800 px-6 py-16 dark:from-slate-700 dark:to-slate-800 text-white">
         <div class="mb-4">
             @if ($settingItems['logo']->value && Storage::disk('public')->exists($settingItems['logo']->value))
                 <img src="{{ Storage::url($settingItems['logo']->value) }}" alt="logo" class="h-14 rounded-lg object-contain shadow-md" />
             @else
                 <img src="{{ asset('/') }}assets/images/image-thumbnail.jpg" alt="logo" class="h-14 rounded-lg object-contain shadow-md" />
             @endif
         </div>
         <p class="text-center text-sm leading-relaxed max-w-xl text-gray-200 dark:text-gray-300">
             Dinas Komunikasi dan Informatika Kabupaten Sarolangun<br />
             Kompl. Perkantoran Gunung Kembang, Kel. Sarolangun Kembang,<br />
             Kec. Sarolangun, Kab. Sarolangun, Prov. Jambi.
         </p>
     </div>

     <div class="bg-indigo-900 px-6 py-6 dark:bg-slate-900 text-gray-100    dark:border-slate-700">
         <p class="text-center text-xs md:text-sm text-gray-200 dark:text-gray-300">
             © 2023. Hak Cipta Dilindungi - Desain oleh TIK & e-Goverment, Dikelola oleh IKP <br class="hidden md:block" />
             <strong>Diskominfo Kab. Sarolangun</strong>.
         </p>
     </div>
 </footer>
