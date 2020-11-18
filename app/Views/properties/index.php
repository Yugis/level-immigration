<?= $this->extend('templates/admin_template') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url() ?>/public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Properties</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Properties</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Properties</h3>

                <!-- <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div> -->
                <span class="float-right">
                    <a class="btn btn-block btn-success btn-sm" href="<?= base_url('properties/create') ?>" target="_blank">Add Property</a>
                    <!-- <button type="button" class="btn btn-block btn-success btn-sm">Add Property</button> -->
                </span>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Property Title</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($properties as $property) : ?>
                            <tr>
                                <td><?= $property->title ?>
                                    <br />
                                    <small>
                                        Created <?= date('Y-m-d', strtotime($property->created_at)) ?>
                                    </small></td>
                                <td><?= ucfirst($property->type) ?></td>
                                <td><?= $property->price ?></td>
                                <td><?= $property->country ?></td>
                                <td><?= $property->city ?></td>
                                <td class="badge badge-<?= $property->status ? 'success' : 'danger' ?>"><?= $property->status ? 'Enabled' : 'Disabled' ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

<?= $this->endSection() ?>

<?= $this->section('footer') ?>
<!-- <script src="<?= base_url() ?>/public/plugins/jquery/jquery.min.js"></script> -->
<!-- <script src="<?= base_url() ?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<script src="<?= base_url() ?>/public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/public/dist/js/adminlte.min.js"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
        });
    });
</script>
<?= $this->endSection() ?>
<!-- jQuery -->
<!-- Bootstrap 4 -->
<!-- DataTables -->
<!-- AdminLTE App -->
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>/public/dist/js/demo.js"></script>
<!-- page script -->