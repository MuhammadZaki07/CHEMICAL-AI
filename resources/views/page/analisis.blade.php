<x-app-layout>
    <div class="py-16 px-4 sm:px-6 lg:px-8 text-center max-w-7xl mx-auto">
        <!-- Judul -->
        <h2 class="text-2xl md:text-3xl font-bold text-gray-200 mb-2">Analisis Video Reaksi Kimia</h2>
        <p class="text-md text-gray-600 mb-12">
            Upload video reaksi kimia Anda dan dapatkan analisis kuantitatif yang akurat dengan teknologi AI
        </p>

        <!-- Header Section -->
        <div class="flex justify-between max-w-4xl mx-auto mb-8">
    <div class="text-start">
        <h2 class="text-xl md:text-2xl font-bold text-gray-200 mb-2">Analisis Video Reaksi Kimia</h2>
        <p class="text-sm text-gray-400 mb-8">
            Upload video reaksi kimia Anda dan dapatkan analisis kuantitatif yang akurat
        </p>
    </div>
<div class="">
    <a href="{{ route('analisis.history') }}"
       class="flex items-center gap-2 px-6 py-2 my-3 text-lg bg-blue-900 text-white border-2 border-blue-800 hover:text-white hover:bg-blue-700 transform hover:scale-105 transition duration-200 font-semibold rounded-lg">
        <i class="bi bi-clock-history text-xl"></i>
        {{ __('Riwayat Analisis') }}
    </a>
</div>
</div>

        @include('analysis.form-upload')
    </div>
</x-app-layout>

