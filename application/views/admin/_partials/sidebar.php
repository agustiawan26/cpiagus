<div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                    </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">Dashboards</li>
                            <li>
                                <a href=<?php echo site_url('admin') ?> class="<?php echo $this->uri->segment(2) == '' ? 'mm-active': '' ?>">
                                    <i class="metismenu-icon pe-7s-rocket "></i> Beranda
                                </a>
                            </li>

                            <li class="app-sidebar__heading">Data</li>
                            <li>
                                <a href="<?php echo site_url('admin/kriteria') ?>" class="<?php echo $this->uri->segment(2) == 'kriteria' ? 'mm-active': '' ?>">
                                    <i class="metismenu-icon pe-7s-keypad"></i> Kriteria
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/alternatif') ?>" class="<?php echo $this->uri->segment(2) == 'alternatif' ? 'mm-active': '' ?>">
                                    <i class="metismenu-icon pe-7s-map-marker"></i> Alternatif
                                </a>
                            </li>
                            
                            <!-- <li>
                                <a href="<?php echo site_url('admin/parameterkriteria') ?>" class="<?php echo $this->uri->segment(2) == 'parameterkriteria' ? 'mm-active': '' ?>">
                                    <i class="metismenu-icon pe-7s-display2"></i> Parameter Kriteria
                                </a>
                            </li> -->
                            

                            <li class="app-sidebar__heading">CPI</li>
                    
                            <li>
                                <a href="<?php echo site_url('admin/nilai') ?>" class="<?php echo $this->uri->segment(2) == 'nilai' ? 'mm-active': '' ?>">
                                    <i class="metismenu-icon pe-7s-display2"></i> Nilai Kriteria
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/hitung') ?>" class="<?php echo $this->uri->segment(2) == 'hitung' ? 'mm-active': '' ?>">
                                    <i class="metismenu-icon pe-7s-tools"></i> Perhitungan
                                </a>
                            </li>
                            <li>
                                <a href="dashboard-boxes.html">
                                    <i class="metismenu-icon pe-7s-star">
                                    </i> Hasil Peringkat
                                </a>
                            </li>

                            <li class="app-sidebar__heading">Data Pengguna</li>
                            <li>
                                <a href="<?php echo site_url('admin/user') ?>" class="<?php echo $this->uri->segment(2) == 'user' ? 'mm-active': '' ?>">
                                    <i class="metismenu-icon pe-7s-users"></i> Daftar Pengguna
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>