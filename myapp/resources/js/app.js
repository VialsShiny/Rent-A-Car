import './bootstrap';
import 'remixicon/fonts/remixicon.css';
// Vérifiez l'URL actuelle
const currentUrl = window.location.pathname;

if (/^\/vehicule\/\d+$/.test(currentUrl)) {
  import('./brands')
    .catch(err => {
      console.error('Erreur lors de l\'importation du module brands:', err);
    });
}

if (currentUrl.includes('/vehicules')) {
  import('./filter').then(module => {
  }).catch(err => {
    console.error('Erreur lors de l\'importation du module filter:', err);
  });
}

if (currentUrl.includes('/reservation')) {
  import('./date').then(module => {
  }).catch(err => {
    console.error('Erreur lors de l\'importation du module date:', err);
  });
}

if (currentUrl.includes('/reservation')) {
  import('./reservation').then(module => {
  }).catch(err => {
    console.error('Erreur lors de l\'importation du module reservation:', err);
  });
}

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();