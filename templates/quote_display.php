<form>
    <div>
    <ul class="nav nav-pills">
        <li><a href="index.php">My Portfolio</a></li>
        <li><a href="quote.php">Get Quote</a></li>
        <li><a href="buy.php">Buy Shares</a></li>
        <li><a href="sell.php">Sell Shares</a></li>
        <li><a href="history.php">My History</a></li>
        <li><a href="logout.php"><strong>Log Out</strong></a></li>
    </ul>
    </div
    <div>
        <p id = "p3"> One share of <?=$_POST["name"]?> (<?= $_POST["symbol"]?>) will set you back 
            <strong>$<?=number_format($_POST["price"], 2)?></strong></p>
    </div>
</form>
<div>
    <a href="javascript:history.go(-1);">Back</a> 
</div>  

