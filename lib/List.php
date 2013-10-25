<?php 
include_once 'Main.php';

class List extends Main
{
	public $db;
  
	
	
		public function  __construct()
		{
			$this->db = $this->load_model("Db");
			$this->table='posts';
		}
		
		
		
		
		
		
		
		public function getPost($where='',$s=true)
		{
			
			$q = "SELECT *from posts $where ";
			
			if($s)
			{
			$post = $this->db->get_row($q);
			}
			else 
			{
			$post = $this->db->get_rows($q);
			}
			return $post;
			
		}
		
		
		
	
		
		
		
		public function getAllPosts($get='*',$orderby ='posts.date', $option=''){
			
			 $q = "SELECT 
						  $get 
						FROM
						  posts,
						  users 
						WHERE posts.`user_id` = users.`user_id` $option 
						ORDER BY $orderby DESC ";
						

					$posts=	$this->db->get_rows($q);
				
	     return $posts;
					
				
			
			
		}
		
		
		public function insertPost($data)
		{
			//$this->initSession();
			
				// Getting values from the Form
				$post = mysql_real_escape_string($data['post']);
				$description = mysql_real_escape_string($data['description']);
				$type = mysql_real_escape_string($_POST['type']);
				$currency = mysql_real_escape_string($data['currency']);
				$amount = mysql_real_escape_string($data['amount']);
				$f_amount = str_replace(",", "", $amount); 
			
				$date_time = date('Y-m-d H:i:s');
				
				$user_id = $_SESSION['user_id'];
				
				$q = mysql_query("INSERT INTO `posts` (`id`, `post`, `description`, `type`, `date`, `amount`, `currency`, `user_id`) 
					VALUES ('NULL', '$post', '$description', '$type', '$date_time', '$f_amount', '$currency', '$user_id')");
				if($q){
					echo'success';
				}else{
					echo'failed';
				}
			
		}
		
		
		
		//search function 
		
		public function searchPost($crit)
		{
			
			
			$search = mysql_real_escape_string($crit);
			$crit  =strtolower($crit);
			$q = "SELECT 
				  * 
				  FROM
				  posts,users 
				  WHERE (LOWER(posts.post) LIKE '%$crit%' 
				  OR LOWER(posts.description) LIKE '%$crit%'
				  OR LOWER(users.first_name) LIKE '%$crit%'
				  OR LOWER(users.last_name) LIKE '%$crit%')
				  AND posts.`user_id` = users.`user_id`";
					

			$posts=	$this->db->get_rows($q);
	  		 return $posts;
				
		}
		
		
		public function getTotalTrusts($user_id)
		{
			
			$q = "SELECT *  from trust 
			WHERE user_id='$user_id'   ";
			
			return $this->db->get_count($q);
			
			
			
			
			
		}
	
		
	
		
		
}//class ends