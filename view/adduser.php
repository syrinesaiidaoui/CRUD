<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <!-- Add your CSS and other head elements here -->
</head>
<body>
<center>
    <!-- Your HTML form goes here with updated field names -->
    <h1>Enter user Information</h1>
    <section id="pageContent">
        <form action="#" method="post">
            <table>
                <tr>
                    <td>
                        <label for="FirstName">First Name</label>
                    </td>
                    <td>
                        <input type="text" id="FirstName" name="FirstName"minlength="3"required/>
                    </td>
                </tr>
                <tr>
                    <td><label for="LastName">Last Name</label></td>
                    <td>
                        <input name="LastName" id="LastName" minlength="3" required />
                    </td>
                </tr>
                <tr>
                    <td><label for="Password">Password</label></td>
                    <td>
                        <input name="Password" id="Password" minlength="3" required />
                    </td>
                </tr>
                <tr>
                    <td><label for="Email">Email</label></td>
                    <td>
                        <input name="Email" id="Email" minlength="3" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit">Submit</button>
                        <button type="reset">Reset</button>
                    </td>
                </tr>
            </table>
        </form>
    </section>
</center>
</body>
</html>

<?php
require_once '../controller/userC.php';
require_once '../modal/user.php'; // Include the user class definition
$user= null;
$userC = new userC(); // Create an instance of the userC class

if (
    isset($_POST['FirstName'])&& isset($_POST['LastName'])&& isset($_POST['Password'])&& isset($_POST['Email'])
) {
    if (
        !empty($_POST['FirstName'])&& !empty($_POST['LastName'])&&!empty($_POST['Password'])&& !empty($_POST['Email'])
    ) {  //create an instance from user class 
        $user = new user(
            $_POST['FirstName'],$_POST['LastName'],$_POST['Password'],$_POST['Email']
        );
        
        $userC->addUser($user); // Assuming you have an adduser method in your userC class
        header("Location:adduser.php"); // Redirect to the desired page after adding the user
    } else {
        $error = "Missing information";
    }
}
?>