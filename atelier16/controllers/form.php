<?php
    session_start();
    function chargerClass($class){
        // require '../models/'.$class. '.php';
        require_once '../models/'.$class. '.php';
    }
    // function chargerClassPlus(){
    //     require_once '../models/ContactManager.php';
    // }
    // spl_autoload_register('chargerClassPlus');
    spl_autoload_register('chargerClass');
    
    // require '../models/Contact.php';
    // require '../models/ContactManager.php';
    // require 'model/Contact.php';
    // require 'model/ContactManager.php';
    if(isset($_POST['Ajouter'])){
        $contact = [
            "nom" => $_POST['nom'],
            "prenom"=>$_POST['prenom'],
            "telephone"=>$_POST['tel'],
            "favoris"=>$_POST['favoris']
        ];
        
        $contact = new Contact($contact);
        // var_dump($contacte); die();
        $manager = new ContactManager();
        $manager->getConnection();
        $manager->Insertion($contact);
        $manager->Affichage();
        
       
    }
    if(isset($_POST['modifier'])){
        // echo "On modifie";
       $id = $_POST['id'];
       $_SESSION['id'] = $id;
       header('Location:views/modifForm.php');
    }elseif(isset($_POST['modifierform'])){
        $id = $_SESSION['id'];
        $donnees = [$id, $_POST['nom'], $_POST['prenom'], $_POST['tel'], $_POST['favoris']];
        $manager = new ContactManager;
        $manager->Modifier($donnees);
    }
    if(isset($_POST['supprimer'])){
        // echo "sup";
        $id = $_POST['id'];
        $manager = new ContactManager;
        $manager->Supprimer($id);
    }
    