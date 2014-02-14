

<form id="detail">
<table id="one-column-emphasis" summary="2007 Major IT Companies' Profit">
    <colgroup>
    	<col class="oce-first" />
    </colgroup>
    <thead>
    	<tr>
        	<th scope="col">LIHAT DATA SISWA</th>
            <th scope="col" style="font-size:14px;font-style:bold;">Menu ini digunakan untuk melihat data siswa pada sistem<br><span style='color:red;font-size:14px;font-style:bold;'>  *) Wajib diisi. </span></th>
            <th scope="col"></th>
            
        </tr>
    </thead>
    <tbody>
		<tr>
        	<td></td>
			<td style="font-size:18px;font-style:italic;">Isian Data Diri</td>
        </tr>
		<tr>
			<td>Foto : </td>
			<td></td>
        </tr>
    	<tr>
        	<td>NIS/NISN : </td>
            <td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo $siswa['nis']." / ".$siswa['nisn']; ?></span></td>
        </tr>
		<tr>
        	<td>Nama Siswa : </td>
            <td>
				<span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo strtoupper($siswa['nama_depan']." ".$siswa['nama_belakang']." (".$siswa['nama_panggilan'].")"); ?></span>
			</td>
        </tr>
		<tr>
        	<td>Tempat, Tanggal Lahir : </td>
			<td>
				<span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> 
				<?php 
					$unix = mysql_to_unix($siswa['tanggal_lahir']); //conversion to string
					$datestring = "%d-%m-%Y";
					// echo mdate($datestring, $unix);
					echo $siswa['tempat_lahir'].", ".mdate($datestring, $unix); 
				?></span>
			</td>
        </tr>
        <tr>
        	<td>Gender: </td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo $siswa['gender']; ?></span></td>
        </tr>
        <tr>
			<td>Gol. Darah: </td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo $siswa['gol_darah']; ?></span></td>
        </tr>
		<tr>
			<td>Agama : </td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo $siswa['agama']; ?></span></td>
        </tr>
		<tr>
        	<td>Suku : </td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo $siswa['suku']; ?></span></td>
        </tr>
		<tr>
			<td>Status Keluarga : </td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo $siswa['status_keluarga']; ?></span></td>
        </tr>
		<tr>
        	<td>Saudara : </td>
			<td>
				<span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo "Anak ke- ".$siswa['saudara_ke']." dari ".$siswa['jumlah_saudara']." bersaudara"; ?></span>
			</td>
        </tr>
		<tr>
			<td>Warga Negara : </td>
			<td>
				<span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> 
					<?php 
						if ($siswa['warga_negara'] == "WNI") {
							echo "Warga Negara Indonesia";
						} else {
							echo "Warga Negara Asing";
						}
					?>
				</span>
			</td>
        </tr>
		<tr>
        	<td>Alamat Rumah : </td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo $siswa['alamat_rumah'].", Kode Pos ".$siswa['kode_pos']; ?></span></td>
        </tr>
		<tr>
        	<td>Nomor Kontak : </td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo "Telepon : ".$siswa['telepon'].", No. HP : ".$siswa['no_hp']; ?></span></td>
        </tr>
		<tr>
        	<td>Jarak : </td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo $siswa['jarak']; ?></span></td>
        </tr>
		<tr>
        	<td></td>
			<td style="font-size:18px;font-style:italic;">Isian Data Orang Tua</td>
        </tr>
		<tr>
        	<td>Nama Ayah : </td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo strtoupper($siswa['nama_ayah']); ?></span></td>
        </tr>
		<tr>
        	<td>Pekerjaan Ayah : </td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo $siswa['pekerjaan_ayah']; ?></span></td>
        </tr>
		<tr>
        	<td>Penghasilan Ayah : </td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo $siswa['penghasilan_ayah']; ?></span></td>
        </tr>
		<tr>
        	<td>Nama Ibu : </td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo strtoupper($siswa['nama_ibu']); ?></span></td>
        </tr>
		<tr>
        	<td>Pekerjaan Ibu : </td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo $siswa['pekerjaan_ibu']; ?></span></td>
        </tr>
		<tr>
        	<td>Penghasilan Ibu : </td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo $siswa['penghasilan_ibu']; ?></span></td>
        </tr>
		<tr>
        	<td></td>
			<td></td>
        </tr>
		<tr>
			<td>Kendaraan : </td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo $siswa['kendaraan']; ?></span></td>
        </tr>
		
		<tr>
        	<td>Keterangan : </td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo $siswa['keterangan']; ?></span></td>
        </tr>
		<tr>
			<td></td>
        	<td><input type="button" value="Ubah" onclick="javascript:edit(<?php echo $siswa['nis']; ?>)" style="width: 200px; height: 40px;font-size:20px;font-style:bold;"/><input type="button" value="Kembali" onclick="javascript:browse();" style="width: 200px; height: 40px;font-size:20px;font-style:bold;"/></td>
        	
        </tr>
    </tbody>
</table>
</form>