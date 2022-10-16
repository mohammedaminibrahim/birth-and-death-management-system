<?php
session_start();
$activeLink = 3;
require_once("./includes/dashboard-head.php"); ?>

<?php

require_once("./includes/dashboard-side-bar.php");; ?>

    <main class="content">

<?php require_once("./includes/dashboard-top-nav-bar.php"); ?>

    <div class="row">
    <div class="col-12 mb-4">
    <div class="card border-0 shadow components-section">
<?php
if (isset($_SESSION['message'])):?>
    <div class="<?= $_SESSION['alert']; ?>" role="alert">
        <strong><?= $_SESSION['message']; ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
    <div class="card-body">
    <div class="row mb-4">
        <div class="col-lg-12 col-sm-6">
            <!-- Form -->

            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="card border-0 shadow">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h2 class="fs-5 fw-bold mb-0">Most Recent Death</h2>
                                        </div>
                                        <!-- <div class="col text-end">
                                            <a href="#" class="btn btn-sm btn-primary">See all</a>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                        <tr>
                                            <th class="border-bottom" scope="col">#</th>
                                            <th class="border-bottom" scope="col">Name of Hospital</th>
                                            <th class="border-bottom" scope="col">Name of Informant</th>
                                            <th class="border-bottom" scope="col">Deseased</th>
                                            <th class="border-bottom" scope="col">Date of Death</th>
                                            <th class="border-bottom" scope="col">Gender</th>
                                            <th class="border-bottom" scope="col">Contact Of Informant</th>
                                            <th class="border-bottom" scope="col">Place of Birth</th>
                                            <th class="border-bottom" scope="col">Age of Deseased</th>
                                            <th class="border-bottom" scope="col">Cause Of Death</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        require_once("././config.php");

                                        $sqlSelectMostRecentBirth = "SELECT * FROM death";
                                        $statement = $conn->prepare($sqlSelectMostRecentBirth);
                                        $results = $statement->execute();
                                        $rows = $statement->rowCount();
                                        $columns = $statement->fetchAll();

                                        if ($results) {
                                            foreach ($columns as $column) {
                                                $id = $column['id'];
                                                $nameofhospital = $column['nameofhospital'];
                                                $nameofinformant = $column['nameofinformant'];
                                                $nameofdeased = $column['nameofdeased'];
                                                $dateofdeath = $column['dateofdeath'];
                                                $gender = $column['gender'];
                                                $contactofinformant = $column['contactofinformant'];
                                                $placeofdeath = $column['placeofdeath'];
                                                $ageofdeseased = $column['ageofdeseased'];
                                                $causeofdeath = $column['causeofdeath'];

                                                echo "
                                                        <tr>
                                                        <th class='text-gray-900' scope='row'>
                                                            {$id}
                                                        </th>
                                                        <td class='fw-bolder text-gray-500'>
                                                                {$nameofhospital}
                                                        </td>
                                                        <td class='fw-bolder text-gray-500'>
                                                            {$nameofinformant}
                                                        </td>
                                                        <td class='fw-bolder text-gray-500'>
                                                          {$nameofdeased}
                                                        </td>
                                                        <td class='fw-bolder text-gray-500'>
                                                                {$dateofdeath}
                                                        </td>
                                                        <td class='fw-bolder text-gray-500'>
                                                            {$gender}
                                                        </td>
                                                        <td class='fw-bolder text-gray-500'>
                                                        {$contactofinformant}
                                                        </td>
                                                        <td class='fw-bolder text-gray-500'>
                                                        {$placeofdeath}
                                                        </td>
                                                        <td class='fw-bolder text-gray-500'>
                                                        {$ageofdeseased}
                                                        </td>
                                                        <td class='fw-bolder text-gray-500'>
                                                        {$causeofdeath}
                                                        </td>
                                                      
                                                        </tr>
                                                        ";

                                            }
                                        } else {
                                            $_SESSION['message'] = "Oooops Something went wrong!!";
                                            $_SESSION['alert'] = "alert alert-warning";
                                        }; ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <!-- End of Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php require_once("./includes/dashboard-footer.php"); ?>