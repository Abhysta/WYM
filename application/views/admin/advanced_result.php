<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="trending__product">
                    <div class="row">
                        <?php if (count($hasil)) {?>
                        <?php foreach ($hasil as $h => $value){?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg"
                                    data-setbg="<?= base_url('assets/film/'. $value->gambar)?>">
                                    <div class="ep">18 / 18</div>
                                    <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                </div>
                                <div class="product__item__text">
                                    <h5><a
                                            href="<?= base_url('admin/detail/'.$value->id_film)?>"><?= $value->title ?></a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <!-- if -->
                        <?php } else { ?>
                        <!-- else -->
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>