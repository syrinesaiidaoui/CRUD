<?php
require_once '../controller/userC.php';

$error = "";

// Create an instance of the controller
$userC = new userC();

if (isset($_POST['submit'])) {
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName']; // Update to match form field name
    $Password = $_POST['Password']; // Update to match form field name
    $Email = $_POST['Email']; // Update to match form field name

    // Update user in the database
    $pdo = config::getConnexion();
    try {
        $query = "UPDATE user SET LastName = :LastName, Password = :Password, Email = :Email WHERE FirstName = :FirstName";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(":FirstName", $FirstName);
        $stmt->bindValue(":LastName", $LastName);
        $stmt->bindValue(":Password", $Password);
        $stmt->bindValue(":Email", $Email);
        $stmt->execute();
        echo "Le user a été modifié avec succès";
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}

// Retrieve user data to be modified using FirstName
if (isset($_GET['FirstName'])) {
    $pdo = config::getConnexion();
    try {
        $query = "SELECT * FROM user WHERE FirstName = :FirstName";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(":FirstName", $_GET['FirstName']);
        $stmt->execute();
        $newcat = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}
?>

<form action="#" method="post" role="form" class="php-email-form">
    <div class="row">
        <input type="hidden" name="FirstName" value="<?php echo $newcat['FirstName']; ?>">

        <div class="form-group col-md-6">
            <input type="text" name="LastName" class="form-control" id="LastName" value="<?php echo $newcat['LastName']; ?>" placeholder="Last Name" required>
        </div>

        <div class="form-group col-md-6">
            <input type="password" class="form-control" name="Password" id="Password" value="<?php echo $newcat['Password']; ?>" placeholder="Password" required>
        </div>

        <div class="form-group col-md-6">
            <input type="email" class="form-control" name="Email" id="Email" value="<?php echo $newcat['Email']; ?>" placeholder="Email" required>
        </div>

        <div class="form-group col-md-12">
            <button type="submit" name="submit" class="btn btn-primary">Modifier</button>
        </div>
    </div>
</form>