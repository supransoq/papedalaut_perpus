<form id="postdata">


<?php 		
	
	$adaerror = validation_errors();
	
	if ($adaerror) {
	
	echo "<span style='color:red;font-size:18px;font-style:bold;'>";
	echo "Maaf, data isian tidak benar.<br><br>";
	echo $adaerror."</span>";
	
	} else {
	echo "<span style='color:blue;font-size:18px;font-style:bold;'>".$notif."</span>";
	}
?>


<table id="rounded-corner" summary="2007 Major IT Companies' Profit">
<thead>
	<tr>
		<th scope="col" class="rounded-company">No.</th>
		<th scope="col" class="rounded-q1">Mark</th>
		<th scope="col" class="rounded-q2">NIS</th>
		<th scope="col" class="rounded-q2">NISN </th>
		<th scope="col" class="rounded-q3">Nama Siswa</th>
		
		<th scope="col" class="rounded-q3">Tanggal Daftar</th>
		
		<th scope="col" class="rounded-q4">AKSI</th>
	</tr>
</thead>
	<tfoot>
	<tr>
		<td colspan="6" class="rounded-foot-left"><em>Pagination : <?php echo $pagination; ?></em></td>
		<td class="rounded-foot-right">&nbsp;</td>
	</tr>
</tfoot>

<tbody>
	<tr>
	<?php
		$seq = 1;
		foreach($siswa as $row){
		
			echo "<tr>";
			echo "<td>".$seq."</td>";
			echo "<td><input type='checkbox' class='cek' name='".$row['nis']."' onclick='cek();' /></td>";
			echo "<td>".$row['nis']."</td>";
			echo "<td>".$row['nisn']."</td>";
			echo "<td>".$row['nama_depan']." ".$row['nama_belakang']."</td>";
			
				// if (strlen($row['keterangan']) >= 30) {
					// echo "<td>".substr($row['keterangan'],0,10)."...</td>";
				// } else {
					// echo "<td>".$row['keterangan']."</td>";
				// }
			
			$unix = mysql_to_unix($row['tgl_daftar_siswa']); //conversion to string
			$datestring = "%d-%m-%Y";
			// echo mdate($datestring, $unix);
			
			echo "<td>".mdate($datestring, $unix)."</td>";
			
			
			echo "<td><a href='javascript:lihat(\"".$row['nis']."\")'>Lihat</a> | <a href='javascript:edit(\"".$row['nis']."\")'>Ubah</a> | <a href='javascript:hapus(\"".$row['nis']."\")'>Hapus</a></td>";
			$seq++;
		}
	?>
	</tr>
	<tr>
		<td colspan="7"></td>
	</tr>
	<tr>
		<td colspan="7"><a href="javascript:hapussemua();">Hapus Semua</a></td>
	</tr>
</tbody>
</table>
<br>


</form>