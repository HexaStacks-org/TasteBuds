var cardData = [
    {
        name: "Name Here 1",
        image: "shared/assets/image/mockup-pic.png",
        tags: [
            { type: "primary", label: "Breakfast" },
            { type: "primary", label: "Lunch" },
            { type: "sub", label: "Chicken" }
        ],
        caption: "Caption for post 1.",
        date: "2025-01-20 10:30:00"
    },
    {
        name: "Name Here 2",
        image: "shared/assets/image/mockup-pic.png",
        tags: [
            { type: "primary", label: "Dinner" },
            { type: "sub", label: "Beef" }
        ],
        caption: "Caption for post 2.",
        date: "2025-01-20 10:32:00"
    },
    {
        name: "Name Here 3",
        image: "shared/assets/image/mockup-pic.png",
        tags: [
            { type: "primary", label: "Snack" },
            { type: "sub", label: "Vegetarian" }
        ],
        caption: "Caption for post 3.",
        date: "2025-01-20 10:34:00"
    },
    {
        name: "Name Here 2",
        image: "shared/assets/image/mockup-pic.png",
        tags: [
            { type: "primary", label: "Dinner" },
            { type: "sub", label: "Beef" }
        ],
        caption: "Caption for post 2.",
        date: "2025-01-20 10:38:00"
    },
    {
        name: "Name Here 2",
        image: "shared/assets/image/mockup-pic.png",
        tags: [
            { type: "primary", label: "Dinner" },
            { type: "sub", label: "Beef" }
        ],
        caption: "Caption for post 2.",
        date: "2025-01-20 10:30:00"
    },
    {
        name: "Name Here 2",
        image: "shared/assets/image/mockup-pic.png",
        tags: [
            { type: "primary", label: "Dinner" },
            { type: "sub", label: "Beef" }
        ],
        caption: "Caption for post 2.",
        date: "2025-01-20 10:30:00"
    },
    {
        name: "Name Here 2",
        image: "shared/assets/image/mockup-pic.png",
        tags: [
            { type: "primary", label: "Dinner" },
            { type: "sub", label: "Beef" }
        ],
        caption: "Caption for post 2.",
        date: "2025-01-20 10:30:00"
    },
    {
        name: "Name Here 2",
        image: "shared/assets/image/mockup-pic.png",
        tags: [
            { type: "primary", label: "Dinner" },
            { type: "sub", label: "Beef" }
        ],
        caption: "Caption for post 2.",
        date: "2025-01-20 10:30:00"
    }
];
var cardsPerPage = 5;
var currentPage = parseInt(new URLSearchParams(window.location.search).get('page')) || 1;
var cardContainer = document.getElementById('card-container');
var backBtn = document.getElementById('back-btn');
var nextBtn = document.getElementById('continue-btn');
function renderCards() {
    var startIndex = (currentPage - 1) * cardsPerPage;
    var endIndex = startIndex + cardsPerPage;
    var cardsToShow = cardData.slice(startIndex, endIndex);
    cardContainer.innerHTML = '';
    for (var i = 0; i < cardsToShow.length; i++) {
        var card = cardsToShow[i];
        var cardElement = document.createElement('div');
        cardElement.className = 'col-12 d-flex align-items-center justify-content-center mb-4';

        cardElement.innerHTML =
            '<div class="card shadow">' +
            '<div class="d-flex justify-content-between align-items-center p-3">' +
            '<div class="name fw-bold">' + card.name + '</div>' +
            '<button class="btn btn-edit btn-secondary mx-4">Edit</button>' +
            '</div>' +
            '<div class="datetime d-flex justify-content-between align-items-center">' + formatDate(card.date) + '</div>' +
            '<div class="img-fluid img-post">' +
            '<img src="' + card.image + '" alt="' + card.name + '">' +
            '<div class="container mx-3 tags d-flex">' +
            card.tags.map(function (tag) {
                var tagClass = tag.type === "primary" ? "primary" : "sub";
                return '<div class="' + tagClass + ' mx-1"><p>' + tag.label + '</p></div>';
            }).join('') +
            '</div>' +
            '<div class="caption mx-5 my-2"><p>' + card.caption + '</p></div>' +
            '</div>' +
            '<div class="d-flex justify-content-between w-100">' +
            '<div class="btn-lbsr d-flex my-5">' +
            '<button class="btn btn-like"><i class="bi bi-hand-thumbs-up-fill" style="color: var(--clr-light-orange)"></i></button>' +
            '<button class="btn btn-bookmark mx-1"><i class="bi bi-bookmark-fill" style="color: var(--clr-light-orange)"></i></button>' +
            '</div>' +
            '<div class="report-btn d-flex my-5 mx-5">' +
            '<button class="btn btn-report"><i class="bi bi-flag-fill" style="color: var(--clr-light-orange)"></i></button>' +
            '</div>' +
            '</div>' +
            '</div>';
        cardContainer.appendChild(cardElement);
    }

    backBtn.disabled = currentPage === 1;
    nextBtn.disabled = currentPage * cardsPerPage >= cardData.length;
}

function formatDate(dateString) {
    var date = new Date(dateString);
    return date.toLocaleString();
}

function updatePage(newPage) {
    currentPage = newPage;
    var url = new URL(window.location.href);
    url.searchParams.set('page', currentPage);
    history.pushState({}, '', url);
    renderCards();
}

backBtn.addEventListener('click', function () {
    if (currentPage > 1) {
        updatePage(currentPage - 1);
    }
});

nextBtn.addEventListener('click', function () {
    if (currentPage * cardsPerPage < cardData.length) {
        updatePage(currentPage + 1);
    }
});

renderCards();