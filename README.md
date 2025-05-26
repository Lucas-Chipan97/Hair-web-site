# 📅 Calendrier de Réservations Horaires

> Interface administrateur simple et élégante pour gérer vos rendez-vous par créneaux horaires

<div align="center">
  
  ![Status](https://img.shields.io/badge/Status-Stable-brightgreen)
  ![Version](https://img.shields.io/badge/Version-1.0-blue)
  ![HTML5](https://img.shields.io/badge/HTML5-E34F26?logo=html5&logoColor=white)
  ![CSS3](https://img.shields.io/badge/CSS3-1572B6?logo=css3&logoColor=white)
  ![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?logo=javascript&logoColor=black)
  
</div>

## ✨ Fonctionnalités

<table>
<tr>
<td width="50%">

### 🔥 **Réservations**
- ⏰ Créneaux d'1 heure (8h-20h)
- 👤 Infos client complètes
- ✏️ Modification instantanée
- 🗑️ Suppression facile

</td>
<td width="50%">

### 🚀 **Blocage Intelligent**
- 🎯 Sélection multiple
- 🌅 Blocage matinée/après-midi
- 📅 Journée complète
- 🔒 Raisons personnalisées

</td>
</tr>
</table>

## 🎨 Interface

```
📱 Vue Mensuelle    →    📋 Vue Journalière    →    ⚙️ Mode Sélection
    ┌─────────┐           ┌─────────────┐           ┌─────────────┐
    │ 🟢 Libre │           │  8:00 Libre │           │ 🟠 Sélection│
    │ 🔴 Occupé│     →     │  9:00 Réservé│    →     │ 🔴 Réservé  │
    │ ⚫ Bloqué│           │ 10:00 Bloqué│           │ ⚫ Bloqué   │
    └─────────┘           └─────────────┘           └─────────────┘
```

## ⚡ Démarrage Rapide

```bash
# 1. Télécharger le fichier
📥 calendar.html

# 2. Ouvrir dans le navigateur
🌐 Double-clic sur le fichier

# 3. C'est prêt ! 🎉
```

## 🛠️ Personnalisation

<details>
<summary><b>🕐 Modifier les horaires</b></summary>

```javascript
// Changer les créneaux (ex: 9h-17h)
const timeSlots = [];
for (let i = 9; i <= 17; i++) {
    timeSlots.push(`${i}:00`);
}
```

</details>

<details>
<summary><b>🎨 Changer les couleurs</b></summary>

```css
:root {
    --libre: #ecf0f1;      /* Gris clair */
    --reserve: #e74c3c;    /* Rouge */
    --bloque: #95a5a6;     /* Gris */
    --selection: #f39c12;  /* Orange */
}
```

</details>

<details>
<summary><b>📱 Créneaux vue mensuelle</b></summary>

```javascript
// Modifier les créneaux affichés
const mainSlots = ['9:00', '13:00', '16:00', '19:00'];
```

</details>

## 📊 Statistiques

<div align="center">

| Métrique | Valeur |
|----------|--------|
| 📝 **Lignes de code** | ~800 |
| ⚡ **Temps de chargement** | < 1s |
| 📱 **Compatibilité** | 95%+ navigateurs |
| 🎯 **Créneaux/jour** | 13 (8h-20h) |

</div>

## 🔄 Workflow

```mermaid
graph LR
    A[🏠 Accueil] --> B[📅 Vue Mensuelle]
    B --> C[👆 Clic jour]
    C --> D[📋 Vue Journalière]
    D --> E[⚙️ Mode Sélection]
    E --> F[🔒 Blocage]
    F --> B
    
    B --> G[👆 Clic créneau]
    G --> H[📝 Réservation]
    H --> B
```

## 🚀 Roadmap

- [ ] 💾 Sauvegarde automatique
- [ ] 📧 Notifications email
- [ ] 📊 Statistiques avancées
- [ ] 🌙 Mode sombre
- [ ] 📱 App mobile
- [ ] 🔄 Synchronisation cloud

## 🤝 Contribution

Envie d'améliorer le projet ? 
1. 🍴 Fork le repository
2. 🔧 Créez votre feature
3. 📤 Pull request

## 📞 Support

💬 **Contact** : https://linktr.ee/lcsbarber

---

<div align="center">
  
**⭐ Star ce projet si il vous aide !**

![Made with Love](https://img.shields.io/badge/Made%20with-❤️-red)
![Open Source](https://img.shields.io/badge/Open%20Source-💚-green)

</div>
