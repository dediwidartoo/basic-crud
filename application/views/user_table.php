<html>
	<head>
		<title>table user</title>
	</head>	
	<body>
		<table border="1">
			<tr>
				<th>No.</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th colspan="2"><a href="<?php echo base_url('index.php/user/form_tambah_user'); ?>">Tambah data</a></th>
			</tr>

			<?php 
				$nomor='1';
				foreach ($records as $record => $value){
			?>
			<tr>
				<td><?php echo $nomor; $nomor += 1; ?></td>
				<td><?php echo $value->nama_user; ?></td>
				<td><?php echo $value->alamat; ?></td>
				<td><a href="<?php echo base_url('index.php/user/form_rubah_user/').$value->id_user;; ?>">Rubah data</a></td>
				<td><a href="<?php echo base_url('index.php/user/proses_hapus_user/').$value->id_user;; ?>" onClick="return konfirmasi();" >Hapus data</a></td>
			</tr>
		<?php } ?>
		</table>

		<script type="text/javascript">
			function konfirmasi() {
				var retVal = confirm("Anda yakin untuk menghapus data ini?");
				if (retVal==true) {
					return true;
				}
				else{
					return false;
				}
			}
		</script>
	</body>
</html>