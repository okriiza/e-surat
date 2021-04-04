<select name="nim" id="nim" class="form-control" onchange='changeValue(this.value)' required>
   <option value="">-Pilih-</option>
   <?php
   $query = mysqli_query($con, "select * from tb_asesi order by nim asc");
   $result = mysqli_query($con, "select * from tb_asesi");
   $jsArray = "var prdName = new Array();\n";
   while ($row = mysqli_fetch_array($result)) {
      echo '<option name="nim"  value="' . $row['nim'] . '">' . $row['nim'] . '</option>';
      $jsArray .= "prdName['" . $row['nim'] . "'] = {nama_asesi:'" . addslashes($row['nama_asesi']) . "',kode_tuk:'" . addslashes($row['kode_tuk']) . "',nama_tuk:'" . addslashes($row['nama_tuk']) . "'};\n";
   }
   ?>
</select>
<div class="form-group">
   <label>Nama Asesi</label>
   <input class="form-control" name="nama_asesi" id="nama_asesi" readonly />
</div>
<div class="form-group">
   <label>Kode TUK</label>
   <input class="form-control" name="kode_tuk" id="kode_tuk" readonly />
</div>
<div class="form-group">
   <label>Nama TUK</label>
   <input class="form-control" name="nama_tuk" id="nama_tuk" readonly />
</div>
<script type="text/javascript">
   <?php echo $jsArray; ?>

   function changeValue(id) {
      document.getElementById('nama_asesi').value = prdName[id].nama_asesi;
      document.getElementById('kode_tuk').value = prdName[id].kode_tuk;
      document.getElementById('nama_tuk').value = prdName[id].nama_tuk;
   };
</script>

ajimarlocoding123

https://drive.google.com/uc?id=1Zh8Bf8TyL7x52FVxjjyufOajc6UI-gC-&export=download