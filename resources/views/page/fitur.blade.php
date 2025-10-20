<x-app-layout>
    <div class="min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-20">

            {{-- Hero Section --}}
            <div class="text-center mb-16 space-y-6">
                <div class="inline-block">
                    <span class="inline-block px-4 py-1.5 bg-gradient-to-r from-blue-500/10 to-purple-500/10 border border-blue-500/20 rounded-full text-blue-400 text-xs sm:text-sm font-medium mb-4">
                        <i class="bi bi-stars mr-1"></i> Powerful Features
                    </span>
                </div>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white tracking-tight">
                    Fitur <span class="bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400 bg-clip-text text-transparent">Unggulan</span>
                </h1>
                <p class="text-lg sm:text-xl text-slate-400 max-w-3xl mx-auto leading-relaxed">
                    Teknologi canggih untuk analisis video reaksi kimia dengan presisi tinggi dan hasil yang komprehensif
                </p>
            </div>

            {{-- Main Feature Highlights --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-20">
                {{-- AI-Powered Analysis --}}
                <div class="group bg-gradient-to-br from-blue-500/10 to-purple-500/5 backdrop-blur-xl border border-blue-500/20 rounded-3xl p-8 hover:border-blue-500/40 transition-all duration-300 hover:scale-[1.02]">
                    <div class="flex items-start gap-6">
                        <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-500 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-500/50 group-hover:rotate-6 transition-transform">
                            <i class="bi bi-robot text-white text-3xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-white mb-3">AI-Powered Analysis</h3>
                            <p class="text-slate-400 mb-4 leading-relaxed">
                                Teknologi kecerdasan buatan yang menganalisis setiap frame video secara otomatis untuk mengekstrak data kinetika dengan akurasi tinggi.
                            </p>
                            <div class="space-y-2">
                                <div class="flex items-center gap-2 text-slate-300 text-sm">
                                    <i class="bi bi-check-circle-fill text-blue-400"></i>
                                    <span>Real-time processing</span>
                                </div>
                                <div class="flex items-center gap-2 text-slate-300 text-sm">
                                    <i class="bi bi-check-circle-fill text-blue-400"></i>
                                    <span>Deep learning algorithms</span>
                                </div>
                                <div class="flex items-center gap-2 text-slate-300 text-sm">
                                    <i class="bi bi-check-circle-fill text-blue-400"></i>
                                    <span>Akurasi hingga 99%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Video Processing --}}
                <div class="group bg-gradient-to-br from-purple-500/10 to-pink-500/5 backdrop-blur-xl border border-purple-500/20 rounded-3xl p-8 hover:border-purple-500/40 transition-all duration-300 hover:scale-[1.02]">
                    <div class="flex items-start gap-6">
                        <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg shadow-purple-500/50 group-hover:rotate-6 transition-transform">
                            <i class="bi bi-film text-white text-3xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-white mb-3">Advanced Video Processing</h3>
                            <p class="text-slate-400 mb-4 leading-relaxed">
                                Sistem pemrosesan video canggih yang mendukung berbagai format dan resolusi dengan tools editing yang intuitif.
                            </p>
                            <div class="space-y-2">
                                <div class="flex items-center gap-2 text-slate-300 text-sm">
                                    <i class="bi bi-check-circle-fill text-purple-400"></i>
                                    <span>Multi-format support (MP4, AVI, MOV)</span>
                                </div>
                                <div class="flex items-center gap-2 text-slate-300 text-sm">
                                    <i class="bi bi-check-circle-fill text-purple-400"></i>
                                    <span>ROI selection & trimming</span>
                                </div>
                                <div class="flex items-center gap-2 text-slate-300 text-sm">
                                    <i class="bi bi-check-circle-fill text-purple-400"></i>
                                    <span>Frame-by-frame analysis</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Feature Grid --}}
            <div class="mb-16">
                <div class="text-center mb-12">
                    <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">Fitur Lengkap untuk Riset Anda</h2>
                    <p class="text-slate-400 text-lg">Semua yang Anda butuhkan dalam satu platform</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    {{-- Kinetics Analysis --}}
                    <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-6 hover:border-emerald-500/30 hover:scale-105 transition-all duration-300 group">
                        <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center mb-4 group-hover:rotate-6 transition-transform">
                            <i class="bi bi-graph-up text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Analisis Kinetika</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">
                            Hitung konstanta laju reaksi (k), orde reaksi, dan waktu paruh dengan akurasi tinggi untuk berbagai jenis reaksi kimia.
                        </p>
                    </div>

                    {{-- Linearization Graphs --}}
                    <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-6 hover:border-blue-500/30 hover:scale-105 transition-all duration-300 group">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-4 group-hover:rotate-6 transition-transform">
                            <i class="bi bi-bar-chart-line text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Grafik Linearisasi</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">
                            Visualisasi otomatis untuk orde 0, 1, dan 2 dengan perhitungan R² untuk menentukan orde reaksi terbaik.
                        </p>
                    </div>

                    {{-- Bubble Detection --}}
                    <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-6 hover:border-cyan-500/30 hover:scale-105 transition-all duration-300 group">
                        <div class="w-14 h-14 bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-xl flex items-center justify-center mb-4 group-hover:rotate-6 transition-transform">
                            <i class="bi bi-droplet-fill text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Deteksi Gelembung</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">
                            Algoritma computer vision untuk mendeteksi dan menghitung gelembung gas yang terbentuk selama reaksi berlangsung.
                        </p>
                    </div>

                    {{-- Absorbance Measurement --}}
                    <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-6 hover:border-amber-500/30 hover:scale-105 transition-all duration-300 group">
                        <div class="w-14 h-14 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center mb-4 group-hover:rotate-6 transition-transform">
                            <i class="bi bi-eye text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Pengukuran Absorbansi</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">
                            Analisis perubahan warna dan intensitas untuk mengukur konsentrasi reaktan secara real-time dari video.
                        </p>
                    </div>

                    {{-- Data Export --}}
                    <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-6 hover:border-purple-500/30 hover:scale-105 transition-all duration-300 group">
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mb-4 group-hover:rotate-6 transition-transform">
                            <i class="bi bi-download text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Export Data</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">
                            Export hasil analisis dalam berbagai format (CSV, Excel, PDF) untuk digunakan dalam publikasi atau presentasi.
                        </p>
                    </div>

                    {{-- Collaboration Tools --}}
                    <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-6 hover:border-pink-500/30 hover:scale-105 transition-all duration-300 group">
                        <div class="w-14 h-14 bg-gradient-to-br from-pink-500 to-pink-600 rounded-xl flex items-center justify-center mb-4 group-hover:rotate-6 transition-transform">
                            <i class="bi bi-share text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Kolaborasi & Sharing</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">
                            Bagikan hasil analisis dengan tim peneliti Anda melalui link atau undangan langsung ke dashboard.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Technical Specifications --}}
            <div class="bg-gradient-to-br from-slate-800/50 to-slate-900/50 backdrop-blur-xl border border-white/10 rounded-3xl p-8 sm:p-12 mb-16">
                <div class="text-center mb-10">
                    <div class="inline-block w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="bi bi-gear-fill text-white text-3xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-white mb-3">Spesifikasi Teknis</h2>
                    <p class="text-slate-400 text-lg">Teknologi terdepan untuk hasil analisis terbaik</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white/5 border border-white/10 rounded-2xl p-6 text-center">
                        <div class="text-4xl font-bold bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent mb-2">
                            99%
                        </div>
                        <div class="text-slate-300 font-semibold mb-1">Akurasi</div>
                        <div class="text-slate-500 text-sm">Tingkat akurasi analisis</div>
                    </div>

                    <div class="bg-white/5 border border-white/10 rounded-2xl p-6 text-center">
                        <div class="text-4xl font-bold bg-gradient-to-r from-emerald-400 to-teal-400 bg-clip-text text-transparent mb-2">
                            30fps
                        </div>
                        <div class="text-slate-300 font-semibold mb-1">Processing Speed</div>
                        <div class="text-slate-500 text-sm">Frame per detik</div>
                    </div>

                    <div class="bg-white/5 border border-white/10 rounded-2xl p-6 text-center">
                        <div class="text-4xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent mb-2">
                            4K
                        </div>
                        <div class="text-slate-300 font-semibold mb-1">Max Resolution</div>
                        <div class="text-slate-500 text-sm">Resolusi maksimal</div>
                    </div>

                    <div class="bg-white/5 border border-white/10 rounded-2xl p-6 text-center">
                        <div class="text-4xl font-bold bg-gradient-to-r from-amber-400 to-orange-400 bg-clip-text text-transparent mb-2">
                            24/7
                        </div>
                        <div class="text-slate-300 font-semibold mb-1">Availability</div>
                        <div class="text-slate-500 text-sm">Akses kapan saja</div>
                    </div>
                </div>
            </div>

            {{-- Supported Reactions --}}
            <div class="mb-16">
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-bold text-white mb-3">Jenis Reaksi yang Didukung</h2>
                    <p class="text-slate-400 text-lg">Platform kami mendukung berbagai jenis reaksi kimia</p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-4 text-center hover:border-blue-500/30 hover:scale-105 transition-all duration-300">
                        <i class="bi bi-arrow-left-right text-blue-400 text-2xl mb-2"></i>
                        <div class="text-white text-sm font-semibold">Reaksi Redoks</div>
                    </div>

                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-4 text-center hover:border-emerald-500/30 hover:scale-105 transition-all duration-300">
                        <i class="bi bi-droplet-half text-emerald-400 text-2xl mb-2"></i>
                        <div class="text-white text-sm font-semibold">Asam-Basa</div>
                    </div>

                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-4 text-center hover:border-purple-500/30 hover:scale-105 transition-all duration-300">
                        <i class="bi bi-fire text-purple-400 text-2xl mb-2"></i>
                        <div class="text-white text-sm font-semibold">Pembakaran</div>
                    </div>

                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-4 text-center hover:border-amber-500/30 hover:scale-105 transition-all duration-300">
                        <i class="bi bi-box text-amber-400 text-2xl mb-2"></i>
                        <div class="text-white text-sm font-semibold">Presipitasi</div>
                    </div>

                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-4 text-center hover:border-cyan-500/30 hover:scale-105 transition-all duration-300">
                        <i class="bi bi-lightning text-cyan-400 text-2xl mb-2"></i>
                        <div class="text-white text-sm font-semibold">Elektrokimia</div>
                    </div>

                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-4 text-center hover:border-pink-500/30 hover:scale-105 transition-all duration-300">
                        <i class="bi bi-arrow-repeat text-pink-400 text-2xl mb-2"></i>
                        <div class="text-white text-sm font-semibold">Osilasi</div>
                    </div>
                </div>
            </div>

            {{-- CTA Section --}}
            <div class="text-center bg-gradient-to-br from-blue-500/10 to-purple-500/10 backdrop-blur-xl border border-blue-500/20 rounded-3xl p-12">
                <div class="max-w-3xl mx-auto">
                    <div class="inline-block w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-500 rounded-3xl flex items-center justify-center mx-auto mb-6 animate-pulse">
                        <i class="bi bi-rocket-takeoff-fill text-white text-4xl"></i>
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">Mulai Eksplorasi Fitur Sekarang</h2>
                    <p class="text-slate-400 text-lg mb-8">
                        Rasakan sendiri kemudahan dan kecepatan analisis reaksi kimia dengan teknologi AI terdepan
                    </p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="{{ route('register') }}"
                           class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-xl shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 hover:scale-105 transition-all duration-200 font-semibold text-lg">
                            <i class="bi bi-person-plus"></i>
                            Daftar Gratis
                        </a>
                        <a href="{{ route('page.cara_kerja') }}"
                           class="inline-flex items-center gap-2 bg-white/5 border border-white/10 text-white px-8 py-4 rounded-xl hover:bg-white/10 hover:scale-105 transition-all duration-200 font-semibold text-lg">
                            <i class="bi bi-info-circle"></i>
                            Pelajari Cara Kerja
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
