# Conduite de Projet

## Groupe 1 Equipe 2

- Guillaume Floret
- Mathieu San Juan
- Joël Senjean


# Définition des rôles

### Visiteur
Un visiteur est une personne arrivant sur le site mais n'étant pas encore inscrite ou identifiée.

### Utilisateur
Ce rôle représente toutes les personnesqui ont un compte actif et qui sont connectés sur le site. Le rôle "existe" en dehors des projets, c'est à dire sur la page d'accueil et dans la navigation générale du site.

### Chef de Projet
Représente un utilisateur qui a créé un nouveau projet. En tant que créateur et chef, il est celui qui gère l'administration du projet, et a plus de droits que les autres membres. Il a la possibilité de transmettre son rôle à un autre membre (un seul chef peut exister simultanément par projet).

### Membre
Ce rôle regroupe tous les membres d'un projet n'étant pas chef de ce projet. Ils ont des droits plus limités que le chef et ne peuvent rejoindre le projet qu'avec son accord (invitation ou demande).

### Participant
Ce rôle regroupe le chef de projet et le membre d'un projet. Sur certains aspects du site, ils ont les mêmes droits.

### Administrateur
Les administrateurs ont les droits les plus élevés sur le site, ils ont accès à la liste des membres et à certaines de leurs informations (non-confidentielles : donc pas les mots de passe, etc ...). Ils gèrent l'administration du site.


# Backlog


