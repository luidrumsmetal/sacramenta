<section id = "content">
    <div class="section">
      <div class="row">
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

                <nav class="amber darken-4">
                  <div class="nav-wrapper">
                    <div class="col s12">
                    <h1 class="brand-logo center">Peticiones</h1>
                    </div>
                  </div>
                </nav>

          <div id="borderless-table">
              <div class="row">
                <div class="col s12 m12 12">
                  <table id="striped-table">
                    <thead>
                      <tr>
                        <th data-field="name">Apellido Paterno</th>
                        <th data-field="price">Apellido Materno</th>
                        <th data-field="price">Nombres</th>
                        <th data-field="price">CI</th>
                        <th data-field="price">Telefono</th>
                        <th data-field="price">Fecha Nacimiento</th>
                      </tr>

                    </thead>
                    <tbody>
                      <tr>
                        <td>No existe bautizos registrados</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
      </div>
    </div>
</section>
