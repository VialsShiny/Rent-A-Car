const filterButtons = document.querySelectorAll('#filter input');
const vehiculesContainer = document.querySelector('#vehicules__container');

function checkButton() {
  const checkedValues = [];

  filterButtons.forEach(btn => {
    if (btn.checked) {
      if (!btn.dataset.id) {
        return checkedValues.push(btn.dataset.value);
      }
      return checkedValues.push(btn.dataset.id);
    }
  });


  vehicules(checkedValues[0], checkedValues[1], checkedValues[2]);
}

filterButtons.forEach(button => {
  button.addEventListener('click', () => {
    checkButton();
  });
});

function vehicules(vehicule_type, fuel_type, transmission) {
  fetch(`/api/vehicules`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      vehicule_type: vehicule_type,
      fuel_type: fuel_type,
      transmission: transmission,
    })
  })
    .then(response => {
      if (!response.ok) {
        throw new Error(`HTTP error! status: {response.status}`);
      }
      return response.json();
    })
    .then(data => console.log(data))
    .catch(error => console.error('Erreur:', error.message));
}

checkButton();