    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $page ?></h1>
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
                  <h5>Gambar Slider</h5>
                  <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal-create-hero">Tambah</button>
                
                  <div class="modal fade" id="modal-create-hero">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="<?= base_url('admin/dashboard/heros_create') ?>" method="post" enctype="multipart/form-data">
                          <div class="modal-header">
                            <h4 class="modal-title">Tambah Gambar</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <input type="hidden" name="name" id="name" class="form-control" value="true">
                            <div class="form-group">
                              <label for="">Gambar</label>
                              <input type="file" name="image" id="image" class="form-control" required>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <th>No</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      <?php $number = 1; foreach( $heros as $hero ){ ?>
                        <tr>
                          <td><?= $number ?></td>
                          <td>
                            <img src="<?= base_url('uploads/heros/') . $hero->image ?>" alt="Slider Gambar" width="200px">
                          </td>
                          <td>
                            <button class="btn btn-sm btn-outline-danger" type="button" data-toggle="modal" data-target="#modal-delete-hero-<?= $hero->id ?>">Hapus</button>
                            <div class="modal fade" id="modal-delete-hero-<?= $hero->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/dashboard/heros_delete') ?>" method="post">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Hapus Gambar</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="id" id="id" class="form-control" value="<?= $hero->id ?>">
                                      <p>Yakin ingin menghapus gambar ini?</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
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
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h5>Gambar Beranda</h5>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <th>No</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>
                          <img src="<?= base_url('uploads/heros/') . $about->image ?>" alt="Slider Gambar" width="200px">
                        </td>
                        <td>
                          <button class="btn btn-sm btn-outline-primary" type="button" data-toggle="modal" data-target="#modal-edit-hero-<?= $about->id ?>">Edit</button>
                          <div class="modal fade" id="modal-edit-hero-<?= $about->id ?>">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <form action="<?= base_url('admin/dashboard/heros_edit') ?>" method="post" enctype="multipart/form-data">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Edit Gambar</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <input type="hidden" name="id" id="id" class="form-control" value="<?= $about->id ?>">
                                    <div class="form-group">
                                      <label for="">Gambar</label>
                                      <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h5>Gambar Popup</h5>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <th>No</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>
                          <img src="<?= base_url('uploads/heros/') . $popup->image ?>" alt="Slider Gambar" width="200px">
                        </td>
                        <td>
                          <button class="btn btn-sm btn-outline-primary" type="button" data-toggle="modal" data-target="#modal-edit-hero-<?= $popup->id ?>">Edit</button>
                          <div class="modal fade" id="modal-edit-hero-<?= $popup->id ?>">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <form action="<?= base_url('admin/dashboard/heros_edit') ?>" method="post" enctype="multipart/form-data">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Edit Gambar Popup</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <input type="hidden" name="id" id="id" class="form-control" value="<?= $popup->id ?>">
                                    <div class="form-group">
                                      <label for="">Gambar</label>
                                      <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <?php $number = 1; foreach ($counts as $count) { ?>
              <div class="col-md-3 col-12">
                <div class="card">
                  <form action="<?= base_url('admin/dashboard/count_update')  ?>" method="post">
                    <div class="card-body">
                      <input type="hidden" name="file" id="file" value="<?= $number . '.html' ?>">
                      <div class="form-group">
                        <label for="">Icon</label>
                        <input type="text" name="icon" id="icon" class="form-control" placeholder="contoh: far fa-hospital" value="<?= $count->icon ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="">Total</label>
                        <input type="number" name="total" id="total" class="form-control" value="<?= $count->total ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="">Label</label>
                        <input type="text" name="label" id="label" class="form-control" value="<?= $count->label ?>" required>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            <?php $number++; } ?>
          </div>
        </div>
      </div>
    </div>