function filter() {
  console.log('caca');
}

function vehicules() {
  const password = 'test';

  fetch(`/api/vehicules`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
  })
    .then(response => {
      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }
      return response.json();
    })
    .then(data => console.log(data)) // Affiche les données retournées par le serveur
    .catch(error => console.error('Erreur:', error.message)); // Affiche les erreurs
}

export { filter, vehicules };