<script src="js/jquery.js"  type="text/javascript"></script>
<script>

	$( document ).ready(function() {
		calculTotal();
		$('.numberInput').click(function(){
			var sign = $(this).html();
			var currentPrice = $(this).parent().parent().prev().children(0).html();
			if(sign == "-"){
				var currentQty = $(this).next().val();
				currentQty--;
				$(this).next().val(currentQty);
				console.log(currentQty);
			}
			else{
				var currentQty = $(this).prev().val();
				currentQty++;
				$(this).prev().val(currentQty);
				console.log(currentQty);
			}
			var newPrice =  currentPrice * currentQty;
			$(this).parent().parent().next().children(0).html(newPrice.toFixed(2));

			calculTotal();
		})

		function calculTotal(){
			var total = 0;
			var subtotal = 0;
			var taxe = 0;
			$(".cart_total_price").each(function(index){
				subtotal = subtotal + parseFloat($(this).html());
			});
			taxe = subtotal * 0.15;
			total = subtotal + taxe;
			$("#subTotal").html("Sous-Total: " + subtotal.toFixed(2));
			$("#taxeResult").html("Taxe: " + taxe.toFixed(2));
			$("#total").html("Total: " + total.toFixed(2));
		}
	});
</script>

<div class="container" style="margin-top: 100px">
    <div class="box">
        <div class="center gap">
            <div class="container">
                <h2>Panier</h2>
	            <form method="post" action="#">
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
            <td><input style="width: 70px;" max="10" min="1" value="<?=$parts[1]?>" class="form-control col-md-offset-5 NumberInput" type="number"></td>
            <td><a href="index.php?page=cart&delete=<?=$i?>" class="glyphicon glyphicon-remove alert-danger"></a></td>
        </tr>

        <?php
    }
}
?>
                    </tbody>
                </table>
	            <div class="pull-right">
		            <div id="subTotal"></div>
		            <div id="taxeResult"></div>
		            <div id="total"></div>
		            <input type="submit" class="btn btn-primary" value="Commander" name="cmdCommand">
	            </div>
	            </form>
            </div>
        </div>
    </div>
</div>
