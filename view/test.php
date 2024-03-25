<?php
include "../controller/userC.php";
include "../modal/user.php";

$userC = new userC;
$list=$userC->list();

?>
<html>
<body>
    <center>
        <h1>Liste des utilisateurs</h1>
        <h2>
          <a href="adduser.php">Add User</a>
        </h2>
    </center>
        <table border="1" align="center">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Password </th>  
                <th>Email </th>  
            </tr>

            <?php foreach($list as $userC): ?>
    <tr>
        <td><?php echo $userC['FirstName']; ?></td>  
        <td><?php echo $userC['LastName']; ?></td>
        <td><?php echo $userC['Password']; ?></td>
        <td><?php echo $userC['Email']; ?></td>
        <td align="center">
            <!-- Delete Link -->
            <a href="delete.php?name=<?php echo $userC['FirstName']; ?>">DELETE</a>
        </td>
        <td align="center">
            <!-- Update Form -->
            <form method="POST" action="update.php?n=<?php echo $userC['FirstName']; ?>">
                <input type="submit" name="update" value="Update">
                <input type="hidden" name="FirstName" value="<?php echo $userC['FirstName']; ?>">
            </form>
        </td>
    </tr>    
<?php endforeach; ?>

        </table>
     </body>
</html>