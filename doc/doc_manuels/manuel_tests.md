# Tests unitaires

## Docker

Il est possible d'utiliser le ficher docker-compose alternatif pour forcer le lancement des tests unitaires avant celui des containers principaux. Attention ! Si les tests échouent, les containers seront fermés et il ne sera pas possible de naviguer sur le site.

Lancer la commande :
```bash
docker-compose -f docker-compose.tests.yml up --build
```
L'argument ``--build`` est indispensable, même si ce n'est pas la première fois que la commande est lancée, sans quoi les tests ne se lançeront pas.


## Lancement manuel

On suppose se trouver dans un environnement UNIX pour l'utilisation des scripts suivants.
Paramétrer le fichier tests/configTest.ini suivant les paramètres de la base de données locale
Exécuter les scripts suivants depuis la racine du projet :

### Installer les dépendances
Lancer le script
```bash
./install-phpunit.sh
```

### Lancer les tests
Lancer le script
```bash
./runTests.sh
```


# Tests de validation

## Installer les prérequis

- Installer Python 2.7 ou 3.5+
- Installer les dépendances du script :
```bash
pip install pytest
pip install selenium
```
- Télécharger __chromedriver__ : https://chromedriver.chromium.org/downloads
- Ajouter __chromedriver__ au path : https://zwbetz.com/download-chromedriver-binary-and-add-to-your-path-for-automated-functional-testing/

## Lancer les tests de validation

- Définir une url où le site est hébergé dans le fichier **/tests\_validation/url.txt**
- Lancer le script de test depuis le dossier **/tests\_validation** avec la commande suivante :
```bash
python tests.py
```

Les logs sont consultables dans le dossier __log/__ (nouvellement créé s'il n'existait pas auparavant) 

Le nom des fichiers suit ce format : __log\_\[année\]\[mois\]\[jour\]-\[heure\]\[minutes\]\[secondes\].txt__

Cela permet d'avoir un suivi dans le temps du résultat de l'exécution des tests