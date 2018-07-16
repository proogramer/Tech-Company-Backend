<?php
class Vendor extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        if(!$this->session->userdata('logged_in'))
        {
            redirect('admin/login');
        }
	}
	public function add_vendor()
	{
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/navigation');
		$this->load->view('admin/vendor/add_vendor');
		$this->load->view('admin/templates/footer');
	}
	public function insert_vendor()
    {
        $config['upload_path']='./assets/images';
        $config['allowed_types']='gif|jpg|png';
        $config['max_size']='2048';
        $config['max_width']='500';
        $config['max_height']='500';
        $this->load->library('upload',$config);
        $data= array('upload_data' =>$this->upload->data());
        $image=$_FILES['userfile']['name'];

        $this->admin_model->insert_vendor($image);
    }
    public function view_all_vendor()
    {
        $vendor['data']=$this->admin_model->view_all_vendor();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/vendor/v_all_vendor',$vendor);
        $this->load->view('admin/templates/footer');
    }
    public function model()
    {
        $acccount_model=$this->admin_model->account_model();
        $model=$this->admin_model->model();
        $data = [
            'name'=>$model['name'],
            'email'=>$model['email'],
            'mobile'=>$model['mobile'],
            'permanent_address'=>$model['permanent_address'],
            'present_address'=>$model['present_address'],
            'technology'=>$model['technology'],
            'company_type'=>$model['company_type'],
            'pencard'=>$model['pencard'],
            'gst'=>$model['gst'],
            'full_name'=>$acccount_model['full_name'],
            'bank_name'=>$acccount_model['bank_name'],
            'branch_name'=>$acccount_model['branch_name'],
            'account_no'=>$acccount_model['account_no'],
            'ifsc_code'=>$acccount_model['ifsc_code'],
        ];
        echo json_encode($data);
    }
    public function edit($id)
    {
        $edit['data']=$this->admin_model->edit_data($id);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/vendor/edit_vendor',$edit);
        $this->load->view('admin/templates/footer');
    }
    public function edit_vendor()
    {
        $id=$this->input->post('hidden_id');
        $this->admin_model->update($id);
    }
    public function delete()
    {
        $id=$this->input->post('id');
        $this->admin_model->delete($id);
    }

} 
?>