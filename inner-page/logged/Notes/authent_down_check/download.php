<!-- download.php -->
<?php
// Check if the user is authenticated, replace this with your authentication logic
$isAuthenticated = true; // Example: Set to true if user is authenticated

if ($isAuthenticated) {
    header("Location: notes verified/notes acces user=true.html");
} else {
    echo "You are not authorized to access this file.";
}
?>
