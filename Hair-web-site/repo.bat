@echo off
REM Création du répertoire principal
mkdir lcs-salon
cd lcs-salon

REM Création de la structure frontend
mkdir frontend
mkdir frontend\public
mkdir frontend\public\images
mkdir frontend\public\images\services
mkdir frontend\src
mkdir frontend\src\assets
mkdir frontend\src\assets\css
mkdir frontend\src\components
mkdir frontend\src\pages
mkdir frontend\src\utils

REM Création de la structure backend
mkdir backend
mkdir backend\api
mkdir backend\config
mkdir backend\models
mkdir backend\middleware
mkdir backend\utils

REM Création de la structure de base de données
mkdir database
mkdir database\migrations

REM Création de fichiers de base
echo. > frontend\README.md
echo. > backend\README.md
echo. > README.md
echo. > .gitignore
echo. > .env.example
echo. > vercel.json

REM Structure frontend - fichiers clés
echo. > frontend\public\favicon.ico
echo. > frontend\public\robots.txt
echo. > frontend\public\images\logo.png
echo. > frontend\public\images\hero-background.jpg
echo. > frontend\public\images\services\coupe-homme.jpg
echo. > frontend\public\images\services\coupe-femme.jpg
echo. > frontend\public\images\services\coloration.jpg

REM Frontend source files
echo. > frontend\src\assets\css\main.css
echo. > frontend\src\assets\css\responsive.css
echo. > frontend\src\components\Header.js
echo. > frontend\src\components\Footer.js
echo. > frontend\src\components\ServiceCard.js
echo. > frontend\src\components\BookingForm.js
echo. > frontend\src\pages\HomePage.js
echo. > frontend\src\pages\BookingPage.js
echo. > frontend\src\pages\ConfirmationPage.js
echo. > frontend\src\utils\api.js
echo. > frontend\src\utils\dateUtils.js
echo. > frontend\src\App.js
echo. > frontend\src\index.js
echo. > frontend\package.json

REM Backend files
echo. > backend\api\appointments.js
echo. > backend\api\services.js
echo. > backend\api\contact.js
echo. > backend\api\auth.js
echo. > backend\config\database.js
echo. > backend\config\email.js
echo. > backend\models\Appointment.js
echo. > backend\models\Service.js
echo. > backend\models\Client.js
echo. > backend\models\Admin.js
echo. > backend\middleware\auth.js
echo. > backend\middleware\validation.js
echo. > backend\utils\emailTemplates.js
echo. > backend\utils\dateUtils.js
echo. > backend\package.json

REM Database files
echo. > database\schema.sql
echo. > database\seeds.sql
echo. > database\migrations\001_initial.sql
echo. > database\migrations\002_add_services.sql

echo Structure du projet créée avec succès!
cd ..