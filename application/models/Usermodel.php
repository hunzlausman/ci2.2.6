<?php 
class Usermodel extends CI_Model {

var $title   = '';
var $content = '';
var $date    = '';

function __construct()
{
    // Call the Model constructor
    parent::__construct();
}
function user_list(){
    $hasil=$this->db->get('users');
    return $hasil->result();
}

function save_user(){
    try{
    $data = array(
        'user_name'  => $this->input->post('user_name'), 
        'email'  => $this->input->post('email'), 
            'phone_no' => $this->input->post('phone_no'), 
        );
   $this->db->insert('users',$data);}
   catch(Exception $e){
    echo $e->getMessage();
   }

}
function edit_user(){
    $id=$this->input->get('id');
    $data=$this->db->where("id", $id);
    $user=$this->db->get('users')->result();
    return $user;
}

function update_user(){
    $data = array(
        'user_name' => $this->input->get('user_name_edit'), // pass the real table name
        'email' => $this->input->get('email_edit'),
        'phone_no' => $this->input->get('phone_no_edit')
    );
    $id=$this->input->get('id');
    $this->db->where('id', $id);
   $dat= $this->db->update('users',$data);
}

function delete_user(){
    $id=$this->input->get('id');
    $this->db->where("id", $id);
    $this->db->delete('users');
}
}
?>