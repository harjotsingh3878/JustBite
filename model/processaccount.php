<?php
include_once 'dbconnect.php';
include 'user.php';
class Processaccount
{
    public function getUser()
    {

        $u=new User();
	    $res=mysql_query("SELECT * FROM user WHERE id='".$_SESSION['user']."'");
	    if(mysql_num_rows($res)>0)
        {
            while($userRow=mysql_fetch_array($res))
            {
                $u->setFullname($userRow['fullname']);
                $u->setUsername($userRow['username']);
                $u->setEmail($userRow['email']);
                $u->setPassword($userRow['password']);
                $u->setPhone($userRow['phone']);
            }
        }
        return $u;
    }
    
    public function changePassword($user)
    {
        $pass =  $user->getPassword();
        $newpass =  $user->getNewpass();
        $msg_register = 0;
        $res=mysql_query("SELECT * FROM user WHERE id='".$_SESSION['user']."' AND password='".$pass."'");
    	if(mysql_num_rows($res)>0)
    	{
    	    if(mysql_query("UPDATE user SET password='".$newpass."' WHERE id='".$_SESSION['user']."'"))
            {
            	return $msg_register;
            }
            else
            {
            	return $msg_register = 2;
            }
    	}
    	else
    	{
    	    return $msg_register=1;
    	}
    }
    
    public function editProfile($users)
    {
        
        $fname = $users->getFullname();
        $uname = $users->getUsername();
        $email = $users->getEmail();
        $phone = $users->getPhone();
        $processaccount = new Processaccount();
        $msg_register = $processaccount->checkUsername($users);
        if($msg_register == 0)
        {
            if(mysql_query("UPDATE user SET fullname='".$fname."', username='".$uname."', email='".$email."', phone='".$phone."' WHERE id='".$_SESSION['user']."'"))
        	{
        		header("Location: ../view/account.php");
        	}
        	else
        	{
        		return $msg_register = 2;
        	}
        }
        else
            return $msg_register;
    }
    
    public function editAdminProfile($objs)
    {
        $users = $objs[0];
        $seller = $objs[1];
        
        
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
        $processaccount = new Processaccount();
        
        if($msg_register == 0)
        {
            if(mysql_query("UPDATE user SET fullname='".$fname."', username='".$uname."', email='".$email."', phone='".$phone."' WHERE id='".$_SESSION['user']."'"))
        	{
        		if(mysql_query("UPDATE seller SET company='".$company."', address='".$address."', city='".$city."', postalcode='".$potalcode."',description='".$description."' WHERE userid='".$_SESSION['user']."'"))
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
        }
        else
            return $msg_register;
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
    
    public function mail()
    {
        $retval = mail ($email_to,$email_subject,$email_message,$header);
        return $retval;
    }
}

?>