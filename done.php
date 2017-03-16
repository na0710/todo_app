<?php
require_once 'assign.php';

if(isset($_GET['as'],$_GET['item']))  {
   $as  =$_GET['as'];
  
   $item=$_GET['item'];
   
    


switch($as)  {
   case  'done':
   //var_dump($item);
     
    $doneQuery = $db->prepare(" UPDATE items_todo SET done = '1' WHERE id = '$item' ");
        
     $doneQuery->execute();
      // $deleteQuery=$db->prepare(" DELETE FROM items_todo WHERE id= '$item' " );
       //$deleteQuery->execute();
         break;
    }
}

  header('Location: index.php');
?>
