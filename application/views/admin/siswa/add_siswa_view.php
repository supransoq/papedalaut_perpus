<script type="text/javascript">
	$( function() {
	$.datepicker.setDefaults( $.datepicker.regional[ "id" ] );
		
		$("#tanggal_lahir"). datepicker({
			showOn: "button",
			buttonImage: "<?php echo base_url(); ?>assets/images/calendar.gif",
			changeMonth: true,
			changeYear: true
		});
	});
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>

<form id="posttambah">
<?php 		
	
	$adaerror = validation_errors();
	
	if ($adaerror) {
	
	echo "<span style='color:red;font-size:18px;font-style:bold;'>";
	echo "Maaf, data isian tidak benar.<br><br>";
	echo $adaerror."</span>";
	
	} else {
	if (isset($notif)){
		echo "<span style='color:blue;font-size:18px;font-style:bold;'>".$notif."</span>";
	}
	}
?>
<table id="one-column-emphasis" summary="2007 Major IT Companies' Profit">
    <colgroup>
    	<col class="oce-first" />
    </colgroup>
    <thead>
    	<tr>
        	<th scope="col">TAMBAH SISWA</th>
            <th scope="col" style="font-size:14px;font-style:bold;">Menu ini digunakan untuk menambah data siswa baru pada sistem<br/><span style='color:red;font-size:14px;font-style:bold;'>  *) Wajib diisi. </span></th>
            <th scope="col"></th>
            
        </tr>
    </thead>
    <tbody>
		<tr>
        	<td></td>
			<td style="font-size:18px;font-style:italic;">Isian Data Diri</td>
        </tr>
    	<tr>
        	<td>NIS : </td>
            <td><input type="text" id="nis" name="nis" style="width: 200px; height: 40px;font-size:20px;font-style:bold;"/><span style='color:red;font-size:12px;font-style:bold;'>  *) </span></td>
        </tr>
		<tr>
        	<td>NISN : </td>
            <td><input type="text" id="nisn" name="nisn" style="width: 300px; height: 40px;font-size:20px;font-style:bold;"/></td>
        </tr>
		<tr>
        	<td>Nama Siswa : </td>
            <td>
				<input type="text" id="nama_depan" name="nama_depan" style="width: 300px; height: 40px;font-size:20px;font-style:bold;"/>
				<span style='color:#039;font-size:12px;font-style:bold;'> Nama Depan</span><span style='color:red;font-size:12px;font-style:bold;'>  *) </span>
				<br>
				<input type="text" id="nama_belakang" name="nama_belakang" style="width: 300px; height: 40px;font-size:20px;font-style:bold;"/>
				<span style='color:#039;font-size:12px;font-style:bold;'> Nama Belakang</span>
				<br>
				<input type="text" id="nama_panggilan" name="nama_panggilan" style="width: 300px; height: 40px;font-size:20px;font-style:bold;"/>
				<span style='color:#039;font-size:12px;font-style:bold;'> Nama Panggilan</span>
			</td>
        </tr>
		<tr>
        	<td>Tempat, Tanggal Lahir : </td>
            <td>
				<input type="text" id="tempat_lahir" name="tempat_lahir" style="width:250px; height: 40px;font-size:20px;font-style:bold;" /><span style='color:red;font-size:12px;font-style:bold;'>  *) </span>
			
				<input type="text" id="tanggal_lahir" name="tanggal_lahir" style="width: 200px; height: 40px;font-size:20px;font-style:bold;"/><span style='color:red;font-size:12px;font-style:bold;'>  *) (YYYY-MM-DD) </span>
			</td>
        </tr>
        <tr>
        	<td>Gender: </td>
            <td><input type="radio" name="gender" id="gender" value="Laki-laki" checked="checked" style="margin:10px" >Laki-laki</input>
			<input type="radio" name="gender" id="gender" value="Perempuan" style="margin:10px" >Perempuan</input>
        </tr>
        <tr>
			<td>Gol. Darah: </td>
            <td>
				<select id="gol_darah" name="gol_darah" style="width: 100px; height: 40px;font-size:20px;font-style:bold;">
				<option value="" class="option">-PILIH-</option>
				
				<?php 
					$enum_grup  = field_enums ('tbl_siswa','gol_darah');
					foreach ($enum_grup as $eg){ ?>
					
					<option class="option" value="<?php echo $eg; ?>">
						<?php echo $eg; ?>
					</option>
					
				<?php }	?>
				</select>
			</td>
        </tr>
		<tr>
			<td>Agama : </td>
            <td>
				<select id="agama" name="agama" style="width: 150px; height: 40px;font-size:20px;font-style:bold;">
				<option value="" class="option">-PILIH-</option>
				
				<?php 
					$enum_grup  = field_enums ('tbl_siswa','agama');
					foreach ($enum_grup as $eg){ ?>
					
					<option class="option" value="<?php echo $eg; ?>">
						<?php echo $eg; ?>
					</option>
					
				<?php }	?>
				</select>
			</td>
        </tr>
		<tr>
        	<td>Suku : </td>
            <td><input type="text" id="suku" name="suku" style="width: 300px; height: 40px;font-size:20px;font-style:bold;"/></td>
        </tr>
		<tr>
			<td>Status Keluarga : </td>
            <td>
				<select id="status_keluarga" name="status_keluarga" style="width: 180px; height: 40px;font-size:20px;font-style:bold;">
				<option value="" class="option">-PILIH-</option>
				
				<?php 
					$enum_grup  = field_enums ('tbl_siswa','status_keluarga');
					foreach ($enum_grup as $eg){ ?>
					
					<option class="option" value="<?php echo $eg; ?>">
						<?php echo $eg; ?>
					</option>
					
				<?php }	?>
				</select>
			</td>
        </tr>
		<tr>
        	<td>Saudara : </td>
            <td>
				<span style='color:#039;font-size:12px;font-style:bold;'> Anak Ke- : </span>
				<input type="text" id="saudara_ke" name="saudara_ke" style="width: 100px; height: 40px;font-size:20px;font-style:bold;"/>
				
				<span style='color:#039;font-size:12px;font-style:bold;'> Jumlah Saudara : </span>
				<input type="text" id="jumlah_saudara" name="jumlah_saudara" style="width: 100px; height: 40px;font-size:20px;font-style:bold;"/>
				
			</td>
        </tr>
		<tr>
			<td>Warga Negara : </td>
            <td>
				<select id="warga_negara" name="warga_negara" style="width: 180px; height: 40px;font-size:20px;font-style:bold;">
				<option value="" class="option">-PILIH-</option>
				
				<?php 
					$enum_grup  = field_enums ('tbl_siswa','warga_negara');
					foreach ($enum_grup as $eg){ ?>
					
					<option class="option" value="<?php echo $eg; ?>">
						<?php echo $eg; ?>
					</option>
					
				<?php }	?>
				</select>
			</td>
        </tr>
		<tr>
        	<td>Alamat Rumah : </td>
            <td><textarea class="alamat_rumah" name="alamat_rumah" style="width: 600px; height: 100px;font-size:20px;font-style:bold;"/><span style='color:red;font-size:12px;font-style:bold;'>  *) </span></td>
        </tr>
		<tr>
        	<td>Kode Pos : </td>
            <td><input type="text" id="kode_pos" name="kode_pos" style="width: 300px; height: 40px;font-size:20px;font-style:bold;"/></td>
        </tr>
		<tr>
        	<td>Nomor Kontak : </td>
            <td>
				<span style='color:#039;font-size:12px;font-style:bold;'> Telepon : </span>
				<input type="text" id="telepon" name="telepon" style="width: 200px; height: 40px;font-size:20px;font-style:bold;"/>
				
				<span style='color:#039;font-size:12px;font-style:bold;'> HP : </span>
				<input type="text" id="no_hp" name="no_hp" style="width: 200px; height: 40px;font-size:20px;font-style:bold;"/>
				
			</td>
        </tr>
		<tr>
        	<td>Jarak : </td>
            <td>
				<select id="jarak" name="jarak" style="width: 180px; height: 40px;font-size:20px;font-style:bold;">
				<option value="" class="option">-PILIH-</option>
				
				<?php 
					$enum_grup  = field_enums ('tbl_siswa','jarak');
					foreach ($enum_grup as $eg){ ?>
					
					<option class="option" value="<?php echo $eg; ?>">
						<?php echo $eg; ?>
					</option>
					
				<?php }	?>
				</select>
			</td>
        </tr>
		<tr>
        	<td></td>
			<td style="font-size:18px;font-style:italic;">Isian Data Orang Tua</td>
        </tr>
		<tr>
        	<td>Nama Ayah : </td>
            <td><input type="text" id="nama_ayah" name="nama_ayah" style="width: 300px; height: 40px;font-size:20px;font-style:bold;"/><span style='color:red;font-size:12px;font-style:bold;'>  *) </span></td>
        </tr>
		<tr>
        	<td>Pekerjaan Ayah : </td>
			<td>
			<select id="pekerjaan_ayah" name="pekerjaan_ayah" style="width: 180px; height: 40px;font-size:20px;font-style:bold;">
				<option value="" class="option">-PILIH-</option>
				
				<?php 
					$enum_grup  = field_enums ('tbl_siswa','pekerjaan_ayah');
					foreach ($enum_grup as $eg){ ?>
					
					<option class="option" value="<?php echo $eg; ?>">
						<?php echo $eg; ?>
					</option>
					
				<?php }	?>
			</select><span style='color:red;font-size:12px;font-style:bold;'>  *) </span>
			</td>
            
        </tr>
		<tr>
        	<td>Penghasilan Ayah : </td>
            <td>
			<select id="penghasilan_ayah" name="penghasilan_ayah" style="width: 180px; height: 40px;font-size:20px;font-style:bold;">
				<option value="" class="option">-PILIH-</option>
				
				<?php 
					$enum_grup  = field_enums ('tbl_siswa','penghasilan_ayah');
					foreach ($enum_grup as $eg){ ?>
					
					<option class="option" value="<?php echo $eg; ?>" >
						<?php echo $eg; ?>
					</option>
					
				<?php }	?>
				</select>
			</td>
        </tr>
		<tr>
        	<td>Nama Ibu : </td>
            <td><input type="text" id="nama_ibu" name="nama_ibu" style="width: 300px; height: 40px;font-size:20px;font-style:bold;"/><span style='color:red;font-size:12px;font-style:bold;'>  *) </span></td>
        </tr>
		<tr>
        	<td>Pekerjaan Ibu : </td>
			<td>
			<select id="pekerjaan_ibu" name="pekerjaan_ibu" style="width: 200px; height: 40px;font-size:20px;font-style:bold;">
				<option value="" class="option">-PILIH-</option>
				
				<?php 
					$enum_grup  = field_enums ('tbl_siswa','pekerjaan_ibu');
					foreach ($enum_grup as $eg){ ?>
					
					<option class="option" value="<?php echo $eg; ?>" >
						<?php echo $eg; ?>
					</option>
					
				<?php }	?>
			</select>
			</td>
			
        </tr>
		<tr>
        	<td>Penghasilan Ibu : </td>
            <td>
			<select id="penghasilan_ibu" name="penghasilan_ibu" style="width: 180px; height: 40px;font-size:20px;font-style:bold;">
				<option value="" class="option">-PILIH-</option>
				
				<?php 
					$enum_grup  = field_enums ('tbl_siswa','penghasilan_ibu');
					foreach ($enum_grup as $eg){ ?>
					
					<option class="option" value="<?php echo $eg; ?>" <?php if(isset ($siswa['penghasilan_ibu'])&&($siswa['penghasilan_ibu']==$eg)){echo "selected=\"selected\"";}?>>
						<?php echo $eg; ?>
					</option>
					
				<?php }	?>
			</select>
			</td>
        </tr>
		<tr>
        	<td></td>
			<td></td>
        </tr>
		<tr>
			<td>Kendaraan : </td>
            <td>
				<select id="kendaraan" name="kendaraan" style="width: 180px; height: 40px;font-size:20px;font-style:bold;">
				<option value="" class="option">-PILIH-</option>
				
				<?php 
					$enum_grup  = field_enums ('tbl_siswa','kendaraan');
					foreach ($enum_grup as $eg){ ?>
					
					<option class="option" value="<?php echo $eg; ?>">
						<?php echo $eg; ?>
					</option>
					
				<?php }	?>
				</select>
			</td>
        </tr>
		<tr>
			<td>Foto : </td>
            <td>
				<?php echo form_open_multipart('upload/do_upload');?>

				<input type="file" name="foto" size="20" />
				</form>
        </tr>
		<tr>
        	<td>Keterangan : </td>
            <td><textarea class="ckeditor" name="keterangan" style="width: 600px; height: 100px;font-size:20px;font-style:bold;"/></td>
        </tr>
		<tr>
			<td></td>
        	<td><input type="button" value="Simpan" onclick="simpan_tambah();" style="width: 200px; height: 40px;font-size:20px;font-style:bold;"/><input type="reset" value="Reset" onclick="" style="width: 200px; height: 40px;font-size:20px;font-style:bold;"/><input type="button" value="Kembali" onclick="javascript:browse();" style="width: 200px; height: 40px;font-size:20px;font-style:bold;"/></td>
        	
        </tr>
    </tbody>
</table>
</form>