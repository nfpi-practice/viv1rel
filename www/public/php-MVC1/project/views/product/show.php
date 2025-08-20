<h1>Продукт <?php echo $value["name"]; ?> из категории <?php echo $value["category"]; ?></h1>
<p>
    Цена: <?php echo $value["price"]; ?>$, количество: <?php echo $value["quantity"]; ?>
</p>
<p>
    Стоимость (цена * количество): <?php echo $value["price"] * $value["quantity"]; ?>$
</p>