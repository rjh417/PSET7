<form action="sell.php" method="post">
   <div>
    <ul class="nav nav-pills">
        <li><a href="index.php">My Portfolio</a></li>
        <li><a href="index.php">Get Quote</a></li>
        <li><a href="buy.php">Buy Shares</a></li>
        <li><a href="history.php">My History</a></li>
        <li><a href="deposit.php">Deposit</a></li>
        <li><a href="logout.php"><strong>Log Out</strong></a></li>
    </ul>
    </div> 
    <fieldset>
        <div class="form-group">
            <select name="symbol">
                <option value=''> </option>
                <?php
                    foreach($positions as $position)
                    {
                        echo("<option value='{$position["symbol"]}'>{$position["symbol"]}</option>\n");
                    }                       
                ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default"><strong>Sell Shares</strong></button>
        </div>
    </fieldset>
</form>
<div>
    <a href="javascript:history.go(-1);">Back</a> 
</div> 

