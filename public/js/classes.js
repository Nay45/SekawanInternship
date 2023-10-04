const responsiveToggle = document.querySelector(".responsive-toggle");
const hamburgerMenu = document.querySelector(".hamburger-menu");
const courseCard = document.querySelector(".courseCard");
const courseText = document.querySelectorAll(".course-text");
const popupTitle = document.querySelector(".popup-header>h3");
const popupBody = document.querySelector(".popup-body");
const toggle = document.querySelector(".toggle");
const sidebar = document.querySelector(".sidebar");
const popup = document.querySelector(".popup-box");
const popupCloseBtn = popup.querySelector(".popup-close-btn");
const popupCloseIcon = popup.querySelector(".popup-close-icon");

toggle.addEventListener("click", (event) => {
    event.stopPropagation();
    responsiveToggle.classList.toggle("active");
    sidebar.classList.remove("open");
    courseCard.classList.remove("open");
});

hamburgerMenu.addEventListener("click", (event) => {
    event.stopPropagation();
    sidebar.classList.toggle("active");
});

responsiveToggle.addEventListener("click", (event) => {
    event.stopPropagation();
    responsiveToggle.classList.remove("active");
    sidebar.classList.toggle("open");
    courseCard.classList.toggle("open");
});

for (let i = 0; i < courseText.length; i++) {
    courseText[i].addEventListener("click", (event) => {
        event.stopPropagation();
        popup.classList.add("open");
        popupTitle.innerHTML = document.getElementById("title-arrow").innerText;
        popupBody.innerHTML = courseText[i].innerText;
        popupCloseIcon.focus();
    });
}

popupCloseBtn.addEventListener("click", (event) => {
    event.stopPropagation();
    popup.classList.remove("open");
});

popupCloseIcon.addEventListener("click", (event) => {
    event.stopPropagation();
    popup.classList.remove("open");
});
