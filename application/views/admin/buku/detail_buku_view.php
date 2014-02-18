

<form id="detail">
<table id="one-column-emphasis" summary="2007 Major IT Companies' Profit">
    <colgroup>
    	<col class="oce-first" />
    </colgroup>
    <thead>
    	<tr>
        	<th scope="col">LIHAT DATA BUKU</th>
            <th scope="col" style="font-size:14px;font-style:bold;">Menu ini digunakan untuk melihat data buku pada sistem<br></th>
            <th scope="col"></th>
            
        </tr>
    </thead>
    <tbody>
		<tr>
        	<td></td>
			<td style="font-size:18px;font-style:italic;">Detail Data Buku</td>
        </tr>
		<tr>
        	<td>Kode Buku :</td>
            <td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo $buku['kode_buku'];?></span></td>			
        </tr>
		<tr>
        	<td>Prioritas Buku: </td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo $buku['prioritas_buku'];?></span></td>
			
        </tr>
		<tr>
        	<td>Judul Buku :</td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo $buku['judul_buku'];?></span></td>
        </tr>
		<tr>
        	<td>Subjek : DALAM PERUBAHAN</td>
            <td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo $buku['subjek'];?></span></td>
        </tr>
		
		<tr>
        	<td>Penulis : </td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo $buku['penulis'];?></span></td>
        </tr>
		
		<tr>
        	<td>Penerbit : </td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo $buku['penerbit'];?></span></td>
        </tr>
		
		<tr>
        	<td>Tahun Terbit : </td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo $buku['tahun_terbit'];?></span></td>
        </tr>
		
		<tr>
			<td>Bahasa : </td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo $buku['bahasa'];?></span></td>
			
        </tr>
		<tr>
        	<td>Dimensi : </td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo "P : ".$buku['panjang']."cm <br/>"; echo "L : ".$buku['lebar']."cm";?></span></td>
        </tr>
		<tr>
        	<td>ISBN : </td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo $buku['ISBN'];?></span></td>
        </tr>
		<tr>
        	<td>Cetakan : </td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo $buku['cetakan'];?></span></td>
        </tr>
		<tr>
        	<td>Keterangan : </td>
			<td><span style="color:#000; width: 200px; height: 40px;font-size:20px;font-style:bold;"> <?php echo $buku['keterangan'];?></span></td>
        </tr>
		
		
		<tr>
			<td></td>
        	<td><input type="button" value="Ubah" onclick="javascript:edit(<?php echo $buku['kode_buku']; ?>)" style="width: 200px; height: 40px;font-size:20px;font-style:bold;"/><input type="button" value="Kembali" onclick="javascript:browse();" style="width: 200px; height: 40px;font-size:20px;font-style:bold;"/></td>
        	
        </tr>
    </tbody>
</table>
</form>