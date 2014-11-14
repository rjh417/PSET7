 <?php
    // confirmation
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submitted user information
        if (empty($_POST["username"]))
        {
            apologize("Please provide a username");
        }
        else if (empty($_POST["password"]))
        {
            apologize("Please provide a password");
        }
        else if ($_POST["password"] != $_POST["confirmation"])
        {
            apologize("Password and confirmation do not match");
        }
        
        // add new user and check if username already exists  
        $result = query("INSERT INTO users(username, hash, cash) VALUES (?, ?, 10000.0000)", $_POST["username"], crypt($_POST["password"]));        
        
        if($result === false)
        {
            apologize("Username already exists");
        }
        else
        {
            // login user and rembember session
            $rows = query("SELECT LAST_INSERT_ID() AS id");
            $_SESSION["id"] = $rows[0]["id"];
            redirect("/");
            
        }
    }
    else
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }
?>
