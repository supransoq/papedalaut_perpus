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
		<th scope="col" class="rounded-q2">Username</th>
		<th scope="col" class="rounded-q3">Nama User</th>
		<th scope="col" class="rounded-q3">Status</th>
		<th scope="col" class="rounded-q3">Keterangan</th>
		<th scope="col" class="rounded-q3">Tanggal Daftar</th>
		
		<th scope="col" class="rounded-q4">AKSI</th>
	</tr>
</thead>
	<tfoot>
	<tr>
		<td colspan="7" class="rounded-foot-left"><em>Pagination : <?php echo $pagination; ?></em></td>
		<td class="rounded-foot-right">&nbsp;</td>
	</tr>
</tfoot>

<tbody>
	<tr>
	<?php
		$seq = 1;
		foreach($user as $row){
		
			echo "<tr>";
			echo "<td>".$seq."</td>";
			echo "<td><input type='checkbox' class='cek' name='".$row['username']."' onclick='cek();' /></td>";
			echo "<td>".$row['username']."</td>";
			echo "<td>".$row['nama_user']."</td>";
			
			if ($row['status_otentikasi']== 1) { ?> 
			<td>
			<img src="<?php echo base_url(); ?>assets/images/Button Check-01.png" title="Sudah Otentikasi" />
			</td>
			<?php } else { ?>
			<td>	
			<img src="<?php echo base_url(); ?>assets/images/Button Close-01.png" title="Belum Otentikasi" />
			</td>
			<?php }; 
			
			$unix = mysql_to_unix($row['tgl_daftar']); //conversion to string
			$datestring = "%d-%m-%Y";
			
			
				if (strlen($row['keterangan']) >= 30) {
					echo "<td>".substr($row['keterangan'],0,10)."...</td>";
				} else {
					echo "<td>".$row['keterangan']."</td>";
				}
			
			// echo "<td>".$row['keterangan']."</td>";
			
			echo "<td>".mdate($datestring, $unix)."</td>";
			
			echo "<td><a href='javascript:edit(\"".$row['username']."\")'>Ubah</a> | <a href='javascript:hapus(\"".$row['username']."\")'>Hapus</a></td>";
			$seq++;
		}
	?>
	</tr>
	<tr>
		<td colspan="8"></td>
	</tr>
	<tr>
		<td colspan="8"><a href="javascript:hapussemua();">Hapus Semua</a></td>
	</tr>
</tbody>
</table>
<br>


</form>