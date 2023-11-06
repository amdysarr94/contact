<?php
    class Contact 
    {
        private $nom;
        private $prenom;
        private $telephone;
        private $favoris;

        public function __construct(array $donnees){
            // $this->setNom($donnees['nom']);
            // $this->setPrenom($donnees['prenom']);
            // $this->setTelephone($donnees['telephone']);
            // $this->setFavoris($donnees['favoris']);
            $this->hydrate($donnees);
            
        }
        public function hydrate(array $donnees){
            foreach($donnees as $key=>$donnee){
                $method = 'set'. ucfirst($key);
                if(method_exists($this, $method)){
                    $this->$method($donnee);
                }
            }

        }
        
        public function getNom(){
            return $this->nom;
        }
        public function getPrenom(){
            return $this->prenom;
        }
        public function getTelephone(){
            return $this->telephone;
        }
        public function getFavoris(){
            return $this->favoris;
        }
        public static function nameValidator($nomdonne){
            $patterName = '/^(?![0-9]+$)[\wÀ-ÿ -]{3,30}$/';
            if(preg_match($patterName, $nomdonne)){
                return true;
            } else {
                 return false;
            }
        }
        public static function phoneNumberValidator($telephonedonne){
            $patternTelephone = '/^\+221 7[0678]{1}[ ]{1}[0-9]{3}[ ]{1}[0-9 ]{2}[ ]{1}[0-9]{2}$/';
            if(preg_match($patternTelephone, $telephonedonne)){
                return true;
            } else {
                return false;
            }
        }
        public function setNom($nomdonnee){
            $nomdonnee = (string) $nomdonnee;
            if(self::nameValidator($nomdonnee)==true){
                $this->nom = $nomdonnee;
            }else{
                echo "Le nom n'est pas valide";
                die();
            }
             
        }
        public function setPrenom($prenomdonnee){
            $prenomdonnee = (string) $prenomdonnee;
            if(self::nameValidator($prenomdonnee)==true){
                $this->prenom = $prenomdonnee;
            }else{
                echo "Le prenom n'est pas valide";
                die();
            }
       }
       public function setTelephone($telephonedonnee){
        $telephonedonnee = (string) $telephonedonnee;
        if(self::phoneNumberValidator($telephonedonnee)==true){
            $this->telephone = $telephonedonnee;
        }else{
            echo "Le numéro téléphone saisie n'est pas valide";
            die();
        }
        
       }
       public function setFavoris($favorisdonnee){
        $favorisdonnee = ucfirst((string) $favorisdonnee);
        if(in_array($favorisdonnee, array('Oui', 'Non'))){
            $this->favoris = $favorisdonnee;
        }else {
            echo "Il faut choisir entre oui et non";
            die();
        }
        
       }
    //    public static function Create(array $donnees){
    //     return $contact = new Contact($donnees);
    //    }
    }
?>