<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="trending__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Hasil Pencarian</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <?php if (count($hasil)) {?>
                        <?php foreach ($hasil as $h => $value){?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg"
                                    data-setbg="<?= base_url('assets/film/'. $value->gambar)?>">
                                </div>
                                <div class="product__item__text">
                                    <ul>
                                        <li><?= $value->type_film ?></li>
                                    </ul>
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
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="product__sidebar">
                    <div class="product__sidebar__view">
                        <?php echo form_open('admin/advance_result');?>
                        <div class="section-title">
                            <h5>Advance Search</h5>
                        </div>

                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect02" name="id_genre" class="text-uppercase" required>
                                <option value="">Select</option>
                                <?php if (count($getGenre)) : ?>

                                <?php foreach ($getGenre as $g => $value) { ?>
                                <option value="<?= $value->id_genre ?>"><?= $value->nama_genre ?></option>
                                <!-- foreach -->
                                <?php } ?>

                                <!-- if -->
                                <?php else:?>

                                <!-- else -->
                                <?php endif; ?>
                            </select>
                            <div class="input-group-append">
                                <label class="input-group-text" for="inputGroupSelect02">Options</label>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect02" name="id_country" class="text-uppercase" required>
                                <option value="">Select</option>
                                <?php if (count($getCountry)) : ?>

                                <?php foreach ($getCountry as $c => $value) { ?>
                                <option value="<?= $value->id_country ?>"><?= $value->nama_country ?></option>
                                <!-- foreach -->
                                <?php } ?>

                                <!-- if -->
                                <?php else:?>

                                <!-- else -->
                                <?php endif; ?>
                            </select>
                            <div class="input-group-append">
                                <label class="input-group-text" for="inputGroupSelect02">Options</label>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect02" name="id_type" class="text-uppercase" required>
                                <option value="">Select</option>
                                <?php if (count($getType)) : ?>

                                <?php foreach ($getType as $t => $value) { ?>
                                <option value="<?= $value->id_type ?>"><?= $value->type_film ?></option>
                                <!-- foreach -->
                                <?php } ?>

                                <!-- if -->
                                <?php else:?>

                                <!-- else -->
                                <?php endif; ?>
                            </select>
                            <div class="input-group-append">
                                <label class="input-group-text" for="inputGroupSelect02">Options</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="submmit" class="btn btn-danger">Filter</button>
                        </div>

                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->