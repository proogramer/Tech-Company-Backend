<?php
class Project_model extends CI_Model
{
    public function __construct()
    {

    }
    public function add_project_action()
    {
        $data=array(
            'project_name'=>$this->input->post('project_name'),
            'client_name'=>$this->input->post('client_name'),
            'owner_name'=>$this->input->post('owner_name'),
            'start_date'=>$this->input->post('start_date'),
            'end_date'=>$this->input->post('end_date'),
            'responsible'=>$this->input->post('responsible'),
            'status'=>$this->input->post('status'),
            'is_delete'=>'1'
        );
        $this->db->insert('project',$data);
        $output = json_encode(array('type'=>'success'));
        die($output);
    }
    public function view_all_project()
    {
        $this->db->select('');
        $this->db->where('is_delete','1');
        $query=$this->db->get('project');
        //$sql = $this->db->last_query();
        return $query->result_array();
    }
    public function edit_form($id)
    {
        $this->db->select('');
        $this->db->where('id',$id);
        $query=$this->db->get('project');
        return $query->row_array();
    }
    public function edit_project_action($id)
    {
        $project_data=array(
            'project_name'=>$this->input->post('project_name'),
            'client_name'=>$this->input->post('client_name'),
            'owner_name'=>$this->input->post('owner_name'),
            'start_date'=>$this->input->post('start_date'),
            'end_date'=>$this->input->post('end_date'),
            'responsible'=>$this->input->post('responsible'),
            'status'=>$this->input->post('status')
        );

        $this->db->where('id',$id);
        $this->db->update('project',$project_data);
        $output = json_encode(array('type'=>'success'));
        die($output);
    }
    public function delete()
    {
        $where = array(
            'is_delete'	=>'0',
            );
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('project', $where);
        $output = json_encode(array('type'=>'success'));
        die($output);

    }
}
?>