<?php

class Img_cont extends CI_Controller{
    public function index(){
        $this->load->view('img_up');
    }
    public function Img_view(){
      // $data = array('img_name'=>array(),'img_id'=>array());
      $arr = array();
        $query = $this->db->get('gallery');
        foreach($query->result_array() as $img){
         
        $arr[] = array('image'=>$img['img_nm'],'imgid'=>$img['img_id']);
        }
        $data['imgarr'] = $arr;
        $this->load->view('imgs_view',$data);
    }
   
    public function Img_up(){
        if(isset($_POST['upload'])){
           if($_FILES['file_upload']['error'] == 0 ){
               $file_temp = $_FILES['file_upload']['tmp_name'];
               $dir = "./uploads/";
               if(! is_dir($dir)) die("UPLOAD DIRECTORY DOSENT EXSIST");
               $file_name =basename($_FILES['file_upload']['name']);
               if(move_uploaded_file($file_temp,$dir."/".$file_name)){
                   echo"File Moved Sucessfully";
               }else echo"ERROR:Moving Files";
        
              $query =  $this->db->insert('gallery',array('img_nm'=>$file_name));
              if($query){
                  $this->session->set_flashdata('message','Image_uploaded sucessfully!!!');
                  redirect(base_url('index.php/img_cont/img_view'));
              }else echo"Image Already Exsist or Error Uploading Images";
           
           }else echo"ERROR:Uploading File";
        }
    }
    public function Img_updt($parm=null){
        $this->load->view('updt_imgs');
        $parm = $this->uri->segment(3);
                if(isset($_POST['upload'])){
                  if($_FILES['file_upload']['error'] == 0 ){
               $file_temp = $_FILES['file_upload']['tmp_name'];
               $dir = "./uploads/";
               if(!is_dir($dir)) die("UPLOAD DIRECTORY DOSENT EXSIST");
               $file_name =basename($_FILES['file_upload']['name']);
               $this->db->where('img_id',$parm);
               $query =  $this->db->update('gallery',array('img_nm'=>$file_name));
               if($query){
                   if(move_uploaded_file($file_temp,$dir."/".$file_name)){
                   echo"File Moved Sucessfully";
               }else echo"ERROR:Moving Files";
                   $this->session->set_flashdata('message','Image updated sucessfully!!!');
                  redirect(base_url('index.php/img_cont/img_view'));
              }else echo"Image Already Exsist or Error Uploading Images";
           }else echo"ERROR:Uploading File";
        }
    }
    public function Img_updt_prcs($image_id=null){  
    }  
}