import flatpickr from "flatpickr";
import { CreateOverlay, SuppOverlay } from './loading';

const form = document.querySelector('#rent-form');
const startDate = document.querySelector('#start_date');
const endDate = document.querySelector('#end_date');
const totalPriceText = document.querySelector('#total_price_text');
const totalPrice = document.querySelector('#total_price');
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

    totalPriceText.textContent = `$${daysDiff * price_per_day}`;
    totalPrice.value = daysDiff * price_per_day;
  } else {
    totalPriceText.textContent = `$0`;
    totalPrice.value = 0;
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
  fetch(`/api/send/rent/`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      name: form['name'],
      email: form['email'],
      vehicule_name: form['vehicule_name'],
      vehicule_id: form['vehicule_id'],
      start_date: form['start_date'],
      end_date: form['end_date'],
      total_price: form['total_price'],
    })
  })
    .then(response => {
      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }
      return response.json();
    })
    .then(data => {
      SuppOverlay('loading-message');

      if (!data['errors']) {
        confirmPopUp.show();
        setTimeout(() => {
          document.location.href = "/";
        }, 3000);
      }
    })
    .catch(error => {
      SuppOverlay('loading-message');
      console.error(error);
    });
}

const NamePopUp = new Popup({
  hideTitle: true,
  disableScroll: true,
  closeColor: '#5937E0',
  content: `
      <label for="name" class="text-lg font-semibold mb-2">Veuillez entrer votre nom pour la réservation :</label>
      <input type="text" id="name" name="name" required placeholder="Votre nom" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#5937E0]"/>
      <button id="submit-name" style="width: 100%; padding: 10px; background-color: #5937E0; color: white; border: none; border-radius: 5px; cursor: not-allowed; opacity: 0.5;" disabled>Confirmer</button>
      `,
  loadCallback: () => {
    const nameInput = document.getElementById("name");
    const submitButton = document.getElementById("submit-name");

    nameInput.addEventListener("input", () => {
      if (nameInput.value.trim() !== "") {
        submitButton.style.cursor = "pointer";
        submitButton.style.opacity = "1";
        submitButton.disabled = false;
      } else {
        submitButton.style.cursor = "not-allowed";
        submitButton.style.opacity = "0.5";
        submitButton.disabled = true;
      }
    });

    submitButton.addEventListener("click", () => {
      const nameValue = nameInput.value.trim();
      if (nameValue) {
        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());
        data['name'] = nameValue;

        document.getElementById('start_date_error').classList.add('hidden');
        document.getElementById('end_date_error').classList.add('hidden');
        document.getElementById('email_error').classList.add('hidden');

        let hasError = false;

        if (!data.start_date) {
          document.getElementById('start_date_error').textContent = 'Le champ de date de début est requis.';
          document.getElementById('start_date_error').classList.remove('hidden');
          hasError = true;
        }

        if (!data.end_date) {
          document.getElementById('end_date_error').textContent = 'Le champ de date de fin est requis.';
          document.getElementById('end_date_error').classList.remove('hidden');
          hasError = true;
        }

        if (!data.email) {
          document.getElementById('email_error').textContent = 'L\'adresse e-mail est requise.';
          document.getElementById('email_error').classList.remove('hidden');
          hasError = true;
        }

        if (hasError) {
          NamePopUp.hide();
          return;
        }

        sendMail(data);
        NamePopUp.hide();
        CreateOverlay('loading-message');
      }
    });
  },
});

const confirmPopUp = new Popup({
  hideTitle: true,
  disableScroll: true,
  closeColor: '#5937E0',
  content: `
    <div class="flex flex-col items-center p-6">
      <div id="confirmation-message" class="flex flex-col items-center mt-4">
        <p class="text-lg font-semibold mb-2">Votre réservation a été envoyée avec succès !</p>
        <button id="close-confirm" style="width: 100%; padding: 10px; background-color: #5937E0; color: white; border: none; border-radius: 5px; cursor: pointer;">Fermer</button>
      </div>
    </div>
  `,
});


form.addEventListener('submit', (e) => {
  e.preventDefault();

  NamePopUp.show();
});

getReservation(vehiculeID.value);