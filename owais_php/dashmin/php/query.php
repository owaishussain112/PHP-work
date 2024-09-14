<?php 
include('connection.php');

if(isset($_POST['addCategory'])){
    $catName = $_POST['catName'];
    $catImageName = $_FILES['catImage']['name'];
    $catTmpName = $_FILES['catImage']['tmp_name'];
    $extension = pathinfo(path: $catImageName,
    flags:PATHINFO_EXTENSION);
    $imagPath = '../img/categories/'.$catImageName;
    if($extension == "jpg" || $extension == "png" ||$extension == "jpeg" ||$extension == "webp"){
        if(move_uploaded_file(from: $catTmpName,to: $imagPath)){
            $query = $pdo->prepare("INSERT INTO categories (catName, catImage) VALUES (:pn, :pi)");                
            $query->bindParam(param: "pn",var: $catName);
            $query->bindParam(param: "pi",var: $catImageName);
            $query->execute();
          
            // Success message
            echo "<script>alert('Category added successfully'); location.assign('../addcategory.php');</script>";
        } else {
            // Failure to upload image
            echo "<script>alert('Failed to upload image'); location.assign('../addcategory.php');</script>";
        }
    } else {
        // Invalid image extension
        echo "<script>alert('Invalid image extension'); location.assign('../addcategory.php');</script>";
    }
}
?>