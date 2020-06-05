<!doctype html>
<html lang="en">

<head>
    <!-- HEAD HERE -->
    <?php $this->load->view("_partials/head.php") ?>
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <!-- NAVBAR HERE -->
    <?php $this->load->view("_partials/navbar.php") ?>

        <div class="app-main">
            <!-- SIDEBAR HERE -->
            <?php $this->load->view("_partials/sidebar.php") ?>
            <div class="app-main__outer">
            
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-user icon-gradient bg-happy-itmeo">
                                        </i>
                                    </div>
                                    <div>Ubah Profil Saya
                                        <div class="page-title-subheading">Profil Pengguna Sistem Pendukung Keputusan
                                        </div>
                                    </div>
                                </div>
                                 
                            </div>
                        </div>            
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card-shadow-primary border mb-3 card card-body border-primary">
                                    
                                    <img width="200" class="rounded-circle" src="<?php echo base_url('upload/user/'.$this->session->userdata('photo')); ?>" />
                                    <br>
                                    
                                    <!-- <button class="mb-2 mr-2 btn btn-primary btn-lg btn-block">Ubah Profil
                                        </button>
                                    <button class="mb-2 mr-2 btn btn-primary btn-lg btn-block">Ubah Password
                                        </button> -->
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <form method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="user_id" value="<?php echo $this->session->userdata("user_id")?>">

                                            <div class="position-relative form-group">
                                                <label class="">Nama Lengkap</label>
                                                <input name="full_name" placeholder="Masukkan Nama Lengkap" type="text" class="form-control" value="<?php echo $this->session->userdata("full_name"); ?>" required>
                                            </div>
                                            <div class="position-relative form-group">
                                                <label class="">Username</label>
                                                <input name="username" placeholder="Masukkan Username" type="text" class="form-control" value="<?php echo $this->session->userdata("username"); ?>" required>
                                            </div>
                                            <div class="position-relative form-group">
                                                <label class="">Email</label>
                                                <input name="email" placeholder="Masukkan Email" type="email" class="form-control" value="<?php echo $this->session->userdata("email"); ?>" readonly="readonly">
                                            </div>
                                            <!-- <div class="position-relative form-group">
                                                <label class="">Password</label>
                                                <input name="password" placeholder="Masukkan Password" type="password" class="form-control">
                                                <small class="form-text text-muted">Kosongkan jika Anda tidak ingin mengubah password</small>
                                            </div> -->
                                            <div class="position-relative form-group">
                                                <label class="">No Telepon</label>
                                                <input name="phone" placeholder="Masukkan No Telepon" type="text" class="form-control" value="<?php echo $this->session->userdata("phone"); ?>" required>
                                            </div>
                                            <!-- <div class="position-relative form-group">
                                                <label class="">Role</label>
                                                <input name="role" placeholder="Masukkan Role" type="text" class="form-control" value="<?php echo $this->session->userdata("role"); ?>" readonly="readonly" required>
                                            </div> -->
                                            
                                            <div class="position-relative form-group">
                                                <label class="">Foto Profil</label>
                                                <input name="photo" type="file" class="form-control-file">
                                                
                                                <small class="form-text text-muted">Ukuran maks 1 MB</small>
                                                <small class="form-text text-muted">Format JPG/JPEG/PNG</small>
                                                <small class="form-text text-muted">Kosongkan jika Anda tidak ingin mengubah foto profil</small>
                                            </div>
                                            <input type="hidden" name="old_photo" value="<?php echo $this->session->userdata("photo"); ?>"/>

                                            <div class="d-block text-center card-footer">
                                                <button class="btn-wide btn-transition btn btn-outline-secondary" name="back" value="back">Kembali</button>
                                                <button type="submit" class="btn-wide btn btn-success" name="updateprofile" value="updateprofile">Simpan Data</button>
                                            </div>
                                            <!-- <button class="mt-1 btn btn-primary">Submit</button> -->
                                        </form>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                <!-- FOOTER HERE -->
                <?php $this->load->view("_partials/footer.php") ?>
            </div>
        </div>
    </div>
    <!-- ETC HERE -->
    <?php $this->load->view("_partials/scrolltop.php") ?>
    <?php $this->load->view("_partials/modal.php") ?>
    <?php $this->load->view("_partials/js.php") ?>
    
</body>

</html>

