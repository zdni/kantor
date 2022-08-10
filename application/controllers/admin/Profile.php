<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Admin_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'profile_model',
        ]);
		$this->load->library('upload');
	}

	public function index()
    {
        $profiles = [
            (object) ['label' => 'Alamat',  'file' => 'alamat.html',  'file_content' => ''],
            (object) ['label' => 'Email',   'file' => 'email.html',   'file_content' => ''],
            (object) ['label' => 'Fax',     'file' => 'fax.html',     'file_content' => ''],
            (object) ['label' => 'Institut','file' => 'institut.html','file_content' => ''],
            (object) ['label' => 'Telepon', 'file' => 'telepon.html', 'file_content' => ''],
        ];
        $index = 0;
        foreach ($profiles as $profile) {
            if( file_exists( './uploads/profile/' . $profile->file ) )
            {
                $profiles[$index]->file_content = file_get_contents( './uploads/profile/' . $profile->file );
            }
            $index++;
        }

        $datas = $this->profile_model->profile()->result();
        $index = 0;
        foreach ($datas as $data) {
            $datas[$index]->file_content = "Konten";
            if( file_exists( './uploads/profile/' . $data->file ) )
            {
                $datas[$index]->file_content = file_get_contents( './uploads/profile/' . $data->file );
            }
            $index++;
        }
        
        $this->data['profiles'] = $profiles;
        $this->data['datas']    = $datas;
        $this->data['logo']     = file_get_contents( './uploads/profile/logo.html' );
        
        $this->data['page'] = 'Profil';
        $this->render('admin/profile');
    }

    public function create()
    {
        if( !$_POST ) return redirect( base_url('admin/profile') );

        $this->form_validation->set_rules('title', 'Titel Profil', 'required');
        $this->form_validation->set_rules('content', 'Konten Profil', 'required');   

        $alert = 'error';
        $message = 'Gagal Menyimpan Profil terbaru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $title = $this->input->post('title');
            $content = $this->input->post('content');
            $sequence = $this->input->post('sequence');

            $slug = str_replace( " ", "_", $title );
            $slug = str_replace( ".", "", $slug );
            $slug = strtolower( $slug );

            $file = $slug . '.html';
            if( !file_put_contents( './uploads/profile/' . $file, $content ) )
            {
                $alert = 'warning';
                $message = 'Gagal Membuat File Profil!';
            } else {
                $data['title'] = $title;
                $data['slug'] = $slug;
                $data['sequence'] = $sequence;
                $data['file'] = $file;
    
                if( $this->profile_model->create( $data ) )
                {
                    $alert = 'success';
                    $message = 'Berhasil Membuat Profil Baru!';
                } else {
                    $message = 'Gagal Membuat Profil Baru!';
                }
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/profile') );
    }

    public function update()
    {
        if( !$_POST ) return redirect( base_url('admin/profile') );

        $this->form_validation->set_rules('id', 'Id Profil', 'required');
        $this->form_validation->set_rules('title', 'Titel Profil', 'required');
        $this->form_validation->set_rules('content', 'Konten Profil', 'required');   

        $alert = 'error';
        $message = 'Gagal Mengubah Profil terbaru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            $content = $this->input->post('content');
            $file = $this->input->post('file');
            $title = $this->input->post('title');
            $sequence = $this->input->post('sequence');

            if( !file_put_contents( './uploads/profile/' . $file, $content ) )
            {
                $alert = 'warning';
                $message = 'Gagal Mengubah File Profil!';
            } else {
                $data['title'] = $title;
                $data['sequence'] = $sequence;
    
                if( $this->profile_model->update( $id, $data ) )
                {
                    $alert = 'success';
                    $message = 'Berhasil Mengubah Profil Baru!';
                } else {
                    $message = 'Gagal Mengubah Profil Baru!';
                }
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/profile') );
    }

    public function delete()
    {
        if( !$_POST ) return redirect( base_url('admin/profile') );

        $alert = 'error';
        $message = 'Gagal Menghapus Profil!';

        $this->form_validation->set_rules('id', 'Id Profil', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            if( $this->profile_model->delete( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus Profil!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/profile') );
    }

    public function profile()
    {
        if( !$_POST ) return redirect( base_url('admin/profile') );

        $alert = 'error';
        $message = 'Gagal Mengubah Profil!';

        $this->form_validation->set_rules('file', 'File Profil', 'required');
        $this->form_validation->set_rules('file_content', 'Konten', 'required');
        if( $this->form_validation->run() )
        {
            $file = $this->input->post('file');
            $file_content = $this->input->post('file_content');
            if( !file_put_contents( './uploads/profile/' . $file, $file_content ) )
            {
                $alert = 'warning';
                $message = 'Gagal Mengubah File Profil!';
            } else {
                $alert = 'success';
                $message = 'Berhasil Mengubah Profil Baru!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/profile') );

    }

    public function update_logo()
    {
        if( !$_POST ) return redirect( base_url('admin/profile') );

        $alert = 'warning';
        $message = 'Gagal Mengubah Logo!';
        $file = $this->input->post('file');
        if( $_FILES['logo']['name'] ) {
            $uploaded_data = $this->upload_image();
            if( file_put_contents( './uploads/profile/' . $file, $uploaded_data['file_name'] ) )
            {
                $alert = 'success';
                $message = 'Berhasil Mengubah Logo!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/profile') );
    }

	public function upload_image(  )
	{
		$config['upload_path']          = './uploads/logo/';
		$config['overwrite']            = true;
		$config['allowed_types']        = 'png';
		$config['max_size']             = 2048;
		$config['file_name']			= 'logo';

		$this->upload->initialize($config);
		if (!$this->upload->do_upload('logo')) {
			$this->session->set_flashdata('alert', 'error');   
			$this->session->set_flashdata('message', $this->upload->display_errors());   
			return redirect( base_url('admin/profile') );
		} else {
            $uploaded_data = $this->upload->data();
		}
		return $uploaded_data;
	}
}
