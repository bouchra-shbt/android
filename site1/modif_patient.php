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
$var = $_GET["id"];
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE patient SET nom_patient=%s, prenom_patient=%s, date_naiss_patient=%s, lieu_naiss_patient=%s, sexe_patient=%s, adresse_patient=%s, cp_patient=%s, tel_pat=%s, n_sc_patient=%s, sf_patient=%s, nass=%s, email_patient=%s, motpasse_patient=%s WHERE id_patient like " .$var,
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
                       GetSQLValueString($_POST['nass'], "int"),
                       GetSQLValueString($_POST['email_patient'], "text"),
                       GetSQLValueString($_POST['motpasse_patient'], "text"),
                       GetSQLValueString($_POST['id_patient'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
}

mysql_select_db($database_conn, $conn);
$query_patient = "SELECT * FROM patient where id_patient like " .$var;
$patient = mysql_query($query_patient, $conn) or die(mysql_error());
$row_patient = mysql_fetch_assoc($patient);
$totalRows_patient = mysql_num_rows($patient);


?><!DOCTYPE html>
<html lang="en">
<head>
	<title>maj patient</title>
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
	<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>  
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
    <link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
</head>
<body id="page5">
	<!--==============================header=================================-->
<header>
		<div class="border-bot">
			<div class="main">
				<h1><a href="index.html">InternetCafe</a></h1>
				<nav>
					<ul class="menu">
						<li><a href="index.html">Acceuil</a></li>
						<li><a href="index1.html">Cabinet</a></li>
						<li><a href="index2.html">Services</a></li>
						<li><a href="index3.html">Personnel</a></li>
						<li><a class="" href="index4.html">Contacts</a></li>
					</ul>
				</nav>
				<div class="clear"></div>
			</div>
		</div>
	</header>
	<!--==============================content================================-->
	<section id="content"><div class="ic">More Website Templates @ TemplateMonster.com - Mrach 03, 2012!</div>
		<div class="main">
			<div class="container_12">
				<div class="wrapper">
				  <div class="aligncenter"><strong>Mise à jour patient</strong></div>
				  <p>&nbsp;</p>
				  
                  <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
                    <table align="center">

                      <tr valign="baseline">
                        <td nowrap align="right">Nom patient:</td>
                        <td><input type="text" name="nom_patient" value="<?php echo htmlentities($row_patient['nom_patient'], ENT_COMPAT, ''); ?>" size="32"></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right">Prenom patient:</td>
                        <td><input type="text" name="prenom_patient" value="<?php echo htmlentities($row_patient['prenom_patient'], ENT_COMPAT, ''); ?>" size="32"></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right">Date de naissance:</td>
                        <td><span id="sprytextfield1">
                        <input type="text" name="date_naiss_patient" value="<?php echo htmlentities($row_patient['date_naiss_patient'], ENT_COMPAT, ''); ?>" size="32">
                        <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right">Lieu de naissance:</td>
                        <td><input type="text" name="lieu_naiss_patient" value="<?php echo htmlentities($row_patient['lieu_naiss_patient'], ENT_COMPAT, ''); ?>" size="32"></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right">Sexe:</td>
                        <td><input type="text" name="sexe_patient" value="<?php echo htmlentities($row_patient['sexe_patient'], ENT_COMPAT, ''); ?>" size="32"></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right">Adresse:</td>
                        <td><input type="text" name="adresse_patient" value="<?php echo htmlentities($row_patient['adresse_patient'], ENT_COMPAT, ''); ?>" size="32"></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right">Code postal:</td>
                        <td><input type="text" name="cp_patient" value="<?php echo htmlentities($row_patient['cp_patient'], ENT_COMPAT, ''); ?>" size="32"></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right">Telephone:</td>
                        <td><input type="text" name="tel_pat" value="<?php echo htmlentities($row_patient['tel_pat'], ENT_COMPAT, ''); ?>" size="32"></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right">Num securite national:</td>
                        <td><input type="text" name="n_sc_patient" value="<?php echo htmlentities($row_patient['n_sc_patient'], ENT_COMPAT, ''); ?>" size="32"></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right">Situation familial:</td>
                        <td><input type="text" name="sf_patient" value="<?php echo htmlentities($row_patient['sf_patient'], ENT_COMPAT, ''); ?>" size="32"></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right">Num d'assures:</td>
                      <td><span id="spryselect1">
                          <label></label>
                        <span class="selectRequiredMsg">Sélectionnez un élément.</span></span>
                        <label>
                        <input name="nass" type="text" id="nass" value="<?php echo htmlentities($row_patient['nass'], ENT_COMPAT, ''); ?>">
                        </label></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right">Email:</td>
                        <td><input type="text" name="email_patient" value="<?php echo htmlentities($row_patient['email_patient'], ENT_COMPAT, ''); ?>" size="32"></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right">Mot de passe:</td>
                        <td><input type="password" name="motpasse_patient" value="<?php echo htmlentities($row_patient['motpasse_patient'], ENT_COMPAT, ''); ?>" size="32"></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right">&nbsp;</td>
                        <td><input type="submit" value="Mettre à jour l'enregistrement"></td>
                      </tr>
                    </table>
                    <input type="hidden" name="MM_update" value="form1">
                    <input type="hidden" name="id_patient" value="<?php echo $row_patient['id_patient']; ?>">
                  </form>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				</div>
		  </div>
		</div>
	</section>
	<!--==============================footer=================================-->
	<footer></footer>
	<script type="text/javascript">
Cufon.now();
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "date", {format:"yyyy-mm-dd", useCharacterMasking:true});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
</script>
</body>
</html>
<?php
mysql_free_result($patient);

?>