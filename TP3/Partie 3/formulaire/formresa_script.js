function modifOpt() {
    var tmp = document.getElementById('voiroupas').checked;

    if(tmp) {
        cacherOpt();
    } 
    else {
        montrerOpt();
    }
}

function montrerOpt() {
    var tmp = document.getElementsByTagName('div');
    for(i = 0; i < tmp.length; i++) {
        div = tmp[i];
        if(div.className === 'optionnel') {
            div.style.display = "block";
        }
    }
}

function cacherOpt() {
    var tmp = document.getElementsByTagName('div');
    for(i = 0; i < tmp.length; i++) {
        div = tmp[i];
        if(div.className === 'optionnel') {
            div.style.display = "none";
        }
    }
}

function optHotel() {
    var style = document.getElementById('Dchambre').style;
    if(style.display === "none" || style.display ==="") {
        style.display = "block";
    }
    else {
        style.display = "none";
    }
}
