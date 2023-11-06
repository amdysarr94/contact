<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulaire des contacts</title>
</head>
<body>
    <header>
        <a href="form.php">Création contact</a>
        <a href="views/affichageplus.php">Affichage contact</a>
    </header>
    <form method="post" action="controllers/form.php">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom">
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom">
        <label for="tel">Téléphone</label>
        <input type="tel" name="tel" id="tel" value="+221">
        <label for="favoris">Favoris</label>
        <select id="favoris" name="favoris">
            <option value="oui">Oui</option>
            <option value="non">Non</option>
        </select>
        <input type="submit" name="Ajouter" value="Ajouter">
    </form>
    <footer>
        &copy; 2023
    </footer>
</body>
</html>
<?php
    echo "<style>
    body {
        font-family: Arial, sans-serif;
    }
    
    header {
        background-color: midnightblue;
        color: white;
        padding: 10px;
        text-align: center;
    }
    
    header a {
        color: white;
        text-decoration: none;
        margin: 10px;
        
    }
    
    form {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
    }
    
    label {
        display: block;
        margin-top: 10px;
    }
    
    input {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }".
    
    'label[for="nom"], label[for="prenom"], label[for="tel"], label[for="favoris"] {
        font-weight: bold;
    }
    
    input[type="radio"] {
        margin-right: 5px;
    }
    
    input[type="submit"] {
        background-color: midnightblue;
        color: white;
        border: none;
        padding: 10px 20px;
        margin-top: 10px;
        cursor: pointer;
    }
    
    footer {
        background-color: midnightblue;
        color: white;
        text-align: center;
        padding: 10px;
    }
    /* propriétes ajoutées */
    table {
        width: 100%;
        border-collapse: collapse;
    }
    
    table th {
        background-color: #191970; /* Bleu nuit */
        color: white;
        text-align: left;
        padding: 8px;
    }
    
    table tr:nth-child(even) {
        background-color: #f2f2f2; /* Couleur de fond pour les lignes paires (gris) */
    }
    
    table tr:nth-child(odd) {
        background-color: white; /* Couleur de fond pour les lignes impaires (blanc) */
    }
    
    table td {
        padding: 8px;
    }
    
    </style>';
?>