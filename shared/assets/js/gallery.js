document.addEventListener('DOMContentLoaded', function () {
    var cardData = [
        {
            name: "Name Here 1",
            image: "shared/assets/image/mockup-pic.png",
            tags: [
                { type: "primary", label: "Breakfast" },
                { type: "primary", label: "Lunch" },
                { type: "sub", label: "Chicken" }
            ],
            caption: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec purus nec nunc  efficitur.Lorem ipsum dolor sit amet, consectetur adipiscing elit."
        },
        {
            name: "Name Here 2",
            image: "shared/assets/image/mockup-pic.png",
            tags: [
                { type: "primary", label: "Dinner" },
                { type: "sub", label: "Beef" }
            ],
            caption: "Caption for post 2."
        },
        {
            name: "Name Here 3",
            image: "shared/assets/image/mockup-pic.png",
            tags: [
                { type: "primary", label: "Snack" },
                { type: "sub", label: "Vegetarian" }
            ],
            caption: "Caption for post 3."
        },
        {
            name: "Name Here 2",
            image: "shared/assets/image/mockup-pic.png",
            tags: [
                { type: "primary", label: "Dinner" },
                { type: "sub", label: "Beef" }
            ],
            caption: "Caption for post 2."
        },
        {
            name: "Name Here 2",
            image: "shared/assets/image/mockup-pic.png",
            tags: [
                { type: "primary", label: "Dinner" },
                { type: "sub", label: "Beef" }
            ],
            caption: "Caption for post 2."
        },
        {
            name: "Name Here 2",
            image: "shared/assets/image/mockup-pic.png",
            tags: [
                { type: "primary", label: "Dinner" },
                { type: "sub", label: "Beef" }
            ],
            caption: "Caption for post 2."
        },
        {
            name: "Name Here 2",
            image: "shared/assets/image/mockup-pic.png",
            tags: [
                { type: "primary", label: "Dinner" },
                { type: "sub", label: "Beef" }
            ],
            caption: "Caption for post 2."
        },
        {
            name: "Name Here 2",
            image: "shared/assets/image/mockup-pic.png",
            tags: [
                { type: "primary", label: "Dinner" },
                { type: "sub", label: "Beef" }
            ],
            caption: "Caption for post 2."
        }
    ];

    var cardsPerLoad = 5;
    var displayedCards = 0;

    var cardContainer = document.getElementById('card-container');
    var backBtn = document.getElementById('back-btn');
    var continueBtn = document.getElementById('continue-btn');

    if (!cardContainer || !backBtn || !continueBtn) {
        console.error("Required DOM elements are missing. Check IDs and ensure HTML matches script.");
        return;
    }

    function renderCards() {
        var endIndex = displayedCards + cardsPerLoad;
        var cardsToShow = cardData.slice(displayedCards, endIndex);

        for (var i = 0; i < cardsToShow.length; i++) {
            var card = cardsToShow[i];
            var cardElement = document.createElement('div');
            cardElement.className = 'col-12 d-flex align-items-center justify-content-center mb-4';

            var tagsHtml = "";
            for (var j = 0; j < card.tags.length; j++) {
                var tag = card.tags[j];
                var tagClass = tag.type === "primary" ? "primary" : "sub";
                tagsHtml += '<div class="' + tagClass + ' mx-1"><p>' + tag.label + '</p></div>';
            }

            var buttonsHtml = `
                <div class="d-flex justify-content-between w-100">
                    <div class="btn-lbsr d-flex my-5">
                        <button class="btn btn-like">Like</button>
                        <button class="btn btn-bookmark mx-1">Bookmark</button>
                        <button class="btn btn-share mx-1">Share</button>
                    </div>
                    <div class="report-btn d-flex my-5 mx-5">
                        <button class="btn btn-report">Report</button>
                    </div>
                </div>
            `;

            cardElement.innerHTML =
                '<div class="card shadow">' +
                '<div class="name">' + card.name + '</div>' +
                '<div class="img-fluid img-post">' +
                '<img src="' + card.image + '" alt="' + card.name + '">' +
                '</div>' +
                '<div class="container mx-3 tags d-flex">' + tagsHtml + '</div>' +
                '<div class="caption mx-5 mt-4"><p>' + card.caption + '</p></div>' +
                buttonsHtml +
                '</div>';
            cardContainer.appendChild(cardElement);
        }

        displayedCards = endIndex;

        backBtn.disabled = displayedCards < 10;
        continueBtn.disabled = displayedCards >= cardData.length;
    }

    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    }

    backBtn.addEventListener('click', function () {
        if (displayedCards >= 10) {
            scrollToTop();
        }
    });

    continueBtn.addEventListener('click', function () {
        if (displayedCards < cardData.length) {
            renderCards();
        }
    });

    renderCards();
});