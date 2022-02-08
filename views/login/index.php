<h1 style="text-align: center;">Login</h1>

<main class="md-4 mb-5">

	<div class="container">

		<div class="border p-4 col-md-12">

			<form name="frmLogin" id="frmLogin" method="post" role="form" style="margin-top: 10px; margin-left: 10px; margin-right: 10px; margin-bottom: 10px;">

				<div class="row">
					<div class="form-group col-md-6 mb-2">
						<label>Nome:</label>
						<input type="text" class="form-control" id="txtNome" name="txtNome" placeholder="Insira seu Nome:" maxlength="35">
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-4 mb-3">
						<label>Senha:</label>
						<input type="password" class="form-control" id="txtSenha" name="txtSenha" placeholder="Insira sua Senha" maxlength="10">
					</div>
				</div>

				<br />

				<div>
					<button type="submit" id="btnLogin" name="btnLogin" class="btn btn-default">Logar</button>
				</div>

			</form>

		</div>
	</div>
</main>