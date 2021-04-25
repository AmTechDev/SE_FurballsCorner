
<?php
include('db.php');

?>
<?php 
include('pages/header.php'); 
?>
<?php 
include('pages/sidebar.php'); 
?>
<div class="main-content">
            <header>
                <div class="searchwrapper">
                   
                    <input type="search" placeholder="search.."> <i class="fas fa-search"></i>

                    
                </div>
                
                  
                
            </header>
            <main>
            
                <section class="table">
                    <h2>Process Orders  
                </h2>
                <button name="intopdf" class="generatepdf"><i class="fas fa-download"> PDF</i></button>
                <div class="table-res">
                <table class="table table-bordered" >
                    <thead id="tableboot">
                         <tr>
                         <th class="text-center">ID</th>
				         <th class="text-center">Name</th>
                         <th class="text-center">Address</th>
				         <th class="text-center">Order Details</th>
				         <th class="text-center">Payment Method</th>
                         <th class="text-center">Edit</th>
				         <th class="text-center">Delete</th>
                        </tr>
                    </thead>
                     <tbody>
                         <?php

                            $get_data = "SELECT * FROM product";
                            $run_data = mysqli_query($con,$get_data);

                            while($row = mysqli_fetch_array($run_data))
                            {   
                                $cat_id = $row['cat_id'];
                                $cat_name = $row['cat_name'];
                                $cat_image = $row['cat_image'];

                                

                                echo "

                                    <tr>
                                    <td class='text-center'>$cat_id</td>
                                    <td class='text-center'>$cat_name</td>
                                    <td class='text-center'><img src='images/$cat_image' style='width:50px; height:50px;'></td>
                                    <td class='text-center'></td>
                                    <td class='text-center'></td>
                                    <td class='text-center'>
                                        <span>
                                            <a href='#'>
                                                <i class='fa fa-edit editcon' data-toggle='modal' data-target='#edit$cat_id' style='' aria-hidden='true'></i>
                                            </a>
                                        </span>
                                        
                                    </td>
                                    <td class='text-center'>
                                        <span>
                                            <a href='#'>
                                                <i class='fa fa-trash deletecon' data-toggle='modal' data-target='#$cat_id' style='' aria-hidden='true'></i>
                                            </a>
                                        </span>
                                        
                                    </td>
                                </tr>


                                ";
                            } 

                            ?>

                
                    </tbody>
                </table>
                </div>
                </section>

                                    <!---Add in modal---->

                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content" >
                        <div class="modal-header" id="modal-head">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-center">Add Category</h4>
                        </div>
                        <div class="modal-body" id="body-modal">
                            <form action="add.php" method="POST" enctype="multipart/form-data">
                                
                                <div class="form-group" id="forminput">
                                    <label>Name</label>
                                    <input type="text" name="cat_name" class="form-control" placeholder="Name of category.....">
                                </div>

                                <div class="form-group" id="forminput">
                                    <label>Image</label>
                                    <input type="file" name="cat_image" class="form-control" >
                                </div>
                                
                                <input type="submit" name="submit" class="btn btn-info btn-large" value="Submit">
                                
                                
                            </form>
                        </div>
                        <div class="modal-footer" id="modal-foot">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        </div>

                    </div>
                    </div>


                    <!------DELETE modal---->




                    <!-- Modal -->
                    <?php

                    $get_data = "SELECT * FROM category";
                    $run_data = mysqli_query($con,$get_data);

                    while($row = mysqli_fetch_array($run_data))
                    {
                        $cat_id = $row['cat_id'];
                        echo "

                    <div id='$cat_id' class='modal fade' role='dialog'>
                    <div class='modal-dialog'>

                        <!-- Modal content-->
                        <div class='modal-content'>
                        <div class='modal-header'id='modal-head'>
                            <button type='button' class='close' data-dismiss='modal'>&times;</button>
                            <h4 class='modal-title text-center'>Are you want to sure?</h4>
                        </div>
                        <div class='modal-body'>
                            <a href='delete.php?id=$cat_id' class='btn btn-danger' style='margin-left:250px'>Delete</a>
                        </div>
                        
                        </div>

                    </div>
                    </div>


                        ";
                    }


                    ?>

                    <!----edit Data--->

                    <?php

                    $get_data = "SELECT * FROM category";
                    $run_data = mysqli_query($con,$get_data);

                    while($row = mysqli_fetch_array($run_data))
                    {
                        $cat_id = $row['cat_id'];
                        $cat_name = $row['cat_name'];
                        $cat_image = $row['cat_image'];
                        
                        
                        echo "

                    <div id='edit$cat_id' class='modal fade' role='dialog'>
                    <div class='modal-dialog'>

                        <!-- Modal content-->
                        <div class='modal-content'>
                        <div class='modal-header'id='modal-head'>
                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                <h4 class='modal-title text-center'>Edit your Data</h4> 
                        </div>

                        <div class='modal-body'>
                            <form action='edit.php?id=$cat_id' method='post' enctype='multipart/form-data'>

                                <div class='form-group'id='forminput'>
                                    <label>Name</label>
                                    <input type='text' name='cat_name' class='form-control' value='$cat_name'>
                                </div>
                                <div class='form-group' id='forminput'>
                                    <label>Image</label>
                                    <input type='file' name='cat_image' class='form-control' required>
                                    <img src = 'images/$cat_image' style='width:50px; height:50px'>
                                </div>

                                
                        
                                
                                <input type='submit' name='submit' class='btn btn-info btn-large' value='Submit'>
                                

                            </form>
                        </div>

                        </div>

                    </div>
                    </div>


                        ";
                    }


                    ?>
            </main>
        </div>
<?php 
include('pages/footer.php'); 
?>