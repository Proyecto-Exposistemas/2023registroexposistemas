/* Selecting the elements that we will be working with. */
const selected = document.querySelector(".selected");
const optionsContainer = document.querySelector(".options-container");
const searchBox = document.querySelector(".search-box input");

const optionsList = document.querySelectorAll(".option");

/* Adding an event listener to the selected element. When the selected element is clicked,
the optionsContainer classList is toggled to active. The searchBox value is set to an empty string
and the filterList function is called with an empty string as the argument. If the optionsContainer
classList contains active, the searchBox is focused. */
selected.addEventListener("click", () => {
  optionsContainer.classList.toggle("active");

  searchBox.value = "";
  filterList("");

  if (optionsContainer.classList.contains("active")) {
    searchBox.focus();
  }
});

/* Adding an event listener to each option in the list. When the option is clicked, the
selected option is updated to the label of the option that was clicked. */
optionsList.forEach(o => { 
  o.addEventListener("click", () => {
    selected.innerHTML = o.querySelector("label").innerHTML;
    optionsContainer.classList.remove("active");
  });
});

/* Listening for a keyup event on the search box and then calling the filterList function with the
value of the search box as the argument. */
searchBox.addEventListener("keyup", function(e) {
  filterList(e.target.value);
});

/**
 * It takes a search term, converts it to lowercase, and then loops through each option in the list and
 * checks if the search term is contained in the label of the option. If it is, it displays the option,
 * otherwise it hides it
 */
const filterList = searchTerm => {
  searchTerm = searchTerm.toLowerCase();
  optionsList.forEach(option => {
    let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
    if (label.indexOf(searchTerm) != -1) {
      option.style.display = "block";
    } else {
      option.style.display = "none";
    }
  });
};
