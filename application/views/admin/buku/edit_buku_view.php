
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
        	<th scope="col">UBAH BUKU</th>
            <th scope="col" style="font-size:14px;font-style:bold;">Menu ini digunakan untuk mengubah data buku baru pada sistem<br/><span style='color:red;font-size:14px;font-style:bold;'>  *) Wajib diisi. </span></th>
            <th scope="col"></th>
            
        </tr>
    </thead>
    <tbody>
		<tr>
        	<td></td>
			<td style="font-size:18px;font-style:italic;">Isian Data Buku</td>
        </tr>
    	<tr>
        	<td>Kode Buku :</td>
            <td><input type="text" id="kode_buku" name="kode_buku" value="<?php echo $buku['kode_buku']; ?>" style="width: 200px; height: 40px;font-size:20px;font-style:bold;"/><span style='color:red;font-size:12px;font-style:bold;'>  *) </span></td>
        </tr>
		<tr>
        	<td>Prioritas Buku: </td>
            <td>
				<select id="prioritas_buku" name="prioritas_buku" style="width: 120px; height: 40px;font-size:20px;font-style:bold;">
				<option value="" class="option">-PILIH-</option>
				
				<?php 
					$enum_grup  = field_enums ('tbl_buku','prioritas_buku');
					foreach ($enum_grup as $eg){ ?>
					
					<option class="option" value="<?php echo $eg; ?>" <?php if(isset ($buku['prioritas_buku'])&&($buku['prioritas_buku']==$eg)){echo "selected=\"selected\"";}?>>
						<?php echo $eg; ?>
					</option>
					
				<?php }	?>
				</select>
			<span style='color:red;font-size:12px;font-style:bold;'>  *) </span></td>
        </tr>
		<tr>
        	<td>Judul Buku :</td>
            <td><input type="text" id="judul_buku" name="judul_buku" value="<?php echo $buku['judul_buku']; ?>" style="width: 500px; height: 40px;font-size:20px;font-style:bold;"/><span style='color:red;font-size:12px;font-style:bold;'>  *) </span></td>
        </tr>
		<tr>
        	<td>Subjek : DALAM PERUBAHAN</td>
            <td>
				<?php 
				$enum_grup  = field_enums ('tbl_buku','subjek');
				foreach ($enum_grup as $eg){ 
					echo "<input type=\"checkbox\" id=\"subjek\" name=\"subjek\" >".$eg."</input> <br/>";
				}	?>
				
			</td>
        </tr>
		
		<tr>
        	<td>Penulis : </td>
            <td><input type="text" id="penulis" name="penulis" value="<?php echo $buku['penulis']; ?>" style="width: 300px; height: 40px;font-size:20px;font-style:bold;"/><span style='color:red;font-size:12px;font-style:bold;'>  *) </span></td>
        </tr>
		
		<tr>
        	<td>Penerbit : </td>
            <td><input type="text" id="penerbit" name="penerbit" value="<?php echo $buku['penerbit']; ?>" style="width: 300px; height: 40px;font-size:20px;font-style:bold;"/><span style='color:red;font-size:12px;font-style:bold;'>  *) </span></td>
        </tr>
		
		<tr>
        	<td>Tahun Terbit : </td>
            <td><input type="text" id="tahun_terbit" name="tahun_terbit" value="<?php echo $buku['tahun_terbit']; ?>" style="width: 80px; height: 40px;font-size:20px;font-style:bold;"/><span style='color:red;font-size:12px;font-style:bold;'>  *) </span></td>
        </tr>
		
		<tr>
			<td>Bahasa : </td>
            <td>
				<select id="bahasa" name="bahasa" style="width: 130px; height: 40px;font-size:20px;font-style:bold;">
				<option value="" class="option">-PILIH-</option>
				
				<?php 
					$enum_grup  = field_enums ('tbl_buku','bahasa');
					foreach ($enum_grup as $eg){ ?>
					
					<option class="option" value="<?php echo $eg; ?>" <?php if(isset ($buku['bahasa'])&&($buku['bahasa']==$eg)){echo "selected=\"selected\"";}?>>
						<?php echo $eg; ?>
					</option>
					
				<?php }	?>
				</select>
			</td>
        </tr>
		<tr>
        	<td>Dimensi : </td>
            <td>
				<input type="text" id="panjang" name="panjang" value="<?php echo $buku['panjang']; ?>" style="width: 100px; height: 40px;font-size:20px;font-style:bold;"/>
				<span style='color:#039;font-size:12px;font-style:bold;'> Panjang Buku</span>
				<br>
				<input type="text" id="lebar" name="lebar" value="<?php echo $buku['lebar']; ?>" style="width: 100px; height: 40px;font-size:20px;font-style:bold;"/>
				<span style='color:#039;font-size:12px;font-style:bold;'> Lebar Buku</span>
				<br>
				
			</td>
        </tr>
		<tr>
        	<td>ISBN : </td>
            <td><input type="text" id="ISBN" name="ISBN" value="<?php echo $buku['ISBN']; ?>" style="width: 300px; height: 40px;font-size:20px;font-style:bold;"/></td>
        </tr>
		<tr>
        	<td>Cetakan : </td>
            <td><input type="text" id="cetakan" name="cetakan" value="<?php echo $buku['cetakan']; ?>" style="width: 250px; height: 40px;font-size:20px;font-style:bold;"/></td>
        </tr>
		<tr>
        	<td>Keterangan : </td>
            <td><textarea  name="keterangan" value="" style="width: 600px; height: 100px;font-size:20px;font-style:bold;"><?php echo $buku['keterangan']; ?></textarea></td>
        </tr>
		<tr>
			<td></td>
        	<td><input type="button" value="Ubah" onclick="simpan_edit();" style="width: 200px; height: 40px;font-size:20px;font-style:bold;"/><input type="button" value="Kembali" onclick="javascript:browse();" style="width: 200px; height: 40px;font-size:20px;font-style:bold;"/></td>
        	
        </tr>
    </tbody>
</table>
</form>