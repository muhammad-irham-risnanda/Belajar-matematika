    <div id="content" class="content flex-grow-1">
        <header class="p-4 bg-dark d-flex justify-content-between align-items-center">
            <button id="toggleButton" class="btn btn-secondary"><i class="fas fa-bars"></i></button>
            <h1 class="h3 text-white mx-auto">Welcome <?php echo htmlspecialchars($username); ?></h1>
        </header>
        <main class="p-4 flex-grow-1 overflow-auto">
            <div class="mt-4">
                <h1 class="h3">Home</h1>
                <p class="mt-2">Selamat datang di web pembelajaran Matematika dengan topik Kelipatan persekutuan terkecil (KPK) dan Faktor Persekutuan terbesar (FPB) untuk kelas 5</p>
                <div class="mt-4 p-4 content-box rounded">
                <p><a href="<?php echo base_url('index.php/pages/materi');?>">Materi</a> - Berisi topic pembahasan tentang materi KPK dan FBP</p>
                </div>
                <div class="mt-4 p-4 content-box rounded">
                <p><a href="<?php echo base_url('index.php/pages/tujuan');?>">Tujuan</a> - Berisi capaian dan tujuan di buatnya web pemebelajaran ini</p>
                </div>
                <div class="mt-4 p-4 content-box rounded">
                <p><a href="<?php echo base_url('index.php/pages/info');?>">Info</a> - Berisi info tentang pembuat web ini</p>
                </div>
            </div>
        </main>