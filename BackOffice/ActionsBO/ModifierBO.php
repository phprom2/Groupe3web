<?php

switch ($_REQUEST['table']) {
    case 0: //Entreprises

        include "../../sqlconnect.php";

        $id= $_REQUEST['id'];

        $sql= $connection->prepare("SELECT * FROM entreprise WHERE id=$id") ; 
        $sql->execute();
        $ligne = $sql->fetchall();

        
        foreach($ligne as $entreprise){
            echo"<h3>Entreprise ".$entreprise['nom']."</h3>";
            ?>
            <form method="GET" action="modifier.php"=>
                <input type="text" name="table" value= "<?php echo$_REQUEST['table'];?>" hidden>
                <div>
                    <label>nom</label>
                    <input type="text" name="nom" value="<?php echo $entreprise['nom'];?>">
                </div>
                <div>
                    <label>adresse</label>
                    <input type="text" name="adresse" value="<?php echo $entreprise['adresse'];?>">
                </div>


                <button type="submit">Modifier</button>
                <button type="reset">Annuler</button>
            </form>
            <a href="EntrepriseBO.php"><button>Retour</button></a>
            <?php

            
        }


        
        break;
    case 1: //Employers
        echo "i égal 1";
        break;
        case 2: //Catégories

            include "../../sqlconnect.php";

            $id= $_REQUEST['id'];

            $sql= $connection->prepare("SELECT * FROM categorie WHERE id=$id") ; 
            $sql->execute();
            $ligne = $sql->fetchall();

            
            foreach($ligne as $categorie){
                echo"<h3>Catégorie ".$categorie['nom']."</h3>";
            ?>
            
            <form method="GET" action="ajouter.php">
                <input type="text" name="table" value= "<?php echo$_REQUEST['table'];?>" hidden>
                <div>
                    <label>Nom</label>
                    <input type="text" name="nom" value="<?php echo $categorie['nom'];?>">
                </div>
    
    
                <button type="submit">Modifier</button>
                <button type="reset">Annuler</button>
            </form>
            <a href="../BackOfficeChoose.php"><button>Retour</button></a>
            <?php
            }


            break;
        case 3: //Echauffements

            include "../../sqlconnect.php";

            $id= $_REQUEST['id'];

            $sql= $connection->prepare("SELECT * FROM echauffement WHERE id=$id") ; 
            $sql->execute();
            $ligne = $sql->fetchall();

            $saCategorie;
            
            foreach($ligne as $echauffement){
                echo"<h3>Echauffement: ".$echauffement['nom']."</h3>";
                $saCategorie=$echauffement['id_Categorie'];
                ?>

            
                <form method="GET" action="ajouter.php">
                    <input type="text" name="table" value= "<?php echo$_REQUEST['table'];?>" hidden>
                    <div> 
                        <label>Nom</label>
                        <input type="text" name="nom" value="<?php echo $echauffement['nom'];?>">
                    </div>
                <div>
                    <label>Catégorie</label>
                    <select>
                    <?php
            }
            $sql= $connection->prepare("SELECT * FROM categorie") ; 
            $sql->execute();
            $ligne = $sql->fetchall();



            foreach($ligne as $categorie){ 
                if($categorie["id"] == $saCategorie){
                    echo "<option name=\"categorieEchauff\" value=".$categorie['id']." selected=\"selected\">".$categorie['nom']."</option>";
                }else{
                    echo "<option name=\"categorieEchauff\" value=".$categorie['id'].">".$categorie['nom']."</option>";
                }
            }
            ?>
                    </select>
                </div>
            <button type="submit">Modifier</button>
            <button type="reset">Annuler</button>
            </form>
            <a href="../BackOfficeChoose.php"><button>Retour</button></a>
            <?php

            
            break;
            
        default:
            echo "erreur";
            break;
    }



?>