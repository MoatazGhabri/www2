

function searchFormHandler() {
    const form = document.getElementById("searchForm");

    form.addEventListener("submit", (event) => {
        // Don't prevent default - let the form submit naturally to /properties
        // The form action is already set to route('all_properties')
        
        // Optional: You can add console logging for debugging
        console.log('Search form submitting...');
    });
}

document.addEventListener("DOMContentLoaded", searchFormHandler);
