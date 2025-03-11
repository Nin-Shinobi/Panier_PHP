<?php 
   session_start();
   include_once "con_dbb.php";

   //supprimer les produits
   //si la variable del existe
   if(isset($_GET['del'])){
    $id_del = $_GET['del'] ;
    //suppression
    unset($_SESSION['anon'][$id_del]);
   }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Anon - eCommerce Website</title>

    <link
      rel="shortcut icon"
      href="./assets/images/logo/favicon.ico"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="./assets/css/style-prefix.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <style>
      .delete-link {
        color: black;
    }
      .delete-link:hover {
        color: white;
    }
    </style>
  </head>

  <body>
    <header>
      <div class="header-main">
        <div class="container">
          <a href="index.php" class="header-logo">
            <img
              src="./assets/images/logo/logo.svg"
              alt="Anon's logo"
              width="120"
              height="36"
            />
          </a>

          <div class="header-search-container">
            <input
              type="search"
              name="search"
              class="search-field"
              placeholder="Enter your product name..."
            />
            <button class="search-btn">
              <ion-icon name="search-outline"></ion-icon>
            </button>
          </div>

          <div class="header-user-actions">
            <button class="action-btn">
              <a href="panier.php" style="color: hsl(353, 100%, 78%)">
                <ion-icon name="bag-handle-outline"></ion-icon>
              </a>
              <span class="count"><?php echo array_sum($_SESSION['anon']); ?></span>
            </button>
          </div>
        </div>
      </div>

      <nav class="desktop-navigation-menu">
        <div class="container">
          <ul class="desktop-menu-category-list">
            <li class="menu-category">
              <a href="index.php" class="menu-title">Boutique</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <main>
      <div class="product-container">
        <div class="container">
          <div class="product-main">
            <h2 class="title">Panier</h2>
            <div class="product-grid">
            <?php 
              $total = 0 ;
              // liste des produits
              //récupérer les clés du tableau session
              $ids = array_keys($_SESSION['anon']);
              //s'il n'y a aucune clé dans le tableau
              if(empty($ids)){
                echo "😢Votre panier est vide";
              }else {
                //si oui 
                $products = mysqli_query($con, "SELECT * FROM products WHERE id IN (".implode(',', $ids).")");

                //lise des produit avec une boucle foreach
                foreach($products as $product):
                    //calculer le total ( prix unitaire * quantité) 
                    //et aditionner chaque résutats a chaque tour de boucle
                    $total = $total + $product['price'] * $_SESSION['anon'][$product['id']] ;
                ?>
              <div class="showcase">
                <div class="showcase-banner">
                <img
                    src="./assets/images/products/<?=$product['img'] ?>"
                    alt="Mens Winter"
                    width="300"
                    class="product-img default"
                  />
                  <img
                    src="./assets/images/products/<?=$product['img2'] ?>"
                    alt="Mens Winter"
                    width="300"
                    class="product-img hover"
                  />
                  <div class="showcase-actions">
                    <button class="btn-action">
                    <a class="delete-link" href="panier.php?del=<?=$product['id']?>"><ion-icon name="trash-outline"></ion-icon></a>
                    </button>
                  </div>
                </div>
                <div class="showcase-content">
                  <div>
                    <h3 class="showcase-title"><?=$product['name']?></h3>
                  </div>

                  <div class="price-box">
                    <p class="price"><?=$product['price']?> XOF</p>
                    <p class="" style="margin-left: 130px"><?=$_SESSION['anon'][$product['id']] // Quantité?></p>
                  </div>
                </div>
              </div>
              <?php endforeach ;} ?>
          </div>
        </div>
      </div>
      <div style="margin-left: 7%; margin-right: 7%; height: 100px;">
        <hr>
        <h2>Total :  <?=$total?> XOF</h2>
      </div>
    </main>
    <script src="./assets/js/script.js" defer></script>
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>
