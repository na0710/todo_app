
<!DOCTYPE html>

<html>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>TODO_App
</title>
</head>
<body>
  
  <table >
    <tr>
      <th>Name of the task    </th>
      <th>Date of entry</th>
      <th> </th>
    </tr>

<?php
  require("connect.php"); 
  require('assign.php');
  //require("add_item.php");
  $itemsQuery = $db->prepare("SELECT id,name,done,created FROM items_todo");
  
  $itemsQuery->execute();

  //$itemsList = $itemsQuery->rowCount() ? $itemsQuery->fetchAll() : [];

  $itemsList = $itemsQuery->fetchAll();
  //var_dump($itemsList);
  //var_dump($db);
?>

 <h1 class="header">
My To-do List</h1>
<?php
    if(!empty($itemsList))  
   {
       // echo "<ul>" ;
    	foreach($itemsList as $item) 
       {
          /*if($item['done'])
            {
               echo "<li>";
               //echo "<li><span class=\"item done\""  ;
              <th> echo $item["name"];</th>
               
               <th>echo $item["created"];</th>
               //echo $item[name];
            }
           else
            {
                echo "<li>";
                //echo "<li><span class\"item\" " ;
                 echo $item["name"];
                  
                 echo $item["created"];
            } */

         if(!$item['done'])
            {
              echo "<tr>";
                //echo "<li><span class\"item\" " ;
              echo "<td>";
              echo $item["name"]     ;
              echo "</td>";
              echo "<td>";
              echo $item["created"];

              echo "</td>";

              //var_dump($item["id"]);
              echo "<td>";

             echo "<a href= \"done.php?as=done&item={$item["id"]}\"> DONE </a>";
             echo "</td>";
               
           }  echo "</tr>";
       } //echo "</ul>" ;
   }
     else
    {
           echo "<p> You have not added any item yet </p>" ;
    }      
 ?> 
</table>
<form class="add" action="add_item.php" method="post" >
<input type="text"name="name" placeholder="Add a new task here...." class="input">

<input type="submit" value="add" class="submit">
</form>


</body>
</html>
