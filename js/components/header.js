const PAGE_TITLE = document.title;
const HEADER_TEMPLATE = document.createElement('template');
const FILE_DEPTH = (PAGE_TITLE === "High Street Gym") ? "." : "..";

if(window.innerWidth < 680) {
  var displayStyle = "none";
} else {
  var displayStyle = "flex";
}

HEADER_TEMPLATE.innerHTML =
`
<header class="--flexcentre --space_between">
  <button id="hamburger-menu"></button>
  <nav id="nav-menu" class="--flexcentre" style='display: ${displayStyle}'>
      <ul>
          <li><a href="${FILE_DEPTH}/index.html" id="navlink__home">Home</a></li>
          <li><a href="${FILE_DEPTH}/pages/blog.php" id="navlink__blog">Blog</a></li>
          <li><a href="${FILE_DEPTH}/pages/bookings.php" id="navlink__bookings">Bookings</a></li>
      </ul>
  </nav>
  <button class="profile_button" onclick="location.href='${FILE_DEPTH}/pages/account-details.php'" type="button"></button>
</header>
`;

document.body.appendChild(HEADER_TEMPLATE.content);

let navActiveClass = "--navlink_active";

if(PAGE_TITLE === "High Street Gym") document.getElementById("navlink__home").classList = navActiveClass;
else if (PAGE_TITLE.endsWith("Blog | High Street Gym")) document.getElementById("navlink__blog").classList = navActiveClass;
else if (PAGE_TITLE === "Book | High Street Gym" || PAGE_TITLE === "My Bookings | High Street Gym") document.getElementById("navlink__bookings").classList = navActiveClass;

let navButtonEl = document.getElementById("hamburger-menu");
let navMenuEl = document.getElementById("nav-menu");

navButtonEl.addEventListener("click", function() { 
    if(navMenuEl.style.display === "none") {
        navMenuEl.style.display = "flex";
        navButtonEl.style.backgroundImage = "url('" + FILE_DEPTH + "/images/icons/menu-icon-hover.svg')";
        navButtonEl.style.backgroundColor = "black";
    }
    
    else {
        navMenuEl.style.display = "none";
        navButtonEl.style.backgroundImage = "url('" + FILE_DEPTH + "/images/icons/menu-icon.svg')";
        navButtonEl.style.backgroundColor = "white";
    }
});