<?php

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Userapi extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    // show data user
    function index_get() {
        $nama   = $this->get('nama_user');

        if ($nama == '') {
            $user = $this->db->get('user')->result();
        }
        else {
            $this->db->where('nama_user', $nama);
            $user = $this->db->get('user')->result();
        }
        $this->response($user, 200);
    }

    // insert new data to user
    function index_post() {
        $data = array(
            'nama_user'     => $this->post('nama_user'),
            'alamat'        => $this->post('alamat'));
        $insert = $this->db->insert('user', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // update data user
    function index_put() {
        $nama = $this->put('nama_user');
        $alamat = $this->put('alamat');
        $data = array(
            'nama_user' => $this->put('nama_user'),
            'alamat'    => $this->put('alamat'));
        $this->db->where('nama_user', $nama);
        $this->db->where('alamat', $alamat);
        $update = $this->db->update('user', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // delete user
    function index_delete() {
        $nama = $this->delete('nama_user');
        $this->db->where('nama_user', $nama);
        $delete = $this->db->delete('user');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}