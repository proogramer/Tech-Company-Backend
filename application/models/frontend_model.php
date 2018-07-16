<?php
class frontend_model extends CI_Model
{
	public function __construct()
	{

	}
	public function insert($image)
	{
		$personal_data=array(
			'name'=>$this->input->post('first_name'),
			'email'=>$this->input->post('email'),
			'mobile'=>$this->input->post('mobile'),
			'permanent_address'=>$this->input->post('permanent_address'),
			'present_address'=>$this->input->post('present_address'),
			'pencard'=>$this->input->post('pencard'),
			'gst'=>$this->input->post('gst'),
			'company_type'=>$this->input->post('company_type'),
			'technology'=>$this->input->post('technology'),
			'is_delete'=>'1'
		);
		$this->db->insert('vendor_details',$personal_data);
		$vendor_id = $this->db->insert_id();
		$account_data=array(
			'full_name'=>$this->input->post('full_name'),
			'bank_name'=>$this->input->post('bank_name'),
			'branch_name'=>$this->input->post('branch_name'),
			'account_no'=>$this->input->post('account_no'),
			'ifsc_code'=>$this->input->post('ifsc_code'),
			'vendor_id'=>$vendor_id,
			'image'=>$image,
			'is_delete'=>'1'
		);
		$this->db->insert('account_details',$account_data);
		$output = json_encode(array('type'=>'success', 'text' => '2'));
		die($output);
	}
} 
?>