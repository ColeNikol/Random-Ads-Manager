# Random-Ads-Manager
Random Ads Manager - a simple but powerful solution to display and manage your own image ads, 
affiliate links, sell ad space and monetize your website

Made to easily manage and randomly display responsive SEO friendly image ads in various ad formats 
you can place anywhere you want on your site


What Random Ads Manager do and how to use it:

- Login in to manager (hard coded Admin/Pass pair) - Have to edit Index.php
  and change the default admin/pass login credentials into something only you will know
  (if forgot them will have to edit the Index.php file to remind yourself
- Once you're logged in into Random Ads Manager Admin.php:
  
    
  ADD A NEW AD
  (USE OF ABSOLUTE PATHS IS SUGGESTED to avoid any problems!)
  
- Add a new ad by adding Target URL - Your affiliate link, a product, service or link of your choise
- Add URL of the image to be shown in the ad.
- Add a description - this is the ad description
- Add display duration (in days) - how many days the image ad will be shown. When expire you can delete it

  Hit the ADD button to add your new AD
  

All ads added are displayed in a table like list where can see:

- The target URL (with rel="NOFOLLOW NOOPENER" attributes for better SEO) that opens in a new tab
- URL of the image used as AD
- Ad description (used as image ALT tag) for SEO purposes
- Date when ad is added
- Days left till ad expires and delete itself
- Delete button - to delete the ad before expires

Instruction how to add the AD FORMATS into your site

1. Choose the ad format (Click on the blue buttons with rough icons) showing number of images/links to be shown
2. A modal will pop up with instructions and code to COPY/PASTE in your website where you want the ad to appear


HOW it works

Login through the form provided in index.php 

validate.php - validates if correct admin/pass pair is entered in the login form
Change default hard coded login credentials before using Random Ads Manager on your site. Defaults are: admin / pass

admin.php contains Manager panel to add/delete ads and instructions to copy and use the code for displaying ads on your website

Target links, image URLs, descriptions and ads start date are stored in ads.json file

[ad format].js javascript files randomly picks and displays responsive image ads depending of the ad format chosen.
When you place the code on your site for an ad format you call that /js file
popupAd.js adds a pop up ad in the right bottom corner. Pop-up shows and closses in intervals so you'll have to edit the times

You can modify the existing ad formats to suit your needs or buy me a coffee to do it for you or create another ad format

logout.php - saves the settings and logs out clearing the session


Technology used:
- PHP
- plain javascript
- JSON
- HTML
- Some custom CSS and free W3CSS for the UI
  

Random Ads Manager ver. 1.1 by ColeN AKA ColeNikol made for the NonCon Team and https://nonconfirmed.com originally

Licenced under MIT licence, you can do almost whatever you want as long as you include the original copyright 
and license notice in any copy of the software/source. Have to keep the Attribution links or maybe
Buy me a coffee to see the next project or want me to change and create something unique just for you
