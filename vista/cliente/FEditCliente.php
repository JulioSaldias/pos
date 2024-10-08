<?php

require_once "../../controlador/clienteControlador.php";
require_once "../../modelo/clienteModelo.php";

$id = $_GET["id"];
$cliente = ControladorCliente::ctrInfoCliente($id);

?>



<form class="form-horizontal" action="" id="FEditCliente">
  <div class="modal-header">
    <h4 class="modal-title">Actualizar Cliente</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="card-body">
    <div class="form-group row">
      <label for="razon_social" class="col-sm-3 col-form-label">ID CLIENTE:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="id" id="id" value="<?php echo $cliente["id_cliente"]; ?>" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="razon_social" class="col-sm-3 col-form-label">Razon Social :</label>
      <div class="col-sm-9">

        <!-- id_cliente	razon_social_cliente	nit_ci_cliente	direccion_cliente	nombre_cliente	telefono_cliente	email_cliente -->
        <input type="text" class="form-control" id="razon_social" name="razon_social" value="<?php echo $cliente["razon_social_cliente"]; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="nit_ci" class="col-sm-3 col-form-label">Nit/CI :</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nit_ci" name="nit_ci" value="<?php echo $cliente["nit_ci_cliente"]; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="direccion" class="col-sm-3 col-form-label">Direccion :</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $cliente["direccion_cliente"]; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="nombre" class="col-sm-3 col-form-label">Nombre :</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $cliente["nombre_cliente"]; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="telefono" class="col-sm-3 col-form-label">Telefono :</label>
      <div class="col-sm-9">
        <!-- pattern="[0-9]{7,8}"  -->
        <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $cliente["telefono_cliente"]; ?>" style="appearance: none;">
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-3 col-form-label">Email :</label>
      <div class="col-sm-9">
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $cliente["email_cliente"]; ?>">
      </div>
    </div>
  </div>
  <!-- /.card-body -->
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </div>
  <!-- /.card-footer -->
</form>

<script>
$(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        editCliente()
      }
    });
    $('#FEditCliente').validate({
      rules: {

        razon_social: {
          required: true,
          minlength: 3,
        },
        nit_ci: {
          required: true,
          minlength: 3
        },
        direccion: {
          required: true,
          minlength: 3
        },
        nombre: {
          required: true,
          minlength: 3
        },
        telefono: {
          required: true,
          minlength: 6,
          digits: true

        },
        email: {
          required: true,
          minlength: 3
        },
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>