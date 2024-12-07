<?php
require_once "../product/Product.php";

$productClass = new Product();
$producten = $productClass->getAllProducts();
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            border: none;
            cursor: pointer;
        }

        .edit-knop {
            background-color: #4CAF50;
        }

        .delete-knop {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <h1>Productoverzicht</h1>
    
    <?php if (!empty($producten)): ?>
        <table>
            <thead>
                <tr>
                    <th>ProductNaam</th>
                    <th>Omschrijving</th>
                    <th>Prijs Per Stuk</th>
                    <th>Foto</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($producten as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['productNaam']) ?></td>
                        <td><?= htmlspecialchars($product['omschrijving']) ?></td>
                        <td>&euro;<?= number_format($product['prijsPerStuk'], 2, ',', '.') ?></td>
                        <td>
                            <img src="<?= htmlspecialchars($product['foto']) ?>" alt="Productfoto" style="width: 100px;">
                        </td>
                        <td>
                            <div class="actions">
                                
                                <a class=" btn edit-knop" href="edit-product.php?id=<?= htmlspecialchars($product['product_id']) ?>">Bewerkn</a>
                                
                                
                                <a class=" btn delete-knop" href="delete-product.php?id=<?= htmlspecialchars($product['product_id']) ?>" 
                                   onclick="return confirm('Weet je zeker dat je dit product wilt verwijderen?');">Verwijderen</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Geen producten gevonden.</p>
    <?php endif; ?>
</body>
</html>
