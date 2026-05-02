# 📚 UniLearn — Plateforme e-learning (PHP/MySQL)

Application web e-learning développée en **PHP** avec une base de données **MySQL**, dans le cadre d'un projet de développement web étudiant. UniLearn propose un environnement complet pour les étudiants et enseignants, avec gestion des cours, quiz, messagerie et forum, le tout sécurisé par un système d'authentification par rôle.

---

## 📸 Aperçu

### Page de connexion / inscription
<img width="2188" height="1120" alt="Capture d&#39;écran 2026-05-02 151209" src="https://github.com/user-attachments/assets/93492c3b-5229-40c7-9f46-cf0ebd3af24e" />


### Tableau de bord
<img width="752" height="774" alt="Capture d&#39;écran 2026-05-02 151240" src="https://github.com/user-attachments/assets/dda87029-28db-44fa-a25f-4a553d253e4e" />


---

## ✨ Fonctionnalités

- **Authentification** par rôle (étudiant, enseignant, admin) avec inscription et connexion sécurisées
- **Cours** — consultation et gestion des contenus pédagogiques
- **Quiz** — évaluation des connaissances
- **Résultats** — suivi des performances par étudiant
- **Messagerie** — communication entre utilisateurs
- **Forum** — espace d'échange et de discussion
- **Annonces** — diffusion d'informations importantes
- **Déconnexion** sécurisée avec destruction de session
- Mots de passe **hashés** avec `password_hash()`
- Requêtes **PDO préparées** contre les injections SQL
- Interface **responsive** avec Bootstrap 5 et Font Awesome

---

## 📁 Structure du projet

```
devWeb/
├── index.php        # Page de connexion
├── register.php     # Page d'inscription avec choix de rôle
├── home.php         # Page d'accueil après connexion
├── users.php        # Panneau admin — liste des utilisateurs
├── delete_user.php  # Suppression d'un utilisateur
├── logout.php       # Déconnexion
├── navbar.php       # Barre de navigation (Cours, Quiz, Résultats, Messages, Forum, Annonces)
├── db.php           # Connexion PDO à la base de données
├── link.php         # Inclusion des CDN (Bootstrap, Font Awesome)
└── users.sql        # Script SQL de création de la table users
```

---

## 🗄️ Schéma de la base de données

Base de données : `gestionstock`

**Table `users`**

| Colonne    | Type          | Description                      |
|------------|---------------|----------------------------------|
| `id`       | INT (PK, AI)  | Identifiant unique                |
| `name`     | VARCHAR(50)   | Nom complet                       |
| `username` | VARCHAR(50)   | Nom d'utilisateur                 |
| `mail`     | VARCHAR(100)  | Adresse email (unique)            |
| `phone`    | VARCHAR(20)   | Numéro de téléphone               |
| `mdp`      | VARCHAR(255)  | Mot de passe haché                |
| `sexe`     | VARCHAR(20)   | Genre (homme / femme / autre)     |
| `access`   | INT(2)        | Niveau d'accès : 0=user, 1=admin  |

---

## ⚙️ Prérequis

- **PHP** ≥ 8.0
- **MySQL** ≥ 5.7
- Serveur web local : [XAMPP](https://www.apachefriends.org/), [WAMP](https://www.wampserver.com/), ou équivalent

---

## 🚀 Installation

### 1. Cloner le dépôt

```bash
git clone https://github.com/Hadiza06/devWeb.git
```

Placer le dossier dans le répertoire de votre serveur local (ex. `htdocs/` pour XAMPP).

### 2. Créer la base de données

Dans phpMyAdmin (ou MySQL CLI), créer une base `gestionstock` puis importer le fichier SQL :

```sql
CREATE DATABASE gestionstock;
USE gestionstock;
SOURCE users.sql;
```

### 3. Configurer la connexion

Ouvrir `db.php` et renseigner vos identifiants MySQL :

```php
$pdo = new PDO('mysql:host=localhost;dbname=gestionstock', 'root', 'votre_mot_de_passe');
```

### 4. Lancer l'application

Démarrer Apache et MySQL via XAMPP, puis ouvrir :

```
http://localhost/devWeb/index.php
```

---

## 🔐 Accès administrateur

Un compte admin de test est inclus dans `users.sql` (access = 1). Il permet d'accéder à la page `users.php` et de gérer les utilisateurs. Changez le mot de passe par défaut après installation.

---

## 🛠️ Technologies utilisées

| Technologie   | Rôle                              |
|---------------|-----------------------------------|
| PHP 8         | Backend, sessions, logique métier |
| MySQL         | Base de données                   |
| PDO           | Requêtes préparées sécurisées     |
| Bootstrap 5   | Interface responsive              |
| Font Awesome  | Icônes de navigation              |

---

## 📜 Licence

Projet académique — libre d'utilisation à des fins éducatives.
