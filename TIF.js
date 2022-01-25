//Header contents
const navigationItemsArray = [
  "home",
  "about us ▼",
  "how we help ▼",
  "latest news",
  "contact",
  "register",
  "log in",
];
let headerItems = "";

navigationItemsArray.forEach((item) => {
  headerItems += `<h3 class="navigationItem">${item}</h3>`;
});

document.getElementById("headerItems").innerHTML = headerItems;

//Footer contents
const footerItemsArray = [
  "solutions",
  "why TIF",
  "social",
  "awards and memberships",
  "legal",
  "site map",
];
let footerItems = "";

footerItemsArray.forEach((item) => {
  footerItems += `<h3 class="footerText">${item}</h3>`;
});

document.getElementById("footerItems").innerHTML = footerItems;
