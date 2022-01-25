<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Video</h4>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header ">
                            <h4 class="card-title">Video</h4>
                            <a href="<?= base_url('video/add')?>" class="btn btn-success">Add Video</a>
                        </div>

                        <div class="card-body">
                            <!-- <?php if($this->session->flashdata('message')) {
                    echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>';
                    echo $this->session->flashdata('message');
                    echo '</div>';
                }?> -->
                            <table class="table table-head-bg-success table-striped table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Creator</th>
                                        <th scope="col">Sinopsis</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Studio</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Genre</th>
                                        <th scope="col">Rating</th>
                                        <th scope="col">Duration</th>
                                        <th scope="col">Kualitas</th>
                                        <th scope="col">Views</th>
                                        <th scope="col">Video</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1;
                        foreach ($video as $v => $value) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value->title ?></td>
                                        <td><?= $value->creator ?></td>
                                        <td class="text-truncate" style="max-width: 250px;"><?= $value->sinopsis ?></td>
                                        <td><?= $value->type_film ?></td>
                                        <td><?= $value->studio ?></td>
                                        <td><?= $value->date ?></td>
                                        <td><?= $value->status ?></td>
                                        <td><?= $value->nama_genre ?></td>
                                        <td><?= $value->rating ?></td>
                                        <td><?= $value->duration ?></td>
                                        <td><?= $value->kualitas ?></td>
                                        <td><?= number_format($value->views,0) ?></td>
                                        <td><video width="320" height="240" controls>
                                                <source src="<?= base_url('assets/film/'. $value->video)?>"
                                                    type="video/mp4">
                                            </video></td>
                                        <td>
                                            <a href="<?= base_url('video/edit/'. $value->id_video)?>"
                                                class="btn btn-warning">Edit</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#hapus<?= $value->id_video ?>">Delete</button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus -->
<?php foreach ($video as $v => $value) { ?>
<div class="modal fade" id="hapus<?= $value->id_video ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete <?= $value->title?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Apakah Anda Yakin Ingin Menghapus Film Ini ?</h6>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="<?= base_url('video/delete/'. $value->id_video) ?>" class="btn btn-primary">Delete</a>
            </div>
        </div>
    </div>
</div>
<?php } ?>