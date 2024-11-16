document.addEventListener("DOMContentLoaded", function () {
    // Define the container ID and ads file location
    const adsContainerId = "four-responsive-ads";
    const adsFile = "/ads/ads.json"; // Updated with the correct path to ads.json
	const adsFile = "ads.json"; // for testing only - DELETE THIS LINE

    // Inject CSS styles for the ads
    const style = document.createElement("style");
    style.textContent = `
        /* Container for ads */
        #${adsContainerId} {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin: 20px 0;
        }

        /* Individual ad styling */
        .responsive-ad {
            flex: 1 1 calc(25% - 10px); /* Four ads in a row */
            box-sizing: border-box;
            max-width: calc(25% - 10px);
            text-align: center;
        }

        .responsive-ad img.ad-image {
            max-width: 100%;
            height: auto;
            display: block;
        }
    `;
    document.head.appendChild(style);

    // Fetch and display ads
    fetch(adsFile)
        .then(response => {
            if (!response.ok) {
                throw new Error("Failed to load ads.json");
            }
            return response.json();
        })
        .then(ads => {
            displayAds(ads);
        })
        .catch(error => {
            console.error("Error loading ads:", error);
        });

    function displayAds(ads) {
        // Select or create the container
        let container = document.getElementById(adsContainerId);
        if (!container) {
            container = document.createElement("div");
            container.id = adsContainerId;
            document.body.appendChild(container);
        }

        // Shuffle ads and pick 4 unique ones
        const shuffledAds = ads.sort(() => 0.5 - Math.random()).slice(0, 4);

        // Create ad HTML
        shuffledAds.forEach(ad => {
            const adElement = document.createElement("div");
            adElement.className = "responsive-ad";

            adElement.innerHTML = `
                <a href="${ad.targetUrl}" target="_blank" rel="nofollow noreferrer">
                    <img src="${ad.imageUrl}" alt="${ad.description}" class="ad-image">
                </a>
            `;

            container.appendChild(adElement);
        });
    }
});
