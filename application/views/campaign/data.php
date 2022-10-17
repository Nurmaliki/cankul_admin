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

                                        <th>campaign_name</th>
                                        <th>description</th>
                                        <th>return_percentage</th>
                                        <th>date_start</th>
                                        <th>date_end</th>
                                        <th>company_id</th>
                                        <th>target</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($campaign as $key => $value) { ?>

                                        <tr>
                                            <td><?= $value->campaign_name ?></td>
                                            <td><?= $value->description ?></td>
                                            <td><?= $value->return_percentage ?></td>
                                            <td><?= $value->date_start ?></td>
                                            <td><?= $value->date_end ?></td>
                                            <td><?= $value->company_id ?></td>
                                            <td><?= $value->target ?></td>
                                            <td><?= $value->status ?></td>
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