<?php
require_once(__DIR__ . "/includes/config.php");
include(ROOT_PATH . "/includes/header.php");
?>
<main>
  <section class="search">
    <img class="banner-img" src="<?php echo BASE_URL; ?>resources/images/hand-drawn-travel-background_52683-85109.webp" alt="hand-drawn-travel-background_52683-85109" />
    <div class="search-bar">
      <form action="#" method="GET">
        <input type="text" placeholder="Bestemming" id="destination" />
        <input type="date" placeholder="Vertrekdatum" id="date" />
        <input type="text" placeholder="Luchthaven" id="airport" />
        <input type="submit" value="Zoeken" id="search" />
      </form>
    </div>
  </section>
  <section class="top-3">
    <h1 class="top-3-title">Top 3 bestemmingen</h1>
    <div class="top-3-items">
      <div class="top-3-item">
        <img src="<?php echo BASE_URL; ?>resources/images/cote-d-azur-cntraveller-26july13-martin-morrell_27.webp" alt="cote-d-azur-cntraveller-26july13-martin-morrell_27" />
        <h2 class="top-3-item-title">Frankrijk</h2>
      </div>
      <div class="top-3-item">
        <img src="<?php echo BASE_URL; ?>resources/images/cote-d-azur-cntraveller-26july13-martin-morrell_27.webp" alt="cote-d-azur-cntraveller-26july13-martin-morrell_27" />
        <h2 class="top-3-item-title">Frankrijk</h2>
      </div>
      <div class="top-3-item">
        <img src="<?php echo BASE_URL; ?>resources/images/cote-d-azur-cntraveller-26july13-martin-morrell_27.webp" alt="cote-d-azur-cntraveller-26july13-martin-morrell_27" />
        <h2 class="top-3-item-title">Frankrijk</h2>
      </div>
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
      <div class="top-6-item">
        <img src="<?php echo BASE_URL; ?>resources/images/cote-d-azur-cntraveller-26july13-martin-morrell_27.webp" alt="cote-d-azur-cntraveller-26july13-martin-morrell_27" />
        <div class="top-6-item-info">
          <div class="card-title">
            <h3>Camping Leï Suves</h3>
            <p>Frankrijk Cote d'Azur</p>
          </div>
          <div class="card-description">
            <div class="rating">
              <i class="material-symbols-outlined filled">star</i>
              <i class="material-symbols-outlined filled">star</i>
              <i class="material-symbols-outlined filled">star</i>
              <i class="material-symbols-outlined filled">star</i>
              <i class="material-symbols-outlined">star</i>
            </div>
            <div class="price">
              <p>Vanafprijs</p>
              <h4>€ 999</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="top-6-item">
        <img src="<?php echo BASE_URL; ?>resources/images/cote-d-azur-cntraveller-26july13-martin-morrell_27.webp" alt="cote-d-azur-cntraveller-26july13-martin-morrell_27" />
        <div class="top-6-item-info">
          <div class="card-title">
            <h3>Camping Leï Suves</h3>
            <p>Frankrijk Cote d'Azur</p>
          </div>
          <div class="card-description">
            <div class="rating">
              <i class="material-symbols-outlined filled">star</i>
              <i class="material-symbols-outlined filled">star</i>
              <i class="material-symbols-outlined filled">star</i>
              <i class="material-symbols-outlined filled">star</i>
              <i class="material-symbols-outlined">star</i>
            </div>
            <div class="price">
              <p>Vanafprijs</p>
              <h4>€ 999</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="top-6-item">
        <img src="<?php echo BASE_URL; ?>resources/images/cote-d-azur-cntraveller-26july13-martin-morrell_27.webp" alt="cote-d-azur-cntraveller-26july13-martin-morrell_27" />
        <div class="top-6-item-info">
          <div class="card-title">
            <h3>Camping Leï Suves</h3>
            <p>Frankrijk Cote d'Azur</p>
          </div>
          <div class="card-description">
            <div class="rating">
              <i class="material-symbols-outlined filled">star</i>
              <i class="material-symbols-outlined filled">star</i>
              <i class="material-symbols-outlined filled">star</i>
              <i class="material-symbols-outlined filled">star</i>
              <i class="material-symbols-outlined">star</i>
            </div>
            <div class="price">
              <p>Vanafprijs</p>
              <h4>€ 999</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="top-6-item">
        <img src="<?php echo BASE_URL; ?>resources/images/cote-d-azur-cntraveller-26july13-martin-morrell_27.webp" alt="cote-d-azur-cntraveller-26july13-martin-morrell_27" />
        <div class="top-6-item-info">
          <div class="card-title">
            <h3>Camping Leï Suves</h3>
            <p>Frankrijk Cote d'Azur</p>
          </div>
          <div class="card-description">
            <div class="rating">
              <i class="material-symbols-outlined filled">star</i>
              <i class="material-symbols-outlined filled">star</i>
              <i class="material-symbols-outlined filled">star</i>
              <i class="material-symbols-outlined filled">star</i>
              <i class="material-symbols-outlined">star</i>
            </div>
            <div class="price">
              <p>Vanafprijs</p>
              <h4>€ 999</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="top-6-item">
        <img src="<?php echo BASE_URL; ?>resources/images/cote-d-azur-cntraveller-26july13-martin-morrell_27.webp" alt="cote-d-azur-cntraveller-26july13-martin-morrell_27" />
        <div class="top-6-item-info">
          <div class="card-title">
            <h3>Camping Leï Suves</h3>
            <p>Frankrijk Cote d'Azur</p>
          </div>
          <div class="card-description">
            <div class="rating">
              <i class="material-symbols-outlined filled">star</i>
              <i class="material-symbols-outlined filled">star</i>
              <i class="material-symbols-outlined filled">star</i>
              <i class="material-symbols-outlined filled">star</i>
              <i class="material-symbols-outlined">star</i>
            </div>
            <div class="price">
              <p>Vanafprijs</p>
              <h4>€ 999</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="top-6-item">
        <img src="<?php echo BASE_URL; ?>resources/images/cote-d-azur-cntraveller-26july13-martin-morrell_27.webp" alt="cote-d-azur-cntraveller-26july13-martin-morrell_27" />
        <div class="top-6-item-info">
          <div class="card-title">
            <h3>Camping Leï Suves</h3>
            <p>Frankrijk Cote d'Azur</p>
          </div>
          <div class="card-description">
            <div class="rating">
              <i class="material-symbols-outlined filled">star</i>
              <i class="material-symbols-outlined filled">star</i>
              <i class="material-symbols-outlined filled">star</i>
              <i class="material-symbols-outlined filled">star</i>
              <i class="material-symbols-outlined">star</i>
            </div>
            <div class="price">
              <p>Vanafprijs</p>
              <h4>€ 999</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php include(ROOT_PATH . "includes/footer.php"); ?>