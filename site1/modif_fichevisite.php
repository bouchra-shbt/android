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

mysql_select_db($database_conn, $conn);
$query_patient = "SELECT * FROM patient";
$patient = mysql_query($query_patient, $conn) or die(mysql_error());
$row_patient = mysql_fetch_assoc($patient);
$totalRows_patient = mysql_num_rows($patient);

mysql_select_db($database_conn, $conn);
$query_medecin = "SELECT * FROM medecin";
$medecin = mysql_query($query_medecin, $conn) or die(mysql_error());
$row_medecin = mysql_fetch_assoc($medecin);
$totalRows_medecin = mysql_num_rows($medecin);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
$var = $_GET["n"];

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE fiche_visite SET motif=%s, diag=%s, date_vis=%s, id_patient=%s, id_medecin=%s WHERE n_vi like ".$var,
                       GetSQLValueString($_POST['motif'], "text"),
                       GetSQLValueString($_POST['diag'], "text"),
                       GetSQLValueString($_POST['date_vis'], "date"),
                       GetSQLValueString($_POST['id_patient'], "int"),
                       GetSQLValueString($_POST['id_medecin'], "int"),
                       GetSQLValueString($_POST['n_vi'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
}

mysql_select_db($database_conn, $conn);
$query_fiche_visite = "SELECT * FROM fiche_visite where n_vi like ".$var;
$fiche_visite = mysql_query($query_fiche_visite, $conn) or die(mysql_error());
$row_fiche_visite = mysql_fetch_assoc($fiche_visite);
$totalRows_fiche_visite = mysql_num_rows($fiche_visite);
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>maj visite</title>
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
	<div align="center"></div>
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
					    <li><a href="index3.html">Personnel</a></li>
					    <li><a class="" href="index4.html">Contacts</a></li>
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
				    <div align="center"><strong>mise a jour fiche de visite</strong></div>
				  </div>
				  <p align="center">&nbsp;</p>
				  <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
                    <div align="center">
                      <table align="center">
                        <tr valign="baseline">
                          <td nowrap align="right">Motif:</td>
                          <td><input type="text" name="motif" value="<?php echo htmlentities($row_fiche_visite['motif'], ENT_COMPAT, ''); ?>" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Diagnostique:</td>
                          <td><input type="text" name="diag" value="<?php echo htmlentities($row_fiche_visite['diag'], ENT_COMPAT, ''); ?>" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Date de visite:</td>
                          <td><span id="sprytextfield1">
                          <input type="text" name="date_vis" value="<?php echo htmlentities($row_fiche_visite['date_vis'], ENT_COMPAT, ''); ?>" size="32">
                          <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Id patient:</td>
                          <td><label>
                          <input name="id_patient" type="text" id="id_patient" value="<?php echo htmlentities($row_patient['id_patient'], ENT_COMPAT, ''); ?>">
                          </label></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Id medecin:</td>
                          <td><label>
                            <select name="id_medecin" size="1" id="id_medecin">
                              <?php
do {  
?>
                              <option value="<?php echo $row_medecin['id_medecin']?>"><?php echo $row_medecin['nom_medecin']?></option>
                              <?php
} while ($row_medecin = mysql_fetch_assoc($medecin));
  $rows = mysql_num_rows($medecin);
  if($rows > 0) {
      mysql_data_seek($medecin, 0);
	  $row_medecin = mysql_fetch_assoc($medecin);
  }
?>
                          </select>
                          </label></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">&nbsp;</td>
                          <td><input type="submit" value="Mettre à jour l'enregistrement"></td>
                        </tr>
                      </table>
                      <input type="hidden" name="MM_update" value="form1">
                      <input type="hidden" name="n_vi" value="<?php echo $row_fiche_visite['n_vi']; ?>">
                      </div>
                  </form>
                  <p align="center">&nbsp;</p>
                  <p align="center">&nbsp;</p>
				  <p align="center">&nbsp;</p>
				  <p align="center">&nbsp;</p>
				  <p align="center">&nbsp;</p>
				</div>
		  </div>
		</div>
	</section>
	<div align="center">
	  <!--==============================footer=================================-->
</div>
	<footer></footer>
	<div align="center">    </div>
    <script type="text/javascript">
Cufon.now();
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "date", {format:"yyyy-mm-dd"});
</script>
</body>
</html>
<?php
mysql_free_result($patient);

mysql_free_result($medecin);

mysql_free_result($fiche_visite);
?>