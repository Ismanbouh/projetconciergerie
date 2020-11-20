<?php
include "fonction.php" ;?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>conciergeriemenard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2? family = Pacifico & display = swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jaldi&display=swap" rel="stylesheet">
</head>

<body>
    <section>

        <div class="col-12 text-center">
            <h3>Administration Conciergerie Menard</h3>
        </div>
        <!-- Connection to the database and unclude fonction.php -->
        <?php
            connectionbd();
            
            
              if(isset($_GET['action'])  && !empty($_GET['typeintervention']) && !empty($_GET['dateintervention']) && !empty($_GET['etageintervention'])){
                 addintervention();
   
              }

              if(isset($_GET['action']) && $_GET['action']=="delate"  && !empty($_GET['idintervention'])){
                 delateintervention(); 
                 } 

              if(isset($_GET['act'])&& $_GET['act']=="update"  && !empty($_GET['typeinterv']) && !empty($_GET['dateinter']) && !empty($_GET ['etageinterventionnn'])){
                 updateintervention();
                }
        ?>
    </section>
    <br>
    <section>
        <!-- form with get method to add an intervention to the database -->
        <h6>Ajouter une intervention</h6>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <form method='GET'>
                        <input class="form-control" type="text" placeholder="type" name="typeintervention">
                        <input class="form-control" type="date" placeholder="date" name="dateintervention">
                        <input class="form-control" type="text" placeholder="etage" name="etageintervention">
                        <button class="btn btn-danger" type="submit" value="ajouter" name="action">Ajouter</button>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <br><br>
    <section>
        <!-- form with get method to delete an intervention from the database -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h6>Supprimer une intervention</h6>
                        <form method='GET'>
                            <input class="form-control" type="text" placeholder="ID" name="idinterventionn">
                            <button class="btn btn-danger" type="submit" value="delate"
                                name="actione">supprimer</button>
                        </form>
                        <?php
                           delateintervention();
                        ?>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h6>Historique des interventions</h2>
                        <form method='GET'>
                            <input type="text" placeholder="ID" name="idintervention">
                            <input type="text" placeholder="type" name="typeintervention">
                            <input type="text" placeholder="date" name="dateintervention">
                            <input type="text" placeholder="etage" name="etageintervention">
                        </form>

                        <?php 
                            $recuperation = connectionbd() -> query ( 'SELECT * FROM intervention');
                            while ( $intervention = $recuperation -> fetch ()) {
                            echo  "<form> <div> <input type = 'text' name = 'idinterventioni' value = '" . $intervention ['ID_intervention']. "'>
                           <input type = 'text' name='typeinterv' value = '" . $intervention ['type_intervention']. "'>
                           <input type = 'text' name='dateinter' value = '" . $intervention ['date_intervention']. "'>
                           <input type = 'text' name='etageinterventionnn' value = '" . $intervention ['etage_intervention']. "'>
                           
                           <button type = 'submit' value = 'update' name = 'act'> Modifier </button>
                           <button type = 'submit' value = 'delate' name = 'actione'> Supprimer </button>
                           
                           </form>
                          
                           </div> " ; 
                        }
                        ?>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                 <!-- form with get method for the historic of all interventions per floor -->
                    <h6>Historique des interventions par etage</h2>
                        <form method="GET">
                            <input class="form-control" type="number" name="etage"
                                placeholder="choisir un etage"><button class="btn btn-danger" type="submit"
                                name="action" value="historique">Entrer</button>
                            <?php historique(); ?>
                        </form>
                </div>
            </div>
        </div>

        <br><br>
    </section>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <!-- form with get method for the historic of all interventions per date -->
                    <h6>Historique des interventions par date</h2>
                        <form method="GET">
                            <input class="form-control" type="date" name="date" placeholder="choisir un date"><button
                                class="btn btn-danger" type="submit" name="actio" value="historiques">Entrer</button>
                            <?php historiquee(); ?>
                        </form>
                </div>
            </div>
        </div>
    </section>

    
</body>