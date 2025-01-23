<?php
include("galleryButtons.php");

class GalleryPost
{
    public $postID;
    public $caption;
    public $firstName;
    public $lastName;
    public $isApproved;
    public $createdAt;
    public $updatedAt;
    public $primaryCategoryName;
    public $subcategoryName;
    public $images;
    public $likeCount;
    public $bookmarkCount;

    public function __construct($postID, $caption, $firstName, $lastName, $isApproved, $createdAt, $updatedAt, $primaryCategoryName, $subcategoryName, $images, $likeCount, $bookmarkCount)
    {
        $this->postID = $postID;
        $this->caption = $caption;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->isApproved = $isApproved;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->primaryCategoryName = $primaryCategoryName;
        $this->subcategoryName = $subcategoryName;
        $this->images = $images;
        $this->likeCount = $likeCount;
        $this->bookmarkCount = $bookmarkCount;
    }

    public function buildGalleryCard()
    {

        // Now you can pass the userID to the buttons
        $carouselID = "carousel-" . $this->postID;
        $carouselItems = "";
        $controls = "";

        foreach ($this->images as $index => $imageURL) {
            $activeClass = $index === 0 ? "active" : "";
            $carouselItems .= "
                <div class='carousel-item $activeClass'>
                    <img src='shared/assets/image/content-image/{$imageURL}' class='d-block w-100' alt='Gallery Image'>
                </div>
            ";
        }

        // Only display controls if there is more than one image
        if (count($this->images) > 1) {
            $controls = "
                <button class='carousel-control-prev' type='button' data-bs-target='#{$carouselID}' data-bs-slide='prev'>
                    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                    <span class='visually-hidden'>Previous</span>
                </button>
                <button class='carousel-control-next' type='button' data-bs-target='#{$carouselID}' data-bs-slide='next'>
                    <span class='carousel-control-next-icon' aria-hidden='true'></span>
                    <span class='visually-hidden'>Next</span>
                </button>
            ";
        }

        // Build the image content
        $imageContent = "
            <div id='{$carouselID}' class='carousel slide' data-bs-ride='carousel'>
                <div class='carousel-inner'>
                    {$carouselItems}
                </div>
                {$controls}
            </div>
        ";


        $tagsContent = "
            <div class='col mt-3 mb-3' style='d-flex:0;'>
                <span class='primaryCategory'>{$this->primaryCategoryName}</span>
                <span class='subcategory'><span>{$this->subcategoryName}</span>
            </div>  
        ";

        $userID = $_SESSION['userID'];

        $cardContent = "
            <div class='col-12 d-flex align-items-center justify-content-center mt-5 mb-5'>
                <div class='card shadow'>
                    <div class='d-flex justify-content-between align-items-center' style='padding-right: 16px'>
                        <div class='name fw-bold'>{$this->firstName} {$this->lastName}</div>
                    </div>
                    <div class='datetime d-flex justify-content-between align-items-center mb-3'>{$this->createdAt}</div>
                    <div class='img-fluid img-post'>
                        {$imageContent}
                    </div>
                    <div class='container mx-3 tags d-flex'>
                        {$tagsContent}
                    </div>
                    <div class='caption mx-5 my-2'>
                        <p>{$this->caption}</p>
                    </div>
                    <div class='d-flex justify-content-between w-100'>
                        <div class='btn-lbsr d-flex mt-3 mb-5'>
                            " . buildLikeButton($this->postID, $userID) . "
                            " . buildBookmarkButton($this->postID, $userID) . "
                        </div>
                        <button class='btn btn-report report-btn d-flex mt-3 mx-5' data-bs-toggle='modal' data-bs-target='#reportModal'>
                            <i class='bi bi-flag' style='color: var(--clr-light-orange)'></i>
                        </button>
                    </div>
                </div>
            </div>
        ";

        echo $cardContent;
    }
}
?>