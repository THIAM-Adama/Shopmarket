# 🛒 Shopmarket — Solution E-Commerce Multi-Plateforme (API Backend & Application)

> **Projet e-commerce complet comprenant une API RESTful Backend développée sous Laravel et une architecture prête pour une interface client mobile/web.**

---

## 📌 Présentation du Projet

**Shopmarket** est une application e-commerce conçue pour offrir une expérience d'achat fluide et une gestion simplifiée du catalogue de produits. Le projet illustre la séparation des responsabilités entre un backend robuste (gestion des données, authentification, transactions) et des interfaces clientes.

---

## 🎯 Démarche Fonctionnelle & Conception

Le développement de Shopmarket a suivi les bonnes pratiques de gestion de projet informatique :

* **Analyse & Spécifications :** Définition du parcours utilisateur (parcours d'achat, panier, commande) et des règles de gestion e-commerce.
* **Modélisation de la base de données (Merise / UML) :**
  * **MCD / MLD :** Structuration des relations complexes (produits, catégories, commandes, utilisateurs, paniers).
  * **UML :** Diagrammes de séquences pour les flux de commande et d'authentification.
* **Conception d'API REST :** Normalisation des endpoints pour l'intégration d'applications tierces (Mobile / Web).
* **Prototypage UX/UI :** Maquettage des écrans principaux sous Figma.

---

## 🛠️ Architecture & Stack Technique

* **Backend / API :** PHP 8+, Laravel (API RESTful, Sanctum / JWT)
* **Base de données :** MySQL / MariaDB (ORM Eloquent)
* **Frontend / Mobile :** Flutter / Dart (ou Blade selon version)
* **Conception & Outils :** Figma, Merise / UML, Postman, Git & GitHub

---

## ✨ Fonctionnalités Principales

* 🔐 **Authentification & Gestion des comptes :** Inscription, connexion sécurisée et gestion des profils clients.
* 📦 **Gestion du Catalogue Produits :** Catégorisation, recherche, filtrage et fiches produits détaillées.
* 🛒 **Gestion du Panier & Commandes :** Ajout/suppression d'articles, calcul des totals et suivi du statut des commandes.
* 🔌 **API RESTful :** Endpoints documentés et sécurisés pour la communication entre le serveur et le client.

---

## 🚀 Installation & Lancement en local

### Prérequis
* PHP >= 8.1
* Composer
* MySQL / XAMPP

### Étapes d'installation

1. Cloner le projet : git clone https://github.com/THIAM-Adama/Shopmarket.git
2. Installer les dépendances : composer install
3. Configurer l'environnement : cp .env.example .env puis php artisan key:generate
4. Mettre à jour les identifiants de la base de données dans le fichier .env
5. Exécuter les migrations : php artisan migrate --seed
6. Lancer le serveur : php artisan serve (Accès sur http://127.0.0.1:8000)

---

## 📬 Contact

**Adama THIAM** — *Assistant Chef de Projet IT & Business Analyst Junior*  
* 🎓 Student @ ESGI Paris (Bachelor 3 MCSI)  
* 💼 LinkedIn : [thiam10](https://linkedin.com/in/thiam10)  
* 📧 Email : adathiam12zz@gmail.com
