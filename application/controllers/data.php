<?php
	class Data extends CI_Controller 
	{
		private $limit=10;

		function __construct()
		{
			parent::__construct();
			$this->load->library('template');
			$this->load->library(array('table','form_validation'));
			$this->load->helper(array('form','url'));
			$this->load->model('data_model','',TRUE);
		}
		function index()
		{
			$this->load->view('home');
		}
		function about()
		{
			$this->load->view('about');
		}
		function sekolah($offset=0,$order_column='id',$order_type='asc')
		{
			if (empty($offset)) $offset=0;
			if (empty($order_column)) $order_column='id';
			if (empty($order_type)) $order_type='asc';

			//load data
			$datas=$this->data_model->get_paged_list($this->limit,$offset,$order_column,$order_type)->result();
			
			//generate pagnation
			$this->load->library('pagination');
			$config['base_url']= site_url('data/sekolah/');
			$config['total_rows']= $this->data_model->count_all();
			$config['per_page']=$this->limit;
			$config['uri_segment']=3;
			$this->pagination->initialize($config);
			$data1['pagination']=$this->pagination->create_links();

			//generate table data
			$this->load->library('table');
			$this->table->set_empty("&nbsp;");
			$new_order=($order_type=='asc'?'desc':'asc');
			$this->table->set_heading(
				'No',
				'Nama',
				'Alamat',
				'Actions'
				);
			$i=0+$offset;
			foreach($datas as $data)
			{
				$this->table->add_row(++$i,
					$data->nama,
					$data->alamat,
					anchor('data/view/'.$data->id,'<button class="btn btn-sm btn-success">Detail</button>',array('class'=>'view')).' '.
					anchor('data/update/'.$data->id,'<button class="btn btn-sm btn-warning">Edit</button>',array('class'=>'update')).' '.
					anchor('data/delete/'.$data->id,'<button class="btn btn-sm btn-danger">Delete</button>',array('class'=>'delete','onclick'=>"return confirm('Apakah Anda Ingin Menghapus Data?')"))
					);
			}
			$data1['table']=$this->table->generate();

			if ($this->uri->segment(3) == 'delete_success')
				$data1['message']='<div class="alert alert-success" role="alert">Data Berhasil dihapus</div>';
			else if ($this->uri->segment(3) == 'add_success')
				$data1['message']='<div class="alert alert-success" role="alert">Data Berhasil ditambahkan</div>';
			else 
				$data1['message']='';

			//load view
			$this->load->view('dataList',$data1);

		}

		function add()
		{
			 //set common properties
			$data1['title']='Tambah Data Sekolah';
			$data1['action']=site_url('data/add');
			$data1['link_back']= anchor('data/sekolah','Kembali ke Daftar Data',array('class'=>'back'));

			$this->_set_rules();

			//run validation
			if ($this->form_validation->run()=== FALSE)
			{
				$data1['message']='';
				// set common properties
				$data1['title']='Tambah Data Sekolah';
				$data1['message']='';
				$data1['data']['id']='';
				$data1['data']['nama']='';
				$data1['data']['alamat']='';
				$data1['data']['status']='';
				$data1['data']['akreditasi']='';
				$data1['data']['prodi']='';
				$data1['link_back'] = anchor ('data/sekolah/','Lihat Data', array('class'=>'back'));

				$this->load->view('dataEdit',$data1);
			}
			else
			{
				// save data
				$prodi=$this->input->post('prodi');
				$jurusan=implode(",",$prodi);
				$data1 = array('nama'=>$this->input->post('nama'),
					'alamat'=>$this->input->post('alamat'),
					'status'=>$this->input->post('status'),
					'akreditasi'=>$this->input->post('akreditasi'),
					'prodi'=>$jurusan);
				$id=$this->data_model->save($data1);

				$this->validation->id = $id;

				redirect('data/sekolah/add_success/');
			}
		}

		function view($id)
		{
			// set common properties
			$data['title']='Detail Data Sekolah';
			$data['link_back']= anchor('data/sekolah/','<button class="btn btn-primary">Kembali</button>',array('class'=>'back'));

			$data['data']=$this->data_model->get_by_id($id)->row();

			$this->load->view('dataView',$data);	
		}

		function update($id)
		{
			// set common properties
			$data1['title']='Update Data Sekolah';
			$this->load->library('form_validation');
			// set validation properties
				$this->_set_rules();
				$data1['action']=('data/update/'.$id);

				//run validation
				if ($this->form_validation->run() === FALSE)
				{
					$data1['message']='';
					$data1['data']=$this->data_model->get_by_id($id)->row_array();
					
					$data1['title']='Update Data Sekolah';
					$data1['message'] = '';
				}	
				else
				{
					$id=$this->input->post('id');
					$prodi=$this->input->post('prodi');
					$jurusan=implode(",",$prodi);
					$data1=array(
						'nama'=>$this->input->post('nama'),
						'alamat'=>$this->input->post('alamat'),
						'status'=>$this->input->post('status'),
						'akreditasi'=>$this->input->post('akreditasi'),
						'prodi'=>$jurusan );
					$this->data_model->update($id,$data1);
					$data1['data']=$this->data_model->get_by_id($id)->row_array();

					$data1['message'] = "<script>alert('Update Sukses'); window.location='../../data/sekolah/';</script>";
				}
				$data1['link_back'] = anchor('data/sekolah/','lihat data',array('class'=>'back'));

				$this->load->view('dataEdit',$data1);
		}

		function delete($id)
		{
			$this->data_model->delete($id);

			redirect('data/sekolah/delete_success','refresh');
		}

		function _set_rules()
		{
			$this->form_validation->set_rules('nama','Nama','required|trim');
			$this->form_validation->set_rules('alamat','Alamat','required');
			$this->form_validation->set_rules('status','Status','required');
			$this->form_validation->set_rules('akreditasi','Akreditasi','required');
			$this->form_validation->set_rules('prodi','prodi[]','required');
		}
	}