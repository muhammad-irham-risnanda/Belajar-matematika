<div id="content" class="p-4 p-md-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <h1 class="ml-auto">Welcome, <?php echo $username; ?></h1>
            </div>
        </div>
    </nav>
    <h2 class="mb-4">List Soal</h2>
        <!-- Tabs for Time Limits, KPK, FPB, Faktor Prima, Evaluasi -->
        <div class="detail-box">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="time-limits-tab" data-toggle="tab" href="#time-limits" role="tab" aria-controls="time-limits" aria-selected="true">Time Limits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="kpk-tab" data-toggle="tab" href="#kpk" role="tab" aria-controls="kpk" aria-selected="false">Soal KPK</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="fpb-tab" data-toggle="tab" href="#fpb" role="tab" aria-controls="fpb" aria-selected="false">Soal FPB</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="faktor-prima-tab" data-toggle="tab" href="#faktor-prima" role="tab" aria-controls="faktor-prima" aria-selected="false">Soal Faktor Prima</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="evaluasi-tab" data-toggle="tab" href="#evaluasi" role="tab" aria-controls="evaluasi" aria-selected="false">Soal Evaluasi</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <!-- Time Limits Tab -->
                <div class="tab-pane fade show active" id="time-limits" role="tabpanel" aria-labelledby="time-limits-tab">
                    <div class="table-container">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th>Batas Waktu</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($time_limits as $time_limit): ?>
                                <tr>
                                    <td><?php echo $time_limit->time_limit; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('welcome/edit_waktu/' . $time_limit->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?php echo site_url('welcome/delete_waktu/' . $time_limit->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php if (empty($time_limits)): ?>
                            <a href="<?php echo site_url('welcome/create_waktu'); ?>" class="btn btn-primary">Add Time Limit</a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Soal KPK Tab -->
                <div class="tab-pane fade" id="kpk" role="tabpanel" aria-labelledby="kpk-tab">
                    <div class="table-container">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Pertanyaan</th>
                                    <th>Opsi A</th>
                                    <th>Opsi B</th>
                                    <th>Opsi C</th>
                                    <th>Opsi D</th>
                                    <th>Jawaban</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kpks as $kpk): ?>
                                <tr>
                                    <td><?php echo $kpk->id; ?></td>
                                    <td><?php echo $kpk->question; ?></td>
                                    <td><?php echo $kpk->option_a; ?></td>
                                    <td><?php echo $kpk->option_b; ?></td>
                                    <td><?php echo $kpk->option_c; ?></td>
                                    <td><?php echo $kpk->option_d; ?></td>
                                    <td><?php echo $kpk->answer; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('welcome/edit_kpk/'.$kpk->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?php echo site_url('welcome/delete_kpk/'.$kpk->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <a href="<?php echo site_url('welcome/create_kpk'); ?>" class="btn btn-primary mb-3">Tambah Pertanyaan</a>
                    </div>
                </div>

                <!-- Soal FPB Tab -->
                <div class="tab-pane fade" id="fpb" role="tabpanel" aria-labelledby="fpb-tab">
                    <div class="table-container">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Pertanyaan</th>
                                    <th>Opsi A</th>
                                    <th>Opsi B</th>
                                    <th>Opsi C</th>
                                    <th>Opsi D</th>
                                    <th>Jawaban</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($fpbs as $fpb): ?>
                                <tr>
                                    <td><?php echo $fpb->id; ?></td>
                                    <td><?php echo $fpb->question; ?></td>
                                    <td><?php echo $fpb->option_a; ?></td>
                                    <td><?php echo $fpb->option_b; ?></td>
                                    <td><?php echo $fpb->option_c; ?></td>
                                    <td><?php echo $fpb->option_d; ?></td>
                                    <td><?php echo $fpb->answer; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('welcome/edit_fpb/'.$fpb->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?php echo site_url('welcome/delete_fpb/'.$fpb->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <a href="<?php echo site_url('welcome/create_fpb'); ?>" class="btn btn-primary mb-3">Tambah Pertanyaan</a>
                    </div>
                </div>

                <!-- Soal Faktor Prima Tab -->
                <div class="tab-pane fade" id="faktor-prima" role="tabpanel" aria-labelledby="faktor-prima-tab">
                    <div class="table-container">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Pertanyaan</th>
                                    <th>Opsi A</th>
                                    <th>Opsi B</th>
                                    <th>Opsi C</th>
                                    <th>Opsi D</th>
                                    <th>Jawaban</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($faktor_primas as $faktor_prima): ?>
                                <tr>
                                    <td><?php echo $faktor_prima->id; ?></td>
                                    <td><?php echo $faktor_prima->question; ?></td>
                                    <td><?php echo $faktor_prima->option_a; ?></td>
                                    <td><?php echo $faktor_prima->option_b; ?></td>
                                    <td><?php echo $faktor_prima->option_c; ?></td>
                                    <td><?php echo $faktor_prima->option_d; ?></td>
                                    <td><?php echo $faktor_prima->answer; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('welcome/edit_faktor_prima/'.$faktor_prima->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?php echo site_url('welcome/delete_faktor_prima/'.$faktor_prima->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <a href="<?php echo site_url('welcome/create_faktor_prima'); ?>" class="btn btn-primary mb-3">Tambah Pertanyaan</a>
                    </div>
                </div>

                <!-- Soal Evaluasi Tab -->
                <div class="tab-pane fade" id="evaluasi" role="tabpanel" aria-labelledby="evaluasi-tab">
                    <div class="table-container">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Pertanyaan</th>
                                    <th>Opsi A</th>
                                    <th>Opsi B</th>
                                    <th>Opsi C</th>
                                    <th>Opsi D</th>
                                    <th>Jawaban</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($evaluations as $evaluation): ?>
                                <tr>
                                    <td><?php echo $evaluation->id; ?></td>
                                    <td><?php echo $evaluation->question; ?></td>
                                    <td><?php echo $evaluation->option_a; ?></td>
                                    <td><?php echo $evaluation->option_b; ?></td>
                                    <td><?php echo $evaluation->option_c; ?></td>
                                    <td><?php echo $evaluation->option_d; ?></td>
                                    <td><?php echo $evaluation->answer; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('welcome/edit_evaluasi/'.$evaluation->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?php echo site_url('welcome/delete_evaluasi/'.$evaluation->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <a href="<?php echo site_url('welcome/create_evaluasi'); ?>" class="btn btn-primary mb-3">Tambah Pertanyaan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
