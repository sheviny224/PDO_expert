<?php
require_once "../product/Product.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize input
    $productNaam = $_POST['productNaam'] ?? null;
    $omschrijving = $_POST['omschrijving'] ?? null;
    $prijsPerStuk = $_POST['prijsPerStuk'] ?? null;

    $foto = $_FILES['foto'] ?? null;

    if (!$productNaam || !$omschrijving || !$prijsPerStuk || !$foto) {
        echo "Alle velden moeten worden ingevuld.";
        exit;
    }

    // Handle file upload
    if ($foto['error'] === UPLOAD_ERR_OK) {
        $fotoPath = "../uploads/" . basename($foto['name']); // Set upload path
        $fotoSaved = move_uploaded_file($foto['tmp_name'], $fotoPath); // Save file

        if ($fotoSaved) {
            // Insert product
            $product = new Product();
            $success = $product->insertProduct($productNaam, $omschrijving, $prijsPerStuk, $fotoPath);

            if ($success) {
                echo "Product succesvol toegevoegd!";
            } else {
                echo "Er is iets misgegaan bij het toevoegen van het product.";
            }
        } else {
            echo "Upload van foto mislukt. Controleer de maprechten.";
        }
    } else {
        echo "Fout bij het uploaden van de foto: " . $foto['error'];
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Nieuw Product Toevoegen</title>
</head>

<body>
    <h1>Nieuw Product Toevoegen</h1>
    <!-- enctype is nodig voor uploaden van bestanden/files -->
    <form action="insert-product.php" method="POST" enctype="multipart/form-data">
        <label for="productNaam">Productnaam:</label>
        <input type="text" name="productNaam" required><br>

        <label for="omschrijving">Omschrijving:</label>
        <input type="text" name="omschrijving" required><br>

        <label for="prijsPerStuk">Prijs Per Stuk:</label>
        <input type="number" name="prijsPerStuk" required><br>

        <label for="foto">Foto:</label>
        <input type="file" name="foto" required><br>

        <button type="submit">Product Toevoegen</button>
    </form>
</body>

</html>