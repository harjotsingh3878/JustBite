<?php
include_once 'dbconnect.php';
//include 'food.php';

class Processitems
{
    public function getFoodFromIndex($search_input)
    {
        
        $foods = array();
	    $res=mysql_query("SELECT *,s.id AS sid, f.id AS fid FROM seller s INNER JOIN food f ON s.id=f.seller_id WHERE s.city='".$search_input."'|| s.postalcode='".$search_input."'");
        if(mysql_num_rows($res)>0)
        {
            while($userRow=mysql_fetch_array($res))
            {
                $food=new Foods();
                $food->setId($userRow['fid']);
                $food->setFood_id($userRow['fid']);
                $food->setFood($userRow['food']);
                $food->setImgs($userRow['imgs']);
                $food->setPrice($userRow['price']);
                $food->setIngredients($userRow['description']);
                $food->setType($userRow['type']);
                $food->setMeal($userRow['meal']);
                $food->setVeg($userRow['veg']);
                $food->setSpicy($userRow['spices']);
                $food->setStock($userRow['stock']);
                $food->setDelivery($userRow['delivery']);
                $food->setDtime($userRow['dtime']);
                
                $foods[]=$food;
            }
        }
        
        
        return $foods;
    }
    
    
    public function getFood()
    {
        $foods = array();
	    $res=mysql_query("SELECT * FROM food");
	    if(mysql_num_rows($res)>0)
        {
            while($userRow=mysql_fetch_array($res))
            {
                $food=new Foods();
                $food->setId($userRow['fid']);
                $food->setFood_id($userRow['id']);
                $food->setFood($userRow['food']);
                $food->setImgs($userRow['imgs']);
                $food->setPrice($userRow['price']);
                $food->setIngredients($userRow['description']);
                $food->setType($userRow['type']);
                $food->setMeal($userRow['meal']);
                $food->setVeg($userRow['veg']);
                $food->setSpicy($userRow['spices']);
                $food->setStock($userRow['stock']);
                $food->setDelivery($userRow['delivery']);
                $food->setDtime($userRow['dtime']);
                
                $foods[]=$food;
            }
        }
        
        return $foods;
    }
    
    public function getFoodFromFilters($search_input)
    {
        $foods = array();
	    $res=mysql_query("SELECT *,s.id AS sid, f.id AS fid  FROM seller s INNER JOIN food f ON s.id=f.seller_id WHERE s.city='".$search_input."'|| f.type='".$search_input."' || f.meal='".$search_input."'|| f.spicy='".$search_input."'|| f.veg='".$search_input."'");
        if(isset($res))
        {
            while($userRow=mysql_fetch_array($res))
            {
                $food=new Foods();
                $food->setId($userRow['fid']);
                $food->setFood_id($userRow['fid']);
                $food->setFood($userRow['food']);
                $food->setImgs($userRow['imgs']);
                $food->setPrice($userRow['price']);
                $food->setIngredients($userRow['description']);
                $food->setType($userRow['type']);
                $food->setMeal($userRow['meal']);
                $food->setVeg($userRow['veg']);
                $food->setSpicy($userRow['spices']);
                $food->setStock($userRow['stock']);
                $food->setDelivery($userRow['delivery']);
                $food->setDtime($userRow['dtime']);
                
                $foods[]=$food;
            }
        }
        return $foods;
    }
    
