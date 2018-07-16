<?php
class Admin_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session'); 
	}
	public function index()
	{
		if(!$this->session->userdata('logged_in'))
         {
         	redirect('admin/login');
         }
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/navigation');
		$this->load->view('admin/pages/home');
		$this->load->view('admin/templates/footer');
	}
	public function login()
	{
		$this->load->view('admin/login/login_page');
	}
	public function login_action()
	{
		$login_id=$this->admin_model->insert();
		if($login_id)
		{
			$user_data=array(
				'login_id'=>$login_id,
				 'logged_in'=>true
			);
			$this->session->set_userdata($user_data);
			$output = json_encode(array('type'=>"success"));
				die($output);

		}
		else
		{
			$output = json_encode(array('type'=>'error'));
				die($output);
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('login_id');
		$this->session->unset_userdata('logged_in');
		redirect('admin/login');

	}
}
?>