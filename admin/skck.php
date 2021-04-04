<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Surat Keterangan Catatan Kepolisian</title>

  <style>
    .bg-logo img {
      /* background-image: url("../img/logo/696px-Bandung_coa.png"); */

      position: relative;
      z-index: 1;
      top: 0px;
      height: 550px;
      opacity: 0.2;
      margin-top: 250px;
    }

    .isi-surat {
      /* background-color: #000; */
      position: absolute;
      top: 20px;
      z-index: 2;

      /* color: #fff; */
    }
  </style>
</head>


<?php
$koneksi = new mysqli("localhost", "root", "", "desa");
// or die(mysqli_error())
$id = $_GET['id'];

$query_surat = "SELECT *,rw.ttdimg as ttd_rw,rt.ttdimg as ttd_rt, kades.ttdimg as ttd_kades FROM surat 
LEFT JOIN jenis_surat ON jenis_surat.id=surat.jenis_surat_id 
LEFT JOIN warga ON warga.id = surat.user_id 
LEFT JOIN kk on kk.id=warga.id_kk 
LEFT JOIN rt ON rt.id = kk.rt_id 
LEFT JOIN rw ON rw.id = kk.rw_id 
LEFT JOIN kades ON kades.id = kk.kades_id  
WHERE surat.id = '$id'";
// $surat = $koneksi->query($query_surat);
// $surat_val = $surat->fetch_assoc();
$result = mysqli_query($koneksi, $query_surat);
$surat_val = mysqli_fetch_array($result, MYSQLI_ASSOC);
// print_r($surat_val);
// die();

if (!$result) {
  printf("Error: %s\n", mysqli_error($koneksi));
  exit();
}

function tgl_indo($tanggal)
{
  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);

  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun
  return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}
?>


