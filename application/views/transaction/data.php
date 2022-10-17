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

                                          <th>amount</th>
                                          <th>method</th>
                                          <th>transaction_id</th>
                                          <th>payment_struct</th>
                                          <th>created_at</th>


                                      </tr>
                                  </thead>
                                  <tbody>

                                      <?php foreach ($transaction as $key => $value) { ?>

                                          <tr>
                                              <td><?= $value->amount ?></td>
                                              <td><?= $value->method ?></td>
                                              <td><?= $value->transaction_id ?></td>
                                              <td><?= $value->payment_struct ?></td>
                                              <td><?= $value->created_at ?></td>
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