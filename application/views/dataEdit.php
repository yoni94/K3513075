<?php
  $this->load->view('header');
  $this->load->view('menu'); 
  error_reporting(0);
?>
<h4><?php echo $title;?></h4>
<div class="content">
	<?php echo $message;?>
	<?php echo validation_errors(); ?>
	<?php echo form_open(); ?>
	<div class="data">
		<table class="table table-striped">
			<tr>
				<td>ID</td>
				<td><input type="text" name="id" disabled="disable" class="text" value="<?php echo (isset($data['id']))?$data['id']:''; ?>">
					<input type="hidden" name="id" value="<?php echo (isset($data['id']))?$data['id']:''; ?>">
				</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" value="<?php echo (isset($data['id']))?$data['nama']:''; ?>" required></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><textarea name="alamat" required><?php echo (isset($data['id']))?$data['alamat']:''; ?></textarea></td>
			</tr>
			<tr>
				<td>Status</td>
				<td>
					<input type="radio" name="status" value="Negeri"<?php if ($data['status'] == 'Negeri'){echo set_radio('status','Negeri', TRUE);} ?>/> Negeri
					<input type="radio" name="status" value="Swasta"<?php if ($data['status'] == 'Swasta'){echo set_radio('status','Swasta', TRUE);} ?>/> Swasta
				</td>
			</tr>
			<tr>
				<td>Akreditasi</td>
				<td>
					<select name="akreditasi">
						<option value="Terakreditasi A" <?php if ($data['akreditasi'] == 'Terakreditasi A') { echo 'selected';}  ?>>Terakreditasi A</option>
						<option value="Terakreditasi B" <?php if ($data['akreditasi'] == 'Terakreditasi B') { echo 'selected';}  ?>>Terakreditasi B</option>
						<option value="Belum Terakreditasi" <?php if ($data['akreditasi'] == 'Belum Terakreditasi') { echo 'selected';}  ?>>Belum Terakreditasi</option>
					</select>
				</td>
			</tr>
			<tr>
				<?php $kom=explode(',',$data['prodi']); ?>
				<td>Program Studi</td>
				<td>
					<input type="checkbox" name="prodi[]" value="TKJ" <?php if(in_array('TKJ',$kom)){echo "checked";} ?>> TKJ</br>
					<input type="checkbox" name="prodi[]" value="RPL" <?php if(in_array('RPL',$kom)){echo "checked";}?>> RPL</br> 
					<input type="checkbox" name="prodi[]" value="MULTIMEDIA" <?php if(in_array('MULTIMEDIA',$kom)){echo "checked";} ?>> MULTIMEDIA
				</td>
			</tr>
			<tr>
				<td> &nbsp;</td>
				<td><input type="submit" class="btn btn-sm btn-success" value="Save"></td>
			</tr>
		</table>
	</div>
</div>
<?php $this->load->view('footer'); ?>