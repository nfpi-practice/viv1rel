<table>
    <?php foreach ($products as $product) {
        echo '<tr>';
        foreach ($product as $key => $value) {
            echo '<td>' . $value . '</td>';
        }
        echo '</tr>';
    } ?>
</table>