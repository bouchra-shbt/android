<?php
session_start();

	$_SESSION['login']=  @$_GET["pseudo"];
?>


<?php

function Redirect($Str_Location, $Bln_Replace = 1, $Int_HRC = NULL)
{
        if(!headers_sent())
        {
            header('location: ' . urldecode($Str_Location), $Bln_Replace, $Int_HRC);
            exit;
        }

    exit('<meta http-equiv="refresh" content="0; url=' . urldecode($Str_Location) . '"/>'); 
    return;
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
	<title>login patient</title>
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
				  <div class="aligncenter"><strong>LOGIN patient</strong></div>
				  <p>&nbsp;</p>
				  <form name="form1" method="get" action="login_patient.php">
                    <table width="253" height="148" border="0" align="center">
                      <tr>
                        <td colspan="2"><div align="center"><?php


  $var = @$_GET['pseudo'] ;
  $trimmed = trim($var); 


 $varr = @$_GET['password'] ;
  $trimmedd = trim($varr); 

if (($trimmedd == "") || ($trimmed == "")) 
 {
echo "Veuillez Vous Identifier !";
 }

else
{


mysql_connect("localhost","root",""); 

mysql_select_db("cabinet_medical") or die("Unable to select database"); //select which database we're using

 
$query = " select * from patient where  motpasse_patient like \"$trimmedd\"  and email_patient like \"$trimmed\"   "; 

 $numresults=mysql_query($query);
 $numrows=mysql_num_rows($numresults);

$row_query = mysql_fetch_assoc($numresults);


if ($numrows == 0)
  {

  echo "<p> Votre Authentification: &quot;" . $trimmed . "&quot; a echoue</p>";
  unset($_SESSION['login']);
   } else
   {

Redirect($Str_Location = "acc_patient.php", $Bln_Replace = 1, $Int_HRC = NULL);
   }}
       ?></div></td>
                      </tr>
                      <tr>
                        <td width="101">Email</td>
                        <td width="142"><label>
                          <input type="text" name="pseudo" id="pseudo">
                        </label></td>
                      </tr>
                      <tr>
                        <td>Password</td>
                        <td><label>
                          <input type="password" name="password" id="password">
                        </label></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><label>
                          <div align="center">
                            <input type="submit" name="Login" id="Login" value="Login">
                            </div>
                        </label></td>
                      </tr>
                    </table>
                  </form>
				  <p>&nbsp;</p>
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
	<footer>
		<div class="main">
			<div class="container_12">
				<div class="wrapper">
					<div class="grid_3">
						<div class="spacer-1">
							<div align="left"><a href="index.html"><img src="images/footer-logo.png" alt=""></a>
						    </div>
						</div>
					</div>
					<div class="grid_5">
						<div class="indent-top2">
							<p align="left" class="prev-indent-bot">&copy;SahbatouBouchra</p>
							<div align="left">Tel: 041 39 79 07 Email: <a href="#">info@cabinetmedical.com</a>
						    </div>
						</div>
					</div>
					<div class="grid_4">
						<p align="left"><a href="login_medecin.php"><img src="images/tb.jpg" alt="" width="35" height="31">admin</a></p>
					  <p align="left"><a href="login_admin.php"><img src="images/fm.jpg" alt="" width="35" height="31">administrateur personnel</a></p>
						
					  
					      <div align="left">
						      <ul class="list-services">
						        <li></li>
						        <li></li>
					        </ul>
				      </div>
				  </div>
				</div>
			</div>
		</div>
	</footer>
	<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>