<?php 
include "../model/connect.php";
session_start();
session_destroy();

?>
<!DOCTYPE html>
    <html lang="en-gb">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Logout | High Street Gym</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <script src="../js/components/header.js"></script>
        <main class="gray_background --flexcentre-column">
            <h1 id="logout-header">Logout</h1>
            <p id="logout-text">You have been successfully logged out.</p>
            <div id="logout-button">
                <button class="standard_button" onclick="window.location.href='../index.html'">Return to home...</button>
            </div>
        </main>
        <script src="../js/components/footer.js"></script>
    </body>
    </html>