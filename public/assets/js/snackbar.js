// // Function to show a snackbar
// function triggerSnackbar(message, type) {
//   const snackbar = document.getElementById("snackbar");
//   const messageContainer = document.getElementById("snackbar-message");
//   const iconContainer = document.getElementById("snackbar-icon");

//   // Set the message and type (success or error)
//   messageContainer.textContent = message;

//   // Set appropriate icon based on type
//   if (type === "success") {
//     iconContainer.className = "fas fa-check-circle"; // Success icon
//     snackbar.className = `show success`;
//   } else if (type === "error") {
//     iconContainer.className = "fas fa-times-circle"; // Error icon
//     snackbar.className = `show error`;
//   }

//   // Auto-hide snackbar after 3 seconds
//   setTimeout(() => {
//     snackbar.className = "";
//   }, 3000);
// }

// // Function to manually close the snackbar
// function closeSnackbar() {
//   const snackbar = document.getElementById("snackbar");
//   snackbar.className = ""; // Hide the snackbar
// }
function triggerSnackbar(message, type) {
  const snackbar = document.getElementById("snackbar");
  const messageContainer = document.getElementById("snackbar-message");
  const iconContainer = document.getElementById("snackbar-icon");

  if (!snackbar) console.error("Snackbar element is missing.");
  if (!messageContainer) console.error("Message container is missing.");
  if (!iconContainer) console.error("Icon container is missing.");

  if (!snackbar || !messageContainer || !iconContainer) {
    console.error("Snackbar elements are missing in the DOM.");
    return;
  }

  messageContainer.textContent = message;

  if (type === "success") {
    iconContainer.className = "fas fa-check-circle";
    snackbar.className = "show success";
  } else if (type === "error") {
    iconContainer.className = "fas fa-times-circle";
    snackbar.className = "show error";
  }

  setTimeout(() => {
    snackbar.className = "";
  }, 3000);
}
