<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcements extends Uadmin_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'articles_model',
        ]);
        $this->data['menu_id'] = 'announcements_index';
		$this->load->library('upload');
	}

	public function index()
    {
        $this->data['datas'] = $this->articles_model->announcements()->result();
        $this->data['page'] = 'Pengumuman';
        $this->render('admin/announcements');
    }

    public function form( $id = NULL )
    {
        $this->data['page'] = 'Tambah Pengumuman';
        $this->data['url'] = base_url('admin/announcements/create');
        if( $id )
        {
            $announcement = $this->articles_model->announcement( $id )->row();
            $announcement->post_date = date('Y-m-d', strtotime( $announcement->post_date ));
            if( file_exists( './uploads/announcements/files/' . $announcement->file ) )
            {
                $announcement->file_content = file_get_contents( './uploads/announcements/files/' . $announcement->file );
            }
            $this->data['data'] = $announcement;
            $this->data['page'] = 'Edit Pengumuman';
            $this->data['url'] = base_url('admin/announcements/update');
        }
        $this->render('admin/form_announcements');
    }

    public function create()
    {
        $this->form_validation->set_rules('title', 'Judul Pengumuman', 'required');
        $this->form_validation->set_rules('post_date', 'Tanggal Post', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi Pengumuman', 'required');
        $this->form_validation->set_rules('content', 'Isi Kontent Pengumuman', 'required');

        $alert = 'error';
        $message = 'Gagal Menambah Data Fasilitas Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $title = $this->input->post('title');
            $post_date = $this->input->post('post_date');
            $description = $this->input->post('description');
            $content = $this->input->post('content');

            $slug = str_replace( " ", "_", $title );
            $slug = str_replace( ".", "", $slug );
            $slug = strtolower( $slug );

            
            $file = $slug . '.html';
            if( !file_put_contents( './uploads/announcements/files/' . $file, $content ) )
            {
                $alert = 'warning';
                $message = 'Gagal Membuat File Pengumuman!';
            } else {
                $data['title'] = $title;
                $data['post_date'] = $post_date;
                $data['description'] = $description;
                $data['slug'] = $slug;
                $data['file'] = $file;
                $data['post_date'] = $post_date;
                $data['type'] = 'announcement';
			
                $data['thumbnail'] = NULL;
                if($_FILES['thumbnail']['name']){
                    $uploaded_foto = $this->upload_thumbnail( $slug );
                    $data['thumbnail'] = $uploaded_foto['file_name'];
                }
                $data['create_by'] = $this->session->userdata('user_id');
                $data['create_date'] = date('Y-m-d');
    
                if( $this->articles_model->create( $data ) )
                {
                    $alert = 'success';
                    $message = 'Berhasil Membuat Pengumuman Baru!';
                } else {
                    $message = 'Gagal Membuat Pengumuman Baru!';
                }
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/announcements') );
    }

    public function detail( $id = NULL )
    {
        if( !$id ) return redirect('admin/announcements');

        $announcement = $this->articles_model->announcement( $id )->row();
        if( !$announcement ) return redirect('admin/announcements');

        if( file_exists( './uploads/announcements/files/' . $announcement->file ) )
        {
            $file_content = file_get_contents( './uploads/announcements/files/' . $announcement->file );
            $announcement->file_content = $this->form_validation->set_value( 'content', $file_content );
        }
        
        $this->data['data'] = $announcement;
        
        $this->data['page'] = 'Detail Pengumuman';
        $this->render('admin/announcement');
    }

    public function update()
    {
        $this->form_validation->set_rules('title', 'Judul Pengumuman', 'required');
        $this->form_validation->set_rules('post_date', 'Tanggal Post', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi Pengumuman', 'required');
        $this->form_validation->set_rules('content', 'Isi Kontent Pengumuman', 'required');

        $alert = 'error';
        $message = 'Gagal Mengubah Data Fasilitas Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            $slug = $this->input->post('slug');
            $filename = $this->input->post('filename');
            $title = $this->input->post('title');
            $post_date = $this->input->post('post_date');
            $description = $this->input->post('description');
            $content = $this->input->post('content');

            $file = $filename;
            if( !file_put_contents( './uploads/announcements/files/' . $file, $content ) )
            {
                $alert = 'warning';
                $message = 'Gagal Mengubah File Pengumuman!';
            } else {
                $data['title'] = $title;
                $data['post_date'] = $post_date;
                $data['description'] = $description;
			
                if($_FILES['thumbnail']['name']){
                    $uploaded_foto = $this->upload_thumbnail( $slug );
                    $data['thumbnail'] = $uploaded_foto['file_name'];
                }
    
                if( $this->articles_model->update( $id, $data ) )
                {
                    $alert = 'success';
                    $message = 'Berhasil Mengubah Pengumuman!';
                } else {
                    $message = 'Gagal Mengubah Pengumuman!';
                }
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/announcements') );
    }

    public function delete()
    {
        if( !$_POST ) return redirect( base_url('admin/announcements') );

        $alert = 'error';
        $message = 'Gagal Menghapus Pengumuman!';

        $this->form_validation->set_rules('id', 'Id Pengumuman', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            if( $this->articles_model->delete( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus Pengumuman!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/announcements') );
    }

    public function upload_thumbnail( $title = 'thumbnail' )
    {
		$config['upload_path']          = './uploads/announcements/thumbnails/';
		$config['overwrite']            = true;
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 2048;
		$config['file_name']			= $title;

		$this->upload->initialize($config);
		if (!$this->upload->do_upload('thumbnail')) {
			$this->session->set_flashdata('alert', 'error');   
			$this->session->set_flashdata('message', $this->upload->display_errors());   
			return redirect( base_url('admin/announcements') );
		} else {
			$uploaded_data = $this->upload->data();
		}
		return $uploaded_data;

    }
}
