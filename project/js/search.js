
// // JavaScript function to redirect to a specific page based on search term
// function redirectToPage() {
//     const searchInput = document.getElementById('searchInput');
//     const searchTerm = searchInput.value.trim().toLowerCase();

//     // Redirect to specific pages based on search term
//     switch (searchTerm) {
//         case 'sales':
//             window.location.href = 'sale.php';
//             break;
//         case 'production':
//             window.location.href = 'production.php';
//             break;
//         case 'feed':
//             window.location.href = 'feed.php';
//             break;
//         case 'purchase':
//             window.location.href = 'purchase.php';
//             break;
//         case 'mortality':
//             window.location.href = 'mortality.php';
//             break;
//         case 'payroll':
//             window.location.href = 'payroll.php';
//             break;
//         default:
//             // If search term doesn't match any specific page, redirect to a general search results page or display an error message
//             alert('Page not found');
//             break;
//     }
// }

// // JavaScript function to handle form submission on search
// function handleSearchForm(event) {
//     event.preventDefault(); // Prevent form submission

//     // Redirect to page based on search term
//     redirectToPage();
// }

// // Event listener for form submission
// document.getElementById('searchForm').addEventListener('submit', handleSearchForm);

