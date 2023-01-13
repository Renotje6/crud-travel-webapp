<?php
require_once("../includes/config.php");
require(ROOT_PATH . "/includes/functions/searchbar.php");
include(ROOT_PATH . "/includes/header.php");
?>
<main>
    <section class="search">
        <img class="banner-img" src="<?php echo BASE_URL; ?>resources/images/travel-destination-liechtenstein-tourism-mockup-with-travel-equipment-world-map_292608-4201.jpg" alt="hand-drawn-travel-background_52683-85109" />
        <div class="search-bar">
            <form action="#" method="GET">
                <input type="text" placeholder="Bestemming" id="destination" name="destination" />
                <input type="text" placeholder="Luchthaven" id="airport" name="airport" />
                <input type="submit" value="Zoeken" id="search" name="submit" />
            </form>
        </div>
    </section>
    <section class="results">
        <?php
        $results = getResults($_GET);
        if (!empty($results))
            foreach ($results as $result) :
        ?>

            <div class="result-card">
                <img src="<?php echo BASE_URL; ?>resources/images/accommodations/<?php echo $result['image'] ?>" alt="Thumbnail" />
                <div class="result-card-info">
                    <div class="card-title">
                        <div>
                            <h3><?php echo $result['name'] ?></h3>
                            <p><?php echo $result['country'] . ' ' . $result['city'] ?></p>
                            <p><?php echo $result['address'] ?></p>
                        </div>
                        <div class="rating">
                            <?php
                            for ($i = 0; $i < $result['rating']; $i++) {
                                echo '<i class="material-symbols-outlined filled">star</i>';
                            };

                            for ($i = 0; $i < 5 - $result['rating']; $i++) {
                                echo '<i class="material-symbols-outlined">star</i>';
                            };
                            ?>
                        </div>
                    </div>
                    <div class="card-description">
                        <div class="price">
                            <h2>Vanaf Prijs</h2>
                            <p>&euro;<?php echo $result['price'] ?></p>
                        </div>
                        <button>Bekijk</button>
                    </div>
                </div>
            </div>
        <?php endforeach;
        else {
            echo '<h2>Geen resultaten gevonden</h2>';
        } ?>
    </section>

</main>
<?php include(ROOT_PATH . "includes/footer.php"); ?>