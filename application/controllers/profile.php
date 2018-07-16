<?php
Class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('logged_in'))
        {
            redirect('admin/login');
        }
    }
    public function profile()
    {
        $profile['fetch']=$this->profile_model->profile_data();
        //var_dump($profile);
       // die;
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/profile/profile',$profile);
        $this->load->view('admin/templates/footer');
    }
    public function edit_profile($id)
    {
        $edit['fetch']=$this->profile_model->edit_data($id);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/profile/edit_profile',$edit);
        $this->load->view('admin/templates/footer');
    }
    public function edit_profile_action()
    {
        $id=$this->input->post('hidden_id');
        $this->profile_model->edit_profile_action($id);
    }
    public function exist_password()
    {
        $login_id=$this->session->userdata('login_id');
        $this->profile_model->exist_password($login_id);
    }
    public function change_password_action()
    {
        $this->profile_model->change_password_action();
    }

}
?>