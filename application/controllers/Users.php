<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 

 class Users extends CI_Controller {
  	function __construct(){
        parent::__construct();
        $this->load->model('Usermodel');
    }
    public  function index(){
		$data['h']=$this->Usermodel->user_list();
		$user = json_encode($data);
        $this->load->view('/users/index',$data);

    }
 
    public function user_data(){
        $data=$this->Usermodel->user_list();
        echo json_encode($data);
    }
 
    public function save(){ 
      try{
      $this->form_validation->set_rules('user_name', 'user_name', 'required|min_length[5]|max_length[12]');

        $user=$this->Usermodel->save_user();
        redirect('users');   
    }
    catch(Exception $e){
      echo $e->getMessage();
    }
  }
    public function edit(){
        $user=$this->Usermodel->edit_user();
       echo json_encode($user);

    }

    public  function update(){
      $data=$this->Usermodel->update_user();  
      redirect('users');
      }
 
    public  function delete(){
      $this->Usermodel->delete_user();
      redirect('users');
    }
 
}

?>