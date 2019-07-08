# Beewake
Ajax and json manipulation exercice
Même exercice sous Symfony3 : https://github.com/Clemenard/symfony_sandbox

J'ai commencé par importer les données, les ai mis en cookie puis affichées en html.
Je me suis ensuite concentré sur la définition de la classe User, ses getter/setters et son crud (améliorables, par exemple en plaçant des restrictions sur les formats des champs)
J'ai affiné mes fonctions pour qu'un maximum de choses soient définies au sein de la classe
Puis j'ai reproduit le rendu de la page
Il me reste encore à améliorer ma gestion d'erreurs, qui reste très basique

Je ne sais pas encore me servir de Docker, je vais étudier la question


--
Après une nuit de sommeil, nouvelles idées
Dans quelles conditions ce code serait il utile?
On peut imaginer que l'application ait une base d'utilisateurs, mais propose aux utilisateurs venant d'une autre application de se connecter (GET) ou de s'inscrire en important leurs données (ADD). Ils peuvent aussi vouloir synchroniser leurs données avec celles de l'application externe (UPDATE). 
L'appel à l'application externe se ferait dans le cadre d'une de ces trois opérations, le DELETE n'ayant à priori pas de lien direct avec elle.

Il faudrait donc recréer la classe User en php et y adjoindre les requetes pdo permettant la communication avec la bdd, en plus de créer cette dernière
Et enfin, prévoir une interface permettant à l'utilisateur de se connecter/s'inscrire/éditer son compte/le supprimer, ainsi qu'une page listant les utilisateurs interne plus externes en les différenciants

Note : Il est possible de prévoir deux classes filles ExternalUser et InternalUser si les propriétés des deux objets ont des différences

--
Structure de l'app : 


--Index.php--


Login --> charge en session un utilisateur interne ou externe

Logout (if session['user']) --> supprime de la session l'utilisateur courant

Suscribe --> form.php

-Affiche tous les utilisateurs internes-

For internal users

//Edit --> form.php avec les infos chargées

//Delete --> supprime l'utilisateur de la bdd et le logout

//Sync (if email intern=email extern) -->fait correspondre les données internes de l'utilisateur aux données externes

-Affiche tous les utilisateurs externes qui ne sont pas aussi internes-


-- Form.php --


Si en mode édition, permet d'updater le profil session et bdd

Si en mode inscription, permet d'ajouter un utilisateur en base

En mode inscription, permet de charger un profil externe si l'email correspond

Bouton retour à l'accueil --> index.php



