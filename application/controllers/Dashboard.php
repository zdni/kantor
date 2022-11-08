<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Visitor_Controller 
{
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'articles_model',
            'documents_model',
            'downloads_model',
            'facilities_model',
            'galleries_model',
            'heros_model',
            'sectors_model',
            'messages_model',
            'profile_model',
            'videos_model',
        ]);

        $this->data['alamat']   = file_get_contents( './uploads/profile/alamat.html' );
        $this->data['email']    = file_get_contents( './uploads/profile/email.html' );
        $this->data['fax']      = file_get_contents( './uploads/profile/fax.html' );
        $this->data['institut'] = file_get_contents( './uploads/profile/institut.html' );
        $this->data['telepon']  = file_get_contents( './uploads/profile/telepon.html' );
        $this->data['logo']     = file_get_contents( './uploads/profile/logo.html' );

        $sectors = $this->sectors_model->sectors()->result();
        $this->data['menu_downloads'] = $this->downloads_model->downloads()->result();
        $this->data['menu_sectors'] = $sectors;
        $this->data['menu_profiles'] = $this->profile_model->profile()->result();
	}

    public function index()
    {
        // counts section
        $counts = [
            (object) ['label' => '', 'icon' => '', 'total' => ''],
            (object) ['label' => '', 'icon' => '', 'total' => ''],
            (object) ['label' => '', 'icon' => '', 'total' => ''],
            (object) ['label' => '', 'icon' => '', 'total' => ''],
        ];
        $index = 1;
        foreach ($counts as $count) {
            // file label
            if( file_exists( './uploads/counts/labels/label_' . $index . '.html' ) )
            {
                $counts[$index-1]->label = file_get_contents( './uploads/counts/labels/label_' . $index . '.html' );
            }
            // file icon
            if( file_exists( './uploads/counts/icons/icon_' . $index . '.html' ) )
            {
                $counts[$index-1]->icon = file_get_contents( './uploads/counts/icons/icon_' . $index . '.html' );
            }
            // file total
            if( file_exists( './uploads/counts/totals/total_' . $index . '.html' ) )
            {
                $counts[$index-1]->total = file_get_contents( './uploads/counts/totals/total_' . $index . '.html' );
            }
            $index++;
        }

        $profile = $this->profile_model->profile()->row();

        if( file_exists( './uploads/profile/' . $profile->file ) )
        {
            $profile->file_content = file_get_contents( './uploads/profile/' . $profile->file );
        }

        $this->data['profile'] = $profile;
        $this->data['total'] = (object) [
            'document' => $this->documents_model->documents()->num_rows(),
            'sector' => $this->sectors_model->sectors()->num_rows(),
            'article' => $this->articles_model->articles()->num_rows(),
            'gallery' => $this->galleries_model->galleries()->num_rows(),
        ];
        $this->data['counts'] = $counts;
        $this->data['sectors'] = $this->sectors_model->sectors()->result();
        $this->data['articles'] = $this->articles_model->articles( 0, 9 )->result();
        $this->data['galleries'] = $this->galleries_model->galleries( 0, 2 )->result();
        $this->data['videos'] = $this->videos_model->videos( NULL, 0, 2 )->result();
        
        $heros = $this->heros_model->heros()->result();
        $this->data['about'] = $heros[0];
        $this->data['popup'] = $heros[1];

        unset( $heros[0] );
        unset( $heros[1] );
        $this->data['heros'] = $heros;

        $this->render('index');
    }

    public function profile()
    {
        $slug = isset( $_GET['slug'] ) ? $_GET['slug'] : NULL;
        if( !$slug ) return redirect( base_url() );

        $profile = $this->profile_model->profile( NULL, $slug )->row();
        if( !$profile ) return redirect( base_url() );
        $profile->file_content = "Konten";
        if( file_exists( './uploads/profile/' . $profile->file ) )
        {
            $profile->file_content = file_get_contents( './uploads/profile/' . $profile->file );
        }

        $this->data['profile'] = $profile;
        $this->render('profile');
    }

    public function sector()
    {
        $slug = isset( $_GET['slug'] ) ? $_GET['slug'] : NULL;
        if( !$slug ) return redirect( base_url() );

        $sector = $this->sectors_model->sector( NULL, $slug )->row();
        $sector->file_content = '';

        if( file_exists( './uploads/sectors/' . $sector->file ) && $sector->file )
        {
            $sector->file_content = file_get_contents( './uploads/sectors/' . $sector->file );
        }

        $this->data['sector'] = $sector;
        
        $this->render('sector');
    }

    public function gallery()
    {
        $slug = isset( $_GET['slug'] ) ? $_GET['slug'] : NULL;
        if( !$slug ) return redirect( base_url() );
        
        if( $slug == 'photos' ) {
            $title = 'Galeri Foto';
            $datas = $this->galleries_model->galleries()->result();
        } elseif( $slug == 'videos' ) {
            $title = 'Galeri Video';
            $datas = $this->videos_model->videos()->result();
        } else {
            return redirect( base_url() );
        }

        $this->data['title'] = $title;
        $this->data['datas'] = $datas;
        $this->render('gallery');
    }

    public function galleries( $gallery_id )
    {
        $data = $this->galleries_model->gallery( $gallery_id )->row();

        $title = 'Detail Galeri Foto';
        $this->data['title'] = $title;
        $this->data['data'] = $data;
        $this->render('detail_gallery');

    }

    public function articles()
    {
        $page = isset( $_GET['page'] ) ? $_GET['page'] : 0;

        $articles = $this->articles_model->articles( ($page*10), ( ($page*10) + 9) )->result();
        $this->data['articles'] = $articles;
        $this->data['new_articles'] = $this->articles_model->articles( 0, 3 )->result();
        $this->data['page'] = $page;
        $this->data['total'] = count( $this->articles_model->articles(  )->result() );

        $this->render('articles');
    }

    public function article(  )
    {
        $slug = isset( $_GET['slug'] ) ? $_GET['slug'] : NULL;
        if( !$slug ) return redirect( base_url() );

        $article = $this->articles_model->article( NULL, $slug )->row();
        if( !$article ) return redirect( base_url() );
        if( file_exists( './uploads/articles/files/' . $article->file ) )
        {
            $article->file_content = file_get_contents( './uploads/articles/files/' . $article->file );
        }

        $this->data['new_articles'] = $this->articles_model->articles( 0, 3 )->result();
        $this->data['article'] = $article;
        $this->render('article');
    }

    public function announcements()
    {
        $page = isset( $_GET['page'] ) ? $_GET['page'] : 0;

        $announcements = $this->articles_model->announcements( ($page*10), ( ($page*10) + 9) )->result();
        $this->data['announcements'] = $announcements;
        $this->data['new_announcements'] = $this->articles_model->announcements( 0, 3 )->result();
        $this->data['page'] = $page;
        $this->data['total'] = count( $this->articles_model->announcements(  )->result() );

        $this->render('announcements');
    }

    public function announcement(  )
    {
        $slug = isset( $_GET['slug'] ) ? $_GET['slug'] : NULL;
        if( !$slug ) return redirect( base_url() );

        $announcement = $this->articles_model->announcement( NULL, $slug )->row();
        if( !$announcement ) return redirect( base_url() );
        if( file_exists( './uploads/announcements/files/' . $announcement->file ) )
        {
            $announcement->file_content = file_get_contents( './uploads/announcements/files/' . $announcement->file );
        }

        $this->data['new_announcements'] = $this->articles_model->announcements( 0, 3 )->result();
        $this->data['announcement'] = $announcement;
        $this->render('announcement');
    }

    public function documents( $download_id = NULL )
    {
        if( !$download_id ) return redirect( base_url() );
        $datas = [];
        $this->data['download'] = $this->downloads_model->download( $download_id )->row();
        $documents = $this->documents_model->documents( $download_id )->result();
        foreach ($documents as $document) {
            if( array_key_exists( $document->category, $datas ) ) {
                $datas[$document->category][] = $document;
            } else {
                $datas[$document->category] = [$document];
            }
        }
        $this->data['datas'] = $datas;
        $this->render('documents');
    }

    public function facilities()
    {
        $this->data['facilities'] = $this->facilities_model->facilities()->result();
        $this->render('facilities');
    }

    public function contact_us()
    {
        $this->render('contact_us');
    }
    
    public function send_message()
    {
        $this->form_validation->set_rules('rating', 'Penilaian', 'required');
        $this->form_validation->set_rules('message', 'Pesan', 'required');

        $alert = 'error';
        $message = 'Gagal Mengirim Pesan! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $rating = $this->input->post('rating');
            $message = $this->input->post('message');

            $data['rating'] = $rating;
            $data['message'] = $message;
            $data['date'] = date('Y-m-d');


            if( $this->messages_model->create( $data ) )
            {
                $alert = 'success';
                $message = 'Terima Kasih Atas Penilaian Anda!';
            } else {
                $message = 'Gagal Mengirim Pesan!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('dashboard') );
    }

}