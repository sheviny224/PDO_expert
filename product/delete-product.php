<?php
require_once 'Product.php';


if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']); 

    $product = new Product();

 
    if ($product->deleteProduct($product_id)) {
        $message = "Product succesvol verwijderd.";
    } else {
        $message = "Product kon niet worden verwijderd of bestaat niet.";
    }
} else {
    $message = "Geen product-ID opgegeven.";
}

header("Location: view-product.php?message=" . urlencode($message));
exit();
?>