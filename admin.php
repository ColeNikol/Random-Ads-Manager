<?php
session_start();

// Ensure user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit();
}

$adsFile = 'ads.json';
$ads = [];

// Load existing ads
if (file_exists($adsFile)) {
    $ads = json_decode(file_get_contents($adsFile), true) ?? [];
}

// Handle form submission for new ads
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_ad'])) {
    $newAd = [
        'targetUrl' => $_POST['targetUrl'],
        'imageUrl' => $_POST['imageUrl'],
        'description' => $_POST['description'],
        'days' => intval($_POST['days']),
        'dateAdded' => date('Y-m-d'),
    ];
    $ads[] = $newAd;
    file_put_contents($adsFile, json_encode($ads));
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Handle ad deletion
if (isset($_GET['delete'])) {
    $index = $_GET['delete'];
    if (isset($ads[$index])) {
        unset($ads[$index]);
        $ads = array_values($ads); // Re-index array
        file_put_contents($adsFile, json_encode($ads));
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
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
    <title>Random Ads Manager</title>
	<meta name="title" content="Random Ads Manager" />
    <meta name="description" content="Simple but powerful solution for site monetization while easily manage ad campaigns and randomly display responsive SEO friendly image ads anywhere you want on your website" />

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="icon" type="image/x-icon" href="favicon.png">
<script>
        // Function to open the modal
        function openModal(modalId) {
            document.getElementById(modalId).style.display = "block";
        }

        // Function to close the modal
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }
    </script>
</head>
<body>
<div class="w3-container w3-padding">
    <h1><img src="logo.png" width="50px" ALT="Random ads manager Logo"> Random Ads Manager ver 1.1</h1>
    <form class="w3-container w3-card-4 w3-padding" method="POST">
        <label>Target URL</label>
        <input class="w3-input w3-border" type="url" name="targetUrl" required>

        <label>Image URL</label>
        <input class="w3-input w3-border" type="url" name="imageUrl" required>

        <label>Description</label>
        <textarea class="w3-input w3-border" name="description" required></textarea>

        <label>Display Duration (Days)</label>
        <input class="w3-input w3-border" type="number" name="days" min="1" required>

        <button class="w3-button w3-green w3-margin-top" type="submit" name="add_ad">Add New Ad</button>
    </form>

    <h2>Active Ads</h2>
    <table class="w3-table w3-bordered w3-margin-top">
        <tr>
            <th>Target URL</th>
            <th>Image URL</th>
            <th>Description</th>
            <th>Date Added</th>
            <th>Days Left</th>
            <th>Actions</th>
        </tr>
        <?php
        foreach ($ads as $index => $ad) {
            $daysLeft = max(0, (strtotime($ad['dateAdded']) + $ad['days'] * 86400 - time()) / 86400);
            echo "<tr>
                  <td><a href='{$ad['targetUrl']}' target='_blank' rel='nofollow'>{$ad['targetUrl']}</a></td>
                  <td><img src='{$ad['imageUrl']}' alt='Ad Image' style='width:100px;'></td>
                  <td>{$ad['description']}</td>
                  <td>{$ad['dateAdded']}</td>
                  <td>" . floor($daysLeft) . "</td>
                  <td><a class='w3-button w3-red' href='?delete=$index'>Delete</a></td>
                </tr>";
        }
        ?>
    </table>
	<br>
<div class="w3-container">
<h2>Ad formats</h2>
<p>Currently 4 ad formats are provided with this script:<strong>4 image ads in a row, 2 in a row, single responsive image & a pop-up in the low right corner</strong></p>
<p>Can use or edit existing ad formats or add new to fit your needs</p>
<p>To insert the selected ad format, choose from the buttons and follow the instructions</p>
<h2>Get the Ad Codes:</h2>
<div class="w3-bar w3-margin-top">
  <button class="w3-button w3-xxlarge w3-blue" style="width:24.5%" onclick="openModal('modal4')">&#9724;&#9724;&#9724;&#9724; 4</button>
  <button class="w3-button w3-xxlarge w3-blue" style="width:24.5%" onclick="openModal('modal2')">&#9724;&#9724; 2</button>
  <button class="w3-button w3-xxlarge w3-blue" style="width:24.5%" onclick="openModal('modal1')">&#9724; 1</button>
  <button class="w3-button w3-xxlarge w3-blue" style="width:24.5%" onclick="openModal('modalpop')">&#9714; Pop-up</button>
</div>
</div>


<!-- Instructions goes here -->

    <!-- Modal pop -->
    <div id="modalpop" class="w3-modal">
        <div class="w3-modal-content w3-animate-zoom">
           <span class="w3-button w3-display-topright w3-red" onclick="closeModal('modalpop')">&times;</span>
			<header class="w3-container w3-blue">
 

    <h2>&#9714; Pop-up ad</h2>
		<p>Pop up - random image ad pops up for 15 seconds and closes repeating the cycle every 3 minutes</p>
		</header>           
		<div class="w3-container">

 

<div class="w3-panel w3-card w3-light-grey"> 
  <h4>Copy and Paste this code right before the closing &lt;/body> tag</h4>
  
 
  <div class="w3-code htmlHigh notranslate">
  &lt;!-- Place this code where you want your ads to appear --><br> 
    &lt;div id="popupAd">&lt;/div><br> 
<br> 
    &lt;!-- Include the ads script --><br> 
    &lt;script src="/ads/popupAd.js">&lt;/script><br> 
  </div>
  <b id class="w3-text-red">Make sure you're using correct paths or use absolute URLs instead. Default url is /ads/ </b>
</div>

<ol>
<li>Use the HTML editor to add the code right before closing &lt;/body> tag of the page you want to appear</li>
<li>Check and edit popupAd.js if necessary to fix the paths</li>
<li>May need to edit and change time intervals</li>
</ol>
 <h3>WordPress Integration</h3>
<ol>
<li>Paste the provided code in your wordpress theme - Theme footer right before closing &lt;/body> tag</li>
</ol>
            </div>
        </div>
    </div>
	

    <!-- Modal 1 -->
	 <div id="modal1" class="w3-modal">
        <div class="w3-modal-content w3-animate-zoom">
            <span class="w3-button w3-display-topright w3-red" onclick="closeModal('modal1')">&times;</span>
			<header class="w3-container w3-blue">
 

    <h2>&#9724; </h2>
		<p>Single image responsive ad - works well in content and in the sidebar</p>
		</header>           
		<div class="w3-container">

 

<div class="w3-panel w3-card w3-light-grey"> 
  <h4>Copy and Paste this code where you want your ads to appear</h4>
  
 
  <div class="w3-code htmlHigh notranslate">
  &lt;!-- Place this code where you want your ads to appear --><br> 
    &lt;div id="single-responsive-ad">&lt;/div><br> 
<br> 
    &lt;!-- Include the ads script --><br> 
    &lt;script src="/ads/single-responsive-ad.js">&lt;/script><br> 
  </div>
  <b id class="w3-text-red">Make sure you're using correct paths or use absolute URLs instead. Default url is /ads/ </b>
</div>

<ol>
<li>Use the HTML editor to add the &lt;div> and &lt;script> code in a post or page</li>
<li>Check and edit single-responsive-ad.js if necessary to fix the paths</li>
<li>May need to edit and change width & height CSS properties if using in a sidebar</li>
</ol>
 <h3>WordPress Integration</h3>
<ol>
<li>Install the <a href="https://wordpress.org/plugins/ad-inserter/" target="_blank">Ad inserter plugin</a> or similar one</li>
<li>Copy the content of single-responsive-ad.js file to paste in a plugin block</li>
<li>Paste it as PHP block if previous doesn't work</li>
</ol>
            </div>
        </div>
    </div>
	


    <!-- Modal 2 -->
    <div id="modal2" class="w3-modal">
        <div class="w3-modal-content w3-animate-zoom">
            <span class="w3-button w3-display-topright w3-red" onclick="closeModal('modal2')">&times;</span>
			<header class="w3-container w3-blue">
 

    <h2>&#9724;&#9724; </h2>
		<p>Inline responsive ad 100% width displaying 2 random ads - works best for images with same size or same height</p>
		</header>           
		<div class="w3-container">

 

<div class="w3-panel w3-card w3-light-grey"> 
  <h4>Copy and Paste this code where you want your ads to appear</h4>
  
 
  <div class="w3-code htmlHigh notranslate">
  &lt;!-- Place this code where you want your ads to appear --><br> 
    &lt;div id="two-responsive-ads">&lt;/div><br> 
<br> 
    &lt;!-- Include the ads script --><br> 
    &lt;script src="/ads/2-responsive-ads-in-a-row.js">&lt;/script><br> 
  </div>
  <b id class="w3-text-red">Make sure you're using correct paths or use absolute URLs instead. Default url is /ads/ </b>
</div>

<ol>
<li>Use the HTML editor to add the &lt;div> and &lt;script> code in a post or page</li>
<li>Check and edit 2-responsive-ads-in-a-row.js if necessary to fix the paths</li>
</ol>
 <h3>WordPress Integration</h3>
<ol>
<li>Install the <a href="https://wordpress.org/plugins/ad-inserter/" target="_blank">Ad inserter plugin</a> or similar one</li>
<li>Copy the content of 2-responsive-ads-in-a-row.js file to paste in a plugin block</li>
<li>Paste it as PHP block if previous doesn't work</li>
</ol>
            </div>
        </div>
    </div>


    <!-- Modal 4 -->
    <div id="modal4" class="w3-modal">
        <div class="w3-modal-content w3-animate-zoom">
            <span class="w3-button w3-display-topright w3-red" onclick="closeModal('modal4')">&times;</span>
			<header class="w3-container w3-blue">
 

    <h2>&#9724;&#9724;&#9724;&#9724; </h2>
		<p>Inline responsive ad 100% width displaying 4 random ads at all times - works best for images with same size</p>
		</header>           
		<div class="w3-container">

 

<div class="w3-panel w3-card w3-light-grey"> 
  <h4>Copy and Paste this code where you want your ads to appear</h4>
  
 
  <div class="w3-code htmlHigh notranslate">
  &lt;!-- Place this code where you want your ads to appear --><br> 
    &lt;div id="four-responsive-ads">&lt;/div><br> 
<br> 
    &lt;!-- Include the ads script --><br> 
    &lt;script src="/ads/4-responsive-ads-in-a-row.js">&lt;/script><br> 
  </div>
  <b id class="w3-text-red">Make sure you're using correct paths or use absolute URLs instead. Default url is /ads/ </b>
</div>

<ol>
<li>Use the HTML editor to add the &lt;div> and &lt;script> code in a post or page</li>
<li>Check and edit 4-responsive-ads-in-a-row.js if necessary to fix the paths</li>
</ol>
 <h3>WordPress Integration</h3>
<ol>
<li>Install the <a href="https://wordpress.org/plugins/ad-inserter/" target="_blank">Ad inserter plugin</a> or similar one</li>
<li>Copy the content of 4-responsive-ads-in-a-row.js file to paste in a plugin block</li>
<li>Paste it as PHP block if previous doesn't work</li>
</ol>
            </div>
        </div>
    </div>
 <br>
<p class="w3-right w3-padding-large">Random Ads Manager ver. 1.1 by <a href="https://bit.ly/colenikol" target="_blank">ColeN AKA ColeNikol</a> made for the NonCon Team and <a href="https://nonconfirmed.com" target="_blank">NonConfirmed.com</a> © 2024 &nbsp;</p> <br>
	    <form action="logout.php" method="post" >

        &nbsp;&nbsp;&nbsp;<button class="w3-button w3-xlarge w3-red w3-round-large w3-padding-large" type="submit">Logout</button>
    </form>
	<br>
</body>
</html>
