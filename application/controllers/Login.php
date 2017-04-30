<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	function __construct ()
	{
		parent::__construct();

		//Check if already signed in
		if(!is_null($this->session->userdata('loggedIn')))
		{
			redirect(base_url('admin'));
		}
	}

	public function index()
	{
		if($_POST)
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			// check if username is available on daatabase
			if($query = $this->db->get_where('admins', array('username' => $username)))
			{
				$salt = $query->row()->password;

				// check if password checks out
				if(password_verify($password, $salt))
				{
					$login = array(

						'loggedIn' 	=> true,
						'user'		=> $username

						);

					$this->session->set_userdata($login);

					redirect(base_url(admin));
				}else
				{
					$this->session->set_flashdata('login_error', 'Wrong Password or Username');
					redirect(base_url('login'));
				}

			}else
			{
				$this->session->set_flashdata('login_error', 'Wrong Password or Username');
				redirect(base_url('login'));
			}

		}else
		{
			$this->load->view('admin/login');
		}
	}

	public function new_user ()
	{
		if($_POST)
		{
			$userdata = array(

				'username'	=> $this->input->post('username'),
				'password'	=> password_hash($this->input->post('password'), PASSWORD_BCRYPT)

				);

			$this->db->insert('admins', $userdata);
			redirect(base_url('login'));
		}else
		{
			$this->load->view('admin/signup');
		}
	}
}