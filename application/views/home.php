<?php
  $this->load->view('header');
  $this->load->view('menu'); 
?>

		<div class="jumbotron">
        <h2>Selamat Datang di Aplikasi Database Sekolah</h2>
        <p class="lead">Aplikasi ini dibuat dengan menggunakan Code Igniter 2.2-stable dan Bootstrap 2.3.2. Aplikasi ini dibuat untuk memenuhi tugas Mata Kuliah FOSS PTIK Semester 4</p>
        <?php echo anchor('data/sekolah/','<button class="btn btn-large btn-primary">Lihat Data</button>'); ?></button>
      </div>
<?php $this->load->view('footer'); ?>