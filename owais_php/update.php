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
       <?php
       if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query =$pdo->prepare("select * from marksheet where id =:pid");
        $query->bindParam("pid",$id);
        $query->execute();
        $rowData = $query->fetch(PDO::FETCH_ASSOC);
        // var_dump($rowData['id']);die;
       }   
        ?>
    <div class="container">
       <h1 class="text-info text-center mt-2">marksheet</h1>
       <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $rowData['id']?>">
        <div class="mb-3">
            
            <label for="" class="form-label">Name</label>
            <input
                type="text"
                name="name"
                id=""
                class="form-control"
                placeholder=""
                aria-describedby="helpId"
                value="<?php echo $rowData['name'] ?>"
            />
        </div>
        <div class="mb-3">
            
            <label for="" class="form-label">Maths</label>
            <input
                type="text"
                name="maths"
                id=""
                class="form-control"
                placeholder=""
                aria-describedby="helpId"
                value="<?php echo $rowData['maths'] ?>"
            />
        </div>
        <div class="mb-3">
            
            <label for="" class="form-label">Physic</label>
            <input
                type="text"
                name="physic"
                id=""
                class="form-control"
                placeholder=""
                aria-describedby="helpId"
                value="<?php echo $rowData['physic'] ?>"
            />
        </div>
        <div class="mb-3">
            
            <label for="" class="form-label">Chemistry</label>
            <input
                type="text"
                name="chemistry"
                id=""
                class="form-control"
                placeholder=""
                aria-describedby="helpId"
                value="<?php echo $rowData['chemistry'] ?>"
            />
        </div>
        <div class="mb-3">
            
            <label for="" class="form-label">English</label>
            <input
                type="text"
                name="english"
                id=""
                class="form-control"
                placeholder=""
                aria-describedby="helpId"
                value="<?php echo $rowData['english'] ?>"
            />
        </div>
        <div class="mb-3">
            
            <label for="" class="form-label">Urdu</label>
            <input
                type="text"
                name="urdu"
                id=""
                class="form-control"
                placeholder=""
                aria-describedby="helpId"
                value="<?php echo $rowData['urdu'] ?>"
            />
        </div>
        <button type="submit" name="marksheet" class= "btn btn-outline-success">click</button>
       </div>
       <?php
       if(isset($_POST['marksheet'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $maths = $_POST['maths'];
        $physic = $_POST['physic'];
        $chemistry = $_POST['chemistry'];
        $english = $_POST['english'];
        $urdu = $_POST['urdu'];
        $obtained = $maths + $physic + $chemistry + $english +$urdu;
        $totalMarks = 500;
        $percentage = $obtained/$totalMarks*100;
        $grade="";
        $remarks="";
        if($percentage>=90 && $percentage<=100){
            $grade="A+";
            $remarks = "EXCELLENT";
       }
        else if($percentage>=70 && $percentage<90){
             $grade="A";
            $remarks = "VERY GOOD";
        }
        else if($percentage>=60 && $percentage<70){
            $grade="B";
           $remarks =  "GOOD";
       }else if($percentage>=50 && $percentage<60){
        $grade="C";
       $remarks = "FAIR";
   }else if($percentage>=40 && $percentage<50){
    $grade="D";
   $remarks = "NICE";
}else{
    $grade="FAIL";
    $remarks="TRY AGAIN";
}
// var_dump($_POST);die;
$query = $pdo->prepare("update marksheet set name =:pn,chemistry =:pc,physic =:pp,maths =:pm,english =:pe,urdu =:pu,obtained =:po,percentage =:pper,grade =:pg,remarks =:pr where id =:pid");

    // $sql = "UPDATE `marksheet` SET `name`=:name,`maths`=:maths,`physic`=:physic,`chemistry`= :chemistry,`english`=:english,`urdu`=:urdu,`obtained`=:obtained,`totalMarks`=:totalMarks,`percentage`=:percentage,`grade`=:grade,`remarks`=:remarks WHERE `id`=:id";

    // // Prepare the statement
    // $query = $pdo->prepare($sql);

    // Bind parameters to the query
    $query->bindParam(':pid', $id);
    $query->bindParam(':pn', $name);
    $query->bindParam(':pm', $maths);
    $query->bindParam(':pp', $physic);
    $query->bindParam(':pc', $chemistry);
    $query->bindParam(':pe', $english);
    $query->bindParam(':pu', $urdu);
    $query->bindParam(':po', $obtained);
    // $query->bindParam(':totalMarks', $totalMarks);
    $query->bindParam(':pper', $percentage);
    $query->bindParam(':pg', $grade);
    $query->bindParam(':pr', $remarks);


try{
    // Execute the statement
    $query->execute();
    echo "<script>alert('Record updated successfully!');
    location.assign('view.php');</script>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
       ?>
       <!-- <div class="table-responsive"> -->
        <div
            class="table-responsive"
        >
            <table
                class="table table-primary"
            >
                <thead>
                    <tr>
                        <th scope="col">NAME</th>
                        <th scope="col">MATHS</th>
                        <th scope="col">PHYSIC</th>
                        <th scope="col">CHEMISTRY</th>
                        <th scope="col">ENGLISH</th>
                        <th scope="col">URDU</th>
                        <th scope="col">OBTAINED</th>
                        <th scope="col">TOTAL</th>
                        <th scope="col">PERCENTAGE</th>
                        <th scope="col">GRADE</th>
                        <th scope="col">REMARKS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td scope="row"><?php echo $name?></td>
                        <td scope="row"><?php echo $maths?></td>
                        <td scope="row"><?php echo $physic?></td>
                        <td scope="row"><?php echo $chemistry?></td>
                        <td scope="row"><?php echo $english?></td>
                        <td scope="row"><?php echo $urdu?></td>
                        <td scope="row"><?php echo $obtained?></td>
                        <td scope="row"><?php echo $totalMarks?></td>
                        <td scope="row"><?php echo $percentage?></td>
                        <td scope="row"><?php echo $grade?></td>
                        <td scope="row"><?php echo $remarks?></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        <?php
       }
       ?>
    </body>
</html>
