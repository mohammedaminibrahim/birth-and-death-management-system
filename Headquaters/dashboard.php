<?php
    session_start();
    if(!isset($_SESSION['email']) OR $_SESSION['email'] == 0){
        header("location: login.php");
    }

    require_once("./config.php");
    $sqltotalNumberOfBirth = "SELECT * FROM birth";
    $statement = $conn->prepare($sqltotalNumberOfBirth);
    $results = $statement->execute();
    $totalNumberOfBirth = $statement->rowCount();

    $sqltotalNumberOfBirth = "SELECT population FROM population";
    $statement = $conn->prepare($sqltotalNumberOfBirth);
    $results = $statement->execute();
    $totalPopulation = $statement->rowCount();
    $totalPopulation = $totalPopulation + $totalPopulation;

    function birthRate(){
       

        $totalBirthRate = ($totalNumberOfBirth / $totalPopulation) * 10000;
        return $totalBirthRate;
    }
;?>

<?php


require_once("./includes/dashboard-head.php");?>

       <?php
       
        require_once("./includes/dashboard-side-bar.php");
       
       ;?>
        
        <main class="content">

            <?php require_once("./includes/dashboard-top-nav-bar.php");?>
            <?php require_once("./includes/dashboard-graph.php");?>
                <?php require_once("./includes/dashboard-dashboard.php");?>
                
                  <?php require_once("./includes/dashboard-page-visit.php");?>
                       <?php// require_once("view-institution.php");?>
                       
                <?php require_once("./includes/dashboard-footer.php");?>