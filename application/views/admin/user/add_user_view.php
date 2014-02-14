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
        	<th scope="col">TAMBAH USER</th>
            <th scope="col" style="font-size:14px;font-style:italic;">Menu ini digunakan untuk menambah user baru pada sistem.<br/><span style='color:red;font-size:14px;font-style:bold;'>  *) Wajib diisi. </span></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            
        </tr>
    </thead>
    <tbody>
    	<tr>
        	<td>Username : </td>
            <td><input type="text" id="username" name="username" style="width: 300px; height: 40px;font-size:20px;font-style:bold;"/><span style='color:red;font-size:12px;font-style:bold;'>  *) </span></td>
        </tr>
		<tr>
        	<td>Password : </td>
            <td><input type="password" id="password" name="password" style="width: 450px; height: 40px;font-size:20px;font-style:bold;"/><span style='color:red;font-size:12px;font-style:bold;'>  *) </span></td>
        </tr>
		<tr>
        	<td>Ketik Ulang Password : </td>
            <td><input type="password" id="password2" name="password2" style="width: 450px; height: 40px;font-size:20px;font-style:bold;"/><span style='color:red;font-size:12px;font-style:bold;'>  *) </span></td>
        </tr>
        <tr>
        	<td></td>
        	<td><span style="color:red;font-size:12px;font-style:italic;">(Isi dengan Password yang sama)</span></td>
        </tr>
        <tr>
        	<td>Nama User : </td>
            <td><input type="text" id="nama_user" name="nama_user" style="width: 580px; height: 40px;font-size:20px;font-style:bold;"/><span style='color:red;font-size:12px;font-style:bold;'>  *) </span></td>
        </tr>
        <tr>
        	<td>Otentikasi User: </td>
            <td><input type="radio" name="status_otentikasi" id="status_otentikasi" value="1" checked="checked" style="margin:10px" >Aktif</input>
			<input type="radio" name="status_otentikasi" id="status_otentikasi" value="0" style="margin:10px" >non-Aktif</input>
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