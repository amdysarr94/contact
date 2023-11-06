
<?php
    // session_start();
    class ContactManager
    {
        const DB_NAME = 'contactform';
        const DB_USER = 'root';
        const DB_PASSWORD = '';
        const DB_HOST = 'localhost';
    
        private $connection;
    
        public function __construct() {
            try {
                $dsn = 'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME;
                $this->connection = new PDO($dsn, self::DB_USER, self::DB_PASSWORD);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
            }
        }
    
        public function getConnection() {
            return $this->connection;
        }
       public function Insertion(Contact $contactdonnee){
            $query = $this->connection->prepare('INSERT into contact SET nom = :nom, prenom = :prenom, 
            telephone = :telephone, favoris = :favoris');
            $query -> bindValue(':nom', $contactdonnee->getNom());
            $query -> bindValue(':prenom', $contactdonnee->getPrenom());
            $query -> bindValue(':telephone', $contactdonnee->getTelephone());
            $query -> bindValue(':favoris', $contactdonnee->getFavoris());
            $query->execute();
            // $allpages = scandir('templates/');
            // if(in_array('form.php', $allpages)){
            //     header('Location:templates/form.php') ;
            // } else {
            //     echo "Cette page n'existe pas";
            // }
            // header('Location:/templates/form.php'); erreur ne pas mettre le premier /
        }
        public function Affichage(){
            $query = $this->connection->prepare('SELECT * FROM contact');
            $query->execute();

            $resultats = $query->fetchAll();
            $tableContent = '<table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Numéro de téléphone</th>
                    <th>Favoris</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>';
    
        foreach ($resultats as $row) {
           
            $tableContent .= '<tr>
                <td>' . $row['nom'] . '</td>
                <td>' . $row['prenom'] . '</td>
                <td>' . $row['telephone'] . '</td>
                <td>' . $row['favoris'] . '</td>
                <td>
                    <form method="post" action="../index.php">
                        <input type="hidden" name="id" value="' . $row['id'] . '">
                        <input type="submit" name="modifier" value="Modifier">
                    </form>
                    <form method="post" action="../controllers/suppr.php">
                        <input type="hidden" name="id" value="' . $row['id'] . '">
                        <input type="submit" name="supprimer" value="Supprimer">
                    </form>
                    <form method="post" action="../controllers/favset.php">
                        <input type="hidden" name="id" value="' . $row['id'] . '">
                        <input type="submit" name="favorisset" value="Favoris">
                    </form>
                </td>
            </tr>';
        }
       
    
        $tableContent .= '</tbody>
        </table>';
        file_put_contents('../views/includes/affichage.php', $tableContent);
        header('Location:../views/affichageplus.php');
        exit();
        }
        public function Modifier(array $donnees){
            $query =$this->connection->prepare('UPDATE contact SET nom= ?, prenom = ?, 
            telephone= ?, favoris = ? WHERE id = ?');
            $query->execute([$donnees[1],$donnees[2], $donnees[3], $donnees[4], $donnees[0]]);
            header('Location:../');
            exit();
        }
        public function Supprimer($iddonnee){
            // $iddonnee = (int) $iddonnee;
            $query = $this->connection->prepare('DELETE FROM contact WHERE id = ?');
            $query->execute([$iddonnee]);
            header('Location:../');
            exit();
        }
        public function FavSet($iddonnee){
            $query = $this->connection->prepare('UPDATE contact SET favoris= ? WHERE id= ?');
            $query->execute(['Oui', $iddonnee]);
            header('Location:../');
            exit();
        }   
    }
?>