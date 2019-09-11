function clic_civilite(champ) {
	if(champ.value == "Monsieur") {
		champ.value = "Madame";
	}
	else {
		champ.value = "Monsieur";
	}
	champ.blur();
}

function clic_ville() {
	var champ;
	champ = document.getElementsByName("ville")[0];
	champ.select();
}

function testNumerique(e) {
	var tb_age = document.getElementById("age");
	var string_age = tb_age.value;
	var tb_message = document.getElementById("message");
	var caractere = carClavier(e);

	if(carEffacement(e)) return true;
	else {
		if(caractere < "0" || caractere > "9") {
			return false;
		}
		else {
			return true;
		}
	}
}

function carClavier(e) {
	var unCaractere;
	if(window.event) unCaractere = String.fromCharCode(window.event.keyCode);
	else unCaractere = String.fromCharCode(e.which);
	return unCaractere;
}

function carEffacement(e) {
	var codeCaractere;
	var numCaractere;
	if(window.event) codeCaractere = window.event.keyCode;
	else codeCaractere = e.which;

	if(codeCaractere == 8 || codeCaractere == 0) return true;
	else return false;
}

function bloque_champ(champ) {
	champ.blur();
}

function clic_moins() {
	var naissance = document.getElementById("naissance");
	var annee = parseInt(naissance.value);
	annee = annee - 1;
	naissance.value = annee;
}

function clic_plus() {
	var naissance = document.getElementById("naissance");
	var annee = parseInt(naissance.value);
	annee = annee + 1;
	naissance.value = annee;
}

mail = /^[a-zA-Z0-9]+[a-zA-Z0-9\.-_]+@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9])+$/;
function verifieMail(champmail) {
	email = champmail.value;
	response = mail.test(email);

	if(response) alert("Adresse e-mail valide");
	else alert("Adresse e-mail INVALIDE !");
}