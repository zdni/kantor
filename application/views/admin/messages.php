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
                  <h5>Jejak Pendapat</h5>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-bordered table-hover table-data">
                    <thead>
                      <th>No</th>
                      <th>Penilaian</th>
                      <th>Pesan</th>
                    </thead>
                    <tbody>
                      <?php $number = 1; foreach($datas as $data) { ?>
                        <tr>
                          <td><?= $number ?></td>
                          <td>
                            <p><?= $data->rating ?></p>
                            <span class="badge badge-info"><?= date( "d M Y", strtotime( $data->date ) ) ?></span>
                          </td>
                          <td><?= $data->message ?></td>
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