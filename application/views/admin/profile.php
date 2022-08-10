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
              <div class="row">
                <?php foreach ($profiles as $profile) { ?>
                  <div class="col-md-6 col-12">
                    <div class="card mb-5">
                      <form action="<?= base_url('admin/profile/profile') ?>" method="post">
                        <div class="card-body">
                          <input type="hidden" name="file" id="file" value="<?= $profile->file ?>">
                          <div class="form-group">
                            <label for=""><?= $profile->label ?></label>
                            <input type="text" name="file_content" id="file_content" class="form-control" value="<?= $profile->file_content ?>">
                          </div>
                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                <?php } ?>
                <div class="col-md-6 col-12">
                  <div class="card mb-5">
                    <form action="<?= base_url('admin/profile/update_logo') ?>" method="post" enctype="multipart/form-data">
                      <div class="card-body">
                        <img src="<?= base_url('uploads/logo/') . $logo ?>" alt="" style="height: 50px">
                        <input type="hidden" name="file" id="file" value="logo.html">
                        <div class="form-group">
                          <label for="">File Logo <span class="text-danger">(file PNG)</span></label>
                          <input type="file" name="logo" id="logo" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card mb-5">
                <form action="<?= base_url('admin/profile/create') ?>" method="post">
                  <div class="card-header">
                    <p>Tambah Profil</p>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="">Titel Profil</label>
                      <span style="font-size: 12px; display: block; font-weight: bold; margin-top: -12px; margin-bottom: 7px;" class="text-info">Titel profil akan ditampilkan sebagai link menu</span>
                      <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">Urutan</label>
                      <input type="number" name="sequence" id="sequence" class="form-control" value=1>
                    </div>
                    <div class="form-group">
                      <label for="">Konten</label>
                      <span style="font-size: 12px; display: block; font-weight: bold; margin-top: -12px; margin-bottom: 7px;" class="text-info">Isi konten profil yang akan ditampilkan</span>
                      <textarea class="summernote_form" name="content" id="content"></textarea>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                  </div>
                </form>
              </div>
              <?php foreach ($datas as $data) { ?>
                <div class="card">
                  <form action="<?= base_url('admin/profile/update') ?>" method="post">
                    <div class="card-header">
                      <p><?= $data->title ?></p>
                    </div>
                    <div class="card-body">
                      <input type="hidden" id="id" name="id" class="form-control" value="<?= $data->id ?>">
                      <input type="hidden" id="file" name="file" class="form-control" value="<?= $data->file ?>">
                      <div class="form-group">
                        <label for="">Titel Profil</label>
                        <input type="text" name="title" id="title" class="form-control" value="<?= $data->title ?>">
                      </div>
                      <div class="form-group">
                        <label for="">Urutan</label>
                        <input type="number" name="sequence" id="sequence" class="form-control" value="<?= $data->sequence ?>">
                      </div>
                      <div class="form-group">
                        <label for="">Konten</label>
                        <span style="font-size: 12px; display: block; font-weight: bold; margin-top: -12px; margin-bottom: 7px;" class="text-info">Isi konten profil yang akan ditampilkan</span>
                        <textarea class="summernote_form" name="content" id="content"><?= $data->file_content ?></textarea>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-sm btn-secondary">Ubah Profil</button>
                      <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#modal-delete-profile-<?= $data->id ?>">Hapus Profil</button>
                      
                    </div>
                  </form>
                </div>
                <div class="modal fade" id="modal-delete-profile-<?= $data->id ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form action="<?= base_url('admin/profile/delete') ?>" method="post">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus Profil</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <input type="hidden" id="id" name="id" class="form-control" value="<?= $data->id ?>">
                          <p>Yakin ingin menghapus konten profil <?= $data->title ?></p>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-sm btn-danger">Hapus Profil</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>