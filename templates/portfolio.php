<form>
    <div>
        <ul class="nav nav-pills">
            <li><a href="quote.php">Get Quote</a></li>
            <li><a href="buy.php">Buy Shares</a></li>
            <li><a href="sell.php">Sell Shares</a></li>
            <li><a href="history.php">My History</a></li>
            <li><a href="deposit.php">Deposit</a></li>
            <li><a href="logout.php"><strong>Log Out</strong></a></li>
        </ul>
    </div>
    <fieldset>
        <div class="panel panel-default">
        <div class="panel-heading">Your current portfolio</div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Symbol</th>
                        <th>Name</th>
                        <th>Shares</th>
                        <th>Price</th>
                        <th>TOTAL</th>
                    </tr>
                    </thead>
                <tbody>
                    <?php foreach ($positions as $position): ?>
                        <tr>
                            <td><?= $position["symbol"] ?></td>
                            <td><?= $position["name"] ?></td>
                            <td><?= $position["shares"] ?></td>
                            <td><?= $position["price"] ?></td>
                            <td><?= $position["total"] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
             </table>
        </div>
        </div>
    </fieldset>
    <div>    
        <p id="p1">Your current cash balance: <strong><?= $cash ?></strong></p>
    </div>
</form> 
 
<div id = "nav">
        <a href="logout.php">Log Out</a>
</div>
    
