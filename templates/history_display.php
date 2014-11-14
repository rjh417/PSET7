<form>
    <div>
        <ul class="nav nav-pills">
            <li><a href="index.php">My Portfolio</a></li>
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
        <div class="panel-heading">Your transaction history</div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Transaction</th>
                        <th>Date/Time</th>
                        <th>Symbol</th>
                        <th>Shares</th>
                        <th>Price</th>
                     </tr>
                </thead>
                <tbody>
                      <?php foreach ($trades as $trade): ?>
                        <tr>
                            <td><?= $trade["transaction"] ?></td>
                            <td><?= $trade["datetime"] ?></td>
                            <td><?= $trade["symbol"] ?></td>
                            <td><?= $trade["shares"] ?></td>
                            <td><?= $trade["price"] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        </div>
    </fieldset>
</form>

<div>
    <a href="javascript:history.go(-1);">Back</a> 
</div>  
