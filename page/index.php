<?php
require __DIR__ . "/../api/authenticate_user.php";

if(isset($_GET["table"]) && !in_array($_GET["table"], ["dashboard", "incidents", "people", "user"]))
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
                        <input type="hidden" name="table" value="dashboard">
                        <button>Dashboard</button>
                    </form>
                </div>
                <div>
                    <form method="get" action="index.php">
                        <input type="hidden" name="table" value="people">
                        <button>People</button>
                    </form>
                </div>
                <div>
                    <form method="get" action="index.php">
                        <input type="hidden" name="table" value="incidents">
                        <button>Incidents</button>
                    </form>
                </div>
                <div>
                    <?php if(isUserLoggedIn()): ?>
                    <form method="get" action="index.php">
                        <input type="hidden" name="table" value="user">
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
                if(isset($_GET["table"]) && $_GET["table"] === "people")
                    include __DIR__ . "/subpage/people_list.php";
                else if(isset($_GET["table"]) && $_GET["table"] === "incidents"){
                    if(isset($GET["incident_id"]) && is_int($_GET["incident_id"]))   
                        include __DIR__ . "/subpage/incident_view.php";
                    else
                        include __DIR__ . "/subpage/incidents_list.php";
                }
                else if(isset($_GET["table"]) && $_GET["table"] === "user")
                    include __DIR__ . "/subpage/user_list.php";
                else
                    include __DIR__ . "/subpage/dashboard.php";
            ?>
        </main>
    </div>
</body>
</html>