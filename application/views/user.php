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
                                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                                        </i>
                                    </div>
                                    <div>Daftar Pengguna
                                        <div class="page-title-subheading">Pengguna Sistem Pendukung Keputusan
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <div class="d-inline-block dropdown">
                                    <a href="<?php echo site_url('admin/user/add/')?>"
                                                        class="mb-2 mr-2 btn btn-info"><i class="fa fa-plus"></i>  Tambah Pengguna</a>
                                        
                                    </div>
                                </div>    
                            </div>
                        </div>            
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <table class="mb-0 table table-hover">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Foto</th>
                                                <th>Nama Pengguna</th>
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th>Role</th>
                                                <th>No Telepon</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                                
                                                    
                                                <!-- <tr>
                                                    <td width="50"><?php echo $no ?></td>
                                                    <td width="50">
                                                        <img src="<?php echo base_url('upload/user/'.$user->photo) ?>" width="64" />
                                                    </td>
                                                    <td width="150">
                                                        <?php echo $user->full_name ?>
                                                    </td>
                                                    <td width="150">
                                                        <?php echo $user->email ?>
                                                    </td>
                                                    <td width="100">
                                                        <?php echo $user->username ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $user->role ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $user->phone ?>
                                                    </td> -->


                                                    <?php
                                                    $count=0;
                                                    foreach ($user->result() as $row) :
                                                        $count++;
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $count;?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row->photo;?>
                                                                <!-- <img src="<?php echo base_url('upload/user/'.$user->photo) ?>" width="64" /> -->
                                                            </td>
                                                            <td>
                                                                <?php echo $row->full_name;?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row->email;?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row->username;?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row->role;?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row->phone;?>
                                                            </td>
                                                            <td width="300">
                                                                <a href="#" class="mb-2 mr-2 btn btn-info btn-sm update-record" data-user_id="<?php echo $row->user_id;?>" 
                                                                data-photo="<?php echo $row->photo;?>" 
                                                                data-full_name="<?php echo $row->full_name;?>"
                                                                data-email="<?php echo $row->email;?>"
                                                                data-username="<?php echo $row->username;?>"
                                                                data-role="<?php echo $row->role;?>"
                                                                data-phone="<?php echo $row->phone;?>"
                                                                >
                                                                <i class="fas fa-edit"></i> Edit</a>
                                                                <a href="#" class="mb-2 mr-2 btn btn-danger btn-sm delete-record" data-user_id="<?php echo $row->user_id;?>"><i class="fas fa-trash"></i> Delete</a>
                                                            </td>
                                                        </tr>
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
                <?php $this->load->view("_partials/footer.php") ?>
            </div>
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
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

<!-- Modal Update User-->
<form action="<?php echo site_url('user/update');?>" method="post">
    <div class="modal fade" id="UpdateModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" name="full_name_edit" class="form-control" placeholder="Nama Lengkap" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email_edit" class="form-control" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password_edit" class="form-control" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <input type="text" name="role_edit" class="form-control" placeholder="Role" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">No Telepom</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone_edit" class="form-control" placeholder="phone" required>
                        </div>
                    </div>

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

<!-- Modal Delete user-->
<form action="<?php echo site_url('user/delete');?>" method="post">
    <div class="modal fade" id="DeleteModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
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

            // GET UPDATE
            $('.update-record').on('click', function() {
                var user_id = $(this).data('user_id');
                var full_name = $(this).data('full_name');
                var email = $(this).data('email');
                var password = $(this).data('password');
                var username = $(this).data('username');
                var role = $(this).data('role');
                var phone = $(this).data('phone');

                
                $(".strings").val('');
                $('#UpdateModal').modal('show');
                $('[name="edit_id"]').val(user_id);
                $('[name="full_name_edit"]').val(full_name);
                $('[name="email_edit"]').val(email);
                $('[name="password_edit"]').val(password);
                $('[name="username_edit"]').val(username);
                $('[name="role_edit"]').val(role);
                $('[name="phone_edit"]').val(phone);
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
            // });

            //GET CONFIRM DELETE
            $('.delete-record').on('click', function() {
                var user_id = $(this).data('user_id');
                $('#DeleteModal').modal('show');
                $('[name="delete_id"]').val(user_id);
            });

        });
    </script>