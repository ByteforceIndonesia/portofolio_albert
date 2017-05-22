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

	public function webconfig()
	{
		$this->data['quotes'] 			= $this->admin_model->get('quotes');
		$this->data['experiences']		= $this->admin_model->get('experience');
		$this->data['abilities']		= $this->admin_model->get('ability');
		$this->data['portfolios']		= $this->admin_model->get('portfolio');
		$this->data['message']			= $this->session->flashdata('message');
		$this->data['config']			= $this->admin_model->get('config');

		$this->template->load('../admin/template/template', 'admin/webconfig', $this->data);
	}

	public function newexperience ()
	{
		$this->load->view('admin/new_experience');
	}

	public function newportfolio ()
	{
		$this->load->view('admin/new_portfolio');
	}

	public function newability ()
	{
		$this->load->view('admin/new_ability');
	}

	public function changefooter ()
	{
		echo "yes";
	}

	public function editportfoliophoto($uuid = null)
	{
		$data['uuid'] = $uuid;

		if($_FILES)
		{
			echo '<pre>';
			print_r($_FILES);
			echo '</pre>';
			exit;
		}else
		{
			$this->load->view('admin/editportfoliophoto', $data);
		}
	}

	public function newinput($table)
	{
		if(!$_POST)
			return;

		switch($table)
		{
			case 'experience':
			{
				$data = array(
					'year'			=> $this->input->post('year'),
					'value' 		=> $this->input->post('value'),
					'nested_value'	=> $this->input->post('inner_value')
					);

				if($this->admin_model->create_new($table, $data))
					$this->session->set_flashdata('message', 'Create new Experience Success!');
				redirect('admin/webconfig');
			}break;

			case 'porfolio':
			{
				$uuid = uniqid();

				$data = array(
					'uuid'			=> $uuid,
					'name'			=> $this->input->post('year'),
					'link' 			=> $this->input->post('value')
					);

				if($this->admin_model->create_new($table, $data))
					$this->session->set_flashdata('message', 'Create new Portfolio Success!');
				redirect('admin/webconfig');
			}break;

			case 'ability':
			{
				$data = array(
					'language'			=> $this->input->post('language'),
					'value' 			=> $this->input->post('value')
					);

				if($this->admin_model->create_new($table, $data))
					$this->session->set_flashdata('message', 'Create new Ability Success!');
				redirect('admin/webconfig');
			}break;
		}
	}

	public function quotes ()
	{
		if(!$_POST)
			return false;

		$quotes = array(
			$this->input->post('quote_one'),
			$this->input->post('quote_two'),
			$this->input->post('quote_three')
			);

		if($this->admin_model->editQuotes($quotes))
			echo "Success"; 
	}

	public function edit($table)
	{
		if(!$_POST)
			return false;

		$data = array (
			$this->input->post('field') => $this->input->post('value')
			);

		$where = array(
			'id' => $this->input->post('id')
			);

		if($this->admin_model->edit($table, $data, $where))
			echo "Success!";
	}

	public function delete($table)
	{
		$id = $this->input->post('id');

		if($this->crud_model->delete($table, array('id' => $id)))
			echo "Success";
	}

	public function imageupload($table = null)
	{
		switch($table)
		{
			case 'quotes':
			{
				$upload = $this->admin_model->quotesImages($_FILES);

				$this->session->set_flashdata('message', $upload);
				redirect('admin/webconfig');
			}break;

			default:
			{
				return;
			}
		}
	}

	public function logout()
	{
		session_destroy();

		redirect(base_url());
	}
}