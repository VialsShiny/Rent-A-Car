# Rent-A-Car 🚗

## Description 📖

Rent-A-Car est une application Laravel qui permet de gérer la location de voitures. Ce projet inclut un seeder pour peupler la base de données avec des données de test.

## Prérequis ⚙️

Avant de commencer, assurez-vous d'avoir installé les éléments suivants :

- PHP (version 7.3 ou supérieure)
- Composer
- Node.js et npm
- MySQL ou un autre système de gestion de base de données

## Installation 🛠️

Suivez les étapes ci-dessous pour installer le projet :

1. **Clonez le dépôt :**

   ```bash
   git clone https://github.com/VialsShiny/Rent-A-Car.git
   ```

2. **Accédez au répertoire du projet :**

   ```bash
   cd ./myapp/
   ```

3. **Installez les dépendances PHP :**

   ```bash
   composer install
   ```

4. **Installez les dépendances JavaScript :**

   ```bash
   npm install
   ```

5. **Configurez votre fichier `.env` :**

   - Copiez le fichier `.env.example` en `.env` :

     ```bash
     copy .env.example .env
     ```

   - Modifiez les paramètres de connexion à la base de données dans le fichier `.env`.

   - **Configuration de l'envoi d'e-mails :**

     Ajoutez ou modifiez les lignes suivantes dans votre fichier `.env` :

     ```env
     MAIL_MAILER=smtp
     MAIL_HOST=smtp.votre-fournisseur-email.com
     MAIL_PORT=587
     MAIL_USERNAME=votre-email@exemple.com
     MAIL_PASSWORD=votre-mot-de-passe
     MAIL_ENCRYPTION=tls
     MAIL_FROM_ADDRESS=votre-email@exemple.com
     MAIL_FROM_NAME="${APP_NAME}"
     ```

6. **Générez la clé d'application :**

   ```bash
   php artisan key:generate
   ```

7. **Exécutez les migrations :**

   ```bash
   php artisan migrate
   ```

8. **Exécutez le seeder :**

   ```bash
   php artisan db:seed --class=DatabaseSeeder
   ```

9. **Compilez les assets :**

   ```bash
   npm run dev
   ```

## Lancer l'application 🚀

Pour démarrer le serveur de développement, exécutez :

```bash
php artisan serve
```

L'application sera accessible à l'adresse `http://localhost:8000`.

## Liens utiles 🔗

- [Documentation Laravel](https://laravel.com/docs)
- [NPM Documentation](https://docs.npmjs.com/)

## Contribuer 🤝

Les contributions sont les bienvenues ! Veuillez soumettre une demande de tirage pour toute amélioration ou correction.

[![Fork me on GitHub](https://img.shields.io/badge/Fork%20me%20on-GitHub-blue.svg)](https://github.com/votre-utilisateur/rent-a-car/fork)
[![Open issues](https://img.shields.io/github/issues/votre-utilisateur/rent-a-car.svg)](https://github.com/votre-utilisateur/rent-a-car/issues)