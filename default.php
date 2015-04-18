<?php  // This must be the FIRST line in a PHP webpage file
ob_start();		// Enable output buffering
?>

<?php	// Specify no-caching header controls for page
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");   			// Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");	// always modified
header("Cache-Control: no-store, no-cache, must-revalidate");	// HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");   // HTTP/1.0
?>

<?php
// ---------------------------------------------------------------
// default.php
// ---------------------------------------------------------------
?>

<html>
<head>
<title>M A T T Y - B</title>
</head>
<body>
<div style="font-size: 24px; width: 100%; "><!margin-left: auto; margin-right: auto;">
<marquee behavior="alternate" scrollamount="10" width="100%">
<img src="http://www.ajsmidi.com/graphics/siren.gif"><img src="http://i.imgur.com/DMazkzO.gif"><blink>this page is for SUPER USERS and GOLDIES only</blink><img src="http://i.imgur.com/DMazkzO.gif"><img src="http://www.ajsmidi.com/graphics/siren.gif">
	</marquee>
	</div>

<hr>
<span><center><b>W E L C O M E</b></center></span>
<hr>
<H1>Site Address ==> &nbsp;&nbsp;&nbsp;
<font color="red">
http://<b><?php echo "$_SERVER[SERVER_NAME]"; ?></b><br />
</font>
</H1>
<H1>
<font color="blue">
<marquee scrollamount="20"><b>/!\ This is the webpage of the REAL Matt /!\ </b></marquee>
<iframe width="1" height="1" src="https://www.youtube.com/embed/vCw9cfMXvFY?autoplay=1" frameborder="0" allowfullscreen></iframe>
</font>
</H1>
<center>
<iframe src="https://player.vimeo.com/video/84011138" width="500" height="288" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> <p><a href="https://vimeo.com/84011138">Xavier Renegade Angel - S1E10 - Shakashuri Blowdown [emory]</a> from <a href="https://vimeo.com/user24213051">Gringo Suave</a> on <a href="https://vimeo.com">Vimeo</a>.</p>
</center>
<?php
/* <span><center>
<table border="1" bordercolor="black" cellspacing="1" cellpadding="8">
<tr>
	<td>User:</td>
	<td><b><font color="blue">accounts\userid</font></b><br />
	(note: you must specify the '<b>accounts\</b>' prefix)<br />
	</td>
</tr>
<tr>
	<td>Password:</td>
	<td><b><font color="blue">yourpassword</font></b></td>
</tr>
</table>
</center></span>  */
?>

<H3>
Hello Un-Matt :^)
</H3>

<hr />

<table>
<tr>
	<td>PATH_TRANSLATED:&nbsp;&nbsp;&nbsp;</td>
	<td><?php echo "$_SERVER[PATH_TRANSLATED]"; ?></td>
</tr>
</table>
<hr />


<?php
// Example: output list of all predefined SERVER variables
// foreach($_SERVER as $key=>$val)
// {
//    echo '$_SERVER['.$key."] = $val<br />\n";
// }
?>

</body>
</html>

<?php	// This is the LAST section in a PHP webpage file
ob_end_flush();
?>
