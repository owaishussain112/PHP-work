<?php 
include('connection.php')
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
       <h1 class="text-info text-center mt-2">marksheet</h1>
       <form action="marksheet.php" method="post">
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
            
            <label for="" class="form-label">Maths</label>
            <input
                type="text"
                name="maths"
                id=""
                class="form-control"
                placeholder=""
                aria-describedby="helpId"
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
            />
        </div>
        <button type="submit" name="marksheet" class= "btn btn-outline-success">click</button>
       </div>
       <?php
       if(isset($_POST['marksheet'])){
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
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL query to insert data
    $sql = "INSERT INTO `marksheet`( `name`, `maths`, `physic`, `chemistry`, `english`, `urdu`, `obtained`, `totalMarks`, `percentage`, `grade`, `remarks`) 
            VALUES ( :name, :maths, :physic, :chemistry, :english, :urdu, :obtained, :totalMarks, :percentage, :grade, :remarks)";

    // Prepare the statement
    $stmt = $pdo->prepare($sql);

    // Bind parameters to the query
    // $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':maths', $maths);
    $stmt->bindParam(':physic', $physic);
    $stmt->bindParam(':chemistry', $chemistry);
    $stmt->bindParam(':english', $english);
    $stmt->bindParam(':urdu', $urdu);
    $stmt->bindParam(':obtained', $obtained);
    $stmt->bindParam(':totalMarks', $totalMarks);
    $stmt->bindParam(':percentage', $percentage);
    $stmt->bindParam(':grade', $grade);
    $stmt->bindParam(':remarks', $remarks);


try{
    // Execute the statement
    $stmt->execute();
    echo "Record inserted successfully!";
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
