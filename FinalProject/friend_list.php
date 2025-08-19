<!doctype html>
<html>
<head>
	<link rel='stylesheet' href='page_css.css'>
	<title> Student's Hangout </title>
</head>
<body>
<style>
a.one:link{color: #231F20; font-size: 19px;}
a.one:visited{color: #231F20; font-size: 19px;}
a.one:hover{text-decoration:underline; background-color: #FFC425;}

a.two:link{color: #231F20; font-size: 16px;}
a.two:visited{color: #231F20; font-size: 16px;}
a.two:hover{text-decoration:underline; background-color: #FFC425;}

a.Logo:link{font-family: 'Brush Script MT', cursive; color: #FFC425; font-size: 80px; background-color: #231F20;}
a.Logo:visited{font-family: 'Brush Script MT', cursive; color: #FFC425; font-size: 80px; background-color: #231F20;}
a.Logo:hover{font-family: 'Brush Script MT', cursive; color: #FFC425; font-size: 80px; background-color: #231F20;}

</style>
		<table cellpadding='16' cellspacing='6' class='tab_main'>
			<!--Logo-->
			<tr align='Center'>
				<!-- <td  colspan='5'><img src='images/logo.png' height='65%' width='100%' ></td> <!--1350x160-->
				<td style= 'background-color:#231F20;' colspan='30'><b><a class='Logo' href='home.php'>Socioexplore</a></b></td>
			</tr>
			<!--Nav_Tabs-->
			<tr align='center' bgcolor= #FFC425 class='td_bor'>
				<td width='5%'> <?php Session_start(); if(IsSet($_SESSION["user_id"])) {echo "<a class = 'one' href='user_page.php'>"; } else {echo "<a  class ='one' href='home.php'>";}?>Home </a></td>
				<td width='5%'> <a class = 'one' href='send_message.php'>Send Message </a></td>
				<td width='5%'> <a class = 'one' href='inbox.php'>Inbox (Only Recent Message) </a></td>
				<td width='5%'> <a class = 'one' href='view_profile.php'>View Profile </a></td>
				<td width='5%'> <a class = 'one' href='signout.php'>Signout </a></td>

			</tr>

<?php

	$user_id = $_SESSION["user_id"];
	include 'mysql.php';
	if($resid) {
	
	
	$count = MySQLi_Query($resid,"select frnd_two_id from are_friends where frnd_one_id = $user_id union select frnd_one_id from are_friends where frnd_two_id = $user_id");
	
	echo "<tr align='center'> <td colspan='5'>Your Friends:- </td> </tr> <tr align='center'> <td colspan='5'><table align='center' >";
	
	echo " <table align='center' cellspacing='5' cellpadding='5'> 
				<tr> <th> Name: </th> <th> Email: </th> <th> Gender: </th> </tr>";
				
	while(($rows=MySQLi_Fetch_Row($count))==True) {

	$query = "select name,email,gender from students where id = $rows[0] ";
	$result = MySQLi_Query($resid,$query);

	if($result) {

				while(($rows=MySQLi_Fetch_Row($result))==True) {



				echo "<tr align='center'>";
				echo "<td> $rows[0] </td> <td> $rows[1] </td> <td> $rows[2] </td>";
				echo "</tr>";
				}
				
		}
	}
	
	echo "</table> ";
}
	
	
?>
		</table>
			<br>
			<br>
			<br>
			<footer align='center'>
			<?php if(isset($_SESSION["user_id"])) {echo $_SESSION["name"]; } ?>
<br><a class= 'two' href="https://www.github.com/abhn/simple-php-mysql-project">Check out the original project!</a><br>
			<br>MIT License
			<br>Copyright (c) 2019 Abhishek Nagekar
			</footer>
</body>
</html>		
