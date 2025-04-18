const filterButtons = document.querySelectorAll('#filter input');
const vehiculesContainer = document.querySelector('#vehicules__container');
import { CreateOverlay, SuppOverlay } from './loading';

function checkButton() {
  const checkedValues = Array.from(filterButtons)
    .filter(btn => btn.checked)
    .map(btn => btn.dataset.id || btn.dataset.value);
  getVehicules(...checkedValues);
}

filterButtons.forEach(button => {
  button.addEventListener('click', checkButton);
});

function createVehiculeCard(vehicule) {
  console.log(vehicule);

  const brand = vehicule['brand'] ? vehicule['brand'].toLowerCase().replace(/\s+/g, '_') : 'default_name';
  const model = vehicule['model'] ? vehicule['model'].toLowerCase().replace(/\s+/g, '_') : 'default_model';

  const image = vehicule['vehicule_image'][0]['image_url'];

  const airConditioning = vehicule['air_conditioning'] === 1 ? 'Air Conditionner' : 'No Air Conditioning';

  const type = vehicule['fuel_type'] && vehicule['fuel_type'].length <= 3 ? vehicule['fuel_type'].toUpperCase() : vehicule['fuel_type'] || 'Unknown';

  const card = document.createElement('div');
  card.classList.add('flex', 'flex-col', 'gap-6', 'p-6', 'bg-gray-500/20', 'rounded-xl');
  card.innerHTML = `
  <img src="img/img-card/${image}" alt="${brand} ${model} car" class="blur-sm">
  <div class="w-full">
      <div class="flex justify-between">
          <strong class="text-md">${brand || 'Unknown Name'}</strong>
          <em class="text-indigo-500 font-bold text-md not-italic uppercase">$${vehicule['price_per_day'] || '0'}</em>
      </div>
      <div class="flex justify-between">
          <em class="text-sm">${model}</em>
          <p class="text-sm">per day</p>
      </div>
  </div>
  <div class="w-full grid grid-cols-3 gap-2">
      <div class="flex items-center justify-center gap-1">
          <i class="ri-draggable text-xl"></i>
          <em class="font-thin text-sm not-italic">${vehicule['transmission'] || 'Unknown'}</em>
      </div>
      <div class="flex items-center justify-center gap-1">
          <i class="ri-gas-station-fill text-xl"></i>
          <em class="font-thin text-sm not-italic">${type}</em>
      </div>
      <div class="flex items-center justify-center gap-1">
          <i class="ri-snowflake-fill text-xl"></i>
          <em class="font-thin text-sm not-italic">${airConditioning}</em>
      </div>
  </div>
  <a href="/vehicule/${vehicule['id']}" class="focus:outline-none text-white text-center bg-[#5937E0] hover:brightness-75 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 transition-all ease-in-out duration-300">
      View Details
  </a>
`;

  return card;
}

function getVehicules(vehicule_type, fuel_type, transmission) {
  CreateOverlay('loading-screen');
  fetch(`/api/vehicules`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      vehicule_type,
      fuel_type,
      transmission
    })
  })
    .then(response => {
      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }
      return response.json();
    })
    .then(data => {
      SuppOverlay('loading-screen');
      vehiculesContainer.innerHTML = '';

      data.forEach(vehicule => {
        const card = createVehiculeCard(vehicule);
        vehiculesContainer.appendChild(card);
      });
    })
    .catch(error => console.error('Erreur:', error.message));
}

checkButton();
