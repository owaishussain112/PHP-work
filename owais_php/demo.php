<?php include 'connection.php' ;
if(isset($_POST['user_submit'])){
 $email = $_POST['email'];
 $password =$_POST['password'];

//  $pdo->setAttribute();
$query = $pdo->prepare("INSERT INTO `users`( `email`, `password`) VALUES (:em,:ps)");

$query->bindParam(':em',$email);
$query->bindParam(':ps',$password);

$query->execute();
echo "Record Inserted Successfully!";



 
}

?>