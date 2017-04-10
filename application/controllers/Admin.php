<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	function __construct ()
	{
		//Inherit from parent
		parent::__construct();

		//Check if already signed in
		if(is_null($this->session->userdata('loggedIn')))
		{
			redirect(base_url('login'));
		}
	}

	public function index()
	{
		$this->template->load('../admin/template/template', 'admin/home', $this->data);
	}

	public function logout()
	{
		session_destroy();

		redirect(base_url());
	}
}