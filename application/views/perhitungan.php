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
                                        <i class="pe-7s-tools icon-gradient bg-happy-itmeo">
                                        </i>
                                    </div>
                                    <div>Perhitungan
                                        <div class="page-title-subheading">Menggunakan metode Composite Performance Index (CPI)
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="accordion" class="accordion-wrapper mb-3">
                                        <div class="card">
                                            <div id="headingOne" class="card-header">
                                                <button type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                                                    <h5 class="m-0 p-0">#1 Identifikasi nilai minimum dan tren tiap kriteria</h5>
                                                </button>
                                            </div>
                                            <div data-parent="#accordion" id="collapseOne2" aria-labelledby="headingOne" class="collapse show">
                                                <div class="card-body">
                                                    <div id="exampleAccordion" data-children=".item">
                                                        <div class="item">
                                                            <button type="button" aria-expanded="true" aria-controls="exampleAccordion1" data-toggle="collapse" href="#ket1" class="m-0 p-0 btn btn-link"><h5>Keterangan</h5></button>
                                                            <div data-parent="#exampleAccordion" id="ket1" class="collapse">
                                                                <p class="mb-3">Identifikasi nilai minimum dari tiap kriteria. Data nilai minimum digunakan untuk transformasi nilai di tahap selanjutnya.</p>
                                                                <p class="mb-3">Identifikasi tren kriteria apakah tren negatif atau positif. Tren positif berarti semakin tinggi nilainya maka semakin baik, sedangkan tren negatif berati semakin rendah nilainya maka semakin baik.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="main-card mb-3 card">
                                                                <div class="card-body">
                                                                    <table class="mb-0 table table-hover">
                                                                        <!-- <thead>
                                                                        <tr>
                                                                        <th>Nama Alternatif</th>
                                                                        <?php
                                                                        if ($count > 0) :
                                                                            for ($a = 1; $a <= $count; $a++) {
                                                                                echo "<th>Kriteria $a</th>";
                                                                            }
                                                                        endif;
                                                                        ?>
                                                                        </tr>
                                                                        </thead> -->
                                                                        <thead>
                                                                        <tr>
                                                                        <th>Data</th>
                                                                        <?php foreach ($cpi->data as $key => $val) : ?>
                                                                            
                                                                            <th><?= $kriteriaa[$key]?></th>
                                                                           
                                                                        <?php endforeach; ?>

                                                                        
                                                                    
                                                                        </tr>
                                                                        </thead>


                                                                        <!-- <tbody>
                                                                        
                                                                        <?php $i = 1;
                                                                            foreach ($alternatif as $item) : ?>
                                                                                <tr>
                                                                                    
                                                                                    <td><?php echo $item->alternatif; ?></td> 
                                                                                    <?php foreach ($nilai[$item->alternatif_id] as $k => $v) : ?> 
                                                                                        <td><?= $v; ?></td>
                                                                                    <?php endforeach; ?>
                                                                                    
                                                                                </tr>
                                                                                <?php $i++;
                                                                            endforeach; ?>
                                                                        </tbody> -->
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th>Tren</th> 
                                                                                <?php foreach ($tren as $tren => $y) : ?> 
                                                                                    <td><?= $y; ?></td>
                                                                                <?php endforeach; ?>
                                                                            </tr>
                                                                        </tfoot>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th>Nilai Minimum</th> 
                                                                                <?php foreach ($nilai_min as $min => $y) : ?> 
                                                                                    <td><?= $y; ?></td>
                                                                                <?php endforeach; ?>
                                                                                
                                                                            </tr>
                                                                        </tfoot>
                                                                        
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- START NEW ACCORDIONS HERE -->
                                            <div id="headingOne" class="card-header">
                                                <button type="button" data-toggle="collapse" data-target="#collapseOne3" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                                                    <h5 class="m-0 p-0">#2 Transformasi nilai untuk kriteria tren positif</h5>
                                                </button>
                                            </div>
                                            <div data-parent="#accordion" id="collapseOne3" aria-labelledby="headingOne" class="collapse show">
                                                <div class="card-body">     
                                                    <div id="exampleAccordion" data-children=".item">
                                                        <div class="item">
                                                            <button type="button" aria-expanded="true" aria-controls="exampleAccordion1" data-toggle="collapse" href="#ket2" class="m-0 p-0 btn btn-link"><h5>Keterangan</h5></button>
                                                            <div data-parent="#exampleAccordion" id="ket2" class="collapse">
                                                                <p class="mb-3">Untuk kriteria tren positif, nilai minimum pada setiap kriteria ditransformasi ke seratus, sedangkan nilai lainnya ditransformasi secara proporsional lebih tinggi.</p>
                                                                <img src="assets/images/transformpositif.png" height="124" width="208">
                                                                <img src="assets/images/kettransform.png" height="124" width="360">
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
                                                                        <?php foreach ($cpi->transformasipositif as $key => $val) : ?>
                                                                            
                                                                            <th><?= $krtp[$key]?></th>
                                                                           
                                                                        <?php endforeach; ?>
                                                                        </tr>
                                                                        </thead>
                                                                        
                                                                        <tbody>
                                                                            <tr>
                                                                                <?php foreach ($cpi->transformasipositif as $key => $val) : ?>
                                                                                    <tr>
                                                                                        <td><?= $alt[$key] ?></td>
                                                                                        <?php foreach ($val as $k => $v) : ?>
                                                                                            <td><?= round($v, 4) ?></td>
                                                                                        <?php endforeach ?>
                                                                                    </tr>
                                                                                <?php endforeach; ?>   
                                                                            </tr>   
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="headingOne" class="card-header">
                                                <button type="button" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                                                    <h5 class="m-0 p-0">#3 Transformasi nilai untuk kriteria tren negatif</h5>
                                                </button>
                                            </div>
                                            <div data-parent="#accordion" id="collapseOne4" aria-labelledby="headingOne" class="collapse show">
                                                <div class="card-body">
                                                    <div id="exampleAccordion" data-children=".item">
                                                        <div class="item">
                                                            <button type="button" aria-expanded="true" aria-controls="exampleAccordion1" data-toggle="collapse" href="#ket3" class="m-0 p-0 btn btn-link"><h5>Keterangan</h5></button>
                                                            <div data-parent="#exampleAccordion" id="ket3" class="collapse">
                                                                <p class="mb-3">Untuk kriteria tren negatif, nilai minimum pada setiap kriteria ditransformasi ke seratus, sedangkan nilai lainnya ditransformasi secara proporsional lebih rendah.</p>
                                                                <img src="assets/images/transformnegatif.png" height="124" width="208">
                                                                <img src="assets/images/kettransform.png" height="124" width="360">
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
                                                                        <?php foreach ($cpi->transformasinegatif as $key => $val) : ?>
                                                                            <th><?= $krtn[$key] ?></th>
                                                                        <?php endforeach; ?>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <?php foreach ($cpi->transformasinegatif as $key => $val) : ?>
                                                                                    <tr>
                                                                                        <td><?= $alt[$key] ?></td>
                                                                                        <?php foreach ($val as $k => $v) : ?>
                                                                                            <td><?= round($v, 4) ?></td>
                                                                                        <?php endforeach ?>
                                                                                    </tr>
                                                                                <?php endforeach; ?>   
                                                                            </tr>   
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <!--  -->
                                                                                   
                                                                                
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--      END NEW ACCORDIONS HERE        -->
                                            
                                            <div id="headingOne" class="card-header">
                                                <button type="button" data-toggle="collapse" data-target="#collapseOne5" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                                                    <h5 class="m-0 p-0">#4 Menghitung nilai CPI</h5>
                                                </button>
                                            </div>
                                            <div data-parent="#accordion" id="collapseOne5" aria-labelledby="headingOne" class="collapse show">
                                                <div class="card-body">
                                                    <div id="exampleAccordion" data-children=".item">
                                                        <div class="item">
                                                            <button type="button" aria-expanded="true" aria-controls="exampleAccordion1" data-toggle="collapse" href="#ket4" class="m-0 p-0 btn btn-link"><h5>Keterangan</h5></button>
                                                            <div data-parent="#exampleAccordion" id="ket4" class="collapse">
                                                                <p class="mb-3">Menghitung indeks gabungan kriteria pada alternatif ke-j. Perhitungan dilakukan dengan melakukan perkalian nilai yang sudah ditransformasikan dengan bobot kriteria. Kemudian menjumlahkan hasil perhitungan tiap alternatif.</p>
                                                                <p class="mb-3">Alternatif dengan total nilai indeks gabungan tertinggi merupakan alternatif terbaik</p>
                                                                <img src="assets/images/perhitungan.png" height="130" width="150">
                                                                <img src="assets/images/ketperhitungan.png" height="124" width="470">
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
                                                                        <th>Nama Alternatif</th>
                                                                        <th>Nilai CPI</th> 
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <?php foreach ($cpi->nilaicpi as $key => $val) : ?>
                                                                                    <tr>
                                                                                        <td><?= $alt[$key] ?></td>
                                                                                        <td><?= round(($cpi->nilaicpi[$key]),4) ?></td>
                                                                                    </tr>
                                                                                <?php endforeach; ?>   
                                                                            </tr>   
                                                                        </tbody>
                                                                        
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    
</body>

</html>
