<?php



//clean POST vars
function sterilize($element){
    return trim(htmlspecialchars($element));
}



require_once("./config.php");

//total number of birth
$sqlTotalNumberOfBirth = "SELECT * FROM birth";
$statement = $conn->prepare($sqlTotalNumberOfBirth);
$results = $statement->execute();
$totalNumberOfbirth = $statement->rowCount();


//total number of death
$sqlTotalNumberOfDeath = "SELECT * FROM death";
$statement = $conn->prepare($sqlTotalNumberOfDeath);
$results = $statement->execute();
$totalNumberOfDeath = $statement->rowCount();



;?>