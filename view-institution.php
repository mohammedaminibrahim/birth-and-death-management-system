<div class="row">
                <div class="col-12 col-xl-12">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="card border-0 shadow">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h2 class="fs-5 fw-bold mb-0">New Institution</h2>
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
                                            <th class="border-bottom" scope="col">Address</th>
                                            <th class="border-bottom" scope="col">Contact</th>
                                            <th class="border-bottom" scope="col">Officer Name</th>
                                            <th class="border-bottom" scope="col">Officer Contact</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                                require_once("././config.php");

                                                $sqlSelectInst = "SELECT * FROM institutions";
                                                $statement = $conn->prepare($sqlSelectInst);
                                                $results = $statement->execute();
                                                $rows = $statement->rowCount();
                                                $columns = $statement->fetchAll();

                                                if($results){
                                                    foreach($columns as $column){
                                                        $id = $column['id'];
                                                        $instname = $column['instname'];
                                                        $instaddress = $column['instaddress'];
                                                        $contactaddress = $column['contactaddress'];
                                                        $typeofinstitution = $column['typeofinstitution'];
                                                        $officerfullname = $column['officerfullname'];
                                                        $officeremail = $column['officeremail'];
                                                        $officeraddress = $column['officeraddress'];
                                                        

                                                        echo "
                                                        <tr>
                                                        <th class='text-gray-900' scope='row'>
                                                            {$id}
                                                        </th>
                                                        <td class='fw-bolder text-gray-500'>
                                                                {$instname}
                                                        </td>
                                                        <td class='fw-bolder text-gray-500'>
                                                            {$instaddress}
                                                        </td>
                                                        <td class='fw-bolder text-gray-500'>
                                                          Mr. & Mrs. {$contactaddress} 
                                                        </td>
                                                        <td class='fw-bolder text-gray-500'>
                                                                {$typeofinstitution}
                                                        </td>
                                                        <td class='fw-bolder text-gray-500'>
                                                            {$officerfullname}
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