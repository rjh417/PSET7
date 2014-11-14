<form action="quote.php" method="post">
    <div>
    <ul class="nav nav-pills">
        <li><a href="index.php">My Portfolio</a></li>
        <li><a href="buy.php">Buy Shares</a></li>
        <li><a href="sell.php">Sell Shares</a></li>
        <li><a href="history.php">My History</a></li>
        <li><a href="logout.php"><strong>Log Out</strong></a></li>
    </ul>
    </div>
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="symbol" placeholder="Enter Stock Symbol" type="text"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default"><strong>Get Quote</strong></button>
        </div>
    </fieldset>
</form>
<div>
        <a href="javascript:history.go(-1);">Back</a> 
</div>  



