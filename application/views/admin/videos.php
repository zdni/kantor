<div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Daftar Video</h1>
            </div>
          </div>
        </div>
      </div>
      
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h5>Daftar Video</h5>
                  <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal-create-video">Tambah</button>

                  <div class="modal fade" id="modal-create-video">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="<?= base_url('admin/videos/create') ?>" method="post">
                          <div class="modal-header">
                            <h4 class="modal-title">Tambah Video Bahan Ajar</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="">Judul Video</label>
                              <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label for="">Link</label>
                              <input type="text" name="link" id="link" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label for="">Tampilkan Video Bahan Ajar</label>
                              <select name="is_show" id="is_show" class="form-control">
                                <option value="1">Tampilkan</option>
                                <option value="0">Sembunyikan</option>
                              </select>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-primary">Tambah Video</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-striped table-hover table-data">
                    <thead>
                      <th>No</th>
                      <th>Title</th>
                      <th>Video</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      <?php $number = 1; foreach($videos as $video) { ?>
                        <tr>
                          <td><?= $number ?></td>
                          <td><?= $video->title ?></td>
                          <td>
                            <?php $explode = explode( "v=", $video->link ); $id = $explode[1]; $source = "http://img.youtube.com/vi/" . $id . "/0.jpg" ?>
                            <img src="<?= $source ?>" alt="Thumbnail Video" width="250px">
                            <br><br>
                            <a href="<?= $video->link ?>" class="btn btn-sm btn-outline-secondary" target="_blank">Nonton Video</a>
                          </td>
                          <td>
                            <button class="btn btn-sm btn-outline-primary" type="button" data-toggle="modal" data-target="#modal-edit-video-<?= $video->id ?>">Edit</button>
                            <div class="modal fade" id="modal-edit-video-<?= $video->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/videos/update') ?>" method="post">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Edit Video</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $video->id ?>">
                                      <div class="form-group">
                                        <label for="">Judul Video</label>
                                        <input type="text" name="title" id="title" class="form-control" required value="<?= $video->title ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="">Link</label>
                                        <input type="text" name="link" id="link" class="form-control" required value="<?= $video->link ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="">Tampilkan Video</label>
                                        <select name="is_show" id="is_show" class="form-control">
                                          <option <?= ($video->is_show == 1) ? 'selected' : '' ?> value="1">Tampilkan</option>
                                          <option <?= ($video->is_show == 0) ? 'selected' : '' ?> value="0">Sembunyikan</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-sm btn-primary">Edit Video</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>

                            <button class="btn btn-sm btn-outline-danger" type="button" data-toggle="modal" data-target="#modal-delete-video-<?= $video->id ?>">Hapus</button>
                            <div class="modal fade" id="modal-delete-video-<?= $video->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/videos/delete') ?>" method="post">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Hapus Video</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $video->id ?>">
                                      <p>Yakin ingin menghapus video <?= $video->title ?></p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-sm btn-danger">Hapus Video</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                      <?php $number++; } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>