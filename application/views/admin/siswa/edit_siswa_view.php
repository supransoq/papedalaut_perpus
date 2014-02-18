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

<form id="postedit">
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
        	<th scope="col">UBAH SISWA</th>
            <th scope="col" style="font-size:14px;font-style:bold;">Menu ini digunakan untuk mengubah data siswa pada sistem<br><span style='color:red;font-size:14px;font-style:bold;'>  *) Wajib diisi. </span></th>
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
            <td><input type="text" id="nis" name="nis" value="<?php echo $siswa['nis']; ?>" style="width: 200px; height: 40px;font-size:20px;font-style:bold;"/><span style='color:red;font-size:12px;font-style:bold;'>  *) </span></td>
        </tr>
		<tr>
        	<td>NISN : </td>
            <td><input type="text" id="nisn" name="nisn" value="<?php echo $siswa['nisn']; ?>" style="width: 300px; height: 40px;font-size:20px;font-style:bold;"/></td>
        </tr>
		<tr>
        	<td>Nama Siswa : </td>
            <td>
				<input type="text" id="nama_depan" name="nama_depan" value="<?php echo $siswa['nama_depan']; ?>" style="width: 300px; height: 40px;font-size:20px;font-style:bold;"/>
				<span style='color:#039;font-size:12px;font-style:bold;'> Nama Depan</span><span style='color:red;font-size:12px;font-style:bold;'>  *) </span>
				<br>
				<input type="text" id="nama_belakang" name="nama_belakang" value="<?php echo $siswa['nama_belakang']; ?>" style="width: 300px; height: 40px;font-size:20px;font-style:bold;"/>
				<span style='color:#039;font-size:12px;font-style:bold;'> Nama Belakang</span>
				<br>
				<input type="text" id="nama_panggilan" name="nama_panggilan" value="<?php echo $siswa['nama_panggilan']; ?>" style="width: 300px; height: 40px;font-size:20px;font-style:bold;"/>
				<span style='color:#039;font-size:12px;font-style:bold;'> Nama Panggilan</span>
			</td>
        </tr>
		<tr>
        	<td>Tempat, Tanggal Lahir : </td>
            <td>
				<input type="text" id="tempat_lahir" name="tempat_lahir" value="<?php echo $siswa['tempat_lahir']; ?>" style="width:250px; height: 40px;font-size:20px;font-style:bold;" /><span style='color:red;font-size:12px;font-style:bold;'>  *) </span>
			
				<input type="text" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $siswa['tanggal_lahir']; ?>" style="width: 200px; height: 40px;font-size:20px;font-style:bold;"/><span style='color:red;font-size:12px;font-style:bold;'>  *) (YYYY-MM-DD)</span>
			</td>
        </tr>
        <tr>
        	<td>Gender: </td>
            <td>
			<?php if (isset ($siswa['gender'])&& $siswa['gender']==1) {?>
								
								
				<input type="radio" name="gender" id="gender" value="1" checked="checked" style="margin:10px" >Laki-Laki</input>
				<input type="radio" name="gender" id="gender" value="0" style="margin:10px" >Perempuan</input>
					
			<?php } else { ?>
					
					
				<input type="radio" name="gender" id="gender" value="1"  style="margin:10px" >Laki-Laki</input>
				<input type="radio" name="gender" id="gender" value="0" checked="checked"style="margin:10px" >Perempuan</input>
					
				<?php } ?>
			</td>
        </tr>
        <tr>
			<td>Golongan Darah: </td>
            <td>
				<select id="gol_darah" name="gol_darah" style="width: 100px; height: 40px;font-size:20px;font-style:bold;">
				<option value="" class="option">-PILIH-</option>
				
				<?php 
					$enum_grup  = field_enums ('tbl_siswa','gol_darah');
					foreach ($enum_grup as $eg){ ?>
					
					<option class="option" value="<?php echo $eg; ?>" <?php if(isset ($siswa['gol_darah'])&&($siswa['gol_darah']==$eg)){echo "selected=\"selected\"";}?>>
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
					
					<option class="option" value="<?php echo $eg; ?>" <?php if(isset ($siswa['agama'])&&($siswa['agama']==$eg)){echo "selected=\"selected\"";}?>>
						<?php echo $eg; ?>
					</option>
					
				<?php }	?>
				</select>
			</td>
        </tr>
		<tr>
        	<td>Suku : </td>
            <td><input type="text" id="suku" name="suku" value="<?php echo $siswa['suku']; ?>" style="width: 300px; height: 40px;font-size:20px;font-style:bold;"/></td>
        </tr>
		<tr>
			<td>Status Keluarga : </td>
            <td>
				<select id="status_keluarga" name="status_keluarga" style="width: 180px; height: 40px;font-size:20px;font-style:bold;">
				<option value="" class="option">-PILIH-</option>
				
				<?php 
					$enum_grup  = field_enums ('tbl_siswa','status_keluarga');
					foreach ($enum_grup as $eg){ ?>
					
					<option class="option" value="<?php echo $eg; ?>" <?php if(isset ($siswa['status_keluarga'])&&($siswa['status_keluarga']==$eg)){echo "selected=\"selected\"";}?>>
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
				<input type="text" id="saudara_ke" name="saudara_ke" value="<?php echo $siswa['saudara_ke']; ?>" style="width: 100px; height: 40px;font-size:20px;font-style:bold;"/>
				
				<span style='color:#039;font-size:12px;font-style:bold;'> Jumlah Saudara : </span>
				<input type="text" id="jumlah_saudara" name="jumlah_saudara" value="<?php echo $siswa['jumlah_saudara']; ?>" style="width: 100px; height: 40px;font-size:20px;font-style:bold;"/>
				
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
					
					<option class="option" value="<?php echo $eg; ?>" <?php if(isset ($siswa['warga_negara'])&&($siswa['warga_negara']==$eg)){echo "selected=\"selected\"";}?>>
						<?php echo $eg; ?>
					</option>
					
				<?php }	?>
				</select>
			</td>
        </tr>
		<tr>
        	<td>Alamat Rumah : </td>
            <td><textarea class="alamat_rumah" name="alamat_rumah" style="width: 600px; height: 100px;font-size:20px;font-style:bold;"><?php echo $siswa['alamat_rumah']; ?></textarea><span style='color:red;font-size:12px;font-style:bold;'>  *) </span></td>
        </tr>
		<tr>
        	<td>Kode Pos : </td>
            <td><input type="text" id="kode_pos" name="kode_pos"  value="<?php echo $siswa['kode_pos']; ?>" style="width: 300px; height: 40px;font-size:20px;font-style:bold;"/></td>
        </tr>
		<tr>
        	<td>Nomor Kontak : </td>
            <td>
				<span style='color:#039;font-size:12px;font-style:bold;'> Telepon : </span>
				<input type="text" id="telepon" name="telepon" value="<?php echo $siswa['telepon']; ?>"style="width: 200px; height: 40px;font-size:20px;font-style:bold;"/>
				
				<span style='color:#039;font-size:12px;font-style:bold;'> HP : </span>
				<input type="text" id="no_hp" name="no_hp" value="<?php echo $siswa['no_hp']; ?>" style="width: 200px; height: 40px;font-size:20px;font-style:bold;"/>
				
			</td>
        </tr>
		<tr>
        	<td>Jarak ke Sekolah : </td>
            <td>
				<select id="jarak" name="jarak" style="width: 180px; height: 40px;font-size:20px;font-style:bold;">
				<option value="" class="option">-PILIH-</option>
				
				<?php 
					$enum_grup  = field_enums ('tbl_siswa','jarak');
					foreach ($enum_grup as $eg){ ?>
					
					<option class="option" value="<?php echo $eg; ?>" <?php if(isset ($siswa['jarak'])&&($siswa['jarak']==$eg)){echo "selected=\"selected\"";}?>>
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
            <td><input type="text" id="nama_ayah" name="nama_ayah" value="<?php echo $siswa['nama_ayah']; ?>"style="width: 300px; height: 40px;font-size:20px;font-style:bold;"/><span style='color:red;font-size:12px;font-style:bold;'>  *) </span></td>
        </tr>
		<tr>
        	<td>Pekerjaan Ayah : </td>
            <td>
			<select id="pekerjaan_ayah" name="pekerjaan_ayah" style="width: 180px; height: 40px;font-size:20px;font-style:bold;">
				<option value="" class="option">-PILIH-</option>
				
				<?php 
					$enum_grup  = field_enums ('tbl_siswa','pekerjaan_ayah');
					foreach ($enum_grup as $eg){ ?>
					
					<option class="option" value="<?php echo $eg; ?>" <?php if(isset ($siswa['pekerjaan_ayah'])&&($siswa['pekerjaan_ayah']==$eg)){echo "selected=\"selected\"";}?>>
						<?php echo $eg; ?>
					</option>
					
				<?php }	?>
			</select>
			<span style='color:red;font-size:12px;font-style:bold;'>  *) </span>
			</td>
        </tr>

		<tr>
        	<td>Nama Ibu : </td>
            <td><input type="text" id="nama_ibu" name="nama_ibu" value="<?php echo $siswa['nama_ibu']; ?>"style="width: 300px; height: 40px;font-size:20px;font-style:bold;"/><span style='color:red;font-size:12px;font-style:bold;'>  *) </span></td>
        </tr>
		<tr>
        	<td>Pekerjaan Ibu : </td>
			<td>
			<select id="pekerjaan_ibu" name="pekerjaan_ibu" style="width: 200px; height: 40px;font-size:20px;font-style:bold;">
				<option value="" class="option">-PILIH-</option>
				<?php 
					$enum_grup  = field_enums ('tbl_siswa','pekerjaan_ibu');
					foreach ($enum_grup as $eg){ ?>
					
					<option class="option" value="<?php echo $eg; ?>" <?php if(isset ($siswa['pekerjaan_ibu'])&&($siswa['pekerjaan_ibu']==$eg)){echo "selected=\"selected\"";}?>>
						<?php echo $eg; ?>
					</option>
					
				<?php }	?>
			</select>
			</td>
        </tr>
		<tr>
        	<td>Penghasilan Orang Tua : </td>
            <td>
			<select id="penghasilan_ortu" name="penghasilan_ortu" style="width: 230px; height: 40px;font-size:20px;font-style:bold;">
				<option value="" class="option">-PILIH-</option>
				<?php 
					$enum_grup  = field_enums ('tbl_siswa','penghasilan_ortu');
					foreach ($enum_grup as $eg){ ?>
					
					<option class="option" value="<?php echo $eg; ?>" <?php if(isset ($siswa['penghasilan_ortu'])&&($siswa['penghasilan_ortu']==$eg)){echo "selected=\"selected\"";}?>>
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
					
					<option class="option" value="<?php echo $eg; ?>" <?php if(isset ($siswa['kendaraan'])&&($siswa['kendaraan']==$eg)){echo "selected=\"selected\"";}?>>
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
            <td><textarea  name="keterangan" value="" style="width: 600px; height: 100px;font-size:20px;font-style:bold;"><?php echo $siswa['keterangan']; ?></textarea></td>
        </tr>
		<tr>
			<td></td>
        	<td><input type="button" value="Ubah" onclick="simpan_edit();" style="width: 200px; height: 40px;font-size:20px;font-style:bold;"/><input type="button" value="Kembali" onclick="javascript:browse();" style="width: 200px; height: 40px;font-size:20px;font-style:bold;"/></td>
        	
        </tr>
    </tbody>
</table>
</form>