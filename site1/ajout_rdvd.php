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


$var = trim ($_POST['date_rdvd']);
$var2 = trim ($_POST['heure_rdvd']); 
mysql_select_db($database_conn, $conn);
$query_rdvd = "SELECT count(*) as total  FROM rdvd    where date_rdvd like \"$var\" and heure_rdvd like \"$var2\"  " ;
$rdvd = mysql_query($query_rdvd, $conn) or die(mysql_error());
$row_rdvd = mysql_fetch_assoc($rdvd);
$totalRows_rdvd = mysql_num_rows($rdvd);

echo $row_rdvd['total'];
if ($row_rdvd['total'] <= 5) 

{

  $insertSQL = sprintf("INSERT INTO rdvd (id_rdvd, nom_rdvd, prenom_rdvd, tel_rdvd, email_rdvd, date_rdvd, heure_rdvd) VALUES (NULL, %s, %s, %s, %s, %s, %s)",
                       
                       GetSQLValueString($_POST['nom_rdvd'], "text"),
                       GetSQLValueString($_POST['prenom_rdvd'], "text"),
                       GetSQLValueString($_POST['tel_rdvd'], "text"),
                       GetSQLValueString($_POST['email_rdvd'], "text"),
                       GetSQLValueString($_POST['date_rdvd'], "date"),
                       GetSQLValueString($_POST['heure_rdvd'], "text"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
} else 
{ ?>

   <script type="text/javascript">
     alert("choisisser une autre heure"); 
 </script> 
 <?php
}

}
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>ajouter RDVd</title>
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
	
<div align="left">
  <!--==============================header=================================-->
      </div>
    <header>
		<div class="border-bot">
			<div class="main">
				<h1 align="left"><a href="index.html">InternetCafe</a></h1>
				<nav>
					
				  <div align="left">
					    <ul class="menu">
					      <li><a href="index.html">Acceuil</a></li>
					      <li><a href="index1.html">Cabinet</a></li>
					      <li><a href="index2.html">Services</a></li>
					      <li>
					        <a class="active" href="ajout_rdvd.php">RDV</a></li>
					      <li><a  href="index4.php">Contacts</a></li>
					      <li><a href="ajout_patient.php">Inscription</a></li>
					      <li><a href="login.html">Login</a></li>
			        </ul>
			      </div>
				</nav>
				<div class="clear"></div>
			</div>
		</div>
	</header>
	
<div align="left">
  <!--==============================content================================-->
      </div>
    <section id="content"><div class="ic">
	    <div align="left">More Website Templates @ TemplateMonster.com - Mrach 03, 2012!</div>
	  </div>
		<div class="main">
			<div class="container_12">
				<div class="wrapper">
				  <div class="aligncenter">
				    <div align="center"><strong>Demande de RDV</strong></div>
				  </div>
				  <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
                                  
          <div align="center"><figure class="p2"></figure>
            <img src="images/rv.png" alt="" width="261" height="164" align="left">
            <table align="center">
                        
                        <tr valign="baseline">
                          <td nowrap align="right">Nom :</td>
                    <td><input type="text" name="nom_rdvd" value="" size="32"></td>
                  </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Prenom:</td>
                    <td><input type="text" name="prenom_rdvd" value="" size="32"></td>
                  </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Telephone:</td>
                    <td><input type="text" name="tel_rdvd" value="" size="32"></td>
                  </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Email:</td>
                    <td><span id="sprytextfield3">
                    <input type="text" name="email_rdvd" value="" size="32">
                    <span class="textfieldRequiredMsg">Une valeur est requise.</span></span></td>
                  </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Date RDV:</td>
                    <td><span id="sprytextfield1">
                    <input type="text" name="date_rdvd" value="" size="32">
                    <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
                  </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Heure RDV:</td>
                    <td><span id="sprytextfield2">
                    <input type="text" name="heure_rdvd" value="" size="32">
                    <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
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
		        <p>&nbsp;</p>
		        <p>&nbsp;</p>
		  </div>
		</div>
	</section>
	
<div align="left">
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
<div align="left">        </div>
<script type="text/javascript">
Cufon.now();
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "date", {format:"yyyy-mm-dd", useCharacterMasking:true});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "custom", {hint:"yy", useCharacterMasking:true, pattern:"yy"});

        </script>
</body>
</html>
