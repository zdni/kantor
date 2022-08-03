<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'users_model',
            'heros_model',
        ]);
		$this->load->library('upload');
	}

	public function index()
    {
        $this->data['heros'] = $this->heros_model->heros()->result();

        $this->data['page'] = 'Beranda';
        $this->render('admin/dashboard');
    }
    
    public function heros_edit()
    {
        $this->form_validation->set_rules('id', 'File Gambar', 'required');

        $alert = 'error';
        $message = 'Gagal Mengubah Gambar Beranda! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            $data['image'] = NULL;
			if($_FILES['image']['name']){
                $title = str_replace(" ", '', strtolower( $_FILES['image']['name'] ));
				$uploaded_foto = $this->upload_image( $title );
				$data['image'] = $uploaded_foto['file_name'];
			}
            
            if( $this->heros_model->update( $id, $data ) )
            {
                $this->session->set_flashdata('alert', 'success');
                $this->session->set_flashdata('message', 'Berhasil Mengubah Gambar Baru!');
                return redirect( base_url('admin/dashboard') );
            } else {
                $message = 'Gagal Mengubah Gambar Baru!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/dashboard') );
    }

	public function upload_image( $title )
	{
		$config['upload_path']          = './uploads/heros/';
		$config['overwrite']            = true;
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 2048;
		$config['file_name']			= $title;

		$this->upload->initialize($config);
		if (!$this->upload->do_upload('image')) {
			$this->session->set_flashdata('alert', 'error');   
			$this->session->set_flashdata('message', $this->upload->display_errors());   
			return redirect( base_url('admin/dashboard') );
		} else {
			$uploaded_data = $this->upload->data();
		}
		return $uploaded_data;
	}
}
