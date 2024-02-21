// admin sidebar
const sidebar = document.getElementById('sidebar');
const toggle = document.getElementById('toggle');
const pageAccess = document.getElementById('pageAccess');
document.onclick = function(e) {
    if(e.target.id !== 'pageAccess' && e.target.id !== 'sidebar' && e.target.id !== 'toggle') {
        sidebar.classList.remove('active');
        toggle.classList.remove('active');
    }
}

toggle.onclick = function() {
    sidebar.classList.toggle('active');
    toggle.classList.toggle('active');
}
// admin sidebar

// admin sidebar show drowpdown on current page
document.addEventListener('DOMContentLoaded', function () {
    // Get the current page's URL
    var currentPage = window.location.href;

    // Check if the URL contains a specific string for each section
    if (currentPage.includes('dashboard')) {
        document.getElementById('dashboard').classList.add('show');
    } else if (currentPage.includes('circulation')) {
        document.getElementById('circulation').classList.add('show');
    } else if (currentPage.includes('userAccounts')) {
        document.getElementById('userAccounts').classList.add('show');
    } else if (currentPage.includes('libraryPages')) {
        document.getElementById('library-pages').classList.add('show');
    }

});
// admin sidebar show drowpdown on current page

document.getElementById("notificationButton").addEventListener("click", function(event) {
    var notificationContainer = document.getElementById("notificationContainer");
    if (notificationContainer.style.display === "none" || notificationContainer.style.display === "") {
        // Make the notification container visible
        notificationContainer.style.display = "block";
    } else {
        // Hide the notification container
        notificationContainer.style.display = "none";
    }
    // Prevent propagation of the click event to the body element
    event.stopPropagation();
});

document.body.addEventListener("click", function(event) {
    var notificationContainer = document.getElementById("notificationContainer");
    var notificationButton = document.getElementById("notificationButton");
    var target = event.target;
    if (target !== notificationContainer && target !== notificationButton) {
        // Click occurred outside of the notification container and button, hide the container
        notificationContainer.style.display = "none";
    }
});
