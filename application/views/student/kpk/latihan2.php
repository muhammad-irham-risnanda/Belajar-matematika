<div id="content" class="content flex-grow-1">
        <header class="p-4 bg-dark d-flex justify-content-between align-items-center">
            <button id="toggleButton" class ="btn btn-secondary"><i class="fas fa-bars"></i></button>
            <h1 class="h3 text-white mx-auto">LATIHAN KPK</h1>
        </header>
        <div class="p-2 bg-white border border-black d-flex justify-content-center align-items-center">
        <a href="<?php echo base_url('index.php/pages/kpk_materi2'); ?>" class="btn btn-dark mx-1">
                <i class="fas fa-book"></i> Materi
            </a>
            <a href="<?php echo base_url('index.php/pages/video_kpk');?>" class="btn btn-dark mx-1">
                <i class="fas fa-video"></i> Video
            </a>
            <a href="<?php echo base_url('index.php/pages/kpk_latihan1');?>" class="btn btn-dark mx-1">
                <i class="fas fa-pencil-alt"></i> Latihan
            </a>
            <a href="<?php echo base_url('index.php/pages/kpk');?>" class="btn btn-dark mx-1">
                <i class="fas fa-question-circle"></i> Quiz
            </a>
        </div>
        <main class="p-4 flex-grow-1 overflow-auto">
            <div class="mt-4">
                <div class="mt-4 p-4 content-box rounded"> 
                    <h1 class="text-center">Latihan Kelipatan Persekutuan</h1>
                    <P class="text-center">Jawab soal tentang Kelipatan Persekutuan yang diberikan dengan benar dan jujur
                    <p class="text-center">
                        <strong>*Jawaban minimal lebih dari 2 dan jawaban harus pakai , contoh 1, 2,*</strong>
                    </p>
                    <div id="questions-container"></div>

                    <div class="text-center">
                        <button class="btn btn-primary" onclick="evaluateAnswers()">Selesai</button>
                        <button class="btn btn-secondary" onclick="resetQuiz()">Reset</button>
                    </div>
                    <p id="result" class="result text-center"></p>
                    <p id="score" class="result text-center"></p> <!-- Tempat untuk menampilkan nilai -->
                </div>
                <div class="d-flex justify-content-center mt-4">
                <a href="<?php echo base_url('index.php/pages/kpk_latihan');?>" class="btn btn-dark mx-1">
                    <i class="fas fa-arrow-left"></i> <span class="d-inline-block" style="margin-left: 5px;">Kembali</span>
                </a>
                <a href="<?php echo base_url('index.php/pages/kpk_latihan3');?>" class="btn btn-dark mx-1">
                    <span class="d-inline-block" style="margin-right: 5px;">Selanjutnya</span> <i class="fas fa-arrow-right"></i>
                </a>
                </div>
            </div>
        </main>
        <script src="<?php echo base_url('assets/js/kpk2.js'); ?>"></script>