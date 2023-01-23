<?php
require_once("../includes/config.php");
include(ROOT_PATH . "/includes/header.php");
require_once(ROOT_PATH . "/includes/functions/get_accommodation.php");

if (!isset($_GET['accommodation'])) {
    header("Location: " . BASE_URL . "pages/search.php");
} else {
    $accommodationId = $_GET['accommodation'];
}

$accommodation = getAccommodation($accommodationId);
if (!$accommodation) {
    header("Location: " . BASE_URL . "pages/search.php");
}
?>

<main>
    <div class="accommodation">
        <div class="accommodation-images">
            <div class="slider-container">
                <?php foreach ($accommodation['images'] as $image) : ?>
                    <div class="slide fade">
                        <img src="<?php echo BASE_URL ?>resources/images/accommodations/<?php echo $image ?>" alt="">
                    </div>
                <?php endforeach; ?>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

            </div>
            <!-- The dots -->
            <div style="text-align:center">
                <?php for ($i = 1; $i <= count($accommodation['images']); $i++) : ?>
                    <span class="dot" onclick="currentSlide(<?php echo $i ?>)"></span>
                <?php endfor; ?>
            </div>
        </div>
        <div class="accommodation-info">
            <div class="accommodation-location">
                <h2><?php echo $accommodation['name'] ?></h2>
                <p><?php echo $accommodation['country'] . ", " . $accommodation['city'] ?></p>
                <p><?php echo $accommodation['address'] ?></p>
            </div>
            <div class="price">
                <h3>Vanaf Prijs</h3>
                <p>&euro;<?php echo $accommodation['price'] ?></p>
                <button>Boek nu</button>
            </div>
        </div>
    </div>

    <div class="accommodation-description">
        <h3>Beschrijving</h3>
        <p><?php echo $accommodation['description'] ?></p>
    </div>

    <div class="accommodation-reviews">
        <?php foreach ($accommodation['reviews'] as $review) : ?>

            <div class="review">
                <div class="review-info">
                    <div class="rating">
                        <?php for ($i = 0; $i < $review['rating']; $i++) : ?>
                            <i class="material-symbols-outlined filled">star</i>
                        <?php endfor; ?>
                        <?php for ($i = 0; $i < 5 - $review['rating']; $i++) : ?>
                            <i class="material-symbols-outlined">star</i>
                        <?php endfor; ?>
                    </div>
                    <div class="person-info">
                        <h3><?php echo $review['user'] ?></h3>
                    </div>
                </div>
                <div class="review-description">
                    <p><?php echo $review['review'] ?></p>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</main>