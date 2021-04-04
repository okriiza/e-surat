<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Data Keseluruhan Jumlah </h1>
</div>

<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Warga</div>
            <?php $koneksi = new mysqli("localhost", "root", "", "desa"); ?>
            <?php $ambil = $koneksi->query("SELECT COUNT(*) AS jumlah FROM warga "); ?>
            <?php while ($pecah = mysqli_fetch_array($ambil)) {; ?>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pecah['jumlah']; ?></div>
            <?php } ?>
          </div>
          <div class="col-auto">
            <i class="fas fa-user fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Keluarga</div>
            <?php $koneksi = new mysqli("localhost", "root", "", "desa"); ?>
            <?php $ambil = $koneksi->query("SELECT COUNT(*) AS jumlah FROM kk "); ?>
            <?php while ($pecah = mysqli_fetch_array($ambil)) {; ?>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pecah['jumlah']; ?></div>
            <?php } ?>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Surat Masuk</div>
            <?php $koneksi = new mysqli("localhost", "root", "", "desa"); ?>
            <?php $ambil = $koneksi->query("SELECT COUNT(*) AS jumlah FROM surat "); ?>
            <?php while ($pecah = mysqli_fetch_array($ambil)) {; ?>
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $pecah['jumlah']; ?></div>
            <?php } ?>
          </div>
          <div class="col-auto">
            <i class="fas fa-envelope fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-comments fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>