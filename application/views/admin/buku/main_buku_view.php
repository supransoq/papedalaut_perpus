<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Buku Perpus</title>
	
	<script type="text/javascript">
	
		function cek(){
			if($(".cek").attr("checked")!="checked"){
				$("#ceksemua").removeAttr("checked");
			}
		}
		function cekall(){
			if($("#ceksemua").attr("checked")!="checked"){
				$(".cek").removeAttr("checked");
			}else{
				$(".cek").attr("checked","checked");
			}
		}
		function pagination(target){
				$("#body").load(target);
		}
		function tambah(){
			var target="<?php echo site_url() ?>/admin/cbuku/tambah"
			$("#search").hide();
			$("#body").load(target);
		}
		function browse(){
			var target="<?php echo site_url() ?>/admin/cbuku/browse/0/true/0"
			
			$("#search").hide();
			
			$("#body").load(target);
		}
		function edit(param){
			var target="<?php echo site_url() ?>/admin/cbuku/edit";
			var xdata={ ID : param }
			
			$("#search").hide();
			
			$.post(target,xdata,function(data){
				$("#body").html(data);
			});
		}
		function hapus(param){
			var target="<?php echo site_url() ?>/admin/cbuku/hapus/0/true/2";
			var xdata={ nis : param }
			var konfirmasi=confirm("Anda yakin ingin menghapus data ini?");
			
			
			if(konfirmasi==true){
				$.post(target,xdata,function(data){
					$("#body").html(data);
				});
			}
		}
		
		function simpan_tambah(){
			var target="<?php echo site_url() ?>/admin/cbuku/simpan_tambah/0/true/3";
			var xdata=$("#posttambah").serialize();
			$("#search").hide();
			$.post(target,xdata,function(data){
				$("#body").html(data);
			});
		}
		
		function simpan_edit(){
			var target="<?php echo site_url() ?>/admin/cbuku/simpan_edit/0/true/1";
			var xdata=$("#postedit").serialize();
			$("#search").hide();
			$.post(target,xdata,function(data){
				$("#body").html(data);
			});
		}
		
		function hapussemua(){
			var target="<?php echo site_url() ?>/admin/cbuku/hapussemua/0/true/2";
			var xdata=$("#postdata").serialize();
			var konfirmasi=confirm("Anda yakin ingin menghapus semua data ini?");
			
			if(konfirmasi==true){
				$.post(target,xdata,function(data){
					$("#body").html(data);
				});
			}
		}
		function toggle(){
			$("#search").toggle();
		}
		function cari(){
			var target="<?php echo site_url() ?>/admin/cbuku/browse/0/true/4";
			var xdata=$("#cari").serialize();
			
			$.post(target,xdata,function(data){
				$("#body").html(data);
			});
		}
		function lihat(param){
			var target="<?php echo site_url() ?>/admin/cbuku/lihat"
			var xdata={ ID : param }
			
			$("#search").hide();
			
			$.post(target,xdata,function(data){
				$("#body").html(data);
			});
		}
	
</script>
</head>
<body>

<div id="container">
	<div class="header">
	<h1><?php echo $judul; ?></h1>
		<div class="command">
			<div class="tombol">
			<a href="javascript:browse();">Browse</a>|<a href="javascript:tambah();">Tambah</a>|<a href="javascript:toggle();">Cari</a>
			</div>
		</div>
		
	</div>
	<br>
	<div id="search" style="display:none;">
		<form id="cari">
		<table>
			<tr>
				<td>
					<select id="key" name="key" style="width: 230px; height: 40px;font-size:20px;font-style:bold;">
						<option value="username">NIS/NISN</option>
						<option value="username">Nama Depan</option>
						<option value="username">Nama Belakang</option>
						<option value="username">Nama Panggilan</option>
						<option value="username">Gender</option>
						<option value="username">Gol. Darah</option>
						<option value="username">Alamat</option>
						<option value="username">Nama OrangTua</option>
						<option value="username">Penghasilan Orangtua</option>
					</select>
				</td>
				<td>
				<div id="pilih">
				 <?php //if(isset ($pilih_otentikasi)) {
					// echo $pilih_otentikasi; 
					// } ?>
				
				
				<input id="value" type="text" name="value" style="width: 350px; height: 35px;font-size:20px;font-style:bold;"/>
				</td>
				<td><input type="button" value="Cari" onclick="cari();" style="width: 200px; height: 40px;font-size:20px;font-style:bold;"/></td>
				</div>
				
				<script type="text/javascript">
				$("#key").change(function(){
					var selectValues = $("#key").val();
					if (selectValues == 'status_otentikasi'){
						$.ajax({
							url : "<?php echo site_url('admin/cbuku/pilihotentikasi')?>",
							success: function(msg){
								$('#pilih').html(msg);
							}
						});
					} else {
						var msg = "<input id='value' type='text' name='value' style='width: 350px; height: 35px;font-size:20px;font-style:bold;'/>";
						$('#pilih').html(msg);
					}
				});
				</script>
			</tr>
		</table>
		</form>
	</div>

	<div id="body">
		<?php $this->load->view("admin/buku/browse_buku_view"); ?>
	</div>

	
</div>
</body>
</html>