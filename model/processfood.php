<?php
include_once 'dbconnect.php';

class Processfood
{
    public function getFood()
    {
        $foods = array();
        $res=mysql_query("SELECT * FROM food WHERE seller_id='".$_SESSION['sellerid']."'");
        if(mysql_num_rows($res)>0)
        {
            while($userRow=mysql_fetch_array($res))
            {
                $food = new Foods();
                $food->setId($userRow['id']);
                $food->setFood($userRow['food']);
                $food->setImgs($userRow['imgs']);
                $food->setPrice($userRow['price']);
                $food->setIngredients($userRow['ingredients']);
                $food->setDescription($userRow['description']);
                $food->setType($userRow['type']);
                $food->setMeal($userRow['meal']);
                $food->setVeg($userRow['veg']);
                $food->setSpicy($userRow['spicy']);
                $food->setStock($userRow['stock']);
                $food->setDelivery($userRow['delivery']);
                $food->setDtime($userRow['dtime']);
                $foods[] = $food;
            }
        }
        return $foods;
    }
    
    public function getFoods($fid)
    {
        $food = new Foods();
        $res=mysql_query("SELECT * FROM food WHERE id=".$fid);
        if(mysql_num_rows($res)>0)
        {
            while($userRow=mysql_fetch_array($res))
            {

                $food->setId($userRow['id']);
                $food->setFood($userRow['food']);
                $food->setImgs($userRow['imgs']);
                $food->setPrice($userRow['price']);
                $food->setIngredients($userRow['ingredients']);
                $food->setDescription($userRow['description']);
                $food->setType($userRow['type']);
                $food->setMeal($userRow['meal']);
                $food->setVeg($userRow['veg']);
                $food->setSpicy($userRow['spicy']);
                $food->setStock($userRow['stock']);
                $food->setDelivery($userRow['delivery']);
                $food->setDtime($userRow['dtime']);

            }
        }
        return $food;
    }
    
    public function addFood($food)
    {
        $msg_register=0;
        $f = $food->getFood();
        $imgs = addslashes($food->getImgs());
        $price = $food->getPrice();
        $ingredients = $food->getIngredients();
        $description = $food->getDescription();
        $type = $food->getType();
        $meal = $food->getMeal();
        $veg = $food->getVeg();
        $spicy = $food->getSpicy();
        $delivery = $food->getDelivery();
        $dtime = $food->getDtime();
        $sid = $_SESSION['sellerid'];

        $query=mysql_query("INSERT into food (food, imgs, price, ingredients, description, type, meal, veg, spicy, delivery, dtime, seller_id)
			VALUES('$f','$imgs','$price','$ingredients','$description','$type','$meal','$veg','$spicy','$delivery','$dtime', '$sid'); ");
		
			
        if($query)
        {
            header("location: ../admin/myfood.php");
        }
        else
        {
        	$msg_register = 1;
        }
    }
    
    public function updateFood($food)
    {
        $msg_register=0;
        $id=$food->getId();
        $f = $food->getFood();
        $imgs = addslashes($food->getImgs());
        $price = $food->getPrice();
        $ingredients = $food->getIngredients();
        $description = $food->getDescription();
        $type = $food->getType();
        $meal = $food->getMeal();
        $stock = $food->getStock();
        $veg = $food->getVeg();
        $spicy = $food->getSpicy();
        $delivery = $food->getDelivery();
        $dtime = $food->getDtime();
        $sid = $_SESSION['sellerid'];
        
        $s="UPDATE food SET food = '$f', price = '$price', ingredients = '$ingredients', description = '$description', type = '$type', meal = '$meal', stock = '$stock', veg = '$veg', spicy = '$spicy', delivery = '$deliver', dtime = '$dtime'
			 WHERE id=".$id."; ";
			 echo $s;
        
        $query=mysql_query("UPDATE food SET food = '$f', price = '$price', ingredients = '$ingredients', description = '$description', type = '$type', meal = '$meal', stock = '$stock', veg = '$veg', spicy = '$spicy', delivery = '$deliver', dtime = '$dtime'
			 WHERE id=".$id."; ");	
			 
        if($query)
        {
            header("location: myfood.php");
        }
        else
        {
        	$msg_register = 1;
        }
    }
    
    public function deleteFood($delete)
    {
        $msg=1;
        $query = mysql_query("DELETE FROM food WHERE id='".$delete."'");
        
        if(!$query)
        {
            $msg=2;
        }
        return $msg;
    }
}

?>