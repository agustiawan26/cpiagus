<div class="app-header header-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <!-- ganti logo disini -->
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
    <div class="app-header__content">
        <!-- <div class="app-header-left">
            <div class="search-wrapper">
                <div class="input-holder">
                    <input type="text" class="search-input" placeholder="Type to search">
                    <button class="search-icon"><span></span></button>
                </div>
                <button class="close"></button>
            </div>
            <ul class="header-menu nav">
                <li class="nav-item">
                    <a href="javascript:void(0);" class="nav-link">
                        <i class="nav-link-icon fa fa-database"> </i> Statistics
                    </a>
                </li>
                <li class="btn-group nav-item">
                    <a href="javascript:void(0);" class="nav-link">
                        <i class="nav-link-icon fa fa-edit"></i> Projects
                    </a>
                </li>
                <li class="dropdown nav-item">
                    <a href="javascript:void(0);" class="nav-link">
                        <i class="nav-link-icon fa fa-cog"></i> Settings
                    </a>
                </li>
            </ul>
        </div> -->
        <div class="app-header-right">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                    <img width="42" class="rounded-circle" src="<?php echo base_url('upload/user/'.$this->session->userdata('photo')); ?>" />
                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                    <a type="button" tabindex="0" class="dropdown-item" href="<?php echo site_url('profile');?>"><i class="pe-7s-user mr-3"></i>  Profil Saya</a>
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <!-- <a type="button" tabindex="0" class="dropdown-item" href="<?php echo site_url('login/logout');?>">Logout</a> -->
                                    <a type="button" tabindex="0" class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="pe-7s-back mr-3"></i>Logout</a>
                                    <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-800"></i>
                                        Keluar
                                    </a> -->
                                    <!-- <a href="<?php echo site_url('login/logout');?>">Sign Out</a> -->

                                </div>
                                
                            </div>
                        </div>
                        <div class="widget-content-left  ml-3 header-user-info">
                            <div class="widget-heading">
                                <?php echo $this->session->userdata("full_name"); ?>
                            </div>
                            <div class="widget-subheading">Role : 

                            <?php echo $this->session->userdata("role"); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>