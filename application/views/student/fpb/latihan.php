    <div id="content" class="content flex-grow-1">
        <header class="p-4 bg-dark d-flex justify-content-between align-items-center">
            <button id="toggleButton" class="btn btn-secondary"><i class="fas fa-bars"></i></button>
            <h1 class="h3 text-white mx-auto">Latihan FPB</h1>
        </header>
        <div class="p-2 bg-white border border-black d-flex justify-content-center align-items-center">
            <a href="<?php echo base_url('index.php/pages/fpb_materi'); ?>" class="btn btn-dark mx-1">
                <i class="fas fa-book"></i> Materi
            </a>
            <a href="<?php echo base_url('index.php/pages/video_fpb'); ?>" class="btn btn-dark mx-1">
                <i class="fas fa-video"></i> Video
            </a>
            <a href="<?php echo base_url('index.php/pages/fpb_latihan'); ?>" class="btn btn-dark mx-1">
                <i class="fas fa-pencil-alt"></i> Latihan
            </a>
            <a href="<?php echo base_url('index.php/pages/fpb'); ?>" class="btn btn-dark mx-1">
                <i class="fas fa-question-circle"></i> Quiz
            </a>
        </div>

        <main class="p-4 flex-grow-1 overflow-auto">
            <div class="mt-4">
                <div class="mt-4 p-4 content-box rounded">
                    <h1 class="mt-4">Latihan Mencari Faktor</h1>
                    <p>*Masukkan angka kedalam kotak biru*</p>
                    <div id="target-number" class="mt-3"></div>
                    <div id="factors" class="mt-3"></div>
                    <div id="draggable-numbers" class="mt-3"></div>
                    <button id="reset-button" class="btn btn-primary mt-3">Reset</button>
                    <div id="message" class="mt-3"></div>
                    <div id="answers" class="mt-3">Jawaban: </div>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <a href="<?php echo base_url('index.php/pages/fpb_latihan2'); ?>" class="btn btn-dark mx-1">
                        <span class="d-inline-block" style="margin-right: 5px;">Selanjutnya</span> <i
                            class="fas fa-arrow-right"></i>
                    </a>
                </div>
        </main>
        <script src="<?php echo base_url('assets/js/fpb1.js'); ?>"></script>