<?php
    if(!isset($_SESSION['Auth']['isAdmin'])){
        $_SESSION['error'] = "Vous n'avez pas acces a cette page!";
        session_write_close();
        header('location: '.WEBROOT.'accueil');
    }

    if(isset($_POST['addExercice']))
        include './pages/addExercice.php';

    if(isset($_POST['modifyExercice']))
        include './pages/modifyExercice.php';

    if(isset($_POST['seeScores']))
        include './pages/seeScores.php';

    if(isset($_POST['deleteOldScores']))
        include './pages/deleteOldScores.php';


    $exercicesListe = newSQLQuery( "SELECT id_exercice, enonce FROM exercice", "select", "fetchAll", 'FETCH_BOTH');
    $exeValues = "";
    foreach ($exercicesListe as $exercice)
        $exeValues .= "<option value='$exercice[0]'>$exercice[0] - $exercice[1]</option>";

    echo $titre
?>


<form method="POST" action="" class="form-signin">
    <label> Ajouter un exercice de
        <input type="number" name="inputNbQuestions" value="0" min="0" max="10">
    </label> questions<br>
    <button name="addExercice" class="btn btn-lg btn-primary btn-block" type="submit">Ajouter</button>
</form>
<hr>
<form method="POST" action="" class="form-signin">
    <div class="form-group">
        <label> Modifier l'exercice suivant : </label>
        <select class="form-control" name="inputIdExercice">
            <?= $exeValues ?>
        </select>
    </div>
    <button name="modifyExercice" class="btn btn-lg btn-primary btn-block" type="submit">Modifier</button>
</form>
<hr>
<form method="POST" action="" class="form-signin">
    <button name="seeScores" class="btn btn-lg btn-primary btn-block" type="submit">Voir les scores</button>
</form>
<hr>
<form method="POST" action="" class="form-signin">
    <button name="deleteOldScores" class="btn btn-lg btn-primary btn-block" type="submit">Supprimer scores des anciens étudiants</button>
</form>