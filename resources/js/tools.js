document.addEventListener('DOMContentLoaded', function() {
    const cleanFormButton = document.getElementById('clean-form');
    const authorField = document.getElementById('author');
    const titleField = document.getElementById('title');
    const bodyField = document.getElementById('body');

    cleanFormButton.addEventListener('click', function() {
        authorField.value = '';
        titleField.value = '';
        bodyField.value = '';
    });
});
