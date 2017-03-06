<?php if($this->session->flashdata('error')) {?>
    <div id="card-alert" class="card red">
      <div class="card-content white-text">
        <p><?php echo $this->session->flashdata('error') ?></p>
      </div>
      <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
<?php } ?>
<?php if($this->session->flashdata('success')) {?>
    <div id="card-alert" class="card green">
      <div class="card-content white-text">
        <p><?php echo $this->session->flashdata('success') ?></p>
      </div>
      <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
<?php } ?>

<section id = "content">
		<div class="section">
      <div class="card">
                    <div class="card-image">
                      <img src="<?php echo base_url(); ?>assets/demo/images/gallary/joel1.jpeg" alt="sample">
                        <span class="card-title"><strong>Envio de Emails "A GRUPOS FOCALES"</strong></span>
                    </div>
                    <div class="card-content">
                      <div class="nav-wrapper">
                        <div class="col s12 m6 l6">
                        <h5><strong>Opciones de envio - Grupos Focales - Sacramentos </strong></h5><br>
                        </div>
                      </div>
                      <form class="contact-form" action="<?php echo base_url(); ?>email/sendEmail" method="post">
                        <div class="col s12 m6 l6">
                            <div class="center promo promo-example">
                              <div class="row">
                                  <div class="input-field col s6 m8 l6">

                                      <input type="checkbox"  value="si" name="bautizados" id="test1">
                                      <label for="test1">Bautizados</label>

                                  </div>
                                  <div class="input-field col s6 m8 l6 ">

                                    <input type="checkbox"  value="si" name="conPrimeraComunion" id="test2">
                                    <label for="test2">Primera Comunión</label>

                                  </div>    
                              </div>
                            </div>
                            <div class="center promo promo-example">
                              <div class="row">                                  
                                  <div class="input-field col s6 m8 l6">

                                    <input type="checkbox"  value="si" name="confirmados" id="test3">
                                    <label for="test3">Confirmados</label>

                                  </div>
                                  <div class="input-field col s6 m8 l6">

                                    <input type="checkbox" value="si"  name="casados" id="test4">
                                    <label for="test4">Personas Casadas</label>

                                  </div>
                              </div>
                            </div> <br><br>                       
                              <div class="row">
                            <div class="input-field col s0">
                          <i class="mdi-maps-map prefix"></i>
                           </div>
                                <div class="input-field col s11 m5 l6">
                    				      <select id="lugar" name="lugar">
                    				        <option value="" disabled selected>&nbsp&nbsp&nbspSelecccion un lugar</option>
                                    <option value="si">Todos</option>
                                    <option value="1">La Paz</option>
                    				        <option value="2">Cochabamba</option>
                                    <option value="3">Santa Cruz</option>
                                    <option value="4">Oruro</option>
                                    <option value="5">Potosi</option>
                                    <option value="6">Sucre</option>
                                    <option value="7">Beni</option>
                                    <option value="8">Pando</option>
                                    <option value="9">Tarija</option>
                    				      </select>
                    				      <label><b>Lugar de sacramento:</b> </label>
                    				  	</div>
                                
                                
                                <div class="input-field col s6 m6 l5">
                                      <i class="mdi-action-event prefix"></i>
                                      <input placeholder="" id="fecha" name="fecha" type="date">
                                      <label for="first_name" class="active"><b>Fecha:</b></label>
                                </div>
                              </div>
                              <div class="row">
                                  <div class="center promo promo-example">
                                  <div class="input-field col s6">
                                  <h5><strong>Opciones de envio - Grupos Focales - Otros</strong></h5><br>
                                  </div>
                                  <div class="input-field col s6">
                                  <h5><strong>Opciones de envio - Grupos Focales - Sacerdotes</strong></h5><br>
                                  </div>
                                  <div class="input-field col s6">
                                    <input type="checkbox"  value="si" name="confirmados" id="test3">
                                    <label for="test3">Padres de Familia</label>
                                  </div>
                                  <div class="input-field col s6">
                                    <input type="checkbox"  value="si" name="confirmados" id="test3">
                                    <label for="test3">Sacerdotes</label>
                                  </div>
                                </div>
                              </div>
                                             
                              
                                  <div class="center promo promo-example">
                                    <div class="row">
                                      <div class="input-field col s12">
                                        <input id="website" name="asunto" type="text">
                                        <label for="website" class="">Asunto: </label>
                                      </div>
                                    </div>
                                  </div>
                          
                              <div class="center promo promo-example">
                                <div class="row">
                                  <div class="input-field col s12">
                                    <textarea id="message" name="mensaje" class="materialize-textarea"></textarea>
                                    <label for="message" class="">Mensaje: </label>
                                  </div>
                                </div>
                              </div>
                          
                    </div>

                    <div class="card-action">
                      <div class="row">
                        <div class="input-field col s7">
                          <button class="btn orange waves-effect waves-light right" type="submit" name="action">Enviar
                            <i class="mdi-content-send right"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                    </div>
              

                      </div>
                    </div>
                </section>