    public function getFoodFromSearchBox($search_input)
    {
        
        $foods = array();
	    $res=mysql_query("SELECT * FROM food WHERE food like '%".$search_input."%'");
	    if(mysql_num_rows($res)>0)
        {
            while($userRow=mysql_fetch_array($res))
            {
                $food=new Foods();
                $food->setId($userRow['fid']);
                $food->setFood_id($userRow['id']);
                $food->setFood($userRow['food']);
                $food->setImgs($userRow['imgs']);
                $food->setPrice($userRow['price']);
                $food->setIngredients($userRow['description']);
                $food->setType($userRow['type']);
                $food->setMeal($userRow['meal']);
                $food->setVeg($userRow['veg']);
                $food->setSpicy($userRow['spices']);
                $food->setStock($userRow['stock']);
                $food->setDelivery($userRow['delivery']);
                $food->setDtime($userRow['dtime']);
                
                $foods[]=$food;
            }
        }
        return $foods;
    }
    
    
    public function getProduct($f)
    {    
        $id = $f->getId();
        $res=mysql_query("SELECT *,food.id AS fid, seller.id AS sid FROM food INNER JOIN seller ON seller.id=food.seller_id WHERE food.id='".$id."'");
        $userRow=mysql_fetch_array($res);
        $food = new Foods();
        $seller = new Seller();
        $review = new Review();
        $food->setId($userRow['fid']);
        $food->setFood($userRow['food']);
        $food->setImgs($userRow['imgs']);
        $food->setPrice($userRow['price']);
        $food->setIngredients($userRow['ingredients']);
        $food->setDescription($userRow['description']);
        $food->setType($userRow['type']);
        $food->setMeal($userRow['meal']);
        $food->setVeg($userRow['veg']);
        $food->setSpicy($userRow['spices']);
        $food->setStock($userRow['stock']);
        $food->setDelivery($userRow['delivery']);
        $food->setDtime($userRow['dtime']);
      
        $seller->setId($userRow['sid']);
        $seller->setCompany($userRow['company']);
        $seller->setAddress($userRow['address']);
        $seller->setCity($userRow['city']);
        $seller->setPostalcode($userRow['postalcode']);
        $seller->setDescription($userRow['description']);
        $seller->setLogo($userRow['logo']);
        $seller->setUser_id($userRow['user_id']);
        
        $resR=mysql_query("SELECT * FROM review WHERE food_id='".$f->getId()."'");
        $userRowR=mysql_fetch_array($resR);
        
        $review->setId($userRowR['id']);
        $review->setName($userRowR['name']);
        $review->setEmail($userRowR['email']);
        $review->setComment($userRowR['comment']);
        $review->setRtime($userRowR['rtime']);
        $review->setRday($userRowR['rday']);
        $review->setFood_id($userRowR['food_id']);
        
        $objs = array();
        $objs[] = $food;
        $objs[] = $seller;
        $objs[] = $review;
        return $objs;
    }
    
    public function addToCart($cart)
    {
        $food_id = $cart->getFood_id();
        $quantity = $cart->getQuantity();
        $u = $_SESSION['user'];
      
        $r1=mysql_query("SELECT * FROM cart WHERE user_id='".$_SESSION['user']."' AND food_id='".$food_id."'");
	    $query="";
    	if(mysql_num_rows($r1)>0)
    	{
    		$query=mysql_query("UPDATE cart SET quantity = quantity + 1 WHERE user_id='".$_SESSION['user']."' AND food_id='".$food_id."'");
    	}
    	else
    	{
    		$query=mysql_query("INSERT into cart (user_id, food_id, quantity)
    			VALUES('$u','$food_id','$q'); ");
    	}
    	if(query)
    	{
    	    header("location: ../view/cart.php");
    	}

    }
    
    public function addReview($r)
    {
        $name = $r->getName();
        $email = $r->getEmail();
        $comment = $r->getComment();
        $rtime = $r->getRtime();
        $rday = $r->getRday();
        $id = $r->getId();
        $s="INSERT into review (name, email, comment, rtime, rday, food_id) VALUES('$name','$email','$comment', '$rtime', '$rday', '$id'); ";
        echo $s;
        $query=mysql_query("INSERT into review (name, email, comment, rtime, rday, food_id) VALUES('$name','$email','$comment', '$rtime', '$rday', '$id'); ");
			
		if(query)
		{
		}
		else
		    return $msg=1;
    }
    
    public function getSeller()
    {
        $sellers = array();
        $res2=mysql_query("SELECT * FROM seller");
        if(mysql_num_rows($res2)>0)
        {
            while($userRow2=mysql_fetch_array($res2))
            {
                $seller = new Seller();
                $seller->setCompany($userRow2['company']);
                $seller->setId($userRow2['id']);
                $sellers[] = $seller;
            }
        }
        return $sellers;
    }
    
    public function getQuantity($food_id)
    {
        $cart = new Cart();

        $res2=mysql_query("SELECT * FROM cart WHERE food_id='".$food_id."' AND user_id='".$_SESSION['user']."'");
        
        while($userRow2=mysql_fetch_array($res2))
        {
            $cart->setQuantity($userRow2['quantity']);
        }
  
        return $cart;
    }
    
    public function getUsername()
    {
        $users = new User();
        $res=mysql_query("SELECT * from user WHERE id='".$_SESSION['user']."'");
        while($userRow=mysql_fetch_array($res))
        {
            $users->setUsername($userRow['username']);
        }
        return $users;
    }
}

?>