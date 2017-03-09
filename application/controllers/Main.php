<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	function __construct ()
	{
		//Inherit from parent
		parent::__construct();
	}

	public function index()
	{
		$this->template->load('template_home', 'home', $this->data);
	}
}