<?php

require_once 'Connexion.php';
class DialogueBD {
    
    public function getUser($login,$pwd) {
        try {$conn = Connexion::getConnexion();
        $sql = "SELECT * FROM utilis WHERE LoginUtil='$login' AND PassUtil='$pwd'";
        $sth = $conn->prepare($sql);
        $sth->execute();
        $user =$sth->fetch(PDO::FETCH_ASSOC);
        return $user;
        } 
        catch (PDOException $e) {$erreur = $e->getMessage();}
    }

    public function getCategories() {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM categorie ";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $cat =$sth->fetchall(PDO::FETCH_ASSOC);
            return $cat;
        } 
        catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getPlats($cat) {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM plat WHERE codeCat='$cat'";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $plats =$sth->fetchall(PDO::FETCH_ASSOC);
            return $plats;
        } 
        catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function countPlats($cat) {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT count(*) FROM plat WHERE codeCat='$cat'";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $nb =$sth->fetch(PDO::FETCH_ASSOC);
            echo reset($nb);
        } 
        catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

}

?>