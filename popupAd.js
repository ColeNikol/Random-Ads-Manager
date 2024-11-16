function showPopupAd() {
  fetch("/ads/ads.json")
    .then((response) => response.json())
    .then((ads) => {
      const activeAds = ads.filter((ad) => {
        const expiry = new Date(ad.dateAdded).getTime() + ad.days * 86400000;
        return Date.now() < expiry;
      });

      // Randomly select 1 ad
      const ad = activeAds[Math.floor(Math.random() * activeAds.length)];
      const popup = document.getElementById("popup-ad");

      // Configure popup display
	  // Pop-up dimensions - edit width & height properties:
	  // Pop-up position - edit buttom & right: for example (bottom: 250px; right: 5px;) - aboutcenter right side or (bottom: 33%; right: 45%;) about center of the screen
	  
      popup.style.cssText = "width: 350px; height: 350px; background-size: cover; background-position: center; position: fixed; bottom: 0%; right: 0%; display: block;";
      popup.style.backgroundImage = `url(${ad.imageUrl})`;
      popup.onclick = () => window.open(ad.targetUrl, '"_blank" rel="nofollow"');

      // Hide the popup after 15 seconds - change display duration here
      setTimeout(() => {
        popup.style.display = "none";
      }, 15000);
    })
    .catch((error) => console.error("Error loading ads:", error));
}

// Show popup ad on load and repeat every 2.5 minutes  
document.addEventListener("DOMContentLoaded", () => {
  showPopupAd();
  setInterval(showPopupAd, 1500000); // 2.5 minutes - change time interval here
});
