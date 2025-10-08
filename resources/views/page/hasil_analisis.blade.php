<x-app-layout>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    {{-- Header --}}
    <div class="text-center mb-6">
      <h1 class="text-2xl md:text-3xl font-bold">Analisis Video Reaksi Kimia</h1>
      <p class="text-sm text-slate-500 mt-2">
        Upload video reaksi kimia Anda dan dapatkan analisis kuantitatif yang akurat dengan teknologi AI
      </p>
      <div class="mt-4 flex justify-center gap-3">
        <a href="#" class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
          ⬇ Export
        </a>
        <a href="#" class="inline-flex items-center gap-2 bg-white border px-4 py-2 rounded shadow hover:bg-slate-50">
          🔗 Share Hasil
        </a>
      </div>
    </div>

    {{-- Main card --}}
    <div class="space-y-6">
      {{-- Graph container --}}
      <div class="bg-white rounded-xl shadow p-5">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6 items-center">
          <div class="col-span-3">
            <h3 class="font-semibold text-slate-800">Grafik Linearisation / Ringkasan</h3>
            <p class="text-sm text-slate-500">Grafik hasil analisis dari sistem</p>
          </div>

          {{-- Metrics --}}
          <div class="flex gap-3 justify-end">
            <div class="bg-slate-50 p-3 rounded shadow w-40">
              <div class="text-xs text-slate-500">Data Points</div>
              <div class="text-xl font-semibold text-blue-600">
                {{ $analysis->data_point ? count($analysis->data_point) : '-' }}
              </div>
              <div class="text-xs text-slate-400">Titik Data Teranalisis</div>
            </div>
            <div class="bg-slate-50 p-3 rounded shadow w-40">
              <div class="text-xs text-slate-500">Akurasi</div>
              <div class="text-xl font-semibold text-emerald-600">
                {{ isset($analysis->akurasi) ? number_format($analysis->akurasi, 2) . '%' : '-' }}
              </div>
              <div class="text-xs text-slate-400">Tingkat Akurasi Analisis</div>
            </div>
            <div class="bg-slate-50 p-3 rounded shadow w-40">
              <div class="text-xs text-slate-500">Durasi</div>
              <div class="text-xl font-semibold text-amber-600">
                {{ isset($analysis->durasi) ? number_format($analysis->durasi, 2) . ' s' : '-' }}
              </div>
              <div class="text-xs text-slate-400">Durasi Video Dianalisis</div>
            </div>
          </div>
        </div>

        {{-- Grafik hasil sebagai gambar --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
          @if(!empty($analysis->graf) && is_array($analysis->graf))
            @foreach($analysis->graf as $grafImg)
              <div class="bg-white border rounded-lg p-4 shadow">
                <img src="{{ asset($grafImg) }}" alt="Grafik Analisis" class="w-full h-full object-contain">
              </div>
            @endforeach
          @else
            <p class="text-center text-gray-500 col-span-3">Belum ada grafik yang tersedia.</p>
          @endif
        </div>
      </div>

      {{-- Tabel ringkasan hasil kinetika --}}
      <div class="bg-white rounded-xl shadow p-5">
        <h3 class="font-semibold text-slate-800 mb-4">Tabel Ringkasan Hasil Kinetika</h3>
        @php
          $waktu = $analysis->half_life ?? [];
          $reg = $analysis->regression_results ?? [];
        @endphp

        @if(!empty($reg))
          <div class="overflow-x-auto">
            <table class="w-full text-sm border-collapse">
              <thead>
                <tr class="bg-slate-50 text-slate-600">
                  <th class="p-3 border">Parameter</th>
                  <th class="p-3 border text-center">Orde Nol</th>
                  <th class="p-3 border text-center">Orde Satu</th>
                  <th class="p-3 border text-center">Orde Dua</th>
                  <th class="p-3 border text-center">Kesimpulan Terbaik</th>
                </tr>
              </thead>
              <tbody>
                {{-- k --}}
                <tr>
                  <td class="p-3 border">Konstanta Laju (k)</td>
                    <td class="p-3 border text-center">
                    {{ isset($reg['Zero-order']['slope']) ? number_format($reg['Zero-order']['slope'], 6) : '-' }}
                    </td>
                    <td class="p-3 border text-center">
                    {{ isset($reg['First-order']['slope']) ? number_format($reg['First-order']['slope'], 6) : '-' }}
                    </td>
                    <td class="p-3 border text-center">
                    {{ isset($reg['Second-order']['slope']) ? number_format($reg['Second-order']['slope'], 6) : '-' }}
                    </td>
                  <td class="p-3 border text-center font-semibold text-emerald-600">
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
                {{-- Satuan --}}
                <tr class="bg-slate-50">
                  <td class="p-3 border">Koefisien Determinasi (R²)</td>
                  <td class="p-3 border text-center">M/s</td>
                  <td class="p-3 border text-center">1/s</td>
                  <td class="p-3 border text-center">1/(M*s)</td>
                  <td class="p-3 border text-center font-semibold text-emerald-600">
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
                {{-- R2 --}}
                <tr>
                  <td class="p-3 border">Koefisien Determinasi (R²)</td>
                  <td class="p-3 border text-center">{{ isset($reg['Zero-order']['r2']) ? number_format($reg['Zero-order']['r2'], 6) : '-' }}</td>
                  <td class="p-3 border text-center">{{ isset($reg['First-order']['r2']) ? number_format($reg['First-order']['r2'], 6) : '-' }}</td>
                  <td class="p-3 border text-center">{{ isset($reg['Second-order']['r2']) ? number_format($reg['Second-order']['r2'], 6) : '-' }}</td>
                  <td class="p-3 border text-center font-semibold text-emerald-600">{{ isset($reg['Best_R2']) ? number_format($reg['Best_R2'], 6) : '-' }}</td>
                </tr>
                {{-- Waktu Paruh (t1/2) --}}
                <tr class = "bg-slate-50">
                  <td class="p-3 border">Waktu Paruh (t<sub>1/2</sub>)</td>
                  <td class="p-3 border text-center">
                    {{ isset($waktu['zero']) ? number_format($waktu['zero'], 5) . ' s'  : '-'}}
                  </td>
                  <td class="p-3 border text-center">
                    {{ isset($waktu['first']) ? number_format($waktu['first'], 5) . ' s' : '-' }}
                  </td>
                  <td class="p-3 border text-center">
                    {{ isset($waktu['second']) ? number_format($waktu['second'], 5) . ' s' : '-'}}
                  </td>
                  <td class="p-3 border text-center font-semibold text-emerald-600">
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
              </tbody>
            </table>
          </div>
        @else
          <p class="text-gray-500">Tidak ada data regresi yang tersedia.</p>
        @endif
      </div>

      {{-- Tabel hasil analisis gelembung --}}
      <div class="bg-white rounded-xl shadow p-5">
        <h3 class="font-semibold text-slate-800 mb-4">Tabel Hasil Analisis Gelembung</h3>
        @php
          $buble = $analysis->hasil_analisis['buble_data'] ?? null;
          $totalBubbles = $buble['total_bubbles'] ?? null;
          $avgBubbleRate = $buble['average_bubble_rate'] ?? null;
        @endphp

        @if(!is_null($totalBubbles) || !is_null($avgBubbleRate))
          <div class="overflow-x-auto">
            <table class="w-full text-sm border-collapse">
              <thead>
                <tr class="bg-slate-50 text-slate-600">
                  <th class="p-3 border text-left">Metrik</th>
                  <th class="p-3 border text-center">Nilai</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="p-3 border">Total Gelembung Terdeteksi</td>
                  <td class="p-3 border text-center font-medium">
                    {{ isset($totalBubbles) ? number_format($totalBubbles, 0) : '-' }}
                  </td>
                </tr>
                <tr class="bg-slate-50">
                  <td class="p-3 border">Laju Gelembung Rata-rata</td>
                  <td class="p-3 border text-center font-medium">
                    {{ isset($avgBubbleRate) ? number_format($avgBubbleRate, 2) . ' gelembung/detik' : '-' }}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        @else
          <p class="text-gray-500">Tidak ada data analisis gelembung yang tersedia.</p>
        @endif
      </div>

      {{-- Interpretasi & Rekomendasi --}}
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl shadow p-5">
          <h4 class="font-semibold mb-2">Interpretasi Hasil Analisis</h4>
          <div class="prose text-sm text-slate-700">
            {!! $analysis->interpretasi ?? '<p>Tidak ada interpretasi.</p>' !!}
          </div>
        </div>

        <div class="bg-white rounded-xl shadow p-5">
          <h4 class="font-semibold mb-2">Rekomendasi & Langkah Selanjutnya</h4>
          <div class="text-sm text-slate-700 space-y-2">
            @if(!empty($analysis->rekomendasi) && is_array($analysis->rekomendasi))
                <ul class="list-disc list-inside">
                    @foreach($analysis->rekomendasi as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            @else
                <p>Tidak ada rekomendasi.</p>
            @endif
          </div>
        </div>
      </div>

      {{-- Footer actions --}}
      <div class="flex justify-between items-center mt-6">
        <div>
          <a href="{{ route('page.analisis') }}" class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded">Analisis Video Baru</a>
          <a href="{{ route('analisis.history') }}" class="ml-3 text-sm text-slate-500">Riwayat Analisis</a>
        </div>
        <div class="text-sm text-slate-400">ID Analisis: {{ $analysis->id }} · Dibuat: {{ $analysis->created_at->format('Y-m-d H:i') }}</div>
      </div>
    </div>
  </div>
</x-app-layout>
