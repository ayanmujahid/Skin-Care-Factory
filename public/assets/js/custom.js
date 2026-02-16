document.addEventListener("DOMContentLoaded", function () {
  // Dynamic rating function
  function setRating(rating) {
    const percentage = (rating / 5) * 100; // Convert rating to percentage
    const filledStars = document.querySelector(".filled-stars");

    if (filledStars) {
      filledStars.style.width = `${percentage}%`;
    } else {
      console.error("Element '.filled-stars' not found in the DOM.");
    }
  }

  // Set rating to 2.1
  setRating(2.1);
});
