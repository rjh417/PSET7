<?php

    // configuration
    require("../includes/config.php"); 
    
    // get user's current cash balance
    $rows = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
    $cash = money_format("$%i", $rows[0]["cash"]);
    
    // get user's current holdings
    $rows = query("SELECT symbol, shares FROM portfolio WHERE id = ?", $_SESSION["id"]);
    $positions = [];
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        if ($stock !== false)
        {
            $positions[] = [
                "name" => $stock["name"],
                "price" => money_format("$%i", $stock["price"]),
                "shares" => $row["shares"],
                "symbol" => $row["symbol"],
                "total" => money_format("$%i", $row["shares"] * $stock["price"])
                ];
          }
     }
     // render portfolio    
    render("portfolio.php", ["title" => "Portfolio", "cash" => $cash, "positions" => $positions])
?>
