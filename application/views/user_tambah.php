<!DOCTYPE html>
<html>
<head>
	<title>Form Tambah User</title>
</head>
<body>
	<?php
		echo form_open('user/proses_tambah_user');
		echo form_label('Nama');
		echo form_input(array('name' => 'nama'));
		echo '<br />';
		echo form_label('Alamat');
		echo form_input(array('name' => 'alamat'));
		echo '<br/>';
		echo form_submit(array('id'=>'submit', 'value'=>'Simpan Data'));
		echo form_close();
	?>
</body>
</html>