<?php

// configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission fields are not empty
        if (empty($_POST["symbol"]) || empty($_POST["shares"]))
        {
            apologize("You must enter a stock symbol and number of shares you wish to purchase");
        }
        // validate shares is a positive number
        if (!preg_match("/^\d+$/", $_POST["shares"]))
        {
            apologize("You must provide a valid number of shares to purchase");
        }
        
        // get stock information
        $stock = lookup($_POST["symbol"]);
        if ($stock === false)
        {
            apologize("Stock symbol is not valid");
        }
        else
        {
            // determine cost of transaction
            $cash_value = $stock["price"] * $_POST["shares"];
            
            // validate cash is sufficient for cost of transaction
            $cash =	query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
            if ($cash < $cash_value)
            {
                apologize("Insufficient funds");
            }
            else
            {
                // set transaction value for history table
                $transaction = "BUY";
                
                // add purchased stock to portfolio
                query("INSERT INTO portfolio (id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", $_SESSION["id"], $stock["symbol"], $_POST["shares"]);
                
                // update user's cash balance
                query("UPDATE users SET cash = cash - ? WHERE id = ?", $cash_value, $_SESSION["id"]);
                
                // update user history
                $query = query("INSERT INTO history (id, transaction, symbol, shares, price) VALUES (?, ?, ?, ?, ?)", $_SESSION["id"], $transaction, $stock["symbol"], $_POST["shares"], $stock["price"]);
                
                // redirect 
                redirect("/");
            }
          }
        }
        else
        { 
            // render the buy form  
            render("buy_form.php", ["title" => "Buy"]);
        }
    
?>
