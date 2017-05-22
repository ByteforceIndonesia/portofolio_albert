<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	function __construct ()
	{
		//Inherit from parent
		parent::__construct();

		$this->data['abilities'] 	= $this->crud_model->read('ability');
		$this->data['experience'] 	= $this->crud_model->read('experience');
		$this->data['portfolio']	= $this->crud_model->read('portfolio');
		$this->data['quotes']		= $this->crud_model->read('quotes'); 
	}

	public function index()
	{
		$this->template->load('template_home', 'home', $this->data);
	}
}