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
            
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                                        </i>
                                    </div>
                                    <div>Daftar Kriteria
                                        <div class="page-title-subheading">Kriteria lokasi embung
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <div class="d-inline-block dropdown">
                                    <a data-toggle="modal" data-target="#myModal" class="mb-2 mr-2 btn btn-info">
                                        <i class="fa fa-plus"></i>  Tambah Kriteria</a>
                                        
                                    </div>
                                </div>    
                            </div>
                        </div>            
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <table class="mb-0 table table-hover">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Kriteria</th>
                                                <th>Bobot</th>
                                                <th>Tren</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                                <?php
                                                    $no=0;
                                                    foreach ($kriteria as $kriteria): 
                                                    $no++;
                                                ?>
                                                    
                                                <tr>
                                                    <td width="50"><?php echo $no ?></td>
                                                    <td width="300">
                                                        <?php echo $kriteria->kriteria ?>
                                                    </td>
                                                    <td width="150">
                                                        <?php echo $kriteria->bobot ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $kriteria->tren ?>
                                                    </td>
                                                    <td width="200">
                                                        <a href="<?php echo site_url('admin/kriteria/edit/'.$kriteria->kriteria_id) ?>"
                                                        class="mb-2 mr-2 btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                                                        <a href="<?php echo site_url('admin/kriteria/delete/'.$kriteria->kriteria_id) ?>" 
                                                        class="mb-2 mr-2 btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
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


<!-- Modal untuk konfirm penambahan kriteria menggunakan parameter atau tidak -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Kriteria</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="card-header"><i class="header-icon lnr-gift icon-gradient bg-grow-early"> </i>Kriteria memiliki parameter?
                        <div class="btn-actions-pane-right">
                            <div class="nav">
                                <a data-toggle="tab" href="#tabYes" class="border-0 btn-transition btn btn-outline-primary">Ya</a>
                                <a data-toggle="tab" href="#tabNo" class="mr-1 ml-1 border-0 btn-transition  btn btn-outline-primary">Tidak</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane" id="tabYes" role="tabpanel">
                                <div class="position-relative row form-group"><label for="jumlah-para" class="col-sm-2 col-form-label">Jumlah Parameter</label>
                                    <!-- <div class="col-sm-10"><input name="role" id="role" placeholder="Role" type="text" class="form-control"></div> -->
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-round" name="jumlah-para" value="">
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('jumlah-para') ?>
                                    </div>
                                </div>
                                
                                <a href="<?php echo site_url('admin/kriteria/addpara/')?>" class="btn-wide btn btn-success" name="addkriteriapara" value="addkriteriapara" 
>Lanjutkan</a> 
                            </div>
                            <div class="tab-pane" id="tabNo" role="tabpanel">
                                <p>Silakan klik tombol "Lanjutkan"</p>
                                <a href="<?php echo site_url('admin/kriteria/add/')?>"  class="btn-wide btn btn-success">Lanjutkan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

