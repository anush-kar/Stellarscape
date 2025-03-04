const API_KEY = config.NASA_API_KEY;
const APOD_URL = 'https://api.nasa.gov/planetary/apod';

const searchForm = document.getElementById('searchForm');
const apodTitle = document.getElementById('apodTitle');
const apodMedia = document.getElementById('apodMedia');
const apodExplanation = document.getElementById('apodExplanation');
const apodCopyright = document.getElementById('apodCopyright');

// Fetch APOD data
async function fetchAPOD(params = {}) {
  const url = new URL(APOD_URL);
  url.searchParams.set('api_key', API_KEY);

  // Add user-provided params
  Object.keys(params).forEach(key => url.searchParams.set(key, params[key]));

  try {
    const response = await fetch(url);
    const data = await response.json();
    displayAPOD(data);
  } catch (error) {
    console.error('Error fetching APOD:', error);
    alert('Failed to fetch data. Please try again.');
  }
}

// Display APOD data
function displayAPOD(data) {
  apodTitle.textContent = data.title;
  apodExplanation.textContent = data.explanation;
  apodCopyright.textContent = data.copyright ? `Copyright: ${data.copyright}` : '';

  if (data.media_type === 'image') {
    apodMedia.innerHTML = `<img src="${data.url}" alt="${data.title}">`;
  } else if (data.media_type === 'video') {
    apodMedia.innerHTML = `<iframe src="${data.url}" frameborder="0" allowfullscreen></iframe>`;
  }
}

// Handle form submission
searchForm.addEventListener('submit', (e) => {
  e.preventDefault();
  const formData = new FormData(searchForm);
  const params = Object.fromEntries(formData.entries());
  fetchAPOD(params);
});

// Fetch today's APOD by default
fetchAPOD();