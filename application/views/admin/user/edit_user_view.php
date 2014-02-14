<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>

<form id="postedit">
<table id="one-column-emphasis" summary="2007 Major IT Companies' Profit">
    <colgroup>
    	<col class="oce-first" />
    </colgroup>
    <thead>
    	<tr>
        	<th scope="col" style="font-style:bold;">UBAH USER</th>
            <th scope="col" style="font-size:14px;font-style:italic;">Menu ini digunakan untuk mengubah user pada sistem</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            
        </tr>
    </thead>
    <tbody>
    	<tr>
        	<td>Username : </td>
            <td><input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" style="width: 300px; height: 40px;font-size:20px;font-style:bold;"/></td>
        </tr>
		<tr>
        	<td>Password Baru : </td>
            <td><input type="password" id="password" name="password" value="" style="width: 450px; height: 40px;font-size:20px;font-style:bold;"/></td>
        </tr>
		<tr>
        	<td>Ketik Ulang Password Baru: </td>
            <td><input type="password" id="password2" name="password2" value="" style="width: 450px; height: 40px;font-size: 20px;font-style: bold;"/></td>
        </tr>
        <tr>
        	<td></td>
        	<td><span style="color:red;font-size:12px;font-style:italic;">(Kosongkan bila tidak ingin mengganti password)</span></td>
        </tr>
        <tr>
        	<td>Nama User : </td>
            <td><input type="text" id="nama_user" name="nama_user" value="<?php echo $user['nama_user']; ?>"style="width: 600px; height: 40px;font-size:20px;font-style:bold;"/></td>
        </tr>
        <tr>
        	<td>Otentikasi User: </td>
            <td>
			<?php if (isset ($user['status_otentikasi'])&& $user['status_otentikasi']==1) {?>
								
								
				<input type="radio" name="status_otentikasi" id="status_otentikasi" value="1" checked="checked" style="margin:10px" >Aktif</input>
				<input type="radio" name="status_otentikasi" id="status_otentikasi" value="0" style="margin:10px" >non-Aktif</input>
					
			<?php } else { ?>
					
					
				<input type="radio" name="status_otentikasi" id="status_otentikasi" value="1"  style="margin:10px" >Aktif</input>
				<input type="radio" name="status_otentikasi" id="status_otentikasi" value="0" checked="checked"style="margin:10px" >non-Aktif</input>
					
				<?php } ?>
			</td>
        </tr>
		<tr>
        	<td>Keterangan : </td>
            <td><textarea class="ckeditor" name="keterangan" style="width: 600px; height: 100px;font-size:20px;font-style:bold;"><?php echo $user['keterangan']; ?></textarea></td>
        </tr>
		<tr>
			<td></td>
        	<td><input type="button" value="Ubah" onclick="simpan_edit();" style="width: 200px; height: 40px;font-size:20px;font-style:bold;"/><input type="button" value="Kembali" onclick="javascript:browse();" style="width: 200px; height: 40px;font-size:20px;font-style:bold;"/></td>
        	
        </tr>
    </tbody>
</table>
</form>