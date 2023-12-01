<?php
require_once('../controllers/category-controller.php');
$result = new CategoryController();
$data = $result->getData();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the selected category from the form
    $selectedCategory = isset($_POST['category']) ? $_POST['category'] : null;

    // Get products in the selected category
    $products = $result->getProductsInCategory($selectedCategory);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="../assets/css/style.css">

        <title>Products</title>
    </head>
<body id="body-pd"> 
    <header class="header" id="header">
        <div class="header__toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
        <div class="header__img">
            <img decoding="async" src="../assets/img/default-avatar.png">
        </div>
    </header> 

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="index.php" class="nav__logo">
                    <i class='bx bx-layer nav__logo-icon'></i>
                    <span class="nav__logo-name">Product items</span>
                </a>
                    <hr></hr>
                <div class="nav__list">
                    <a href="products-in-category.php" class="nav__link active">
                        <i class='bx bx-grid nav__icon' ></i>
                        <span class="nav__name">Choose Category</span>
                     </a>
                    <a href="product-existence.php" class="nav__link">
                        <i class='bx bx-user nav__icon'></i>
                        <span class="nav__name">Find Products</span>
                     </a>
                </div>
            </div>
        </nav>
    </div>

<h3>Products by Category</h3>
<div class="search-box">
 <!-- Dropdown menu for categories -->
 <form method="post" name = "categoryForm" onsubmit="return validateCategory()">
    <label for="category" class = "label" >Select a category:</label>
    <select name="category" id="category" class="search-field">
        <option value="">-- Select a category --</option>
        <?php foreach ($data as $category): ?>
            <option value="<?php echo $category->name ?>"><?php echo $category->name ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" class="button">Search</button>
 </form>

  <!-- Display products in the selected category -->
<?php if (isset($products)): ?>
    <h4>Products in the selected category: <?php echo $selectedCategory; ?></h4>
    <table border="1">
        <thead>
            <tr>
                <th>Product(s) in <?php echo $selectedCategory; ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product->name; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
</div>

        <!--===== SCRIPT JS =====-->
        <script src="../assets/javascript/script.js"></script> 
        <script src="../assets/javascript/category.js"></script>
    </body>
</html>

