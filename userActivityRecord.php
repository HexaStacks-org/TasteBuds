<!-- FILE UPDATED: 19-01-2025 2:33 AM-->


<?php
include("shared/components/connect.php");

// Query for User Liked Records (RECIPES)
$queryUserLikesRc = "
SELECT likes.*, users.userID AS userLikerID, users.firstName, users.lastName, recipes.*
FROM likes
LEFT JOIN users ON users.userID = likes.userID 
LEFT JOIN recipes ON recipes.recipeID = likes.recipeID
WHERE likes.recipeID >= 1;
";

$resultUserLikesRc = executeQuery($queryUserLikesRc);

// Query for User Liked Records (GALLERY POSTS)
$queryUserLikesGp = "
SELECT likes.*, users.userID AS userLikerID, users.firstName, users.lastName, galleryposts.*
FROM likes
LEFT JOIN users ON users.userID = likes.userID
LEFT JOIN galleryposts ON galleryposts.postID = likes.postID
WHERE likes.postID >= 1
";

$resultUserLikesGp = executeQuery($queryUserLikesGp);

// INDIVIDUAL LIST OF LIKES PER USER
// #7 USER - Query for User Liked Records (RECIPES)
$queryUserLikesRcIndividual = "
SELECT likes.*, users.userID AS userLikerID, users.firstName, users.lastName, recipes.*
FROM likes
LEFT JOIN users ON users.userID = likes.userID 
LEFT JOIN recipes ON recipes.recipeID = likes.recipeID
WHERE likes.recipeID >= 1 AND likes.userID = 7;
";

$resultUserLikesRcIndividual = executeQuery($queryUserLikesRcIndividual);

// #7 USER - Query for User Liked Records (GALLERY POSTS)
$queryUserLikesGpIndividual = "
SELECT likes.*, users.userID AS userLikerID, users.firstName, users.lastName, galleryposts.*
FROM likes
LEFT JOIN users ON users.userID = likes.userID 
LEFT JOIN galleryposts ON galleryposts.postID = likes.postID
WHERE likes.postID >= 1 AND likes.userID = 7;
";

$resultUserLikesGpIndividual = executeQuery($queryUserLikesGpIndividual);