<body>
  <div class="bg-logo">
    <img src="../assets/img/logo/696px-Bandung_coa.png" />
    <div class="isi-surat">
      <div class="title" align="center">
        <table border="0" align="center" style="width: 650px;">
          <thead>
            <tr>
              <!-- <td align="center">
                        <img
                          src="../img/logo/696px-Bandung_coa.png"
                          width="70"
                          height="70"
                        />
                      </td> -->
              <td align="center" colspan="2">
                <b>
                  <font size="4">RUKUN TETANGGA (RT) <?php echo $surat_val['no_rt']; ?></font><br />
                  <font size="4">RUKUN WARGA (RW) <?php echo $surat_val['no_rw']; ?></font><br />
                  <font size="4" style="text-transform: uppercase">DESA <?php echo $surat_val['nama_desa']; ?> KECAMATAN CIKELET</font><br />
                </b>
                <!-- <font size="2"
                          >Jl. Gerhana No.2 Kopo Elok Kode Pos 40227 Telp.
                          (022)-5422827</font
                        > -->
              </td>
            </tr>
            <tr>
              <th colspan="3" align="center">
                <hr style="border: 1px solid #000;" />
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td align="center" colspan="2">
                <br />
                <b><u>
                    <font size="4">SURAT KETERANGAN CATATAN KEPOLISIAN <br /></font>
                  </u></b>
                <font size="4">Nomor: ..../....../..../.../.....</font>
              </td>
            </tr>
            <tr>
              <td height="5"></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="content">
        <table border="0" align="center" style="width: 650px;">
          <tr>
            <td colspan="2">
              <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Yang bertanda tangan dibawah ini Ketua Rukun Tetangga (RT) <?php echo $surat_val['no_rt']; ?>
                Ketua Rukun Warga (RW) <?php echo $surat_val['no_rw']; ?> Desa Pamalayan Kecamatan Cikelet
                Kabupaten Garut, menerangkan Bahwa :</label>
            </td>
          </tr>
          <tr>
            <td height="5"></td>
          </tr>
          <tr>
            <td>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              Nama
            </td>
            <td>: <b><?php echo $surat_val['nama_warga']; ?></b></td>
          </tr>

          <tr>
            <td>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              Jenis Kelamin
            </td>
            <td>
              : <?php echo $surat_val['jenis_kelamin']; ?>
            </td>
          </tr>
          <tr>
            <td>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              Tempat, Tgl Lahir
            </td>
            <td>
              <?php $tanggal_lahir = $surat_val['tgl_lahir'];
              $tanggal_lahir = date('d-m-Y');
              ?>
              : <?php echo $surat_val['tempat_lahir']; ?>, <?php echo $tanggal_lahir; ?>
            </td>
          </tr>
          <tr>
            <td>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              Pekerjaan
            </td>
            <td>
              : <?php echo $surat_val['pekerjaan']; ?>
            </td>
          </tr>
          <tr>
            <td>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              Agama
            </td>
            <td>
              : <?php echo $surat_val['agama']; ?>
            </td>
          </tr>
          <tr>
            <td>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              Status Perkawinan
            </td>
            <td>
              : <?php echo $surat_val['status_nikah']; ?>
          </tr>
          <tr>
            <td>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              Kewarga Negaraan
            </td>
            <td>
              : <?php echo $surat_val['warga_negara']; ?>
            </td>
          </tr>
          <tr>
            <td>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              Alamat
            </td>
            <td>
              : <?php echo $surat_val['alamat']; ?>
            </td>
          </tr>
          <tr>
            <td>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              No KTP/NIK
            </td>
            <td>
              : <?php echo $surat_val['no_ktp']; ?>
            </td>
          </tr>
          <tr>
            <td height="5"></td>
          </tr>
          <tr>
            <td colspan="2">
              <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Yang bersangkutan berdomisili di RT.<?php echo $surat_val['no_rt']; ?> RW.<?php echo $surat_val['no_rw']; ?> sejak
                lahir.</label>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Menurut hasil penelitian dan catatan yang ada pada Kantor kami
                orang tersebut di atas berkelakuan baik tidak pernah melakukan
                tindak kejahatan maupun terlibat dalam perkara POLISI /
                MILITER.
              </label>
            </td>
          </tr>
          <tr>
            <td height="5"></td>
          </tr>
          <tr>
            <td colspan="2">
              <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Surat keterangan ini dipergunakan untuk melengkapi salah satu
                persyaratan <b><?php echo $surat_val['keperluan_surat']; ?>.</b>
              </label>
            </td>
          </tr>
          <tr>
            <td height="5"></td>
          </tr>
          <tr>
            <td colspan="2">
              <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Demikian surat keterangan ini kami buat dengan sebenarnya,
                kepada yang berwajib/Instansi terkait/yang berkepentingan
                mohon menjadi maklum dan dapat dipergunakan sebagaimana
                mestinya
              </label>
            </td>
          </tr>
          <tr>
            <td height="10"></td>
          </tr>
        </table>
      </div>

      <div class="footer">
        <table align="center" border="0" style="width: 650px;">
          <tr>
            <td align="right" style="padding-right: 50px;">
              <?php echo $surat_val['nama_desa']; ?>, <?php echo tgl_indo(date('Y-m-d', strtotime($surat_val['created']))); ?>
            </td>
          </tr>
          <tr>
            <td height="10"></td>
          </tr>
        </table>

        <table align="center" border="0" style="width: 650px;">
          <tr>
            <td align="center">Ketua RT.<?php echo $surat_val['no_rt']; ?></td>
            <td align="center">Ketua RW.<?php echo $surat_val['no_rw']; ?></td>
          </tr>
          <tr>
            <td align="center">
              <?php if ($surat_val['rt_ttd'] == '1') {; ?>
                <img src="<?php echo $surat_val['ttd_rt'] ?>" alt="" width="300" height="100">
              <?php } ?>
            </td>

            <td align="center">
              <?php if ($surat_val['rw_ttd'] == '1') {; ?>
                <img src="<?php echo $surat_val['ttd_rw'] ?>" alt="" width="300" height="100">
              <?php } ?>
            </td>
          </tr>
          <tr>
            <td align="center">
              <?php echo $surat_val['nama_rt']; ?>
            </td>
            <td align="center">
              <?php echo $surat_val['nama_rw']; ?>
            </td>
          </tr>
        </table>

        <br />

        <table align="center" border="0" style="width: 650px;">
          <tr>
            <td align="center" colspan="2">Mengetahui :</td>
          </tr>
          <tr>
            <td align="center" style="padding-left: 70px; padding-right: 80px">Camat Kecamatan Cikelet</td>
            <td align="center">
              An.Kepala Desa <?php echo $surat_val['nama_desa']; ?> <br />
              Sekertaris
            </td>
          </tr>
          <tr>
            <td align="center"></td>
            <td align="center">
              <?php if ($surat_val['kades_ttd'] == '1') {; ?>
                <img src="<?php echo $surat_val['ttd_kades'] ?>" alt="" width="300" height="100">
              <?php } ?>
            </td>
          </tr>
          <tr>
            <td align="center">
              <u>.................................. <br /> </u>
              NIP............................
            </td>
            <td align="center">
              <?php echo $surat_val['nama_kades']; ?>
            </td>
          </tr>
        </table>
      </div>
      <div class="bg-trans"></div>
    </div>
  </div>
</body>

</html>