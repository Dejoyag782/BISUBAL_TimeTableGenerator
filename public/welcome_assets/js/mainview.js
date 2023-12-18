var clickableDiv1 = document.getElementById("left-nav-item-dash");
var clickableDiv2 = document.getElementById("left-nav-item-rooms");
var clickableDiv3 = document.getElementById("left-nav-item-courses");
var clickableDiv4 = document.getElementById("left-nav-item-professors");
var clickableDiv5 = document.getElementById("left-nav-item-classes");
var clickableDiv6 = document.getElementById("left-nav-item-timeslots");

var targetDiv1 = document.getElementById("dash-container");
var targetDiv2 = document.getElementById("room-container");
var targetDiv3 = document.getElementById("courses-container");
var targetDiv4 = document.getElementById("professors-container");
var targetDiv5 = document.getElementById("classes-container");
var targetDiv6 = document.getElementById("timeslots-container");

function hideAllContainers() {
  targetDiv1.style.display = "none";
  targetDiv2.style.display = "none";
  targetDiv3.style.display = "none";
  targetDiv4.style.display = "none";
  targetDiv5.style.display = "none";
  targetDiv6.style.display = "none";
}

clickableDiv1.addEventListener("click", function() {
  hideAllContainers();
  targetDiv1.style.display = "inline-flex";
  targetDiv1.style.flexDirection = "column";
});

clickableDiv2.addEventListener("click", function() {
  hideAllContainers();
  targetDiv2.style.display = "inline-flex";
  targetDiv2.style.flexDirection = "column";
});

clickableDiv3.addEventListener("click", function() {
  hideAllContainers();
  targetDiv3.style.display = "inline-flex";
  targetDiv3.style.flexDirection = "column";
});

clickableDiv4.addEventListener("click", function() {
  hideAllContainers();
  targetDiv4.style.display = "inline-flex";
  targetDiv4.style.flexDirection = "column";
});

clickableDiv5.addEventListener("click", function() {
  hideAllContainers();
  targetDiv5.style.display = "inline-flex";
  targetDiv5.style.flexDirection = "column";
});

clickableDiv6.addEventListener("click", function() {
  hideAllContainers();
  targetDiv6.style.display = "inline-flex";
  targetDiv6.style.flexDirection = "column";
});