?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>18-01-25 USER LIKES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card img {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container my-5">

        <!-- LIST VIEW FOR USER LIKE ACTIVITY (RECIPES)-->
        <h1 class="text-center mb-4">USER LIKE ACTIVITY (RECIPES)</h1>

        <div class="container">
            <div class="row">

                <?php
                if (mysqli_num_rows($resultUserLikesRc) > 0) {
                    while ($userLikesRowRc = mysqli_fetch_assoc($resultUserLikesRc)) {
                        ?>
                        <div class="col">
                            <ul class="list-group" style="width: 18rem; margin-bottom: 40px;">
                                <li class="list-group-item list-group-item-primary" aria-current="true">[ Like ID ] :
                                    <?php echo $userLikesRowRc['likeID'] ?>
                                </li>
                                <li class="list-group-item">[ User ID ] : <?php echo $userLikesRowRc['userLikerID'] ?></li>
                                <li class="list-group-item"><b>[ User Name ] :
                                        <?php echo $userLikesRowRc['firstName'] . " " . $userLikesRowRc['lastName'] ?> </b></li>
                                <li class="list-group-item">[ Recipe ID ] : <?php echo $userLikesRowRc['recipeID'] ?></li>
                                <li class="list-group-item">[ Recipe Title ] : <?php echo $userLikesRowRc['recipeTitle'] ?></li>
                                <li class="list-group-item">[ Liked At ] : <?php echo $userLikesRowRc['likedAt'] ?> </li>
                            </ul>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>


        <!-- LIST VIEW FOR USER LIKE ACTIVITY (GALLERY POSTS)-->
        <hr style="border: 2px solid #000; margin: 20px auto;">
        <h1 class="text-center mb-4">USER LIKE ACTIVITY (GALLERY POSTS)</h1>

        <div class="container">
            <div class="row">

                <?php
                if (mysqli_num_rows($resultUserLikesGp) > 0) {
                    while ($userLikesRowGp = mysqli_fetch_assoc($resultUserLikesGp)) {
                        ?>
                        <div class="col">
                            <ul class="list-group" style="width: 18rem; margin-bottom: 40px;">
                                <li class="list-group-item list-group-item-success" aria-current="true">[ Like ID ] :
                                    <?php echo $userLikesRowGp['likeID'] ?>
                                </li>
                                <li class="list-group-item">[ User ID ] : <?php echo $userLikesRowGp['userLikerID'] ?></li>
                                <li class="list-group-item"><b>[ User Name ] :
                                        <?php echo $userLikesRowGp['firstName'] . " " . $userLikesRowGp['lastName'] ?> </b></li>
                                <li class="list-group-item">[ Post ID ] : <?php echo $userLikesRowGp['postID'] ?> </li>
                                <li class="list-group-item">[ Post Caption ] : <?php echo $userLikesRowGp['caption'] ?></li>
                                <li class="list-group-item">[ Liked At ] : <?php echo $userLikesRowGp['likedAt'] ?> </li>
                            </ul>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>


        <!-- INDIVIDUAL LIST OF LIKES PER USER -->

        <!-- #7 USER - LIST VIEW FOR USER LIKE ACTIVITY (RECIPES)-->
        <hr style="border: 2px solid #000; margin: 120px auto 20px auto;">
        <h1 class="text-center mb-4">#7 Jennie Kim - LIKE ACTIVITY (RECIPES)</h1>

        <div class="container">
            <div class="row">

                <?php
                if (mysqli_num_rows($resultUserLikesRcIndividual) > 0) {
                    while ($userLikesRowIndividualRc = mysqli_fetch_assoc($resultUserLikesRcIndividual)) {
                        ?>
                        <div class="col">
                            <ul class="list-group" style="width: 18rem; margin-bottom: 40px;">
                                <li class="list-group-item list-group-item-primary" aria-current="true">[ Like ID ] :
                                    <?php echo $userLikesRowIndividualRc['likeID'] ?>
                                </li>
                                <li class="list-group-item">[ User ID ] : <?php echo $userLikesRowIndividualRc['userLikerID'] ?>
                                </li>
                                <li class="list-group-item"><b>[ User Name ] :
                                        <?php echo $userLikesRowIndividualRc['firstName'] . " " . $userLikesRowIndividualRc['lastName'] ?>
                                    </b>
                                </li>
                                <li class="list-group-item">[ Recipe ID ] : <?php echo $userLikesRowIndividualRc['recipeID'] ?>
                                </li>
                                <li class="list-group-item">[ Recipe Title ] :
                                    <?php echo $userLikesRowIndividualRc['recipeTitle'] ?></li>
                                <li class="list-group-item">[ Liked At ] : <?php echo $userLikesRowIndividualRc['likedAt'] ?>
                                </li>
                            </ul>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>



        <!-- #7 USER - LIST VIEW FOR USER LIKE ACTIVITY (GALLERY POSTS)-->
        <hr style="border: 2px solid #000; margin: 20px auto;">
        <h1 class="text-center mb-4">#7 Jennie Kim - LIKE ACTIVITY (GALLERY POSTS)</h1>

        <div class="container">
            <div class="row">

                <?php
                if (mysqli_num_rows($resultUserLikesGpIndividual) > 0) {
                    while ($userLikesRowIndividualGp = mysqli_fetch_assoc($resultUserLikesGpIndividual)) {
                        ?>
                        <div class="col">
                            <ul class="list-group" style="width: 18rem; margin-bottom: 40px;">
                                <li class="list-group-item list-group-item-success" aria-current="true">[ Like ID ] :
                                    <?php echo $userLikesRowIndividualGp['likeID'] ?>
                                </li>
                                <li class="list-group-item">[ User ID ] : <?php echo $userLikesRowIndividualGp['userLikerID'] ?>
                                </li>
                                <li class="list-group-item"><b>[ User Name ] :
                                        <?php echo $userLikesRowIndividualGp['firstName'] . " " . $userLikesRowIndividualGp['lastName'] ?>
                                    </b>
                                </li>
                                <li class="list-group-item">[ Post ID ] : <?php echo $userLikesRowIndividualGp['postID'] ?></li>
                                <li class="list-group-item">[ Post Caption ] :
                                    <?php echo $userLikesRowIndividualGp['caption'] ?></li>
                                <li class="list-group-item">[ Liked At ] : <?php echo $userLikesRowIndividualGp['likedAt'] ?>
                                </li>
                            </ul>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>




    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>