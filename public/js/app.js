// public/js/app.js

// Delete Task Confirmation
document.addEventListener('DOMContentLoaded', function () {
    const deleteForms = document.querySelectorAll('.delete-form');

    deleteForms.forEach(form => {
        form.addEventListener('submit', function (event) {
            const confirmed = confirm('Are you sure you want to delete this task?');
            if (!confirmed) {
                event.preventDefault();
            }
        });
    });

    // Enable Bootstrap tooltips
    $('[data-toggle="tooltip"]').tooltip();
});


document.addEventListener('DOMContentLoaded', function () {
    // ... (previous code)

    // Enable Bootstrap tooltips
    $('[data-toggle="tooltip"]').tooltip();
});
