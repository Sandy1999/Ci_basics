<?php 

class User_cont extends CI_Controller{
    public function index(){
        $count = array();
        $country_query =  $this->db->get('country')->result_array();
        foreach($country_query as $country){
            $count[] = array('country_name'=>$country['country_name'],
                                'country_id'=>$country['country_id']);
        }
        $data['country'] = $count;
        $this->load->view('newuser_view',$data);
    }
    public function ajx_state($parm){
        $state_query =  $this->db->from('state')->where('country_id',$parm)->get()->result_array();
        $output = "<option value=\"\">Select State</option>";
        foreach($state_query as $state){
            $output.="<option value = \"".$state['state_id']."\">".$state['state_name']."</option>";
        }
        print_r($output);exit;
    }
    public function ajx_city($parm){
        $city_query =  $this->db->from('city')->where('state_id',$parm)->get()->result_array();
        $output = "<option value=\"\">Select City</option>";
        foreach($city_query as $city){
            $output.="<option value = \"".$city['city_id']."\">".$city['city_name']."</option>";
        }
        print_r($output);exit;   
    }
    public function create(){
        if(isset($_POST['new_user'])){
            $data = array('user_name'=>$this->input->post('name'),
                    'user_email'=>$this->input->post('email'),
                    'user_mobile'=>$this->input->post('number'),
                    'user_country'=>$this->input->post('country'),
                    'user_state'=>$this->input->post('state'),
                    'user_city'=>$this->input->post('city'));
            print_r($data);exit;
        }
    }
}