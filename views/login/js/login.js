$(document).ready(function() {
    $("#btnLogin").click(function(e) {
        e.preventDefault();
        axios.post(BASEURL + "/login/ver/", $("#frmLogin").serialize())
            .then((result) => {
                if (result.data == "OK") {
                    window.location = BASEURL + '/index/';
                } else {
                    alert(result.data);
                }
            });
    });
});

$(document).ready(function() {
    $("#linkPagIn").click(function(e) {
        e.preventDefault();
        var click = true;
        if (click) {
            alert('Faça o Login para continuar!');
        }
    });
    $("#linkLanc").click(function(e) {
        e.preventDefault();
        var click = true;
        if (click) {
            alert('Faça o Login para continuar!');
        }
    });
    $("#linkTip").click(function(e) {
        e.preventDefault();
        var click = true;
        if (click) {
            alert('Faça o Login para continuar!');
        }
    });
    $("#linkSair").click(function(e) {
        e.preventDefault();
        var click = true;
        if (click) {
            alert('Faça o Login para continuar!');
        }
    });
});