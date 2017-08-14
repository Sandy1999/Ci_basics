<?php

class Address_cont extends CI_Controller{
    public function index(){
        $cont = array();
        $query_country = $this->db->get('country')->result_array();
        foreach($query_country as $country){
            $cont[] = array('country_id'=>$country['country_id'],'country_name'=>$country['country_name']); 
        }
        $view['country'] = $cont;
        $st = array();
        $query_state = $this->db->get('state')->result_array();
        foreach($query_state as $state){
            $st[] = array('state_id'=>$state['state_id'],'state_name'=>$state['state_name']); 
        }
        $view['state'] = $st;
        $this->load->view('address_view',$view);
        if(isset($_POST['country_btn']))
        {
            $data = array(
                'country_name'=>$this->input->post('country')
            );
            $this->form_validation->set_rules('country','Country','trim|required|is_unique[country.country_name]',
            array('required'=>'Country Name can\'t be left empty',
            'is_unique'=>'Country Already Exsist Please Enter a different Country' ));
            if($this->form_validation->run()==FALSE){
                echo validation_errors();
            }else{
                $query_country = $this->db->insert('country',$data);
                $_SESSION['message']  = "Country Inserted Successfully";
                $this->session->mark_as_flash('message');
                redirect(base_url('index.php/Address_cont')); 
            }
        }
        if(isset($_POST['state_btn'])){
            $data = array(
                'country_id'=>$this->input->post('country'),
                'state_name'=>$this->input->post('state')
            );
            $this->form_validation->set_rules('state','State','trim|required|is_unique[state.state_name]',
            array('required'=>'State Name can\'t be left empty',
            'is_unique'=>'State Already Exsist Please Enter a different Country' ));
            if($this->form_validation->run()==FALSE){
                echo validation_errors();
            }else{
                $query_country = $this->db->insert('state',$data);
                $_SESSION['message']  = "State Inserted Successfully";
                $this->session->mark_as_flash('message');
                redirect(base_url('index.php/Address_cont')); 
            }
        }
        if(isset($_POST['city_btn'])){
            $data = array(
                'state_id'=>$this->input->post('state'),
                'city_name'=>$this->input->post('city')
            );
            $this->form_validation->set_rules('city','City','trim|required|is_unique[state.state_name]',
            array('required'=>'City Name can\'t be left empty',
            'is_unique'=>'City Already Exsist Please Enter a different Country' ));
            if($this->form_validation->run()==FALSE){
                echo validation_errors();
            }else{
                $query_country = $this->db->insert('city',$data);
                $_SESSION['message']  = "City Inserted Successfully";
                $this->session->mark_as_flash('message');
                redirect(base_url('index.php/Address_cont')); 
            }
        }
    }
}