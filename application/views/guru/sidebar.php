<nav id="sidebar" class="active">
    <a href="<?php echo site_url('welcome/index');?>" class="logo">
    <img src="<?php echo base_url('assets/guru/images/logo.png'); ?>" alt="Logo" style="width: 100%; height: auto;">
    </a>
    <ul class="list-unstyled components mb-5">
        <li>
            <a href="<?php echo site_url('welcome/list_guru_siswa');?>"><span class="fa fa-user"></span> Guru dan Siswa</a>
        </li>
        <li>
            <a href="<?php echo site_url('welcome/list_soal');?>"><span class="fa fa-sticky-note"></span> Soal</a>
        </li>
        <li>
            <a href="<?php echo site_url('welcome/list_nilai');?>"><span class="fa fa-list"></span> Nilai</a>
        </li>
        <li>
            <a href="<?php echo site_url('auth/logout'); ?>"><span class="fas fa-sign-out"></span> Log Out</a>
        </li>
    </ul>
    <div class="footer">
        <p>
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Web Belajar KPK dan FPB by Muhammad Irham Risnanda
            <a href="http://localhost/Matematika/index.php/auth/login">Jangan tekan</a>
        </p>
    </div>
</nav>