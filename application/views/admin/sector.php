<div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $data->name ?></h1>
              <?php if( $this->session->userdata('role_name') == 'admin' ): ?>
              <button class="btn btn-sm btn-secondary" onclick="history.back()">Kembali</button>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <form action="<?= base_url('admin/sectors/update') ?>" method="post">
                  <div class="card-header">
                    <h5><?= $data->name ?></h5>
                  </div>
                  <div class="card-body">
                    <input type="hidden" name="id" id="id" class="form-control" value="<?= $data->id ?>">
                    <input type="hidden" name="file" id="file" class="form-control" value="<?= $data->file ?>">
                    <input type="hidden" name="slug" id="slug" class="form-control" value="<?= $data->slug ?>">
                    <div class="form-group">
                      <label for="">Nama</label>
                      <input type="text"name="name" id="name" class="form-control" value="<?= $data->name ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Konten</label>
                      <textarea class="summernote_form" name="content" id="content"><?= $data->file_content ?></textarea>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-outline-primary" >Ubah Detail</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>