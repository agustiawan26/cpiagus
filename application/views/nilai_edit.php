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
            <div class="card-header">

                <a href="<?php echo site_url('nilai/') ?>"><i class="fas fa-arrow-left"></i>
                    Back</a>
                </div>
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-graph text-success">
                                        </i>
                                    </div>
                                    <div>Edit Nilai Alternatif <h4><?= $selectalt->alternatif ?>
                                        <!-- <div class="page-title-subheading">Kriteria lokasi embung
                                        </div> -->
                                    </div>
                                </div>
                                  
                            </div>
                        </div>            
                        <div class="tab-content">
                            
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                    <form method="post">
                                        <!-- <?php
                                        foreach ($form as $row) : ?>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label"><?= $row->nama_kriteria ?></label>
                                                <div class="col-sm-60">
                                                    <input type="text" class="form-control form-control-round" placeholder="Masukan Nama Kriteria" name="ID-<?= $row->ID ?>" value="<?= $row->nilai ?>">
                                                </div>
                                            </div>
                                        <?php endforeach ?> -->

                                        <div class="form-group row">
                                                <?php
                                            foreach ($form as $row) : ?>
                                                    <label class="col-sm-2 col-form-label"><?= $row->kriteria ?></label>
                                                    <div class="col-sm-2">
                                                        <!-- <input type="text" class="form-control form-control-round" placeholder="Masukan Nilai" name="<?= $row->nilai_kriteria_id ?>" value=""> -->
                                                        <!-- <input name="<?= $row->nilai_kriteria_id ?>" id="<?= $row->nilai_kriteria_id ?>" placeholder="masukkan nilai" type="text" class="form-control" value="<?php echo $nilai_tbl->nilai ?>" > -->
                                                        <?php  foreach($nilai_tbl as $item): if($item->nilai_kriteria_id != $row->nilai_kriteria_id){continue;} ?>
										<input name="<?= $row->nilai_kriteria_id ?>" id="<?= $row->nilai_kriteria_id ?>" placeholder="masukkan nilai" class="form-control" type="text" value="<?php echo $item->nilai; ?>"></option>
										<?php endforeach;?>
                                                    </div>
                                                    <?php endforeach ?>
                                                </div>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary btn-round" name="updatenilai" value="updatenilai">Simpan
                                                Data</button>
                                            
                                        </div>
                                    </form>
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
    <?php $this->load->view("_partials/scrolltop.php") ?>
    <?php $this->load->view("_partials/modal.php") ?>
    <?php $this->load->view("_partials/js.php") ?>

</body>

</html>