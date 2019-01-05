<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
   $_SESSION['msg'] = "Devi prima loggarti per accedere";
   header('location: login.php');
  }
  if (isset($_GET['logout'])) {
   session_destroy();
   unset($_SESSION['username']);
   header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="it">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Multi Utility</title>
  
      <link href="css/bootstrap.css" rel="stylesheet">
     
      <link rel="stylesheet" href="css/simple-line-icons.css">
      <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
      <link rel="stylesheet" href="device-mockups/device-mockups.css">
      <link href="css/multiutility.css" rel="stylesheet">
      <link href="css/terminal.css" rel="stylesheet">
   </head>

   <body id="page-top">

      <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
         <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Multi Utility</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                     <a class="nav-link js-scroll-trigger" href="#features">E-Liquid Calculator</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link js-scroll-trigger" href="#TDEE">TDEE Calculator</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link js-scroll-trigger" href="#terminalSimulator">Terminal Simulator</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link js-scroll-trigger" href="#about">About Us</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <header class="masthead">
         
         <div class="container h-100">
            <div class="row h-100">

               <div class="col-lg-7 my-auto" id="titolo">
                  <div class="header-content mx-auto">
                     <h1 class="mb-5" id="scrollante" >Multi Utility </h1>
                     <a  class="btn btn-outline btn-xl js-scroll-trigger tastone" id =\"{$t}\" href=index.php?logout='1'" onclick=\"open_page('ajaxinfo.php','content'); javascript:change('{$t}');\">
                         <?php if (isset($_SESSION['success'])) : ?>
                              <div class="error success" >
                                 <h3>
                                  <?php 
                                    echo $_SESSION['success']; 
                                    unset($_SESSION['success']);
                                  ?>
                                 </h3>
                              </div>
                           <?php endif ?>

                            
                            <?php  if (isset($_SESSION['username'])) : ?>
                              <p class="welcomeBtn">Benvenuto <strong><?php echo $_SESSION['username'];?></strong></p>
                              
                           <?php endif ?>

                           <p  style="color: aquamarine;margin-bottom: 0;" class="cliccaQui">Cliccami Per Disconnetterti</p>
                     </a> 
                     
                  </div>
               </div>
               <div class="col-lg-5 my-auto mio" id="iphone">
                  <div class="device-container">
                     <div class="device-mockup iphoneXS">
                        <div class="device">
                        	<img class = "mani"id = "mani" src="img/mani.gif">
                           <div class="screen" id="schermo">

                              <a href="" class="typewrite" data-period="2000" data-type='[ "Ciao, siamo Luca e Valerio, due studenti di Ingegneria Informatica dell&rsquo; Università la Sapienza di Roma.", "Il progetto ha lo scopo di creare una multi-utility online che calcola il dosaggio dei liquidi per sigarette elettroniche e una stima del fabbisogno energetico giornaliero.", "Abbiamo aggiunto anche un simulatore di un terminale Unix che scrive autonomamente html in Javascript.", "We Love to Develop. Buon Utilizzo!", " " ]'>
                                <span class="wrap"></span>
                              </a>
                           </div>
                           <div class="button" id="iPhoneBtn">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>

      <section class="features" id="features" style="width: 100%; height: 100%;">
         <div class="container">
            <div class="section-heading text-center sezione1">
               <h2 class="titoloLiquido">E-Liquid Calculator</h2>
               <p class="text-muted textSmoke">Usalo per dosare correttamente i tuoi E-Juice!</p>
               <hr>
            </div>
            <div class="row">
               <div class="finestra col-lg-6 offset-md-3" >
                  <div class="row contFuhrer">
                     <div class="pallini">
                        <img src="img/pallinoRosso.png">
                        <img src="img/pallinoGiallo.png">
                        <img src="img/pallinoVerde.png">
                     </div>
                  </div>
                  <div class="container">
                     <div class="row contFuhrer">
                        <div class="control-label col" style="margin-top: 1%;">Nicotina di Partenza</div>
                        <div class="input-group col-sm-4" style="width: 50%; margin-top: 1%;">
                           <input class="rinp form-control" required="required" step="any" name="tstre" type="number" value="18" id="nicoPart">
                           <div class="input-group-addon">ml</div>
                        </div>
                     </div>
                     <div class="row contFuhrer">
                        <div class="control-label col">Nicotina da Ottenere</div>
                        <div class="input-group col-sm-4" style="width: 50%;">
                           <input class="rinp form-control" required="required" step="any" name="tstre" type="number" value="3" id="nicoOtt">
                           <div class="input-group-addon">ml</div>
                        </div>
                     </div>
                     <div class="row contFuhrer">
                        <div class="control-label col">Liquido da Ottenere</div>
                        <div class="input-group col-sm-4" style="width: 50%;">
                           <input class="rinp form-control" required="required" name="wvpga" type="number" value="15" id="ltOtt">
                           <div class="input-group-addon">ml</div>
                        </div>
                     </div>
                     <div class="row contFuhrer">
                        <div class="control-label col">Percentuale Aroma</div>
                        <div class="input-group col-sm-4" style="width: 50%;">
                           <input class="rinp form-control" required="required" name="pgg" type="number" value="10" id="p_Ar">
                           <div class="input-group-addon">%</div>
                        </div>
                     </div>
                     <div class="row contFuhrer">
                        <div class="control-label col">Percentuale Acqua</div>
                        <div class="input-group col-sm-4" style="width: 50%;">
                           <input class="rinp form-control" required="required" name="vgg" type="number" value="" id="p_H20">
                           <div class="input-group-addon">%</div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="finestra col-lg-6 offset-md-3" style="margin-top: 5%">
                  <div class="row contFuhrer">
                     <div class="pallini">
                        <img src="img/pallinoRosso.png">
                        <img src="img/pallinoGiallo.png">
                        <img src="img/pallinoVerde.png">
                     </div>
                  </div>
                  <div class="container">
                     <div class="row contFuhrer">
                        <div class="control-label col" style="margin-top: 1%">Nicotina</div>
                        <div class="input-group col" style="width: 50%; margin-top: 1%;">
                           <input class="rinp form-control" required="required" step="any" name="nicoResult" type="text" value="" id="nicoResult"readonly disabled="nicoResult">
                           <div class="input-group-addon">ml</div>&ensp;
                           <input class="rinp form-control" required="required" name="nicoResultGocce" type="text" value="" id="nicoResultGocce" readonly disabled="nicoResultGocce">
                           <div class="input-group-addon"><img class="goccia" src="img/drop.png"></div>
                        </div>
                     </div>
                           
                       
                     <div class="row contFuhrer">
                        <div class="control-label col">Neutro</div>
                        <div class="input-group col" style="width: 50%;">
                           <input class="rinp form-control" required="required" step="any" name="neutroResult" type="text" value="" id="neutroResult" readonly disabled="neutroResult">
                           <div class="input-group-addon">ml</div>&ensp;
                           <input class="rinp form-control" required="required" name="neutroResultGocce" type="text" value="" id="neutroResultGocce" readonly disabled="neutroResultGocce">
                           <div class="input-group-addon"><img class="goccia" src="img/drop.png"></div>
                        </div>
                     </div>
                     <div class="row contFuhrer">
                        <div class="control-label col">Aroma</div>
                        <div class="input-group col" style="width: 50%;">
                           <input class="rinp form-control" required="required" name="aromaResult" type="text" value="" id="aromaResult" readonly disabled="aromaResult">
                           <div class="input-group-addon">ml</div>&ensp;
                           <input class="rinp form-control" required="required" name="aromaResultGocce" type="text" value="" id="aromaResultGocce" readonly disabled="aromaResultGocce">
                           <div class="input-group-addon"><img class="goccia" src="img/drop.png"></div>
                        </div>
                     </div>
                     <div class="row contFuhrer">
                        <div class="control-label col">Acqua</div>
                        <div class="input-group col" style="width: 50%;">
                           <input class="rinp form-control" required="required" name="H20Result" type="text" value="" id="H20Result" readonly disabled="H20Result">
                           <div class="input-group-addon">ml</div>&ensp;
                           <input class="rinp form-control" required="required" name="H20ResultGocce" type="text" value="" id="H20ResultGocce" readonly disabled="H20ResultGocce">
                           <div class="input-group-addon"><img class="goccia" src="img/drop.png"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="TDEE" id="TDEE" style="width: 100%; height: 100%;">
         <div class="container">
         <div class="section-heading text-center">
            <h2 class="titoloTdee">TDEE Calculator</h2>
            <p class="valerioSotto">Usalo per calcolare il tuo dispendio calorico giornaliero!</p>
            <hr>
         </div>
         <div class="row">
            <div class="finestra col-lg-6 offset-md-3">
               <div class="row contFuhrer">
                  <div class="pallini">
                     <img src="img/pallinoRosso.png">
                     <img src="img/pallinoGiallo.png">
                     <img src="img/pallinoVerde.png">
                  </div>
               </div>
               <div class="container">
                  <div class="row contFuhrer">
                     <div class="control-label col" style="margin-top: 1%; margin-block-end: 1%;">Sesso</div>
                     <div class="input-group col-sm-4" style="width: 50%; padding: 0 !important; left: 6%; margin-top: 1%;">
                       <input type="radio" name="sesso" id="uomo" value="uomo" checked > Uomo
                       <input type="radio" name="sesso" id="donna" value="donna"> Donna
                     </div>
                  </div>
                  <div class="row contFuhrer">
                     <div class="control-label col">Eta'</div>
                     <div class="input-group col-sm-4" style="width: 50%;">
                        <input class="rinp form-control" required="required" step="any" name="eta" type="number" value="" id="eta">
                        <div class="input-group-addon">anni</div>
                     </div>
                  </div>
                  <div class="row contFuhrer">
                     <div class="control-label col">Peso</div>
                     <div class="input-group col-sm-4" style="width: 50%;">
                        <input class="rinp form-control" required="required" name="peso" type="number" value="" id="peso">
                        <div class="input-group-addon">kg</div>
                     </div>
                  </div>
                  <div class="row contFuhrer">
                     <div class="control-label col">Altezza</div>
                     <div class="input-group col-sm-4" style="width: 50%;">
                        <input class="rinp form-control" required="required" name="altezza" type="number" value="" id="altezza">
                        <div class="input-group-addon">cm</div>
                     </div>
                  </div>
                  <div class="row contFuhrer">
                     <div class="control-label col">Attivita'</div>
                     <div class="input-group col-sm-4" style="width: 50%;">
                        <select name="attivita" id="attivita" style="height:100%;width:100%;">
                           <option value="1.2" selected>Sedentario (es. ufficio)</option>
                           <option value="1.375">Esercizio leggero (1-2 volte a settimana)</option>
                           <option value="1.55">Esercizio moderato (3-5 volte a settimana)</option>
                           <option value="1.725">Esercizio frequente (6-7 volte a settimana)</option>
                           <option value="1.9">Atleta (2 volte al giorno) </option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
            <div class="finestra col-lg-6 offset-md-3" style="margin-top: 5%">
               <div class="row contFuhrer">
                  <div class="pallini">
                     <img src="img/pallinoRosso.png">
                     <img src="img/pallinoGiallo.png">
                     <img src="img/pallinoVerde.png">
                  </div>
               </div>
               <div class="container">
                  <div class="row contFuhrer">
                     <div class="control-label col" style="margin-top: 1%;">BMR</div>
                     <div class="input-group col-sm-4" style="width: 50%; margin-top: 1%;">
                        <input class="rinp form-control" required="required" step="any" name="bmr" type="text" value="" id="bmr" readonly disabled="bmr">
                        <div class="input-group-addon">kcal</div>
                     </div>
                  </div>
                  <div class="row contFuhrer">
                     <div class="control-label col">TDEE</div>
                     <div class="input-group col-sm-4" style="width: 50%;">
                        <input class="rinp form-control" required="required" step="any" name="tdee" type="text" value="" id="tdee" readonly disabled="tdee">
                        <div class="input-group-addon">kcal</div>
                     </div>
                  </div>
                  <div class="row contFuhrer">
                     <div class="control-label col">Proteine</div>
                     <div class="input-group col-sm-4" style="width: 50%;">
                        <input class="rinp form-control" required="required" name="pro" type="text" value="" id="pro" readonly disabled="pro">
                        <div class="input-group-addon">g</div>
                     </div>
                  </div>
                  <div class="row contFuhrer">
                     <div class="control-label col">Grassi</div>
                     <div class="input-group col-sm-4" style="width: 50%;">
                        <input class="rinp form-control" required="required" name="fat" type="text" value="" id="fat" readonly disabled="fat">
                        <div class="input-group-addon">g</div>
                     </div>
                  </div>
                  <div class="row contFuhrer">
                     <div class="control-label col">Carboidrati</div>
                     <div class="input-group col-sm-4" style="width: 50%;">
                        <input class="rinp form-control" required="required" name="cho" type="text" value="" id="cho" readonly disabled="cho">
                        <div class="input-group-addon">g</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="terminalSimulator" id="terminalSimulator" style="width: 100%; height: 100%;">
         <div class="section-heading text-center">
            <h2 class="titoloTerminale">Terminal Simulator</h2>
            <p class="terminaleSotto">Simulatore del terminale online</p>
         </div>
         <div class="termCont">
            <div class="term col">
               <div class="terminaleVero" id="data">
                  <h1 class="titoloTermOnTerm">Terminal Emulator</h1>
                  <p class="descrTerm">Type help for more informations</p>
                  <div id="input_div" class="leet_text" style="font-size:15px; color: #FF0000">$ <input class="input_cmd" id="cmd_box" type="text"></div>
                  <script src="js/jquery.js"></script>
                  <script src="js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script><!-- Per il meteo -->
                  <script type="text/javascript" charset="utf-8" src="js/terminale.js"></script>
               </div>
            </div>
         </div>
    </section>
	<section class="about" id="about" style="min-width: 100%; min-height: 100%">
	   <div class="section-heading text-center">
	      <h2 class="titoloAboutUs">About Us</h2>
	      <p class="aboutUsSotto">Qualche informazione su di noi</p>
	   </div>
	   <div class="container aboutus" style="max-width: 100%">
	      <div class="row">
	         <div class="col-lg fotoLuca" style="height: 50%; text-align: center; ">
	            <a href="https://twitter.com/lucatomei1995" target="_blank">
	            <img class="foto" id="fotoLuca" src="img/fotoLuca.jpg" style="width: 45%; border-radius: 10%; border: 2px solid white;">
	            </a>
	         </div>
	         <div class="col-lg fotoValerio" style="text-align: center;" >
	            <a href="https://www.instagram.com/valeriomontagliani/" target="_blank">
	            <img class="foto" id ="fotoValerio" src="img/fotoValerio.jpg" href ="www.google.it" style="width: 60%; margin-top: 3%; border-radius: 10%; border: 2px solid white;">
	            </a>
	         </div>
	      </div>
	      <div class="row">
	         <div class="col">
	            <p class="descrsotto" style=" margin-left: 7%;">
Ci siamo conosciuti durante le lezioni di Ingegneria Informatica nel 2016. Siamo appassionati di tecnologia fin dall'infanzia e siamo sempre a caccia dell' ultimo gadget e dell'ultima trovata tecnologica.<br>
Il nostro <strong>obiettivo</strong> e' di creare una Multi Utility semplice ed utilizzabile da chiunque che risolve dei piccoli problemi di tutti i giorni.<br>
I nostri <strong> valori </strong> fondamentali: pazienza, attenzione al dettaglio e lavoro di squadra. Facciamo del nostro meglio per creare un servizio con la massima qualita'.
</p>
	         </div>
	      </div>
	   </div>
	   </div>
	</section>
    <footer>
         <div class="container">
            <p>&copy; Multi Utility 2018. All Rights Reserved.</p>
         </div>
    </footer>
      
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrapjs/bootstrap.bundle.min.js"></script>
      
      <script src="js/jquery.easing.min.js"></script>
      
      <script src="js/multiutility.min.js"></script>
      <script src="js/nuovo.js"></script>
      <script src="js/jquery.js"></script>
   </body>
</html>
