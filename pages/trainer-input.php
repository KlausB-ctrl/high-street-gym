<?php 
include "../model/connect.php";

?>
<!DOCTYPE html>
    <html lang="en-gb">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trainer Input | High Street Gym</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <script src="../js/components/header.js"></script>
        <main class="gray_background --flexcentre-column">
            <div class="blue_background"></div>
            <h1>Trainer Input</h1>
            <div class="white_background --flexcentre" id="--input">
                <div class="profile_content">
                    <h2>Add Trainers</h2>
                    <div class="trainer_input_list">
                        <div class="trainer_input_headings">
                            <p>Name</p>
                            <p>Email</p>
                            <p>Phone</p>
                        </div>
                        <?php
                            $xml = simplexml_load_file("../xml/trainer-input.xml");
                            foreach($xml->children() as $row) {
                                $first_name = $row->first_name;
                                $last_name = $row->last_name;
                                $email_address = $row->email_address;
                                $phone_number = $row->phone_number;
                            
                                echo
                                "
                                <div class='trainer_input_item'>
                                    <p>" . $first_name . " " . $last_name . "</p>
                                    <p>" . $email_address . "</p>
                                    <p>" . $phone_number . "</p>
                                </div>  
                                ";
                            }
                        ?>
                    </div>
                    <?php 
                    if(isset($_GET['delete'])) {
                        if($_GET['delete'] == 'success') {
                            echo "<p class='indicator--green'>Trainers successfully wiped.</p>";
                        } else {
                            echo "<p class='indicator--red'>Trainers could not be wiped. Delete classes before attempting this operation.</p>";
                        }
                    } else if(isset($_GET['operation'])) {
                        if($_GET['operation'] == 'success') {
                            echo "<p class='indicator--green'>Trainers successfully added.</p>";
                        } else if($_GET['operation'] == 'duplicate') {
                            echo "<p class='indicator--red'>Trainers could not be added. The value '" . $_GET['cause'] . "' is already in use.</p>";
                        } else if ($_GET['operation'] == 'missing') {
                            echo "<p class='indicator--red'>Trainers could not be added. Row " . $_GET['cause'] ." is missing a required value.</p>";
                        } else if ($_GET['operation'] == 'invalid') {
                            echo "<p class='indicator--red'>Trainers could not be added. The value '" . $_GET['cause'] . "' should only contain numeric values.</p>";
                        } else {
                            echo "<p class='indicator--red'>Trainers could not be added. The value '" . $_GET['cause'] . "' exceeds the maximum allowed length of 30 characters.</p>";
                        }
                    }
                    ?>
                    <div class="trainer_input_buttons">
                        <button class="standard_button" onclick="window.location.href='../php/add-trainers.php'">ADD ALL</button>
                        <button class="standard_button--cancel" onclick="window.location.href='../php/clear-trainers.php'">CLEAR DATABASE</button>
                    </div>
                </div>
            </div>
        </main>
        <script src="../js/components/footer.js"></script>
    </body>
    </html>