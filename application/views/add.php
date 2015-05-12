<div class="content">
	<?php echo $message; ?>
	<?php echo validation_errors(); ?>
	<?php echo form_open($action); ?>
	<div class="data"
		<talbe class="table table-striped">
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="textarea" name="alamat"></td>
			</tr>
			<tr>
				<td>Tahun Lulus</td>
				<td><input type="text" name="lulus"></td>
			</tr>
		</table>
	</div>
</div>