<?php

class Dash_cont extends CI_Controller{

    public function index(){
        if(isset($_SESSION['logged_in'])){
            $this->load->view('dash');   
        }else{
            redirect(base_url('index.php/hello'));
        }
    }
    public function Update_admins(){
       if(isset($_POST['ch_pwd'])){
        $this->load->view('update_admin');   
       }else redirect('index.php/dash_cont');
    }
    public function updt_prcs(){
     if(isset($_POST['ch_pwd'])){
        $data = array(
                'username'=>$this->input->post('username'),
                'password'=>$this->input->post('password'));
        $this->db->select('user_id');
        $query =  $this->db->get_where('admins',array('username'=>$data['username']));
        foreach($query->result_array() as $rows){
            $id = $rows['user_id'];
        }
        if(!empty($id)){
            $updt = $this->test->update_tbl('admins',$data,$id);
        if($updt){
            $this->session->set_flashdata('message','Admin Updated Sucessfully');
            redirect(base_url('index.php/dash_cont'));
        }else echo "Not A valid Admin";
        }else{
            $this->session->set_flashdata('message','You are not authorize to do update other users...');
            redirect(base_url('index.php/dash_cont'));
        }
    }else redirect(base_url('index.php/dash'));
    }
    public function del_admn(){
        if(isset($_POST['del'])){
          $data = array(
                'username'=>$this->input->post('username'),
                'password'=>$this->input->post('password'));   
	    $query = $this->db->get_where('admins',array('username'=>$_SESSION['username']));
			foreach($query->result_array() as $rows){
			$pwd = $rows['password'];
            $id=$rows['user_id'];
		}
		if($data['password']==$pwd){
			$del = $this->test->del_dta('admins',$id);
            if($del){
                redirect('hello');
            }
		}else{
            $_SESSION['message']="Can't Delete User, Username or Password Doesen't match";
            redirect(base_url('index.php/dash_cont')); 
        } 
        }
    }
    public function lg_out(){
        $this->session->unset_userdata('logged_in');
        redirect(base_url('index.php/hello'));
    }
}