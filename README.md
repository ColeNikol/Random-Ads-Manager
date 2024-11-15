# Random-Ads-Manager
Random Ads Manager - a simple but powerful solution to display and manage your own image ads, 
affiliate links, sell ad space and monetize your website

Made to easily manage and randomly display responsive SEO friendly image ads in various ad formats 
you can place anywhere you want on your site

Licenced under MIT

What Random Ads Manager do and how to use it:

- Login in to manager (hard coded Admin/Pass pair) - Have to edit Index.php
  and change the default admin/pass login credentials into something only you will know
  (if forgot them will have to edit the Index.php file to remind yourself
- Once you're logged in into Random Ads Manager Admin.php:
  
    USE OF ABSOLUTE PATH FOR ABOVE URLs IS SUGGESTED to avoid any problems!
  
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
- Delete button - do delete the ad before expire
