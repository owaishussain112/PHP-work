<?php
include('components/header.php') 
?>
            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded mx-0">
                    <div class="col-md-12">
                        <h3 class="py-3">Add Categories</h3>
                        <form class="mx-3" action="php/query.php" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">category name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="catName">
                                 
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">category image</label>
                                    <input type="file" name="catImage" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3 form-check">
                                </div>
                                <button type="submit" name="addCategory" class="btn btn-primary">add category</button>
                            </form>
                    </div>
                </div>
            </div>
            <!-- Blank End -->
            <?php
include('components/footer.php') 
?>