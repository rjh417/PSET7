<?php
    
    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate input
        if (empty($_POST["symbol"]))
        {
            apologize("Please provide a stock symbol");
        }
        else
        {
            // lookup stock information
            $_POST = lookup($_POST["symbol"]);
            
            // ensure symbol is valid
            if ($_POST === false)
            {
                apologize("Invalid stock symbol");
            }
            else
            {  
                // render the quote display form
                render("quote_display.php", ["title" => "Quote"]);
            }
        }
    }    
    else
    {
        // else render form
        render("quote_form.php", ["title" => "Quote"]);
    }
?>
