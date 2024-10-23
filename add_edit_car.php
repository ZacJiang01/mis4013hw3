
<?php
require_once("util-db.php");

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $make_name = $_POST["make_name"];
    $make_country = $_POST["make_country"];
    $make_id = isset($_POST["make_id"]) ? $_POST["make_id"] : null;

    $conn = get_db_connection();

    if ($make_id) {
        // Update existing car make
        $stmt = $conn->prepare("UPDATE car_make SET make_name = ?, make_country = ? WHERE make_id = ?");
        $stmt->bind_param("ssi", $make_name, $make_country, $make_id);
    } else {
        // Add new car make
        $stmt = $conn->prepare("INSERT INTO car_make (make_name, make_country) VALUES (?, ?)");
        $stmt->bind_param("ss", $make_name, $make_country);
    }

    if ($stmt->execute()) {
        echo "<script>showNotification('Car make operation successful!');</script>";
    } else {
        echo "<script>showNotification('Car make operation failed!');</script>";
    }

    $stmt->close();
    $conn->close();
    header("Location: courses.php"); // Redirect back to the car makes list
}

// Handle delete request
if (isset($_GET["delete_id"])) {
    $make_id = $_GET["delete_id"];
    $conn = get_db_connection();
    $stmt = $conn->prepare("DELETE FROM car_make WHERE make_id = ?");
    $stmt->bind_param("i", $make_id);
    
    if ($stmt->execute()) {
        echo "<script>showNotification('Car make deleted successfully!');</script>";
    } else {
        echo "<script>showNotification('Failed to delete car make!');</script>";
    }

    $stmt->close();
    $conn->close();
    header("Location: courses.php");
}
?>
