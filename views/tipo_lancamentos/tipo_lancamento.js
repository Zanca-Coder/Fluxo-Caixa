function loadData(id) {
    getUrl(`${BASEURL}/tipo_lancamentos/loadData/${id}`)
        .then(res => {
            if (res.data.length > 0) {
                document.querySelector("#txtseq").value = res.data[0].sequencia;
                document.querySelector("#txtDesc").value = res.data[0].descricao;
                activateLabel(document.querySelector("label[for='txtDesc']"));
                reset();
                showEdit();
            }
        });
}

function del(id) {
    if (confirm("Confirma a Exclusão do Registro?")) {
        var params = { id: id };
        deleteItem(`${BASEURL}/tipo_lancamentos/del`, params)
            .then(res => {
                alert(res.data.texto);
                if (res.data.codigo == "1") {
                    listaTipoLancamento();
                }
            });
    }
}

function listaTipoLancamento() {

    document.querySelector("#lstipolancamento").innerHTML = "";
    getUrl(BASEURL + "/tipo_lancamentos/listaTipoLancamento")
        .then(res => {
            var txt = "";
            for (var i = 0; i < res.data.length; i++) {
                var reg = res.data[i];
                var bEdit = `<a href='javascript:void(0)' onclick='loadData(${reg.sequencia});'><i class="fas fa-edit"></i></a>`;
                var bDel = `<a href='javascript:void(0)' onclick='del(${reg.sequencia});'><i class="fas fa-trash"></i></a>`;
                txt += `<tr>
                <td>${reg.descricao}</td>
                <td>${bEdit} ${bDel}</td>
                </tr>`;
            }
            document.querySelector("#lstipolancamento").innerHTML = txt;

        });
}
listaTipoLancamento();

function reset() {
    document.querySelector("#frmTipoLancamento").reset();
    document.querySelector("#txtseq").readOnly = false;
    hideEdit();
}



document.addEventListener("DOMContentLoaded", () => {
    reset();
    listaTipoLancamento();
    document.querySelector("#btnInc").addEventListener("click", function() {
        let form = document.querySelector("#frmTipoLancamento");
        postForm(`${BASEURL}/tipo_lancamentos/insert`, form).then(res => {
            alert(res.data.texto);
            if (res.data.codigo == "1") {
                listaTipoLancamento();
            }
        })
    });

    document.querySelector("#btnSave").addEventListener("click", function() {
        let form = document.querySelector("#frmTipoLancamento");
        postForm(`${BASEURL}/tipo_lancamentos/save`, form).then(res => {
            alert(res.data.texto);
            if (res.data.codigo == "1") {
                reset();
                listaTipoLancamento();

            }
        })
    });

    document.querySelector("#btnCancel").addEventListener("click", function() {
        reset();
    });

});