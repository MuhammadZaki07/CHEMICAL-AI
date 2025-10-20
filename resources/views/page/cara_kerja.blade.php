<x-app-layout>
    <div class="min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-20">

            {{-- Hero Section --}}
            <div class="text-center mb-16 space-y-6">
                <div class="inline-block">
                    <span class="inline-block px-4 py-1.5 bg-blue-500/10 border border-blue-500/20 rounded-full text-blue-400 text-xs sm:text-sm font-medium mb-4">
                        <i class="bi bi-lightbulb-fill mr-1"></i> How It Works
                    </span>
                </div>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white tracking-tight">
                    Cara Kerja <span class="bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">ChemicalAI</span>
                </h1>
                <p class="text-lg sm:text-xl text-slate-400 max-w-3xl mx-auto leading-relaxed">
                    Ubah Video Reaksi Kimia Menjadi Data Kuantitatif dengan AI. Analisis kinetika, ukur absorbansi, dan visualisasikan reaksi hanya dengan beberapa klik.
                </p>
            </div>

            {{-- Main Features Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-20">
                <div class="bg-gradient-to-br from-blue-500/10 to-blue-600/5 backdrop-blur-sm border border-blue-500/20 rounded-3xl p-8 text-center group hover:scale-105 transition-all duration-300">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:rotate-6 transition-transform">
                        <i class="bi bi-camera-video text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Video Input</h3>
                    <p class="text-slate-400 text-sm">Upload video reaksi kimia Anda dengan mudah</p>
                </div>

                <div class="bg-gradient-to-br from-purple-500/10 to-purple-600/5 backdrop-blur-sm border border-purple-500/20 rounded-3xl p-8 text-center group hover:scale-105 transition-all duration-300">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:rotate-6 transition-transform">
                        <i class="bi bi-cpu text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">AI Processing</h3>
                    <p class="text-slate-400 text-sm">Teknologi AI menganalisis setiap frame secara real-time</p>
                </div>

                <div class="bg-gradient-to-br from-emerald-500/10 to-emerald-600/5 backdrop-blur-sm border border-emerald-500/20 rounded-3xl p-8 text-center group hover:scale-105 transition-all duration-300">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:rotate-6 transition-transform">
                        <i class="bi bi-graph-up-arrow text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Data Analytics</h3>
                    <p class="text-slate-400 text-sm">Dapatkan hasil analisis kuantitatif yang akurat</p>
                </div>
            </div>

            {{-- Step by Step Process --}}
            <div class="mb-16">
                <div class="text-center mb-12">
                    <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">Langkah-Langkah Mudah</h2>
                    <p class="text-slate-400 text-lg">Ikuti 4 langkah sederhana untuk menganalisis video reaksi kimia Anda</p>
                </div>

                <div class="space-y-8">
                    {{-- Step 1 --}}
                    <div class="relative">
                        <div class="flex flex-col lg:flex-row items-center gap-8">
                            <div class="flex-shrink-0">
                                <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-3xl flex items-center justify-center shadow-lg shadow-blue-500/50">
                                    <span class="text-3xl font-bold text-white">1</span>
                                </div>
                            </div>
                            <div class="flex-1 bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-8 hover:border-blue-500/30 transition-all duration-300">
                                <div class="flex items-start gap-6">
                                    <div class="flex-shrink-0 w-12 h-12 bg-blue-500/20 rounded-xl flex items-center justify-center">
                                        <i class="bi bi-box-arrow-in-right text-blue-400 text-2xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-2xl font-bold text-white mb-3">Login / Daftar Akun</h3>
                                        <p class="text-slate-400 mb-4 leading-relaxed">
                                            Mulai dengan membuat akun atau login untuk mengakses semua fitur analisis. Proses pendaftaran hanya membutuhkan waktu kurang dari 1 menit.
                                        </p>
                                        <div class="flex flex-wrap gap-2">
                                            <span class="px-3 py-1 bg-blue-500/20 border border-blue-500/30 rounded-lg text-blue-400 text-sm">Gratis</span>
                                            <span class="px-3 py-1 bg-blue-500/20 border border-blue-500/30 rounded-lg text-blue-400 text-sm">Cepat</span>
                                            <span class="px-3 py-1 bg-blue-500/20 border border-blue-500/30 rounded-lg text-blue-400 text-sm">Aman</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Step 2 --}}
                    <div class="relative">
                        <div class="flex flex-col lg:flex-row items-center gap-8">
                            <div class="flex-shrink-0">
                                <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-3xl flex items-center justify-center shadow-lg shadow-purple-500/50">
                                    <span class="text-3xl font-bold text-white">2</span>
                                </div>
                            </div>
                            <div class="flex-1 bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-8 hover:border-purple-500/30 transition-all duration-300">
                                <div class="flex items-start gap-6">
                                    <div class="flex-shrink-0 w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center">
                                        <i class="bi bi-cloud-upload text-purple-400 text-2xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-2xl font-bold text-white mb-3">Upload Video Reaksi</h3>
                                        <p class="text-slate-400 mb-4 leading-relaxed">
                                            Upload video reaksi kimia yang ingin Anda analisis. Sistem mendukung berbagai format video populer seperti MP4, AVI, dan MOV.
                                        </p>
                                        <div class="grid grid-cols-2 gap-3 mb-4">
                                            <div class="bg-purple-500/10 border border-purple-500/20 rounded-xl p-3">
                                                <div class="flex items-center gap-2 mb-1">
                                                    <i class="bi bi-file-earmark-play text-purple-400 text-sm"></i>
                                                    <span class="text-xs text-purple-400 font-medium">Format</span>
                                                </div>
                                                <div class="text-white text-sm font-semibold">MP4, AVI, MOV</div>
                                            </div>
                                            <div class="bg-purple-500/10 border border-purple-500/20 rounded-xl p-3">
                                                <div class="flex items-center gap-2 mb-1">
                                                    <i class="bi bi-hourglass-split text-purple-400 text-sm"></i>
                                                    <span class="text-xs text-purple-400 font-medium">Durasi Min</span>
                                                </div>
                                                <div class="text-white text-sm font-semibold">5 Detik</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Step 3 --}}
                    <div class="relative">
                        <div class="flex flex-col lg:flex-row items-center gap-8">
                            <div class="flex-shrink-0">
                                <div class="w-20 h-20 bg-gradient-to-br from-amber-500 to-amber-600 rounded-3xl flex items-center justify-center shadow-lg shadow-amber-500/50">
                                    <span class="text-3xl font-bold text-white">3</span>
                                </div>
                            </div>
                            <div class="flex-1 bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-8 hover:border-amber-500/30 transition-all duration-300">
                                <div class="flex items-start gap-6">
                                    <div class="flex-shrink-0 w-12 h-12 bg-amber-500/20 rounded-xl flex items-center justify-center">
                                        <i class="bi bi-scissors text-amber-400 text-2xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-2xl font-bold text-white mb-3">Crop & Trim Video</h3>
                                        <p class="text-slate-400 mb-4 leading-relaxed">
                                            Sesuaikan area ROI (Region of Interest) dan potong durasi video sesuai kebutuhan analisis Anda. Fitur ini membantu fokus pada area reaksi yang penting.
                                        </p>
                                        <div class="space-y-3">
                                            <div class="flex items-start gap-3">
                                                <div class="w-6 h-6 bg-amber-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                                    <i class="bi bi-crop text-amber-400 text-xs"></i>
                                                </div>
                                                <div>
                                                    <div class="text-white font-semibold text-sm mb-1">Crop/Resize Canvas ROI</div>
                                                    <div class="text-slate-400 text-sm">Tentukan area spesifik yang ingin dianalisis</div>
                                                </div>
                                            </div>
                                            <div class="flex items-start gap-3">
                                                <div class="w-6 h-6 bg-amber-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                                    <i class="bi bi-scissors text-amber-400 text-xs"></i>
                                                </div>
                                                <div>
                                                    <div class="text-white font-semibold text-sm mb-1">Trim Selection (Optional)</div>
                                                    <div class="text-slate-400 text-sm">Potong video minimal 5 detik sesuai kebutuhan</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Step 4 --}}
                    <div class="relative">
                        <div class="flex flex-col lg:flex-row items-center gap-8">
                            <div class="flex-shrink-0">
                                <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-3xl flex items-center justify-center shadow-lg shadow-emerald-500/50">
                                    <span class="text-3xl font-bold text-white">4</span>
                                </div>
                            </div>
                            <div class="flex-1 bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-8 hover:border-emerald-500/30 transition-all duration-300">
                                <div class="flex items-start gap-6">
                                    <div class="flex-shrink-0 w-12 h-12 bg-emerald-500/20 rounded-xl flex items-center justify-center">
                                        <i class="bi bi-sliders text-emerald-400 text-2xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-2xl font-bold text-white mb-3">Parameter Kinetika</h3>
                                        <p class="text-slate-400 mb-4 leading-relaxed">
                                            Lengkapi parameter yang diperlukan untuk analisis kinetika. Data ini penting untuk mendapatkan hasil analisis yang akurat dan komprehensif.
                                        </p>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                            <div class="flex items-center gap-3 bg-emerald-500/10 border border-emerald-500/20 rounded-xl p-3">
                                                <i class="bi bi-droplet text-emerald-400"></i>
                                                <span class="text-white text-sm">Konsentrasi Awal (M)</span>
                                            </div>
                                            <div class="flex items-center gap-3 bg-emerald-500/10 border border-emerald-500/20 rounded-xl p-3">
                                                <i class="bi bi-speedometer text-emerald-400"></i>
                                                <span class="text-white text-sm">pH</span>
                                            </div>
                                            <div class="flex items-center gap-3 bg-emerald-500/10 border border-emerald-500/20 rounded-xl p-3">
                                                <i class="bi bi-cup text-emerald-400"></i>
                                                <span class="text-white text-sm">Volume Total (mL)</span>
                                            </div>
                                            <div class="flex items-center gap-3 bg-emerald-500/10 border border-emerald-500/20 rounded-xl p-3">
                                                <i class="bi bi-water text-emerald-400"></i>
                                                <span class="text-white text-sm">Pelarut</span>
                                            </div>
                                            <div class="flex items-center gap-3 bg-emerald-500/10 border border-emerald-500/20 rounded-xl p-3">
                                                <i class="bi bi-arrow-repeat text-emerald-400"></i>
                                                <span class="text-white text-sm">Laju Pengadukan (rpm)</span>
                                            </div>
                                            <div class="flex items-center gap-3 bg-emerald-500/10 border border-emerald-500/20 rounded-xl p-3">
                                                <i class="bi bi-tag text-emerald-400"></i>
                                                <span class="text-white text-sm">Nama Reaksi</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Result Preview --}}
            <div class="bg-gradient-to-br from-cyan-500/10 to-blue-500/5 backdrop-blur-xl border border-cyan-500/20 rounded-3xl p-8 sm:p-12 mb-16">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="bi bi-magic text-white text-3xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-white mb-3">Hasil Analisis Komprehensif</h2>
                    <p class="text-slate-400 text-lg max-w-2xl mx-auto">
                        Setelah proses analisis selesai, Anda akan mendapatkan data kuantitatif yang lengkap
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-white/5 border border-white/10 rounded-2xl p-6 text-center">
                        <i class="bi bi-graph-up text-cyan-400 text-3xl mb-3"></i>
                        <h4 class="text-white font-semibold mb-1">Grafik Linearisasi</h4>
                        <p class="text-slate-400 text-sm">Visualisasi orde reaksi</p>
                    </div>
                    <div class="bg-white/5 border border-white/10 rounded-2xl p-6 text-center">
                        <i class="bi bi-table text-blue-400 text-3xl mb-3"></i>
                        <h4 class="text-white font-semibold mb-1">Data Kinetika</h4>
                        <p class="text-slate-400 text-sm">Konstanta laju & R²</p>
                    </div>
                    <div class="bg-white/5 border border-white/10 rounded-2xl p-6 text-center">
                        <i class="bi bi-droplet-fill text-purple-400 text-3xl mb-3"></i>
                        <h4 class="text-white font-semibold mb-1">Analisis Gelembung</h4>
                        <p class="text-slate-400 text-sm">Deteksi & perhitungan</p>
                    </div>
                    <div class="bg-white/5 border border-white/10 rounded-2xl p-6 text-center">
                        <i class="bi bi-lightbulb-fill text-amber-400 text-3xl mb-3"></i>
                        <h4 class="text-white font-semibold mb-1">Interpretasi AI</h4>
                        <p class="text-slate-400 text-sm">Insight & rekomendasi</p>
                    </div>
                </div>
            </div>

            {{-- CTA Section --}}
            <div class="text-center bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-12">
                <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">Siap Memulai Analisis?</h2>
                <p class="text-slate-400 text-lg mb-8 max-w-2xl mx-auto">
                    Bergabung dengan peneliti yang telah menggunakan ChemicalAI untuk mempercepat riset mereka
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('register') }}"
                       class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-blue-500 text-white px-8 py-4 rounded-xl shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 hover:scale-105 transition-all duration-200 font-semibold text-lg">
                        <i class="bi bi-rocket-takeoff"></i>
                        Mulai Sekarang
                    </a>
                    <a href="{{ route('page.analisis') }}"
                       class="inline-flex items-center gap-2 bg-white/5 border border-white/10 text-white px-8 py-4 rounded-xl hover:bg-white/10 hover:scale-105 transition-all duration-200 font-semibold text-lg">
                        <i class="bi bi-play-circle"></i>
                        Lihat Demo
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
