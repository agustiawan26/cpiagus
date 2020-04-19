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

<a href="<?php echo site_url('admin/kriteria/') ?>"><i class="fas fa-arrow-left"></i>
    Back</a>
</div>
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-graph text-success">
                                        </i>
                                    </div>
                                    <div>Tambah Kriteria
                                        <div class="page-title-subheading">Kriteria lokasi embung
                                        </div>
                                    </div>
                                </div>
                                  
                            </div>
                        </div>            
                        <div class="tab-content">
                            
                            <div class="tab-pane tabs-animation fade show active col-lg-8" id="tab-content-1" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <form action="<?php echo site_url('admin/kriteria/add') ?>" method="post" enctype="multipart/form-data">
                                            <div class="position-relative row form-group"><label for="kriteria" class="col-sm-2 col-form-label">Nama kriteria</label>
                                                <div class="col-sm-10"><input name="kriteria" id="kriteria" placeholder="Nama kriteria" type="text" class="form-control"></div>
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('kriteria') ?>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="bobot" class="col-sm-2 col-form-label">Bobot</label>
                                                <div class="col-sm-10"><input name="bobot" id="bobot" placeholder="Bobot" type="text" class="form-control"></div>
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('bobot') ?>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="tren" class="col-sm-2 col-form-label">Tren</label>
                                                
                                                    <div class="col-sm-10">
                                                        <select name="tren" id="tren" class="form-control">
                                                            <option>Positif</option>
                                                            <option>Negatif</option>
                                                        </select>
                                                    </div>
                                                
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('tren') ?>
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