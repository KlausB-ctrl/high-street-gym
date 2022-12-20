const PROFILE_NAVIGATION_TEMPLATE = document.createElement('template');

PROFILE_NAVIGATION_TEMPLATE.innerHTML =
`
<div class="profile_navigation">
    <div class="profile_info --flexcentre-column --space_between">
        <img src="../images/icons/profile-icon.png">
        <h2 id="profile-name"></h2>
    </div>
    <button id='account_details' onclick="window.location.href='./account-details.php'">Account</button>
    <button id='password' onclick="window.location.href='./password.php'">Password</button>
    <button id='blog_posts' onclick="window.location.href='./blog-posts.php'">Blog Posts</button>
    <button id='logout' onclick="window.location.href='./logout.php'">Logout</button>
</div>
`;

const CONTENT_ELEMENT = document.getElementsByClassName("white_background")[0];
CONTENT_ELEMENT.appendChild(PROFILE_NAVIGATION_TEMPLATE.content);
let profileNavActiveClass = "--profilenav_active";

if(PAGE_TITLE === "Account Details | Profile | High Street Gym") document.getElementById('account_details').classList = profileNavActiveClass;
else if(PAGE_TITLE === "Password | Profile | High Street Gym") document.getElementById('password').classList = profileNavActiveClass;
else if(PAGE_TITLE === "Blog Posts | Profile | High Street Gym") document.getElementById('blog_posts').classList = profileNavActiveClass;