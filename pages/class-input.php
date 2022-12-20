<?php 
include "../model/connect.php";

?>
<!DOCTYPE html>
    <html lang="en-gb">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Class Input | High Street Gym</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <script src="../js/components/header.js"></script>
        <main class="gray_background --flexcentre-column">
            <div class="blue_background"></div>
            <h1>Class Input</h1>
            <div class="white_background --flexcentre" id="--input">
                <div class="profile_content">
                    <h2>Add Classes</h2>
                    <div class="trainer_input_list">
                        <div class="trainer_input_headings">
                            <p>Name</p>
                            <p>Date</p>
                            <p>Time</p>
                            <p>Trainer ID</p>
                        </div>
                        <?php
                            $xml = simplexml_load_file("../xml/class-input.xml");
                            foreach($xml->children() as $row) {
                                $name = $row->name;
                                $date = $row->date;
                                $start_time = $row->start_time;
                                $finish_time = $row->finish_time;
                                $trainer_email = $row->trainer_email;
                            
                                echo
                                "
                                <div class='trainer_input_item'>
                                    <p>" . $name . "</p>
                                    <p>" . $date . "</p>
                                    <p>" . $start_time . " - " . $finish_time . "</p>
                                    <p>" . $trainer_email . "</p>
                                </div>  
                                ";
                            }
                        ?>
                    </div>
                    <?php 
                    if(isset($_GET['delete'])) {
                        if($_GET['delete'] == 'success') {
                            echo "<p class='indicator--green'>Classes successfully wiped.</p>";
                        }
                    } else if(isset($_GET['operation'])) {
                        if($_GET['operation'] == 'success') {
                            echo "<p class='indicator--green'>Classes successfully added.</p>";
                        } else if($_GET['operation'] == 'duplicate') {
                            echo "<p class='indicator--red'>Trainers could not be added. The value '" . $_GET['cause'] . "' is already in use.</p>";
                        } else if($_GET['operation'] == 'incorrect') {
                            echo "<p class='indicator--red'>Classes could not be added. The email '" . $_GET['cause'] . "' does not correlate to an existing trainer.</p>";
                        }else if($_GET['operation'] == 'invalid') {
                            echo "<p class='indicator--red'>Classes could not be added. The value '" . $_GET['cause'] . "' is not in the correct format.</p>";
                        }
                    }
                    ?>
                    <div class="trainer_input_buttons">
                        <button class="standard_button" onclick="window.location.href='../php/add-classes.php'">ADD ALL</button>
                        <button class="standard_button--cancel" onclick="window.location.href='../php/clear-classes.php'">CLEAR DATABASE</button>
                    </div>
                </div>
            </div>
        </main>
        <script src="../js/components/footer.js"></script>
    </body>
    </html>