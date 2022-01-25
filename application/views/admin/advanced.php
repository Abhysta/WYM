<section class="product spad">
    <div class="container">
        <?php echo form_open('admin/advance_result');?>
        <div class="row">
            <div class="col">
                <select name="id_genre" class="text-uppercase" required>
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
            </div>

            <div class="col">
                <select name="id_country" class="text-uppercase" required>
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
            </div>

            <div class="col">
                <select name="id_type" class="text-uppercase" required>
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
            </div>

            <div class="col">
                <button type="submmit" class="btn btn-danger">Filter</button>
            </div>
        </div>
        <?php echo form_close();?>
    </div>
</section>