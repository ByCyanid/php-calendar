
<?php
$connect = new PDO('mysql:host=localhost;dbname=calendar', 'root', '');
if(isset($_POST["delete"])){
 $query = "
 DELETE from events WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
 header("Location: ../index.php");
}
else if(isset($_POST["id"]))
{
 $query = "
 UPDATE events 
 SET title=:title, description=:description, color=:color 
 WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':description' => $_POST['description'],
   ':color' => $_POST['color'],
   ':id'   => $_POST['id']
  )
 );
 header("Location: ../index.php");
}

?>
