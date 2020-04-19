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
                                                <?php
                                                    $no=0;
                                                    foreach ($user as $user): 
                                                    $no++;
                                                ?>
                                                    
                                                <tr>
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
                                                    </td>
                                                    
                                                    <td width="300">
                                                        <a href="<?php echo site_url('admin/user/edit/'.$user->user_id) ?>"
                                                        class="mb-2 mr-2 btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                                                        <!-- <a id="detail" class="mb-2 mr-2 btn btn-success" 
                                                            data-toggle="modal" data-target="#detail-modal"
                                                            data-username="<?=$user->username ?>"
                                                            data-email="<?=$user->email ?>"
                                                            data-fullname="<?=$user->full_name ?>"
                                                            data-phone="<?=$user->phone ?>"
                                                            data-role="<?=$user->role ?>"
                                                        ><i class="fas fa-info"></i> Detail</a> -->
                                                        <!-- <a href="<?php echo site_url('admin/user/detail/'.$user->user_id) ?>"
                                                        class="mb-2 mr-2 btn btn-success"><i class="fas fa-info"></i> Detail</a> -->
                                                        <a href="<?php echo site_url('admin/user/delete/'.$user->user_id) ?>" 
                                                        class="mb-2 mr-2 btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                                        <!-- <a onclick="deleteConfirm('<?php echo site_url('admin/user/delete/'.$user->user_id) ?>')"
											            href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a> -->
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
    

    <script>
    function deleteConfirm(url){
        $('#deleteModal').modal();
        $('#btn-delete').attr('href', url);
        
    }
    </script>
</body>

</html>

<!-- Modal untuk konfirm penambahan kriteria menggunakan parameter atau tidak -->
<div id="detail-modal" class="modal fade" role="dialog">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail User "<?php echo $user->username ?>" </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th>Nama Lengkap</th>
                            
                            <td><span id="full_name"></span></td>
                        </tr>
                        <tr>
                            <th>Nomor Telepon</th>
                            <td><?php echo $user->phone ?></td> 
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $user->email ?></td> 
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td><?php echo $user->role ?></td> 
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
	$(document).on(‘click’, ‘#detail, function() {
		var username = $(this).user(‘username’);
        var fullname = $(this).user(fullname);
		var phone = $(this).user(‘phone’);
		var role = $(this).user(‘role’);
		var email = $(this).user(‘email’);
        $(‘#full_name).text(fulname);
		$(‘#username’).text(username);
		$(‘#phone’).text(phone);
		$(‘#role’).text(role);
		$(‘#email’).text(email);
	})
})
</script>