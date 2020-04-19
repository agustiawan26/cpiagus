<!doctype html>
<html lang="en">

<head>
    <!-- HEAD HERE -->
    <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <!-- NAVBAR HERE -->
    <?php $this->load->view("admin/_partials/navbar.php") ?>

        <div class="app-main">
            <!-- SIDEBAR HERE -->
            <?php $this->load->view("admin/_partials/sidebar.php") ?>
            <div class="app-main__outer">
            <?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>
            <div class="app-main__inner">
            <div class="card-header">

<a href="<?php echo site_url('admin/user/') ?>"><i class="fas fa-arrow-left"></i>
    Back</a>
</div>
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-graph text-success">
                                        </i>
                                    </div>
                                    <div>Ubah Data Pengguna
                                        <div class="page-title-subheading">Pengguna Sistem Pendukung Keputusan
                                        </div>
                                    </div>
                                </div>
                                  
                            </div>
                        </div>            
                        <div class="tab-content">
                            
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $user->user_id?>" />
                                            <div class="position-relative row form-group"><label for="username" class="col-sm-2 col-form-label">Username</label>
                                                <div class="col-sm-10"><input name="username" id="username" placeholder="Username" type="text" class="form-control" value="<?php echo $user->username ?>" ></div>
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('username') ?>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="email" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10"><input name="email" id="email" placeholder="Email" type="text" class="form-control" value="<?php echo $user->email ?>" ></div>
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('email') ?>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="password" class="col-sm-2 col-form-label">Password</label>
                                                <!-- <div class="col-sm-10"><input name="password" id="password" placeholder="Password" type="password" class="form-control" value="<?php echo $user->password ?>" ></div> -->
                                                <div class="col-sm-10"><input name="password" id="password" placeholder="Password" type="password" class="form-control"></div>
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('password') ?>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="full_name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                                <div class="col-sm-10"><input name="full_name" id="full_name" placeholder="Nama Lengkap" type="text" class="form-control" value="<?php echo $user->full_name ?>" ></div>
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('full_name') ?>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="phone" class="col-sm-2 col-form-label">Nomor Telepon</label>
                                                <div class="col-sm-10"><input name="phone" id="phone" placeholder="Nomor Telepon" type="text" class="form-control" value="<?php echo $user->phone ?>" ></div>
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('phone') ?>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="role" class="col-sm-2 col-form-label">Role</label>
                                                <div class="col-sm-10"><input name="role" id="role" placeholder="Role" type="text" class="form-control" value="<?php echo $user->role ?>" ></div>
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('role') ?>
                                                </div>
                                            </div>
                                            <!-- <div class="position-relative row form-group"><label for="photo" class="col-sm-2 col-form-label">Foto Profil</label>
                                                <div class="col-sm-10"><input name="old_photo" id="photo" placeholder="Foto Profil" type="file" class="form-control-file" value="<?php echo $user->photo ?>" ></div>
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('photo') ?>
                                                </div>
                                            </div> -->
                                            <div class="form-group">
                                                <label for="photo">Photo</label>
                                                <input class="form-control-file <?php echo form_error('photo') ? 'is-invalid':'' ?>"
                                                type="file" name="photo" />
                                                <input type="hidden" name="old_photo" value="<?php echo $user->photo ?>" />
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('photo') ?>
                                                </div>
                                            </div>

                                            
                                                                                 
                    
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button type="submit" name="btn" value="Save" class="btn btn-secondary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- FOOTER HERE -->
                <?php $this->load->view("admin/_partials/footer.php") ?>
            </div>
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
    <!-- ETC HERE -->
    <?php $this->load->view("admin/_partials/scrolltop.php") ?>
    <?php $this->load->view("admin/_partials/modal.php") ?>
    <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>