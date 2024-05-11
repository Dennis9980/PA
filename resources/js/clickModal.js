document.addEventListener("DOMContentLoaded", function () {
    // Function to toggle modal display
    function toggleModal(modalId, show) {
        const modal = document.querySelector(modalId);
        console.log(modalId);
        if (show) {
            modal.classList.remove("hidden");
            modal.classList.add("block");
        } else {
            modal.classList.add("hidden");
            modal.classList.remove("block");
        }
    }

    // Attach event listeners to buttons for opening modals
    document.querySelectorAll("[data-modal-toggle]").forEach((button) => {
        button.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent default button behavior
            event.stopPropagation(); // Stop the event from bubbling up
            const modalId = "#" + button.getAttribute("data-modal-toggle");
            toggleModal(modalId, true); // Show the modal
        });
    });

    // Attach event listeners to buttons for closing modals
    document.querySelectorAll("[data-modal-hide]").forEach((button) => {
        button.addEventListener("click", function (event) {
            event.preventDefault();
            event.stopPropagation();
            const modalId = "#" + button.getAttribute("data-modal-hide");
            toggleModal(modalId, false); // Hide the modal
        });
    });
});

