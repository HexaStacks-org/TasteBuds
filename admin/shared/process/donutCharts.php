<?php

$primaryCategoryColors = [
    1 => '#FFD479', // Breakfast
    2 => '#FF9A76', // Lunch
    3 => '#6A77D8', // Dinner
    4 => '#4AB19D', // Snack
    5 => '#F2B880', // Dessert
];

$subcategoryColors = [
    1 => '#E96B6B',  // Coral Red
    2 => '#F4A261',  // Warm Orange
    3 => '#8D6A9F',  // Muted Purple
    4 => '#3FA7D6',  // Sky Blue
    5 => '#66C18C',  // Green
    6 => '#FFC857',  // Bright Yellow
    7 => '#BCC3C7',  // Neutral Gray
];


$primaryCategoryUsageQuery = "SELECT  
    galleryposts.postID, 
    galleryposts.primaryCategoryID, 
    primaryfoodcategories.primaryCategoryName AS primaryFood,
    COUNT(galleryposts.primaryCategoryID) AS usageCountPrimary
FROM 
    galleryposts
LEFT JOIN 
    primaryfoodcategories 
ON 
    galleryposts.primaryCategoryID = primaryfoodcategories.primaryCategoryID
GROUP BY 
    galleryposts.primaryCategoryID, primaryfoodcategories.primaryCategoryName
ORDER BY 
    galleryposts.postID, usageCountPrimary DESC";


$subcategoryUsageQuery = "SELECT 
    galleryposts.postID, 
    galleryposts.subcategoryID, 
    foodsubcategories.subcategoryName AS subcatFood, 
    COUNT(galleryposts.subcategoryID) AS usageCountSubcat
FROM 
    galleryposts
LEFT JOIN 
    foodsubcategories 
ON 
    galleryposts.subcategoryID = foodsubcategories.subcategoryID
GROUP BY 
    galleryposts.subcategoryID, foodsubcategories.subcategoryName
ORDER BY 
    galleryposts.postID, usageCountSubcat DESC;";

// execute queries
$primaryCategoryUsageResult = executeQuery($primaryCategoryUsageQuery);
$subcategoryUsageResult = executeQuery($subcategoryUsageQuery);

// arrays
$primaryChartLabels = [];
$primaryChartColors = [];
$primaryChartData = [];

$subcategoryChartLabels = [];
$subcategoryChartColors = [];
$subcategoryChartData = [];

// loop primary category data
while ($primaryCategoryUsageRow = mysqli_fetch_assoc($primaryCategoryUsageResult)) {
    array_push($primaryChartLabels, $primaryCategoryUsageRow['primaryFood']);
    array_push($primaryChartData, $primaryCategoryUsageRow['usageCountPrimary']);

    //color 
    $primaryCategoryID = $primaryCategoryUsageRow['primaryCategoryID'];
    if (array_key_exists($primaryCategoryID, $primaryCategoryColors)) {
        array_push($primaryChartColors, $primaryCategoryColors[$primaryCategoryID]);
    }
}

// loop subcategory data
while ($subcategoryUsageRow = mysqli_fetch_assoc($subcategoryUsageResult)) {
    array_push($subcategoryChartLabels, $subcategoryUsageRow['subcatFood']);
    array_push($subcategoryChartData, $subcategoryUsageRow['usageCountSubcat']);

    //color 
    $subcategoryID = $subcategoryUsageRow['subcategoryID'];
    if (array_key_exists($subcategoryID, $subcategoryColors)) {
        array_push($subcategoryChartColors, $subcategoryColors[$subcategoryID]);
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Primary Category Chart
    const ctx1 = document.getElementById('primaryCategory').getContext('2d');
    new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: [<?php echo '"' . implode('","', $primaryChartLabels) . '"'; ?>],
            datasets: [{
                data: [<?php echo implode(',', $primaryChartData); ?>],
                backgroundColor: [<?php echo '"' . implode('","', $primaryChartColors) . '"'; ?>],
                hoverOffset: 4,
            }],
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: false,
                    text: 'Primary Category Usage',
                    font: {
                        size: 20,
                        weight: 'bold',
                    },
                    padding: {
                        top: 10,
                    },
                },
            },
            aspectRatio: 1,
            maintainAspectRatio: false,
            cutout: '48%',
        },
    });

    // Subcategory Chart
    const ctx2 = document.getElementById('secondaryCategory').getContext('2d');
    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: [<?php echo '"' . implode('","', $subcategoryChartLabels) . '"'; ?>],
            datasets: [{
                data: [<?php echo implode(',', $subcategoryChartData); ?>],
                backgroundColor: [<?php echo '"' . implode('","', $subcategoryChartColors) . '"'; ?>],
                hoverOffset: 4,
            }],
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: false,
                    text: 'Subcategory Usage',
                    font: {
                        size: 20,
                        weight: 'bold',
                    },
                    padding: {
                        top: 10,
                    },
                },
            },
            aspectRatio: 1,
            maintainAspectRatio: false,
            cutout: '48%',
        },
    });
</script>