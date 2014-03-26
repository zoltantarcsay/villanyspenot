function rendez(oszlop,asc_desc) {
    var rendezesForm = document.forms["rendezes"]
    rendezesForm.elements["r"].value = oszlop + " " + asc_desc;
    rendezesForm.submit();
}

function elkuldes() {
    feedbackForm = document.forms["feedback"]
    if (feedbackForm.elements["nev"].value.length == 0
        || feedbackForm.elements["email"].value.length == 0
        || feedbackForm.elements["nev"].value.length == 0) {
        alert("Név, email és üzenet megadása kötelező");
    }
    else {
        window.opener.msg("Köszönjük, hogy üzent.");
        feedbackForm.submit();
    }
}

function kapcs() {
        newwindow = window.open('Kapcsolat.php','Üzenet a szerkesztőségnek','height=400,width=650');
        if (window.focus) {newwindow.focus()}
        return false;
}

function msg(text) {
    var msgDiv = document.getElementById("msg");
    msgDiv.innerHTML = text;
    msgDiv.style.cssText = "display:inherit;";
    setTimeout(function() {msgDiv.style.cssText = "display:none;"}, 5000);
    return false;
}

function logout() {
    var sessionFrom = document.forms["session"];
    sessionFrom.elements["logout"].value = "1";
    sessionFrom.submit();
    return false;
}
