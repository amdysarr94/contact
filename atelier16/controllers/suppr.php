<?php
function chargerClass($class){
    // require '../models/'.$class. '.php';
    require_once '../models/'.$class. '.php';
}

spl_autoload_register('chargerClass');
if(isset($_POST['Ajouter'])){
    $contact = [
        "nom" => $_POST['nom'],
        "prenom"=>$_POST['prenom'],
        "telephone"=>$_POST['tel'],
        "favoris"=>$_POST['favoris']
    ];
    $contact = new Contact($contact);

    $manager = new ContactManager();
    $manager->getConnection();
}


if(isset($_POST['supprimer'])){
    $id = $_POST['id'];
    $manager = new ContactManager;
    $manager->Supprimer($id);
}
