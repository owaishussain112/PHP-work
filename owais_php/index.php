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
<!doctype html>
<html lang="en">
    <head>
        <title>Index file</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
       
       <div class="container">
          <h1>User create</h1>
            <form action="index.php" method="Post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Please Enter Email">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" name="user_submit" class="btn btn-primary">Submit</button>
            </form>
       </div>



      
     
    </body>
</html>
