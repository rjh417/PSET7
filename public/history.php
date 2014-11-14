<?php

    // configuration
    require("../includes/config.php");
        
        // lookup holdings in history table
        $rows = query("SELECT * FROM history WHERE id = ?", $_SESSION["id"]);
        
        // if there are holdings
        if($rows !== false)
        {
            // set array for trades
            $trades = [];
            foreach($rows as $row)
            { 
                 $trades[] = [
                    "transaction" => $row["transaction"],
                    "datetime" => date('m-d-y h:i:s', strtotime($row["datetime"])),
                    "symbol" => $row["symbol"],
                    "shares" => $row["shares"],
                    "price" => money_format("$%i", floatval($row["price"]))
                ];
            }
            // render the history display form with user history
            render("history_display.php", ["title" => "history", "trades" => $trades]);        
        }
        else
        { 
            // render the history display form showing no activity
            render("history_display.php", ["title" => "history"]);  
        }
?>
