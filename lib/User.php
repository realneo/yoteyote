<?php

class User extends Main{

	public $db;

	public function  __construct()
	{
            $this->db    = $this->load_model("Db");
            $this->table = 'posts';
	}

	public function getUser($get = '*', $where )
	{
		$q = "SELECT $get  FROM users  WHERE  $where  ";
		return $this->db->get_row($q);
	}

	public function getUserByPostID($post_id)
	{
		$q    = "SELECT user_id from posts where id = '$post_id' ";
		$data = $this->db->get_row($q);
		return $data['user_id'];
	}

	public function checkUserSession()
	{
		if (isset($_SESSION['user_id']))
		{
			echo 'success';
		}
		else
		{
			echo 'failed';
		}
	}

	public function checkAlreadyTrust($trusted_by, $user_id)
	{
		$search = "SELECT * from trust WHERE trusted_by_id = '$trusted_by' AND user_id = '$user_id' ";
		return ($this->db->exists($search)) ? true : false;
	}

	public function addTrust($trusted_by, $trusted_to)
	{
		//var_dump ($trusted_by);
		//var_dump($trusted_to);

		if ($this->checkAlreadyTrust($trusted_by, $trusted_to))
		{
			return false;
		}
		else
		{
			$insert = "INSERT into trust(user_id, trusted_by_id) VALUES('$trusted_to', '$trusted_by')";
			$this->db->query($insert);
			return true;
		}
	}

	public function addUser($data)
	{
		// Getting values from the Form
		$first_name = mysql_real_escape_string($data['first_name']);
		$last_name  = mysql_real_escape_string($data['last_name']);
		$email      = mysql_real_escape_string($data['email']);
		$password   = mysql_real_escape_string($data['password']);
		$mobile     = mysql_real_escape_string($data['mobile']);

		// Encrypting the Password into a Hash1
		$hashed_password = sha1($password);

		// Formating the Input Data
		$first_name = ucfirst($first_name);
		$last_name  = ucfirst($last_name);
		$date_time  = date('Y-m-d H:i:s');

		$q = "INSERT INTO `users` (`user_id`, `user_date`, `pword`, `first_name`, `last_name`, `email`, `mobile`)
			  VALUES ('NULL', '$date_time', '$hashed_password', '$first_name', '$last_name', '$email', '$mobile')";

		if ($this->db->query($q))
		{
			//$message ='Welcome New User';
			//$sms->Sender($host, $port, $username, $password, $sender, $message, $mobile, $msgtype, $dlr);
			return true;
		}
		else
		{
			return false;
		}
	}

	public function checkUserExists($data)
	{
		$email  = mysql_real_escape_string($data['email']);
		$mobile = mysql_real_escape_string($data['mobile']);

		$q = "SELECT * FROM `users` WHERE email = '$email' OR mobile = '$mobile'";

		return ($this->db->get_row($q) >= 1) ? true : false;
	}

	public function  addList($post_id, $user_id, $bid)
	{
		$i  = "INSERT INTO  listings(list_id, post_id, user_id, list_date, bid)
			   VALUES(NULL, $post_id, $user_id, NOW(), $bid)";

		if ($this->db->query($i))
		{
			return 'ok';
		}
	}

	public function checkAlreadyBid($user_id , $post_id)
	{
		$s = "SELECT * from listings where post_id = '$post_id' AND user_id = '$user_id'";
		return $this->db->exists($s);
	}

	public function getTotalListings($user_id)
	{
		$s    = "SELECT count(*) as total from posts where user_id = '$user_id' AND post_active = 'y'";
		$data =  $this->db->get_row($s);
		return $data['total'];
	}

	public function getTotalOn($user_id)
	{
		$s    = "SELECT count(on_id) as total from ongoing where post_by_user_id = $user_id";
		$data =  $this->db->get_row($s);
		return $data['total'];
	}

	public function getOngoings($user_id)
	{
		$s = "SELECT * from ongoing as o ,
			  posts as  p
			  ,users  as  u

			  where o.post_by_user_id = $user_id
			  AND o.post_id = p.id
			  AND o.won_by_user_id = u.user_id`
                    ";
		return $this->db->get_rows($s);
	}

	public function AddOngoing($list_id, $logged_user)
	{
		// Get User details of his own listings
		$s = "SELECT * from users  WHERE user_id = '$logged_user' ";
		$current_user = $this->db->get_row($s);

		// Get user own listing that he chooses to accept
		$s1 ="SELECT * from listings  WHERE list_id = '$list_id' ";
		$listings = $this->db->get_row($s1);

		// Get Dedudction rates
		$s3 = "SELECT * from deduction, currency_setting";
		$account = $this->db->get_row($s3);

		if ($current_user['bank'] < $account['transc'])
		{
			return "empty";
		}

		$i = "INSERT INTO ongoing(on_id, post_by_user_id, won_by_user_id, on_amount, post_id)
			  VALUES(NULL, $logged_user, $listings[user_id], $listings[bid], $listings[post_id])";

		if ($this->db->query($i))
		{
			$u = "UPDATE posts SET post_active = 'n' WHERE id = '$listings[post_id]'  "	;
			$this->db->query($u);

			$m = "UPDATE users SET bank=bank-$account[transc] WHERE  user_id = '$logged_user'";
			$this->db->query($m);

			$d = "DELETE from listings where post_id = $listings[post_id]";
			$this->db->query($d);

			return 'ok';
		}
	}

	public function getBank($user_id)
	{
		$s    = "Select bank from users where user_id = '$user_id'";
		$data = $this->db->get_row($s);
		return $data['bank'];
	}

	public function proBank($user_id, $amount, $mode)
	{
		$u = "Update  users set bank= bank $mode $amount where user_id = $user_id";
		return $this->db->query($u);
	}

	public function iniPayment ($on_id, $user_id)
	{
		$ongoings = $this->db->get_row("SELECT * from ongoing where on_id = '$on_id'");
		$by_acct  = $this->getBank($user_id);
		$to_acct  = $this->getBank($ongoings['won_by_user_id']);

		if ($by_acct < $ongoings['on_amount'])
		{
			return 'funds';
		}

		$this->proBank($ongoings['won_by_user_id'], $ongoings['on_amount'], '+');
		$this->proBank($user_id, $ongoings['on_amount'], '-');

		$this->db->query("DELETE from ongoing where on_id = '$on_id'");

		return 'ok';
	}

}	// class ends
