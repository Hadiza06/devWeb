# 🌐 devWeb — Application web PHP avec gestion d'utilisateurs

Application web développée en **PHP** avec une base de données **MySQL**, intégrant un système complet d'authentification et de gestion des utilisateurs. L'interface utilise **Bootstrap 5** et **Font Awesome** pour le rendu visuel.

---

## ✨ Fonctionnalités

- **Inscription** avec validation des champs (username, nom, email, téléphone, genre, mot de passe)
- **Connexion** par email et mot de passe avec gestion de session
- **Déconnexion** sécurisée
- **Page d'accueil** protégée, accessible uniquement aux utilisateurs connectés
- **Panneau d'administration** — liste des utilisateurs avec indicateur de rôle (admin / user)
- **Suppression d'utilisateur** réservée aux administrateurs
- **Contrôle d'accès par rôle** : champ `access` (0 = user, 1 = admin)
- Mots de passe **hashés** avec `password_hash()` (PHP)
- Requêtes préparées **PDO** pour se protéger des injections SQL

---

## 📁 Structure du projet

```
devWeb/
├── index.php        # Page de connexion
├── register.php     # Page d'inscription
├── home.php         # Page d'accueil (utilisateur connecté)
├── users.php        # Tableau de bord admin — liste des utilisateurs
├── delete_user.php  # Suppression d'un utilisateur
├── logout.php       # Déconnexion
├── navbar.php       # Barre de navigation partagée
├── db.php           # Connexion PDO à la base de données
├── link.php         # Inclusion des CDN (Bootstrap, Font Awesome)
└── users.sql        # Script SQL de création de la table users
```

---

## 🗄️ Schéma de la base de données

Base de données : `gestionstock`

**Table `users`**

| Colonne    | Type          | Description                     |
|------------|---------------|---------------------------------|
| `id`       | INT (PK, AI)  | Identifiant unique               |
| `name`     | VARCHAR(50)   | Nom complet                      |
| `username` | VARCHAR(50)   | Nom d'utilisateur                |
| `mail`     | VARCHAR(100)  | Adresse email (unique)           |
| `phone`    | VARCHAR(20)   | Numéro de téléphone              |
| `mdp`      | VARCHAR(255)  | Mot de passe haché               |
| `sexe`     | VARCHAR(20)   | Genre (homme / femme / autre)    |
| `access`   | INT(2)        | Niveau d'accès : 0=user, 1=admin |

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

Un compte admin de test est inclus dans `users.sql` (access = 1). Il vous permet d'accéder à la page `users.php` et de gérer les utilisateurs. Changez le mot de passe par défaut après installation.

---

## 📜 Licence

Projet académique — libre d'utilisation à des fins éducatives.
