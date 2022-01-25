<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Film</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header ">
                            <h4 class="card-title">Tambah Film</h4>
                        </div>


                        <div class="card-body">
                            <?php 
                            echo validation_errors('<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i>','</h5></div>');
                
                if (isset($error_up)) {
                    echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i>'.$error_up.'</h5></div>';
                };

                        echo form_open_multipart('film/add') ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="squareInput">Title Film</label>
                                        <input name="title" type="text" class="form-control input-square"
                                            id="squareInput" placeholder="Title" value="<?= set_value('title')  ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="type">Type Film</label>
                                        <select name="id_type" class="form-control" id="type">
                                            <option value="">--Pilih Type--</option>
                                            <?php foreach ($type as $t => $value) { ?>
                                            <option value="<?= $value->id_type ?>"><?= $value->type_film ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="genre">Genre Film</label>
                                        <select name="id_genre" class="form-control" id="genre">
                                            <option value="">--Pilih Genre--</option>
                                            <?php foreach ($genre as $g => $value) { ?>
                                            <option value="<?= $value->id_genre ?>"><?= $value->nama_genre ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="country">Country Film</label>
                                        <select name="id_country" class="form-control" id="country">
                                            <option value="">--Pilih Country--</option>
                                            <?php foreach ($country as $c => $value) { ?>
                                            <option value="<?= $value->id_country ?>"><?= $value->nama_country ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Gambar Barang</label>
                                <input type="file" name="gambar" class="form-control" id="preview_gambar" required>
                            </div>

                            <div class="form-group">
                                <img src="" id="gambar_load" class="img-fluid">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-md">Simpan Film</button>
                                <a href="<?= base_url('film') ?>" class="btn btn-danger btn-md">Kembali</a>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>