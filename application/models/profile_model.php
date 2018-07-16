<?php
class Profile_model extends CI_Model
{
    public function __construct()
    {

    }
    public function profile_data()
    {
        if($this->session->userdata('logged_in'))
        {
            $login_id=$this->session->userdata('login_id');
            $this->db->select('');
            $this->db->where('id',$login_id);
            $query=$this->db->get('admin');
            //$sql=$this->db->last_query();
            //echo $sql;
            //die;
            return $query->row_array();
        }
    }
    public function edit_data($id)
    {
        $this->db->select('');
        $this->db->where('id',$id);
        $query=$this->db->get('admin');
        return $query->row_array();
    }
    public function edit_profile_action($id)
    {
        $data=array(
            'admin_name'=>$this->input->post('name'),
            'admin_email'=>$this->input->post('email'),
            'mobile'=>$this->input->post('mobile'),
        );

        $this->db->where('id',$id);
        $this->db->update('admin',$data);
        //echo $sql=$this->db->last_query();
        echo json_encode(array('type'=>'success'));
    }
    public function exist_password($id)
    {
        $pass=$this->input->post('current_password');
       // $data=array('admin_password'=>$pass);
        $this->db->select('admin_password');
        $this->db->where('id',$id);
        $query=$this->db->get('admin');
        $result=$query->row_array();
        if($result['admin_password']===$pass)
        {
            echo 'true';
        }
        else{
            echo 'false';
        }
    }
    public function change_password_action()
    {
        $login_id=$this->session->userdata('login_id');
        $data=array(
            'admin_password'=>$this->input->post('password')
        );
        $this->db->where('
        id',$login_id);
        $this->db->update('admin',$data);
        echo json_encode(array('type'=>'success'));
    }
}
?>