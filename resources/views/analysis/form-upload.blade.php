<div class="min-h-screen py-8 px-4">
    <div class="mx-auto max-w-5xl space-y-6">

        {{-- STEPPER (2 step) --}}
        <div id="stepper" class="bg-slate-900/5 backdrop-blur-xl border border-white/10 rounded-3xl p-6 shadow-2xl">
            <div class="flex items-center justify-between gap-4">
                <div class="flex items-center gap-4 flex-1">
                    <div data-step="1" class="flex items-center gap-4 flex-1">
                        <div
                            class="step-circle w-12 h-12 rounded-2xl flex items-center justify-center bg-gradient-to-br from-blue-500 to-blue-600 text-white font-bold text-lg shadow-lg shadow-blue-500/50">
                            1</div>
                        <div class="hidden sm:block">
                            <div class="text-xs text-slate-400 uppercase tracking-wider">Langkah 1</div>
                            <div class="font-semibold text-white text-base">Upload Video</div>
                        </div>
                    </div>

                    <div
                        class="h-1 flex-1 bg-gradient-to-r from-slate-700 to-slate-800 rounded-full mx-4 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-purple-500 w-0 transition-all duration-500"
                            id="progressBar"></div>
                    </div>

                    <div data-step="2" class="flex items-center gap-4 flex-1">
                        <div
                            class="step-circle w-12 h-12 rounded-2xl flex items-center justify-center bg-slate-700 text-slate-400 font-bold text-lg">
                            2</div>
                        <div class="hidden sm:block">
                            <div class="text-xs text-slate-500 uppercase tracking-wider">Langkah 2</div>
                            <div class="font-semibold text-slate-400 text-base">Parameter Kinetika</div>
                        </div>
                    </div>
                </div>
                <div
                    class="hidden lg:block text-sm text-slate-500 bg-slate-800/50 px-4 py-2 rounded-xl border border-slate-700">
                    Upload → Parameter → Analisis
                </div>
            </div>
        </div>

        {{-- STEP 1: UPLOAD --}}
        <div id="step1"
            class="rounded-3xl bg-slate-900/5 backdrop-blur-xl border border-white/10 shadow-2xl p-6 sm:p-8">
            <div class="mb-6">
                <div class="flex items-center gap-3 mb-2">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                        <i class="bi bi-cloud-upload text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-white">Upload Video Reaksi</h3>
                </div>
                <p class="text-sm text-slate-400 ml-13">Upload video atau rekam langsung. Minimal durasi potong: 5
                    detik.</p>
            </div>

            <div id="dropZone"
                class="group mt-6 rounded-2xl border-2 border-dashed border-slate-600 hover:border-blue-500/50 bbg-slate-900/5 hover:bg-slate-800/50 p-8 text-center cursor-pointer transition-all duration-300">

                <!-- wrapper video + canvas -->
                <div class="relative w-full max-w-3xl mx-auto">
                    <video id="videoPreview" class="hidden w-full max-h-[350px] rounded-2xl bg-black shadow-2xl" controls></video>
                    <canvas id="roiCanvas" class="absolute inset-0 hidden cursor-crosshair rounded-2xl"></canvas>
                </div>

                <div id="uploadText" class="py-12 select-none">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-blue-500/20 to-purple-500/20 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10 text-blue-400" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7 16a4 4 0 0 1 0-8 5.5 5.5 0 0 1 10.6-1A4 4 0 0 1 17 16H7zm5-5v6m0-6l2.5 2.5M12 11l-2.5 2.5" />
                        </svg>
                    </div>
                    <p class="text-xl font-bold text-white mb-2">Upload Video Reaksi Kimia</p>
                    <p class="text-sm text-slate-400 mb-3">Drag & drop atau klik untuk memilih file</p>
                    <div class="flex flex-wrap justify-center gap-2 text-xs text-slate-500">
                        <span class="px-3 py-1 bg-slate-700/50 rounded-lg">MP4</span>
                        <span class="px-3 py-1 bg-slate-700/50 rounded-lg">MOV</span>
                        <span class="px-3 py-1 bg-slate-700/50 rounded-lg">AVI</span>
                        <span class="px-3 py-1 bg-slate-700/50 rounded-lg">WebM</span>
                        <span class="px-3 py-1 bg-slate-700/50 rounded-lg">Max: 100MB</span>
                    </div>
                </div>

                <input id="videoInput" type="file" accept="video/*" class="hidden" />
            </div>

            <div id="fileBar"
                class="hidden mt-4 flex items-center justify-between gap-4 rounded-2xl bg-gradient-to-r from-emerald-500/10 to-emerald-600/5 border border-emerald-500/20 px-5 py-4">
                <div class="flex items-center gap-3 flex-1 min-w-0">
                    <div
                        class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg shadow-emerald-500/50">
                        <i class="bi bi-check-lg text-white text-xl font-bold"></i>
                    </div>
                    <div class="min-w-0 flex-1">
                        <div class="text-sm text-slate-400 mb-0.5">File uploaded</div>
                        <div id="fileName" class="truncate text-white font-semibold">-</div>
                    </div>
                </div>
                <div class="flex-shrink-0">
                    <span id="fileSize" class="text-emerald-400 font-bold text-sm">0 MB</span>
                </div>
            </div>

            <div id="controls" class="hidden mt-6 rounded-2xl bg-slate-800/50 border border-slate-700 p-5">
                <div class="flex items-center gap-4 mb-4">
                    <span id="curTime" class="text-sm font-mono text-blue-400 font-semibold">00:00</span>
                    <input id="seekBar" type="range" value="0" min="0" max="100" step="0.01"
                        class="flex-1 h-2 bg-slate-700 rounded-full appearance-none cursor-pointer [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:w-4 [&::-webkit-slider-thumb]:h-4 [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:bg-gradient-to-r [&::-webkit-slider-thumb]:from-blue-500 [&::-webkit-slider-thumb]:to-purple-500 [&::-webkit-slider-thumb]:shadow-lg">
                    <span id="durTime" class="text-sm font-mono text-slate-400 font-semibold">00:00</span>
                </div>
                <div class="flex justify-center gap-3">
                    <button type="button" id="back5"
                        class="group flex items-center gap-2 rounded-xl bg-slate-700 hover:bg-slate-600 px-5 py-3 transition-all duration-200 hover:scale-105">
                        <i class="bi bi-rewind text-white group-hover:text-blue-400 transition-colors"></i>
                        <span class="text-white text-sm font-semibold">5s</span>
                    </button>
                    <button type="button" id="playPause"
                        class="flex items-center justify-center rounded-xl bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 w-14 h-14 shadow-lg shadow-blue-500/50 hover:shadow-blue-500/70 transition-all duration-200 hover:scale-110">
                        <i class="bi bi-play-fill text-white text-2xl"></i>
                    </button>
                    <button type="button" id="fwd5"
                        class="group flex items-center gap-2 rounded-xl bg-slate-700 hover:bg-slate-600 px-5 py-3 transition-all duration-200 hover:scale-105">
                        <span class="text-white text-sm font-semibold">5s</span>
                        <i class="bi bi-fast-forward text-white group-hover:text-blue-400 transition-colors"></i>
                    </button>
                </div>
            </div>

            <div id="trimBox" class="hidden mt-6 rounded-2xl bg-slate-800/50 border border-slate-700 p-6">
                <div class="flex items-center justify-between mb-5">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-amber-500/20 rounded-xl flex items-center justify-center">
                            <i class="bi bi-scissors text-amber-400 text-xl"></i>
                        </div>
                        <div class="font-semibold text-white text-lg">Trim Selection</div>
                    </div>
                    <div class="text-sm bg-slate-700/50 px-4 py-2 rounded-lg border border-slate-600">
                        <span class="text-slate-400">Duration:</span>
                        <span id="trimLen" class="font-mono text-white font-bold ml-2">00:00</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="space-y-3">
                        <label class="block text-sm font-medium text-slate-300">Start Time</label>
                        <div class="flex items-center gap-3">
                            <span id="startLabel" class="text-blue-400 font-mono font-bold text-lg w-16">00:00</span>
                            <input id="startRange" type="range" min="0" max="0" step="0.01"
                                value="0"
                                class="flex-1 h-2 bg-slate-700 rounded-full appearance-none cursor-pointer [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:w-4 [&::-webkit-slider-thumb]:h-4 [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:bg-gradient-to-r [&::-webkit-slider-thumb]:from-blue-500 [&::-webkit-slider-thumb]:to-blue-600 [&::-webkit-slider-thumb]:shadow-lg">
                        </div>
                    </div>
                    <div class="space-y-3">
                        <label class="block text-sm font-medium text-slate-300">End Time</label>
                        <div class="flex items-center gap-3">
                            <span id="endLabel" class="text-purple-400 font-mono font-bold text-lg w-16">00:00</span>
                            <input id="endRange" type="range" min="0" max="0" step="0.01"
                                value="0"
                                class="flex-1 h-2 bg-slate-700 rounded-full appearance-none cursor-pointer [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:w-4 [&::-webkit-slider-thumb]:h-4 [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:bg-gradient-to-r [&::-webkit-slider-thumb]:from-purple-500 [&::-webkit-slider-thumb]:to-purple-600 [&::-webkit-slider-thumb]:shadow-lg">
                        </div>
                    </div>
                </div>

                <div id="trimHint"
                    class="mt-4 flex items-center gap-2 text-sm bg-amber-500/10 border border-amber-500/20 text-amber-400 px-4 py-3 rounded-xl">
                    <i class="bi bi-info-circle"></i>
                    <span>Minimal durasi potongan adalah 5 detik.</span>
                </div>
            </div>
        </div>

        {{-- STEP 2: PARAMETER KINETIKA --}}
        <div id="step2"
            class="rounded-3xl bg-slate-900/5 backdrop-blur-xl border border-white/10 shadow-2xl p-6 sm:p-8 hidden">
            <div class="mb-6">
                <div class="flex items-center gap-3 mb-2">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <i class="bi bi-sliders text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-white">Parameter Kinetika</h3>
                </div>
                <p class="text-sm text-slate-400 ml-13">Isi parameter yang diperlukan untuk Analisis Kinetika</p>
            </div>

            <form action="{{ route('analisis.store') }}" method="POST" enctype="multipart/form-data"
                id="submitForm">
                @csrf
                {{-- canonical file input yang akan dikirim --}}
                <input type="file" name="video" id="realInputForSubmit" class="hidden" />
                <input type="hidden" name="trim_start" id="trimStartSubmit" value="0">
                <input type="hidden" name="trim_end" id="trimEndSubmit" value="0">
                <input type="hidden" name="analysis_type" id="analysisType" value="kinetika">
                <input type="hidden" name="roi_x" id="roiX" value="0">
                <input type="hidden" name="roi_y" id="roiY" value="0">
                <input type="hidden" name="roi_width" id="roiW" value="1">
                <input type="hidden" name="roi_height" id="roiH" value="1">

                {{-- PARAMS KINETIKA --}}
                <div class="params space-y-4" data-analysis="kinetika">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <label class="block">
                            <div class="text-sm font-medium text-slate-300 mb-2 flex items-center gap-2">
                                <i class="bi bi-droplet text-blue-400"></i>
                                <span>Konsentrasi Awal (M) *</span>
                            </div>
                            <input name="konsentrasi_awal" required type="number" step="any"
                                class="param-input block w-full rounded-xl border border-slate-600 bg-slate-800/50 px-4 py-3 text-white placeholder-slate-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all"
                                placeholder="Contoh: 0.1">
                        </label>
                        <label class="block">
                            <div class="text-sm font-medium text-slate-300 mb-2 flex items-center gap-2">
                                <i class="bi bi-speedometer text-emerald-400"></i>
                                <span>pH *</span>
                            </div>
                            <input name="ph" required type="number" step="any" min="0"
                                max="14"
                                class="param-input block w-full rounded-xl border border-slate-600 bg-slate-800/50 px-4 py-3 text-white placeholder-slate-500 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition-all"
                                placeholder="Contoh: 7">
                        </label>
                        <label class="block">
                            <div class="text-sm font-medium text-slate-300 mb-2 flex items-center gap-2">
                                <i class="bi bi-cup text-purple-400"></i>
                                <span>Volume Total (mL) *</span>
                            </div>
                            <input name="volume" required type="number" step="any"
                                class="param-input block w-full rounded-xl border border-slate-600 bg-slate-800/50 px-4 py-3 text-white placeholder-slate-500 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 transition-all"
                                placeholder="Contoh: 10">
                        </label>
                        <label class="block">
                            <div class="text-sm font-medium text-slate-300 mb-2 flex items-center gap-2">
                                <i class="bi bi-water text-cyan-400"></i>
                                <span>Pelarut *</span>
                            </div>
                            <input name="pelarut" required type="text"
                                class="param-input block w-full rounded-xl border border-slate-600 bg-slate-800/50 px-4 py-3 text-white placeholder-slate-500 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all"
                                placeholder="Contoh: Air">
                        </label>
                        <label class="block">
                            <div class="text-sm font-medium text-slate-300 mb-2 flex items-center gap-2">
                                <i class="bi bi-arrow-repeat text-amber-400"></i>
                                <span>Laju Pengadukan (rpm) *</span>
                            </div>
                            <input name="laju_pengadukan" required type="number" step="any"
                                class="param-input block w-full rounded-xl border border-slate-600 bg-slate-800/50 px-4 py-3 text-white placeholder-slate-500 focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 transition-all"
                                placeholder="Contoh: 150">
                        </label>
                        <label class="block">
                            <div class="text-sm font-medium text-slate-300 mb-2 flex items-center gap-2">
                                <i class="bi bi-tag text-pink-400"></i>
                                <span>Nama Reaksi *</span>
                            </div>
                            <input name="nama_reaksi" required type="text"
                                class="param-input block w-full rounded-xl border border-slate-600 bg-slate-800/50 px-4 py-3 text-white placeholder-slate-500 focus:border-pink-500 focus:ring-2 focus:ring-pink-500/20 transition-all"
                                placeholder="Contoh: Traffic Light">
                        </label>
                    </div>
                </div>

                {{-- SUBMIT --}}
                <div class="mt-8">
                    <button id="submitBtn" type="submit"
                        class="group relative w-full rounded-2xl bg-gradient-to-r from-blue-600 to-purple-600 px-6 py-4 font-bold text-white text-lg shadow-xl shadow-blue-500/25 hover:shadow-blue-500/40 hover:scale-[1.02] disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100 transition-all duration-200 overflow-hidden"
                        disabled>
                        <span class="relative z-10 flex items-center justify-center gap-2">
                            <i class="bi bi-rocket-takeoff text-xl"></i>
                            <span>Mulai Analisis</span>
                        </span>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-blue-500 to-purple-500 opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Loading Overlay -->
