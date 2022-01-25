<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Video</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header ">
                            <h4 class="card-title">Tambah Video</h4>
                        </div>


                        <div class="card-body">
                            <?php 
                            echo validation_errors('<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i>','</h5></div>');
                
                if (isset($error_up)) {
                    echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i>'.$error_up.'</h5></div>';
                };

                        echo form_open_multipart('video/add') ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="title">Title Film</label>
                                        <select name="id_film" class="form-control" id="title">
                                            <option value="">--Pilih Film--</option>
                                            <?php foreach ($film as $f => $value) { ?>
                                            <option value="<?= $value->id_film ?>"><?= $value->title ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="creator">Creator</label>
                                        <input name="creator" type="text" class="form-control input-square" id="creator"
                                            placeholder="Creator" value="<?= set_value('creator')  ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="sinopsis">Sinopsis</label>
                                        <textarea name="sinopsis" id="" cols="30" rows="10" id="sinopsis"
                                            class="form-control input-square"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select name="id_type" class="form-control" id="type">
                                            <option value="">--Pilih Type--</option>
                                            <?php foreach ($type as $t => $value) { ?>
                                            <option value="<?= $value->id_type ?>"><?= $value->type_film ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="studio">Studio</label>
                                        <input name="studio" type="text" class="form-control input-square" id="studio"
                                            placeholder="Studio" value="<?= set_value('studio')  ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="date">Date Release</label>
                                        <input name="date" type="date" class="form-control input-square" id="date"
                                            placeholder="Date" value="<?= set_value('date')  ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="id_status" class="form-control" id="status">
                                            <option value="">--Pilih Status--</option>
                                            <?php foreach ($status as $s => $value) { ?>
                                            <option value="<?= $value->id_status ?>"><?= $value->status ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="genre">Genre</label>
                                        <select name="id_genre" class="form-control" id="genre">
                                            <option value="">--Pilih Genre--</option>
                                            <?php foreach ($genre as $g => $value) { ?>
                                            <option value="<?= $value->id_genre ?>"><?= $value->nama_genre ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="rating">Rating</label>
                                        <input name="rating" type="text" class="form-control input-square" id="rating"
                                            placeholder="Rating" value="<?= set_value('rating')  ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="duration">Duration</label>
                                        <input name="duration" type="text" class="form-control input-square"
                                            id="duration" placeholder="Duration Film"
                                            value="<?= set_value('duration')  ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="kualitas">Kualitas</label>
                                        <input name="kualitas" type="text" class="form-control input-square"
                                            id="kualitas" placeholder="Kualitas Video"
                                            value="<?= set_value('kualitas')  ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="views">Views</label>
                                        <input name="views" type="text" class="form-control input-square" id="views"
                                            placeholder="Views" value="<?= set_value('views')  ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Video</label>
                                        <input type="file" name="video" class="form-control" id="preview_video"
                                            required>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <video controls width="100%">
                                </video>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-md">Simpan Film</button>
                                <a href="<?= base_url('video') ?>" class="btn btn-danger btn-md">Kembali</a>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>