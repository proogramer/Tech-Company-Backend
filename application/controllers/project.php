<?php
class Project extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('logged_in'))
        {
            redirect('admin/login');
        }
    }
    public function add_project()
    {
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/project/add_project');
        $this->load->view('admin/templates/footer');
    }
    public function add_project_action()
    {
        $this->project_model->add_project_action();
    }
    public function view_all_project()
    {
        $project['data']=$this->project_model->view_all_project();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/project/view_all_project',$project);
        $this->load->view('admin/templates/footer');
    }
    public function edit($id)
    {
        $edit['data']=$this->project_model->edit_form($id);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/project/update',$edit);
        $this->load->view('admin/templates/footer');

    }
    public function edit_project_action()
    {
        $id=$this->input->post('id');
        $this->project_model->edit_project_action($id);
    }
    public function delete()
    {
        $this->project_model->delete();
    }
}
?>