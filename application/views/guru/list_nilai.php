<div id="content" class="p-4 p-md-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <h1 class="ml-auto">Welcome, <?php echo $username; ?></h1>
            </div>
        </div>
    </nav>
    <h2 class="mb-4">Nilai Siswa</h2>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="kpk-tab" data-toggle="tab" href="#kpk" role="tab" aria-controls="kpk" aria-selected="true">KPK</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="fpb-tab" data-toggle="tab" href="#fpb" role="tab" aria-controls="fpb" aria-selected="false">FPB</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="faktor-prima-tab" data-toggle="tab" href="#faktor-prima" role="tab" aria-controls="faktor-prima" aria-selected="false">Faktor Prima</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="evaluasi-tab" data-toggle="tab" href="#evaluasi" role="tab" aria-controls="evaluasi" aria-selected="false">Evaluasi</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="kpk" role="tabpanel" aria-labelledby="kpk-tab">
                <div class="table-container">
                  <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Skor</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($siswa as $s): ?>
                      <tr>
                        <td><?php echo $s->id; ?></td>
                        <td><?php echo $s->nama; ?></td>
                        <td><?php echo $s->kelas; ?></td>
                        <td><?php echo $s->skor; ?></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="fpb" role="tabpanel" aria-labelledby="fpb-tab">
                <div class="table-container">
                  <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Skor</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($siswa_fpb as $s): ?>
                      <tr>
                        <td><?php echo $s->id; ?></td>
                        <td><?php echo $s->nama; ?></td>
                        <td><?php echo $s->kelas; ?></td>
                        <td><?php echo $s->skor; ?></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="faktor-prima" role="tabpanel" aria-labelledby="faktor-prima-tab">
                <div class="table-container">
                  <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Skor</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($siswa_faktor_prima as $s): ?>
                      <tr>
                        <td><?php echo $s->id; ?></td>
                        <td><?php echo $s->nama; ?></td>
                        <td><?php echo $s->kelas; ?></td>
                        <td><?php echo $s->skor; ?></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="evaluasi" role="tabpanel" aria-labelledby="evaluasi-tab">
                <div class="table-container">
                  <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Skor</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($siswa_evaluasi as $s): ?>
                      <tr>
                        <td><?php echo $s->id; ?></td>
                        <td><?php echo $s->nama; ?></td>
                        <td><?php echo $s->kelas; ?></td>
                        <td><?php echo $s->skor; ?></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>