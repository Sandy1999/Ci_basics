<?php

class Hello extends CI_Controller{


    public function index(){
        $this->load->view('sign_in');
    }

    public function signup(){
    	if(isset($_POST['signup']))
    	{
    		$data=array('username'=>
    			 $this->input->post('username'),'password'=>
    		     $this->input->post('password')
    		    );
				$this->form_validation->set_rules('username','User Name','required|is_unique[admins.username]');
				$this->form_validation->set_rules('password','Password','required|min_lenght[6]');
				if($this->form_validation->run() == TRUE){
			    $newdata = array('username'=>$data['username'],'logged_in'=>TRUE);
				$this->session->set_userdata($newdata);
				$this->test->abc('admins',$data);
				redirect(base_url('index.php/dash_cont'));
				}else{
					$this->load->view('sign_in');
				}	
    	}
    	else
    	{
    		echo "Sorry";
    	}
   
    }
	function signin(){
		if(isset($_POST['login'])){
			$data = array(
				'username'=>$this->input->post('username'),
				'password'=>$this->input->post('password')
			);
			$pwd = $this->test->lg_in($data['username'],$data['password']);
			if($pwd){
				$newdata = array('username'=>$data['username'],'logged_in'=>TRUE);
				$this->session->set_userdata($newdata);
				redirect(base_url('index.php/Dash_cont'));
			}else echo "Invalid user";
		}
	}
	function testval(){
		if ($this->form_validation->run() == FALSE)
		{
			echo"test again!";
		}
		else
		{
			echo "Sucessful !!!!";
		} 
	}
}