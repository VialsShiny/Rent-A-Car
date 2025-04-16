import flatpickr from "flatpickr";

const form = document.querySelector('#rent-form');
const startDate = document.querySelector('#start_date');
const endDate = document.querySelector('#end_date');
const totalPrice = document.querySelector('#total_price_text');
const vehiculeID = document.querySelector('#vehicule_id');

function getTomorrow() {
  const today = new Date();
  today.setDate(today.getDate() + 1);
  return today;
}

function checkPrice(selectedDates, price_per_day) {
  if (selectedDates.length > 0) {
    const startDateValue = startDate._flatpickr.selectedDates[0];
    const endDateValue = endDate._flatpickr.selectedDates[0];

    if (!startDateValue || !endDateValue || isNaN(startDateValue.getTime()) || isNaN(endDateValue.getTime())) {
      return;
    }

    const timeDiff = endDateValue - startDateValue;
    const daysDiff = Math.floor(timeDiff / (1000 * 3600 * 24)) + 1;

    console.log(price_per_day);
    console.log(daysDiff);

    totalPrice.textContent = `$${daysDiff * price_per_day}`;
  } else {
    totalPrice.textContent = `$0`;
  }
}

function createDisableDate(start, end) {
  return {
    from: `${start}`,
    to: `${end}`
  };
}

function getReservation(id) {
  fetch(`/api/get/allReservation`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      id,
    })
  })
    .then(response => {
      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }
      return response.json();
    })
    .then(data => {
      let vehicule = data['vehicule'];
      data = data['reservations'];

      if (!data[1]) {
        data = data[0];
        console.log(data['start_date']);
        return;
      }

      let disables = [];
      let price_per_day = vehicule['price_per_day'];

      data.forEach((table) => {
        disables.push(createDisableDate(table['start_date'], table['end_date']));
      });

      flatpickr(startDate, {
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
        disable: disables,
        minDate: getTomorrow(),
        onChange: function (selectedDates) {
          if (selectedDates.length > 0) {
            const nextDay = new Date(selectedDates[0]);
            nextDay.setDate(nextDay.getDate() + 1);
            endDate._flatpickr.set('minDate', nextDay);
          } else {
            endDate._flatpickr.set('minDate', getTomorrow());
          }

          checkPrice(selectedDates, price_per_day);
        }
      });

      flatpickr(endDate, {
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
        disable: disables,
        minDate: getTomorrow(),
        onChange: function (selectedDates) {
          checkPrice(selectedDates, price_per_day)
        },
      });
    })
    .catch(error => console.error('Erreur:', error.message));
}

function sendMail(form) {
  const formData = new FormData(form);
  const data = Object.fromEntries(formData.entries()); // Convertir FormData en objet

  console.log(data); // Afficher les données du formulaire

  fetch(`/api/vehicule-mail`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      name: data['email'],
    })
  })
    .then(response => {
      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }
      return response.json();
    })
    .then(data => {
      console.log(data); // Afficher la réponse de l'API
    })
    .catch(error => console.error('Erreur:', error.message));
}

form.addEventListener('submit', (e) => {
  e.preventDefault(); // Empêcher le rechargement de la page

  sendMail(form); // Appeler la fonction sendMail avec le formulaire
});

getReservation(vehiculeID.value);