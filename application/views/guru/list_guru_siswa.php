<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<section class="about_section layout_padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-9 mx-auto text-center">
                <h1>List Guru Dan Siswa</h1>  
            </div>
        </div>

        <!-- Tabs for Guru and Siswa -->
        <div class="detail-box">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="guru-tab" data-toggle="tab" href="#guru" role="tab" aria-controls="guru" aria-selected="true">Data Guru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="siswa-tab" data-toggle="tab" href="#siswa" role="tab" aria-controls="siswa" aria-selected="false">Data Siswa</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <!-- Data Guru Tab -->
                <div class="tab-pane fade show active" id="guru" role="tabpanel" aria-labelledby="guru-tab">
                    <div class="table-container">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th>NO</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $u): ?>
                                <tr>
                                    <td><?php echo $u->id; ?></td>
                                    <td><?php echo $u->username; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('welcome/edit_guru/'.$u->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?php echo site_url('welcome/delete_guru/'.$u->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <a href="<?php echo site_url('auth/register'); ?>" class="btn btn-primary mb-3">Tambah Guru</a>
                </div>

                <!-- Data Siswa Tab -->
                <div class="tab-pane fade" id="siswa" role="tabpanel" aria-labelledby="siswa-tab">
                    <div class="table-container">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th>NO</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($students as $s): ?>
                                <tr>
                                    <td><?php echo $s->id; ?></td>
                                    <td><?php echo $s->username; ?></td>
                                    <td><?php echo $s->class; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('welcome/edit_siswa/'.$s->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?php echo site_url('welcome/delete_siswa/'.$s->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <a href="<?php echo site_url('auth/register_siswa'); ?>" class="btn btn-primary mb-3">Tambah Siswa</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Pagination -->
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center"> <!-- Centering the pagination -->
        <li class="page-item">
            <a class="page-link" href="<?php echo site_url('welcome/list_guru_siswa'); ?>">Previous</a>
        </li>
        <li class="page-item active" aria-current="page">
            <span class="page-link">1</span> 
        </li>
        <li class="page-item"><a class="page-link" href="<?php echo site_url('welcome/list_soal'); ?>">2</a></li>
        <li class="page-item"><a class="page-link" href="<?php echo site_url('welcome/list_nilai'); ?>">3</a></li>
        <li class="page-item">
            <a class="page-link" href="<?php echo site_url('welcome/list_soal'); ?>">Next</a>
        </li>
    </ul>
</nav>
