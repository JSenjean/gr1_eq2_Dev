# Bugs connus

Ce fichier recense tous les bugs d'utilisation connus à destination des utilisateurs, ainsi que la manière de les contourner jusqu'à ce qu'ils soient fixés.

# Menu déroulant en haut à droite ne fonctionnant pas sur la page d'accueil une fois connecté

## Bug
Sur la page "Mes Projets", qui est aussi la page d'accueil qui s'affiche une fois connecté, le menu déroulant en haut à droite de l'écran n'est pas cliquable et ne peut donc pas afficher les éléments du menu.

## Solution de contournement
Ce menu se déroulera normalement sur n'importe quelle autre page du site, il suffit donc temporairement de se rendre sur une autre page, comme la page de la FAQ, pour utiliser ce menu.

## Origine du problème
La recherche de projet utilise des fonctionnalités de la bibliothèque beta de 'Bootstrap' 4 alors que le reste du site utilise la version stable de cette même bibliothèque. Cette page inclus 2 versions différentes de la même bibliothèque et provoque donc des conflits.


# Ajout de membre depuis la vue générale d'un projet sélectionné

## Bug
Sur la page "Vue générale" d'un projet préalablement sélectionné, le bouton "Ajouter des membres" ne fonctionne pas.

## Solution de contournement
Privilégier l'ajout de membre directement depuis la page précédente : "Mes Projets", en cliquant sur l'icône de croix bleue.

## Origine du problème
Le bouton n'a pas encore été associée aux fonctions d'ajout de membre
