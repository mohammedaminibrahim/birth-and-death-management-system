<?php 
session_start();
$activeLink = 4;
require_once("./includes/dashboard-head.php");?>

       <?php
       
        require_once("./includes/dashboard-side-bar.php");
       
       ;?>
        
        <main class="content">

            <?php require_once("./includes/dashboard-top-nav-bar.php");?>
           
            <div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
        <?php
            if(isset($_SESSION['message'])):?>
                <div class="<?= $_SESSION['alert'];?>"  role="alert">
                    <strong><?= $_SESSION['message'];?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
        <?php endif;?>
            <div class="card-body">     
                <div class="row mb-4">
                    <div class="col-lg-12 col-sm-6">
                        <!-- Form -->


                        <main>


                <?php
                        //session_start();
                        require_once("./config.php");
                        $email =  $_SESSION['email'];
                        $sqlSelectAll = "SELECT * FROM users WHERE email = '$email'";
                        $statement = $conn->prepare($sqlSelectAll);
                        $results = $statement->execute();
                        $rows = $statement->rowCount();
                        $columns = $statement->fetchAll();


                        if($results){
                            foreach($columns as $column){
                                $id = $column['id'];
                                $email = $column['email'];
                            }

                            if(isset($_POST['submit'])){
                                $newpassword = $_POST['newpassword'];
                                $confirmnewpassword = $_POST['confirmnewpassword'];
                                //compare string
                                if($newpassword == $confirmnewpassword){
                                    $newpassword = password_hash($newpassword, PASSWORD_BCRYPT);
                                    $sqlUpdate = "UPDATE users SET password = '$newpassword'";
                                    $statement = $conn->prepare($sqlUpdate);
                                    $results = $statement->execute();

                                    if($results){
                                        $_SESSION['message'] = "Password Updated!!";
                                        $_SESSION['alert'] = "alert alert-primary";
                                    }else{
                                        $_SESSION['message'] = "Something went wrong!!";
                                        $_SESSION['alert'] = "alert alert-danger";
                                    }

                                } else {
                                    $_SESSION['message'] = "Password!! Mismatch!!";
                                    $_SESSION['alert'] = "alert alert-danger";
                                }
                            } else{
                                $_SESSION['message'] = "Oooopps!! Try Agaian";
                                $_SESSION['alert'] = "alert alert-danger";
                            }
                        } else{
                            $_SESSION['message'] = "Oooopps!! Try Agaian";
                            $_SESSION['alert'] = "alert alert-danger";
                        }
                
                
                ;?>

<!-- Section -->
<section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center form-bg-image">
           
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="bg-white shadow border-0 rounded p-4 p-lg-5 w-100 fmxw-500">
                    <h1 class="h3 mb-4">Reset password</h1>
                    <form action="#">
                        <!-- Form -->
                        <div class="mb-4">
                            <label for="email">Your Email</label>
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="<?= $email;?>" id="email" required disabled>
                            </div>  
                        </div>
                        <!-- End of Form -->
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="password">Your Password</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon2">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                                </span>
                                <input type="password" name="newpassword" placeholder="Password" class="form-control" id="password" required>
                            </div>  
                        </div>
                        <!-- End of Form -->
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="confirm_password">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon2">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                                </span>
                                <input type="password" name="confirmnewpassword" placeholder="Confirm Password" class="form-control" id="confirm_password" required>
                            </div>  
                        </div>
                        <!-- End of Form -->
                        <div class="d-grid">
                            <button name="submit" type="submit" class="btn btn-gray-800">Reset password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</main>





                        <!-- End of Form -->
                </div>
            </div>
        </div>
    </div>
</div>
           

                <?php require_once("./includes/dashboard-footer.php");?>