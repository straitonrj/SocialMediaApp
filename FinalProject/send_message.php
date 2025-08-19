<!doctype html>
<html>
<head>
	<link rel='stylesheet' href='page_css.css'>
	<title> Student's Hangout </title>
	
		<script src='jquery.js'></script>
	<script type='text/javascript'>
		function sec() {
			var f_email=document.f1.n1.value;
			var f_message=document.f1.t1.value;
			f_message = f_message.trim();
			
			if(f_email.length==0) {
		s1.innerHTML="<font color='red'>Field is Required</font>";
			}
			else if(f_message.length==0) {
		s1.innerHTML="<font color='red'>Please add some message</font>";
			}
			
		else if(f_email.length>50||f_message.length>500) {
			if(f_email.length>50) {
			s2.innerHTML="<font color='red'>Characters should be less than 50 </font>";
			}
			
			if(f_message.length>500) {
			s3.innerHTML="<font color='red'>Characters should be less than 500 </font>";
			}
			
		}
			
			else {
				document.f1.submit();
			}
		}
		
		$(document).ready(function() 
		{
			$("#sam").hide(2000);
		});
		
	</script>
	
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
			//Session_start();
			if(IsSet($_SESSION["user_id"])) {
			
			
			?>
			<tr align='center'> 
				<td colspan='5'>
					<form method='POST' name='f1' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
						<table>
							<tr>
								<td> Friend's Email:- </td> <td> <input type='email' name='n1' maxlength='50'> </td> <td> <span id='s1'> </span> </td> <td> <span id='s2'> </span> </td>
							</tr>
							<tr>
								<td> Message:- </td> <td> <textarea rows='5' cols='22' maxlength='500' name='t1'> </textarea> </td> <td> <span id='s3'> </span> </td> <td> <span id='s4'> </span> </td>
							</tr>
							
							<tr>
								<td> <br> <input type='button' value='Send' onclick='sec()'> </td>
							</tr>
						</table>
					</form>
				</td>
			</tr>
			
			<?php
				
				if($_SERVER["REQUEST_METHOD"]=="POST") {
				$email=$text="";
				function sec($data) {
					$data=trim($data);
					$data=stripslashes($data);
					$data=htmlspecialchars($data);
					return $data;
				}
				$email=sec($_POST["n1"]);
				$text=sec($_POST["t1"]);
				$resid=MySQLi_Connect('localhost','rstrait1','rstrait1','rstrait1_db');

					if(MySQLi_Connect_Errno()) {
						echo "<tr align='center'> <td colspan='5'> Failed to connect to MySQL </td> </tr>";
					}
					else {
						$count=MySQLi_Query($resid,"select id from students where email='".$email."'");
						$count_id=MySQLi_Fetch_Assoc($count);
						if($count_id) {
						$receiver=$count_id["id"];
						$sender=$_SESSION["user_id"];
						
						$count=MySQLi_Query($resid,"select (max(id)+1) as count  from messages");
						$count_id=MySQLi_Fetch_Assoc($count);
						
						if($count_id["count"]) {
						$query="insert into messages values (".$count_id["count"].",".$sender.",".$receiver.",'$text')";
						}
						else {
						$query="insert into messages values (1,".$sender.",".$receiver.",'$text')";
						}
						
						$res=MySQLi_Query($resid,$query);
						
						if($res) {
							?>
						<script type="text/javascript" src="notify.js"></script>
						<script>
						$(document).ready(function() {
						  $.notify(
						  "Message Sent!","success");
						});
						</script>
							<?php
						}
						
						
						else {
							echo "<tr align='center'> <td colspan='5'> <font color='red'> Message Sending Failed! </font> </td> </tr>";
						}
						}
						else {
							echo "<tr align='center'> <td colspan='5'> <font color='red'> Sorry, User does not exists! </font> </td> </tr>";
						}
						MySQLi_Close($resid);
					}
			
			}
			?>
			
			<?php }
			else {
				echo "<tr align='center'> <td colspan='5'> <font color='red'> Sorry, You not Logged in! </font> Login again:- <a href='login.php'>Login</a> </td> </tr>";
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
