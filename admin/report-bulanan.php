<?php
include "templates/header-report.php";
include "templates/sidebar-report.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Report Bulanan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Report</a></li>
            <li class="breadcrumb-item active">Report Bulanan</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-book mr-3"></i>Data Kritik Dan Saran </h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover" id="table-report" width="100%">
            <thead align="center">
            <th>No.</th>
              <th>Nama Pengirim</th>
              <th>Kritik</th>
              <th>Saran</th>
              <th>Status</th>
              <th>Catatan Petugas</th>
              <th>Tanggal</th>
            </thead>
            <tbody align="center">
              <?php
              $month = $_POST['month'];
              $year = $_POST['year'];
              $data = query("SELECT * FROM pengaduan WHERE MONTH(tgl_lapor)='$month' AND YEAR(tgl_lapor)='$year' ORDER BY tgl_lapor DESC");
              foreach ($data as $d):
                ?>
                <tr>
                <td><?= $d['id']; ?></td>
                  <td><?= $d['n_pelapor']; ?></td>
                  <td><?= $d['kritik']; ?></td>
                  <td><?= $d['saran']; ?></td>
                  <td><?= $d['status']; ?></td>
                  <td><?= $d['ket_petugas']; ?></td>
                  <td><?= $d['tgl_lapor']; ?></td>
                <?php
              endforeach;
              ?>
            </tbody>

          </table>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<?php
include "templates/footer.php";
?>