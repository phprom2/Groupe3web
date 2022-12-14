<?php

try{
    require "sqlconnect.php";
    $sql= $connection->prepare("INSERT INTO employer (nom,prenom,poste,mail,MDP, id_Entreprise) VALUES 
    (:nom, :prenom, :poste, :mail, :MDP, :id_Entreprise)") ;

    $sql->bindParam(':nom',$_REQUEST["nom"],PDO::PARAM_STR);
    $sql->bindParam(':prenom',$_REQUEST["prenom"],PDO::PARAM_STR);
    $sql->bindParam(':poste', $_REQUEST["poste"], PDO::PARAM_STR);
    $sql->bindParam(':mail', $_REQUEST["mail"], PDO::PARAM_STR);
    $sql->bindParam(':MDP', SHA1($_REQUEST['password']), PDO::PARAM_STR);
    $sql->bindParam(':id_Entreprise', $_REQUEST['entreprise'], PDO::PARAM_INT);
  
    $sql->execute();

    echo "Vos informations ont bien été ajoutées à notre base de données ! Vous êtes maintenant inscris !";

    header("location: trainning.php");

}catch (PDOException $e){
    echo "Erreur: ".$e->getMessage();
    echo"<a href =\"accueil.php\">Retour à l'accueil</a>";
}

?>