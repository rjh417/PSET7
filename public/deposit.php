<?php

    // configuration
    require("../includes/config.php"); 
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate user input
        if (empty($_POST["amount"]))
        {
            apologize("You must enter a valid dollar amount");
        }
        else if (!preg_match("/^\d+$/", $_POST["amount"]))
        {
             apologize("You must enter a valid dollar amount");   
        }
        else
        {
        // update user cash account
        query("UPDATE users SET cash = cash + ? WHERE id = ?", $_POST["amount"], $_SESSION["id"]);
        
        // redirect
        redirect("/");
        }
    }
    else
    {  
        // render the deposit form
        render("deposit_form.php", ["title" => "deposit"]);  
    }
?>
