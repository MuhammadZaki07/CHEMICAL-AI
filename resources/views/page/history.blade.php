<x-app-layout>
    <div class="min-h-screen">
        <div class="max-w-7xl mx-auto lg:py-24 py-12 px-4 sm:px-6 lg:px-8">

            {{-- Header Section --}}
            <div class="text-center mb-12 space-y-4">
                <div class="inline-block">
                    <span class="inline-block px-4 py-1.5 bg-purple-500/10 border border-purple-500/20 rounded-full text-purple-400 text-xs sm:text-sm font-medium mb-4">
                        <i class="bi bi-clock-history mr-1"></i> History
                    </span>
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white tracking-tight">
                    Riwayat Analisis Anda
                </h2>
                <p class="text-base sm:text-lg text-slate-400 max-w-2xl mx-auto">
                    Semua hasil analisis video reaksi kimia yang pernah Anda lakukan
                </p>
            </div>

            @if($analyses->isEmpty())
                {{-- Empty State --}}
                <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl shadow-2xl p-12 sm:p-16 text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-slate-700 to-slate-800 rounded-3xl flex items-center justify-center mx-auto mb-6">
                        <i class="bi bi-inbox text-slate-500 text-4xl"></i>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-white mb-3">Belum Ada Analisis</h3>
                    <p class="text-slate-400 mb-8 max-w-md mx-auto">
                        Anda belum melakukan analisis video reaksi kimia. Mulai analisis pertama Anda sekarang!
                    </p>
                    <a href="{{ route('page.analisis') }}"
                       class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-blue-500 text-white px-8 py-4 rounded-xl shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 hover:scale-105 transition-all duration-200 font-medium">
                        <i class="bi bi-plus-circle"></i>
                        Mulai Analisis Baru
                    </a>
                </div>
            @else
                {{-- Analysis Cards Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                    @foreach($analyses as $analysis)
                        <div x-data="analysisProgress({{ $analysis->id }}, '{{ $analysis->status }}')"
                             class="group bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-6 shadow-2xl hover:border-white/20 hover:scale-[1.02] transition-all duration-300">

                            {{-- Card Header --}}
                            <div class="flex justify-between items-start mb-5">
                                <div class="flex-1 pr-3">
                                    <h3 class="text-lg font-bold text-white mb-2 line-clamp-2 group-hover:text-blue-400 transition-colors">
                                        {{ $analysis->array_param['nama_reaksi'] ?? 'Analisis #' . $analysis->id }}
                                    </h3>
                                    <div class="flex items-center gap-2 text-sm text-slate-400">
                                        <i class="bi bi-calendar-check text-xs"></i>
                                        <span>{{ $analysis->created_at->format('d M Y, H:i') }}</span>
                                    </div>
                                </div>

                                {{-- Status Badge --}}
                                <span class="flex-shrink-0 text-xs font-semibold px-3 py-1.5 rounded-full
                                    @if($analysis->status === 'completed')
                                        bg-emerald-500/20 text-emerald-400 border border-emerald-500/30
                                    @elseif($analysis->status === 'processing')
                                        bg-amber-500/20 text-amber-400 border border-amber-500/30 animate-pulse
                                    @else
                                        bg-slate-500/20 text-slate-400 border border-slate-500/30
                                    @endif">
                                    @if($analysis->status === 'completed')
                                        <i class="bi bi-check-circle-fill mr-1"></i>
                                    @elseif($analysis->status === 'processing')
                                        <i class="bi bi-arrow-repeat mr-1"></i>
                                    @else
                                        <i class="bi bi-circle mr-1"></i>
                                    @endif
                                    {{ ucfirst($analysis->status) }}
                                </span>
                            </div>

                            {{-- Metrics --}}
                            <div class="grid grid-cols-2 gap-3 mb-5">
                                <div class="bg-gradient-to-br from-emerald-500/10 to-emerald-600/5 border border-emerald-500/20 rounded-xl p-3">
                                    <div class="flex items-center gap-2 mb-1">
                                        <i class="bi bi-bullseye text-emerald-400 text-xs"></i>
                                        <span class="text-xs text-emerald-400 font-medium">Akurasi</span>
                                    </div>
                                    <div class="text-xl font-bold text-white">
                                        {{ $analysis->akurasi ?? '-' }}<span class="text-sm text-emerald-400">%</span>
                                    </div>
                                </div>

                                <div class="bg-gradient-to-br from-blue-500/10 to-blue-600/5 border border-blue-500/20 rounded-xl p-3">
                                    <div class="flex items-center gap-2 mb-1">
                                        <i class="bi bi-stopwatch text-blue-400 text-xs"></i>
                                        <span class="text-xs text-blue-400 font-medium">Durasi</span>
                                    </div>
                                    <div class="text-xl font-bold text-white">
                                        {{ $analysis->durasi ?? '-' }}<span class="text-sm text-blue-400">s</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Progress Bar (only for processing status) --}}
                            <template x-if="status === 'processing'">
                                <div class="mb-5">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-xs text-slate-400 font-medium">Progres Analisis</span>
                                        <span class="text-xs text-amber-400 font-bold" x-text="progress + '%'"></span>
                                    </div>
                                    <div class="w-full bg-slate-800/50 rounded-full h-2 overflow-hidden border border-slate-700">
                                        <div class="bg-gradient-to-r from-amber-500 to-amber-400 h-2 rounded-full transition-all duration-500 shadow-lg shadow-amber-500/50"
                                             :style="`width: ${progress}%`"></div>
                                    </div>
                                    <p class="text-xs text-slate-500 mt-2 flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 bg-amber-400 rounded-full animate-pulse"></span>
                                        Sedang diproses...
                                    </p>
                                </div>
                            </template>

                            {{-- Action Button --}}
                            <a href="{{ route('analisis.result', $analysis->id) }}"
                               class="group/btn relative w-full inline-flex items-center justify-center gap-2 px-5 py-3 bg-gradient-to-r from-blue-600 to-blue-500 text-white rounded-xl text-sm font-semibold shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 hover:scale-[1.02] transition-all duration-200 overflow-hidden">
                                <span class="relative z-10">Lihat Detail</span>
                                <i class="bi bi-arrow-right relative z-10 group-hover/btn:translate-x-1 transition-transform"></i>
                                <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-blue-600 opacity-0 group-hover/btn:opacity-100 transition-opacity"></div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="flex justify-center">
                    <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl px-6 py-4 shadow-xl">
                        {{ $analyses->links() }}
                    </div>
                </div>
            @endif

            {{-- Quick Actions Footer --}}
            <div class="mt-16 bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl shadow-2xl p-8 text-center">
                <h3 class="text-xl font-bold text-white mb-3">Siap Analisis Video Baru?</h3>
                <p class="text-slate-400 mb-6 max-w-xl mx-auto">
                    Upload video reaksi kimia Anda dan dapatkan hasil analisis kuantitatif yang akurat dengan AI
                </p>
                <div class="flex flex-wrap justify-center gap-3">
                    <a href="{{ route('page.analisis') }}"
                       class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-blue-500 text-white px-8 py-4 rounded-xl shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 hover:scale-105 transition-all duration-200 font-medium">
                        <i class="bi bi-plus-circle"></i>
                        Analisis Video Baru
                    </a>
                    <a href="#"
                       class="inline-flex items-center gap-2 bg-white/5 border border-white/10 text-white px-8 py-4 rounded-xl hover:bg-white/10 hover:scale-105 transition-all duration-200 font-medium">
                        <i class="bi bi-question-circle"></i>
                        Panduan Penggunaan
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Custom Pagination Styles --}}
    <style>
        /* Override default pagination styles untuk dark theme */
        .pagination {
            @apply flex items-center gap-2;
        }

        .pagination .page-link {
            @apply px-4 py-2 text-sm font-medium text-slate-300 bg-white/5 border border-white/10 rounded-lg hover:bg-white/10 hover:text-white hover:scale-105 transition-all duration-200;
        }

        .pagination .page-item.active .page-link {
            @apply bg-gradient-to-r from-blue-600 to-blue-500 text-white border-blue-500 shadow-lg shadow-blue-500/25;
        }

        .pagination .page-item.disabled .page-link {
            @apply opacity-50 cursor-not-allowed hover:scale-100;
        }
    </style>
</x-app-layout>
