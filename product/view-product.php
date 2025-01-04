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
    <title>Productoverzicht</title>
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
            display: inline-block;
        }

        .edit-knop {
            background-color: #4CAF50;
            border-radius: 4px;
        }

        .delete-knop {
            background-color: #f44336;
            border-radius: 4px;
        }

        .delete-knop:hover {
            background-color: #d32f2f;
        }

        .edit-knop:hover {
            background-color: #45a049;
        }

        img {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
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
                            <?php if (!empty($product['foto']) && file_exists($product['foto'])): ?>
                                <img src="<?= htmlspecialchars($product['foto']) ?>" alt="Productfoto">
                            <?php else: ?>
                                <span>Geen foto beschikbaar</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="actions">
                                <!-- Bewerken knop -->
                                <a class="btn edit-knop" href="edit-product.php?id=<?= htmlspecialchars($product['product_id']) ?>">Bewerken</a>
                                
                                <!-- Verwijderen knop -->
                                <a class="btn delete-knop" href="delete-product.php?id=<?= htmlspecialchars($product['product_id']) ?>" 
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
