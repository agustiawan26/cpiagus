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
                                    <i class="pe-7s-keypad icon-gradient bg-happy-itmeo">
                                    </i>
                                </div>
                                <div>Daftar Kriteria
                                    <div class="page-title-subheading">Kriteria lokasi embung
                                    </div>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                <a class="mb-2 mr-2 btn btn-light" href="<?= base_url('kriteria/print'); ?>">
                                        <i class="fa fa-print"></i> Print Data
                                    </a>
                                <div class="d-inline-block dropdown">
                                    <button type="button" class="mb-2 mr-2 btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Kriteria</button>     
                                </div>
                            </div>    
                        </div>
                    </div>
                    <?= $this->session->flashdata('message'); ?>              
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Kriteria Tanpa Parameter</h5>
                                    <table class="mb-0 table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Kriteria ID</th>
                                            <th>Nama Kriteria</th>
                                            <th>Bobot</th>
                                            <th>Tren</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $count=0;
                                                foreach ($kriteria as $row) :
                                                    $count++;
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?php echo "K".$row->kriteria_id?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row->kriteria;?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row->bobot;?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row->tren;?>
                                                    </td>

                                                    <td>
                                                        <a class="mb-2 mr-2 btn btn-info btn-sm" href="<?php echo base_url('kriteria/updateKriteria/' . $row->kriteria_id); ?>"><i class="fas fa-edit"></i> Edit</a>
                                                        <!-- <a href="#" class="mb-2 mr-2 btn btn-info btn-sm update-record" data-kriteria_id="<?php echo $row->kriteria_id;?>" data-kriteria="<?php echo $row->kriteria;?>" data-bobot="<?php echo $row->bobot;?>" data-tren="<?php echo $row->tren;?>"><i class="fas fa-edit"></i> Edit</a> -->
                                                        <!-- <a href="#" class="mb-2 mr-2 btn btn-danger btn-sm delete-record" data-kriteria_id="<?php echo $row->kriteria_id;?>"><i class="fas fa-trash"></i> Delete</a> -->
                                                        <a onclick="deleteConfirm('<?php echo site_url('kriteria/delete/'.$row->kriteria_id) ?>')"
                                                                href="#!" class="mb-2 mr-2 btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                                                    </td>
                                                </tr>
                                                <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Kriteria Dengan Parameter</h5>
                                    <table class="mb-0 table table-hover">
                                        <thead>
                                        <tr>
                                            <th>ID Kriteria</th>
                                            <th>Nama Kriteria</th>
                                            <th>Bobot</th>
                                            <th>Tren</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                            <?php
                                                $count=0;
                                                foreach ($kriteriawp as $row) :
                                                    $count++;
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?php echo "K".$row->kriteria_id;?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row->kriteria;?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row->bobot;?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row->tren;?>
                                                    </td>

                                                    <td>
                                                        <a class="mb-2 mr-2 btn btn-info btn-sm" href="<?php echo base_url('kriteria/updateKriteriaWP/' . $row->kriteria_id); ?>"><i class="fas fa-edit"></i> Edit</a>
                                                        <a onclick="deleteConfirm('<?php echo site_url('kriteria/delete/'.$row->kriteria_id) ?>')"
                                                                href="#!" class="mb-2 mr-2 btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                                                    </td>
                                                </tr>
                                                <?php endforeach;?>
                                        </tbody>
                                    </table>
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

    <script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
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
                                <a data-toggle="tab" href="#tabYes" class="mr-1 ml-1 border-0 btn-transition btn btn-outline-primary">Ya</a>
                                <a data-toggle="tab" href="#tabNo" class="mr-1 ml-1 border-0 btn-transition  btn btn-outline-success">Tidak</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane" id="tabYes" role="tabpanel">
                                <div class="position-relative row form-group"><label for="jumlahpara" class="col-sm-6 col-form-label">Jumlah Parameter</label>
                                    <div class="col-sm-6">
                                        <select name="jumlahpara" id="role" class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary " name="addkriteriapara" value="addkriteriapara">Lanjutkan</button>
                            </div>
                            <div class="tab-pane" id="tabNo" role="tabpanel">
                                <p>Silakan klik tombol "Lanjutkan"</p>
                                <button type="submit" class="btn btn-success " name="addkriteria" value="addkriteria">Lanjutkan</button>
                                <!-- <a data-toggle="modal" data-target="#addNewModal" class="btn btn-success">Lanjutkan</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

    <!--Load JavaScript File-->
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.4.1.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.bundle.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-select.js');?>"></script>
    
    
