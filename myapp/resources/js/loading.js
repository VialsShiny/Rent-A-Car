const body = document.querySelector('body');

function CreateOverlay(id) {
  const element = document.querySelector(`#${id}`);
  body.style.overflow = 'hidden';
  element.classList.remove('hidden');
};

function SuppOverlay(id) {
  const element = document.querySelector(`#${id}`);
  body.style.overflow = 'visible';
  element.classList.add('hidden');
};

export { CreateOverlay, SuppOverlay };