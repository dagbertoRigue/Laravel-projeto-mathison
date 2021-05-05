/*created by Dagberto Rigue*/
    var aux1 = "perfil1";
    var aux2 = "perfil2";
    var g1 = "g1-";
    var g2 = "g2-";
function openCity(evt, cityName) {
    //declarando todas as variaveis
    var i, tabcontent, tablinks;
    var a1 = g1.concat(aux1);
    var b1 = g2.concat(aux2);

    //pega todos os elementos da class="tabcontent" e hide eles
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    //pega todos os elementos da class="tablinks" e remove a class do css active
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    //mostra a tab atual e adiciona um "active" na classe do botao que abriu a tab
    aux1 = aux2;
    aux2 = cityName;
    var a1 = g1.concat(aux1);
    var b1 = g2.concat(aux2);
    document.getElementById(a1).style.display = "block";
    document.getElementById(b1).style.display = "block";
    evt.currentTarget.className += " active";

}
    document.getElementById(g1.concat(aux1)).style.display = "block";
    document.getElementById(g2.concat(aux2)).style.display = "block";
    // pega o elemento com o id="aux1" e com o id="aux2" e clica nele
    //document.getElementById(aux1).click();
    //document.getElementById(aux2).click();
