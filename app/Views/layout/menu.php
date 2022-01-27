<?php

use App\Controllers\Admin\Siswa;

if(session()->get('akses') == 'Admin') :?>
<li class="menu-header">Navbar Menu</li>
<li class="<?= session()->get('active') == 'home' ? 'active':''; ?>"><a class="nav-link"
        href="<?= site_url('/home')?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
<li
    class="nav-item dropdown <?= session()->get('active')=='programkursus'?'active':(session()->get('active')=='instruktur'?'active': (session()->get('active')=='kelaskursus'?'active': '')) ;?>">
    <a href="" class="nav-link has-dropdown"><i class="fas fa-users-cog"></i><span>Administrasi</span></a>
    <ul class="dropdown-menu">
        <li class="<?= session()->get('active') == 'programkursus' ? 'active':''; ?>"><a class="nav-link"
                href="<?= site_url('admin/Programkursus')?>">Program Kursus</a>
        </li>
        <li class="<?= session()->get('active') == 'instruktur' ? 'active':''; ?>"><a class="nav-link"
                href="<?= site_url('admin/instruktur')?>">Instruktur</a>
        </li>
        <li class="<?= session()->get('active') == 'kelaskursus' ? 'active':''; ?>"><a class="nav-link"
                href="<?= site_url('admin/kelas')?>">Kelas Kursus</a>
        </li>

    </ul>
</li>
<li class="<?= session()->get('active') == 'siswa' ? 'active':''; ?>"><a class="nav-link"
        href="<?= site_url('admin/siswa')?>"><i class="fas fa-users"></i></i>
        <span>Peserta
            Didik</span></a></li>

<?php endif;?>

<?php if(session()->get('akses') =='Siswa') :?>
<li class="menu-header">Navbar Menu</li>
<li><a class="nav-link" href="<?= base_url('/Siswa')?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
<li><a class="nav-link" href="<?= base_url('siswa/biodata')?>"><i class="fas fa-user-edit"></i> <span>Biodata
            Siswa</span></a></li>
<li><a class="nav-link" href="<?= base_url('siswa/daftar')?>"><i class="fas fa-file"></i> <span>Daftar
            Kelas</span></a>
</li>
<li><a class="nav-link" href="<?= base_url('siswa/absen')?>"><i class="fas fa-file-alt"></i></i> <span>Absen
            Siswa</span></a></li>

<?php endif;?>