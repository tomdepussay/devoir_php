# Devoir PHP

A rendre avant le jeudi 12 décembre

Consignes :

- Conception
  - Création d'une table SQL user
- Inscription
  - Création d'une vue avec un formulaire
  - Validation des champs du formulaire avec affichage des erreurs si nécessaire
    - email, pwd, pwdConfirm, firstname, lastname, country
    - Pensez à vérifier l'unicité de l'email
    - Pensez à utiliser password hash
  - Insertion en BDD de l'utilisateur
  - Redirection sur la page de login
- Connexion
  - Création d'une vue avec un formulaire
  - Validation des champs avec vérifications des identifiants
    - Pensez à utiliser password verify
  - Redirection sur la page d'accueil et afficher dessus le prénom si l'user est connecté
- Déconnexion
  - Ajouter un lien de déconnexion
L'utilisation des models est facultatifs