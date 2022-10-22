<?php
session_start();
require_once("./includes/dashboard-head.php");

require_once("./config.php");
require_once("./auxiliaries.php");
$current_record = null;
if (is_get_request()) {
    if (!isset($_GET['id'])) {
        go_to('view-birth.php');
    }
    $current_record = get_user_by_id($_GET['id']);

    if (!$current_record) {
        go_to('view-birth.php');
    }

} elseif (is_post_request()) {

    if(isset($_POST['delete_id'])){
//        delete record
        $id = sterilize($_POST['delete_id']);
        $result = delete_record_by_id('birth',$id);
        if($result){
            set_session_message(SESSION_TYPE_SUCCESS, 'Record deleted successfully');
            go_to('view-birth.php');
        }else{
            set_session_message(SESSION_TYPE_ERROR, 'Failed to delete record');
            go_to('edit-birth-record.php?id=' . $id);
        }

    }

    if (isset($_POST['submit'])) {
        $id = sterilize($_POST['id']);
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

            $insertInfo = "UPDATE birth SET nameofhospital= :nameofhospital, nameofmother = :nameofmother, nameoffather = :nameoffather, nameofbaby=:nameofbaby, dateofbirth=:dateofbirth, gender=:gender, contactofparents=:contactofparents, addressofparents=:addressofparents, placeofbirth=:placeofbirth 
                                    WHERE id= :id";
            $statement = $conn->prepare($insertInfo);
            $results = $statement->execute(
                [
                    ':id' => $id,
                    ':nameofhospital' => $nameofhospital,
                    ':nameofmother' => $nameofmother,
                    ':nameoffather' => $nameoffather,
                    ':nameofbaby' =>  $nameofbaby,
                    ':gender' =>$gender ,
                    ':dateofbirth' => $dateofbirth,
                    ':contactofparents' => $contactofparents,
                    ':addressofparents' => $addressofparents,
                    ':placeofbirth' => $placeofbirth
                ]
            );

            if($results){
                set_session_message(SESSION_TYPE_SUCCESS, 'Record updated successfully');
                go_to('view-birth.php');
            }else{
                set_session_message(SESSION_TYPE_ERROR, 'Failed to update record');
                go_to('edit-birth-record.php?id=' . $id);
            }
        } else {
            set_session_message(SESSION_TYPE_SUCCESS, "All Fields Are Required!!");
        }
    };
}


?>
<?php

require_once("./includes/dashboard-side-bar.php");; ?>

<main class="content">
    <div class="mt-5 mb-5 d-flex justify-content-between">
        <a href="./view-birth.php"
           class="btn btn-gray-800 d-inline-flex align-items-center me-2">
            Back
        </a>

        <form onsubmit="return confirm('Are you sure you want to delete this record?')" action="" method="post">
            <input type="text" name="delete_id" hidden value="<?= $current_record['id']; ?>">
            <button class="btn btn-danger d-inline-flex align-items-center me-2" type="submit" name="delete_submit">Delete</button>
        </form>

    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <?php get_session_message(SESSION_TYPE_ERROR); ?>
                <div class="card-body">
                    <form action="" method="POST" class="row g-3">
                        <input type="text" hidden
                               name="id"
                               value="<?= $current_record['id'] ?>">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label disabled" for="validationServer01">Hospital</label>
                                <input name="nameofhospital" class="form-control"
                                       id="validationServer01" type="text" required=""
                                       value="<?= $current_record['nameofhospital'] ?>">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="validationServer02">Name of Mother</label>
                                <input name="nameofmother" class="form-control"
                                       id="validationServer02" type="text" required=""
                                       value="<?= $current_record['nameofmother'] ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="validationServer02">Name of Father</label>
                                <input name="nameoffather" class="form-control" id="validationServer02"
                                       type="text" required=""
                                       value="<?= $current_record['nameoffather'] ?>"
                                >
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="validationServer02">Name of Baby</label>
                                <input name="nameofbaby" class="form-control" id="validationServer02"
                                       type="text" required=""
                                       value="<?= $current_record['nameofbaby'] ?>"

                                >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="validationServer02">Date of Birth</label>
                                <input name="dateofbirth" class="form-control" id="validationServer02"
                                       type="date" required=""
                                       value="<?= $current_record['dateofbirth'] ?>"
                                >
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="validationServer01">Gender</label>
                                <input name="gender" class="form-control" id="validationServer01"
                                       type="text"
                                       required=""
                                       value="<?= $current_record['gender'] ?>"

                                >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="validationServer02">Contact Number of
                                    Parents</label>
                                <input name="contactofparents" class="form-control" id="validationServer02"
                                       type="text" required=""
                                       value="<?= $current_record['contactofparents'] ?>"

                                >
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="validationServer02">Address of
                                    Parents</label>
                                <input name="addressofparents" class="form-control" id="validationServer02"
                                       type="text" required=""
                                       value="<?= $current_record['addressofparents'] ?>"
                                >
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="validationServer02">Place of Birth</label>
                                <input name="placeofbirth" class="form-control" id="validationServer02"
                                       type="text" required=""
                                       value="<?= $current_record['placeofbirth'] ?>"
                                >
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <button type="submit" name="submit" class="btn btn-primary"
                                        role="button">Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php require_once("./includes/dashboard-footer.php"); ?>
