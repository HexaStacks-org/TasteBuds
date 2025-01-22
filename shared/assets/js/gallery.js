var cardData = [
    {
        name: "Name Here 1",
        images: [
            "shared/assets/image/mockup-pic1.png",
            "shared/assets/image/mockup-pic2.png"
        ],
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
        images: [
            "shared/assets/image/mockup-pic.png"
        ],
        tags: [
            { type: "primary", label: "Dinner" },
            { type: "sub", label: "Beef" }
        ],
        caption: "Caption for post 2.",
        date: "2025-01-20 10:32:00"
    },
    {
        name: "Name Here 1",
        images: [
            "shared/assets/image/mockup-pic1.png",
            "shared/assets/image/mockup-pic2.png"
        ],
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
        images: [
            "shared/assets/image/mockup-pic.png"
        ],
        tags: [
            { type: "primary", label: "Dinner" },
            { type: "sub", label: "Beef" }
        ],
        caption: "Caption for post 2.",
        date: "2025-01-20 10:32:00"
    },
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

        var imageContent = '';
        if (card.images.length > 1) {
            var carouselId = 'carousel-' + i;
            imageContent += '<div id="' + carouselId + '" class="carousel slide" data-bs-ride="carousel">';
            imageContent += '<div class="carousel-inner">';
            for (var j = 0; j < card.images.length; j++) {
                imageContent += '<div class="carousel-item ' + (j === 0 ? 'active' : '') + '">';
                imageContent += '<img src="' + card.images[j] + '" class="d-block w-100" alt="Image ' + (j + 1) + '">';
                imageContent += '</div>';
            }
            imageContent += '</div>';
            imageContent += '<button class="carousel-control-prev" type="button" data-bs-target="#' + carouselId + '" data-bs-slide="prev">';
            imageContent += '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
            imageContent += '<span class="visually-hidden">Previous</span>';
            imageContent += '</button>';
            imageContent += '<button class="carousel-control-next" type="button" data-bs-target="#' + carouselId + '" data-bs-slide="next">';
            imageContent += '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
            imageContent += '<span class="visually-hidden">Next</span>';
            imageContent += '</button>';
            imageContent += '</div>';
        } else {
            imageContent += '<img src="' + card.images[0] + '" class="img-fluid" alt="' + card.name + '">';
        }

        var tagsContent = '';
        for (var k = 0; k < card.tags.length; k++) {
            var tag = card.tags[k];
            tagsContent += '<div class="' + (tag.type === 'primary' ? 'primary' : 'sub') + ' mx-1">';
            tagsContent += '<p>' + tag.label + '</p>';
            tagsContent += '</div>';
        }

        cardElement.innerHTML =
            '<div class="card shadow">' +
            '<div class="d-flex justify-content-between align-items-center" style="padding-right: 16px">' +
            '<div class="name fw-bold">' + card.name + '</div>' +
            '<button class="btn btn-edit btn-secondary mx-4">Edit</button>' +
            '</div>' +
            '<div class="datetime d-flex justify-content-between align-items-center">' + formatDate(card.date) + '</div>' +
            '<div class="img-fluid img-post">' + imageContent + '</div>' +
            '<div class="container mx-3 tags d-flex">' + tagsContent + '</div>' +
            '<div class="caption mx-5 my-2"><p>' + card.caption + '</p></div>' +
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

document.addEventListener("DOMContentLoaded", function () {
    var reportButtons = document.querySelectorAll('.btn-report');

    for (var i = 0; i < reportButtons.length; i++) {
        reportButtons[i].addEventListener('click', function () {
            var reportModal = new bootstrap.Modal(document.getElementById('reportModal'));
            reportModal.show();
        });
    }

    document.getElementById('submitReport').addEventListener('click', function () {
        var selectedReason = document.querySelector('input[name="reportReason"]:checked');
        if (selectedReason) {
            alert('Report submitted for reason: ' + selectedReason.value);
            var reportModal = bootstrap.Modal.getInstance(document.getElementById('reportModal'));
            reportModal.hide();
        } else {
            alert('Please select a reason for reporting.');
        }
    });
});

renderCards();