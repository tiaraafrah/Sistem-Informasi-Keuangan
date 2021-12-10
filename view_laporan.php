<!DOCTYPE html>
<html>
<head>
	<title>PDF</title>

	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/sb-admin-2.min.css" />
	<script src="<?php echo base_url();?>assets/jquery.min.js" ></script>
</head>
<body>
	<h2>Laporan Keuangan</h2><hr>

	<form method="get" action="">
		<label>Filter Berdasarkan</label><br>
		<select name="filter" id="filter">
			<option value="">Pilih</option>
			<option value="1">Per Tanggal</option>
			<option value="2">Per Bulan</option>
			<option value="3">Per Tahun</option>
		</select>
		<br /><br />

		<div id="form-tanggal">
			<label>Tanggal</label><br>
			<input type="text" name="tanggal" class="input-tanggal" />
			<br /><br />
		</div>

		<div id="form-bulan">
			<label>Bulan</label><br>
			<select name="bulan">
				<option value="">Pilih</option>
				<option value="1">Januari</option>
				<option value="2">Februari</option>
				<option value="3">Maret</option>
				<option value="4">April</option>
				<option value="5">Mei</option>
				<option value="6">Juni</option>
				<option value="7">Juli</option>
				<option value="8">Agustus</option>
				<option value="9">September</option>
				<option value="10">Oktober</option>
				<option value="11">November</option>
				<option value="12">Desember</option>
			</select>
			<br /><br />
		</div>

		<div id="form-tahun">
			<label>Tahun</label><br>
			<select name="tahun">
			<option value="">Pilih</option>
			<?php
			foreach($option_tahun as $data){
				echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
			}
			?>
		</select>
		<br /><br />
		</div>

		<button type="submit">Tampilkan</button>
		<a href="<?php echo base_url(); ?>">Reset Filter</a>
	</form>
	<hr />

	<b><?php echo $ket; ?></b> <br /><br />
	<a href="<?php echo $url_cetak;?>">CETAK PDF</a><br /><br />

	<table border="1" cellpadding="8">
	<tr>
		<th>Tanggal</th>
		<th>Keterangan</th>
		<th>Jumlah</th>
	</tr>
	<?php
	if(! empty($pendapatan)){
		$no = 1;
		foreach($pendapatan as $data){
			$tgl_pendapatan = date('d-m-y', strtotime($data->tgl_pendapatan));

		echo "<tr>";
		echo "<td>".$tgl_pendapatan."</td>";
		echo "<td>".$data->keterangan."</td>";
		echo "<td>".$data->jumlah_pendapatan."</td>";
		echo "</tr>";
		$no++;
		}
	}
	?>

	<script scr="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>"></script>
	<script>
		$(document).ready(function){
			$('.input-tanggal').datepicker({
				dateFormat: 'yy-mm-dd'
			});

			$('#form-tanggal, #form-bulan, #form-tahun').hide();

			$('filter').change(function()){
				if($(this).val() == '1'){
					$('#form-bulan, #form-tahun').hide();

					$('#form-tanggal').show();
				}else if($(this).val( =='2')){
					$('#form-tanggal').hide();
					$('#form-bulan, #form-tahun').show();
				}else{
					$('#form-tanggal, #form-bulan').hide();
					$('#form-tahun').show();
				}
				$('#form-tanggal input, #form-bulan select, #form-tahun select').val('');
			}
		}
	</script>
	</table>

</body>
</html>