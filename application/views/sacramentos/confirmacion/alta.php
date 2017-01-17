<section id = "content">
		<div class="section">
			<div class="col s10">
		        <div class="col s12 m12 l6">
		          <div class="card-panel">
		            <h4 align="center"><b>Registro de Fieles </b></h4>
								<h6>Ingrese todos los datos correctamente para crear una cuenta</h6><hr>
		            <div class="row">
						<h6 class="left"><b>Datos Parroquia: </b></h6><br><br>
						<input type="hidden" name="tipo" value="0" id="tipo">
								  <div class="row">
								  	<div class="input-field col s6">
								  		<i class="mdi-action-account-circle prefix"></i>
								  		<input id="ci" name="ci" type="number" class="validate" value="">
								  		<label for="ci" class="">Iglesia Parroquial: </label>		
								  	</div>
								  </div>

			                      <div class="row">
				                      <div class="input-field col s6">
				                     
				                      <select id="ciudad" type="text" class="validate">
				                        
				                          <option value="" disabled selected>  Seleccione una ciudad</option>
				                          <option value="1">La Paz</option>
				                          <option value="2">Oruro</option>
				                          <option value="1">Potosi</option>
				                          <option value="2">Tarija</option>
				                          <option value="1">Chiquisaca</option>
				                          <option value="2">Santa Cruz</option>
				                          <option value="1">Beni</option>
				                          <option value="2">Pando</option>
				                          <option value="1">Cochabamaba</option>
				                        </select>
				                        <label for="ciudad">Pais: </label>
				                      </div>
								  </div>

			                      <div class="row">
			                        <div class="input-field col s6">
			                          <i class="mdi-action-account-circle prefix"></i>
			                          <input id="presbitero" type="text" name="presbitero" class="validate">
			                          <label for="presbitero" class="">Presbitero: </label>
			                        </div>
			                      </div>

			                      <h6 class="header2"><b>Datos Fiel: </b></h6>

								  <div class="row">
			                        <div class="input-field col s6">
			                          <i class="mdi-action-account-circle prefix"></i>
			                          <input id="apellido" type="text" name="apellido" class="validate">
			                          <label for="apellido" class="">ID Fiel: </label>
			                        </div>
			                      </div>

								  <div class="row">
									<div class="input-field col s6">
									<i class="mdi-action-account-circle prefix"></i>
			                          <input placeholder="dia-mes-año" id="fechanac" name="fechanac" type="text" class="">
			                          <label for="fechanac">Fecha de Confirmacion: </label>    
			                        </div>
								  </div>

								  

								  <h6 class="header2"><b>Informacion de la cuenta: </b></h6>

								  <div class="row">
									<div class="input-field col s6">
										<i class="mdi-action-account-circle prefix"></i>
										<input id="libro" type="text" name="libro" class="validate">
										<label for="libro" class="">Libro:</label>
									</div>
								  </div>

								  <div class="row">
									<div class="input-field col s6">
										<i class="mdi-action-account-circle prefix"></i>
										<input id="pagina" type="text" name="pagina" class="validate">
										<label for="pagina" class="">Pagina:</label>
									</div>
								  </div>

								  <div class="row">
									<div class="input-field col s6">
										<i class="mdi-action-account-circle prefix"></i>
										<input id="numero" type="text" name="numero" class="validate">
										<label for="numero" class="">Numero:</label>
									</div>
								  </div>
			                      
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
</section>