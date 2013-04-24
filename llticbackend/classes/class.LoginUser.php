<?php
require_once ('classes/class.Session.php');
require_once ('classes/class.User.php');

class LoginUser
{
	private $session;
	
	private $userTable;
	private $curUser;
	private $username;
	private $enteredPW;
	public function __construct($session,$user,$password)
	{
		$this->session = new Session();
		$this->enteredPW = $password;
		$this->username = $user;
		$this->userTable = new User();
	}
	
	public function __destruct()
	{
		$this->userTable->__destruct();
	}
	
	public function login()
	{
		$id = $this->userTable->getIdByUsername($this->username);
		if(!$id)
		{
			throw new Exception('User not found');
		}
		else 
		{
			$this->curUser = $this->userTable->read($id);
			if($this->curUser->password == User::hashPass($this->enteredPW))
			{
				$_SESSION['uid'] = $this->curUser->uid;
				$_SESSION['user'] = $this->curUser->uname;
				$_SESSION['userlevel'] = $this->curUser->level;
				$this->session->__destruct();
				return true;
			}
			else
			{
				throw new Exception('Password Invalid');
			}
		}
	}
	
}

?>