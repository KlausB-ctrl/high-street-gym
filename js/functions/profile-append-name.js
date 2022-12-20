const PROFILE_NAME = document.getElementById("profile-name");
const FIRST_NAME = document.getElementById("first_name").value;
const LAST_NAME = document.getElementById("last_name").value;
PROFILE_NAME.innerHTML = `${FIRST_NAME} ${LAST_NAME}`;