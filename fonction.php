<?php
//////////////////connection to the database////////////////////// 
function connectionbd(){
    try

    {
    $pdo = new PDO('mysql:host=localhost;dbname=conciergerie;port=3306;charset=utf8', 'root', '');
    return $pdo;
    
    }
    catch(Exception $e)
    {
    die('Erreur : '.$e->getMessage());
    echo 'je ne suis pas connecte';
    }


}
//////////////////////////Add an intevention/////////////////////////// 

function addintervention(){

$add = connectionbd()->prepare('INSERT INTO intervention (type_intervention, date_intervention, etage_intervention) VALUES  ( :typeintervention, :dateintervention, :etageintervention)');
                             
                           
                             $add->bindParam(':typeintervention', $_GET['typeintervention'],
                             PDO::PARAM_STR);
                             $add->bindParam(':dateintervention', $_GET['dateintervention'],
                             PDO::PARAM_STR);
             
                             $add->bindParam(':etageintervention', $_GET['etageintervention'],
                             PDO::PARAM_INT);
   
                          
                             $estceok = $add->execute();
                             //$ajouter->debugDumpParams();
                             if($estceok){
                              echo "Vôtre intervention à bien été enregistré !";
                              
                              }else{
                              echo "Vôtre intervention n'a pas été enregistré !";
                              }
                          
                        }
              

////////////////////////Delate an intervention////////////////////////// 


 function delateintervention()
 {
    
                        if(isset($_GET['actione']) && $_GET['actione']=="delate" && $_GET['idinterventioni']){

                            $delate= connectionbd()->prepare('DELETE FROM intervention WHERE ID_intervention=:idinterventioni');
                            $delate->bindParam(':idinterventioni', $_GET['idinterventioni'],
                            PDO::PARAM_INT);
                    
                            $estceokK = $delate->execute();
                            if($estceokK){
                           echo 'votre enregistrement a été ajouté avec succés';
                    
                    
                        } else {
                          echo 'Veuillez recommencer svp, une erreur est survenue';
                           }
                    
                       } 
                    } 

//////////////////////////// update an intervention //////////////////////////////

function updateintervention(){connectionbd();
                 
 $update = connectionbd()->prepare('UPDATE intervention SET type_intervention=:typeinterv, date_intervention=:dateinter, etage_intervention=:etageinterventionnn WHERE ID_intervention=:idinterventioni');
          
 $update->bindParam(':idinterventioni', $_GET['idinterventioni'],
 PDO::PARAM_STR);
 $update->bindParam(':typeinterv', $_GET['typeinterv'],
 PDO::PARAM_STR);
 $update->bindParam(':dateinter', $_GET['dateinter'],
 PDO::PARAM_STR);

 $update->bindParam(':etageinterventionnn', $_GET['etageinterventionnn'],
 PDO::PARAM_INT);


 $estceok = $update->execute();
 //$ajouter->debugDumpParams();
 if($estceok){
  echo "Vôtre intervention à bien été enregistré !";
  
  }else{
  echo "Vôtre intervention n'a pas été enregistré !";
  } 
}

///////////////// here we show the historic of all intervention by floor in tab form/////////////////////
function historique(){
    // $bdd=$pdo = new PDO('mysql:host=localhost;dbname=conciergerie;port=3306;charset=utf8', 'root', '');
    if(isset($_GET['action']) && $_GET['action']=="historique"){
    $etage = $_GET['etage'];
    $recup= connectionbd()->prepare('SELECT * FROM intervention WHERE etage_intervention = :etage');
    $recup->bindParam(':etage', $etage);
    $recup->execute();
    
    echo '<div class="container">
    <h4 class=" text-center py-3"> Historique Etage '.$etage.'</h4>
    <table class="table">
    <thead class="bg_entete_tab">
    <tr>
    <th scope="col">etage</th>
    <th scope="col">type</th>
    <th scope="col">date</th>
    </tr>
    </thead>
    <tbody>';
    
    
    
    while($donnees = $recup->fetch())
    {
    echo '<tr class=" "><td>'.$donnees['etage_intervention'].'</td><td>'.$donnees['type_intervention'].'</td><td>'.$donnees['date_intervention'].'</td></tr>';
    }
    echo'</tbody></table></div>';
    }
    
    }

///////////////// here we show the historic of all intervention by date in tab form/////////////////////
    function historiquee(){
        // $bdd=$pdo = new PDO('mysql:host=localhost;dbname=conciergerie;port=3306;charset=utf8', 'root', '');
        if(isset($_GET['actio']) && $_GET['actio']=="historiques"){
        $date = $_GET['date'];
        $recup=connectionbd()->prepare('SELECT * FROM intervention WHERE date_intervention = :date');
        $recup->bindParam(':date', $date);
        $recup->execute();
        
        echo '<div class="container">
        <h4 class=" text-center py-3"> Historique date '.$date.'</h4>
        <table class="table">
        <thead class="bg_entete_tab">
        <tr>
        <th scope="col">etage</th>
        <th scope="col">type</th>
        <th scope="col">date</th>
        </tr>
        </thead>
        <tbody>';
        
        
        while($donnees = $recup->fetch())
        {
        echo '<tr class=" "><td>'.$donnees['etage_intervention'].'</td><td>'.$donnees['type_intervention'].'</td><td>'.$donnees['date_intervention'].'</td></tr>';
        }
        echo'</tbody></table></div>';
        }
        
        }  
    

  
   