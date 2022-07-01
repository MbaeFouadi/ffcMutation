<?php
session_start();
include '../connexion/connexion.php';
if(isset($_SESSION['id_categories']) AND $_SESSION['id_categories'] == 4 ){
if(isset($_GET['id'])){
$ngazidja=$bdd->prepare("SELECT * FROM pv_mutation,club where pv_mutation.id_club=club.id_club AND  pv_mutation.id_etat=?");
$ngazidja->execute([$_GET['id']]);

$ligue=$bdd->prepare("SELECT * FROM etat WHERE id_etat=?");
$ligue->execute([$_GET['id']]);
$li=$ligue->fetch();
// $ndz=$bdd->query("SELECT * FROM email,club where email.id_club=club.id_club and email.id_etat='2'");
// $mwali=$bdd->query("SELECT * FROM email,club where email.id_club=club.id_club and email.id_etat='3'");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap6.min.css">
    <title>Mutations</title>
</head>

<body class="w-100 h-100" style="position: fixed;">
    <!-- entete et aside -->
    <div class="header bg-info position-fixed justify-content-between">
        <!-- MENU DESKTOP -->
        <div class="dropdown btn-r" style="float: right;height: 100%; width: 60%;">
            <div class="w-100">


                <!-- MENU DARCK -->
                <button class="btn bg-dark  text-light " type="button" style="height:60px;float: right;" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-grid-3x3-gap-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2zM1 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V7zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V7zM1 12a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-2z"/>
                      </svg>
                </button>
                <div class="dropdown-menu shadow" style="
                 z-index: 1000;
                  width: 400px;
                  border-radius: 10px;
                  margin: 10px;
                  " aria-labelledby="dropdownMenuButton">
                    <br>
                    <div class="mx-auto" style="height: 100px;
                    width: 100px;
                    background:url(../img/FFC-icon.png);
                    background-size: cover;
                    ">
                    </div>
                    <br>
                    <center>
                        <h6 class="text-success">
                            <strong class="text-info" style="font-size: 20px;">Commission </strong> <br> <?= $_SESSION['Email']?>
                        </h6>
                        <a name="" id="" class="btn btn-light border rounded-pill " href="#" role="button">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-grid-1x2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M6 1H1v14h5V1zm9 0h-5v5h5V1zm0 9h-5v5h5v-5zM0 1a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm9 0a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1V1zm1 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1h-5z"/>
                          </svg> Gérer votre Compte
                        </a>
                    </center>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-center " href="deconnexion.php">
                        <svg width="1.5em" height="1.5em" class="text-danger" viewBox="0 0 16 16" class="bi bi-power" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.578 4.437a5 5 0 1 0 4.922.044l.5-.866a6 6 0 1 1-5.908-.053l.486.875z"/>
                            <path fill-rule="evenodd" d="M7.5 8V1h1v7h-1z"/>
                          </svg>
                        <h6>Deconnexion</h6>

                    </a>
                </div>
                <!-- MENU DARCK -->

            </div>


        </div>
        <!-- MENU DESKTOP -->
        <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
        <label for="openSidebarMenu" class="sidebarIconToggle" style="height: 60px;width: 60px; margin-top: -1.6em;padding:14px;padding-top: 20px;left: 0;">
             <div class="spinner diagonal part-1">
            </div>
             <div class="spinner horizontal"></div>
              <div class="spinner diagonal part-2"></div>
        </label>

        <div id="sidebarMenu" class="bg-success " style="">
            <ul class="sidebarMenuInner">
                <li class="text-center  py-3" style="border-bottom:#94d19a 1px solid ;">
                    <img src="../img/FFC-icon.png" class="w-25">
                </li>
                <li class=" " style="border-bottom:#94d19a 1px solid ;">
                    <a class="text-info btn btn-light shadow w-100 text-left rounded-pill">
                        <i class="text-danger"><svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg> </i><strong>Nouvelle Mutation</strong>
                    </a>
                </li>
                <li style="border-bottom:#94d19a 1px solid ;">
                    <a class=" btn   w-100 text-left">
                        <svg width="2em" height="2em" version="1.1" id="Layer_1" x="0px" y="0px" fill="currentColor" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve">
             <g>
                 <path d="M509.532,34.999c-2.292-2.233-5.678-2.924-8.658-1.764L5.213,225.734c-2.946,1.144-4.967,3.883-5.192,7.034
                     c-0.225,3.151,1.386,6.149,4.138,7.7l102.719,57.875l35.651,174.259c0.222,1.232,0.723,2.379,1.442,3.364
                     c0.072,0.099,0.131,0.175,0.191,0.251c1.256,1.571,3.037,2.668,5.113,3c0.265,0.042,0.531,0.072,0.795,0.088
                     c0.171,0.011,0.341,0.016,0.511,0.016c1.559,0,3.036-0.445,4.295-1.228c0.426-0.264,0.831-0.569,1.207-0.915
                     c0.117-0.108,0.219-0.205,0.318-0.306l77.323-77.52c3.186-3.195,3.18-8.369-0.015-11.555c-3.198-3.188-8.368-3.18-11.555,0.015
                     l-60.739,60.894l13.124-112.394l185.495,101.814c1.868,1.02,3.944,1.239,5.846,0.78c0.209-0.051,0.4-0.105,0.589-0.166
                     c1.878-0.609,3.526-1.877,4.574-3.697c0.053-0.094,0.1-0.179,0.146-0.264c0.212-0.404,0.382-0.8,0.517-1.202L511.521,43.608
                     C512.6,40.596,511.824,37.23,509.532,34.999z M27.232,234.712L432.364,77.371l-318.521,206.14L27.232,234.712z M162.72,316.936
                     c-0.764,0.613-1.429,1.374-1.949,2.267c-0.068,0.117-0.132,0.235-0.194,0.354c-0.496,0.959-0.784,1.972-0.879,2.986L148.365,419.6
                     l-25.107-122.718l275.105-178.042L162.72,316.936z M359.507,419.195l-177.284-97.307L485.928,66.574L359.507,419.195z"/>
             </g>
         </svg> Mutations envoyées
                    </a>
                </li>
                <li style="border-bottom:#94d19a 1px solid ;">
                    <a class=" btn  w-100 text-left">
                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                  <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                  <circle cx="8" cy="4.5" r="1"/>
                </svg> Prérequis
                    </a>
                </li>

            </ul>
        </div>

    </div>
    <!-- entete et aside -->

    
    <div class="tab w-100 h-100 tab-active" id="tabNga">
    <div class="content">
            <div class="act">
                <button type="button" class="btn btn-info rounded" id="button"
                                onClick="imprimer('sectionAimprimer')">
                <span class="text">Imprimer</span>
                                <span class="icon text">
                                    <i class="fa fa-print" aria-hidden="true"></i>
                                </span>
                </button>
                <a href="index.php" class="btn btn-warning rounded">Quitter</a>
            </div>

            <div id='sectionAimprimer'><br><br>
            <div class="container bg-white">

                <h1 class="text-center"><?=$li['nom']?></h1>
                    <!-- <button class="col  btn active" id="nga" data-tab="tabNga">LIGUE DE NGAZIDJA</button>
                    <button class="col  btn" id="ndz" data-tab="tabNdz">LIGUE DE NDZOUWANI</button>
                    <button class="col btn" id="mwl" data-tab="tabMwl">LIGUE DE MWALI</button> -->
                </div>
            <div class="w-100 list">
                <br>
                <br>
                <br>
                <table class="table w-100 py-5">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">N° MUT</th>
                            <th scope="col">NOUVEAU CLUB</th>
                            <th scope="col">CLUB D'ORIGINE</th>
                            <th scope="col">N° LIC</th>
                            <th scope="col">NOM</th>
                            <th scope="col">PRENOM</th>
                            <th scope="col">OBSERVATION</th>
                            <th scope="col">DECISION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($dataN=$ngazidja->fetch()){
                             $club=$bdd->prepare("SELECT * FROM club WHERE id_club=?");
                             $club->execute([$dataN['id_club']]);
                             $clubs=$club->fetch();
                             $joueur=$bdd->prepare("SELECT * FROM joueurs WHERE id_joueur=?");
                             $joueur->execute([$dataN['id_joueur']]);
                             $joueurs=$joueur->fetch();
                             $mut=$bdd->prepare("SELECT * FROM mutation WHERE idMutation=?");
                             $mut->execute([$dataN['idMutation']]);
                             $mutation=$mut->fetch();
                             $ClubO=$bdd->prepare("SELECT * FROM users WHERE idusersadmin=?");
                             $ClubO->execute([$dataN['idusersadmin']]);
                             $Club=$ClubO->fetch();

                             
                             ?>
                        <tr>
                            <th scope="row"><?=$mutation['NumMutation']?></th>
                            <td><?=$Club['Club']?></td>
                            <td><?=$dataN['Club']?></td>
                            <td><?=$joueurs['FIFA_ID']?></td>
                            <td><?=$joueurs['Nom']?></td>
                            <td><?=$joueurs['Prenom']?></td>
                            <td>
                                <?=$dataN['observation']?>
                            </td>
                           
                            <td>    
                            <?=$dataN['reponse']?>
                            </td>
                            
                            
                        </tr>
                  <?php }?>
                 
                    </tbody>
                </table>
            </div>
        </div>


    </div>
   
    </div>
    

    </div>
    </div>
            </div>




    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/jquery.backstretch.min.js"></script>
    <!-- <script>
    $(".corp").backstretch("../img/drptr.jpg", {
         speed: 500
         });
</script> -->
    <script src="../js/controller.js"></script>
    <script src="js/main.js"></script>
<script>
    $(document).ready(function () {
 

    $('#ob').focus(function(e) {
       $("#ob").keyup(function() {
            var ob = $(this).val();
            $.ajax({
                
                type: "POST",
                url: "ajax.php",
                data: {
                    ob: ob

                },

                dataType: "text",
                success: function(html) {
                    $('').html(html);
                }
            });
        });

         
        });

        $('#re').click(function(e) {
            $("#re").click(function() {
            var re = $(this).val();
           
            $.ajax({
                
                type: "POST",
                url: "ajax.php",
                data: {
                    re: re

                },

                dataType: "text",
                success: function(html) {
                    $('').html(html);
                }
            });
        });

         
        });

        $('#obn').focus(function(e) {
       $("#obn").keyup(function() {
            var obn = $(this).val();
            $.ajax({
                
                type: "POST",
                url: "ajax.php",
                data: {
                    obn: obn

                },

                dataType: "text",
                success: function(html) {
                    $('').html(html);
                }
            });
        });

         
        });

        $('#ren').click(function(e) {
            $("#ren").click(function() {
            var ren = $(this).val();
           
            $.ajax({
                
                type: "POST",
                url: "ajax.php",
                data: {
                    ren: ren

                },

                dataType: "text",
                success: function(html) {
                    $('').html(html);
                }
            });
        });

         
        });

        $('#obm').focus(function(e) {
       $("#obm").keyup(function() {
            var obm= $(this).val();
            $.ajax({
                
                type: "POST",
                url: "ajax.php",
                data: {
                    obm: obm

                },

                dataType: "text",
                success: function(html) {
                    $('').html(html);
                }
            });
        });

         
        });

        $('#rem').click(function(e) {
            $("#rem").click(function() {
            var rem = $(this).val();
           
            $.ajax({
                
                type: "POST",
                url: "ajax.php",
                data: {
                    rem: rem

                },

                dataType: "text",
                success: function(html) {
                    $('').html(html);
                }
            });
        });

         
        });


   
});

       

     

         

           
        
  </script>

<script>
    function imprimer(divName) {
        var restorepage = document.body.innerHTML;
        var printContent = document.getElementById(divName).innerHTML;

        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = restorepage;
    }
    </script>
     <?php } else{

header("location:index.php");
} ?>
</body>

</html>