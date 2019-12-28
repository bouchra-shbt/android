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
  $updateSQL = sprintf("UPDATE rdvd SET nom_rdvd=%s, prenom_rdvd=%s, tel_rdvd=%s, email_rdvd=%s, date_rdvd=%s, heure_rdvd=%s, mdp_rdvd=%s WHERE id_rdvd like ".$var,
                       GetSQLValueString($_POST['nom_rdvd'], "text"),
                       GetSQLValueString($_POST['prenom_rdvd'], "text"),
                       GetSQLValueString($_POST['tel_rdvd'], "text"),
                       GetSQLValueString($_POST['email_rdvd'], "text"),
                       GetSQLValueString($_POST['date_rdvd'], "date"),
                       GetSQLValueString($_POST['heure_rdvd'], "text"),
                       GetSQLValueString($_POST['mdp_rdvd'], "text"),
                       GetSQLValueString($_POST['id_rdvd'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
}

mysql_select_db($database_conn, $conn);
$query_rdvd = "SELECT * FROM rdvd  where id_rdvd like ".$var;
$rdvd = mysql_query($query_rdvd, $conn) or die(mysql_error());
$row_rdvd = mysql_fetch_assoc($rdvd);
$totalRows_rdvd = mysql_num_rows($rdvd);
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>maj rdv</title>
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
				  <div class="aligncenter"><strong>Mise à jour RDV</strong></div>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  
                  <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
                    <table align="center">

                      <tr valign="baseline">
                        <td nowrap align="right">Nom:</td>
                        <td><input type="text" name="nom_rdvd" value="<?php echo htmlentities($row_rdvd['nom_rdvd'], ENT_COMPAT, ''); ?>" size="32"></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right">Prenom:</td>
                        <td><input type="text" name="prenom_rdvd" value="<?php echo htmlentities($row_rdvd['prenom_rdvd'], ENT_COMPAT, ''); ?>" size="32"></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right">Telephone:</td>
                        <td><input type="text" name="tel_rdvd" value="<?php echo htmlentities($row_rdvd['tel_rdvd'], ENT_COMPAT, ''); ?>" size="32"></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right">Email:</td>
                        <td><input type="text" name="email_rdvd" value="<?php echo htmlentities($row_rdvd['email_rdvd'], ENT_COMPAT, ''); ?>" size="32"></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right">Date de RDV:</td>
                        <td><span id="sprytextfield1">
                        <input type="text" name="date_rdvd" value="<?php echo htmlentities($row_rdvd['date_rdvd'], ENT_COMPAT, ''); ?>" size="32">
                        <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right">Heure de RDV:</td>
                      <td><span id="sprytextfield2">
                      <input type="text" name="heure_rdvd" value="<?php echo htmlentities($row_rdvd['heure_rdvd'], ENT_COMPAT, ''); ?>" size="32">
                      <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right">Mot de passe:</td>
                        <td><input type="password" name="mdp_rdvd" value="<?php echo htmlentities($row_rdvd['mdp_rdvd'], ENT_COMPAT, ''); ?>" size="32"></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right">&nbsp;</td>
                        <td><input type="submit" value="Mettre à jour l'enregistrement"></td>
                      </tr>
                    </table>
                    <input type="hidden" name="MM_update" value="form1">
                    <input type="hidden" name="id_rdvd" value="<?php echo $row_rdvd['id_rdvd']; ?>">
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
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "custom", {useCharacterMasking:true, hint:"yy", pattern:"yy"});
</script>
</body>
</html>
<?php
mysql_free_result($rdvd);
?>