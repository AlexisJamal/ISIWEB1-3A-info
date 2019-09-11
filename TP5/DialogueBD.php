<?php

require_once 'Connexion.php';
class DialogueBD {
    
    public function getUser($login,$pwd) {
        try {$conn = Connexion::getConnexion();
        $sql = "SELECT * FROM utilis WHERE Login='$login' AND Password='$pwd'";
        $sth = $conn->prepare($sql);
        $sth->execute();
        $user =$sth->fetch(PDO::FETCH_ASSOC);
        return $user;
        } 
        catch (PDOException $e) {$erreur = $e->getMessage();}
    }

    public function getCreneaux() {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM creneau ";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $cat =$sth->fetchall(PDO::FETCH_ASSOC);
            return $cat;
        } 
        catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getCreneau($id) {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM creneau WHERE id = $id";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $cat =$sth->fetchall(PDO::FETCH_ASSOC);
            return $cat;
        } 
        catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function createCreneau($id, $debut, $duree, $exclu, $publi, $idProf, $indicateur, $note, $commentaireAvant, $commentaireApres){
        try {
            $conn = Connexion::getConnexion();
            $sql = "INSERT INTO creneau (id, debut, duree, exclu, publi, idProf, indicateur, note, commentaireAvant, commentaireApres) VALUES ($id, '$debut', '$duree', $exclu, '$publi', $idProf, '$indicateur', '$note', '$commentaireAvant', '$commentaireApres');";
            $sth = $conn->prepare($sql);
            $sth->execute();
        } 
        catch (PDOException $e) {$erreur = $e->getMessage();}
    }

    public function deleteCreneau($id){
        try {
            $conn = Connexion::getConnexion();
            $sql = "DELETE FROM creneau WHERE id = $id";
            $sth = $conn->prepare($sql);
            $sth->execute();
        } 
        catch (PDOException $e) {$erreur = $e->getMessage();}
    }

    public function updateCreneau($id, $debut, $duree, $exclu, $publi, $idProf, $indicateur, $note, $commentaireAvant, $commentaireApres){
        try {
            $conn = Connexion::getConnexion();
            $sql = "UPDATE creneau SET debut='$debut', duree='$duree', exclu=$exclu, publi='$publi', idProf=$idProf, indicateur='$indicateur', note='$note', commentaireAvant='$commentaireAvant', commentaireApres='$commentaireApres' WHERE id = $id;";
            $sth = $conn->prepare($sql);
            $sth->execute();
        } 
        catch (PDOException $e) {$erreur = $e->getMessage();}
    }

}

?>