<?php
require '../include/conn.php';

// Sanitize and validate the idpelajar value
$idpelajar = filter_input(INPUT_GET, 'idpelajar', FILTER_VALIDATE_INT);

if ($idpelajar !== false) {
    // Delete the pelajar's peralatan records first
    $sqlDeletePeralatan = "DELETE FROM peralatan WHERE pelajar = ?";
    $stmtDeletePeralatan = $conn->prepare($sqlDeletePeralatan);

    if ($stmtDeletePeralatan) {
        $stmtDeletePeralatan->bind_param("i", $idpelajar);
        $stmtDeletePeralatan->execute();
        $stmtDeletePeralatan->close();
    } else {
        echo "Error: " . $conn->error;
    }

    // Now, delete the pelajar record
    $sqlDeletePelajar = "DELETE FROM pelajar WHERE idpelajar = ?";
    $stmtDeletePelajar = $conn->prepare($sqlDeletePelajar);

    if ($stmtDeletePelajar) {
        $stmtDeletePelajar->bind_param("i", $idpelajar);
        $stmtDeletePelajar->execute();

        if ($stmtDeletePelajar->affected_rows > 0) {
            // The pelajar record was successfully deleted
            header('location:index.php?menu=senarai_pelajar');
        } else {
            // No records were deleted (record with idpelajar not found)
            echo "No records were deleted.";
        }

        $stmtDeletePelajar->close();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    // Invalid idpelajar value
    echo "Invalid idpelajar value.";
}

// Close the database connection
$conn->close();
?>
