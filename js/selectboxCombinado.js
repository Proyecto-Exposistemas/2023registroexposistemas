const selected = document.querySelector(".selected")
const selected2 = document.querySelector(".selected2")

const optionsContainer = document.querySelector(".options-container")
const optionsContainer2 = document.querySelector(".options-container2")

const searchBox = document.querySelector(".search-box input")
const searchBox2 = document.querySelector(".search-box2 input")

const optionsList = document.querySelectorAll(".option")
const optionsList2 = document.querySelectorAll(".option2")

/* Primer selectbox */
selected.addEventListener("click", () => {
  optionsContainer.classList.toggle("active");

  searchBox.value = "";
  filterList("");

  if (optionsContainer.classList.contains("active")) {
    searchBox.focus();
  }
});

optionsList.forEach(o => { 
  o.addEventListener("click", () => {
    selected.innerHTML = o.querySelector("label").innerHTML;
    optionsContainer.classList.remove("active");
  });
});

searchBox.addEventListener("keyup", function(e) {
  filterList(e.target.value);
});

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


/* Segundo selectbox */
selected2.addEventListener("click", () => {
  optionsContainer2.classList.toggle("active");

  searchBox2.value = "";
  filterList("");

  if (optionsContainer2.classList.contains("active")) {
    searchBox2.focus();
  }
});

optionsList2.forEach(o => {
  o.addEventListener("click", () => {
    selected2.innerHTML = o.querySelector("label").innerHTML;
    optionsContainer2.classList.remove("active");
  });
});

searchBox2.addEventListener("keyup", function(e) {
  filterList2(e.target.value);
});

const filterList2 = searchTerm => {
  searchTerm = searchTerm.toLowerCase();
  optionsList2.forEach(option => {
    let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
    if (label.indexOf(searchTerm) != -1) {
      option.style.display = "block";
    } else {
      option.style.display = "none";
    }
  });
};