<div id="loadingOverlay"
    class="hidden fixed inset-0 bg-black/80 backdrop-blur-sm flex items-center justify-center z-50">
    <div
        class="bg-white/10 backdrop-blur-xl border border-white/20 p-8 rounded-3xl shadow-2xl flex flex-col items-center">
        <div class="relative w-20 h-20 mb-6">
            <div class="absolute inset-0 border-4 border-blue-500/30 rounded-full"></div>
            <div class="absolute inset-0 border-4 border-transparent border-t-blue-500 rounded-full animate-spin">
            </div>
        </div>
        <p class="text-white font-bold text-xl mb-2">Analisis Sedang Diproses</p>
        <p class="text-slate-400 text-sm">Mohon tunggu beberapa saat...</p>
    </div>
</div>

{{-- JS --}}
<script>
    // helper
    const $ = id => document.getElementById(id);
    const fmt = s => {
        s = Math.max(0, Math.floor(s || 0));
        const m = String(Math.floor(s / 60)).padStart(2, '0');
        const ss = String(Math.floor(s % 60)).padStart(2, '0');
        return `${m}:${ss}`;
    };

    // elements
    const step1 = $('step1'),
        step2 = $('step2');
    const dropZone = $('dropZone');
    const videoInput = $('videoInput'),
        realInputForSubmit = $('realInputForSubmit');
    const video = $('videoPreview'),
        uploadText = $('uploadText');
    const fileBar = $('fileBar'),
        fileName = $('fileName'),
        fileSize = $('fileSize');
    const controls = $('controls'),
        seekBar = $('seekBar'),
        curTime = $('curTime'),
        durTime = $('durTime');
    const back5 = $('back5'),
        fwd5 = $('fwd5'),
        playPause = $('playPause');
    const trimBox = $('trimBox'),
        startRange = $('startRange'),
        endRange = $('endRange');
    const startLabel = $('startLabel'),
        endLabel = $('endLabel'),
        trimLen = $('trimLen'),
        trimHint = $('trimHint');
    const trimStartSubmit = $('trimStartSubmit'),
        trimEndSubmit = $('trimEndSubmit');
    const analysisType = $('analysisType'),
        submitBtn = $('submitBtn'),
        submitForm = $('submitForm');

    const roiCanvas = $('roiCanvas');
    const roiCtx = roiCanvas.getContext('2d');
    const roiX = $('roiX'),
        roiY = $('roiY'),
        roiW = $('roiW'),
        roiH = $('roiH');

    const MAX_SIZE = 100 * 1024 * 1024,
        MIN_TRIM = 5;
    let videoReady = false;

    // stepper UI
    function setStepper(active) {
        document.querySelectorAll('#stepper [data-step]').forEach(el => {
            const stepNum = Number(el.getAttribute('data-step'));
            const circle = el.querySelector('.step-circle');
            if (!circle) return;
            if (stepNum < active) {
                circle.className =
                    'step-circle w-9 h-9 rounded-full flex items-center justify-center bg-emerald-500 text-white font-semibold';
            } else if (stepNum === active) {
                circle.className =
                    'step-circle w-9 h-9 rounded-full flex items-center justify-center bg-blue-600 text-white font-semibold';
            } else {
                circle.className =
                    'step-circle w-9 h-9 rounded-full flex items-center justify-center bg-slate-200 text-slate-600';
            }
        });
    }
    setStepper(1);

    // --- DropZone Handling (aktif sebelum upload, mati sesudah upload) ---
    function openFilePicker() {
        videoInput.click();
    }

    function dragOver(e) {
        e.preventDefault();
        dropZone.classList.add('bg-blue-700/70', 'border-white/70');
    }

    function dragLeave(e) {
        e.preventDefault();
        dropZone.classList.remove('bg-blue-700/70', 'border-white/70');
    }

    function handleDrop(e) {
        e.preventDefault();
        if (e.dataTransfer?.files?.length) handleFile(e.dataTransfer.files[0]);
    }

    function enableDropZone() {
        dropZone.addEventListener('click', openFilePicker);
        ['dragenter', 'dragover'].forEach(evt => dropZone.addEventListener(evt, dragOver));
        ['dragleave', 'drop'].forEach(evt => dropZone.addEventListener(evt, dragLeave));
        dropZone.addEventListener('drop', handleDrop);
    }

    function disableDropZone() {
        dropZone.removeEventListener('click', openFilePicker);
        ['dragenter', 'dragover'].forEach(evt => dropZone.removeEventListener(evt, dragOver));
        ['dragleave', 'drop'].forEach(evt => dropZone.removeEventListener(evt, dragLeave));
        dropZone.removeEventListener('drop', handleDrop);
    }

    // aktifkan dropzone di awal
    enableDropZone();
    videoInput.addEventListener('change', () => {
        if (videoInput.files?.length) handleFile(videoInput.files[0]);
    });

    // copy file ke hidden input
    function copyFileToHiddenInput(file) {
        const dt = new DataTransfer();
        dt.items.add(file);
        realInputForSubmit.files = dt.files;
    }

    // handle file picked
    function handleFile(file) {
        if (!file || !file.type.startsWith('video/')) {
            alert('❌ Harap upload file video.');
            return;
        }
        if (file.size > MAX_SIZE) {
            alert('❌ Ukuran file melebihi 100 MB.');
            return;
        }

        // setelah file dipilih → matikan dropzone supaya ROI tidak terganggu
        disableDropZone();

        // show file info
        fileName.textContent = file.name;
        fileSize.textContent = (file.size / (1024 * 1024)).toFixed(2) + ' MB';
        fileBar.classList.remove('hidden');

        // preview
        const url = URL.createObjectURL(file);
        video.src = url;
        video.classList.remove('hidden');
        uploadText.classList.add('hidden');

        controls.classList.remove('hidden');
        trimBox.classList.remove('hidden');
        roiCanvas.classList.remove('hidden');

        // copy file ke hidden input
        copyFileToHiddenInput(file);

        // reveal parameters step
        step2.classList.remove('hidden');
        setStepper(2);
    }

    // video metadata loaded
    video.addEventListener('loadedmetadata', () => {
        const d = Math.floor(video.duration || 0);
        if (!isFinite(d) || d === 0) return;
        if (d < MIN_TRIM) {
            alert('Durasi video kurang dari 5 detik. Harap gunakan video lain.');
            resetAll();
            return;
        }

        videoReady = true;
        seekBar.max = d;
        seekBar.value = 0;
        curTime.textContent = '00:00';
        durTime.textContent = fmt(d);

        startRange.min = 0;
        startRange.max = d;
        startRange.value = 0;
        endRange.min = 0;
        endRange.max = d;
        endRange.value = d;

        updateTrim();
        updateSubmitState();

        // resize canvas ROI biar pas dengan video
        roiCanvas.width = video.clientWidth;
        roiCanvas.height = video.clientHeight;
    });

    // --- ROI Selection ---
    let roi = null,
        isDrawing = false,
        startX = 0,
        startY = 0;

    roiCanvas.addEventListener('mousedown', (e) => {
        isDrawing = true;
        const rect = roiCanvas.getBoundingClientRect();
        startX = e.clientX - rect.left;
        startY = e.clientY - rect.top;
    });

    roiCanvas.addEventListener('mousemove', (e) => {
        if (!isDrawing) return;
        const rect = roiCanvas.getBoundingClientRect();
        const curX = e.clientX - rect.left;
        const curY = e.clientY - rect.top;
        const w = curX - startX,
            h = curY - startY;

        roiCtx.clearRect(0, 0, roiCanvas.width, roiCanvas.height);
        roiCtx.strokeStyle = 'red';
        roiCtx.lineWidth = 2;
        roiCtx.strokeRect(startX, startY, w, h);
    });

    roiCanvas.addEventListener('mouseup', (e) => {
        isDrawing = false;
        const rect = roiCanvas.getBoundingClientRect();
        const endX = e.clientX - rect.left;
        const endY = e.clientY - rect.top;
        roi = {
            x: Math.min(startX, endX),
            y: Math.min(startY, endY),
            w: Math.abs(endX - startX),
            h: Math.abs(endY - startY)
        };
        roiCtx.clearRect(0, 0, roiCanvas.width, roiCanvas.height);
        roiCtx.strokeStyle = 'lime';
        roiCtx.lineWidth = 2;
        roiCtx.strokeRect(roi.x, roi.y, roi.w, roi.h);

        // isi hidden input untuk submit
        roiX.value = roi.x;
        roiY.value = roi.y;
        roiW.value = roi.w;
        roiH.value = roi.h;
        updateSubmitState();
    });

    // player controls
    video.addEventListener('timeupdate', () => {
        seekBar.value = video.currentTime;
        curTime.textContent = fmt(video.currentTime);
    });
    seekBar.addEventListener('input', () => video.currentTime = Number(seekBar.value));
    back5.addEventListener('click', () => video.currentTime = Math.max(0, video.currentTime - 5));
    fwd5.addEventListener('click', () => video.currentTime = Math.min(video.duration, video.currentTime + 5));
    playPause.addEventListener('click', () => {
        if (video.paused) {
            video.play();
            playPause.innerHTML = '<i class="bi bi-pause"></i>';
        } else {
            video.pause();
            playPause.innerHTML = '<i class="bi bi-play-fill"></i>';
        }
    });

    // trim handlers
    startRange.addEventListener('input', () => {
        if (Number(startRange.value) > Number(endRange.value)) endRange.value = startRange.value;
        updateTrim();
    });
    endRange.addEventListener('input', () => {
        if (Number(endRange.value) < Number(startRange.value)) startRange.value = endRange.value;
        updateTrim();
    });

    function updateTrim() {
        const s = Math.floor(Number(startRange.value));
        const e = Math.floor(Number(endRange.value));
        const len = Math.max(0, e - s);

        startLabel.textContent = fmt(s);
        endLabel.textContent = fmt(e);
        trimLen.textContent = fmt(len);

        const ok = len >= MIN_TRIM;
        trimStartSubmit.value = s;
        trimEndSubmit.value = e;
        trimHint.textContent = ok ? 'Siap dipotong.' : 'Minimal durasi potongan adalah 5 detik.';
        trimHint.className = 'mt-2 text-xs ' + (ok ? 'text-emerald-200' : 'text-amber-200/90');

        updateSubmitState();
    }

    // validation parameter inputs
    function paramsValid() {
        const form = document.querySelector('.params[data-analysis="kinetika"]');
        if (!form) return false;
        const inputs = form.querySelectorAll('.param-input[required]');
        for (let i = 0; i < inputs.length; i++) {
            const v = inputs[i].value;
            if (typeof v === 'undefined' || String(v).trim() === '') return false;
            if (inputs[i].type === 'number') {
                const n = parseFloat(v);
                if (!isFinite(n)) return false;
            }
        }
        return true;
    }

    // update submit button enabled state
    function updateSubmitState() {
        const hasFile = realInputForSubmit.files?.length > 0;
        const trimOK = (Number(trimEndSubmit.value) - Number(trimStartSubmit.value)) >= MIN_TRIM;
        const hasAnalysis = analysisType.value === 'kinetika';
        const pValid = paramsValid();
        const roiOK = (Number(roiW.value) > 0 && Number(roiH.value) > 0);

        submitBtn.disabled = !(hasFile && videoReady && trimOK && hasAnalysis && pValid && roiOK);
    }

    // reset UI
    function resetAll() {
        try {
            video.pause();
        } catch (e) {}
        try {
            URL.revokeObjectURL(video.src);
        } catch (e) {}
        video.src = '';
        video.classList.add('hidden');
        uploadText.classList.remove('hidden');
        fileBar.classList.add('hidden');
        controls.classList.add('hidden');
        trimBox.classList.add('hidden');
        roiCanvas.classList.add('hidden');
        videoReady = false;
        videoInput.value = '';
        realInputForSubmit.value = '';
        step2.classList.add('hidden');
        setStepper(1);
        roiCtx.clearRect(0, 0, roiCanvas.width, roiCanvas.height);
        roiX.value = roiY.value = roiW.value = roiH.value = '';
        enableDropZone();
        updateSubmitState();
    }
    window.resetAll = resetAll;

    // copy file just before submit (safety)
    submitForm.addEventListener('submit', (e) => {
        const f = videoInput.files?.[0];
        if (f && (!realInputForSubmit.files || realInputForSubmit.files.length === 0)) {
            copyFileToHiddenInput(f);
        }
        updateSubmitState();

        if (submitBtn.disabled) {
            e.preventDefault();
            alert('Lengkapi semua langkah, pilih ROI, dan isi parameter sebelum memulai analisis.');
        }
        // Tampilkan loading overlay & disable tombol
        document.getElementById('loadingOverlay').classList.remove('hidden');
        submitBtn.disabled = true;
        submitBtn.textContent = "Sedang menganalisis...";
    });

    // attach listeners to parameter inputs
    document.querySelectorAll('.param-input').forEach(inp => inp.addEventListener('input', updateSubmitState));
</script>
