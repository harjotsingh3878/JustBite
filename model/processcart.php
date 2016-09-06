<?php
include 'carts.php';
class Processcart
{
    public function getCart()
    {
        $carts = array();
        
        $res=mysql_query("SELECT *,cart.id AS cid FROM cart INNER JOIN food ON cart.food_id=food.id WHERE user_id='".$_SESSION['user']."'");
        if(mysql_num_rows($res)>0)
        {
            while($userRow = mysql_fetch_array($res))
            {
                $cart = new Cart();
                $cart->setId($userRow['cid']);
                $cart->setFood($userRow['food']);
                $cart->setPrice($userRow['price']);
                $cart->setQuantity($userRow['quantity']);
                $cart->setFood_id($userRow['food_id']);
                $carts[] = $cart;
            }
        }
        return $carts;
    }
    
    public function changeQuantity($cart)
    {
        if($cart->getQuantity()==1)
    	{
    		$quantity=$cart->getQuantity();
    		$food=$cart->getFood_id();
    		$res=mysql_query("UPDATE cart SET quantity = quantity + 1 WHERE user_id=".$_SESSION['user']." AND food_id=".$food);
    	}
    	else if($cart->getQuantity()==0)
    	{
    		$quantity=$cart->getQuantity();
    		$food=$cart->getFood_id();
    		$r = mysql_query("SELECT * FROM cart WHERE user_id=".$_SESSION['user']." AND food_id=".$food);
    		if(mysql_num_rows($r)>0)
    		{
    		    $userRow=mysql_fetch_array($r);
    		    $q=$userRow['quantity'];
    		    if($q!=1)
    		        $res=mysql_query("UPDATE cart  SET quantity = quantity - 1 WHERE user_id=".$_SESSION['user']." AND food_id=".$food);
    		}
    		
    	}
    }
    
    public function deleteCart($ct)
    {
        $id = $ct->getId();
        $rdelete = mysql_query("DELETE FROM cart WHERE id='".$id."'");
    	if($rdelete)
    	{
    		return $msg_delete=1;
    	}
    	else
    	{
    		return $msg_delete=2;
    	}
    }
}

?>