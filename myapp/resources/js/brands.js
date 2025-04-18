const brandBanner = document.querySelector('#brand-banner');

function createImage(src) {
  const img = document.createElement('img');
  const formattedSrc = src.replace(/ /g, '_');

  img.src = `https://vehapi.com/img/car-logos/${formattedSrc.toLowerCase()}.png`;
  img.alt = `${src} Logo Image`;
  img.style.width = '7rem';
  img.style.height = '7rem';
  img.style.objectFit = 'contain';
  img.draggable = false;

  return img;
}

fetch('/api/brand/getAll')
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.json();
  })
  .then(data => {
    data['brands'].forEach(brand => {
      const imgElement = createImage(brand);
      brandBanner.appendChild(imgElement);
    });
  })
  .catch(error => {
    console.error('There was a problem with the fetch operation:', error);
  });