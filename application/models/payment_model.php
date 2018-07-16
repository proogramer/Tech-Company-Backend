<?php
class Payment_model extends CI_Model
{
    public function __construct()
    {

    }
    public function add_payment_action()
    {
        $data=array(
            'project_name'=>$this->input->post('project_name'),
            'client_name'=>$this->input->post('client_name'),
            'payment'=>$this->input->post('payment'),
            'is_delete'=>'1'
        );
        $this->db->insert('payment',$data);
        $output = json_encode(array('type'=>'success'));
        die($output);
    }
    public function view_all_payment()
    {
        $this->db->select('');
        $this->db->where('is_delete','1');
        $query=$this->db->get('payment');
        return $query->result_array();
    }
    public function edit_payment_data($id)
    {
        $this->db->select('');
        $this->db->where('id',$id);
        $query=$this->db->get('payment');
        return $query->row_array();
    }
    public function edit_payment_action($id)
    {
        $data=array(
            'project_name'=>$this->input->post('project_name'),
            'client_name'=>$this->input->post('client_name'),
            'payment'=>$this->input->post('payment'),
        );
        $this->db->where('id',$id);
        $this->db->update('payment',$data);
        $output = json_encode(array('type'=>'success'));
        die($output);
    }
    public function delete_payment()
    {
        $id=$this->input->post('id');
        $data=array(
            'is_delete'=>'0',
        );
        $this->db->where('id',$id);
        $this->db->update('payment',$data);
        $sql = $this->db->last_query();
      $output = json_encode(array('type'=>'success'));
        die($output);
    }

}
?>

