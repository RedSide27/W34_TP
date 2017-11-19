<div class="container" style="margin-top: 100px">
    <div class="box">
        <div class="center gap">
            <div class="container">
                <h2>Panier</h2>
                <table class="table">
                    <tbody>
                    <tr>
                        <td>Type de Pack</td>
                        <td>Prix</td>
                        <td>Quantité</td>
                        <td></td>
                    </tr>
<?php
$mysqli = new mysqli('localhost','root','','minewatch');
for ($i=0; $i < count($_SESSION["cart"]); $i++) {
    $parts = explode(";", $_SESSION["cart"][$i]);

    $query = "SELECT * FROM pack_skin WHERE PACK_ID ='{$parts[0]}'";
//    echo $query;
    $result = $mysqli->query($query);


    while ($row = $result->fetch_assoc()) {
//$total = $parts[1] * $row["MSRP"];
        ?>

        <!--  -->
        <tr class="success">
            <td><?= $row["Pack_Name"] ?></td> <!-- Nom du Pack -->
            <td><?= $row["Pack_Price"] ?></td> <!-- Prix -->
            <td><input style="width: 70px;" max="10" min="1" value="<?=$parts[1]?>" class="form-control col-md-offset-5" type="number"></td>
            <td><a href="index.php?page=cart&delete=<?=$i?>" class="glyphicon glyphicon-remove alert-danger"></a></td>
        </tr>

        <?php
    }
}
?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
