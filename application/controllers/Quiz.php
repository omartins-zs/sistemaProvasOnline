<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quiz extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	
	}

	public function index()
	{
		$data['subview'] = 'index';
		$this->load->view('templates/quiz_layout', $data);
		// $this->load->view('welcome_message');
	}
}
