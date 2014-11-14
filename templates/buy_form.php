<form action="buy.php" method="post">
    <div>
    <ul class="nav nav-pills">
        <li><a href="index.php">My Portfolio</a></li>
        <li><a href="quote.php">Get Quote</a></li>
        <li><a href="sell.php">Sell Shares</a></li>
        <li><a href="history.php">My History</a></li>
        <li><a href="deposit.php">Deposit</a></li>
        <li><a href="logout.php"><strong>Log Out</strong></a></li>
    </ul>
    </div>
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="symbol" placeholder="Symbol" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="shares" placeholder="Shares" type="text"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default"><strong>Buy Shares</strong></button>
        </div>
    </fieldset>
</form>
<div>
    <a href="javascript:history.go(-1);">Back</a>   
</div>
