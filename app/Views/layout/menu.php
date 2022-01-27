<?php

use App\Controllers\Admin\Siswa;

if(session()->get('akses') == 'Admin') :?>
<li class="menu-header">Navbar Menu</li>
<li class="<?= session()->get('active') == 'home' ? 'active':''; ?>"><a class="nav-link"
        href="<?= site_url('/home')?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
<li
    class="nav-item dropdown <?= session()->get('active')=='programkursus'?'active':(session()->get('active')=='instruktur'?'active': (session()->get('active')=='kelaskursus'?'active': (session()->get('active')=='siswa'?'active': ''))) ;?>">
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
        <li class="<?= session()->get('active') == 'siswa' ? 'active':''; ?>"><a class="nav-link"
                href="<?= site_url('admin/siswa')?>">Siswa</a>
        </li>
    </ul>
</li>
<li class="<?= session()->get('active') == 'detailkelas' ? 'active':''; ?>"><a class="nav-link"
        href="<?= site_url('detailkelas')?>"><i class="fas fa-users"></i></i>
        <span>Peserta
            Didik</span></a></li>
<li><a class="nav-link" href="<?= site_url('admin/alumni')?>"> <i class="fas fa-graduation-cap"></i> <span>Data
            Alumni</span></a></li>
<?php endif;?>

<?php if(session()->get('akses') =='Siswa') :?>
<li class="menu-header">Navbar Menu</li>
<li><a class="nav-link" href="<?= site_url('/Siswa')?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
<li><a class="nav-link" href="<?= site_url('siswa/biodata')?>"><i class="fas fa-user-edit"></i> <span>Biodata
            Siswa</span></a></li>
<li><a class="nav-link" href="<?= site_url()?>"><i class="fas fa-file-alt"></i></i> <span>Absen Siswa</span></a></li>

<?php endif;?>