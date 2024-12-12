<?php
require_once "Product.php";

$product = new Product();

if (!isset($_GET['id'])) {
    echo("Product ID is nodig.");
    exit;
}

$id = $_GET['id'];

$huidigProduct = $product->getProductById($id);
if (!$huidigProduct) {
    echo("Product niet gevonden.");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productNaam = $_POST['productNaam'] ?? '';
    $omschrijving = $_POST['omschrijving'] ?? '';
    $prijsPerStuk = $_POST['prijsPerStuk'] ?? '';

    $product->updateProducts($id, $productNaam, $omschrijving, $prijsPerStuk);

    echo "Product succesvol geupdated.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wijzig product</title>
</head>
<body>
  <h1>Wijzig product</h1>
  <form action="" method="post">
    <label for="productNaam">Productnaam:</label>
    <input type="text" id="productNaam" name="productNaam" value="<?php echo htmlspecialchars($huidigProduct['productNaam']); ?>" required><br><br>

    <label for="omschrijving">Omschrijving:</label>
    <textarea id="omschrijving" name="omschrijving" required><?php echo htmlspecialchars($huidigProduct['omschrijving']); ?></textarea><br><br>

    <label for="prijsPerStuk">Prijs per stuk:</label>
    <input type="number" step="0.01" id="prijsPerStuk" name="prijsPerStuk" value="<?php echo htmlspecialchars($huidigProduct['prijsPerStuk']); ?>" required><br><br>

    <button type="submit">Opslaan</button>
  </form>
</body>
</html>
