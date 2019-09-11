function clic_langage1(case_a_cocher) {
    var langage = case_a_cocher.value;
    if (case_a_cocher.checked) {
        alert("Vous venez de cocher le langage : " + langage);
    } else {
        alert("Vous venez de décocher le langage : " + langage);
    }
}

function clic_langage2(case_a_cocher) {
    var obj_cbox = case_a_cocher;
    var obj_lab;
    var langage, id_cbox, id_lab;
    var no_cbox;

    id_cbox = obj_cbox.id;
    no_cbox = id_cbox.charAt(2);

    langage = obj_cbox.value;

    id_lab = "lab" + no_cbox;
    obj_lab = document.getElementById(id_lab);

    if (obj_cbox.checked === true) {
        obj_lab.className = "selection";
        alert("C'est le choix " + no_cbox + " qui vient d'être sélectionné : " + langage);
    } else {
        obj_lab.className = "initial";
        alert("C'est le choix " + no_cbox + " qui vient d'être désélectionné : " + langage);
    }
}

function tester() {
    var lesChoix;
    var nbChoix, cptChoix;
    var unLangage, lesLangages;

    lesChoix = document.getElementsByName("cases");

    nbChoix = lesChoix.length;

    lesLangages = "";
    cptChoix = 0;
    for (i = 0; i < nbChoix; i++) {
        if (lesChoix[i].checked) {
            unLangage = lesChoix[i].value;
            cptChoix++;
            if (cptChoix === 1) {
                lesLangages = lesLangages + unLangage;
            } else {
                lesLangages = lesLangages + ", " + unLangage;
            }
        }
    }

    if (cptChoix > 0) {
        lesLangages = lesLangages + ".";
        alert("Vous avez chosi les langages suivants : " + lesLangages);
    } else {
        alert("Vous n'avez sélectionné aucun langage !!!");
    }

}

var ReponsesCorrectes = new Array(false, false, true, false, true, true);
var NbReponsesCorrectes = 3;
var nbEval = 0;

function countEval(nbChoixCorrects) {
    nbEval++;
    var span = document.getElementById("nbEval");
    span.innerHTML = nbEval;
    if(nbEval === 5) {
        if(nbChoixCorrects === NbReponsesCorrectes) {
            alert("Bravo ! Vous avez trouvé les bonnes réponses pour cette 5ème évaluation !");
        }
        else {
            alert("Dommage ! Vous n'avez pas trouvé les bonnes réponses pour cette 5ème évaluation !");
        }
    }
    
}

function evaluer1() {
    var message;
    var lesChoix;
    var nbChoix, cptChoix, cptChoixCorrects;

    lesChoix = document.getElementsByName("cases");

    nbChoix = lesChoix.length;

    cptChoixCorrects = 0;
    cptChoix = 0;
    for (i = 0; i < nbChoix; i++) {
        if (lesChoix[i].checked) {
            cptChoix++;
            if (ReponsesCorrectes[i]) {
                cptChoixCorrects++;
            }
        }
    }
    if (cptChoix === 0) {
        message = "Vous n'avez sélectionné aucun langage !";
    } else {
        switch (cptChoixCorrects) {
            case NbReponsesCorrectes:
                message = "Bravo ! Vous avez coché toutes les bonnes réponses ! (Évaluation " + nbEval + ")";
                break;
            case 2:
                message = "C'est un bon début ! Vous avez sélectionné 2 bonnes réponses, mais il y en a plus !";
                break;
            case 1:
                message = "Ce n'est pas terrible ! Vous avez sélectionné " + cptChoix + " réponse(s)";
                message += " dont " + cptChoixCorrects + " correcte(s) seulement.";
                break;
            case 0:
                message = "Navré ! AUCUNE REPONSE N'EST CORRECTE !";
                break;
        }
        countEval(cptChoixCorrects);
    }
    alert(message);
}

function corriger() {
    var lesChoix;
    var nbChoix, no_lab;
    var id_lab;
    var obj_lab;

    lesChoix = document.getElementsByName("cases");

    nbChoix = lesChoix.length;
    for (i = 0; i < nbChoix; i++) {
        no_lab = Number(i + 1);
        id_lab = "lab" + no_lab;

        obj_lab = document.getElementById(id_lab);
        if (ReponsesCorrectes[i]) {
            obj_lab.className = "correct";
        } else {
            obj_lab.className = "incorrect";
        }
    }
}

function reinitialiser() {
    var lesChoix = document.getElementsByName("cases");
    lesChoix.forEach(function (elem) {
        elem.checked = false;
    });
    nbChoix = lesChoix.length;
    for (i = 0; i < nbChoix; i++) {
        no_lab = Number(i + 1);
        id_lab = "lab" + no_lab;

        obj_lab = document.getElementById(id_lab);
        obj_lab.className = "initial";
    }
}