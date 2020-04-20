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
                                    <div>Nilai
                                        <div class="page-title-subheading">Nilai kriteria tiap alternatif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div id="accordion" class="accordion-wrapper mb-3">
                                        <div class="card">
                                            <div id="headingOne" class="card-header">
                                                <button type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                                                    <h5 class="m-0 p-0">Keterangan Kriteria</h5>
                                                </button>
                                            </div>
                                            <div data-parent="#accordion" id="collapseOne1" aria-labelledby="headingOne" class="collapse show">
                                                <div class="card-body">
                                                <?php $i = 1;
                                                    foreach ($kriteria as $kriteria) : ?>
                                                    <td>Kriteria <?php echo $i; ?>   =>   <?php echo $kriteria->kriteria; ?><br></td>
                                                    <?php $i++;
                                                    endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
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
                                            <th>Nama Alternatif</th>
                                            <?php
                                            if ($count > 0) :
                                                for ($a = 1; $a <= $count; $a++) {
                                                    echo "<th>Kriteria $a</th>";
                                                }
                                            endif;
                                            ?>
                                            <th>Aksi</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                            
                                            <?php $i = 1;
                                                foreach ($alternatif as $item) : ?>
                                                    <tr>
                                                        
                                                        <td><?php echo $item->alternatif; ?></td> 
                                                        <?php foreach ($nilai[$item->alternatif_id] as $k => $v) : ?> 
                                                            <td><?= $v; ?></td>
                                                        <?php endforeach; ?>
                                                        <td><a class="mb-2 mr-2 btn btn-info" href="<?php echo site_url('admin/nilai/updateNilai/'.$item->alternatif_id) ?>"><i class="fas fa-edit"></i> Edit</a>
                                                        </td>
                                                    </tr>
                                                    <?php $i++;
                                                endforeach; ?>

                                            
                                            
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
