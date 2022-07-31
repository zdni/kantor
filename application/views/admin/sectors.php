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
                  <h5>Daftar Bidang</h5>
                  <?php if( $this->session->userdata('role_name') == 'admin' ): ?>
                  <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal-create-sector">Tambah</button>

                  <div class="modal fade" id="modal-create-sector">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="<?= base_url('admin/sectors/create') ?>" method="post">
                          <div class="modal-header">
                            <h4 class="modal-title">Tambah Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="">Nama</label>
                              <input type="text" name="name" id="name" class="form-control">
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-primary">Tambah Data</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <?php endif; ?>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-striped table-hover table-data">
                    <thead>
                      <th>No</th>
                      <th>Bidang</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      <?php $number = 1; foreach( $datas as $data ) { ?>
                        <tr>
                          <td><?= $number ?></td>
                          <td><?= $data->name ?></td>
                          <td>
                            <a href="<?= base_url('admin/sectors/detail/' . $data->id ) ?>" class="btn btn-sm btn-outline-info">Detail</a>
                            <?php if( $this->session->userdata('role_name') == 'admin' ): ?>
                            <button class="btn btn-sm btn-outline-danger" type="button" data-toggle="modal" data-target="#modal-delete-sector-<?= $data->id ?>">Hapus</button>

                            <div class="modal fade" id="modal-delete-sector-<?= $data->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/sectors/delete') ?>" method="post">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Hapus Data</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" id="id" name="id" class="form-control" value="<?= $data->id ?>">
                                      <p>Yakin ingin menghapus data Bidang <?= $data->name ?></p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-sm btn-danger">Hapus Data</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <?php endif; ?>
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