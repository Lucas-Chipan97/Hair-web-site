# LCS Salon - Système de Réservation pour Salon de Coiffure

![LCS Salon Logo](frontend/public/images/logo.png)

## 📋 À propos

LCS Salon est une application web moderne permettant aux clients de prendre rendez-vous en ligne dans un salon de coiffure. Le système offre une interface élégante et responsive pour les clients, ainsi qu'un tableau de bord d'administration pour les propriétaires du salon.

Ce projet utilise une architecture serverless et une gestion efficace des données avec PostgreSQL sur Neon Tech.

## ✨ Caractéristiques

- **Réservation en ligne** : Les clients peuvent voir les disponibilités et réserver un créneau
- **Gestion des rendez-vous** : Visualisation des rendez-vous par jour, semaine ou mois
- **Gestion des services** : Catalogue complet des services et tarifs
- **Notifications par email** : Confirmations automatiques et rappels
- **Interface responsive** : Accessible sur desktop, tablette et mobile
- **Administration sécurisée** : Tableau de bord protégé pour la gestion du salon

## 🏗️ Architecture technique

### Structure du projet

```
lcs-salon/
├── frontend/                  # Application frontend
│   ├── public/                # Ressources statiques
│   └── src/                   # Code source frontend
│
├── backend/                   # API backend
│   ├── api/                   # Points d'entrée API (fonctions serverless)
│   ├── config/                # Configuration
│   ├── models/                # Modèles de données
│   ├── middleware/            # Middleware
│   └── utils/                 # Fonctions utilitaires
│
└── database/                  # Scripts de base de données
    ├── schema.sql             # Schéma de base de données
    ├── seeds.sql              # Données initiales
    └── migrations/            # Migrations de schéma
```

### Technologies utilisées

- **Frontend** : HTML, CSS, JavaScript (React)
- **Backend** : Node.js, Fonctions Serverless
- **Base de données** : PostgreSQL sur Neon Tech
- **Hébergement** : Vercel/Netlify (frontend et API serverless)
- **Authentification** : JWT (JSON Web Tokens)

## 📊 Modèle de données

### Schéma de données

