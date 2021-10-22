onLoad=alert("Bienvenue sur ma page !")
function PromptMessage() {
    var saisie = prompt("Saisissez une année :", "Annee")
    console.log(saisie);
    isAnneeBissextile(saisie);
    //isAnneeBissextile(saisie);
    //return saisie;
}
function isAnneeBissextile(a) {
    var f = 0;
     if (a < 2000) {
        if (a < 1904) {
            alert('Cette annee n est pas bissextile.');
            return 0;
        }
        if (a > 1904) {
            for (i; i < 100; i+4) {
            if (a-1900 == i) {
                i=101;
                alert('Cette annee est bissextile.');
                return 0;
            }
        }
     }
    }
     if (a > 2000) {
        for (i; i < 100; i+4) {
            if (a-2000 == i) {
                i=101;
                alert('Cette annee est bissextile.');
                return 0;
            }
        }
     }
     return 0;
}