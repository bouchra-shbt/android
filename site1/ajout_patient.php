<?php require_once('../Connections/conn.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO patient (id_patient, nom_patient, prenom_patient, date_naiss_patient, lieu_naiss_patient, sexe_patient, adresse_patient, cp_patient, tel_pat, n_sc_patient, sf_patient, nass ,email_patient ,motpasse_patient ) VALUES (NULL, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       
                       GetSQLValueString($_POST['nom_patient'], "text"),
                       GetSQLValueString($_POST['prenom_patient'], "text"),
                       GetSQLValueString($_POST['date_naiss_patient'], "date"),
                       GetSQLValueString($_POST['lieu_naiss_patient'], "text"),
                       GetSQLValueString($_POST['sexe_patient'], "text"),
                       GetSQLValueString($_POST['adresse_patient'], "text"),
                       GetSQLValueString($_POST['cp_patient'], "text"),
                       GetSQLValueString($_POST['tel_pat'], "text"),
                       GetSQLValueString($_POST['n_sc_patient'], "text"),
                       GetSQLValueString($_POST['sf_patient'], "text"),
                       GetSQLValueString($_POST['nass'], "text"),
					    GetSQLValueString($_POST['email_patient'], "text"),
                       GetSQLValueString($_POST['motpasse_patient'], "text"));
					     
  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());

  $insertGoTo = "assure.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_conn, $conn);
$query_assure = "SELECT * FROM assure";
$assure = mysql_query($query_assure, $conn) or die(mysql_error());
$row_assure = mysql_fetch_assoc($assure);
$totalRows_assure = mysql_num_rows($assure);
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>ajout patient</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">  
	<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="js/cufon-yui.js" type="text/javascript"></script>
	<script src="js/cufon-replace.js" type="text/javascript"></script>
	<script src="js/Vegur_500.font.js" type="text/javascript"></script>
	<script src="js/Ropa_Sans_400.font.js" type="text/javascript"></script> 
	<script src="js/FF-cash.js" type="text/javascript"></script>	
	<script src="js/script.js" type="text/javascript"></script>
	<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>  
	<!--[if lt IE 8]>
	<div style=' clear: both; text-align:center; position: relative;'>
		<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
			<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
		</a>
	</div>
	<![endif]-->
	<!--[if lt IE 9]>
 		<script type="text/javascript" src="js/html5.js"></script>
		<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
	<![endif]-->
    <link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
</head>
<body id="page5">
	
<div align="center">
  <!--==============================header=================================-->
      </div>
    <header>
		<div class="border-bot">
			<div class="main">
				<h1 align="center"><a href="index.html">InternetCafe</a></h1>
				<nav>
					
				  <div align="center">
					    <ul class="menu">
					       <li><a href="index.html">Acceuil</a></li>
						<li><a href="index1.html">Cabinet</a></li>
						<li><a href="index2.html">Services</a></li>
						<li>
						  <div align="center"><a  href="ajout_rdvd.php">RDV</a></div>
						</li>
					  <li><a  href="index4.php">Contacts</a></li>
                        <li><a  class="active" href="ajout_patient.php">Inscription</a></li>
                        <li><a href="login.html">Login</a></li>
			        </ul>
			      </div>
				</nav>
				<div class="clear"></div>
			</div>
		</div>
	</header>
	
<div align="center">
  <!--==============================content================================-->
      </div>
    <section id="content"><div class="ic">
	    <div align="center">More Website Templates @ TemplateMonster.com - Mrach 03, 2012!</div>
	  </div>
		<div class="main">
			<div class="container_12">
				<div class="wrapper">
				  <div class="aligncenter">
				    <div align="center"><strong>Inscription</strong></div>
				  </div>
				  <form method="post" name="form1" action="<?php echo $editFormAction; ?>"> 
                    <div align="center"><figure class="p2"></figure>
            <img src="images/ins.jpg" alt="" width="310" height="165" align="left">
                    <div align="center">
                      <table align="center">
                        <tr valign="baseline">
                          <td nowrap align="right">Nom  :</td>
                          <td><input type="text" name="nom_patient" value="" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Prenom  :</td>
                          <td><input type="text" name="prenom_patient" value="" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Date de naissance  :</td>
                          <td><span id="sprytextfield1">
                          <input type="text" name="date_naiss_patient" value="" size="32">
                          <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Lieu de naissance  :</td>
                          <td><input type="text" name="lieu_naiss_patient" value="" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Sexe  :</td>
                          <td><input type="text" name="sexe_patient" value="" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Adresse  :</td>
                          <td><input type="text" name="adresse_patient" value="" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Code postal :</td>
                          <td><input type="text" name="cp_patient" value="" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Numero de telephone  :</td>
                          <td><input type="text" name="tel_pat" value="" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Numero securite social  :</td>
                          <td><input type="text" name="n_sc_patient" value="" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Situation familiale  :</td>
                          <td><input type="text" name="sf_patient" value="" size="32"></td>
                        </tr>
                          
                        <tr valign="baseline">
                          <td nowrap align="right">Email :</td>
                          <td><input type="text" name="email_patient" value="" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Mot de passe :</td>
                          <td><input type="password" name="motpasse_patient" value="" size="32"></td>
                        </tr>
                          
                          
                          
                          
                          
                        <tr valign="baseline">
                          <td nowrap align="right">Numero d'assurance  :</td>
                          <td><label>
                          <input type="text" name="nass" id="nass">
                          </label></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">&nbsp;</td>
                          <td><input type="submit" value="Insérer l'enregistrement"></td>
                        </tr>
                          </table>
                      <input type="hidden" name="MM_insert" value="form1">
                      </div>
                  </form>
                  </div>
		  </div>
		</div>
	</section>
	
<div align="center">
  <!--==============================footer=================================-->
      </div>
   <footer>
		<div class="main">
			<div class="container_12">
				<div class="wrapper">
					<div class="grid_3">
						<div class="spacer-1">
							<a href="index.html"><img src="images/footer-logo.png" alt=""></a>
						</div>
					</div>
					<div class="grid_5">
						<div class="indent-top2">
							<p class="prev-indent-bot">&copy;SahbatouBouchra </p>
							Tel: 041 39 79 07 Email: <a href="#">info@cabinetmedical.com</a>
						</div>
					</div>
					<div class="grid_4">
						<ul class="list-services">
							<li><a class="item-1" href="#"></a></li>
							<li><a class="item-2" href="#"></a></li>
							<li><a class="item-3" href="#"></a></li>
							<li><a class="item-4" href="#"></a></li>
						</ul>
						</div>
				</div>
			</div>
		</div>
	</footer>
<div align="center">        </div>
<script type="text/javascript">
Cufon.now();
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "date", {format:"yyyy-mm-dd", useCharacterMasking:true});
        </script>
</body>
</html>
<?php
mysql_free_result($assure);
?>