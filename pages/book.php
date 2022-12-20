<?php 
include "../model/connect.php";
session_start();

// Set timezone
date_default_timezone_set('Australia/Brisbane');

// Define relevant variables
$current_date = date('Y-m-d');
$current_time = date('H:i:s');
if(isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
}
// Fetch all classes
$class_sql = "SELECT * FROM class WHERE class_date >= '$current_date'";
$class_statement = $conn->prepare($class_sql);
$class_statement->execute();
$class_result = $class_statement->fetchAll();
$class_statement->closeCursor();

$booked_class_id_array = array();

// Fetch list of booked classes
if(isset($_SESSION['id'])) {
    $booked_classes_sql = "SELECT class_class_id FROM class_booking WHERE user_user_id = $user_id";
    $booked_classes_statement = $conn->prepare($booked_classes_sql);
    $booked_classes_statement->execute();
    $booked_classes_result = $booked_classes_statement->fetchAll();
    $booked_classes_statement->closeCursor();

    foreach($booked_classes_result as $booked_class):
        array_push($booked_class_id_array, $booked_class['class_class_id']);
    endforeach;
} else {
    $booked_classes_result = null;
}
?>

<!DOCTYPE html>
    <html lang="en-gb">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book | High Street Gym</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <script src="../js/components/header.js"></script>
        <main>
            <div id="book_background" class="home_banner --flexcentre-column --vignette-shadow">
                <section class="book_container">
                    <div class="book_header">
                        <h1>CLASS BOOKINGS</h1>
                        <div class="book_header_links">
                            <a id="book_header_links--active" href="./book.php">Upcoming</a>
                            <a href="./bookings.php">Bookings</a>
                        </div>
                    </div>
                    <div class="book_list">
                        <?php
                        if(empty($class_result)) {
                            echo "<div class='bookings_empty'>
                                    <p>It appears that there are no classes available to book.</p>
                                    <p>Think this may be a mistake? Contact us at +61 412 345 678</p>
                                </div>";
                        } else {
                            foreach($class_result as $class):
                                // Retrieve trainer information
                                $trainer_id = $class['trainer_trainer_id'];
                                $trainer_sql = "SELECT * FROM trainer WHERE trainer_id = $trainer_id";
                                $trainer_statement = $conn->prepare($trainer_sql);
                                $trainer_statement->execute();
                                $trainer_result = $trainer_statement->fetchAll();
                                $trainer_statement->closeCursor();

                                // Create trainer variables
                                $trainer_first_name = $trainer_result[0]['trainer_first_name'];
                                $trainer_last_name = $trainer_result[0]['trainer_last_name'];
                                $trainer_email_address = $trainer_result[0]['trainer_email_address'];
                                $trainer_phone_number = $trainer_result[0]['trainer_phone_number'];

                                // Create date variables
                                $class_date = $class['class_date'];
                                $converted_class_date = strtotime($class_date);
                                $class_month = date('M', $converted_class_date);
                                $class_day = date('D', $converted_class_date);
                                $class_day_number = date('d', $converted_class_date);

                                // Create time variables
                                $class_start_time = substr($class['class_start_time'], 0, 5);
                                $class_finish_time = substr($class['class_finish_time'], 0, 5);

                                // Create other variables
                                $class_name = $class['class_name'];
                                $class_id = $class['class_id'];

                                // Create the HTML
                                echo 
                                "
                                <div class='booking_container'>
                                    <div class='booking_preview'>
                                        <div class='booking_date --flexcentre'>
                                            <p>" . $class_day_number . "</p>
                                            <p>" . $class_month . ", " . $class_day . "</p>
                                        </div>
                                        <div class='booking_time'>
                                            <p>" . $class_start_time . " - " . $class_finish_time . "</p>
                                        </div>                            
                                        <div class='booking_classname'>
                                            <p><strong>" . $class_name . "</strong> (" . $trainer_first_name . " " . $trainer_last_name . ")</p>
                                        </div>
                                        <div class='booking_details'>
                                            <button id='booking_button_" . $class_id . "' value='booking_" . $class_id . "' onclick='revealBookingDetails(this.id, this.value)'>Details ⮜</button>
                                        </div>
                                    </div>
                                    <div class='booking_information --flexcentre' id='booking_" . $class_id . "'>
                                        <div class='booking_trainer'>
                                            <p>Trainer:</p>
                                            <p>" . $trainer_first_name . " " . $trainer_last_name . "</p>
                                        </div>
                                        <div class='booking_email_address'>
                                            <p>Email:</p>
                                            <p>" . $trainer_email_address . "</p>
                                        </div>                            
                                        <div class='booking_phone_number'>
                                            <p>Phone:</p>
                                            <p>" . $trainer_phone_number . "</p>
                                        </div>";
                                    if(in_array($class_id, $booked_class_id_array)) {
                                        echo
                                        "
                                        <form class='booking_button' action='../php/unbook-class-upcoming.php' method='post'>
                                            <button class='standard_button--cancel' name='class-id' value=" . $class_id . ">CANCEL</button>
                                        </form>
                                        ";
                                    } else {
                                        echo
                                        "
                                        <form class='booking_button' action='../php/book-class.php' method='post'>
                                            <button class='standard_button' name='class-id' value=" . $class_id . ">BOOK</button>
                                        </form>
                                        ";
                                    }
                                        
                                echo
                                "
                                    </div>
                                </div>
                                ";
                            endforeach;
                        }
                        ?>
                    </div>
                </section>
            </div>
            <div class="grey_background"></div>
        </main>
        <script src="../js/components/footer.js"></script>
        <script src="../js/functions/reveal-booking-details.js"></script>
    </body>
    </html>