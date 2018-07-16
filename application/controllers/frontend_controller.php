<?php
class frontend_controller extends CI_Controller
{
	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		//Front End View
		$this->load->view('frontend/header.php');
		$this->load->view('frontend/index');
	}
	public function insert()
	{
		//validations
		$this->form_validation->set_rules('first_name','First Name','required');
		$this->form_validation->set_rules('last_name','Last Name','required');
		$this->form_validation->set_rules('email','E-mail','required');
		$this->form_validation->set_rules('mobile','Mobile','required');
		$this->form_validation->set_rules('permanent_address','Permanent Address','required');
		$this->form_validation->set_rules('present_address','Present Address','required');
		$this->form_validation->set_rules('pencard','pencard','required');
		$this->form_validation->set_rules('gst','GST','required');
		$this->form_validation->set_rules('company_type','Company Type','required');
		$this->form_validation->set_rules('technology','Technology','required');
		$this->form_validation->set_rules('full_name','Full Name','required');
		$this->form_validation->set_rules('bank_name','Bank Name','required');
		$this->form_validation->set_rules('branch_name','Branch Name','required');
		$this->form_validation->set_rules('account_no','Account Number','required');
		$this->form_validation->set_rules('ifsc_code','IFSC code','required');
		if($this->form_validation->run() ===false)
		{
			$this->load->view('frontend/header.php');
			$this->load->view('frontend/index');
		}
		//Insertion Values
		else
		{
			$config['upload_path']='./assets/images';
			$config['allowed_types']='gif|jpg|png';
			$config['max_size']='2048';
			$config['max_width']='500';
			$config['max_height']='500';

			$this->load->library('upload',$config);

			if(!$this->upload->do_upload())
			{
				$output = json_encode(array('type'=>'success'));
				die($output);
			}
			else
			{
				$data= array('upload_data' =>$this->upload->data());
				$image=$_FILES['userfile']['name'];
			}
			$this->frontend_model->insert($image);
		} 
	}
}
?>