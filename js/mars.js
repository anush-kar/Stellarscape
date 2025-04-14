const API_KEY = window.config.NASA_API_KEY;
const MARS_PHOTOS_URL = window.config.MARS_PHOTOS_URL;

const searchForm = document.getElementById('searchForm');
const tableBody = document.getElementById('tableBody');
const roverName = document.getElementById('rovername');
const earthDate = document.getElementById('earthdate');
const roverStatus = document.getElementById('roverstatus');


async function fetchMarsPhotos(rover, date) {
    const url = `${MARS_PHOTOS_URL}/${rover}/photos?earth_date=${date}&api_key=${API_KEY}`;

    try {
        const response = await fetch(url);
        const data = await response.json();
        displayResults(data);
    } catch (error) {
        console.error('Error fetching Mars photos:', error);
        alert('Failed to fetch data. Please try again.');
    }
}

// Display Results
function displayResults(data) {
    // Clear previous results
    tableBody.innerHTML = '';
    roverName.textContent = '';
    earthDate.textContent = '';
    roverStatus.textContent = '';

    if (data.photos.length === 0) {
        alert('No photos found for the selected date and rover.');
        return;
    }

    // Display rover info
    const firstPhoto = data.photos[0];
    roverName.textContent = `Rover: ${firstPhoto.rover.name}`;
    earthDate.textContent = `Earth Date: ${firstPhoto.earth_date}`;
    roverStatus.textContent = `Status: ${firstPhoto.rover.status}`;

    // Populate table with photos
    data.photos.forEach(photo => {
        const row = document.createElement('tr');

        const cameraCell = document.createElement('td');
        cameraCell.textContent = photo.camera.full_name;
        row.appendChild(cameraCell);

        const imageCell = document.createElement('td');
        const img = document.createElement('img');
        img.src = photo.img_src;
        img.alt = `Mars photo taken by ${photo.camera.full_name}`;
        imageCell.appendChild(img);
        row.appendChild(imageCell);

        tableBody.appendChild(row);
    });
}

// Handle form submission
searchForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const date = document.getElementById('date').value;
    const rover = document.getElementById('rover').value;
    fetchMarsPhotos(rover, date);
});
