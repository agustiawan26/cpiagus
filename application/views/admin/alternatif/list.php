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
                                    <a href="<?php echo site_url('admin/alternatif/add/')?>"
                                                        class="mb-2 mr-2 btn btn-info"><i class="fa fa-plus"></i>  Tambah Alternatif</a>
                                        
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
                                                    $no=0;
                                                    foreach ($alternatif as $alternatif): 
                                                    $no++;
                                                ?>
                                                    
                                                <tr>
                                                    <td width="50"><?php echo $no ?></td>
                                                    <td width="150">
                                                        <?php echo $alternatif->alternatif ?>
                                                    </td>
                                                    <td width="150">
                                                        <?php echo $alternatif->kecamatan ?>
                                                    </td>
                                                    
                                                    <td width="250">
                                                        <a href="<?php echo site_url('admin/alternatif/edit/'.$alternatif->alternatif_id) ?>"
                                                        class="mb-2 mr-2 btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                                                        <a href="<?php echo site_url('admin/alternatif/delete/'.$alternatif->alternatif_id) ?>" 
                                                        class="mb-2 mr-2 btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                                        <!-- <a onclick="deleteConfirm('<?php echo site_url('admin/alternatif/delete/'.$alternatif->alternatif_id) ?>')"
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
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
    </script>
</body>

</html>
