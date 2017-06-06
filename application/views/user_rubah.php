<!DOCTYPE html>
<html>
<head>
	<title>Form Tambah User</title>
</head>
<body>
	<?php
		echo form_open('user/proses_rubah_user');
		echo form_label('Nama');
		foreach ($records as $record => $value) {
			echo form_input(array('name' => 'id', 'value' => $value->id_user, 'type' => 'hidden'));
			echo form_input(array('name' => 'nama', 'value' => $value->nama_user));
			echo form_input(array('name' => 'alamat', 'value' => $value->alamat));
		}
		echo '<br />';
		echo form_submit(array('id'=>'submit', 'value'=>'Simpan Data'));
		echo form_close();
	?>
</body>
</html>