![Schéma de données](https://via.placeholder.com/800x600.png?text=Schema+de+Donnees)

### Tables principales

1. **services**
   - Catalogue des services proposés par le salon
   - Contient : `id`, `name`, `description`, `price`, `duration_minutes`, etc.

2. **clients**
   - Informations sur les clients du salon
   - Contient : `id`, `name`, `email`, `phone`, `last_visit_date`, etc.

3. **appointments**
   - Gestion des rendez-vous
   - Contient : `id`, `client_id`, `service`, `date`, `start_time`, `status`, etc.
   - Contrainte unique sur `(date, start_time)` pour éviter les doubles réservations

4. **admins**
   - Administrateurs du système
   - Contient : `id`, `username`, `password_hash`, `email`, etc.

### Relations

- Un client peut avoir plusieurs rendez-vous (relation one-to-many)
- Chaque rendez-vous est associé à un service spécifique
- Les plages horaires sont vérifiées pour éviter les chevauchements

## 🔄 Flux de données

### Processus de réservation

1. **Requête des disponibilités**
   ```
   GET /api/appointments/available-slots?date=2025-04-01
   ```

2. **Création d'un rendez-vous**
   ```
   POST /api/appointments
   {
     "name": "Jean Dupont",
     "email": "jean@example.com",
     "phone": "0612345678",
     "service": "Coupe Homme",
     "date": "2025-04-01",
     "time": "14:00",
     "notes": "Première visite"
   }
   ```

3. **Mise à jour du client dans la base de données**
   - Si client existant : mise à jour des informations
   - Si nouveau client : création d'une entrée

4. **Envoi d'un email de confirmation**
   - Utilisation des templates HTML
   - Informations de rendez-vous structurées

### Gestion des disponibilités

Le système calcule les créneaux disponibles en :
1. Récupérant tous les rendez-vous pour une date donnée
2. Filtrant les créneaux déjà réservés
3. Tenant compte des durées des services pour éviter les chevauchements

## 🚀 Installation et déploiement

### Prérequis

- Node.js v18 ou supérieur
- Compte Neon Tech (base de données PostgreSQL)
- Compte Vercel ou Netlify (déploiement)

### Configuration de la base de données

1. Créez une base de données sur [Neon Tech](https://neon.tech)
2. Exécutez les scripts de migration dans l'ordre :
   ```bash
   psql -h your-neon-host -d DBHair -U DBHair_owner -f database/migrations/001_initial.sql
   psql -h your-neon-host -d DBHair -U DBHair_owner -f database/migrations/002_add_services.sql
   ```

### Variables d'environnement

Créez un fichier `.env` à la racine du projet avec les variables suivantes :

```env
# Base de données
DATABASE_URL=postgresql://DBHair_owner:password@ep-host.aws.neon.tech/DBHair?sslmode=require

# JWT pour l'authentification
JWT_SECRET=your_jwt_secret_key

# Configuration email
SMTP_HOST=smtp.example.com
SMTP_PORT=587
SMTP_USER=your_email@example.com
SMTP_PASSWORD=your_email_password
SMTP_SECURE=false
EMAIL_FROM_NAME=Salon LCS
EMAIL_FROM_ADDRESS=contact@lcs-coiffure.fr
CONTACT_EMAIL=admin@lcs-coiffure.fr
```

### Déploiement

1. **Frontend et API serverless sur Vercel**
   ```bash
   vercel
   ```

2. **Ou sur Netlify**
   ```bash
   netlify deploy --prod
   ```

## 📊 Optimisation des performances

### Indexation de la base de données

Les index suivants ont été créés pour optimiser les requêtes fréquentes :
- `idx_appointments_date` : Optimise la recherche des rendez-vous par date
- Contrainte unique sur `(date, start_time)` : Garantit qu'aucun créneau ne puisse être réservé deux fois

### Mise en cache

- Les services (qui changent rarement) sont mis en cache côté client
- La liste des rendez-vous est actualisée automatiquement à intervalles réguliers

### Requêtes optimisées

Exemple d'optimisation pour la récupération des créneaux disponibles :
```javascript
async getAvailableTimeSlots(date) {
  // Récupère uniquement les créneaux déjà réservés au lieu de tous les rendez-vous
  const result = await db.query(
    'SELECT start_time FROM appointments WHERE date = $1',
    [date]
  );
  
  // Filtrage en mémoire plutôt que par une requête complexe
  const bookedTimeSlots = result.rows.map(row => row.start_time.substring(0, 5));
  return allTimeSlots.filter(slot => !bookedTimeSlots.includes(slot));
}
```

## 🔐 Sécurité

- **Hachage des mots de passe** : Utilisation de bcrypt pour sécuriser les informations d'identification
- **Protection CSRF** : Jetons anti-CSRF pour les formulaires
- **Validation des données** : Toutes les entrées utilisateur sont validées
- **Requêtes préparées** : Protection contre les injections SQL
- **HTTPS** : Toutes les communications sont cryptées

## 📱 Responsive Design

L'interface s'adapte automatiquement à différentes tailles d'écran :
- **Desktop** : Affichage complet avec toutes les fonctionnalités
- **Tablette** : Mise en page optimisée, navigation simplifiée
- **Mobile** : Interface concentrée sur les tâches essentielles

## 🤝 Contribution

Les contributions sont les bienvenues ! Voici comment procéder :

1. Forkez le projet
2. Créez une branche pour votre fonctionnalité (`git checkout -b feature/ma-fonctionnalite`)
3. Committez vos changements (`git commit -m 'Ajout de ma fonctionnalité'`)
4. Poussez vers la branche (`git push origin feature/ma-fonctionnalite`)
5. Ouvrez une Pull Request

## 📄 Licence

Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.

## 🙏 Remerciements

- [Neon Tech](https://neon.tech) pour l'hébergement PostgreSQL serverless
- [Vercel](https://vercel.com) pour l'hébergement de l'application
- Tous les contributeurs et testeurs qui ont aidé à améliorer ce projet
