<?php

class Ajtest extends CI_Controller{
    public function index(){
        $this->db->distinct();
        $this->db->select('country');
        $contry_query = $this->db->get('test');
        $contry = array();
        foreach($contry_query->result_array() as $cont){
            $contry[] = array('country'=>$cont['country']);
        }
        $data['country'] = $contry;
        $this->load->view('Aj_view',$data);
    }
    public function Ajx_test($parm1=null,$parm2=null){
        $parm1 = $this->uri->segment(3);
        $st = array();
       // echo"<select id = \"state\"><option vlaue = \"\">States</option>";
        foreach($state_query->result_array() as $stat){
           $st[] = $stat['state'];
           // echo"<option vlaue=\"".$stat['state']."\">".$stat['state']."</option>";
        }
       // echo"</select><br/><br/>";
       /* $parm2=$this->uri->segment(4);
        $this->db->select('city');
        $city_query = $this->db->get_where('test',array('state'=>$parm2));
        $ct = array();
        echo"<select id = \"state\"><option vlaue = \"\">Cities</option>";
        foreach($city_query->result_array() as $cty){
            echo"<option vlaue=\"".$cty['city']."\">".$cty['city']."</option>";
        }
        echo"</select><br/><br/>";
        $this->index(); */
        print_r($st);
        exit;
    }
    public function Ajx_state_list($country_nm){
        $this->db->distinct();
        $this->db->select('state');
        $state_query = $this->db->get_where('test',array('country'=>$country_nm))->result();
         $st = array();
        $output ="<option vlaue =\"\">Select  States</option>";
        // $output = "<select id=\"state\" onChange=\"getcitydetails(this.value)\"><option value=\"\">Select States</option>";
         foreach($state_query as $state){
             $output.="<option value=\"".$state->state."\">".$state->state."</option>";
         }
         //$output.="</select>";
        print_r($output);exit;
       // $data['state'] = $output;
        //$this->load->view('aj_view',$data);        
    }
    public function Ajx_city_list($state_nm){
        $this->db->select('city');
        $city_query = $this->db->get_where('test',array('state'=>$state_nm));
       //$output = "";
        $output="<select id = \"city\"><option vlaue = \"\">Select Cities</option>";
        foreach($city_query->result_array() as $cty){
            $output.="<option vlaue=\"".$cty['city']."\">".$cty['city']."</option>";
        }
        //$output.="</select><br/><br/>";
        print_r($output);exit;
    }
}