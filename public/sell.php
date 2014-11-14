<?php

// configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["symbol"]))
        {
            apologize("You must select a symbol.");
        }
        else
        {
            // lookup stock information
            $stock = lookup($_POST["symbol"]);
            
            // get user's stock holdings
            $positions = query("SELECT * FROM portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"], $stock["symbol"]);
            $shares = ($positions[0]["shares"]);
            
            // determine payment to user 
            $payment = $stock["price"] * $positions[0]["shares"];
            
            // set transaction type for history table
            $transaction = "SELL";
            
            // update user history
            $query = query("INSERT INTO history (id, transaction, symbol, shares, price) VALUES (?, ?, ?, ?, ?)", $_SESSION["id"], $transaction, $stock["symbol"], $shares, $stock["price"]);
            
            // delete holding from portfolio table
            query("DELETE FROM portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"], $stock["symbol"]);
        
            // update cash holdings
            query("UPDATE users set cash = cash + ? WHERE id = ?", $payment, $_SESSION["id"]);
            
            // redirect 
            redirect("/");
        }
    }
    else
    {
        // get user holdings
        $positions = query("SELECT * FROM portfolio WHERE id = ?", $_SESSION["id"]);
       
        // render sell_form
        render("sell_form.php", ["title" => "Sell", "positions" => $positions]);
    }
?>
