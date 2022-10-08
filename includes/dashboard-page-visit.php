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
                                        <div class="col text-end">
                                            <a href="#" class="btn btn-sm btn-primary">See all</a>
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
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                                require_once("././config.php");

                                                $sqlSelectMostRecentBirth = "SELECT * FROM birth";
                                                $statement = $conn->prepare($sqlSelectMostRecentBirth);
                                                $results = $statement->execute();
                                                $rows = $statement->rowCount();
                                                $columns = $statement->fetchAll();

                                                if($results){
                                                    foreach($columns as $column){
                                                        $id = $column['id'];
                                                        $nameofbaby = $column['nameofbaby'];
                                                        $nameofmother = $column['nameofmother'];
                                                        $dateofbirth = $column['dateofbirth'];
                                                        $nameoffather = $column['nameoffather'];
                                                        $addressofparents = $column['addressofparents'];
                                                        $contactofparents = $column['contactofparents'];

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
                                                      
                                                        </tr>
                                                        ";

                                                    }
                                                } else{ 
                                                    $_SESSION['message'] = "Oooops Something went wrong!!";
                                                    $_SESSION['alert'] = "alert alert-warning";
                                                }
                                            
                                            ;?>
                                       
                                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>