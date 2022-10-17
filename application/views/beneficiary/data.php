  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <?php $this->load->view('layout/content_header');  ?>

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example2" class="table table-bordered table-hover">
                                  <thead>
                                      <tr>



                                          <th>first_name</th>
                                          <th>last_name</th>
                                          <th>email</th>
                                          <th>gender</th>
                                          <th>address</th>
                                          <th>kecamatan</th>
                                          <th>kelurahan</th>
                                          <th>phone</th>
                                          <th>title</th>
                                          <th>nationality</th>
                                          <th>province</th>
                                          <th>city</th>
                                          <th>rt</th>
                                          <th>rw</th>
                                          <th>mother_name</th>
                                          <th>marital_status</th>
                                          <th>last_education</th>
                                          <th>job_field</th>
                                          <th>job_title</th>
                                          <th>funds_source</th>
                                          <th>monthly_income</th>
                                          <th>email_status</th>
                                          <th>profile_status</th>
                                      </tr>
                                  </thead>
                                  <tbody>

                                      <?php foreach ($beneficiary as $key => $value) { ?>

                                          <tr>
                                              <!-- id -->
                                              <!-- funder_id -->
                                              <td><?= $value->first_name ?></td>
                                              <td><?= $value->last_name ?></td>
                                              <td><?= $value->email ?></td>
                                              <td><?= $value->gender == 1 ? 'Pria' : 'Wanita' ?></td>
                                              <td><?= $value->address ?></td>
                                              <td><?= $value->kecamatan ?></td>
                                              <td><?= $value->kelurahan ?></td>
                                              <td><?= $value->phone ?></td>
                                              <td><?= $value->title ?></td>
                                              <td><?= $value->nationality ?></td>
                                              <td><?= $value->province ?></td>
                                              <td><?= $value->city ?></td>
                                              <td><?= $value->rt ?></td>
                                              <td><?= $value->rw ?></td>
                                              <td><?= $value->mother_name ?></td>
                                              <td><?= $value->marital_status ?></td>
                                              <td><?= $value->last_education ?></td>
                                              <td><?= $value->job_field ?></td>
                                              <td><?= $value->job_title ?></td>
                                              <td><?= $value->funds_source ?></td>
                                              <td><?= $value->monthly_income ?></td>
                                              <td><?= $value->email_status == 1 ? 'Terverifikasi' :  'Belum Terverifikasi' ?></td>
                                              <td><?= $value->profile_status == 1 ? 'Terverifikasi' :  'Belum Terverifikasi' ?></td>
                                              <!-- created_at
                                              created_by
                                              updated_at
                                              updated_by -->
                                          </tr>

                                      <?php } ?>

                                  </tbody>

                              </table>
                          </div>
                          <!-- /.card-body -->
                      </div>
                      <!-- /.card -->

                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>