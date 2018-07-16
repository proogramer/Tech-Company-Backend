<?php
class Payment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('logged_in'))
        {
            redirect('admin/login');
        }
    }
    public function add_payment()
    {

        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/payment/add_payment');
        $this->load->view('admin/templates/footer');
    }
    public function add_payment_action()
    {
        $this->payment_model->add_payment_action();
    }
    public function view_all_payment()
    {
        $payment['data']=$this->payment_model->view_all_payment();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/payment/view_all_payment',$payment);
        $this->load->view('admin/templates/footer');
    }
    public function edit($id)
    {
        $payment['data']=$this->payment_model->edit_payment_data($id);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/payment/edit_payment',$payment);
        $this->load->view('admin/templates/footer');
    }
    public function edit_payment_action()
    {
        $id=$this->input->post('hidden_id');
        $this->payment_model->edit_payment_action($id);
    }
    public function delete_payment()
    {
        $this->payment_model->delete_payment();
    }
}
?>