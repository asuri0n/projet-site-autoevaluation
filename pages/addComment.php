<?php
if(isset($_POST['idExercice']) and !empty($_POST['idExercice']) and isset($_POST['comment']) and !empty($_POST['comment']) and isset($_SESSION['Auth']['isStudent'])){
    $timestamp = date('Y-m-d G:i:s');
    $stmt = newSQLQuery("INSERT INTO commentaires (id_etudiant, id_exercice, commentaire, timestamp) VALUES (?, ?, ?, ?)", "insert", null, null, array($_SESSION['Auth']['user'], $_POST['idExercice'], htmlspecialchars($_POST['comment']), $timestamp));
    if(!$stmt)
        $_SESSION['error'] = "Le commentaire n'a pas été ajouté";
    else
        $_SESSION['success'] = "Commentaire ajouté !";
} else {
    $_SESSION['error'] = "Le commentaire est vide ou vous n'êtes pas un étudiant connecté";
}