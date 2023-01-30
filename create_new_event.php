<?php
include("./common/header.php");
include("./common/db.php");

$event_name_error = $event_starting_time_error = $event_ending_time_error = $event_description_error = $event_image_error = $event_location_error = "";

$event_name = $event_starting_time = $event_ending_time = $event_description = $event_location = "";

if (isset($_POST["submit"])) {
    extract($_POST);

    if (empty($event_name)) {
        $event_name_error = "Event Name Requied";
    } else {
        $event_name = validate_input($event_name);
        $event_name_error = "";
    }

    if (empty($event_location)) {
        $event_location_error = "Event Location Requied";
    } else {
        $event_location = validate_input($event_location);
        $event_location_error = "";
    }

    if (empty($event_starting_time)) {
        $event_starting_time_error = "Event Satarting Time Requied";
    } else {
        $event_starting_time = validate_input($event_starting_time);
        $event_starting_time_error = "";
    }

    if (empty($event_ending_time)) {
        $event_ending_time_error = "Event Ending Time Requied";
    } else {
        $event_ending_time = validate_input($event_ending_time);
        $event_ending_time_error = "";
    }
    if (empty($event_description)) {
        $event_description_error = "Event Name Requied";
    } else {
        $event_description = validate_input($event_description);
        $event_description_error = "";
    }
    if (empty($_FILES['event_image']['size'])) {
        $event_image_error = "Image Required";
    } else {
        $event_image_error = "";
    }

    if ($event_name_error === "" && $event_starting_time_error === "" && $event_ending_time_error === "" && $event_description_error === "" && $event_image_error === "" &&  $event_location_error === "") {
        if ($conn) {
            $sql = "INSERT INTO events(event_name, event_location, event_starting_time, event_ending_time, event_description, event_image) VALUES('$event_name','$event_location','$event_starting_time','$event_ending_time','$event_description','default.jpg')";

            if (mysqli_query($conn, $sql)) {
                $error = array();
                $last_id = mysqli_insert_id($conn);
                $file_name = $_FILES['event_image']['name'];
                $file_size = $_FILES['event_image']['size'];
                $file_tmp = $_FILES['event_image']['tmp_name'];
                $file_type = $_FILES['event_image']['type'];

                $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

                $extensions = array("jpeg", "jpg", "png");

                if (in_array($file_ext, $extensions) === false) {
                    $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                }

                if ($file_size > 10097152) {
                    $errors[] = 'File size must be excately 10 MB';
                }

                if (empty($errors) == true) {
                    $new_name = $last_id . "." . $file_ext;
                    move_uploaded_file($file_tmp, "uploads/" . $new_name);
                    $sql = "UPDATE events SET event_image = '$new_name' WHERE id='$last_id'";
                    if (mysqli_query($conn, $sql)) {
                        $event_name_error = $event_starting_time_error = $event_ending_time_error = $event_description_error = $event_image_error = $event_location_error = "";
                        $event_name = $event_starting_time = $event_ending_time = $event_description = $event_location = "";
                        echo "Successfully Event Created!!";
                    }
                } else {
                    $sql = "DELETE FROM events WHERE id='$last_id'";
                    mysqli_query($conn, $sql);
                    foreach ($errors as $value) {
                        $event_image_error .= $value;
                    }
                }
            } else {
            }
        }
    }
}

function validate_input($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<div>

    <div class="row g-0 mt-3">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <div class="bg-white shadow-sm rounded">
                <div class="custom-nav-bg text-center text-white p-2">
                    <h5>Create Event</h5>
                </div>

                <div class="p-2">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="event_name" class="form-label">Event Name</label>
                            <input value="<?= $event_name ?>" name="event_name" type="text" class="form-control" id="event_name">
                            <span class="text-danger"><?= $event_name_error ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="event_location" class="form-label">Event Location</label>
                            <input value="<?= $event_location ?>" name="event_location" type="text" class="form-control" id="event_location">
                            <span class="text-danger"><?= $event_location_error ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="event_starting_time" class="form-label">Event Starting Time</label>
                            <input value="<?= $event_starting_time ?>" name="event_starting_time" type="datetime-local" class="form-control" id="event_starting_time">
                            <span class="text-danger"><?= $event_starting_time_error ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="event_ending_time" class="form-label">Event Ending Time</label>
                            <input value="<?= $event_ending_time ?>" name="event_ending_time" type="datetime-local" class="form-control" id="event_ending_time">
                            <span class="text-danger"><?= $event_ending_time_error ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="event_description" class="form-label">Event Description</label>
                            <textarea name="event_description" type="text" class="form-control" id="event_description"><?= $event_description ?></textarea>
                            <span class="text-danger"><?= $event_description_error ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="event_image" class="form-label">Image</label>
                            <input name="event_image" type="file" class="form-control" id="event_image">
                            <span class="text-danger"><?= $event_image_error ?></span>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="col-md-2">

        </div>
    </div>

</div>

<?php
include("./common/footer.php")
?>