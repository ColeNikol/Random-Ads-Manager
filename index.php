<?php
session_start();

// Redirect to admin panel if already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: admin.php");
    exit();
}

// Display login form
?>


<!-- 


Random Ads Manager 1.1


Display and manage image ads in different ad formats. Ads are randomly generated

Someone eventually spent time to make this. So if you like, share it or put a link to it.

This tool is provided as it is! The creator, his representatives, site owners where this tool resides as well as any subsidiaries and colaborators or any other party 
will NOT be held responsible for any damage caused by use or misuse of these tools and potential data loss.

Random Ads Manager is created by Stojan Nikolovski (aka ColeN, aka ColeNikol or simply just "C") - member of the NonCon Team 


-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Ads Manager Login</title>
	<meta name="title" content="Random Ads Manager Login" />
    <meta name="description" content="Login to a Simple but powerful solution for site monetization" />

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="icon" type="image/x-icon" href="favicon.png">
</head>
<body>
<div class="w3-container w3-center w3-display-middle">
    <h2>Admin Login</h2>
    <form class="w3-container w3-card w3-padding" method="POST" action="validate.php">
        <label>Username</label>
        <input class="w3-input w3-border" type="text" name="username" required>

        <label>Password</label>
        <input class="w3-input w3-border" type="password" name="password" required>

        <?php
        // Display an error message if redirected back with an error
        if (isset($_GET['error']) && $_GET['error'] === '1') {
            echo "<p class='w3-text-red'>Invalid username or password!</p>";
        }
        ?>

        <button class="w3-button w3-green w3-margin-top w3-round-large" type="submit">Login</button>
    </form>
	
</div>
<h2 class="w3-display-bottomleft w3-padding"><img src="logo.png" width="5%" ALT="Random ads manager Logo"> Random ads manager Ver.1.1</h2>
      <p class="w3-display-bottomright w3-padding">Made by <a class="w3-bold w3-text-red" href="https://bit.ly/colenikol">ColeN</a> for the <a class="w3-bold w3-text-red" href="https://nonconfirmed.com/">NonConTeam</a></p>
</body>
</html>
