<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->database();
	}

	public function index()
	{
		$query = $this->db->get('user');

		$data['records'] = $query->result();
		$data['total_data'] = $query->num_rows();

		$this->load->view('user_table', $data);
	}

	public function form_tambah_user()
    {
    	$this->load->view('user_tambah');
    }

    public function proses_tambah_user()
    {
    	$this->load->model('User_model', 'mod');
    	$data = array(
    			'nama_user' => $this->input->post('nama'),
                'alamat'    => $this->input->post('alamat')
    		);
    	$this->mod->insert($data);

    	redirect('user/index/');
    }

    public function form_rubah_user()
    {
    	$id_user = $this->uri->segment('3');
    	$query = $this->db->get_where('user', array('id_user' => $id_user));
    	//$query = $this->db->where('id_user', $id_user);
    	//	echo $this->db->get_compiled_select();
    	//	exit();
    	$data['records'] = $query->result();
        $this->load->view('user_rubah', $data);
    }

    public function proses_rubah_user()
    {
        $this->load->model('User_model', 'mod');
        $data = array(
                'id_user' => $this->input->post('id'),
                'nama_user' => $this->input->post('nama'),
                'alamat'    => $this->input->post('alamat')
            );
        $this->mod->update($data);

        redirect('user/index/');
    }

    public function proses_hapus_user($id)
    {
        if ($this->db->delete("user", "id_user = ".$id)) {
            redirect('user/index/');
        }
    }
}