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

// // On veut afficher notre résultat via un tableau objet (PDO::FETCH_OBJ)
$friendsObject = $statement->fetchAll(PDO::FETCH_OBJ);

?>

<ul>
    <?php foreach($friendsObject as $friend):?>
        <li>
            <span><?= $friend->firstname ?></span>
            <span><?= $friend->lastname ?></span>
        </li>
    <?php endforeach?>
</ul>



<form action="fill.php" method="post">
  <label for="firstname">First name:</label><br>
  <input type="text" id="firstname" name="firstname"><br>
  <label for="lastname">Last name:</label><br>
  <input type="text" id="lastname" name="lastname">
  <button type="submit">Envoi</button>
</form>