<x-app-layout>
    <div
        class="flex flex-col items-center justify-center pt-28 lg:pb-5 px-4 sm:px-6 md:px-10 bg-gradient-to-b from-black to-gray-900 text-gray-100">
        <h1
            class="text-center text-3xl sm:text-5xl lg:text-7xl font-bold text-white max-w-5xl lg:py-0 sm:py-10 leading-tight">
            <span>Ubah Video Reaksi Kimia Menjadi Data Kuantitatif</span>
        </h1>
        <p
            class="text-center text-base sm:text-lg md:text-xl font-light text-white max-w-4xl mt-2 sm:mt-4 py-4 sm:py-8">
            Ubah data eksperimen Anda menjadi wawasan yang dapat ditindaklanjuti dengan AI.
            Analisis kinetika, ukur absorbansi, dan visualisasikan reaksi osilasi hanya dengan beberapa klik.
            Chrono Spectra AI adalah laboratorium kimia di dalam browser Anda — platform analisis video canggih untuk
            penelitian Anda.
        </p>
        <a href="{{ route('page.analisis') }}"
            class="text-base sm:text-lg md:text-xl bg-blue-600 text-white hover:bg-blue-700 transform hover:scale-105 transition duration-200 font-semibold py-3 sm:py-4 px-5 sm:px-6 rounded-lg mt-4 sm:mt-6">
            {{ __('Start Free Analysis') }}
        </a>
        <div class="h-12 sm:h-20"></div>
    </div>

    <div
        class="flex flex-col items-center justify-center px-4 sm:px-6 md:px-10 py-16 sm:py-20 bg-gradient-to-b from-gray-900 via-gray-850 to-gray-950 text-gray-100">
        <div
            class="flex items-center justify-center flex-wrap bg-red-100/10 rounded-full mb-6 px-4 sm:px-6 py-1 border border-red-500/20">
            <img src="{{ asset('images/chemicalAi.png') }}" alt="Hero Image" class="w-8 h-8 sm:w-10 sm:h-10">
            <p class="text-base sm:text-lg font-bold px-3 sm:px-4 text-red-400 text-center">Masalah yang sering
                dihadapi!</p>
        </div>
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-100 mb-3 sm:mb-4 text-center px-2">
            Tinggalkan Spektrofotometer yang Rumit dan Mahal
        </h2>
        <p class="text-sm sm:text-base md:text-lg text-gray-400 max-w-3xl text-center leading-relaxed">
            Analisis kinetika reaksi sering kali membutuhkan peralatan laboratorium berbiaya tinggi serta proses memakan
            waktu. Mengamati perubahan warna secara visual tidaklah cukup untuk mendapatkan data kuantitatif yang
            akurat.
        </p>

        <div class="h-12 sm:h-20"></div>

        <!-- Solusi -->
        <div
            class="flex items-center justify-center flex-wrap bg-green-100/10 rounded-full mb-6 px-4 sm:px-6 py-1 border border-green-500/20">
            <img src="{{ asset('images/chemicalAi.png') }}" alt="Hero Image" class="w-8 h-8 sm:w-10 sm:h-10">
            <p class="text-base sm:text-lg font-bold px-3 sm:px-4 text-green-400 text-center">Solusi Cerdas di Ujung
                Jari Anda</p>
        </div>
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-100 mb-3 sm:mb-4 text-center px-2">
            Kecerdasan Buatan untuk Analisis yang Lebih Cerdas
        </h2>
        <p class="text-sm sm:text-base md:text-lg text-gray-400 max-w-3xl text-center leading-relaxed">
            Chrono Spectra AI mentransformasi kamera smartphone atau webcam Anda menjadi alat analisis yang canggih.
            Unggah video reaksi Anda, dan biarkan kecerdasan buatan kami melakukan analisis untuk mengubah data visual
            menjadi grafik, tabel, dan wawasan yang siap dipublikasikan.
        </p>
    </div>


    <div class="flex flex-wrap justify-center gap-8 py-24 px-10 bg-gray-950 text-gray-100">
        <div
            class="w-[300px] h-[340px] flex flex-col text-center bg-white/10 dark:bg-gray-800/50 backdrop-blur-md px-10 py-8 rounded-2xl shadow-xl hover:shadow-cyan-500/30 transition-all duration-300 transform hover:-translate-y-2 hover:scale-[1.02] border border-gray-700/50">
            <img src="{{ asset('images/chemicalAi.png') }}" alt="Hero Image" class="w-12 h-12 mx-auto mb-5">
            <h2 class="text-xl font-bold text-gray-100 mb-3">Gunakan Perangkat Anda</h2>
            <p class="text-gray-400">
                Tidak perlu peralatan mahal. Smartphone atau kamera web sudah cukup untuk melakukan analisis tingkat
                laboratorium.
            </p>
        </div>
        <div
            class="w-[300px] h-[340px] flex flex-col text-center bg-white/10 dark:bg-gray-800/50 backdrop-blur-md px-10 py-8 rounded-2xl shadow-xl hover:shadow-emerald-400/30 transition-all duration-300 transform hover:-translate-y-2 hover:scale-[1.02] border border-gray-700/50">
            <img src="{{ asset('images/chemicalAi.png') }}" alt="Hero Image" class="w-12 h-12 mx-auto mb-5">
            <h2 class="text-xl font-bold text-gray-100 mb-3">AI yang Canggih</h2>
            <p class="text-gray-400">
                Model CNN-LSTM untuk analisis temporal dan spasial yang akurat. Deteksi otomatis ROI dan kalkulasi
                absorbansi.
            </p>
        </div>
        <div
            class="w-[300px] h-[340px] flex flex-col text-center bg-white/10 dark:bg-gray-800/50 backdrop-blur-md px-10 py-8 rounded-2xl shadow-xl hover:shadow-blue-400/30 transition-all duration-300 transform hover:-translate-y-2 hover:scale-[1.02] border border-gray-700/50">
            <img src="{{ asset('images/chemicalAi.png') }}" alt="Hero Image" class="w-12 h-12 mx-auto mb-5">
            <h2 class="text-xl font-bold text-gray-100 mb-3">Data Akurat</h2>
            <p class="text-gray-400">
                Berdasarkan Hukum Lambert-Beer dengan validasi otomatis untuk memastikan data berada dalam rentang
                linear.
            </p>
        </div>
    </div>

    <div class="flex flex-col items-center justify-center py-24 bg-gray-950 text-gray-100">
        <h1 class="lg:text-4xl text-4xl font-bold text-white mb-6 text-center">
            Analisis dalam 3 Langkah Mudah
        </h1>
        <p class="lg:text-lg text-sm text-gray-400 max-w-3xl text-center mb-16">
            Dari video mentah hingga data yang siap dipublikasikan hanya dalam beberapa menit
        </p>

        <div class="flex flex-wrap justify-center gap-8 px-10">
            @foreach ([1, 2, 3] as $i)
                <div
                    class="relative w-[300px] h-[400px] flex flex-col text-center bg-white/10 dark:bg-gray-800/40 backdrop-blur-md px-12 py-10 rounded-2xl shadow-lg border border-gray-700/50 hover:-translate-y-2 hover:shadow-cyan-500/30 transition-all duration-300">

                    <div
                        class="absolute -top-5 left-1/2 transform -translate-x-1/2 bg-cyan-600 text-white w-10 h-10 flex items-center justify-center rounded-full text-sm font-bold shadow-md">
                        {{ $i }}
                    </div>

                    <img src="{{ asset('images/chemicalAi.png') }}" alt="Hero Image" class="w-14 h-14 mx-auto mb-5">
                    <div class="flex-grow flex flex-col justify-start">
                        @if ($i == 1)
                            <h2 class="text-xl font-semibold text-gray-100 mb-3">Unggah Video Anda</h2>
                            <p class="text-gray-400">Rekam reaksi kimia atau unggah video Anda. Potong bagian tidak
                                perlu dengan editor sederhana kami.</p>
                        @elseif ($i == 2)
                            <h2 class="text-xl font-semibold text-gray-100 mb-3">Mulai Analisis AI</h2>
                            <p class="text-gray-400">Berikan konteks reaksi Anda, klik “Analisis”, dan biarkan AI kami
                                bekerja otomatis.</p>
                        @else
                            <h2 class="text-xl font-semibold text-gray-100 mb-3">Visualisasikan Hasil</h2>
                            <p class="text-gray-400">Dapatkan laporan lengkap berisi grafik interaktif, tabel data, dan
                                narasi ilmiah siap ekspor.</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div
        class="flex flex-col items-center justify-center py-24 bg-gradient-to-b from-gray-950 via-gray-900 to-gray-950 text-gray-100">
      <h1 class="lg:text-4xl text-4xl font-bold text-white mb-6 text-center">
            Lebih dari Sekadar Analisis Biasa
        </h1>
        <p class="text-lg text-gray-400 max-w-3xl text-center mb-16">
            Platform komprehensif yang mengubah cara Anda melakukan analisis kimia kuantitatif
        </p>

        <div class="flex flex-wrap justify-center gap-6 px-8">
            @foreach ([['title' => 'Pengukuran Absorbansi', 'desc' => 'Gunakan perangkat Anda sebagai spektrometer digital. Dapatkan plot absorbansi vs waktu dengan akurasi tinggi.'], ['title' => 'Analisis Kinetika Lanjut', 'desc' => 'Tentukan laju reaksi dan konstanta k secara otomatis dari data video Anda.'], ['title' => 'Analisis Osilasi Cepat', 'desc' => 'Tangkap pola perubahan reaksi kompleks seperti Belousov-Zhabotinsky dengan model AI canggih.'], ['title' => 'Validasi Otomatis', 'desc' => 'Dapatkan peringatan otomatis jika nilai berada di luar rentang linear untuk menjaga validitas.']] as $card)
                <div
                    class="lg:w-[270px] w-[370px] h-[400px] flex flex-col text-start bg-white/10 dark:bg-gray-800/40 backdrop-blur-md px-8 py-8 rounded-2xl shadow-lg hover:shadow-emerald-400/30 border border-gray-700/50 transition-all duration-300 transform hover:-translate-y-2 hover:scale-[1.02]">
                    <img src="{{ asset('images/chemicalAi.png') }}" alt="Hero Image" class="w-12 h-12 mx-auto mb-6">
                    <h2 class="text-lg font-bold text-gray-100 mb-3">{{ $card['title'] }}</h2>
                    <p class="text-gray-400 text-sm">{{ $card['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <div class="py-20 bg-gradient-to-b bg-gray-950 text-gray-100">
        <div
            class="max-w-6xl mx-auto bg-white/10 dark:bg-gray-800/40 backdrop-blur-md lg:rounded-2xl p-10 flex flex-col md:flex-row items-center justify-between gap-10 shadow-lg border border-gray-700/50">

            <div class="flex-1 text-left text-gray-100">
                <h2 class="text-2xl font-bold mb-4 text-white">
                    Teknologi AI Terdepan untuk Analisis Kimia
                </h2>

                <p class="text-sm mb-3">
                    <span class="font-bold text-cyan-400">CNN untuk Analisis Spasial:</span>
                    Deteksi otomatis Region of Interest (ROI) dan ekstraksi warna presisi.
                </p>

                <p class="text-sm mb-3">
                    <span class="font-bold text-emerald-400">LSTM untuk Analisis Temporal:</span>
                    Melacak perubahan dinamis dan pola osilasi secara real-time.
                </p>

                <p class="text-sm">
                    <span class="font-bold text-blue-400">Validasi Real-time:</span>
                    Memastikan semua data berada dalam rentang linear untuk akurasi maksimal.
                </p>
            </div>

            <div class="flex-1 flex justify-center">
                <img src="{{ asset('images/otak-ai.png') }}" alt="AI Chem Illustration" class="w-full max-w-sm">
            </div>
        </div>
    </div>

    <div class="flex flex-col items-center justify-center py-20 px-6 bg-gray-950">
        <h1 class="text-4xl font-bold text-gray-100 mb-6 text-center">
            Rancangan Khusus untuk Dunia Akademis dan Riset
        </h1>
        <p class="text-lg text-gray-400 max-w-3xl text-center mb-16">
            Solusi yang tepat untuk setiap tingkat pendidikan dan penelitian kimia
        </p>

        <div class="flex flex-wrap justify-center gap-8">
            <div
                class="w-[300px] h-[520px] flex flex-col text-start bg-white/10 dark:bg-gray-800/40 backdrop-blur-md px-8 py-8 rounded-2xl shadow-lg border border-gray-700/50 hover:scale-[1.03] hover:shadow-cyan-500/20 transition-all duration-300">
                <img src="{{ asset('images/chemicalAi.png') }}" alt="Hero Image" class="w-16 h-16 mx-auto mb-6">
                <div class="flex-grow flex flex-col justify-start text-gray-300">
                    <h2 class="text-xl font-semibold text-cyan-400 mb-3 text-center">
                        Untuk Mahasiswa & Pelajar
                    </h2>
                    <p class="text-sm mb-4">
                        Pahami konsep kimia abstrak dengan cara yang praktis dan visual. Jadikan laporan praktikum Anda
                        lebih impresif dengan data kuantitatif.
                    </p>
                    <ul class="list-disc pl-5 space-y-1 text-sm text-gray-400">
                        <li>Visualisasi konsep Hukum Lambert-Beer</li>
                        <li>Data kuantitatif untuk laporan praktikum</li>
                        <li>Pemahaman mendalam tentang kinetika kimia</li>
                        <li>Akses gratis untuk belajar</li>
                    </ul>
                </div>
            </div>

            <div
                class="w-[300px] h-[520px] flex flex-col text-start bg-white/10 dark:bg-gray-800/40 backdrop-blur-md px-8 py-8 rounded-2xl shadow-lg border border-gray-700/50 hover:scale-[1.03] hover:shadow-emerald-400/20 transition-all duration-300">
                <img src="{{ asset('images/chemicalAi.png') }}" alt="Hero Image" class="w-16 h-16 mx-auto mb-6">
                <div class="flex-grow flex flex-col justify-start text-gray-300">
                    <h2 class="text-xl font-semibold text-emerald-400 mb-3 text-center">
                        Untuk Dosen & Pendidik
                    </h2>
                    <p class="text-sm mb-4">
                        Ciptakan pengalaman belajar yang interaktif di kelas atau laboratorium. Ubah demonstrasi klasik
                        menjadi eksperimen berbasis data.
                    </p>
                    <ul class="list-disc pl-5 space-y-1 text-sm text-gray-400">
                        <li>Alat bantu mengajar yang interaktif</li>
                        <li>Demonstrasi real-time di kelas</li>
                        <li>Pembelajaran engaging untuk mahasiswa</li>
                        <li>Hemat biaya peralatan laboratorium</li>
                    </ul>
                </div>
            </div>

            <div
                class="w-[300px] h-[520px] flex flex-col text-start bg-white/10 dark:bg-gray-800/40 backdrop-blur-md px-8 py-8 rounded-2xl shadow-lg border border-gray-700/50 hover:scale-[1.03] hover:shadow-blue-400/20 transition-all duration-300">
                <img src="{{ asset('images/chemicalAi.png') }}" alt="Hero Image" class="w-16 h-16 mx-auto mb-6">
                <div class="flex-grow flex flex-col justify-start text-gray-300">
                    <h2 class="text-xl font-semibold text-blue-400 mb-3 text-center">
                        Untuk Peneliti
                    </h2>
                    <p class="text-sm mb-4">
                        Lakukan skrining eksperimen awal dengan cepat dan efisien. Dapatkan data pendahuluan untuk
                        proposal riset atau publikasi ilmiah Anda.
                    </p>
                    <ul class="list-disc pl-5 space-y-1 text-sm text-gray-400">
                        <li>Skrining eksperimen yang efisien</li>
                        <li>Data preliminer untuk riset</li>
                        <li>Analisis batch untuk throughput tinggi</li>
                        <li>Export hasil untuk publikasi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center py-20 bg-gray-950">
        <div
            class="max-w-5xl w-full mx-auto bg-white/10 dark:bg-gray-800/40 backdrop-blur-md lg:rounded-2xl shadow-xl p-10 flex flex-col md:flex-row justify-around items-center gap-10 border border-gray-700/50">

            <div class="text-center">
                <div class="text-4xl font-extrabold text-cyan-400">500+</div>
                <div class="text-sm text-gray-300 mt-2">Mahasiswa & Peneliti</div>
            </div>

            <div class="text-center">
                <div class="text-4xl font-extrabold text-emerald-400">50+</div>
                <div class="text-sm text-gray-300 mt-2">Institusi Pendidikan</div>
            </div>

            <div class="text-center">
                <div class="text-4xl font-extrabold text-blue-400">1000+</div>
                <div class="text-sm text-gray-300 mt-2">Analisis Selesai</div>
            </div>
        </div>
    </div>


    <div class="py-20 px-6 bg-gradient-to-b from-gray-950 via-gray-900 to-gray-950 text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-3">
            Apa Kata Mereka Tentang Chrono Spectra AI?
        </h2>
        <p class="text-gray-400 mb-12 text-sm md:text-base">
            Dipercaya oleh akademisi dan peneliti di seluruh Indonesia
        </p>

        <div class="flex flex-col md:flex-row justify-center gap-8">
            <div
                class="bg-white/10 dark:bg-gray-800/40 backdrop-blur-md rounded-2xl shadow-xl p-8 w-full lg:max-w-sm text-left border border-gray-700/50">
                <div class="flex gap-1 mb-3 text-yellow-400 text-lg">
                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                </div>
                <p class="text-gray-300 text-sm mb-6 italic">
                    "Platform ini mengubah cara saya mengajar kinetika kimia. Mahasiswa jadi lebih antusias karena
                    mereka bisa melihat langsung bagaimana data dihasilkan dari eksperimen yang mereka lakukan."
                </p>
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/user-unkown.png') }}" class="w-10 h-10 rounded-full object-cover"
                        alt="Dr. Anugrah">
                    <p class="font-semibold text-gray-100 text-sm">Dr. Anugrah R.W.</p>
                </div>
            </div>

            <div
                class="bg-white/10 dark:bg-gray-800/40 backdrop-blur-md rounded-2xl shadow-xl p-8 w-full lg:max-w-sm text-left border border-gray-700/50">
                <div class="flex gap-1 mb-3 text-yellow-400 text-lg">
                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                </div>
                <p class="text-gray-300 text-sm mb-6 italic">
                    "Sebagai peneliti, waktu saya sangat berharga. Chrono Spectra AI memungkinkan saya melakukan
                    analisis awal tanpa harus antre menggunakan spektrofotometer. Sangat efisien!"
                </p>
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/user-unkown.png') }}" class="w-10 h-10 rounded-full object-cover"
                        alt="Mohammad">
                    <p class="font-semibold text-gray-100 text-sm">Mohammad I.U.</p>
                </div>
            </div>

            <div
                class="bg-white/10 dark:bg-gray-800/40 backdrop-blur-md rounded-2xl shadow-xl p-8 w-full lg:max-w-sm text-left border border-gray-700/50">
                <div class="flex gap-1 mb-3 text-yellow-400 text-lg">
                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                </div>
                <p class="text-gray-300 text-sm mb-6 italic">
                    "Laporan praktikum saya jadi jauh lebih impresif dengan data kuantitatif dari Chrono Spectra AI.
                    Dosen saya sampai tanya dari mana saya dapat data seakurat ini!"
                </p>
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/user-unkown.png') }}" class="w-10 h-10 rounded-full object-cover"
                        alt="Sarah">
                    <p class="font-semibold text-gray-100 text-sm">Sarah L.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-20 px-6 bg-gray-950 text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-3">
            Temukan Paket yang Tepat untuk Anda
        </h2>
        <p class="text-gray-400 mb-12 text-sm md:text-base">
            Mulai gratis, upgrade sesuai kebutuhan. Semua paket dilengkapi dengan akses penuh ke platform analisis AI
            kami.
        </p>

        <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <div
                class="bg-white/10 backdrop-blur-md border border-gray-700/50 rounded-2xl p-8 flex flex-col items-center shadow-xl">
                <h3 class="text-lg font-bold text-white mb-1">Free</h3>
                <p class="text-sm text-gray-400 mb-4">Sempurna untuk mencoba</p>
                <p class="text-3xl font-extrabold text-cyan-400 mb-6">Gratis</p>
                <ul class="text-sm text-gray-300 text-left space-y-2 mb-6">
                    <li>✔ 5 Analisis / Bulan</li>
                    <li>✔ Analisis Kinetika Dasar</li>
                    <li>✔ Ekspor dengan Watermark</li>
                    <li>✔ Dukungan Email</li>
                </ul>
                <button
                    class="bg-emerald-500 text-white px-6 py-2 rounded-md font-semibold hover:bg-emerald-600 transition">
                    Mulai Gratis
                </button>
            </div>

            <div
                class="bg-white/10 backdrop-blur-md border-2 border-blue-500 rounded-2xl p-8 flex flex-col items-center shadow-xl relative">
                <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                    <span
                        class="bg-blue-500 text-white text-xs px-3 py-1 rounded-full font-semibold flex items-center gap-1">
                        ⚡ Paling Populer
                    </span>
                </div>
                <h3 class="text-lg font-bold text-white mb-1 mt-4">Basic</h3>
                <p class="text-sm text-gray-400 mb-4">Ideal untuk mahasiswa & pendidik</p>
                <p class="text-3xl font-extrabold text-blue-400 mb-6">Rp49.000<span
                        class="text-sm font-normal">/bulan</span></p>
                <ul class="text-sm text-gray-300 text-left space-y-2 mb-6">
                    <li>✔ 50 Analisis / Bulan</li>
                    <li>✔ Semua Fitur Analisis Standar</li>
                    <li>✔ Ekspor Tanpa Watermark</li>
                    <li>✔ Video Frame Rate Tinggi</li>
                    <li>✔ Dukungan Prioritas</li>
                </ul>
                <button class="bg-blue-600 text-white px-6 py-2 rounded-md font-semibold hover:bg-blue-700 transition">
                    Pilih Basic
                </button>
            </div>

            <div
                class="bg-white/10 backdrop-blur-md border border-gray-700/50 rounded-2xl p-8 flex flex-col items-center shadow-xl">
                <h3 class="text-lg font-bold text-white mb-1">Pro</h3>
                <p class="text-sm text-gray-400 mb-4">Solusi lengkap untuk riset</p>
                <p class="text-3xl font-extrabold text-emerald-400 mb-6">Rp149.000<span
                        class="text-sm font-normal">/bulan</span></p>
                <ul class="text-sm text-gray-300 text-left space-y-2 mb-6">
                    <li>✔ Analisis Tanpa Batas</li>
                    <li>✔ Analisis Osilasi Cepat (CNN-LSTM)</li>
                    <li>✔ Analisis Batch</li>
                    <li>✔ API Access</li>
                    <li>✔ Dukungan 24/7</li>
                    <li>✔ Custom Integrations</li>
                </ul>
                <button
                    class="bg-emerald-700 text-white px-6 py-2 rounded-md font-semibold hover:bg-emerald-800 transition">
                    Pilih Pro
                </button>
            </div>
        </div>

        <div
            class="mt-16 bg-white/10 backdrop-blur-md rounded-2xl p-8 max-w-4xl mx-auto border border-gray-700/50 shadow-lg">
            <h4 class="text-lg font-bold mb-4 text-white">Semua Paket Termasuk:</h4>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-2 text-sm text-gray-300 text-left">
                <li>✔ Akses ke semua fitur analisis dasar</li>
                <li>✔ Export hasil ke PDF, Word, Excel</li>
                <li>✔ Visualisasi grafik interaktif</li>
                <li>✔ Cloud storage untuk proyek</li>
                <li>✔ Tutorial dan dokumentasi lengkap</li>
                <li>✔ Update fitur secara berkala</li>
            </div>
        </div>
    </div>

    <div class="py-20 px-6 bg-gray-950 text-center">
        <div
            class="inline-flex items-center px-4 py-2 rounded-full bg-emerald-500/20 text-xs font-semibold uppercase tracking-wide mb-4 text-emerald-300">
            ✨ Revolusi Analisis Kimia ✨
        </div>

        <h2 class="text-2xl md:text-3xl font-bold mb-4 text-white">
            Siap Merevolusi Analisis Kimia Anda?
        </h2>

        <p class="max-w-2xl mx-auto text-sm md:text-base mb-8 text-gray-300">
            Bergabunglah dengan ratusan akademisi dan peneliti yang telah beralih ke cara analisis yang lebih cerdas.
            Dapatkan hasil yang akurat, hemat waktu, dan tingkatkan kualitas riset Anda.
        </p>

        <div class="flex justify-center flex-wrap gap-4 mb-10">
            <a href="#"
                class="inline-flex items-center bg-emerald-600 text-white font-semibold px-6 py-3 rounded-md hover:bg-emerald-500 transition">
                Daftar & dapatkan <span class="hidden sm:inline">&nbsp;Analisis Gratis Anda</span>
                <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10.293 15.707a1 1 0 010-1.414L13.586 11H4a1 1 0 110-2h9.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </a>
            <a href="#"
                class="inline-flex items-center border border-emerald-400 text-emerald-300 font-semibold px-6 py-3 rounded-md hover:bg-emerald-500 hover:text-white transition">
                Pelajari Lebih Lanjut
            </a>
        </div>

        <div class="flex justify-center flex-wrap gap-8 text-sm md:text-base font-medium">
            <div>
                <p class="text-2xl font-bold text-emerald-400">99%</p>
                <p class="text-gray-300">Tingkat Kepuasan</p>
            </div>
            <div>
                <p class="text-2xl font-bold text-emerald-400">500+</p>
                <p class="text-gray-300">Pengguna Aktif</p>
            </div>
            <div>
                <p class="text-2xl font-bold text-emerald-400">24/7</p>
                <p class="text-gray-300">Dukungan Anda</p>
            </div>
        </div>
    </div>

</x-app-layout>
