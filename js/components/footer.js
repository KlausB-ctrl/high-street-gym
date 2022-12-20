const FOOTER_TEMPLATE = document.createElement('template');

FOOTER_TEMPLATE.innerHTML =
`
<footer>
    <section class="--flexcentre">
        <a class="footer_home_link" href="${FILE_DEPTH}/index.html">HIGH STREET GYM</a>
        <ul>
            <li><a href="${FILE_DEPTH}/pages/blog.php">Blog</a></li>
            <li><a href="${FILE_DEPTH}/pages/bookings.php">Bookings</a></li>
            <li><a href="${FILE_DEPTH}/pages/profile.php">Profile</a></li>
            <li><a href="${FILE_DEPTH}/pages/trainer-input.php">Trainer Input</a></li>
            <li><a href="${FILE_DEPTH}/pages/class-input.php">Class Input</a></li>
        </ul>
        <ul>
            <li><a href="${FILE_DEPTH}/pages/404.html">Privacy Statement</a></li>
            <li><a href="${FILE_DEPTH}/pages/404.html">Terms & Conditions</a></li>
            <li><a href="${FILE_DEPTH}/pages/404.html">Copyright Statement</a></li>
        </ul>
    </section>
</footer>
`;

document.body.appendChild(FOOTER_TEMPLATE.content);