<h1><?= $title; ?></h1>
<table>
    <tr>
        <th>id</th>
        <th>title</th>
        <th>ссылка</th>
    </tr>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['id']; ?></td>
            <td><?= $product['title']; ?></td>
            <td><a href="/products/<?= $product['id']; ?>/">ссылка на страницу</td>
        </tr>
    <?php endforeach; ?>
</table>