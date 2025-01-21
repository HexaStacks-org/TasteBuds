<?php
include("components/connect.php");

$userCountPerDay = "
    SELECT DAYNAME(registeredAt) AS dayName, COUNT(userID) AS userPerDay
    FROM users
    GROUP BY dayName
    ORDER BY FIELD(dayName, 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday')
";

$uploadedContentsPerDay = "
    SELECT DAYNAME(createdAt) AS dayName, COUNT(postID) AS contentsPerDay
    FROM galleryposts
    GROUP BY dayName
    ORDER BY FIELD(dayName, 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday')
";

$uploadedRecipesPerDay = "
    SELECT DAYNAME(createdAt) AS dayName, COUNT(recipeID) AS recipePerDay
    FROM recipes
    GROUP BY dayName
    ORDER BY FIELD(dayName, 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday')
";



$userCountPerDayResult = executeQuery($userCountPerDay);
$uploadedContentsPerDayResult = executeQuery($uploadedContentsPerDay);
$uploadedRecipesPerDayResult = executeQuery($uploadedRecipesPerDay);


$userCountChartLabels = array();
$userCountChartData = array();

$uploadedContentsChartLabels = array();
$uploadedContentsChartData = array();

$uploadedRecipesChartLabels = array();
$uploadedRecipesChartData = array();


while ($userCountPerDayRow = mysqli_fetch_assoc($userCountPerDayResult)) {
    array_push($userCountChartLabels, $userCountPerDayRow['dayName']);
    array_push($userCountChartData, $userCountPerDayRow['userPerDay']);
}

while ($uploadedContentsPerDayRow = mysqli_fetch_assoc($uploadedContentsPerDayResult)) {
    array_push($uploadedContentsChartLabels, $uploadedContentsPerDayRow['dayName']);
    array_push($uploadedContentsChartData, $uploadedContentsPerDayRow['contentsPerDay']);
}

while ($uploadedRecipesPerDayRow = mysqli_fetch_assoc($uploadedRecipesPerDayResult)) {
    array_push($uploadedRecipesChartLabels, $uploadedRecipesPerDayRow['dayName']);
    array_push($uploadedRecipesChartData, $uploadedRecipesPerDayRow['recipePerDay']);
}
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const numberOfUsers = document.getElementById("numberOfUsers");
    const uploadedContents = document.getElementById("uploadedContents");
    const uploadedRecipes = document.getElementById("uploadedRecipes");
    const restrictedUsers = document.getElementById("restrictedUsers");

    new Chart(numberOfUsers, {
        type: "bar",
        data: {
            labels: [<?php echo '"' . implode('","', $userCountChartLabels) . '"' ?>],
            datasets: [
                {
                    label: "Users per day",
                    data: [<?php echo implode(',', $userCountChartData) ?>],
                    borderWidth: 2,
                    borderColor: "#00429D",
                    backgroundColor: "#76B7E6",
                    borderRadius: 8,
                },
            ],
        },
        options: {
            plugins: {
                legend: {
                    display: false, // Remove the legend
                },
                tooltip: {
                    titleFont: {
                        size: 16, // Adjust font size for tooltip titles
                        weight: "bold",
                    },
                    bodyFont: {
                        size: 16, // Adjust font size for tooltip body
                        weight: "bold",
                    },
                },
            },
            layout: {
                padding: {
                    top: 28, // Add padding to the top
                },
            },
            scales: {
                x: {
                    ticks: {
                        font: {
                            size: 16, // Adjust font size for x-axis labels
                            weight: "bold",
                        },
                    },
                },
                y: {
                    ticks: {
                        font: {
                            size: 14, // Adjust font size for y-axis labels
                        },
                        beginAtZero: true,
                    },
                },
            },
        },
    });


    new Chart(uploadedContents, {
        type: "bar",
        data: {
            labels: [<?php echo '"' . implode('","', $uploadedContentsChartLabels) . '"' ?>],
            datasets: [
                {
                    label: "Users per day",
                    data: [<?php echo implode(',', $uploadedContentsChartData) ?>],
                    borderWidth: 2,
                    borderColor: "#5E4FA2",
                    backgroundColor: "#9E9BCB",
                    borderRadius: 8,
                },
            ],
        },
        options: {
            plugins: {
                legend: {
                    display: false, // Remove the legend
                },
                tooltip: {
                    titleFont: {
                        size: 16, // Adjust font size for tooltip titles
                        weight: "bold",
                    },
                    bodyFont: {
                        size: 16, // Adjust font size for tooltip body
                        weight: "bold",
                    },
                },
            },
            layout: {
                padding: {
                    top: 28, // Add padding to the top
                },
            },
            scales: {
                x: {
                    ticks: {
                        font: {
                            size: 16, // Adjust font size for x-axis labels
                            weight: "bold",
                        },
                    },
                },
                y: {
                    ticks: {
                        font: {
                            size: 14, // Adjust font size for y-axis labels
                        },
                        beginAtZero: true,
                    },
                },
            },
        },
    });

    new Chart(uploadedRecipes, {
        type: "bar",
        data: {
            labels: [<?php echo '"' . implode('","', $uploadedRecipesChartLabels) . '"' ?>],
            datasets: [
                {
                    label: "Users per day",
                    data: [<?php echo implode(',', $uploadedRecipesChartData) ?>],
                    borderWidth: 2,
                    borderColor: "#00876C",
                    backgroundColor: "#72D1B0",
                    borderRadius: 8,
                },
            ],
        },
        options: {
            plugins: {
                legend: {
                    display: false, // Remove the legend
                },
                tooltip: {
                    titleFont: {
                        size: 16, // Adjust font size for tooltip titles
                        weight: "bold",
                    },
                    bodyFont: {
                        size: 16, // Adjust font size for tooltip body
                        weight: "bold",
                    },
                },
            },
            layout: {
                padding: {
                    top: 28, // Add padding to the top
                },
            },
            scales: {
                x: {
                    ticks: {
                        font: {
                            size: 16, // Adjust font size for x-axis labels
                            weight: "bold",
                        },
                    },
                },
                y: {
                    ticks: {
                        font: {
                            size: 14, // Adjust font size for y-axis labels
                        },
                        beginAtZero: true,
                    },
                },
            },
        },
    });
</script>