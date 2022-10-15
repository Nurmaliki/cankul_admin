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
                                          <th>name</th>
                                          <th>description</th>
                                          <th>return_percentage</th>
                                          <th>date_start</th>
                                          <th>date_end</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>

                                      <?php foreach ($funding_owner as $key => $value) { ?>

                                          <tr>
                                              <td><?= $value->name ?></td>
                                              <td><?= $value->description ?></td>
                                              <td><?= $value->return_percentage ?></td>
                                              <td><?= $value->date_start ?></td>
                                              <td><?= $value->date_end ?></td>
                                              <td><?= $value->date_end ?></td>
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