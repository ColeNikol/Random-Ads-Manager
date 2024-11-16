document.addEventListener("DOMContentLoaded", function () {
    // Define the container ID and ads file location
    const adContainerId = "single-responsive-ad";
    const adsFile = "/ads/ads.json"; // Updated with the correct path to ads.json
	const adsFile = "ads.json"; // for testing only - DELETE THIS LINE

    // Inject CSS styles for the ad
    const style = document.createElement("style");
    style.textContent = `
        /* Container for the single ad */
        #${adContainerId} {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
        }

        /* Individual ad styling */
        .responsive-ad {
            max-height: 400px; /* Max height */
            width: auto; /* Maintain aspect ratio */
            display: block;
        }
    `;
    document.head.appendChild(style);

    // Fetch and display an ad
    fetch(adsFile)
        .then(response => {
            if (!response.ok) {
                throw new Error("Failed to load ads.json");
            }
            return response.json();
        })
        .then(ads => {
            displayAd(ads);
        })
        .catch(error => {
            console.error("Error loading ads:", error);
        });

    function displayAd(ads) {
        // Select or create the container
        let container = document.getElementById(adContainerId);
        if (!container) {
            container = document.createElement("div");
            container.id = adContainerId;
            document.body.appendChild(container);
        }

        // Pick a random ad
        const randomAd = ads[Math.floor(Math.random() * ads.length)];

        // Create ad HTML
        const adElement = document.createElement("a");
        adElement.href = randomAd.targetUrl;
        adElement.target = "_blank";
        adElement.rel = "nofollow noreferrer";
        adElement.innerHTML = `
            <img src="${randomAd.imageUrl}" alt="${randomAd.description}" class="responsive-ad">
        `;

        container.appendChild(adElement);
    }
});
