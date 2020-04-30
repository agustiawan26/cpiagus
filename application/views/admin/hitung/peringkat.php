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
                                    <div>Peringkat
                                        <div class="page-title-subheading">Prioritas lokasi pembangunan embung
                                        </div>
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
                                            <th width="100">Peringkat</th>
                                            <th>Nama Alternatif</th>
                                            <th>Nilai CPI</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                            <?php $rank = $rank;
                                                foreach ($rank as $key => $val) : ?>
                                                    <tr>
                                                        <td><?= $rank[$key] ?></td>
                                                        <td><?= $alt[$key] ?></td>
                                                        <td><?= round(($cpi->nilaicpi[$key]),4) ?></td>
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
