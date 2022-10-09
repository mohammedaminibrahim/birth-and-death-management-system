<?php 
session_start();
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

                        <?php
                        
                        require_once("./config.php");
                        require_once("./auxiliaries.php");

                        if(isset($_POST['submit'])){
                          $instname = sterilize($_POST['instname']);
                          $instaddress = sterilize($_POST['instaddress']);
                          $contactaddress = sterilize($_POST['contactaddress']);
                          $typeofinstitution = sterilize($_POST['typeofinstitution']);
                          $officerfullname = sterilize($_POST['officerfullname']);
                          $officeremail = sterilize($_POST['officeremail']);
                          $officeraddress = sterilize($_POST['officeraddress']);

                          //check if all fields are not empty
                          if(!empty($instname) && !empty($instaddress) && !empty($contactaddress) && !empty($typeofinstitution)
                          && !empty($officerfullname) && !empty($officeremail) && !empty($officeraddress)){
                              //check if inst already exist
                              $sqlSelectFromDb = "SELECT * FROM institutions WHERE instname = '$instname' 
                              AND instaddress = '$instaddress' AND typeofinstitution = '$typeofinstitution'";
                              $statement = $conn->prepare($sqlSelectFromDb);
                              $results = $statement->execute();
                              $row = $statement->rowCount();

                              if($row > 0){
                                $_SESSION['message'] = "Institution Exist!!";
                                $_SESSION['alert'] = "alert alert-warning";
                              } else {
                                  $sqlAddnewIns = "INSERT INTO institutions(instname, instaddress, contactaddress, typeofinstitution, officerfullname, officeremail, officeraddress) 
                                  VALUES('$instname', '$instaddress', '$contactaddress', '$typeofinstitution', '$officerfullname','$officeremail', '$officeraddress')";
                                  $statement = $conn->prepare($sqlAddnewIns);
                                  $results = $statement->execute();

                                  if($results){
                                    $_SESSION['message'] = "INSERTED SUCCESS!!";
                                    $_SESSION['alert'] = "alert alert-primary";
                                  } else {
                                    $_SESSION['message'] = "ALL FIELDS ARE REQUIRED!!";
                                    $_SESSION['alert'] = "alert alert-danger";
                                  }


                              }
                          } else{
                            $_SESSION['message'] = "ALL FIELDS ARE REQUIRED!!";
                            $_SESSION['alert'] = "alert alert-danger";
                          }
                        }
                        
                        ;?>
                        
                        <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1054">
                        <form action="" method="POST" class="row g-3">
                          <div class="col-md-3">
                            <label class="form-label disabled" for="validationServer01">Institution Name</label>
                            <input name="instname" class="form-control"  aria-disabled="true"  id="validationServer01" type="text" required="">
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="validationServer02">Address</label>
                            <input name="instaddress" class="form-control" id="validationServer02" type="text" required="">
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="validationServer02">Contact Address</label>
                            <input name="contactaddress" class="form-control" id="validationServer02" type="text" required="">
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="validationServer02">Type of Institution</label>
                            <select class="form-control" name="typeofinstitution" id="" required>
                              <option>Select Type of Institution</option>
                              <option value="Hospital">Hospital</option>
                              <option value="Research">Research Institution</option>
                              <option value="Other">Other</option>
                            </select>
                          </div>
                          <hr>
                          <p class="text-primary">Information About Officer In charge</p>
                          <div class="col-md-4">
                            <label class="form-label" for="validationServer02">Full name</label>
                            <input name="officerfullname" class="form-control" id="validationServer02" type="text" required="">
                          </div>

                          <div class="col-md-4">
                            <label class="form-label" for="validationServer02">Email</label>
                            <input name="officeremail" class="form-control" id="validationServer02" type="text" required="">
                          </div>
                        
                          <div class="col-md-4">
                            <label class="form-label" for="validationServer02">Contact Address</label>
                            <input name="officeraddress" class="form-control" id="validationServer02" type="text" required="">
                          </div>
                        
                          <div class="col-12">
                            <input name="submit" value="Submit" class="btn btn-primary" type="submit" role="button">
                          </div>
                        </form>
                      </div>
                    </div>




                        <!-- End of Form -->
                </div>
            </div>
        </div>
    </div>
</div>
           

                <?php require_once("./includes/dashboard-footer.php");?>