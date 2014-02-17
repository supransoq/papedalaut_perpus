<form id="postdata">

<table id="rounded-corner" summary="2007 Major IT Companies' Profit">
<thead>
	<tr>
		<th scope="col" class="rounded-company">No.</th>
		<th scope="col" class="rounded-q1">Mark</th>
		<th scope="col" class="rounded-q2">Kode Buku</th>
		<th scope="col" class="rounded-q2">Judul Buku </th>
		<th scope="col" class="rounded-q3">Penulis</th>
		<th scope="col" class="rounded-q3">Penerbit</th>
		<th scope="col" class="rounded-q3">Tahun</th>
		
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
		foreach($buku as $row){
		
			echo "<tr>";
			echo "<td>".$seq."</td>";
			echo "<td><input type='checkbox' class='cek' name='".$row['kode_buku']."' onclick='cek();' /></td>";
			echo "<td>".$row['kode_buku']."</td>";
			echo "<td>".$row['judul_buku']."</td>";
			
			echo "<td>".$row['penulis']."</td>";
			echo "<td>".$row['penerbit']."</td>";
			echo "<td>".$row['tahun_terbit']."</td>";
			
			
			echo "<td><a href='javascript:lihat(\"".$row['kode_buku']."\")'>Lihat</a> | <a href='javascript:edit(\"".$row['kode_buku']."\")'>Ubah</a> | <a href='javascript:hapus(\"".$row['kode_buku']."\")'>Hapus</a></td>";
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