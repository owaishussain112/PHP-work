<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>form data</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input
                type="text"
                name="name"
                id=""
                class="form-control"
                placeholder=""
                aria-describedby="helpid"
                />
                <small id="helpid" class="text-muted">help text</small>
</div>
<div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input
                type="text"
                name="email"
                id=""
                class="form-control"
                placeholder=""
                aria-describedby="helpid"
                />
                <small id="helpid" class="text-muted">help text</small>
</div>
<button
       type="submit"
       class="btn btn-primary"
       name="data"
       >
    Button   
    </Button>
</form>
<?php
if(isset($_POST['data'])){
    $name= $_POST['name'];
    $email= $_POST['email'];
    echo $name." ".$email;
}
?>
    </div>
</body>
</html>