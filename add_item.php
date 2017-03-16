<?php
require ('assign.php');
require ('connect.php');
if(isset($_POST["name"])) {
   $name = $_POST["name"]; 


if(!empty($name))  {
  $addedQuery = $db->prepare("INSERT INTO items_todo (name, done, created)
  VALUES (:name,0, NOW() )");
   $addedQuery->execute([':name' => $name]);
}
}

header('Location: index.php');

?>
