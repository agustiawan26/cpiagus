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
                                    <div>Daftar Alternatif
                                        <div class="page-title-subheading">Alternatif lokasi embung
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <div class="d-inline-block dropdown">
                                    <!-- <a href="<?php echo site_url('admin/alternatif/add/')?>"
                                                        class="mb-2 mr-2 btn btn-info"><i class="fa fa-plus"></i>  Tambah Alternatif</a> -->
                                    <button type="button" class="mb-2 mr-2 btn btn-info" data-toggle="modal" data-target="#addNewModal"><i class="fa fa-plus"></i> New alternatif</button>

                                        
                                    </div>
                                </div>    
                            </div>
                        </div>            
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <table class="mb-0 table table-hover">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Lokasi</th>
                                                <th>Kecamatan</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                    $count=0;
                                                    foreach ($alternatif->result() as $row) :
                                                        $count++;
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $count;?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row->alternatif;?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row->kecamatan;?>
                                                        </td>

                                                        <!-- <td><?php echo $row->item_alternatif.' Items';?></td> -->
                                                        <td>
                                                            <a href="#" class="mb-2 mr-2 btn btn-info btn-sm update-record" data-alternatif_id="<?php echo $row->alternatif_id;?>" data-alternatif="<?php echo $row->alternatif;?>" data-kecamatan="<?php echo $row->kecamatan;?>"><i class="fas fa-edit"></i> Edit</a>
                                                            <a href="#" class="mb-2 mr-2 btn btn-danger btn-sm delete-record" data-alternatif_id="<?php echo $row->alternatif_id;?>"><i class="fas fa-trash"></i> Delete</a>
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
    

    <script>
    function deleteConfirm(url){
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
    </script>
</body>

</html>


<!-- Modal Add New alternatif-->
<form action="<?php echo site_url('admin/alternatif/create');?>" method="post">
        <div class="modal fade" id="addNewModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New alternatif</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">alternatif</label>
                            <div class="col-sm-10">
                                <input type="text" name="alternatif" class="form-control" placeholder="alternatif" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">kecamatan</label>
                            <div class="col-sm-10">
                                <input type="text" name="kecamatan" class="form-control" placeholder="kecamatan" required>
                            </div>
                        </div>
                        
                        <div class="form-group row" type="hidden">
                            <label class="col-sm-2 col-form-label">Kriteria</label>
                            <div class="col-sm-10">
                            <select class="form-control" name="kriteria[]" data-width="100%" data-live-search="true" default="select-all" multiple required>
                                    <?php foreach ($kriteria->result() as $row) :?>
                                        <option selected="selected" value="<?php echo $row->kriteria_id;?>">
                                            <?php echo $row->kriteria;?>
                                        </option>
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

<!-- Modal Update alternatif-->
<form action="<?php echo site_url('admin/alternatif/update');?>" method="post">
        <div class="modal fade" id="UpdateModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update alternatif</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alternatif</label>
                            <div class="col-sm-10">
                                <input type="text" name="alternatif_edit" class="form-control" placeholder="Nama Alternatif" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kecamatan</label>
                            <div class="col-sm-10">
                                <input type="text" name="kecamatan_edit" class="form-control" placeholder="Nama Kecamatan" required>
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <?php foreach ($form as $row) : ?>
                                <label class="col-sm-2 col-form-label"><?= $row->kriteria ?></label>
                                <div class="col-sm-2">
                                        <!-- <input type="text" class="form-control form-control-round" placeholder="Masukan Nilai" name="<?= $row->nilai_kriteria_id ?>" value=""> -->
                                        <!-- <input name="<?= $row->nilai_kriteria_id ?>" id="<?= $row->nilai_kriteria_id ?>" placeholder="masukkan nilai" type="text" class="form-control" value="<?php echo $nilai_tbl->nilai ?>" > -->
                                    <?php  foreach($nilai_tbl as $item): if($item->nilai_kriteria_id != $row->nilai_kriteria_id){continue;} ?>
                                        <input name="<?= $row->nilai_kriteria_id ?>" id="<?= $row->nilai_kriteria_id ?>" placeholder="masukkan nilai" class="form-control" type="text" value="<?php echo $item->nilai; ?>"></option>
                                <?php endforeach;?>
                                </div>
                            <?php endforeach ?>
                        </div> -->

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kriteria</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="kriteria_edit[]" data-width="100%" data-live-search="true" multiple required readonly="readonly">
                                    <?php foreach ($kriteria->result() as $row) :?>
                                        <option selected="selected" value="<?php echo $row->kriteria_id;?>">
                                            <?php echo $row->kriteria;?>
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

    <!-- Modal Delete alternatif-->
    <form action="<?php echo site_url('admin/alternatif/delete');?>" method="post">
        <div class="modal fade" id="DeleteModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Alternatif</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <p>Data yang dihapus tidak akan bisa dikembalikan.</p>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="delete_id" required>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success btn-sm">Hapus</button>
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
        $(document).ready(function() {
            $('.bootstrap-select').selectpicker();

            //GET UPDATE
            $('.update-record').on('click', function() {
                var alternatif_id = $(this).data('alternatif_id');
                var alternatif = $(this).data('alternatif');
                var kecamatan = $(this).data('kecamatan')
                $(".strings").val('');
                $('#UpdateModal').modal('show');
                $('[name="edit_id"]').val(alternatif_id);
                $('[name="alternatif_edit"]').val(alternatif);
                $('[name="kecamatan_edit"]').val(kecamatan);
                //AJAX REQUEST TO GET SELECTED alternatif
                $.ajax({
                    url: "<?php echo site_url('alternatif/get_kriteria_by_alternatif');?>",
                    method: "POST",
                    data: {
                        alternatif_id: alternatif_id
                    },
                    cache: false,
                    success: function(data) {
                        var item = data;
                        var val1 = item.replace("[", "");
                        var val2 = val1.replace("]", "");
                        var values = val2;
                        $.each(values.split(","), function(i, e) {
                            $(".strings option[value='" + e + "']").prop("selected", true).trigger('change');
                            $(".strings").selectpicker('refresh');

                        });
                    }

                });
                return false;
            });

            //GET CONFIRM DELETE
            $('.delete-record').on('click', function() {
                var alternatif_id = $(this).data('alternatif_id');
                $('#DeleteModal').modal('show');
                $('[name="delete_id"]').val(alternatif_id);
            });

        });
    </script>
