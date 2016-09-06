<?php
include_once 'dbconnect.php';
include 'order.php';

class Processorder
{   
    public function getOrder()
    {
        $orders = array();

        $res = mysql_query("SELECT *,orders.id AS oid FROM orders INNER JOIN food ON orders.foods=food.id WHERE orders.user_id='".$_SESSION['user']."'");
        while($userRow=mysql_fetch_array($res))
        {
            $order = new Order();
            $order->setId($userRow['oid']);
            $order->setFoodname($userRow['food']);
            $order->setTotal($userRow['total']);
            $order->setDtime($userRow['dtime']);
            $orders[] = $order;
        }
    }
    
    public function deleteOrder($order)
    {
        $id = $order->getId();
        if(mysql_query("DELETE FROM orders WHERE id='".$id."'"))
        {
            return $msg_register = 1;
        }
        else
        {
            return $msg_register = 2;
        }
    }
}

?>