| ID     | Description                                                                                                                                                                                                 | Effort    | Urgence       | Etat | 
|--------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|-----------|---------------|------| 
| US1    | **En tant que** visiteur                                                                                                                                                                                    | 3         |               |      | 
|        | **je peux** m'inscrire sur le site en renseignant :                                                                                                                                                         |           |               |      | 
|        | - Un nom d'utilisateur                                                                                                                                                                                      |           |               |      | 
|        | - Une adresse mail valide                                                                                                                                                                                   |           |               |      | 
|        | - Une confirmation d'adresse mail                                                                                                                                                                           |           |               |      | 
|        | - Un mot de passe                                                                                                                                                                                           |           |               |      | 
|        | - Une confirmation de mot de passe                                                                                                                                                                          |           |               |      | 
|        | - Vrai nom                                                                                                                                                                                                  |           |               |      | 
|        | - Vrai prenom                                                                                                                                                                                               |           |               |      | 
|        | **afin de** créer et rejoindre des projets                                                                                                                                                                  |           |               |      | 
| US2    | **En tant que** utilisateur                                                                                                                                                                                 | 2         |               |      | 
|        | **je peux** créer un projet en renseignant un nom et potentiellement une description.                                                                                                                       |           |               |      | 
|        | **afin de** devenir chef de ce projet                                                                                                                                                                       |           |               |      | 
| US3    | **En tant que** utilisateur                                                                                                                                                                                 | 5         |               |      | 
|        | **je peux** rechercher un projet par son nom grâce a la barre de recherche de projet                                                                                                                        |           |               |      | 
|        | **afin de** demander a le rejoindre                                                                                                                                                                         |           |               |      | 
| US4    | **En tant que** utilisateur                                                                                                                                                                                 | 3         |               |      | 
|        | **je peux** demander a rejoindre un projet grâce au bouton demander a rejoindre le projet                                                                                                                   |           |               |      | 
|        | **afin de** rejoindre un projet                                                                                                                                                                             |           |               |      | 
| US5    | **En tant que** chef de projet                                                                                                                                                                              | 3         |               |      | 
|        | **je peux** inviter des utilisateurs à rejoindre un projet en cliquant sur ajouter des membres puis je renseigne les noms des utilisateur que je souhaite ajouter                                           |           |               |      | 
|        | **afin de** les ajouter au projet                                                                                                                                                                           |           |               |      | 
| US6    | **En tant que** chef de projet                                                                                                                                                                              | 1         |               |      | 
|        | **je peux** répondre à des demandes d'inscription à mon projet depuis la page dédié en acceptant ou refusant les demande d'inscription                                                                      |           |               |      | 
|        | **afin de** les ajouter/refuser au projet                                                                                                                                                                   |           |               |      | 
| US7    | **En tant que** chef de projet                                                                                                                                                                              | 2         |               |      | 
|        | **je peux** supprimer un membre de projet en cliquant sur la gestion de projet et sur liste des membre puis en cliquant sur le bouton dédié                                                                 |           |               |      | 
|        | **afin de** qu'il ne participe plus au projet                                                                                                                                                               |           |               |      | 
| US8    | **En tant que** membre d'un projet                                                                                                                                                                          | 2         |               |      | 
|        | **je peux** me désinscrire d'un projet en cliquant sur mes projet puis sur ce desinscrire ou alors depuis la page de gestion du projet en cliquant sur quitter projet.                                      |           |               |      | 
|        | **afin de** ne plus participer a ce projet                                                                                                                                                                  |           |               |      | 
| US9    | **En tant que** chef de projet                                                                                                                                                                              | 3         |               |      | 
|        | **je peux** nommer un nouveau chef de projet dans la section gestion en cliquant sur transférer le rôle de chef de projet et choisir dans la liste des membres le nouveau chef                              |           |               |      | 
|        | **afin de** transferer les droits à un autre membre                                                                                                                                                         |           |               |      | 
| US10   | **En tant que** participant                                                                                                                                                                                 | 2         |               |      | 
|        | **je peux** créer une user story sur la page dédiée en cliquant sur le bouton lui ajouter un identifiant remplir les champs de description associé un effort et une valeur métier puis valider la création  |           |               |      | 
|        | **afin de** ajouter une nouvelle user story                                                                                                                                                                 |           |               |      | 
| US11   | **En tant que** chef de projet                                                                                                                                                                              | 2         |               |      | 
|        | **je peux** supprimer un projet en me rendant sur la page de mes projets et en appuyant sur le boutton de supression du projet et en validant mon choix                                                     |           |               |      | 
|        | **afin de** clôturer un projet                                                                                                                                                                              |           |               |      | 
| US12   | **En tant que** participant                                                                                                                                                                                 | 2         |               |      | 
|        | **je peux** définir des rôles pour les users story en cliquant sur le bouton d'ajout en entrant les informations nécessaires :                                                                              |           |               |      | 
|        | - Un nom de rôle                                                                                                                                                                                            |           |               |      | 
|        | - Une description                                                                                                                                                                                           |           |               |      | 
|        | **afin de** pouvoir les afficher et les associer à des users stories                                                                                                                                        |           |               |      | 
| US13   | **En tant que** participant                                                                                                                                                                                 | 2         |               |      | 
|        | **je peux** supprimer une user story en cliquant sur le bouton supprimer d'une user story puis valider la supression                                                                                        |           |               |      | 
|        | **afin de** l'enlever du backlog                                                                                                                                                                            |           |               |      | 
| US14   | **En tant que** participant                                                                                                                                                                                 | 2         |               |      | 
|        | "**je peux** modifier une user story en cliquant sur le bouton modifier d'une user story, puis en modifiant les partie que je veux changer et en sauvegardant les modifications"                            |           |               |      | 
|        | **afin de** d'éditer ses informations                                                                                                                                                                       |           |               |      | 
| US15   | **En tant que** participant                                                                                                                                                                                 | 5         |               |      | 
|        | **je peux** créer une tâche sur la page dédiée en renseignant les informations suivante :                                                                                                                   |           |               |      | 
|        | - Un identifiant                                                                                                                                                                                            |           |               |      | 
|        | - Un titre                                                                                                                                                                                                  |           |               |      | 
|        | - Une description                                                                                                                                                                                           |           |               |      | 
|        | - Un statut (fait, en cours, etc ...)                                                                                                                                                                       |           |               |      | 
|        | - (Optionnel) Un fichier (maquette, ...)                                                                                                                                                                    |           |               |      | 
|        | - (Optionnel) Une tâche parente                                                                                                                                                                             |           |               |      | 
|        | - Une user story associée                                                                                                                                                                                   |           |               |      | 
|        | **afin de** l'ajouter a la liste des taches                                                                                                                                                                 |           |               |      | 
| US16   | **En tant que** participant                                                                                                                                                                                 | 2         |               |      | 
|        | **je peux** modifier une tâche en cliquant sur le bouton modifier et en changeant les champs souhaités                                                                                                      |           |               |      | 
|        | **afin de** éditer ses informations                                                                                                                                                                         |           |               |      | 
| US17   | **En tant que** participant                                                                                                                                                                                 | 2         |               |      | 
|        | **je peux** supprimer les tâches en cliquant sur une tâche et en cliquant sur le bouton supprimer puis en validant                                                                                          |           |               |      | 
|        | **afin de** la retirer de la liste                                                                                                                                                                          |           |               |      | 
| US18   | **En tant que** participant                                                                                                                                                                                 | 2         |               |      | 
|        | **je peux** créer un test sur la page dédiée en renseignant les informations suivantes                                                                                                                      |           |               |      | 
|        | - Un nom                                                                                                                                                                                                    |           |               |      | 
|        | - Une description                                                                                                                                                                                           |           |               |      | 
|        | **afin de** ajouter  a la liste des tests                                                                                                                                                                   |           |               |      | 
| US19   | **En tant que** participant                                                                                                                                                                                 | 2         |               |      | 
|        | "**je peux** modifier un test en cliquant sur le bouton modifier du test, puis en changeant les champs souhaités, et en validant"                                                                           |           |               |      | 
|        | **afin de** d'éditer le test                                                                                                                                                                                |           |               |      | 
| US20   | **En tant que** participant                                                                                                                                                                                 | 3         |               |      | 
|        | **je peux** renseigner la réussite/échec du test en cliquant sur un bouton                                                                                                                                  |           |               |      | 
|        | **afin de** mettre à jour sa date de dernière execution et sa réussite/échec                                                                                                                                |           |               |      | 
| US21   | **En tant que** chef de projet                                                                                                                                                                              | 5         |               |      | 
|        | **je peux** ajouter un dépôt git de release dans la page de gestion de version (ou page de release)                                                                                                         |           |               |      | 
|        | **afin de** rendre consultable l'historique des versions de release                                                                                                                                         |           |               |      | 
| US22   | **En tant que** participant                                                                                                                                                                                 | 1         |               |      | 
|        | **je peux** consulter la page de gestion de version                                                                                                                                                         |           |               |      | 
|        | **afin de** voir toutes les versions du projet                                                                                                                                                              |           |               |      | 
| US23   | **En tant que** chef de projet                                                                                                                                                                              | 2         |               |      | 
|        | **je peux** modifier l'adresse du dépôt git dans la page de gestion de version                                                                                                                              |           |               |      | 
|        | **afin de** changer le dépôt de release                                                                                                                                                                     |           |               |      | 
| US24   | **En tant que** participant                                                                                                                                                                                 | 5         |               |      | 
|        | **je peux** ajouter une section de documentation sur la page dédiée en cliquant sur ajouter une documentation en renseignant :                                                                              |           |               |      | 
|        | - Un nom                                                                                                                                                                                                    |           |               |      | 
|        | - Une description                                                                                                                                                                                           |           |               |      | 
|        | - (Optionnel) Un fichier .md associé                                                                                                                                                                        |           |               |      | 
|        | **afin de** définir son statut (fait ou non)                                                                                                                                                                |           |               |      | 
| US25   | **En tant que** participant                                                                                                                                                                                 | 2         |               |      | 
|        | **je peux** modifier une section de documentation en cliquant sur le bouton modifier et en changeant les champs souhaités                                                                                   |           |               |      | 
|        | **afin de** editer ses informations et de joindre le fichier .md correspondant                                                                                                                              |           |               |      | 
| US26   | **En tant que** participant                                                                                                                                                                                 | 2         |               |      | 
|        | **je peux** supprimer une section de documentation en cliquant sur le bouton supprimer d'une documentation                                                                                                  |           |               |      | 
|        | **afin de** la supprimer de la liste                                                                                                                                                                        |           |               |      | 
| US27   | **En tant que** visiteur                                                                                                                                                                                    | 3         |               |      | 
|        | **je peux** utiliser mes identifiants sur la page de connexion en renseignant:                                                                                                                              |           |               |      | 
|        | - Mon login                                                                                                                                                                                                 |           |               |      | 
|        | - Mon mot de passe                                                                                                                                                                                          |           |               |      | 
|        | **afin de** me connecter sur le site                                                                                                                                                                        |           |               |      | 
| US28   | **En tant que** administrateur                                                                                                                                                                              | 5         |               |      | 
|        | **je peux** accéder à la liste des utilisateurs du site depuis la page administration                                                                                                                       |           |               |      | 
|        | **afin de** gérer les utilisateurs                                                                                                                                                                          |           |               |      | 
| US29   | **En tant que** administrateur                                                                                                                                                                              | 3         |               |      | 
|        | **je peux** modifier le rôle d'un utilisateur depuis la page d'administration en cliquant sur le bouton modifier le rôle                                                                                    |           |               |      | 
|        | **afin de** changer son rôle                                                                                                                                                                                |           |               |      | 
| US30   | **En tant que** administrateur                                                                                                                                                                              | 2         |               |      | 
|        | "**je peux** supprimer un utilisateur depuis la page administration en cliquant sur le bouton supprimer l'utilisateur, puis en validant"                                                                    |           |               |      | 
|        | **afin de** effacer ses informations et son compte du site                                                                                                                                                  |           |               |      | 
| US31   | **En tant que** utilisateur ou administrateur                                                                                                                                                               | 2         |               |      | 
|        | **je peux** me déconnecter en cliquant sur le bouton de déconnexion                                                                                                                                         |           |               |      | 
|        | **afin de** ne plus être identifié sur le site                                                                                                                                                              |           |               |      | 