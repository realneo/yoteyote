<?php
	class Admin extends Main
	{
		public $db;



		public function  __construct()
		{
			$this->db = $this->load_model("Db");

		}

		public function changePass($data)
		{


			if ($data['new_pass'] == $data['confirm_pass'] )
			{

			 $pass =  md5(mysql_real_escape_string($data['new_pass']));
	         $q = "UPDATE tbl_user
			 SET
			 user_pass = '$pass'WHERE
			 user_name ='admin' ";

			 if ($this->db->query($q))
			 $this->show_bar(1,"Password Updated");
			}
			else
			{

			$this->show_bar(0,"Your  Password  doesnt match with confirm");

			}







		}

			public function getTotal($table)
		{

			 $q = "SELECT count(*) as total from $table ";
			 $total=$this->db->get_row($q);

			 return $total['total'];

		}



			public function delGenData($table , $id)
		{

	         $qs = "DELETE FROM $table WHERE cat_id='$id'";
			 $total=$this->db->query($qs);

			 return $total;

		}

		public function show_bar($type,$msg,$ret=false)
		{
			$class = '';

			switch($type)
			{
			case 0: $class ='alert_error';  break;
			case 2: $class ='alert_warning';  break;
			case 1: $class ='alert_success';  break;


			}


			$html  = "<h4 class='$class'>$msg</h4>";
			if($ret)
			{

			return $html;
			}
			else
			{
			echo $html;
			}

		}



			 public function adminLogin($data)
 		 {


			  $username  =  mysql_real_escape_string($data['user_name']);
			  $pass   =  md5(mysql_real_escape_string($data['user_pass']));

				$q  = "SELECT username , pword from  admin where
				username ='$username'
				AND  pword = '$pass'";



			  if ($this->Db->get_row($q))
			  {


				 $this->initSession();
				$_SESSION['admin_u'] =$username;
				$_SESSION['admin_p'] =$pass;

				header("Location: ".$this->config['web_path_admin'])  ;


			  }
			  else
			  {
				return false;
			   }

 		 }


			public function chkAdminSession()
		{

	         $this->initSession();
			 if (!isset($_SESSION['admin_u'])  && !isset($_SESSION['admin_p'])   )
			 {
			 header("Location: ".$this->config['web_path_admin']."login.php");

			 }




		}


			public function delUsersData($table , $id)
		{

	         $qs = "DELETE FROM $table WHERE user_id='$id'";
			 $total=$this->db->query($qs);

			 return $total;

		}


			public function delPostsData($table , $id)
		{

	         $qs = "DELETE FROM $table WHERE id='$id'";
			 $total=$this->db->query($qs);

			 return $total;

		}

			public function delSpecData($table , $id)
		{

			 $qs = "DELETE FROM $table WHERE spec_id='$id'";
			 $total=$this->db->query($qs);

			 return $total;

		}






			 public function getusername($id)
		{


	         $qz = "SELECT * FROM users where user_id='$id'";
			 $res=$this->db->get_row($qz);

			 return $res;

		}

		 	public function getUsers()
		{


	         $qz = "SELECT * FROM users";
			 $res=$this->db->get_rows($qz);

			 return $res;

		}

		 	public function getPostsInfo($id)
		{


	         $qz = "SELECT * FROM posts where id='$id'";
			 $res=$this->db->get_row($qz);

			 return $res;

		}


		   public function getVal($statement, $startpoint, $limit , $orderby)
		{


	         $qz = "SELECT * FROM {$statement} {$orderby} LIMIT {$startpoint} , {$limit} ";
			 $res=$this->db->get_rows($qz);

			 return $res;

		}









		public function UpdateSpec($data, $id)
		{


	         $stt = "UPDATE tbl_artist_spec SET spec_name='{$data['spec_name']}' WHERE spec_id='$id'";
			 $result=$this->db->query($stt);

			  $this->show_bar(1,"Artist specialty information is sucessfully updated...");
			  echo'<script>window.location.href="artist_spec.php?message=Artist specialty information is sucessfully updated... !";</script>';
			 return $result;

		}




		public function SearchData($table, $where)
		{


	         $stt = "SELECT * FROM $table $where";
			 $result=$this->db->get_rows($stt);

			 return $result;

		}






			public function InsertSpecData($data)
		{


			 $title=mysql_real_escape_string($data['add_spec']);
	         $stt = "INSERT INTO tbl_artist_spec (spec_name) VALUES ('$title')";
			 $result=$this->db->query($stt);

			  echo'<script>window.location.href="artist_spec.php?message=Specialty information Successfully inserted !";</script>';
			 return $result;

		}

		public function InsertGenData($data)
		{


			 $title=mysql_real_escape_string($data['add_gen']);
	         $stt = "INSERT INTO tbl_category (cat_name) VALUES ('$title')";
			 $result=$this->db->query($stt);

			  echo'<script>window.location.href="artist_gen.php?message=Genere information successfully inserted !";</script>';
			 return $result;

		}

				public function InsertCountryData($data , $files)
		{
					$message="";
					if($files["add_flag"]["tmp_name"]=="")
					{
						$message.="please select country flag first , ";
					}
					if($data['add_country']=="")
					{
						$message.="please enter country first , ";
					}
					if($message=="")
					{
			  move_uploaded_file($files["add_flag"]["tmp_name"],
			  $this->config['images'] . $files["add_flag"]["name"]);



			 $title=mysql_real_escape_string($data['add_country']);
			 $flag=$files["add_flag"]["name"];

	         $stz = "INSERT INTO tbl_artist_country (country , flag) VALUES ('$title' , '$flag')";
			 $result=$this->db->query($stz);

			  echo'<script>window.location.href="artist_country.php?message=country information successfully inserted !";</script>';

					}
					else
					{
						return $message;
					}
		}



		public function UpdateCountry($data, $id ,$files)
		{
				$message="";
					if($files["add_flag"]["tmp_name"]=="")
					{
						$message.="please select country flag first , ";
					}

					if($message=="")
					{

				  move_uploaded_file($files["add_flag"]["tmp_name"],
				  $this->config['images'] . $files["add_flag"]["name"]);


				$flag=$files["add_flag"]["name"];
	         $stt = "UPDATE tbl_artist_country SET country='{$data['country_name']}', flag='$flag' WHERE id='$id'";
			 $result=$this->db->query($stt);


			  echo'<script>window.location.href="artist_country.php?message=Artist Country information is successfully updated... !";</script>';
			 }
					else
					{
						return $message;
					};

		}



			public function getUsersInfo($id)
		{

			 $q = "SELECT * from users WHERE user_id='$id'";
			 $total=$this->db->get_row($q);

			 return $total;

		}



			public function getUpdateUsers($data, $files, $id)
		{
				$message="";
					if($files["pic"]["tmp_name"]=="")
					{
						$message.="please select your Picture first , ";
					}
					if($data["fname"]=="")
					{
						$message.="please enter your first name first , ";
					}
					if($data["lname"]=="")
					{
						$message.="please enter your last name first , ";
					}
					if($data["pwd"]=="")
					{
						$message.="please enter your password first , ";
					}
					if($data["email"]=="")
					{
						$message.="please enter your email first , ";
					}
					if($data["mobile"]=="")
					{
						$message.="please enter your mobile first , ";
					}
					if($data["bank"]=="")
					{
						$message.="please enter your bank name first , ";
					}


					if($message=="")
					{

				 		 move_uploaded_file($files["pic"]["tmp_name"],
				 		 $this->config['images'] . $files["pic"]["name"]);


						 $pic		=$files["pic"]["name"];
						 $fname		=$data["fname"];
						 $lname		=$data["lname"];
						 $pwd		=md5($data["pwd"]);
						 $email		=$data["email"];
						 $mobile	=$data["mobile"];
						 $bank		=$data["bank"];
	         $stt = "UPDATE users SET first_name='$fname', last_name='$lname',pword='$pwd',email='$email',mobile='$mobile',bank='$bank', pic='$pic' WHERE user_id='$id'";
			 $result=$this->db->query($stt);


			  echo'<script>window.location.href="view_users.php?message=User information is successfully updated... !";</script>';
			 }
					else
					{
						return $message;
					}

			}


				public function getUpdatePosts($data, $id)
		{
				$message="";

					if($data["username"]=="")
					{
						$message.="please select user name first , ";
					}
					if($data["post"]=="")
					{
						$message.="please enter your post first , ";
					}
					if($data["description"]=="")
					{
						$message.="please enter your description first , ";
					}
					if($data["user_type"]=="")
					{
						$message.="please select type first , ";
					}
					if($data["amount"]=="")
					{
						$message.="please enter your amount first , ";
					}
					if($data["currency"]=="")
					{
						$message.="please enter currency first , ";
					}


					if($message=="")
					{

						 $username		=$data["username"];
						 $post			=$data["post"];
						 $description	=$data["description"];
						 $user_type		=$data["user_type"];
						 $amount		=$data["amount"];
						 $currency		=$data["currency"];

	         $stt = "UPDATE posts SET post='$post', description='$description',type='$user_type',amount='$amount',currency='$currency',user_id='$username' WHERE id='$id'";
			 $result=$this->db->query($stt);


			  echo'<script>window.location.href="view_post.php?message=User post is successfully updated... !";</script>';
			 }
					else
					{
						return $message;
					}

			}


		//// add currency rate tshs per dollar...

		public function addCurrency($value)
		{

		 $stt = "UPDATE currency_setting SET title='tshs per dollar', rate='$value' WHERE id='1'";
		return $result=$this->db->query($stt);

		}

		public function deductCharges($values)
		{
		$mobile	=$values['mobile'];
		$transc	=$values['transc'];
		 $stt = "UPDATE deduction SET mobile='$mobile', transc='$transc' WHERE id='1'";
		return $result=$this->db->query($stt);

		}

		function addTransc($values,$id,$bank,$deduction,$currency=false)
		{

			$payment	=$values['payment'];
			$log_user	=$payment-$deduction;
			$method		=$values['method'];

			if($method=='usd' && $currency)
			{
				$total_payment	=$payment*$currency;
				$total_amount	=$bank+$total_payment;
				$bank			=$total_amount-$deduction;
				$query 			= "UPDATE users SET bank='$bank' WHERE user_id='$id'";

			}elseif($method='tshs')
			{

				$total_amount	=$bank+$payment;
				$bank			=$total_amount-$deduction;
				$query 			= "UPDATE users SET bank='$bank' WHERE user_id='$id'";
			}


	$log = "INSERT INTO `log`( `id` , `trans_date` , `user_bank` , `user_id` , `admin_bank` )
VALUES (
NULL , NOW(), '$log_user', '$id', '$deduction')";




			$result=$this->db->query($query);
			if($result)
			{
			$admin_bank			=$this->SearchData('admin_bank','where id=1');
			$bank				=$admin_bank[0]['bank']+$deduction;

			$admin_res			=$this->db->query("UPDATE admin_bank SET bank='$bank' WHERE id='1'");

			$log_res			=$this->db->query($log);
			return true;
			}


		}/// end of function addTransc()...
			public function transcRollBack($id)
			{

			$q = "SELECT * from log WHERE id='$id'";
			 $total=$this->db->get_row($q);

			$deduction			=$total['admin_bank'];
			$user_id			=$total['user_id'];
			$transc				=$total['user_bank'];

			$admin_bank			=$this->SearchData('admin_bank','where id=1');
			$bank				=$admin_bank[0]['bank']-$deduction;
			$admin_res			=$this->db->query("UPDATE admin_bank SET bank='$bank' WHERE id='1'");

			$transaction		=$transc;

			$user				=$this->getUsersInfo($user_id);
			$user_bank			=$user['bank'];
			$ubank				=$user_bank-$transaction;
			$user_res			=$this->db->query("UPDATE users SET bank='$ubank' WHERE user_id='$user_id'");
			$this->delPostsData('log',$id);

			}





		public function getBank()
			{
				$q= "SELECT bank from admin_bank";
			$r = $this->db->get_row($q);
			return $r['bank'];

			}







	}

?>