function validar() {
    var nome = document.getElementById("nome").value;
    var telefone = document.getElementById("telefone").value;
    var email = document.getElementById("email").value;
    var mensagem = document.getElementById("mensagem").value;

    if (nome != "" && mensagem != "" && telefone != "" && !/[a-zA-Z]/.test(telefone)) {
        if (email.includes("@") && email.includes(".com")) {

            fetch("email.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                body: `nome=${nome}&telefone=${telefone}&email=${email}&mensagem=${mensagem}`,
            })
                .then(response => response.text())
                .then(data => alertaELimparCampos("Email enviado!"))//: , data
                .catch(error => console.error("Erro"));//: , error

        }
        else {
            alertaELimparCampos("Email inválido!");
        }
    }
    else if(!/[a-zA-Z]/.test(telefone)){
        alertaELimparCampos("Telefone inválido!");
    }
    else {
        alertaELimparCampos("Campos obrigatórios em branco!");
    }
}

function alertaELimparCampos(mensagem) {
    alert(mensagem);
    document.getElementById("nome").value = "";
    document.getElementById("telefone").value = "";
    document.getElementById("email").value = "";
    document.getElementById("mensagem").value = "";
}