<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?=base_url()?>welcome">Minat Bakat</a>
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
        <li class="nav-item dropdown <?=$link=='kategori_pertanyaan' || $link == 'isi_pertanyaan'? 'active':''?>">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i><span>Setting Pertanyaan</span></a>
          <ul class="dropdown-menu">
            <li class="<?=$link=='kategori_pertanyaan'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>pertanyaan/kategori">Kategori</a></li>
            <li class="<?=$link=='isi_pertanyaan'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>pertanyaan/isi">Pertanyaan</a></li>
          </ul>
        </li>
        <li class="<?php if($link == 'fasilitas'){?>active<?php }?>"><a class="nav-link" href="<?=base_url()?>setting_fasilitas"><i class="fas fa-cog"></i> <span>Setting Fasilitas</span></a></li>

        <li class="<?php if($link == 'set_admin'){?>active<?php }?>"><a class="nav-link" href="<?=base_url()?>setting_admin"><i class="fas fa-cog"></i> <span>Setting Admin</span></a></li>

        <li class="menu-header">Peserta</li>
        <li class="nav-item dropdown <?=$link=='siswa' || $link=='siswa_import'? 'active':''?>">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data</span></a>
          <ul class="dropdown-menu">
            <li class="<?=$link=='siswa'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>siswa">Siswa</a></li>
            <li class="<?=$link=='siswa_import'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>siswa_import">Import Siswa</a></li>
          </ul>
        </li>
        <?php }else if($this->session->userdata('level') == 'siswa'){?>
        <!-- <li class="<?php if($link == 'profil_siswa'){?>active<?php }?>"><a class="nav-link" href="<?=base_url()?>profil_siswa"><i class="fas fa-user"></i> <span>Profil</span></a></li>
        <li class="<?php if($link == 'ganti_password'){?>active<?php }?>"><a class="nav-link" href="<?=base_url()?>profil_siswa/ganti_password"><i class="fas fa-key"></i> <span>Ganti Password</span></a></li>
        <li class="<?php if($link == 'nilai_rapor'){?>active<?php }?>"><a class="nav-link" href="<?=base_url()?>profil_siswa/nilai_rapor"><i class="fas fa-book"></i> <span>Nilai Rapor</span></a></li>
        <li class="<?php if($link == 'nilai_utbk'){?>active<?php }?>"><a class="nav-link" href="<?=base_url()?>profil_siswa/nilai_utbk"><i class="fas fa-book-open"></i> <span>Nilai UTBK</span></a></li>
         -->
        <?php 
        $update_profil = $this->db->get_where('tb_status_kelengkapan', array('id_siswa' => $this->session->userdata('id_siswa'), 'kategori' => 'profil'));
        $update_password = $this->db->get_where('tb_status_kelengkapan', array('id_siswa' => $this->session->userdata('id_siswa'), 'kategori' => 'password'));
        if($update_profil->num_rows() != 0 && $update_password->num_rows() != 0){?>
          <li class="<?php if($link == 'profil_siswa'){?>active<?php }?>"><a class="nav-link" href="<?=base_url()?>profil_siswa"><i class="fas fa-user"></i> <span>Profil</span></a></li>
          <li class="<?php if($link == 'ganti_password'){?>active<?php }?>"><a class="nav-link" href="<?=base_url()?>profil_siswa/ganti_password"><i class="fas fa-key"></i> <span>Ganti Password</span></a></li>
          <!-- <li class="<?php if($link == 'nilai_rapor'){?>active<?php }?>"><a class="nav-link" href="<?=base_url()?>profil_siswa/nilai_rapor"><i class="fas fa-book"></i> <span>Nilai Rapor</span></a></li> -->

          <li class="nav-item dropdown <?=$link=='nilai_rapor' || $link == 'riwayat_rapor'? 'active':''?>">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Nilai Rapor</span></a>
            <ul class="dropdown-menu">
              <li class="<?=$link=='nilai_rapor'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>profil_siswa/nilai_rapor">Isi</a></li>
              <li class="<?=$link=='riwayat_rapor'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>profil_siswa/riwayat">Riwayat</a></li>
            </ul>
          </li>
          <!-- <li class="<?php if($link == 'nilai_utbk'){?>active<?php }?>"><a class="nav-link" href="<?=base_url()?>profil_siswa/nilai_utbk"><i class="fas fa-book-open"></i> <span>Nilai UTBK</span></a></li> -->
          <li class="nav-item dropdown <?=$link=='nilai_utbk' || $link == 'riwayat_utbk'? 'active':''?>">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-book-open"></i> <span>Nilai UTBK</span></a>
            <ul class="dropdown-menu">
              <li class="<?=$link=='nilai_utbk'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>profil_siswa/nilai_utbk">Isi</a></li>
              <li class="<?=$link=='riwayat_utbk'? 'active':''?>"><a class="nav-link" href="<?=base_url()?>profil_siswa/riwayat_utbk">Riwayat</a></li>
            </ul>
          </li>
          <li class="<?php if($link == 'minat_bakat'){?>active<?php }?>"><a class="nav-link" href="<?=base_url()?>minat_bakat/riwayat"><i class="fas fa-pencil-alt"></i> <span>Minat Bakat</span></a></li>
        <?php }?>
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
        <a href="<?=base_url()?>siswa/backupdb" class="btn btn-danger btn-lg btn-block btn-icon-split">
          <i class="fas fa-database"></i> Backup Database
        </a>
        <?php }?>
      </div>
  </aside>
</div>