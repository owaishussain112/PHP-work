<?php
include("connection.php");
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
            <h1>marsheet view</h1>
            <div
                class="table-responsive"
            >
                <table
                    class="table table-primary"
                >
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Maths</th>
                            <th scope="col">Physic</th>
                            <th scope="col">Chemistry</th>
                            <th scope="col">English</th>
                            <th scope="col">Urdu</th>
                            <th scope="col">Obtained</th>
                            <th scope="col">totalMarks</th>
                            <th scope="col">Percentage</th>
                            <th scope="col">Grade</th>
                            <th scope="col">Remarks</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $query = $pdo->query("select * from marksheet");
                        $row = $query->fetchAll(PDO::FETCH_ASSOC);
 foreach($row as $values){
    ?>
                        <tr class="">
                            <td scope="row"><?php echo $values['id']?></td>
                            <td scope="row"><?php echo $values['name']?></td>
                            <td scope="row"><?php echo $values['maths']?></td>
                            <td scope="row"><?php echo $values['physic']?></td>
                            <td scope="row"><?php echo $values['chemistry']?></td>
                            <td scope="row"><?php echo $values['english']?></td>
                            <td scope="row"><?php echo $values['urdu']?></td>
                            <td scope="row"><?php echo $values['obtained']?></td>
                            <td scope="row"><?php echo $values['totalMarks']?></td>
                            <td scope="row"><?php echo $values['percentage']?></td>
                            <td scope="row"><?php echo $values['grade']?></td>
                            <td scope="row"><?php echo $values['remarks']?></td>
                            <td><a href="update.php?id=<?php echo $values['id']?>"class="btn btn-outline-success">Edit</a></td>
                            <td><a href="?uid=<?php echo $values['id']?>"class="btn btn-outline-danger">Delete</a></td>
        
                        </tr>
    <?php

 }  
    if(isset($_GET['uid'])){
        $id = $_GET['uid'];
        $query = $pdo->prepare("delete from marksheet where id =:uid");
        $query->bindparam(":uid",$id);
        $query->execute();
        echo"<script>alert('data delete successfully');
        location.assign('view.php');
        </script>";
    }                     
                        ?>
                        
                       
                    </tbody>
                </table>
            </div>
            
        </div>
    </body>
</html>
