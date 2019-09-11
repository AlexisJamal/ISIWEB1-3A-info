var diapo = new Array;
diapo[0] = "Film-DesHommesEtDesDieux.jpg";
diapo[1] = "Film-IlResteDuJambon.jpg";
diapo[2] = "Film-Inception.jpg";
diapo[3] = "Film-Jackass3.jpg";
diapo[4] = "Film-LaPrincesseDeMontpensier.jpg";
diapo[5] = "Film-LeSecretDeCharlie.jpg";
diapo[6] = "Film-LesPetitsRuisseaux.jpg";
diapo[7] = "Film-MoiMocheEtMechant.jpg";
diapo[8] = "Film-SlumDogMillionaire.jpg";
diapo[9] = "Film-TheAmerican.jpg";
diapo[10] = "Film-TheKillerInsideMe.jpg";
diapo[11] = "Film-TheSocialNetwork.jpg";

var nbDiapo = 12;
var intervalle = 2000;
var indexDiapo = 0;
var idDiapo = "diapo";

var indexShown = 0;
var nbShown = 4;

var showingTable = new Array;
showingTable[0] = "Film-blanc.jpg";
showingTable[1] = "Film-blanc.jpg";
showingTable[2] = "Film-blanc.jpg";
showingTable[3] = "Film-blanc.jpg";

function ChangeImages() {
    if (document.getElementById(idDiapo)) {
        document.getElementById(idDiapo).innerHTML = '<img src="./images_films/' + diapo[indexDiapo] + '" /> ';
        indexDiapo = (indexDiapo + 1) % nbDiapo;
    }
    setTimeout("ChangeImages()", intervalle);
}

function ChangeImages1() {
    if (document.getElementById(idDiapo + indexShown)) {
        document.getElementById(idDiapo + indexShown).innerHTML = '<img src="./images_films/' + diapo[indexDiapo] + '" /> ';
        if (indexShown == 0) {
        	for (var i = 1; i<4; i++) {
        		document.getElementById(idDiapo + i).innerHTML = '<img src="./images_films/Film-blanc.jpg" /> ';
        	}
        }
        indexDiapo = (indexDiapo + 1) % nbDiapo;
        indexShown = (indexShown + 1) % nbShown;
    }
    setTimeout("ChangeImages1()", intervalle);
}

function ChangeImages2() {
    if (document.getElementById(idDiapo + indexShown)) {
        document.getElementById(idDiapo + indexShown).innerHTML = '<img src="./images_films/' + diapo[indexDiapo] + '" /> ';
        if (indexShown == 0) {
            for (var i = 1; i<4; i++) {
                document.getElementById(idDiapo + i).innerHTML = '<img src="./images_films/Film-blanc.jpg" /> ';
            }
        }
        indexDiapo = (indexDiapo + 1) % nbDiapo;
        indexShown = (indexShown + 1) % nbShown;
    }
    if (indexShown == 0) {
        setTimeout("ChangeImages2()", 4000);
    }
    else setTimeout("ChangeImages2()", intervalle);
}

function ChangeImages3() {
    updateShowingTable(diapo[indexDiapo]);
    if (document.getElementById("diapo0")) {
        document.getElementById("diapo0").innerHTML = '<img src="./images_films/' + showingTable[0] + '" /> ';
    }
    if (document.getElementById("diapo1")) {
        document.getElementById("diapo1").innerHTML = '<img src="./images_films/' + showingTable[1] + '" /> ';
    }
    if (document.getElementById("diapo2")) {
        document.getElementById("diapo2").innerHTML = '<img src="./images_films/' + showingTable[2] + '" /> ';
    }
    if (document.getElementById("diapo3")) {
        document.getElementById("diapo3").innerHTML = '<img src="./images_films/' + showingTable[3] + '" /> ';
    }
    indexDiapo = (indexDiapo + 1) % nbDiapo;
    setTimeout("ChangeImages3()", intervalle);
}

function ChangeImages4() {
    updateShowingTable(diapo[indexDiapo]);
    if (document.getElementById("diapo0")) {
        document.getElementById("diapo0").innerHTML = '<img src="./images_films/' + showingTable[0] + '" /> ';
    }
    if (document.getElementById("diapo1")) {
        document.getElementById("diapo1").innerHTML = '<img src="./images_films/' + showingTable[1] + '" /> ';
    }
    if (document.getElementById("diapo2")) {
        document.getElementById("diapo2").innerHTML = '<img src="./images_films/' + showingTable[2] + '" /> ';
    }
    if (document.getElementById("diapo3")) {
        document.getElementById("diapo3").innerHTML = '<img src="./images_films/' + showingTable[3] + '" /> ';
    }
    indexDiapo = (indexDiapo + 1) % nbDiapo;
    if (indexDiapo % 4 == 0) {
        setTimeout("ChangeImages4()", 4000);
    }
    else setTimeout("ChangeImages4()", intervalle);
}

function updateShowingTable(newFilm) {
    showingTable[3] = showingTable[2];
    showingTable[2] = showingTable[1];
    showingTable[1] = showingTable[0];
    showingTable[0] = newFilm;
}