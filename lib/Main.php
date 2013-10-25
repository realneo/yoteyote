<?php
include ('config.php');

class Main {


// Framework variables


	  public $area;
	  public $table;
	  public $where;
        public $backurl;
	  

	//local server  
	public $config = array(
		
		'script_path'		=> "/Users/Administrator/Sites/yoteyote/",
		'web_path'			=> 'http://localhost:8888/yoteyote/',
		'web_path_admin'	=> 'http://localhost:8888/yoteyote/admin/',
		'log_error'			=> TRUE,
		'admin_email'		=> 'neo@yoteyote.com',
		'upload_dir'		=> 'uploads',
		'db_name'			=> 'yoteyote_db',
		'db_user'			=> 'neo',
		'db_pass'			=> 'matrix03',
		'db_host'			=> 'localhost:8888',
		'title'             => 'Yoteyote | Lets Work Together',
		'tpl_dir'           => 'templates/'  
        
	);

/*
	//server
		public $config = array(
			
		'script_path'		=> "/hermes/bosoraweb096/b2478/ipg.arusdeveloperscom/demo/yoteyote/",
		'web_path'			=> 'http://arusdevelopers.com/demo/yoteyote/',
		'web_path_admin'	=> 'http://arusdevelopers.com/demo/yoteyote/admin/',
		'log_error'			=> TRUE,
		'admin_email'		=> 'admin@admin.com',
		'upload_dir'		=> 'uploads',
		'db_name'			=> 'yote_db',
		'db_user'			=> 'basit',
		'db_pass'			=> '12345678',
		'db_host'			=> 'arusdeveloperscom.ipagemysql.com',
		'title'             => 'Yoteyote | Lets Work Together',
		'tpl_dir'           => 'templates/'  
        
	);
*/
	

	
	public $info;	

	public $main_db;
	
	
	public function  __construct()
	{
		
		  $this->load_model("Db");
		
		
		if ($this->config['log_error'] == TRUE)
		{
		error_reporting(E_ALL);
		}
		else 
		{
			
		error_reporting(0);	
		

			
		}
	
	
	}
  
  /*********************Common Functions***********************/
   
	
	
	
	
	#get Current URL
	
		public function curPageURL() {
		 $pageURL = 'http';
		 
		 
		 
		 if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"]  == "on") {$pageURL .= "s";}
		 $pageURL .= "://";
		 
		 
		 if ($_SERVER["SERVER_PORT"] != "80") {
		  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		 }
		 else {
		  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		 }
		 return $pageURL;
		}
	
	
    
	

   
	
	 
	function load_model($module_name)
	{
		
		$location = "{$this->config['script_path']}/lib/{$module_name}.php";
     


		// Make sure the module is not already loaded
		if(@!is_object($this->$module_name))
		{
			if(file_exists($location))
			{
				// Load the module into the current object
				include_once($location);
				$this->$module_name = new $module_name();
								// Return the object
				return $this->$module_name;
			}else{
				return FALSE;
			}
		}else{
			// Return the object
			return $this->$module_name;
		}
	}

    
	

		function iJS($filename)
		{
	
		$location = "{$this->config['script_path']}js/{$filename}.js";	
		 if(file_exists($location))
		 
		 {
		$source = $this->config['web_path']."js/$filename.js";	 
			 
 			echo "<script type='text/javascript' src='$source'></script>\n";
		 }
		 else 
		 {
			echo "$location not found";  
		 }
		 

	
	
	    }

	
		function iCSS($filename)
		{
			
			$location = "{$this->config['script_path']}css/{$filename}.css";
		 if(file_exists($location))
		 {	
		$source_css = $this->config['web_path']."css/$filename";	 
		 echo  "<link href='$source_css.css' rel='stylesheet' type='text/css' media='screen'>\n";
		 }
		 else 
		 {
			echo "$location not found"; 
		 }
		 
		}
		
		
		

	
	
	
	
	
		public function getOrigFileName($username,$filename)
		{
		 $filename = strtolower($filename) ; 
		  $parts=explode(".",$filename);
		
		 $exts = ".".$parts[count($parts)-1];	
			
		return $username."_".$parts[0].$exts;	
		}
		
	
	
	
			#Check Session Already Started or Not
			public function initSession()
			{
				
					if(session_id() == '') 
					{
					 // session isn't started
					session_start(); 
					}	
						
			}
	
	
	
	
	
	
	
	
  


  #Get File name without Extension
  
  public function getName($name)
  {
       
  $without_ext = substr($name, 0,strrpos($name,'.'));   
    return $this->limitChars(ucfirst($without_ext),20,20);
  
  }


  #Get last of / in any String

   function getLastSlash($str)
   {
	
   $arr =explode("/",$str);	
		
	return $arr[count($arr)-1];	
			
	}



  
			  #Convert date YYYY-mm-dd to JAN 12 2012 format
			  public function convertDate($format)
			  {
				  
				  $temp = strtotime($format);
				  echo date('M d Y',$temp);
				  
			  }
			  
  
	
	  
	  

	  
      #public function mail
	  
	  // email user a message
	 function sendEmail($email, $subject, $message)
	 {
	  
	 $to = $email;
	 $from = $this->config['admin_email'];
	 $header = "From: $from" . "\r\n";
	// To send HTML mail, the Content-type header must be set
	$header .= 'MIME-Version: 1.0'
	. "\r\n";
	$header .= 'Content-type: text/html; charset=iso-8859-1'
	 . "\r\n";

	return mail($to, $subject, $message, $header);
	
	
	  }
	  
	  
	  
	  
// This function will check the username and password.... return result

	  public function checkLogin($data)
	  {
		    $email	=  mysql_real_escape_string($data['email']);
		    $password	=  sha1(mysql_real_escape_string($data['password']));
			
		    $query="Select * from users where email='$email' and password='$password'";
		 
		   
		   
		    if($this->Db->exists($query))
		    {
				
			$q = "SELECT * from users where email ='$email'";	
			$user = $this->Db->get_row($q);	
				
				
			$this->initSession();
			 $_SESSION['user_id']  = $user['user_id'];
			 $_SESSION['first_name'] =$user['first_name'];
			 $_SESSION['last_name'] =$user['last_name'];
			    
		    return true;
		    
		    }
		   
		     else 
		    {
		    return false;
		    }
		    
	  }
	  
		 public function delTableData($table,$id,$col)
   {
   
      $query="delete from $table where $col='$id'";
      return $this->Db->query($query); 
  
   }
	
	  
	 
		  
		  
		  
function gO($url)
{
	
	echo "<script>window.location='$url';</script>";
	
	
}
		  
		  
		  
		  
		  
		public function sendContactMail( $email , $data  )
		{
			
			$message = "$data[message]<br>";
			$message .=" From : $data[email]<br>";
			$message .=" Regards $data[name]";
			
			
			 if ($this-> sendEmail($email, $data['subject'], $message) )
			 {
				 
				 
			 echo $this->display_msg('success','Email sent with success . 
			 Our Representative will		 be in contact shortly');
				 
			 }
			
			
			
			
			
		}
		
		public function limitchars($string ,$chk_limit,$disp_limit)
		{
			
			$res = (strlen($string) > $chk_limit) ? substr($string,0,$disp_limit).'...' : $string;
			return $res;
			
			
		}
		
		
		

		
		
		
		  
}//Class Ends
?>