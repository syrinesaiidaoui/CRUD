<?php

require_once '../controller/userC.php'; // Include the file where userC class is defined
require_once '../modal/user.php';

$userC = new userC(); // Instantiate the userC class

if (isset($_POST['LastName']) && isset($_POST['Password']) && isset($_POST['Email'])) {
    if (!empty($_POST['LastName']) && !empty($_POST['Password']) && !empty($_POST['Email'])) {
        $user = new user($_POST['FirstName'], $_POST['LastName'], $_POST['Password'], $_POST['Email']);
        $userC->updateUser($_POST['FirstName'], $user);
        header("Location:updateform.php");
    } else {
        $error = "Missing information";
    }
}

?>