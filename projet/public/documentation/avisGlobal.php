<?php

require($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>
    <h3>Avis global sur le projet LO07</h3>

    Projet innovant sur une tématique actuelle. Mise en place d'un répertoire Git sous la platforme GitHub avec des branches
    pour le développement des features. Mix des langages de programmation : PHP, HTML, CSS, JS (pour les innovations),
    ce qui rend le projet complet et instructif. Langage au goût du jour et utilisable dans le monde professionel.
    Seul regret, ne pas avoir utilisé de framework ou à la rigueur micro-framework (pour la gestion d'objet par exemple
    ORM Doctrine).
    Après avoir essayer la dernière version de boostrap (sur un autre projet), il pourrait également etre intéressant de l'utilisée, en effet la rétrocompatibilitée
    permet d'utiliser toutes les fonctionnalitées utilisée actuellement et simplifierais certaines choses qui ne sont pas encore disponible dans la version 3.<br>
    <h4>Idées d'amélioration</h4>
    - voir d'autres langages rapidement (JS, react, node.js) + communiquer avec des API ou faire des
    API (CRUD, REST). Possibilité de voir le fonctionnement de logiciel comme Postman. (afin d'avoir plus de possiblitées pour
    le projet).
    Il serait intéressant sinon d'étudier le fonctionnement client serveur en séparant la partie client et serveur au moins
    de manière théorique. Cela permettrait peut-etre de mieux comprendre le protocole HTTP et aborder le développement du projet
    tel qu'il est prévu actuellement.
    Il pourrait etre intéressant de se renseigner sur l'aspect de sécurité avec les logins/mot de passe de la base de données qui sont
    stockés en clair dans un fichier.
    <br>
    <h4>Évolution du site</h4>
    Pour faire évoluer le site on pourrait rajouter un module de gestion de patient (avec un système d'inscription, d'enregistrement...).
    Pour les rendez-vous on pourrait également ajouter la gestion de la date et l'heure du rendez-vous.
    Il serait possible d'envoyer un rappel à l'utilisateur/ou une confirmation par mail que son rendez-vous a bien été réservé.
    Il pourrait etre intéressant d'ajouter plus de graphique afin de mieux visualiser les données, pour d'éviter d'avoir simplement
    une liste sous forme de tableau.

</div>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>