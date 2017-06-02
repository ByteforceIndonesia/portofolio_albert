<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	function __construct ()
	{
		//Inherit from parent
		parent::__construct();

		$this->load->model('analytics_model');

		$this->analytics_model->init();
		$this->analytics_model->getFirstProfileId();

		//Check if already signed in
		if(is_null($this->session->userdata('loggedIn')))
		{
			redirect(base_url('login'));
		}
	}

	public function index()
	{
		$this->data['analytics_realtime'] = $this->analytics_model->getRealtimeVisitor();
		$this->data['analytics']		= $this->analytics_model->getResults();
		$this->data['analytics_chart']	= $this->analytics_model->getChart();
		$this->data['countries']		= $this->analytics_model->getCountries();
		$this->data['unique']			= $this->analytics_model->getUniqueVisitor();
		$this->data['returning']		= $this->analytics_model->getReturningVisitor();
		$this->data['page']				= "Dashboard";
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
		$this->data['page']				= "Web Configuration";

		$this->template->load('../admin/template/template', 'admin/webconfig', $this->data);
	}

	public function getRealTimeVisitor ()
	{
		echo $this->analytics_model->getRealtimeVisitor();
	}

	public function newexperience ()
	{
		$this->load->view('admin/new_experience');
	}

	public function newportfolio ()
	{
		$this->load->view('admin/new_porfolio');
	}

	public function newability ()
	{
		$this->load->view('admin/new_ability');
	}

	public function changefooter ()
	{
		$email 		= array('value_1'	=> $this->input->post('email'));
		$phone		= array('value_1'	=> $this->input->post('phone'));
		$ig 		= array('value_1'	=> $this->input->post('ig'));
		$linkedin 	= array('value_1'	=> $this->input->post('linkedin'));

		$this->crud_model->update('config', $email, array('name' => 'email'));
		$this->crud_model->update('config', $phone, array('name' => 'phone'));
		$this->crud_model->update('config', $ig, array('name' => 'ig'));
		$this->crud_model->update('config', $linkedin, array('name' => 'linkedin'));

		echo 'yes';
	}

	public function editportfoliophoto($uuid = null)
	{
		$data['uuid'] = $uuid;

		if($_FILES)
		{
			$image_name = $this->input->post('uuid');

			$config['upload_path']          = './assets/images/upload/portfolio';
	        $config['allowed_types']        = 'png|jpg|jpeg';
	        $config['max_size']             = 5000;
	        $config['overwrite']			= true;
	        $config['file_name']			= $image_name;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if(!$this->upload->do_upload('edit_port'))
			{
				$this->session->set_flashdata('message', $this->upload->display_errors());
				redirect(base_url('admin/webconfig'));
			}else
			{
				$this->session->set_flashdata('message', 'Edit Portfolio Image Success!');
				redirect(base_url('admin/webconfig'));
			}

		}else
		{
			$this->load->view('admin/editportfoliophoto', $data);
		}
	}

	public function newinput($table)
	{
		if(!$_POST)
		{
			redirect(base_url('admin/webconfig'));
			exit;
		}

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

			case 'portfolio':
			{
				$uuid = uniqid();

				$file_name = $this->admin_model->uploadPortfolio($_FILES, $uuid);

				$data = array(
					'uuid'			=> $uuid,
					'name'			=> $this->input->post('name'),
					'link' 			=> $file_name
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

	public function edit($table, $value = null)
	{
		if(!$_POST)
			return false;

		if($value && $table == "ability")
		{
			$data = array('value' => $this->input->post('value'));
			$where = array ('id' => $this->input->post('id'));

			if($this->admin_model->edit($table,$data, $where))
				echo 'Success!';
		}else
		{
			$data = array (
			$this->input->post('field') => $this->input->post('value')
			);

			$where = array(
				'id' => $this->input->post('id')
				);

			if($this->admin_model->edit($table, $data, $where))
				echo "Success!";
		}
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