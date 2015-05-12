<?php
  $this->load->view('header');
  $this->load->view('menu'); 
?>

<h4><?php echo $title; ?></h4>
<div class="data">
	<table class="table table-striped">
		<tr>
			<td>ID</td>
			<td><?php echo $data->id; ?></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td><?php echo $data->nama; ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><?php echo $data->alamat; ?></td>
		</tr>
		<tr>
			<td>Status</td>
			<td><?php echo $data->status; ?></td>
		</tr>
		<tr>
			<td>Akreditasi</td>
			<td><?php echo $data->akreditasi; ?></td>
		</tr>
		<tr>
			<td>Program Studi</td>
			<td><?php echo $data->prodi; ?></td>
		</tr>
	</table>
	<?php echo $link_back; ?>
</div>

<?php $this->load->view('footer'); ?>