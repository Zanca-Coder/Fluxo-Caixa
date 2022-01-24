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
			<form name="frmLancamento" id="frmLancamento">	
					
				<input type="hidden" id="txtseq" name="txtseq"/>			

				<div class="form-outline mb-4 col-md-1">
					<input type="text" id="txtVal" name="txtVal" class="form-control" required/>
					<label class="form-label" for="txtVal">Valor</label>
				</div>

				<div class="form-outline mb-4 col-md-8">
					<input type="text" id="txtObs" name="txtObs" class="form-control" required />
					<label class="form-label" for="txtObs">Observações</label>
				</div>

				<div class="mb-4 col-md-4">
					<select class="form-select" aria-label="Default select example" name="txtTipLanc" id="txtTipLanc">
					</select>
				</div>

				<div class="mb-4 col-md-4">
					<select class="form-select" aria-label="Default select example" name="txtTipFlux" id="txtTipFlux">
					</select>
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
			<table class="table table-hover text-center" id="tabres">
				<thead>
					<tr>
						<th>Valor</th>
						<th>Data</th>
						<th>Tipo de Lançamento</th>
						<th>Tipo de Fluxo</th>
						<th>Observações</th>
					</tr>
				</thead>
				<tbody id="lslancamento">
				</tbody>
			</table>
		</div>
		
      </div>
	  
    </main>
    <!--Main layout-->
		
		

