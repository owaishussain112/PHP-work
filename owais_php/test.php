<?php include ("connection.php");
if(isset($_POST['click'])){
    $name = $_POST['name'];
 $email =$_POST['email'];

 
 $query = $pdo->prepare("INSERT INTO `user-detail`( `name`, `email`) VALUES (:pn,:pm)");

 $query->bindParam(':pn',$name);
 $query->bindParam(':pm',$email);
 $query->execute();
 echo "user detail submitted";
}
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
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
    <h1>User detail</h1>
        <form action="test.php" method="post">    
    <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input
                type="text"
                name="name"
                id=""
                class="form-control"
                placeholder=""
                aria-describedby="helpId"
            />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">email</label>
            <input
                type="text"
                name="email"
                id=""
                class="form-control"
                placeholder=""
                aria-describedby="helpId"
            />
        </div>
        <button type="submit" name="click" class="btn btn-primary">Submit</button>
</form>
        </div>        
    </body>
</html>
