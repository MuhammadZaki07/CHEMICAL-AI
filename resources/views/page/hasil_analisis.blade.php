<x-app-layout>
  <div class="min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">

      {{-- Header Section --}}
      <div class="text-center mb-8 sm:mb-12 space-y-4">
        <div class="inline-block">
          <span class="inline-block px-4 py-1.5 bg-blue-500/10 border border-blue-500/20 rounded-full text-blue-400 text-xs sm:text-sm font-medium mb-4">
            AI-Powered Analysis
          </span>
        </div>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white tracking-tight">
          Analisis Video Reaksi Kimia
        </h1>
        <p class="text-base sm:text-lg text-slate-400 max-w-2xl mx-auto">
          Teknologi AI untuk analisis kuantitatif yang akurat dan real-time
        </p>

        {{-- Action Buttons --}}
        <div class="flex flex-wrap justify-center gap-3 pt-4">
          <a href="#" class="group inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-blue-500 text-white px-6 py-3 rounded-xl shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 hover:scale-105 transition-all duration-200 font-medium">
            <i class="bi bi-download group-hover:animate-bounce"></i>
            Export Data
          </a>
          <a href="#" class="group inline-flex items-center gap-2 bg-white/5 backdrop-blur-sm border border-white/10 text-white px-6 py-3 rounded-xl hover:bg-white/10 hover:scale-105 transition-all duration-200 font-medium">
            <i class="bi bi-share-fill group-hover:rotate-12 transition-transform"></i>
            Share Hasil
          </a>
        </div>
      </div>

      <div class="space-y-6">

        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
          <div class="group relative bg-gradient-to-br from-blue-500/10 to-blue-600/5 backdrop-blur-sm border border-blue-500/20 rounded-2xl p-6 hover:scale-105 transition-all duration-300 hover:shadow-xl hover:shadow-blue-500/10">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/0 to-blue-500/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
            <div class="relative">
              <div class="flex items-center justify-between mb-2">
                <span class="text-xs font-medium text-blue-400 uppercase tracking-wider">Data Points</span>
                <div class="w-8 h-8 bg-blue-500/20 rounded-lg flex items-center justify-center">
                  <i class="bi bi-graph-up text-blue-400"></i>
                </div>
              </div>
              <div class="text-3xl font-bold text-white mb-1">
                {{ $analysis->data_point ? count($analysis->data_point) : '-' }}
              </div>
              <div class="text-xs text-slate-400">Titik Data Teranalisis</div>
            </div>
          </div>

          <div class="group relative bg-gradient-to-br from-emerald-500/10 to-emerald-600/5 backdrop-blur-sm border border-emerald-500/20 rounded-2xl p-6 hover:scale-105 transition-all duration-300 hover:shadow-xl hover:shadow-emerald-500/10">
            <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/0 to-emerald-500/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
            <div class="relative">
              <div class="flex items-center justify-between mb-2">
                <span class="text-xs font-medium text-emerald-400 uppercase tracking-wider">Akurasi</span>
                <div class="w-8 h-8 bg-emerald-500/20 rounded-lg flex items-center justify-center">
                  <i class="bi bi-check-circle text-emerald-400"></i>
                </div>
              </div>
              <div class="text-3xl font-bold text-white mb-1">
                {{ isset($analysis->akurasi) ? number_format($analysis->akurasi, 2) . '%' : '-' }}
              </div>
              <div class="text-xs text-slate-400">Tingkat Akurasi Analisis</div>
            </div>
          </div>

          <div class="group relative bg-gradient-to-br from-amber-500/10 to-amber-600/5 backdrop-blur-sm border border-amber-500/20 rounded-2xl p-6 hover:scale-105 transition-all duration-300 hover:shadow-xl hover:shadow-amber-500/10">
            <div class="absolute inset-0 bg-gradient-to-br from-amber-500/0 to-amber-500/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
            <div class="relative">
              <div class="flex items-center justify-between mb-2">
                <span class="text-xs font-medium text-amber-400 uppercase tracking-wider">Durasi</span>
                <div class="w-8 h-8 bg-amber-500/20 rounded-lg flex items-center justify-center">
                  <i class="bi bi-clock text-amber-400"></i>
                </div>
              </div>
              <div class="text-3xl font-bold text-white mb-1">
                {{ isset($analysis->durasi) ? number_format($analysis->durasi, 2) . 's' : '-' }}
              </div>
              <div class="text-xs text-slate-400">Durasi Video Dianalisis</div>
            </div>
          </div>
        </div>

        {{-- Graph Section --}}
        <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl shadow-2xl p-6 sm:p-8 hover:border-white/20 transition-all duration-300">
          <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 gap-4">
            <div>
              <h3 class="text-xl sm:text-2xl font-bold text-white mb-1">Grafik Linearisation</h3>
              <p class="text-sm text-slate-400">Visualisasi hasil analisis sistem</p>
            </div>
          </div>

          <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            @if(!empty($analysis->graf) && is_array($analysis->graf))
              @foreach($analysis->graf as $grafImg)
                <div class="group relative bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-4 hover:scale-[1.02] transition-all duration-300 overflow-hidden">
                  <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                  <img src="{{ asset($grafImg) }}" alt="Grafik Analisis" class="relative w-full h-full object-contain rounded-xl">
                </div>
              @endforeach
            @else
              <div class="col-span-2 text-center py-12">
                <div class="w-16 h-16 bg-slate-800 rounded-2xl flex items-center justify-center mx-auto mb-4">
                  <i class="bi bi-graph-up text-slate-600 text-2xl"></i>
                </div>
                <p class="text-slate-500">Belum ada grafik yang tersedia</p>
              </div>
            @endif
          </div>
        </div>

        {{-- Kinetics Table --}}
        <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl shadow-2xl p-6 sm:p-8 hover:border-white/20 transition-all duration-300">
          <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
              <i class="bi bi-table text-white"></i>
            </div>
            <div>
              <h3 class="text-xl sm:text-2xl font-bold text-white">Hasil Kinetika</h3>
              <p class="text-sm text-slate-400">Data parameter reaksi kimia</p>
            </div>
          </div>

          @php
            $waktu = $analysis->half_life ?? [];
            $reg = $analysis->regression_results ?? [];
          @endphp

          @if(!empty($reg))
            <div class="overflow-x-auto rounded-2xl border border-white/10">
              <table class="w-full text-sm">
                <thead>
                  <tr class="bg-white/5 border-b border-white/10">
                    <th class="p-4 text-left text-slate-300 font-semibold">Parameter</th>
                    <th class="p-4 text-center text-slate-300 font-semibold">Orde Nol</th>
                    <th class="p-4 text-center text-slate-300 font-semibold">Orde Satu</th>
                    <th class="p-4 text-center text-slate-300 font-semibold">Orde Dua</th>
                    <th class="p-4 text-center text-emerald-400 font-semibold">✨ Terbaik</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                  <tr class="hover:bg-white/5 transition-colors">
                    <td class="p-4 text-slate-300 font-medium">Konstanta Laju (k)</td>
                    <td class="p-4 text-center text-slate-400">
                      {{ isset($reg['Zero-order']['slope']) ? number_format($reg['Zero-order']['slope'], 6) : '-' }}
                    </td>
                    <td class="p-4 text-center text-slate-400">
                      {{ isset($reg['First-order']['slope']) ? number_format($reg['First-order']['slope'], 6) : '-' }}
                    </td>
                    <td class="p-4 text-center text-slate-400">
                      {{ isset($reg['Second-order']['slope']) ? number_format($reg['Second-order']['slope'], 6) : '-' }}
                    </td>
                    <td class="p-4 text-center font-bold text-emerald-400">
                      @php
                        $bestOrder = $reg['Best_Order'] ?? '';
                        if ($bestOrder === 'Zero-order') {
                          echo isset($reg['Zero-order']['slope']) ? number_format($reg['Zero-order']['slope'], 6) : '-';
                        } elseif ($bestOrder === 'One-order') {
                          echo isset($reg['First-order']['slope']) ? number_format($reg['First-order']['slope'], 6) : '-';
                        } elseif ($bestOrder === 'Second-order') {
                          echo isset($reg['Second-order']['slope']) ? number_format($reg['Second-order']['slope'], 6) : '-';
                        } else {
                          echo '-';
                        }
                      @endphp
                    </td>
                  </tr>

                  <tr class="bg-white/[0.02] hover:bg-white/5 transition-colors">
                    <td class="p-4 text-slate-300 font-medium">Satuan</td>
                    <td class="p-4 text-center text-slate-400">M/s</td>
                    <td class="p-4 text-center text-slate-400">1/s</td>
                    <td class="p-4 text-center text-slate-400">1/(M*s)</td>
                    <td class="p-4 text-center font-bold text-emerald-400">
                      @php
                          $order = $reg['Best_Order'] ?? '';
                          if ($order === 'Zero-order') {
                              echo 'M/s';
                          } elseif ($order === 'One-order') {
                              echo '1/s';
                          } elseif ($order === 'Second-order') {
                              echo '1/(M*s)';
                          } else {
                              echo '-';
                          }
                      @endphp
                    </td>
                  </tr>

                  <tr class="hover:bg-white/5 transition-colors">
                    <td class="p-4 text-slate-300 font-medium">Koefisien Determinasi (R²)</td>
                    <td class="p-4 text-center text-slate-400">{{ isset($reg['Zero-order']['r2']) ? number_format($reg['Zero-order']['r2'], 6) : '-' }}</td>
                    <td class="p-4 text-center text-slate-400">{{ isset($reg['First-order']['r2']) ? number_format($reg['First-order']['r2'], 6) : '-' }}</td>
                    <td class="p-4 text-center text-slate-400">{{ isset($reg['Second-order']['r2']) ? number_format($reg['Second-order']['r2'], 6) : '-' }}</td>
                    <td class="p-4 text-center font-bold text-emerald-400">{{ isset($reg['Best_R2']) ? number_format($reg['Best_R2'], 6) : '-' }}</td>
                  </tr>

                  <tr class="bg-white/[0.02] hover:bg-white/5 transition-colors">
                    <td class="p-4 text-slate-300 font-medium">Waktu Paruh (t<sub>1/2</sub>)</td>
                    <td class="p-4 text-center text-slate-400">
                      {{ isset($waktu['zero']) ? number_format($waktu['zero'], 5) . ' s'  : '-'}}
                    </td>
                    <td class="p-4 text-center text-slate-400">
                      {{ isset($waktu['first']) ? number_format($waktu['first'], 5) . ' s' : '-' }}
                    </td>
                    <td class="p-4 text-center text-slate-400">
                      {{ isset($waktu['second']) ? number_format($waktu['second'], 5) . ' s' : '-'}}
                    </td>
                    <td class="p-4 text-center font-bold text-emerald-400">
                      @php
                          $bestOrder = $reg['Best_Order'] ?? '';
                          if ($bestOrder === 'Zero-order') {
                              echo isset($waktu['zero']) ? number_format($waktu['zero'], 3) . ' s' : '-' ;
                          } elseif ($bestOrder === 'First-order') {
                              echo isset($waktu['first']) ? number_format($waktu['first'], 3) . ' s' : '-' ;
                          } elseif ($bestOrder === 'Second-order') {
                              echo isset($waktu['second']) ? number_format($waktu['second'], 3) . ' s' : '-';
                          } else {
                              echo '-';
                          }
                      @endphp
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          @else
            <div class="text-center py-12">
              <div class="w-16 h-16 bg-slate-800 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i class="bi bi-table text-slate-600 text-2xl"></i>
              </div>
              <p class="text-slate-500">Tidak ada data regresi yang tersedia</p>
            </div>
          @endif
        </div>

        {{-- Bubble Analysis Table --}}
        <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl shadow-2xl p-6 sm:p-8 hover:border-white/20 transition-all duration-300">
          <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 bg-gradient-to-br from-cyan-500 to-blue-500 rounded-xl flex items-center justify-center">
              <i class="bi bi-droplet-fill text-white"></i>
            </div>
            <div>
              <h3 class="text-xl sm:text-2xl font-bold text-white">Analisis Gelembung</h3>
              <p class="text-sm text-slate-400">Deteksi dan perhitungan gelembung</p>
            </div>
          </div>

          @php
            $buble = $analysis->hasil_analisis['buble_data'] ?? null;
            $totalBubbles = $buble['total_bubbles'] ?? null;
            $avgBubbleRate = $buble['average_bubble_rate'] ?? null;
          @endphp

          @if(!is_null($totalBubbles) || !is_null($avgBubbleRate))
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div class="bg-gradient-to-br from-cyan-500/10 to-blue-500/5 border border-cyan-500/20 rounded-2xl p-6">
                <div class="flex items-center justify-between mb-2">
                  <span class="text-xs font-medium text-cyan-400 uppercase tracking-wider">Total Gelembung</span>
                  <i class="bi bi-droplet-fill text-cyan-400"></i>
                </div>
                <div class="text-3xl font-bold text-white">
                  {{ isset($totalBubbles) ? number_format($totalBubbles, 0) : '-' }}
                </div>
                <div class="text-xs text-slate-400 mt-1">Gelembung Terdeteksi</div>
              </div>

              <div class="bg-gradient-to-br from-blue-500/10 to-purple-500/5 border border-blue-500/20 rounded-2xl p-6">
                <div class="flex items-center justify-between mb-2">
                  <span class="text-xs font-medium text-blue-400 uppercase tracking-wider">Laju Rata-rata</span>
                  <i class="bi bi-speedometer2 text-blue-400"></i>
                </div>
                <div class="text-3xl font-bold text-white">
                  {{ isset($avgBubbleRate) ? number_format($avgBubbleRate, 2) : '-' }}
                </div>
                <div class="text-xs text-slate-400 mt-1">Gelembung/detik</div>
              </div>
            </div>
          @else
            <div class="text-center py-12">
              <div class="w-16 h-16 bg-slate-800 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i class="bi bi-droplet text-slate-600 text-2xl"></i>
              </div>
              <p class="text-slate-500">Tidak ada data analisis gelembung</p>
            </div>
          @endif
        </div>

        {{-- Interpretation & Recommendations --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
          <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl shadow-2xl p-6 sm:p-8 hover:border-white/20 transition-all duration-300">
            <div class="flex items-center gap-3 mb-4">
              <div class="w-10 h-10 bg-gradient-to-br from-violet-500 to-purple-500 rounded-xl flex items-center justify-center">
                <i class="bi bi-lightbulb-fill text-white"></i>
              </div>
              <h4 class="text-lg sm:text-xl font-bold text-white">Interpretasi Hasil</h4>
            </div>
            <div class="prose prose-invert prose-sm max-w-none text-slate-300 leading-relaxed">
              {!! $analysis->interpretasi ?? '<p class="text-slate-500">Tidak ada interpretasi.</p>' !!}
            </div>
          </div>

          <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl shadow-2xl p-6 sm:p-8 hover:border-white/20 transition-all duration-300">
            <div class="flex items-center gap-3 mb-4">
              <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-xl flex items-center justify-center">
                <i class="bi bi-compass-fill text-white"></i>
              </div>
              <h4 class="text-lg sm:text-xl font-bold text-white">Rekomendasi</h4>
            </div>
            <div class="text-sm text-slate-300 space-y-2">
              @if(!empty($analysis->rekomendasi) && is_array($analysis->rekomendasi))
                <ul class="space-y-3">
                  @foreach($analysis->rekomendasi as $item)
                    <li class="flex items-start gap-3">
                      <span class="flex-shrink-0 w-5 h-5 bg-emerald-500/20 rounded-full flex items-center justify-center mt-0.5">
                        <i class="bi bi-check text-emerald-400 text-xs"></i>
                      </span>
                      <span class="text-slate-300">{{ $item }}</span>
                    </li>
                  @endforeach
                </ul>
              @else
                <p class="text-slate-500">Tidak ada rekomendasi.</p>
              @endif
            </div>
          </div>
        </div>

        {{-- Footer Actions --}}
        <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl shadow-2xl p-6 sm:p-8">
          <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div class="flex flex-wrap gap-3">
              <a href="{{ route('page.analisis') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-blue-500 text-white px-6 py-3 rounded-xl shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 hover:scale-105 transition-all duration-200 font-medium">
                <i class="bi bi-plus-circle"></i>
                Analisis Video Baru
              </a>
              <a href="{{ route('analisis.history') }}" class="inline-flex items-center gap-2 bg-white/5 border border-white/10 text-slate-300 px-6 py-3 rounded-xl hover:bg-white/10 hover:scale-105 transition-all duration-200 font-medium">
                <i class="bi bi-clock-history"></i>
                Riwayat Analisis
              </a>
            </div>
            <div class="text-xs sm:text-sm text-slate-500 space-y-1">
              <div class="flex items-center gap-2">
                <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                <span>ID: {{ $analysis->id }}</span>
              </div>
              <div>{{ $analysis->created_at->format('d M Y, H:i') }}</div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</x-app-layout>
