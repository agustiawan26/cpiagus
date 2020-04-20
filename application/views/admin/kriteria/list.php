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
                                                    $count=0;
                                                    foreach ($kriteria->result() as $row) :
                                                        $count++;
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $count;?>
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
                                                            <a href="#" class="mb-2 mr-2 btn btn-info btn-sm update-record" data-kriteria_id="<?php echo $row->kriteria_id;?>" data-kriteria="<?php echo $row->kriteria;?>" data-bobot="<?php echo $row->bobot;?>" data-tren="<?php echo $row->tren;?>"><i class="fas fa-edit"></i> Edit</a>
                                                            <a href="#" class="mb-2 mr-2 btn btn-danger btn-sm delete-record" data-kriteria_id="<?php echo $row->kriteria_id;?>"><i class="fas fa-trash"></i> Delete</a>
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
                                <a data-toggle="modal" data-target="#addNewModal" class="btn-wide btn btn-success">Lanjutkan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Add New kriteria-->
<form action="<?php echo site_url('admin/kriteria/create');?>" method="post">
        <div class="modal fade" id="addNewModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
 
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">kriteria</label>
                    <div class="col-sm-10">
                      <input type="text" name="kriteria" class="form-control" placeholder="kriteria Name" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">bobot</label>
                    <div class="col-sm-10">
                      <input type="text" name="bobot" class="form-control" placeholder="bobot" required>
                    </div>
                </div>

                <div class="position-relative row form-group"><label for="tren" class="col-sm-2 col-form-label">Tren</label>
                    <div class="col-sm-10">
                        <select name="tren" id="tren" class="form-control">
                            <option>positif</option>
                            <option>negatif</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">alternatif</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="alternatif[]" data-width="100%" data-live-search="true" readonly="readonly" multiple required>
                            <?php foreach ($alternatif->result() as $row) :?>
                                <option selected="selected" value="<?php echo $row->alternatif_id;?>"><?php echo $row->alternatif;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-sm">Save</button>
              </div>
            </div>
          </div>
        </div>
    </form>

 <!-- Modal Update kriteria-->
 <form action="<?php echo site_url('admin/kriteria/update');?>" method="post">
        <div class="modal fade" id="UpdateModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
 
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Kriteria</label>
                    <div class="col-sm-10">
                      <input type="text" name="kriteria_edit" class="form-control" placeholder="Nama Kriteria" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Bobot</label>
                    <div class="col-sm-10">
                      <input type="text" name="bobot_edit" class="form-control" placeholder="Bobot" required>
                    </div>
                </div>

                <div class="position-relative row form-group"><label for="tren_edit" class="col-sm-2 col-form-label">Tren</label>
                    <div class="col-sm-10">
                        <select name="tren_edit" id="tren_edit" class="form-control">
                            <option>positif</option>
                            <option>negatif</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">alternatif</label>
                    <div class="col-sm-10">
                        

                        <select class="form-control" name="alternatif_edit[]" data-width="100%" data-live-search="true" multiple required readonly="readonly">
                            <?php foreach ($alternatif->result() as $row) :?>
                                <option selected="selected" value="<?php echo $row->alternatif_id;?>">
                                    <?php echo $row->alternatif;?>
                                </option>
                                <?php endforeach;?>
                        </select>
                    </div>
                </div>
 
              </div>
              <div class="modal-footer">
                <input type="hidden" name="edit_id" required>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-sm">Update</button>
              </div>
            </div>
          </div>
        </div>
    </form>
 
 
    <!-- Modal Delete kriteria-->
    <form action="<?php echo site_url('admin/kriteria/delete');?>" method="post">
        <div class="modal fade" id="DeleteModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
 
                <h4>Are you sure to delete this kriteria?</h4>
 
              </div>
              <div class="modal-footer">
                <input type="hidden" name="delete_id" required>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-success btn-sm">Yes</button>
              </div>
            </div>
          </div>
        </div>
    </form>
 
    <!--Load JavaScript File-->
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.4.1.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.bundle.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-select.js');?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.bootstrap-select').selectpicker();
 
            //GET UPDATE
            $('.update-record').on('click',function(){
                var kriteria_id = $(this).data('kriteria_id');
                var kriteria = $(this).data('kriteria');
                var bobot = $(this).data('bobot');
                var tren = $(this).data('tren')
                $(".strings").val('');
                $('#UpdateModal').modal('show');
                $('[name="edit_id"]').val(kriteria_id);
                $('[name="kriteria_edit"]').val(kriteria);
                $('[name="bobot_edit"]').val(bobot);
                $('[name="tren_edit"]').val(tren);
                //AJAX REQUEST TO GET SELECTED alternatif
                $.ajax({
                    url: "<?php echo site_url('kriteria/get_alternatif_by_kriteria');?>",
                    method: "POST",
                    data : {
                        kriteria_id : kriteria_id
                    },
                    cache:false,
                    success : function(data){
                        var item=data;
                        var val1=item.replace("[","");
                        var val2=val1.replace("]","");
                        var values=val2;
                        $.each(values.split(","), function(i,e){
                            $(".strings option[value='" + e + "']").prop("selected", true).trigger('change');
                            $(".strings").selectpicker('refresh');
 
                        });
                    }
                     
                });
                return false;
            });
 
            //GET CONFIRM DELETE
            $('.delete-record').on('click',function(){
                var kriteria_id = $(this).data('kriteria_id');
                $('#DeleteModal').modal('show');
                $('[name="delete_id"]').val(kriteria_id);
            });
 
        });
    </script>
