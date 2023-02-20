<?php
require_once '_connec.php';

$pdo = new \PDO(DSN, USER, PASS);

// A exécuter afin de tester le contenu de votre table friend
$getArray = "SELECT * FROM friend";
$statement = $pdo->query($getArray);
if($statement === false){
    var_dump($pdo->errorInfo());
    die("Erreur SQL");
}

// // On veut afficher notre résultat via un tableau associatif (PDO::FETCH_ASSOC)
$friendsArray = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach($friendsArray as $friend) {
    echo $friend['firstname'] . ' ' . $friend['lastname'];
}

// On veut afficher notre résultat via un tableau associatif (PDO::FETCH_OBJ)
$friendsObject = $statement->fetchAll(PDO::FETCH_OBJ);

foreach($friendsObject as $friend) {
    echo $friend->firstname . ' ' . $friend->lastname;
}


var_dump($friendsArray);


?>