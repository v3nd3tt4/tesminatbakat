<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Minat Bakat</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">MB</a>
    </div>
    <ul class="sidebar-menu">
      <li class="<?php if($link == 'dashboard'){?>active<?php }?>"><a class="nav-link" href="<?=base_url()?>welcome"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
        <?php if($this->session->userdata('level') == 'admin'){?>
        <li class="menu-header">Pengaturan</li>
        <li class="nav-item dropdown <?=$link=='kategori_sekolah' || $link == 'mapel_rapor'? 'active':''?>">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i><span>Setting Nilai Rapor</span></a>
          <ul class="dropdown-menu">
            <li class="<?=$link=='kategori_sekolah'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>kategori_sekolah">Kategori Sekolah</a></li>
            <li class="<?=$link=='mapel_rapor'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>mapel_rapor">MAPEL Rapor</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown <?=$link=='kategori_utbk' || $link == 'mapel_utbk'? 'active':''?>">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i><span>Setting Nilai UTBK</span></a>
          <ul class="dropdown-menu">
            <li class="<?=$link=='kategori_utbk'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>kategori_utbk">Kategori UTBK</a></li>
            <li class="<?=$link=='mapel_utbk'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>mapel_utbk">MAPEL UTBK</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown <?=$link=='jk' || $link == 'agama' || $link == 'sekolah'? 'active':''?>">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i><span>Setting Master Data</span></a>
          <ul class="dropdown-menu">
            <li class="<?=$link=='jk'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>jk">Jenis Kelamin</a></li>
            <li class="<?=$link=='agama'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>agama">Agama</a></li>
            <li class="<?=$link=='sekolah'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>sekolah">Sekolah</a></li>
          </ul>
        </li>
        <li class="menu-header">Peserta</li>
        <li class="nav-item dropdown <?=$link=='siswa' || $link=='siswa_import'? 'active':''?>">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data</span></a>
          <ul class="dropdown-menu">
            <li class="<?=$link=='siswa'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>siswa">Siswa</a></li>
            <li class="<?=$link=='siswa_import'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>siswa_import">Import Siswa</a></li>
          </ul>
        </li>
        <?php }else if($this->session->userdata('level') == 'siswa'){?>
        <li class="<?php if($link == 'profil_siswa'){?>active<?php }?>"><a class="nav-link" href="<?=base_url()?>profil_siswa"><i class="fas fa-user"></i> <span>Profil</span></a></li>
        <?php }?>
        <!-- <li class="active"><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> -->
      </ul>

      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <?php if(empty($this->session->userdata('is_login'))){?>
        <a href="<?=base_url()?>login" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-sign-in-alt"></i> Login
        </a>
        <?php }else{?>
        <a href="<?=base_url()?>login/logout" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-sign-in-alt"></i> Logout
        </a>
        <?php }?>
      </div>
  </aside>
</div>