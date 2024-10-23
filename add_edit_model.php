
<?php
require_once("util-db.php");

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $model_name = $_POST["model_name"];
    $model_year = $_POST["model_year"];
    $model_id = isset($_POST["model_id"]) ? $_POST["model_id"] : null;

    $conn = get_db_connection();

    if ($model_id) {
        // Update existing car model
        $stmt = $conn->prepare("UPDATE car_model SET model_name = ?, model_year = ? WHERE model_id = ?");
        $stmt->bind_param("ssi", $model_name, $model_year, $model_id);
    } else {
        // Add new car model
        $stmt = $conn->prepare("INSERT INTO car_model (model_name, model_year) VALUES (?, ?)");
        $stmt->bind_param("si", $model_name, $model_year);
    }

    if ($stmt->execute()) {
        echo "<script>showNotification('Car model operation successful!');</script>";
    } else {
        echo "<script>showNotification('Car model operation failed!');</script>";
    }

    $stmt->close();
    $conn->close();
    header("Location: instructors.php"); // Redirect back to the car models list
}

// Handle delete request
if (isset($_GET["delete_id"])) {
    $model_id = $_GET["delete_id"];
    $conn = get_db_connection();
    $stmt = $conn->prepare("DELETE FROM car_model WHERE model_id = ?");
    $stmt->bind_param("i", $model_id);
    
    if ($stmt->execute()) {
        echo "<script>showNotification('Car model deleted successfully!');</script>";
    } else {
        echo "<script>showNotification('Failed to delete car model!');</script>";
    }

    $stmt->close();
    $conn->close();
    header("Location: carmodels.php");
}
?>
