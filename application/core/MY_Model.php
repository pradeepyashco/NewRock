<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* Basic Class For General use class */

class MY_Model extends CI_Model
{
	function InsertRecord($TableName,$Data){
		$this->db->insert($TableName, $Data); 
		return $this->db->insert_id();
	}
	
	function UpdateRecord($TableName,$Data,$WhereData=NULL){
		if($WhereData!=NULL){$this->db->where($WhereData);}
		$Result = $this->db->update($TableName,$Data);  
		return $Result;
	}
	
	function DeleteRecord($TableName,$Data,$WhereData){
		$this->db->where($WhereData);
		$this->db->update($TableName,$Data);  
		return $this->db->affected_rows();
	}
	function CountRecord($TableName,$WhereData){
		
		$this->db->where($WhereData);
		$this->db->from($TableName);
		return $this->db->count_all_results();
	}

	public function countrecords_rows($TableName,$group_by)
	{
		$this->db->group_by($group_by);
		$this->db->from($TableName);  
		$query = $this->db->get();        
		return $query->num_rows();
	}
	
	function SelectSingleRecord($TableName,$Selectdata,$WhereData=array(),$orderby=array()){
		$this->db->select($Selectdata);
		if(!empty($orderby)){
			$this->db->order_by($orderby);
		}
		if(!empty($WhereData)){
			$this->db->where($WhereData);
		}
		$query = $this->db->get($TableName);		
		return $query->row();
	}
		
	function SelectRecord($TableName,$Selectdata,$WhereData,$orderby){
		$this->db->select($Selectdata);
		if(!empty($orderby)){
			$this->db->order_by($orderby);
		}
		if(!empty($WhereData)){
			$this->db->where($WhereData);
		}
		$query = $this->db->get($TableName);
		
		return $query->result_array();
	}


	function SelectRecordpaginatoin($TableName,$Selectdata,$WhereData,$orderby,$limit,$start){
		$this->db->limit($limit,$start);
		$this->db->select($Selectdata);
		$this->db->order_by($orderby);
		$this->db->where($WhereData);
		$query = $this->db->get($TableName);
		return $query->result_array();
	}
  
	function joindatapagination($place1,$place2,$WhereData,$Selectdata,$TableName1,$TableName2,$orderby,$limit,$start){
		$this->db->limit($limit,$start);
		$this->db->select($Selectdata);
		$this->db->from($TableName1);
		$this->db->join($TableName2, $place1 .'='. $place2);
		$this->db->order_by($orderby);
		$this->db->where($WhereData);
		$query = $this->db->get();
		return $query->result_array();
	}
	function joindata($place1,$place2,$WhereData,$Selectdata,$TableName1,$TableName2,$orderby){
		$this->db->select($Selectdata);
		$this->db->from($TableName1);
		$this->db->join($TableName2, $place1 .'='. $place2);
		$this->db->order_by($orderby);
		$this->db->where($WhereData);
		$query = $this->db->get();
		return $query->row_array();
	}

	function countrecords($TableName,$WhereData)
	{
		$this->db->where($WhereData);
		return $query=$this->db->count_all_results($TableName);
	}

	public function check_record_exist($TableName,$Arr)
	{
		$this->db->where($Arr);
		$query = $this->db->get($TableName);
		print_r($query->result_array());
		die();
//return  $query->result_array(); Subdomain users htaccess:-
/*<IfModule mod_rewrite.c>
   Options +FollowSymLinks
   Options +Indexes
   RewriteEngine On
   RewriteBase /
   RewriteCond %{HTTP_HOST} !www.example.com$ [NC]
   RewriteCond %{REQUEST_URI} ^/$
   RewriteCond %{HTTP_HOST} ^(www.)?([a-z0-9-_]+).example.com [NC]
   RewriteRule (.*) /index.php/controller/function/%2 [P]
 
   RewriteCond $1 !^(index\.php|images|robots\.txt|css|js)
   RewriteRule ^(.*)$ /index.php/$1 [L]
</IfModule> */ 


	}

}