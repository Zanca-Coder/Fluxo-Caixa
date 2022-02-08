function loadData(id) {
    getUrl(`${BASEURL}/lancamentos/loadData/${id}`)
        .then(res => {
            if (res.data.length > 0) {
                document.querySelector("#txtseq").value = res.data[0].sequencia;
                var txtVal = document.querySelector("#txtVal");
                var txtObs = document.querySelector("#txtObs");
                var selTipLanc = document.querySelector("#txtTipLanc");
                var selTipFlux = document.querySelector("#txtTipFlux");
                console.log(res.data[0].tipo);
                txtVal.value = res.data[0].valor;
                txtVal.dispatchEvent(new Event('change'));
                txtObs.value = res.data[0].obs;
                selTipLanc.value = res.data[0].tipo;
                selTipLanc.dispatchEvent(new Event('change'));
                selTipFlux.value = res.data[0].fluxo;
                activateLabel(document.querySelector("label[for='txtVal']"));
                activateLabel(document.querySelector("label[for='txtObs']"));
                showEdit();
            }
        });
}

function del(id) {
    if (confirm("Confirma a Exclusão do Registro?")) {
        var params = { id: id };
        deleteItem(`${BASEURL}/lancamentos/del`, params)
            .then(res => {
                alert(res.data.texto);
                if (res.data.codigo == "1") {
                    listaLancamento();
                }
            });
    }
}

function selTipLanc() {
    getUrl(BASEURL + "/lancamentos/selTipLanc").then(res => {
        var txt = "<option selected disabled>Selecione o Tipo de Lançamento</option>";
        res.data.forEach(element => {
            txt += `<option value="${element.tipo}">${element.tipo_desc}</option>`
        });
        document.querySelector("#txtTipLanc").innerHTML = txt;
    })
}
selTipLanc();

function selTipFlux() {
    getUrl(BASEURL + "/lancamentos/selTipFlux").then(res => {
        var txt = "<option selected disabled>Selecione o Tipo de Fluxo</option>";
        res.data.forEach(element => {
            txt += `<option value="${element.fluxo}">${element.fluxo_desc}</option>`
        })
        document.querySelector("#txtTipFlux").innerHTML = txt;
    })
}
selTipFlux();

function listaLancamento() {

    document.querySelector("#lslancamento").innerHTML = "";
    getUrl(BASEURL + "/lancamentos/listaLancamento")
        .then(res => {
            var txt = "";
            for (var i = 0; i < res.data.length; i++) {
                var reg = res.data[i];
                var btnEdit = `<a href='javascript:void(0)' onclick='loadData(${reg.sequencia});'><i class="fas fa-edit"></i></a>`;
                var btnDel = `<a href='javascript:void(0)' onclick='del(${reg.sequencia});'><i class="fas fa-trash"></i></a>`;
                txt += `<tr>
                            <td>${reg.valor}</td>
                            <td>${reg.data}</td>
                            <td>${reg.tipo_desc}</td>
                            <td>${reg.fluxo_desc}</td>
                            <td>${reg.obs}</td>
                            <td>${btnEdit} ${btnDel}</td>
                        </tr>`;
            }
            document.querySelector("#lslancamento").innerHTML = txt;

        });
}
listaLancamento();

function reset() {
    document.querySelector("#frmLancamento").reset();
    document.querySelector("#txtseq");
    hideEdit();
}

document.addEventListener("DOMContentLoaded", () => {

    reset();
    listaLancamento();
    document.querySelector("#btnInc").addEventListener("click", function() {
        let form = document.querySelector("#frmLancamento");
        postForm(`${BASEURL}/lancamentos/insert`, form).then(res => {
            alert(res.data.texto);
            if (res.data.codigo == "1") {
                reset();
                listaLancamento();
            }
        })
    });

    document.querySelector("#btnSave").addEventListener("click", function() {
        let form = document.querySelector("#frmLancamento");
        postForm(`${BASEURL}/lancamentos/save`, form).then(res => {
            alert(res.data.texto);
            if (res.data.codigo == "1") {
                reset();
                listaLancamento();
            }
        })
    });

    document.querySelector("#btnCancel").addEventListener("click", function() {
        reset();
    });


});