<?php
require __DIR__ . "/../api/authenticate_user.php";

if(isset($_GET["display"]) && !in_array($_GET["display"], ["dashboard", "incidents_table", "people_table", "users_table", "incident_view"]))
    header("Location: index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style/index.css">
</head>
<body>
    <header>
        <p>
            Odiongan Incident Records
        </p>
    </header>
    <div id="below_header">
        <div id="side_bar">
            <?php if(isUserLoggedIn()): ?>
            <div>
                <p><?= htmlspecialchars($_SESSION["username"]) ?></p>
            </div>
            <?php endif ?>
            <nav>
                <div>
                    <form method="get" action="index.php">
                        <input type="hidden" name="display" value="dashboard">
                        <button>Dashboard</button>
                    </form>
                </div>
                <div>
                    <form method="get" action="index.php">
                        <input type="hidden" name="display" value="people_table">
                        <button>People</button>
                    </form>
                </div>
                <div>
                    <form method="get" action="index.php">
                        <input type="hidden" name="display" value="incidents_table">
                        <button>Incidents</button>
                    </form>
                </div>
                <div>
                    <?php if(isUserLoggedIn()): ?>
                    <form method="get" action="index.php">
                        <input type="hidden" name="display" value="users_table">
                        <button>User</button>
                    </form>
                    <?php endif ?>
                </div>
                <div>
                    <?php if(isUserLoggedIn()): ?>
                    <form action="../api/logout_user.php">
                        <button>Log Out</button>
                    </form>
                    <?php endif ?>
                    <?php if(!isUserLoggedIn()): ?>
                    <form action="login.php">
                        <button>Log In</button>
                    </form>
                    <?php endif ?>
                </div>
            </nav>
        </div>
        
        <main>
            <?php   
                if(isset($_GET["display"])){
                    $subpage = __DIR__ . match($_GET["display"]){
                        "dashboard" => "/subpage/dashboard.php",
                        "people_table" => "/subpage/people_table.php",
                        "incidents_table" => "/subpage/incidents_table.php",
                        "users_table" => "/subpage/users_table.php",
                        "incident_view"=> "/subpage/incident_view.php"
                    };
                    include $subpage;
                }
                else
                    include __DIR__ . "/subpage/dashboard.php";
            ?>
        </main>
    </div>
</body>
</html>