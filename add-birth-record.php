<?php
session_start();
require_once("./includes/dashboard-head.php");

require_once("./config.php");
require_once("./auxiliaries.php");

if (isset($_POST['submit'])) {
    $nameofhospital = sterilize($_POST['nameofhospital']);
    $nameofmother = sterilize($_POST['nameofmother']);
    $nameoffather = sterilize($_POST['nameoffather']);
    $nameofbaby = sterilize($_POST['nameofbaby']);
    $dateofbirth = sterilize($_POST['dateofbirth']);
    $gender = sterilize($_POST['gender']);
    $contactofparents = sterilize($_POST['contactofparents']);
    $addressofparents = sterilize($_POST['addressofparents']);
    $placeofbirth = sterilize($_POST['placeofbirth']);

    if (!empty($nameofhospital) && !empty($nameofmother)
        && !empty($nameoffather) && !empty($nameofbaby)
        && !empty($dateofbirth) && !empty($gender)
        && !empty($contactofparents) && !empty($addressofparents)
        && !empty($placeofbirth)) {
        //check if data already exist
        $slq = "SELECT * FROM birth WHERE nameofhospital = '$nameofhospital' AND nameofmother = '$nameofmother' AND
                                nameoffather = '$nameoffather' AND nameofbaby = '$nameofbaby' AND dateofbirth = '$dateofbirth' AND gender = '$gender'";
        $statement = $conn->prepare($slq);
        $results = $statement->execute();
        $rows = $statement->rowCount();

        if ($rows > 0) {
            set_session_message(SESSION_TYPE_ERROR, "Child Data Already Exist!!");
        } else {
            $insertInfo = "INSERT INTO birth(nameofhospital, nameofmother, nameoffather, nameofbaby, dateofbirth, gender, contactofparents, addressofparents, placeofbirth) 
                                    VALUES('$nameofhospital', '$nameofmother', '$nameoffather', '$nameofbaby', '$dateofbirth', '$gender', '$contactofparents', '$addressofparents', '$placeofbirth')";
            $statement = $conn->prepare($insertInfo);
            $results = $statement->execute();
            $rows = $statement->rowCount();
            if ($results) {
                set_session_message(SESSION_TYPE_SUCCESS, "New Birth Data Inserted!!");
                header("location: view-birth.php");
                exit();
            } else {
                set_session_message(SESSION_TYPE_ERROR, "Oops Something Went Wrong!!");
            }
        }
    } else {
        set_session_message(SESSION_TYPE_SUCCESS, "All Fields Are Required!!");
    }
};


?>
<?php

require_once("./includes/dashboard-side-bar.php");; ?>

<main class="content">
    <div class="mt-5 mb-5">
        <a href="./view-birth.php"
           class="btn btn-gray-800 d-inline-flex align-items-center me-2">
            Back
        </a>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <?php get_session_message(SESSION_TYPE_ERROR); ?>
                <div class="card-body">
                    <form action="" method="POST" class="row g-3">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label disabled" for="validationServer01">Hospital</label>
                                <input name="nameofhospital" class="form-control" aria-disabled="true"
                                       id="validationServer01" type="text" required="">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="validationServer02">Name of Mother</label>
                                <input name="nameofmother" class="form-control" id="validationServer02"
                                       type="text" required="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="validationServer02">Name of Father</label>
                                <input name="nameoffather" class="form-control" id="validationServer02"
                                       type="text" required="">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="validationServer02">Name of Baby</label>
                                <input name="nameofbaby" class="form-control" id="validationServer02"
                                       type="text" required="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="validationServer02">Date of Birth</label>
                                <input name="dateofbirth" class="form-control" id="validationServer02"
                                       type="date" required="">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="validationServer01">Gender</label>
                                <input name="gender" class="form-control" id="validationServer01"
                                       type="text"
                                       required="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="validationServer02">Contact Number of
                                    Parents</label>
                                <input name="contactofparents" class="form-control" id="validationServer02"
                                       type="text" required="">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="validationServer02">Address of
                                    Parents</label>
                                <input name="addressofparents" class="form-control" id="validationServer02"
                                       type="text" required="">
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="validationServer02">Place of Birth</label>
                                <input name="placeofbirth" class="form-control" id="validationServer02"
                                       type="text" required="">
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <button type="submit" name="submit"  class="btn btn-primary"
                                        role="button">Submit</button>
                            </div>
                        </div>
                    </form>
                    <div class="row mb-4">
                        <div class="col-lg-12 col-sm-6">
                            <div class="tab-content rounded-bottom">
                                <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1054">
                                    <form action="" method="POST" class="row g-3">


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("./includes/dashboard-footer.php"); ?>
