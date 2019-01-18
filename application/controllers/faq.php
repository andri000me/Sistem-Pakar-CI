<div class="jumbotron">
Skripsi Topik <b>Kecerdasan Buatan</b> Teknik Informatika Universitas Singaperbangsa Karawang, 2016. :
<ul>
	<?php
	$anggota = array(
		'Nama' => 'Jabar Sukmaya, S.Kom',
		'NPM' => '1241177004321',
		'TTL' => '3 Mei 1993',
		'Alamat' => 'Karawang',
		'Pekerjaan' => 'Karyawan',
		
	);
	foreach ($anggota as $npm => $nama) {
		echo "<li>{$nama} &laquo;{$npm}&raquo;</li>";
	}
	?>

</ul>
</div>