// JavaScript code for handling the "Types" dropdown

// Select the dropdown element
const select = document.getElementById('location');

// Select the custom location input element
const customLocationInput = document.getElementById('customLocation');

// Add event listener for the dropdown change event
select.addEventListener('change', function () {
    const selectedOption = select.value;

    // Check if the selected option is "other"
    if (selectedOption === 'other') {
        customLocationInput.classList.remove('hidden');
    } else {
        customLocationInput.classList.add('hidden');
    }
});
