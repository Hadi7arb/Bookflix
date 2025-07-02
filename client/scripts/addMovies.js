document.addEventListener('DOMContentLoaded', () => {
    const addMovieForm = document.getElementById('addMovieForm');
    const movieTitleInput = document.getElementById('movieTitle');
    const releaseDateInput = document.getElementById('releaseDate');
    const durationInput = document.getElementById('duration');
    const ageRestrictionInput = document.getElementById('ageRestriction');
    const directorIdInput = document.getElementById('directorId');
    const imageURLInput = document.getElementById('imageURL');
    const addMovieButton = document.getElementById('addMovieButton');
    const responseMessage = document.getElementById('responseMessage');

    if (!addMovieForm || !movieTitleInput || !releaseDateInput || !durationInput ||
        !ageRestrictionInput || !directorIdInput || !imageURLInput ||
        !addMovieButton || !responseMessage) {
        console.error('One or more required form elements for adding a movie were not found.');
        return;
    }

    addMovieForm.addEventListener('submit', async (event) => {
        event.preventDefault();

        responseMessage.textContent = '';
        responseMessage.className = 'message';

        const title = movieTitleInput.value.trim();
        const release_date = releaseDateInput.value.trim();
        const duration = durationInput.value ? parseInt(durationInput.value, 10) : null;
        const age_restriction = ageRestrictionInput.value.trim();
        const director_id = directorIdInput.value ? parseInt(directorIdInput.value, 10) : null;
        const imageURL = imageURLInput.value.trim();

        if (!title || !release_date || !duration || !age_restriction || !director_id || !imageURL) {
            responseMessage.textContent = 'All fields are required.';
            responseMessage.classList.add('error');
            return;
        }

        if (isNaN(duration) || duration <= 0) {
            responseMessage.textContent = 'Duration must be a positive number.';
            responseMessage.classList.add('error');
            return;
        }
        if (isNaN(director_id) || director_id <= 0) {
            responseMessage.textContent = 'Director ID must be a positive number.';
            responseMessage.classList.add('error');
            return;
        }

        addMovieButton.disabled = true;
        addMovieButton.textContent = 'Adding Movie...';

        try {
            const response = await axios.post(
                'http://localhost/Bookflix/server/controllers/post_movies.php',
                {
                    title: title,
                    release_date: release_date,
                    duration: duration,
                    age_restriction: age_restriction,
                    director_id: director_id,
                    imageURL: imageURL
                }
            );

            const data = response.data;

            if (data.status === 200) {
                responseMessage.textContent = data.message || 'Movie added successfully!';
                responseMessage.classList.add('success');
                addMovieForm.reset(); 
            } else {
                responseMessage.textContent = data.message || 'Failed to add movie. Please try again.';
                responseMessage.classList.add('error');
            }

        } catch (error) {
            if (error.response) {
                responseMessage.textContent = error.response.data.message || 'Server error during movie addition.';
                console.error('Add Movie error (Server Response):', error.response.status, error.response.data);
            } else if (error.request) {
                responseMessage.textContent = 'Network error. Please check your internet connection or server.';
                console.error('Add Movie error (No Response):', error.request);
            } else {
                responseMessage.textContent = 'An unexpected error occurred during request setup.';
                console.error('Add Movie error (Request Setup):', error.message);
            }
            responseMessage.classList.add('error');
        } finally {
            addMovieButton.disabled = false;
            addMovieButton.textContent = 'Add Movie';
        }
    });
});