<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anon - eCommerce Website</title>

    <link rel="shortcut icon" href="./assets/images/logo/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/style-prefix.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

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
                    <img src="./assets/images/logo/logo.svg" alt="Anon's logo" width="120" height="36">
                </a>
                <div class="header-search-container">
                    <input type="search" name="search" class="search-field" placeholder="Enter your product name...">
                    <button class="search-btn">
                        <ion-icon name="search-outline"></ion-icon>
                    </button>
                </div>
                <div class="header-user-actions">
                    <button class="action-btn">
                        <a href="panier.php" style="color: black;" onmouseover="this.style.color='hsl(353, 100%, 78%)';" onmouseout="this.style.color='black';">
                            <ion-icon name="bag-handle-outline"></ion-icon>
                        </a>
                        <span class="count">
                            <?php echo isset($_SESSION['anon']) ? array_sum($_SESSION['anon']) : 0; ?>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="desktop-navigation-menu">
            <div class="container">
                <ul class="desktop-menu-category-list">
                    <li class="menu-category">
                        <a href="index.php" class="menu-title" style="color: hsl(353, 100%, 78%);">Boutique</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="product-container">
            <div class="container">
                <div class="product-main">
                    <h1 class="title">C'est l'intérieur du frigo qui est glacé, sinon son derrière est chaud 🤣🤣. Merci beaucoup.</h1>
                    <h2 class="title">Nouveaux produits</h2>
                    <div class="product-grid">
                        <?php
                        include_once "con_dbb.php";
                        $req = mysqli_query($con, "SELECT * FROM products");
                        while ($row = mysqli_fetch_assoc($req)) {
                        ?>
                        <div class="showcase">
                            <div class="showcase-banner">
                                <img src="./assets/images/products/<?= $row['img'] ?>" alt="Product" width="300" class="product-img default">
                                <img src="./assets/images/products/<?= $row['img2'] ?>" alt="Product" width="300" class="product-img hover">
                                <div class="showcase-actions">
                                    <button class="btn-action">
                                        <a class="delete-link" href="add.php?id=<?= $row['id'] ?>">
                                            <ion-icon name="bag-add-outline"></ion-icon>
                                        </a>
                                    </button>
                                </div>
                            </div>
                            <div class="showcase-content">
                                <h3 class="showcase-title"><?= $row['name'] ?></h3>
                                <div class="price-box">
                                    <p class="price"><?= $row['price'] ?> XOF</p>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer style="margin-top: 100%">
        <div class="footer-bottom">
            <div class="container">
                <p class="copyright">
                    Copyright &copy; <a href="#">Anon</a> tous droits réservés.
                </p>
            </div>
        </div>
    </footer>

    <script src="./assets/js/script.js" defer></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
