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

                                          <th>username</th>
                                          <th>Role Name</th>
                                          <th>Aksi</th>


                                      </tr>
                                  </thead>
                                  <tbody>

                                      <?php foreach ($user as $key => $value) { ?>

                                          <tr>
                                              <td><?= $value->username ?></td>
                                              <td><?= $value->role_name ?></td>
                                              <td></td>
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