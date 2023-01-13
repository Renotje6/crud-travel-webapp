<?php
require_once(__DIR__ . "/includes/config.php");
require(ROOT_PATH . "/includes/functions/homepage.php");
include(ROOT_PATH . "/includes/header.php");
include(ROOT_PATH . "/includes/connection.php")
?>
<main>
  <section class="search">
    <img class="banner-img" src="<?php echo BASE_URL; ?>resources/images/hand-drawn-travel-background_52683-85109.webp" alt="hand-drawn-travel-background_52683-85109" />
    <div class="search-bar">
      <form action="<?php echo BASE_URL ?>pages/searchPage.php" method="GET">

        <input type="text" placeholder="Bestemming" id="destination" name="destination" />
        <input type="text" placeholder="Luchthaven" id="airport" name="airport" />
        <input type="submit" value="Zoeken" id="search" name="submit" />

      </form>
    </div>
  </section>
  <section class="top-3">
    <h1 class="top-3-title">Top 3 landen</h1>
    <div class="top-3-items">

      <?php $results = getTop3Locations();
      foreach ($results as $result) : ?>
        <a href="<?php echo BASE_URL ?>pages/searchPage.php?destination=<?php echo $result['country'] ?>">
          <div class="top-3-item">
            <img src="<?php echo BASE_URL; ?>resources/images/cote-d-azur-cntraveller-26july13-martin-morrell_27.webp" alt="cote-d-azur-cntraveller-26july13-martin-morrell_27" />
            <h2 class="top-3-item-title"><?php echo $result['country']; ?></h2>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </section>
  <section class="warranties">
    <h3 class="warranties-title">Ga onbezorgd op reis</h3>
    <div class="wrapper">
      <div class="warranty">
        <i class="material-symbols-outlined" id="verified-user">verified_user</i>
        <p>Annuleringsverzekering inbegrepen</p>
      </div>
      <div class="warranty">
        <i class="material-symbols-outlined" id="contact-support">contact_support</i>
        <p>
          Vragen? <br />
          Stel ze gerust!
        </p>
      </div>
      <div class="warranty">
        <i class="material-symbols-outlined" id="back-hand">back_hand</i>
        <p>Zorgvuldig geselecteerd</p>
      </div>
    </div>
  </section>
  <section class="top-6">
    <h1 class="top-6-title">Top 6 accomodaties</h1>
    <div class="top-6-items">
      <?php
      $results = getTop6();
      foreach ($results as $result) :
      ?>
        <a href="<?php echo BASE_URL ?>pages/searchPage.php?destination=<?php echo $result['name'] ?>">
          <div class="top-6-item">
            <img src="<?php echo BASE_URL; ?>resources/images/accommodations/<?php echo $result['image'] ?>" alt="thumbnail" />
            <div class="top-6-item-info">
              <div class="card-title">
                <h3><?php echo $result['name'] ?></h3>
                <p><?php echo $result['country'] . ' ' . $result['city'] ?></p>
                <p><?php echo $result['address'] ?></p>
              </div>
              <div class="card-description">
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
                <div class="price">
                  <p>Vanaf</p>
                  <h4>&euro;<?php echo $result['price'] ?></h4>
                </div>
              </div>
            </div>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </section>
</main>
<?php include(ROOT_PATH . "includes/footer.php"); ?>