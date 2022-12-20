let currentActive = "";
function revealBookingDetails(buttonID, buttonValue) {
    let revealedElement = document.getElementsByClassName("booking_information--revealed");
    if(revealedElement.length) {
        revealedElement[0].classList = "booking_information --flexcentre";
    }

    if(currentActive === buttonID) {
        document.getElementById(buttonID).innerText = "Details ⮜";
        currentActive = "";
        return;
    }

    currentActive = buttonID;
    document.getElementById(buttonID).innerText = "Details ⮟";

    let targetDiv = document.getElementById(buttonValue);
    targetDiv.classList = "booking_information--revealed --flexcentre";
}