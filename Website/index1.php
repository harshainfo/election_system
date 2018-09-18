<?php
	session_start()
?>
<html>
<head>
<meta charset="utf-8">
<title>Iowa State Online Voting System | Home</title>
<style type="text/css">

</style>
<link href="css/css_main.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="960" height="100"><table width="960" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="660" height="100" class="header">Iowa State Online Voting System</td>
          <td class="login">
		      <form action="loginresult.php" method="POST">
				UserID: <input type="text" name="userid"><br>
				Password: <input type="password" name="psd"><br>
                  <input type="login"><a href="ForgetPassword.php"><button type="button">Forget Password</button></a>
		      </form></td>
      </tr>
        <tr>
    </table></td>
  </tr>
  <tr>
    <td width="960" height="100" bgcolor="white"><img src="Pictures/vote.jpg" width="960" height="600" alt=""/></td>
  </tr>
  <tr>
    <td width="960" height="40" class="footer">The University of Iowa College of Engineering | Fundamentals of Software Engineering Group 8 | © Copyright 2018 </td>
  </tr>
</table>
</body>
</html>
