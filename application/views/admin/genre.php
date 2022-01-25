<section class="product-page spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-6">
                <div class="product__page__content">

                    <!-- Query Menu -->
                    <?php
                    
                    $main_genre = "SELECT `genre`.`id_genre`, `nama_genre`
                                FROM `genre`
                                ";
                    $genre = $this->db->query($main_genre)->result_array();
                    ?>

                    <!-- looping genre -->
                    <?php foreach ($genre as $g) { ?>
                    <div class="product__page__title">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-6">
                                <div class="section-title">
                                    <h4><?= $g['nama_genre']?></h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                            </div>
                        </div>
                    </div>

                    <?php 
                    
                    $main_film = "SELECT *
                                FROM `film`
                                JOIN `genre` ON `film`.`id_genre` = `genre`.`id_genre`
                                WHERE `film`.`id_genre` = {$g['id_genre']} 
                                ";
                    
                    $film = $this->db->query($main_film)->result_array();
                    ?>

                    <div class="row">
                        <?php foreach ($film as $f) {?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg"
                                    data-setbg="<?= base_url('assets/film/'. $f['gambar'])?>">
                                </div>
                                <div class="product__item__text">
                                    <h5><a href="<?= base_url('admin/detail/'.$f['id_film'])?>"><?= $f['title'] ?></a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>