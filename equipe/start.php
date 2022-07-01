<?php
session_start();
//connexion à la base de données 
include '../connexion/connexion.php';
if(isset($_SESSION['fonction']) AND $_SESSION['fonction'] == 2 ){

//Requette pour afficher les differentes  ligue 
$ligue=$bdd->query("SELECT * FROM etat");
$mutat=$bdd->prepare('SELECT * FROM mutation WHERE idusersadmin=?');
$mutat->execute([$_SESSION['idusersadmin']]);
include 'mail.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap6.min.css">
    
    <title>Mutations</title>
    <script src="../js/jquery-3.4.1.min.js"></script>

    <script type="text/javaScript">
                $(document).ready(function(){
                    $('#ligue').on('change',function(){
                        var id_etat=$(this).val();
                        if(id_etat){
                            $.ajax({
                                type:'POST',
                                url:'ajax.php',
                                data:'id_etat='+id_etat,
                                success:function(html){
                                    $('#club').html(html);
                                    
                                }
                            });
                        }
                        else{
                                $('#club').html('<option value="">D\'abord le club</option>');
                                
                        }
                    });

                    $('#club').on('change',function(){
                        var Club= $(this).val();
                        if(club){
                            $.ajax({
                                type:'POST',
                                url:'ajax.php',
                                data:'Club='+Club,
                                success:function(html){
                                   
                                   
                                }
                            });
                        }
                       
                    });

                    // $('#joueur').on('change',function(){
                    //     var id_joueur= $(this).val();
                    //     if(id_joueur){
                    //         $.ajax({
                    //             type:'POST',
                    //             url:'ajax.php',
                    //             data:'id_joueur='+id_joueur,
                    //             success:function(html){
                                   
                    //             }
                    //         });
                    //     }
                       
                    // });

                    
                    
            
                    });

                    $(document).ready(function(){
                    $('#club').on('change',function(){
                        var club=$(this).val();
                        if(club){
                            $.ajax({
                                type:'POST',
                                url:'ajax.php',
                                data:'club='+club,
                                
                                success:function(html){
                                  
                                    $('#joueur').html(html);
                                }
                            });
                        }
                        else{
                                $('#joueur').html('<option value="">D\'abord le club</option>');
                                
                        }
                    });

                    $('#joueur').on('change',function(){
                        var id_joueur= $(this).val();
                        if(id_joueur){
                            $.ajax({
                                type:'POST',
                                url:'ajax.php',
                                data:'id_joueur='+id_joueur,
                                success:function(html){
                                
                                   
                                }
                            });
                        }
                       
                    });
                });    

                    
                  


                    // $('#joueur').on('change',function(){
                    //     var id_joueur= $(this).val();
                    //     if(id_joueur){
                    //         $.ajax({
                    //             type:'POST',
                    //             url:'ajax.php',
                    //             data:'id_joueur='+id_joueur,
                    //             success:function(html){
                                   
                    //             }
                    //         });
                    //     }
                       
                    // });

                    
                    
            
                  

                    

               
            </script>
    <style type="text/css">
<!--
.Style1 {color: #000000}
.Style3 {color: #000000; font-weight: bold; }
.Style4 {
	color: #0000FF;
	font-weight: bold;
}
.Style5 {color: #FF0000}
.Style6 {
	color: #FF0000;
	font-weight: bold;
}
.Style7 {color: #0000FF}
.Style9 {color: #FF0000; font-family: Arial, Helvetica, sans-serif; }
-->
    </style>
</head>
<body class="w-100 h-100" style="position: fixed;">
<!-- entete et aside -->
    <div class="header bg-info position-fixed justify-content-between" style="">
        <!-- MENU DESKTOP -->
        <div class="dropdown btn-r" style="float: right;height: 100%; width: 60%;">
            <div class="w-100">
                

                <!-- MENU DARCK -->
                   <?php include 'include/dark.php' ?>
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
                <img src="../img/FFC-icon.png" class="w-50">
            </li>
          <li class=" "style="border-bottom:#94d19a 1px solid ;">
              <a class="text-info btn btn-light shadow w-100 text-left rounded-pill"> 
                  <i class="text-danger"><svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg> </i><strong>Nouvelle Mutation</strong> 
              </a>
          </li>
          <li style="border-bottom:#94d19a 1px solid ;">
              <a class=" btn   w-100 text-left"> 
                  <svg width="2em" height="2em" version="1.1" id="Layer_1"  x="0px" y="0px" fill="currentColor"
                  viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve">
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
             </svg> 
             Mutations envoyées
              </a>
          </li>
          <li style="border-bottom:#94d19a 1px solid ;">
              <a class=" btn  w-100 text-left"> 
                  <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                      <circle cx="8" cy="4.5" r="1"/>
              </svg> 
                    Prérequis
              </a>
          </li>
          
        </ul>
       </div>
      <!-- entete et aside -->
      
    </div>
 <div class="row rw" style="padding: 10px; padding-top: 3.8rem;">
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 border bg-light" style="height:auto;">
        <div class="w-100 border-bottom py-1" >
            <center><h1 class="text-success">Activité</h1></center>
   </div>
        <div class="w-100 border-bottom" style="padding: 10px;" >
        <span class="Style4">INFORMATIONS DU JOUEURS </span> <br><br>
        <form method="POST" action="" enctype="multipart/form-data"   >
    <div class="form-group">
                <label for="exampleSelect"><span class="Style3"><span class="Style5">1.</span> Ligue d'origine </span></label>
                <select class="form-control" id="ligue">
                    <option>Selectionner la ligue</option>
                    <?php while($lig=$ligue->fetch()){?>
                    <option value="<?=$lig['id_etat']?>" ><?=$lig['nom']?></option>
                    <?php
                    }
                    ?>
                </select>
      </div>
         </div>
         <div class="w-100 border-bottom" style="padding: 10px;">
             <div class="form-group">
                 <span class="Style1">
                 <label for="exampleSelect"><strong><span class="Style5">2.</span> Club</strong></label>
                 <strong>                 d'origine                 </strong></span>
                 <select class="form-control" id="club">
                     <option disabled selected>Club</option>
                 </select>
             </div>
         </div>
        
         <div class="w-100 border-bottom" style="padding: 10px;">
            <div class="form-group">
                <label for="exampleSelect"><span class="Style1"><span class="Style6">3.</span> <strong>Nom et Prénom du joueur</strong></span></label>
                <select class="form-control" id="joueur">
                    <option disabled selected>Joueur</option>
                </select>
            </div>
        </div>
         <div class="w-100 border-bottom" style="padding: 10px;">
            <div class="form-group">
                <label for="exampleSelect"><span class="Style6">4.</span> <span class="Style3">Numero de Mutation</span></label>
                <select class="form-control" id="mutation" name="mutation" required>
                    <option>Selectionner le numero du Mutation</option>
                    <?php while($mutation=$mutat->fetch()){
                        $emails=$bdd->prepare("SELECT * FROM email where idMutation=?");
                        $emails->execute([$mutation['idMutation']]);
                        ?>
                        <?php if($emails->rowCount()==0){?>
                    <option value="<?=$mutation['idMutation']?>" ><?=$mutation['NumMutation']?></option>
                    <?php }?>
                    <?php
                    }
                    ?>
                </select>
            </div>
         </div>
         <div class="w-100 border-bottom" style="padding: 10px;">
         <small class="form-text text-info Style7" id="helpId"><span class="Style9">PIECES JOINTES </span><br>
         <br>
         </small>
           <div class="form-group">
           <label for=""><span class="Style1"><strong><span class="Style5">1.</span> Demission</strong></span></label>
               <input type="file" name="file" id="" class="form form-control" required>
             <!-- <div class="d-flex">
             <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
             <a name="" id="" class="btn btn-success" style="height: 45px;" href="#" role="button">ae</a>
           </div> -->
        </div>
         </div>
         <div class="w-100 border-bottom" style="padding: 10px;">
         <label for=""><span class="Style1"><strong><span class="Style5">2.</span> Pièce d'Identité</strong></span></label>
           <div class="form-group">
               <input type="file" name="file1" id="" class="form form-control" required>
             
             <!-- <div class="d-flex">
                <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                <a name="" id="" class="btn btn-success" style="height: 45px;" href="#" role="button">sf</a>
             </div> -->
           </div>
         </div>
    </div>
    <div class="corp col-xs-12 col-sm-12 col-md-8 col-lg-8" style="padding: 20px;overflow: scroll;position: relative; z-index: 2;">
       
        <div class="card  shadow" style="width: 100%;">
            <div class="card-body">
               <center>
                   <h3 class="text-success fed" >Federation De FootBall Des Comores</h3>
                   <h6  id="li"><strong>Ligue De Football De</strong>........</h6>
               </center>
               <div class=""style="float:right;display:block">
               <p style="text-align: right;" id="mut" >N°:.... <br>
                date:..................                </p>
               
               <p id="equi"><center><br> 
                   <br>
                   
                   </center>         </p>
               </div>
               <br>
               <br> <br>
               <br>
               <br> <br>
               <br>
               <br>
               <p id="jou">
                   <strong>Objet: Demisson du Joueur.........</strong><br><br>
                   Mr/Mme .... Né(e) le.....à....... De Nationalité........Residant à ............. Désire démissionner du Club ..........
                   Souhaitant faire partie du club......               </p>
            </div>
        </div>
        <div class="py-4">
            <!-- <a name="" id="" class="btn btn-danger" href="#" role="button">Annuler</a>
            <a name="" id="" class="btn btn-success" href="#" role="button">Envoyer</a> -->
            <input type="reset" name="" id="" class="btn btn-danger" value="Annuler">
            <input type="submit" name="submit" id="" class="btn btn-success" value="envoyer"><br><br>
            <?php if(isset($success)){?>
                <div class="alert alert-success" role="alert">
                    <?php echo $success; ?>                </div>
                <?php 
                } elseif(isset($error)) { ?>
                    <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>                </div>
                <?php } ?>
        </div>
    </div>
    </form>
 </div>


<script src="../js/popper.js"></script>
<script src="../js/bootstrap.js"></script>
<script type="text/javascript" src="../js/jquery.backstretch.min.js"></script>
  
<script src="../js/controller.js"></script>
<script>
$(document).ready(function() {
        $("#ligue").change(function() {
            var li = $(this).val();

            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    li: li

                },

                dataType: "text",
                success: function(html) {
                    
                    $('#li').html(html);
                }
            });
        });
        $("#club").change(function() {
            var clu = $(this).val();

            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    clu: clu

                },

                dataType: "text",
                success: function(html) {
                    
                    $('#equi').html(html);
                }
            });
        });

        $("#joueur").change(function() {
            var jou = $(this).val();

            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    jou: jou

                },

                dataType: "text",
                success: function(html) {
                    
                    $('#jou').html(html);
                }
            });
        });

        $("#mutation").change(function() {
            var mu = $(this).val();

            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    mu: mu

                },

                dataType: "text",
                success: function(html) {
                    
                    $('#mut').html(html);
                }
            });
        });
    });
</script>
<?php } else{

header("location:../index.php");
} ?>
</body>
</html>