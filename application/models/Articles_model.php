<?php

class Articles_model extends CI_Model {
    private $_table = 'articles';

    public function create( $data = NULL )
    {
        if ( $data ) {
            $this->db->insert( $this->_table, $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }
        return false;
    }

    public function update( $id = NULL, $data = NULL )
    {
        if ( $id && $data ) {
            $this->db->where( $this->_table . '.id', $id );
            return $this->db->update( $this->_table, $data );
        }
        return false;
    }

    public function delete( $id = NULL )
    {
        if ( $id ) {
            $this->db->where( $this->_table . '.id', $id );
            return $this->db->delete( $this->_table );
        }
        return false;
    }

    public function article( $id = NULL, $slug = NULL )
    {
        if( $id ) $this->db->where( $this->_table . '.id', $id);
        if( $slug ) $this->db->where( $this->_table . '.slug', $slug);
        return $this->articles();
    }

    public function articles( $start = NULL, $end = NULL )
    {
        $this->db->select( $this->_table . '.*' );
        $this->db->select( 'users.name AS username' );
        $this->db->join(
            'users',
            'users.id = ' . $this->_table . '.create_by',
            'join'
        );
        $this->db->order_by('id', "desc");
        $this->db->order_by('post_date', "desc");
        $this->db->where( $this->_table . '.type', 'article');
        if( !is_null($start) && $end ) return $this->db->get( $this->_table, $end, $start );
        return $this->db->get( $this->_table );
    }

    public function announcement( $id = NULL, $slug = NULL )
    {
        if( $id ) $this->db->where( $this->_table . '.id', $id);
        if( $slug ) $this->db->where( $this->_table . '.slug', $slug);
        return $this->announcements();
    }

    public function announcements( $start = NULL, $end = NULL )
    {
        $this->db->select( $this->_table . '.*' );
        $this->db->select( 'users.name AS username' );
        $this->db->join(
            'users',
            'users.id = ' . $this->_table . '.create_by',
            'join'
        );
        $this->db->order_by('id', "desc");
        $this->db->order_by('post_date', "desc");
        $this->db->where( $this->_table . '.type', 'announcement');
        if( !is_null($start) && $end ) return $this->db->get( $this->_table, $end, $start );
        return $this->db->get( $this->_table );
    }
}

?>