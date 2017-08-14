<?php
/**
* 
*/
class Test extends CI_Model
{
	
	public function abc($tb_name,$data_array) 
	{
		$var1 = $this->db->insert($tb_name,$data_array);
		if($var1){
			redirect(base_url('index.php/Dash_cont'));
			exit;
		}else echo "Cant";
	}
	public function update_tbl($tb_name,$data_array,$id)
	{
		 $this->db->where('user_id',$id);
		 $updt = $this->db->update($tb_name,$data_array);
		 return $updt;
	}
	public function del_dta($tb_name,$id){
		$this->db->where('user_id',$id);
		$this->db->delete($tb_name);
		return true;
	}
	public function lg_in($usr,$usr_pwd){
		$pwd="";
		$this->db->select('password');
	    $query = $this->db->get_where('admins',array('username'=>$usr));
		if($query){
			foreach($query->result_array() as $rows){
			$pwd = $rows['password'];
			}
		}else return false;
		if($usr_pwd == $pwd){
			return $pwd;
		}else return false;
	}
}