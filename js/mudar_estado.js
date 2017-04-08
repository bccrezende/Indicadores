function Mudarestado(nivel) {
    var nivel = nivel;
    if (nivel === 0) { //admin
        document.getElementById("graf_faturamento").style.display = "block";
        document.getElementById("graf_proposta").style.display = "block";
        document.getElementById("comercial").style.display = "block";
        document.getElementById("qualidade").style.display = "block";
        document.getElementById("sair").style.display = "block";
    }
    if (nivel === 1) { //comercial
        document.getElementById("graf_faturamento").style = "display:block";
        document.getElementById("graf_proposta").style = "display:block";
        document.getElementById("comercial").style.display = "block";
        document.getElementById("qualidade").style.display = "none";
        document.getElementById("sair").style.display = "block";
    }
    if (nivel === 2) { //qualidade
        document.getElementById("qualidade").style.display = "block";
        
    }
    
}


