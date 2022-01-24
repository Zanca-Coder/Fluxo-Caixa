<!-- Jumbotron -->
<div id="intro" class="py-2 text-center" style="background-color: rgba(0, 0, 0, 0.2);">
        <h1 class="mb-0 h3"><?=$this->title?></h1>
      </div>
      <!-- Jumbotron -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="mt-4 mb-5">
      <div class="container">        
		<div class="border p-4 col-md-12">			
			<form name="frmTipoLancamento" id="frmTipoLancamento">	
				<input type="hidden" id="txtseq" name="txtseq">
				<div class="form-outline mb-4 col-md-4">
					<input type="text" id="txtDesc" name="txtDesc" class="form-control" required/>
					<label class="form-label" for="txtDesc">Descrição</label>
				</div>

				<div id="botaocad">
					<button type="button" class="btn btn-primary mb-4" id="btnInc">
						Incluir
					</button>
				</div>

				<div id="botoesedit">
					<button type="button" class="btn btn-success mb-4" id="btnSave">
						Salvar
					</button>
					<button type="button" class="btn btn-danger mb-4" id="btnCancel">
						Cancelar
					</button>
				</div>

		</div>
	</div>
			</form>
		</div>
		<br>
		<div class="container">
			<table class="table table-hover" id="tabres">
				<thead>
					<tr>
						<th>Descrição</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody id="lstipolancamento">
				</tbody>
			</table>
		</div>
		
      </div>
	  
    </main>
    <!--Main layout-->
		
		

