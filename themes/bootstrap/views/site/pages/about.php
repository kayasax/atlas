<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - A propos';
$this->breadcrumbs=array(
	'A propos',
);
?>


<div class='well'>
    
    <h3>Qu'est ce qu'Atlas ?</h3>
    <p>Atlas est une application web développée en PHP conçue pour répondre au besoin d'indexation et de réorganisation des documents du service informatique SMAC. <br/>
        Elle devrait donc petit à petit remplacer le dossier partagé FICHES et devenir le point central 
    <br/>
    </p>
    <p>
    Plusieurs éléments sont à l'oeuvre pour atteindre cet objectif : 
    
    <ul class='unstyled'>
        <li><strong>Un wiki </strong> fournit une méthode simple et rapide pour modifier  les documnet ce qui doit permettre d'obtenir une documentation <strong>la plus à jour possible</strong></li>
        <li><strong>Un gestionnaire de contenus </strong> possibilité d'attacher des fichiers aux pages</li>
        <li><strong>Un moteur de recherche performant</strong> actuellement le moteur n'indexe pas le contenu des fichiers, <strike>et il souffre de problème avec les caractères accentués</strike></li>
        <li><strong>Une recherche par tag </strong> permettant de trouver des sujets connexes</li>
        <li><strong>La possibilité de mettre en favoris </strong> des espaces ou des pages pour les retrouver en page d'accueil</li>
        <li><strong>Un système d'appreciation </strong> permettant de repérer les pages les plus appreciées</li>
        <li><strong>Des commentaires (à développer)</strong> permettant une interraction rapide au sein et entre les services</li>
        <li><strong>Des statistiques</strong> permettant de déterminer les documents obsolètes</li>
        <li><strong>Autre</strong> n'hésitez pas à suggérer des fonctionnalités</li>
    </ul>
</p>
</div>