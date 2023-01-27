<?php
require_once("../includes/config.php");
require_once(ROOT_PATH . "/includes/controllers/search.php");
require_once(ROOT_PATH . "/includes/partials/header.php");
?>
<main>
    <section class="search">
        <img class="banner-img" src="<?php echo BASE_URL; ?>resources/images/travel-destination-liechtenstein-tourism-mockup-with-travel-equipment-world-map_292608-4201.jpg" alt="hand-drawn-travel-background_52683-85109" />
        <div class="search-bar">
            <form action="<?php echo BASE_URL ?>pages/search.php" method="GET">
                <input type="text" placeholder="Bestemming" id="destination" name="destination" />
                <input type="text" placeholder="Luchthaven" id="airport" name="airport" />
                <input type="submit" value="Zoeken" id="search" name="submit" />
            </form>
        </div>
    </section>
    <section class="results">
        <?php
        if (!empty($accommodations))
            foreach ($accommodations as $accommodation) :
        ?>

            <div class="result-card">
                <img loading="lazy" src="<?php echo BASE_URL; ?>resources/images/accommodations/<?php echo $accommodation['image'] ?>" alt="Thumbnail" />
                <div class="result-card-info">
                    <div class="card-title">
                        <div>
                            <h3><?php echo $accommodation['name'] ?></h3>
                            <p><?php echo $accommodation['country'] . ' ' . $accommodation['city'] ?></p>
                            <p><?php echo $accommodation['address'] ?></p>
                        </div>
                        <div class="rating">
                            <?php
                            for ($i = 0; $i < $accommodation['rating']; $i++) {
                                echo '<i class="material-symbols-outlined filled">star</i>';
                            };

                            for ($i = 0; $i < 5 - $accommodation['rating']; $i++) {
                                echo '<i class="material-symbols-outlined">star</i>';
                            };
                            ?>
                        </div>
                    </div>
                    <div class="card-description">
                        <div class="price">
                            <h2>Vanaf Prijs</h2>
                            <p>&euro;<?php echo $accommodation['price'] ?></p>
                        </div>
                        <a href="<?php echo BASE_URL; ?>pages/accommodation.php?accommodation=<?php echo $accommodation['id']; ?>">
                            <button>Bekijk</button>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach;
        else {
            echo '<h2>Geen resultaten gevonden</h2>';
        } ?>
    </section>

</main>
<?php require_once(ROOT_PATH . "includes/partials/footer.php"); ?>