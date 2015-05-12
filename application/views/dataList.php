<?php
  $this->load->view('header');
  $this->load->view('menu'); 
?>    
      <h4>Daftar Data Sekolah</h4>
      <div ><?php echo $message; ?></div>
      <div ><?php echo $table; ?></div>
      <div class="paging" align="right"><?php echo $pagination; ?></div>
      <?php echo anchor('data/add/','<button class="btn btn-primary">Tambah Data</button>',array('class'=>'add')); ?>
<?php $this->load->view('footer'); ?>
