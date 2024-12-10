<?php
function SelectCarsByManufacturers($iid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare(SELECT car.id, car.
