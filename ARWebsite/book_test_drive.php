<?php
include "db.php";

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $preferred_date = mysqli_real_escape_string($con, $_POST['preferred_date']);
    $preferred_time = mysqli_real_escape_string($con, $_POST['preferred_time']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    // Insert data into database
    $query = "INSERT INTO test_drive_requests (name, email, phone, preferred_date, preferred_time, message) VALUES ('$name', '$email', '$phone', '$preferred_date', '$preferred_time', '$message')";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Success message
        echo "<script>alert('Test drive request submitted successfully. We will contact you shortly.')</script>";
    } else {
        // Error message
        echo "<script>alert('Failed to submit test drive request. Please try again.')</script>";
    }
}

include "header.php"; // Include your header file
?>

<style>
    .formcontainer h2 {
        text-align: center;
        color: #333;
    }
   .testform {
    background-color: peachpuff;
    margin-top: 0px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="date"],
input[type="time"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

h2 {
    margin-top: 15px;
}

textarea {
    resize: vertical;
    /* Allow vertical resizing */
    min-height: 100px;
    /* Set a minimum height */
}

button {
    padding: 10px 20px;
    background-color: red;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-bottom: 25px;
}

button:hover {
    background-color: #0056b3;
}

.myform {
        width: 50%;
    }

    .mf {
        margin-left: 25%;
    }


</style>
<body>
<form action="book_test_drive.php" class="testform" method="POST">
    <div class="formcontainer">
        <div class="row">
            <div class="myform mf">
                <h2>Book Test Drive</h2>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="name">Full Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number:</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="preferred_date">Preferred Date:</label>
                        <input type="date" class="form-control" id="preferred_date" name="preferred_date" required>
                    </div>
                    <div class="form-group">
                        <label for="preferred_time">Preferred Time:</label>
                        <input type="time" class="form-control" id="preferred_time" name="preferred_time" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message (Optional):</label>
                        <textarea class="form-control" id="message" name="message"></textarea>
                    </div>
                    <button type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</form>

</body>
<!-- Add your HTML content for the Book Test Drive page here -->


<?php include "footer.php"; // Include your footer file 
?>