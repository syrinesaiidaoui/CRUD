<?php 
require_once '../configuration.php';
class userC{
    function addUser($user){
        $config = config::getConnexion();
        try {
            $querry = $config->prepare('
            INSERT INTO user
            (FirstName,LastName,Password,Email)
            VALUES
            (:FirstName,:LastName,:Password,:Email)
            ');
            $querry->execute([
                'FirstName'=>$user->getFirstName(),
                'LastName'=>$user->getLastName(),
                'Password'=>$user->getPassword(),//lhna nsit d ya syrine ktebt passwor f3oudh password -_-
                'Email'=>$user->getEmail()
            ]);
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }
    function list() 
    {
        $pdo= config::getConnexion();
        try{
        $list=$pdo->query("SELECT * from user");
        return $list;
        }
        catch (PDOException $th) {
            $th->getMessage();
       }
    }

    function showUser($name)
    {   $pdo = config::getConnexion();        
        try {
            $query = $pdo->prepare( "SELECT * from user where FirstName = $name" );
            $query->execute();
            $user = $query->fetch();
            return $user;
        } catch (PDOException $th) {
            $th->getMessage();
       }
    }
    function deleteUser($n){
        $pdo=config::getConnexion();
        try{
			$querry=$pdo->prepare("DELETE FROM user WHERE FirstName= :n" );
			$querry->bindValue(':n',$n);
			$querry->execute();
           }catch (PDOException $th) {
                 $th->getMessage();  }

    }
    function updateUser($FirstName,$user){
        $pdo=config::getConnexion();
        try{
            $querry=$pdo->prepare("UPDATE user SET LastName= :LastName, Password = :Password,Email = :Email WHERE FirstName = :FirstName");
            $querry->bindValue(':FirstName',$user->getFirstName());
            $querry->bindValue(':LastName',$user->getLastName());
            $querry->bindValue(':Password',$user->getPassword());
            $querry->bindValue(':Email',$user->getEmail());
            if ($querry->execute()) {
                echo $querry->rowCount() . " records UPDATED successfully <br>";
            } else {
                echo "Error updating record";
            }
        }catch(PDOException $th){
            $th->getMessage();
        }
    }
}

?>