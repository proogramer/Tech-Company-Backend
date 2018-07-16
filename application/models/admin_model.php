<?php
class Admin_model extends CI_Model
{
	public function __construct()
	{

	}
	public function insert()
	{
		$email=$this->input->post('email');
		$pass=$this->input->post('pass');
		$this->db->where('admin_email',$email);
		$this->db->where('admin_password',$pass);
		$query=$this->db->get('admin');
		if($query->num_rows() ==1)
		{
			return $query->row(0)->id;
		}
		else
		{
			return false;
		}
	}
	public function insert_vendor($image)
    {
        $vendor_data=array(
            'name'=>$this->input->post('name'),
            'email'=>$this->input->post('email'),
            'mobile'=>$this->input->post('mobile'),
            'permanent_address'=>$this->input->post('permanent_address'),
            'present_address'=>$this->input->post('present_address'),
            'pencard'=>$this->input->post('pencard'),
            'gst'=>$this->input->post('gst'),
            'technology'=>$this->input->post('technology'),
            'company_type'=>$this->input->post('company_type'),
            'is_delete'=>'1'
        );
        $this->db->insert('vendor_details',$vendor_data);
        $vendor_id = $this->db->insert_id();
        $account_data=array(
           'full_name'=>$this->input->post('full_name'),
            'bank_name'=>$this->input->post('bank_name'),
            'branch_name'=>$this->input->post('branch_name'),
            'ifsc_code'=>$this->input->post('ifsc_code'),
            'account_no'=>$this->input->post('account_no'),
            'vendor_id'=>$vendor_id,
            'image'=>$image,
            'is_delete'=>'1'
        );
        $this->db->insert('account_details',$account_data);
        $output = json_encode(array('type'=>'success', 'text' => '2'));
        die($output);
    }
    public function view_all_vendor()
    {
        $this->db->select('');
        $this->db->from('vendor_details');
        $this->db->where('is_delete',1);
        $query=$this->db->get();
        return $query->result_array();
    }
    public function model()
    {
        $id=$this->input->post('id');
        $this->db->select('');
        $this->db->from('vendor_details');
        $this->db->where('id',$id);
        $query=$this->db->get();
        return $query->row_array();
    }
    public function account_model()
    {
        $id=$this->input->post('id');
        $this->db->select('');
        $this->db->from('account_details');
        $this->db->where('vendor_id',$id);
        $query=$this->db->get();
        return $query->row_array();
    }
    public function edit_data($id)
    {
        $this->db->select('');
        $this->db->from('vendor_details');
        $this->db->from('account_details');
        $this->db->where('vendor_details.id',$id);
        $this->db->where('account_details.vendor_id',$id);
        $query=$this->db->get();
        return $query->row_array();
    }
    public function update($id)
    {
        $vendor_data=array(
            'name'=>$this->input->post('name'),
            'email'=>$this->input->post('email'),
            'mobile'=>$this->input->post('mobile'),
            'permanent_address'=>$this->input->post('permanent_address'),
            'present_address'=>$this->input->post('present_address'),
            'pencard'=>$this->input->post('pencard'),
            'gst'=>$this->input->post('gst'),
            'technology'=>$this->input->post('technology'),
            'company_type'=>$this->input->post('company_type'),
            'is_delete'=>'1'
        );
        $this->db->where('id',$id);
        $this->db->update('vendor_details', $vendor_data);
        $account_data=array(
            'full_name'=>$this->input->post('full_name'),
            'bank_name'=>$this->input->post('bank_name'),
            'branch_name'=>$this->input->post('branch_name'),
            'ifsc_code'=>$this->input->post('ifsc_code'),
            'account_no'=>$this->input->post('account_no'),
            'is_delete'=>'1'
        );
       $this->db->where('vendor_id',$id);
       $this->db->update('account_details',$account_data);
        //$sql = $this->db->last_query();
       // echo $sql;
        $output = json_encode(array('type'=>'success', 'text' => '2'));
        die($output);
    }
    public function delete($id)
    {
        $account_data=array(
            'is_delete'=>'0'
        );
        $vendor_data=array(
            'is_delete'=>'0'
        );
        $this->db->where('vendor_id',$id);
        $this->db->update('account_details',$account_data);
        $this->db->where('id',$id);
        $this->db->update('vendor_details',$vendor_data);
        $sql=$this->db->last_query();
        $output = json_encode(array('type'=>'success'));
        die($output);
    }

}
?>