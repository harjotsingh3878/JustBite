<?php
include_once 'dbconnect.php';
include 'user.php';
class Processlogin
{
    public function adminsignup($objs)
    {
        $users = $objs[0];
        $seller = $objs[1];
        $msg_register = 0;
        
        $fname = $users->getFullname();
        $uname = $users->getUsername();
        $email = $users->getEmail();
        $pass =  $users->getPassword();
        $phone = $users->getPhone();
        
        $company = $seller->getCompany();
        $address = $seller->getAddress();
        $city = $seller->getCity();
        $potalcode = $seller->getPostalcode();
        $description = $seller->getDescription();
        
		if(mysql_query("INSERT INTO user(fullname, username, email, password, phone) 
		        VALUES('$fname','$uname','$email','$pass','$phone')"))
		{
		    $last_id=mysql_insert_id();
	        
		    if(mysql_query("INSERT INTO seller (company, address, city, postalcode, description, userid) 
		         VALUES('$company','$address','$city','$potalcode', '$description', '$last_id')"))
	    	{
	    		$msg_register = 1;  
	    	}
	    	else
	    	{
	    	    $msg_register = 2;
	    	}
		}
		else
		{
			$msg_register = 2;
		}
    	
        return $msg_register;
    }
    
    public function adminlogin($users)
    {
        $uname = $users->getUsername();
        $pass =  $users->getPassword();
        $msg_register = 0;
        $res=mysql_query("SELECT * FROM user WHERE username='".$uname."' AND password='".$pass."'");
    	if(mysql_num_rows($res)>0)
    	{
    		$userRow=mysql_fetch_array($res);
    		$user_id=$userRow['id'];
    		
    		$res2=mysql_query("SELECT * FROM seller WHERE userid='".$user_id."'");
    		if(mysql_num_rows($res2)>0)
    		{
    			$userRow2=mysql_fetch_array($res2);
    			
                if(isset($_SESSION['user']))
                {
                	unset($_SESSION['user']);
                	session_destroy();
                }
	            session_start();
    			$_SESSION['user'] = $userRow['id'];
    			$_SESSION['sellerid'] = $userRow2['id'];
    		}
    		else
    		{
    			return $msg_register = 3;
    		}
    	}
    	else
    		return $msg_register = 3;
    		
    	return $msg_register;
    }
    
    public function login($users)
    {
        $uname = $users->getUsername();
        $pass =  $users->getPassword();

        $msg_register = 0;
        $res=mysql_query("SELECT * FROM user WHERE username='".$uname."' AND password='".$pass."'");
        if(mysql_num_rows($res)>0)
    	{
    		$userRow=mysql_fetch_array($res);
    		$user_id=$userRow['id'];
    		$res2=mysql_query("SELECT * FROM seller WHERE userid='".$user_id."'");
    		if(!mysql_num_rows($res2)>0)
    		{
    			$userRow=mysql_fetch_array($res);
    			
    			if(isset($_SESSION['user']) || $_SESSION['sellerid'])
    			{
    			    unset($_SESSION['user']);
                	unset($_SESSION['sellerid']);
                	session_destroy();
    			}
    			session_start();
    			$_SESSION['user'] = $user_id;
    		}
    		else
    		{
    			return $msg_register = 3;
    		}
    	}
    	else
    		return $msg_register = 3;
    	
    	return $msg_register;
    }
    
    public function signup($users)
    {
        $fname = $users->getFullname();
        $uname = $users->getUsername();
        $email = $users->getEmail();
        $pass =  $users->getPassword();
        $phone = $users->getPhone();
        
        if(mysql_query("INSERT INTO user(fullname, username, email, password, phone)
            VALUES('$fname','$uname','$email','$pass','$phone')"))
		{
			return $msg_register = 1;
		}
		else
		{
			return $msg_register = 2;
		}
    }
    
    public function checkUsername($users)
    {
        $msg_register = 0;
        $uname = $users->getUsername();
        $res=mysql_query("SELECT * FROM user WHERE username='".$uname."'");
    	if(mysql_num_rows($res)>0)
    	{
    		return $msg_register = 4;
    	}
    	return $msg_register;
    }
}

?>