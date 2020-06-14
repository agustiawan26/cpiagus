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
            <?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>
            <div class="app-main__inner">
            <!-- <div class="card-header">

                <a href="<?php echo site_url('kriteria/') ?>"><i class="fas fa-arrow-left"></i>
                    Back</a>
                </div> -->
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                    <i class="pe-7s-keypad icon-gradient bg-happy-itmeo">
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
                            
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                                <div class="col-lg-6">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <form method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="kriteria_id" value="<?php echo $gen->max_id ?>">

                                                <!-- <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Kode Kriteria</label>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-round" readonly="readonly" name="kriteria_id" value="<?php echo $gen->max_id; ?>">
                                                    </div>
                                                </div> -->
                                                
                                                <div class="position-relative row form-group"><label for="kriteria" class="col-sm-4 col-form-label">Nama kriteria</label>
                                                    <div class="col-sm-8"><input name="kriteria" id="kriteria" placeholder="Nama kriteria" type="text" class="form-control" required></div>
                                                </div>

                                                <div class="position-relative row form-group"><label for="bobot" class="col-sm-4 col-form-label">Bobot</label>
                                                    <div class="col-sm-8"><input type="number" step="0.000000000000001" min="0" name="bobot" id="bobot" placeholder="Bobot" type="text" class="form-control" required></div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Tren</label>
                                                    <div class="col-sm-8">
                                                        <select name="tren" id="tren" class="form-control">
                                                            <option>positif</option>
                                                            <option>negatif</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-form-label">Parameter</label>
                                                </div>

                                                <?php for ($i = 0; $i < $jumlahpara; $i++) { ?>
                                                    <div class="position-relative row form-group"><label for="kriteria" class="col-sm-4 col-form-label">Parameter <?php echo ($i + 1); ?></label>
                                                        <div class="col-sm-8"><input name="par<?php echo $i; ?>" id="kriteria" placeholder="Prioritas <?php echo ($i + 1); ?>" type="text" class="form-control" required></div>
                                                    </div>
                                                <?php } ?>

                                               
                                                <div class="d-block text-center card-footer">
                                                    <a href="<?php echo site_url('kriteria/') ?>" class="btn-wide btn-transition btn btn-outline-secondary" >Kembali</a>
                                                    <button type="submit" class="btn-wide btn btn-success" name="tambahkriteria" value="tambahkriteria">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- FOOTER HERE -->
                <?php $this->load->view("_partials/footer.php") ?>
            </div>
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
    <!-- ETC HERE -->
    <?php $this->load->view("_partials/modal.php") ?>
    <?php $this->load->view("_partials/js.php") ?>

</body>

</html>