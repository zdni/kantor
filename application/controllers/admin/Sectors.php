<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sectors extends Uadmin_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'sectors_model',
            'moduls_model',
            'users_model',
            'videos_model'
        ]);
        $this->data['menu_id'] = 'sectors_index';
	}

	public function index()
    {
        if( $this->session->userdata('role_name') == 'admin' ) {
            $datas = $this->sectors_model->sectors()->result();
            // unset( $datas[0] );
        }
        if( $this->session->userdata('role_name') == 'uadmin' ) {
            $sector_id = $this->session->userdata('sector_id');
            return redirect( base_url('admin/sectors/detail/') . $sector_id );
        }
        $this->data['datas'] = $datas;
        
        $this->data['page'] = 'Daftar Bidang';
        $this->render('admin/sectors');
    }
    
    public function create()
    {
        $this->form_validation->set_rules('name', 'Nama Bidang', 'required');

        $alert = 'error';
        $message = 'Gagal Menambah Data Bidang Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $name = $this->input->post('name');

            $slug = str_replace( " ", "_", $name );
            $slug = str_replace( ".", "", $slug );
            $slug = strtolower( $slug );

            $data['name'] = $name;
            $data['slug'] = $slug;
            
            $id = $this->sectors_model->create( $data );
            if( $id )
            {
                $this->session->set_flashdata('alert', 'success');
                $this->session->set_flashdata('message', 'Berhasil Membuat Data Bidang Baru!');
                return redirect( base_url('admin/sectors/detail/') . $id );
            } else {
                $message = 'Gagal Membuat Data Bidang Baru!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/sectors') );
    }

    public function detail( $id = NULL )
    {
        if( !$id ) return redirect( base_url('admin/sectors') );

        $data = $this->sectors_model->sector( $id )->row();
        $data->file_content = '';

        if( file_exists( './uploads/sectors/' . $data->file ) )
        {
            $data->file_content = file_get_contents( './uploads/sectors/' . $data->file );
        }
        
        $this->data['data'] = $data;
        $this->data['page'] = 'Detail Bidang';
        $this->render('admin/sector');
    }

    public function update()
    {
        if( !$_POST ) return redirect( base_url('admin/sectors') );

        $this->form_validation->set_rules('id', 'Id Bidang', 'required');
        $this->form_validation->set_rules('name', 'Bidang Bidang', 'required');
        $this->form_validation->set_rules('content', 'Konten Bidang', 'required');   

        $alert = 'error';
        $message = 'Gagal Mengubah Data Bidang! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            $content = $this->input->post('content');
            $file = $this->input->post('file') ? $this->input->post('file') : $this->input->post('slug') . '.html';
            $name = $this->input->post('name');
            
            if( !file_put_contents( './uploads/sectors/' . $file, $content ) )
            {
                $alert = 'warning';
                $message = 'Gagal Mengubah File Bidang!';
            } else {
                $data['name'] = $name;
                $data['file'] = $file;
    
                if( $this->sectors_model->update( $id, $data ) )
                {
                    $alert = 'success';
                    $message = 'Berhasil Mengubah Bidang!';
                } else {
                    $message = 'Gagal Mengubah Bidang!';
                }
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/sectors') );
    }

    public function delete()
    {
        if( !$_POST ) return redirect( base_url('admin/sectors') );

        $alert = 'error';
        $message = 'Gagal Menghapus Bidang!';

        $this->form_validation->set_rules('id', 'Id Bidang', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            if( $this->sectors_model->delete( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus Bidang!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/sectors') );
    }
}
