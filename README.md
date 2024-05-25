
## Gestionnaire de tâches

Ce code PHP crée une interface web pour gérer des tâches avec un titre, une description, une date de création, une date d'échéance et un statut. Les tâches sont affichées dans un tableau avec des fonctionnalités pour les modifier, les supprimer et mettre à jour leur statut.

## Fichiers inclus

-   `./model/config.php` : Ce fichier contient la configuration de la base de données et les fonctions pour interagir avec celle-ci.

## Fonctionnalités

1.  **Formulaire d'ajout de tâche** : Un formulaire HTML permet à l'utilisateur de saisir un titre, une description et une date d'échéance pour ajouter une nouvelle tâche.
2.  **Tableau des tâches** : Un tableau affiche toutes les tâches existantes avec leur titre, description, date de création, date d'échéance et statut.
3.  **Mise à jour du statut** : Un formulaire avec une case à cocher permet de mettre à jour le statut d'une tâche (terminée ou non).
4.  **Modification de tâche** : Un bouton "Modifier" permet d'afficher un formulaire pour modifier le titre, la description et la date d'échéance d'une tâche existante.
5.  **Suppression de tâche** : Un bouton "delete" affiche une boîte de dialogue de confirmation avant de supprimer une tâche.
6.  **Mise en évidence des tâches** : Les tâches terminées sont mises en évidence en vert, et les tâches dont la date d'échéance est dépassée sont mises en évidence en rouge.

## Technologies utilisées

-   HTML, CSS (Bootstrap)
-   PHP
-   JavaScript
