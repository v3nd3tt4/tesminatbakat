<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Minat Bakat</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">MB</a>
    </div>
    <ul class="sidebar-menu">
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
        <li class="menu-header">Starter</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
            <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
            <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
          </ul>
        </li>
        <li class="active"><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
      </ul>

      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="<?=base_url()?>login" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-sign-in-alt"></i> Login
        </a>
      </div>
  </aside>
</div>