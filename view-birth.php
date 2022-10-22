<?php
session_start();
$activeLink = 2;
require_once("./includes/dashboard-head.php");
require_once 'auxiliaries.php';
require_once("./includes/dashboard-side-bar.php");
require_once("./config.php");
?>
    <main class="content">
    <div class="mt-5 mb-5">


        <a href="./add-birth-record.php" class="btn btn-gray-800 d-inline-flex align-items-center me-2"
           aria-haspopup="true" aria-expanded="false">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            New Record
        </a>
    </div>
    <div class="row">
    <div class="col-12 mb-4">
    <div class="card border-0 shadow components-section">
<?php get_session_message(SESSION_TYPE_SUCCESS); ?>
    <div class="card-body">
    <div class="row mb-4">
        <div class="col-lg-12 col-sm-6">
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="card border-0 shadow">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h2 class="fs-5 fw-bold mb-0">Most Recent Birth</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                        <tr>
                                            <th class="border-bottom" scope="col">#</th>
                                            <th class="border-bottom" scope="col">Fullname</th>
                                            <th class="border-bottom" scope="col">Date of Birth</th>
                                            <th class="border-bottom" scope="col">Parents Name</th>
                                            <th class="border-bottom" scope="col">Parents Address</th>
                                            <th class="border-bottom" scope="col">Parents Contact</th>
                                            <th class="border-bottom" scope="col"></th>
                                            <th class="border-bottom" scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sqlSelectMostRecentBirth = "SELECT * FROM birth";
                                        $statement = $conn->prepare($sqlSelectMostRecentBirth);
                                        $results = $statement->execute();
                                        $rows = $statement->rowCount();
                                        $columns = $statement->fetchAll();
                                        if ($results) {
                                            foreach ($columns as $column) {
                                                extract($column);

                                                echo "
                                                        <tr>
                                                        <th class='text-gray-900' scope='row'>
                                                            {$id}
                                                        </th>
                                                        <td class='fw-bolder text-gray-500'>
                                                                {$nameofbaby}
                                                        </td>
                                                        <td class='fw-bolder text-gray-500'>
                                                            {$dateofbirth}
                                                        </td>
                                                        <td class='fw-bolder text-gray-500'>
                                                          Mr. & Mrs. {$nameoffather} {$nameofmother}
                                                        </td>
                                                        <td class='fw-bolder text-gray-500'>
                                                                {$addressofparents}
                                                        </td>
                                                        <td class='fw-bolder text-gray-500'>
                                                            {$contactofparents}
                                                        </td>
                                                        <td class='fw-bolder text-gray-500'>
                                                            <a href='./edit-birth-record.php?id={$id}' class='btn btn-info' role='button'>Edit</a>
                                                        </td>
                                                        <td class='fw-bolder text-gray-500'>
                                                            <a href='certificate.php?id={$id}' class='btn btn-primary' role='button'>Certificate</a>
                                                        </td>
                                                      
                                                        </tr>
                                                        ";

                                            }
                                        } else {
                                            $_SESSION['message'] = "Oooops Something went wrong!!";
                                            $_SESSION['alert'] = "alert alert-warning";
                                        } ?>
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