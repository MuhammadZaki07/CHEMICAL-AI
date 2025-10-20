<x-app-layout>
    <div class="min-h-screen">
        <div class="py-12 sm:py-20 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">

            {{-- Hero Section --}}
            <div class="text-center mb-12 space-y-6">
                <div class="inline-block">
                    <span class="inline-block px-4 py-1.5 bg-blue-500/10 border border-blue-500/20 rounded-full text-blue-400 text-xs sm:text-sm font-medium mb-4">
                        <i class="bi bi-upload mr-1"></i> Upload & Analyze
                    </span>
                </div>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white tracking-tight">
                    Analisis Video Reaksi Kimia
                </h1>
                <p class="text-base sm:text-lg text-slate-400 max-w-2xl mx-auto leading-relaxed">
                    Upload video reaksi kimia Anda dan dapatkan analisis kuantitatif yang akurat dengan teknologi AI
                </p>
            </div>

            {{-- Header Section with Button --}}
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6 max-w-6xl mx-auto mb-10">
                <div class="text-start">
                    <h2 class="text-2xl sm:text-3xl font-bold text-white mb-2">
                        Upload Video Anda
                    </h2>
                    <p class="text-sm sm:text-base text-slate-400">
                        Mulai analisis dengan mengupload video reaksi kimia
                    </p>
                </div>

                <div class="w-full sm:w-auto">
                    <a href="{{ route('analisis.history') }}"
                       class="group relative inline-flex items-center justify-center gap-3 px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-blue-600 to-blue-500 text-white rounded-xl shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 hover:scale-105 transition-all duration-200 font-semibold text-base sm:text-lg overflow-hidden w-full sm:w-auto">
                        <span class="relative z-10 flex items-center gap-2">
                            <i class="bi bi-clock-history text-xl group-hover:rotate-12 transition-transform"></i>
                            <span>Riwayat Analisis</span>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </a>
                </div>
            </div>

            {{-- Main Upload Section --}}
            <div class="max-w-6xl mx-auto">
                <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl shadow-2xl p-6 sm:p-10">
                    @include('analysis.form-upload')
                </div>
            </div>

            {{-- Info Cards --}}
            <div class="max-w-6xl mx-auto mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gradient-to-br from-blue-500/10 to-blue-600/5 backdrop-blur-sm border border-blue-500/20 rounded-2xl p-6 text-center group hover:scale-105 transition-all duration-300">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:rotate-6 transition-transform">
                        <i class="bi bi-lightning-charge text-white text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">Cepat & Akurat</h3>
                    <p class="text-slate-400 text-sm">
                        Hasil analisis dalam hitungan menit dengan akurasi hingga 99%
                    </p>
                </div>

                <div class="bg-gradient-to-br from-emerald-500/10 to-emerald-600/5 backdrop-blur-sm border border-emerald-500/20 rounded-2xl p-6 text-center group hover:scale-105 transition-all duration-300">
                    <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:rotate-6 transition-transform">
                        <i class="bi bi-shield-check text-white text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">Aman & Terpercaya</h3>
                    <p class="text-slate-400 text-sm">
                        Data Anda terenkripsi dan tersimpan dengan sistem keamanan tinggi
                    </p>
                </div>

                <div class="bg-gradient-to-br from-purple-500/10 to-purple-600/5 backdrop-blur-sm border border-purple-500/20 rounded-2xl p-6 text-center group hover:scale-105 transition-all duration-300">
                    <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:rotate-6 transition-transform">
                        <i class="bi bi-graph-up-arrow text-white text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">Analisis Mendalam</h3>
                    <p class="text-slate-400 text-sm">
                        Dapatkan grafik, data kinetika, dan interpretasi lengkap
                    </p>
                </div>
            </div>

            {{-- Quick Guide Section --}}
            <div class="max-w-6xl mx-auto mt-12 bg-gradient-to-br from-slate-800/50 to-slate-900/50 backdrop-blur-xl border border-white/10 rounded-3xl p-8 sm:p-10">
                <div class="flex items-start gap-4 mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="bi bi-info-circle text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl sm:text-2xl font-bold text-white mb-2">Panduan Cepat</h3>
                        <p class="text-slate-400 text-sm sm:text-base">Ikuti langkah-langkah berikut untuk hasil terbaik</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-white/5 border border-white/10 rounded-2xl p-5">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-8 h-8 bg-blue-500/20 rounded-lg flex items-center justify-center">
                                <span class="text-blue-400 font-bold">1</span>
                            </div>
                            <h4 class="text-white font-semibold text-sm">Upload Video</h4>
                        </div>
                        <p class="text-slate-400 text-xs leading-relaxed">
                            Pilih file video reaksi kimia dari komputer Anda
                        </p>
                    </div>

                    <div class="bg-white/5 border border-white/10 rounded-2xl p-5">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-8 h-8 bg-purple-500/20 rounded-lg flex items-center justify-center">
                                <span class="text-purple-400 font-bold">2</span>
                            </div>
                            <h4 class="text-white font-semibold text-sm">Crop & Trim</h4>
                        </div>
                        <p class="text-slate-400 text-xs leading-relaxed">
                            Sesuaikan area ROI dan durasi video yang diinginkan
                        </p>
                    </div>

                    <div class="bg-white/5 border border-white/10 rounded-2xl p-5">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-8 h-8 bg-emerald-500/20 rounded-lg flex items-center justify-center">
                                <span class="text-emerald-400 font-bold">3</span>
                            </div>
                            <h4 class="text-white font-semibold text-sm">Parameter</h4>
                        </div>
                        <p class="text-slate-400 text-xs leading-relaxed">
                            Isi parameter kinetika yang diperlukan untuk analisis
                        </p>
                    </div>

                    <div class="bg-white/5 border border-white/10 rounded-2xl p-5">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-8 h-8 bg-amber-500/20 rounded-lg flex items-center justify-center">
                                <span class="text-amber-400 font-bold">4</span>
                            </div>
                            <h4 class="text-white font-semibold text-sm">Analisis</h4>
                        </div>
                        <p class="text-slate-400 text-xs leading-relaxed">
                            Tunggu proses analisis AI dan lihat hasilnya
                        </p>
                    </div>
                </div>

                <div class="mt-6 flex justify-center">
                    <a href="{{ route('page.cara_kerja') }}"
                       class="inline-flex items-center gap-2 text-blue-400 hover:text-blue-300 transition-colors text-sm font-medium">
                        <span>Pelajari selengkapnya tentang cara kerja</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            {{-- Supported Formats --}}
            <div class="max-w-6xl mx-auto mt-10 text-center">
                <p class="text-slate-500 text-sm mb-3">Format video yang didukung:</p>
                <div class="flex flex-wrap justify-center gap-3">
                    <span class="px-4 py-2 bg-white/5 border border-white/10 rounded-lg text-slate-400 text-xs font-medium">MP4</span>
                    <span class="px-4 py-2 bg-white/5 border border-white/10 rounded-lg text-slate-400 text-xs font-medium">AVI</span>
                    <span class="px-4 py-2 bg-white/5 border border-white/10 rounded-lg text-slate-400 text-xs font-medium">MOV</span>
                    <span class="px-4 py-2 bg-white/5 border border-white/10 rounded-lg text-slate-400 text-xs font-medium">MKV</span>
                    <span class="px-4 py-2 bg-white/5 border border-white/10 rounded-lg text-slate-400 text-xs font-medium">WMV</span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
