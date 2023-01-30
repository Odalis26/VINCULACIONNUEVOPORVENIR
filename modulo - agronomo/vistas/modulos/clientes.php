<?php

if($_SESSION["perfil"] == "Especial"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<br><br><br><br>
<div class="content-wrapper" style="background-color:white; position:relative; width:1170px; left:200px">

  <section class="content-header" style="background-color:white">
    
    <h1 style="color:#D59408; font-family: monospace; font-weight: bold;">
      
      Administrar beneficiarios
    
    </h1>

    <ol class="breadcrumb" style="background-color:white">
      
      <li><a href="inicio"style="background-color:white;color:black"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar beneficiarios</li>
    
    </ol>

  </section>

  <section class="content" style="background-color:white">

    <div class="box" style="background-color:white; border: 2px white solid;">

      <div class="box-header with-border" style="background-color:white; border: 2px white solid;">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente" style="background-color:#D59408; color:black; border: 2px #D59408 solid;">
          
          Agregar beneficiario

        </button>

      </div>

      <div class="box-body" style="background-color:white; color:black; border: 2px white solid;">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%" style="background-color:white; color:black; border: 2px white solid;">
         
        <thead style="background-color:white; color:black; border: 2px white solid;">
         
         <tr style="background-color:white; color:black; border: 2px white solid;">
           
           <th style="width:10px; background-color:white; color:black; border: 2px white solid;">#</th>
           <th style="width:10px; background-color:white; color:black; border: 2px white solid;">Nombre</th>
           <th style="width:10px; background-color:white; color:black; border: 2px white solid;">Documento ID</th>
           <th style="width:10px; background-color:white; color:black; border: 2px white solid;">Email</th>
           <th style="width:10px; background-color:white; color:black; border: 2px white solid;">Teléfono</th>
           <th style="width:10px; background-color:white; color:black; border: 2px white solid;">Dirección</th>
           <th style="width:10px; background-color:white; color:black; border: 2px white solid;">Fecha nacimiento</th> 
           <th style="width:100px; background-color:white; color:black; border: 2px white solid;">Total de productos donados</th>
           <th style="width:10px; background-color:white; color:black; border: 2px white solid;">Última donación</th>
           <th style="width:10px; background-color:white; color:black; border: 2px white solid;">Ingreso al sistema</th>
           <th style="width:10px; background-color:white; color:black; border: 2px white solid;">Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

          foreach ($clientes as $key => $value) {
            

            echo '<tr style="width:10px; background-color:white; color:black; border: 2px white solid;">

                    <td style="width:10px; background-color:white; color:black; border: 2px white solid;">'.($key+1).'</td>

                    <td style="width:10px; background-color:white; color:black; border: 2px white solid;">'.$value["nombre"].'</td>

                    <td style="width:10px; background-color:white; color:black; border: 2px white solid;">'.$value["documento"].'</td>

                    <td style="width:10px; background-color:white; color:black; border: 2px white solid;">'.$value["email"].'</td>

                    <td style="width:10px; background-color:white; color:black; border: 2px white solid;">'.$value["telefono"].'</td>

                    <td style="width:10px; background-color:white; color:black; border: 2px white solid;">'.$value["direccion"].'</td>

                    <td style="width:10px; background-color:white; color:black; border: 2px white solid;">'.$value["fecha_nacimiento"].'</td>             

                    <td style="width:10px; background-color:white; color:black; border: 2px white solid;">'.$value["compras"].'</td>

                    <td style="width:10px; background-color:white; color:black; border: 2px white solid;">'.$value["ultima_compra"].'</td>

                    <td style="width:10px; background-color:white; color:black; border: 2px white solid;">'.$value["fecha"].'</td>

                    <td style="width:10px; background-color:white; color:black; border: 2px white solid;">

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" style="background:#FFC301; color:black; border: 2px #FFC301 solid;" idCliente="'.$value["id"].'"><i class="fa fa-pencil"></i></button>';

                      if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarCliente" style="background:#6A0436; color:white; border: 2px #6A0436 solid;"  idCliente="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                      }

                      echo '</div>  

                    </td>

                  </tr>';
          
            }

        ?>
   
        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR BENEFICIARIO
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#D59408; color:black">

          <button type="button" class="close" data-dismiss="modal" style="color:black">&times;</button>

          <h4 class="modal-title">Agregar beneficiario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body" style="background:white; color:white">

          <div class="box-body" style="background:white; color:white; border: 2px white solid;">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" style="background:#D59408; color:#F5EA04; border: 2px #D59408 solid;"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre" style="border: 2px #D59408 solid; background:white; color:black;" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" style="background:#D59408; color:#F5EA04; border: 2px #D59408 solid;"><i class="fa fa-key"></i></span> 

                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar documento" style="border: 2px #D59408 solid; background:white; color:black;" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" style="background:#D59408; color:#F5EA04; border: 2px #D59408 solid;"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" style="border: 2px #D59408 solid;background:white; color:black;" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" style="background:#D59408; color:#F5EA04; border: 2px #D59408 solid;"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(99) 9999-9999'" data-mask style="border: 2px #D59408 solid; background:white; color:black;"required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" style="background:#D59408; color:#F5EA04; border: 2px #D59408 solid;"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" style="border: 2px #D59408 solid; background:white; color:black;" required>

              </div>

            </div>

             <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" style="background:#D59408; color:#F5EA04; border: 2px #D59408 solid;"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask style="border: 2px #D59408 solid;background:white; color:black;" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer" style="background-color:white; color:black; border: 2px white solid;">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="background:#6A0436; color:white; border: 2px #6A0436 solid;">Salir</button>

          <button type="submit" class="btn btn-primary" style="background:#D59408; color:black; border: 2px #D59408 solid;">Guardar beneficiario</button>

        </div>

      </form>

      <?php

        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearCliente();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR BENEFICIARIO
======================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#F5EA04; color:black">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar beneficiario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body" style="background:white; color:white">

          <div class="box-body" style="background:white; color:white; border: 2px white solid;">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group" style="background:white; color:white">
              
              <div class="input-group">
              
                <span class="input-group-addon" style="background: #F5EA04; color:#D59408; border: 2px #F5EA04 solid;"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCliente" id="editarCliente" style="border: 2px #D59408 solid;background:#D59408;color:white;" required>
                <input type="hidden" id="idCliente" name="idCliente">
              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" style="background: #F5EA04; color:#D59408; border: 2px #F5EA04 solid;"><i class="fa fa-key"></i></span> 

                <input type="number" min="0" class="form-control input-lg" name="editarDocumentoId" id="editarDocumentoId" style="border: 2px #D59408 solid;background:#D59408;color:white;" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" style="background: #F5EA04; color:#D59408; border: 2px #F5EA04 solid;"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" style="border: 2px #D59408 solid;background:#D59408;color:white;" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" style="background: #F5EA04; color:#D59408; border: 2px #F5EA04 solid;"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" data-inputmask="'mask':'(99) 9999-9999'" data-mask style="border: 2px #D59408 solid;background:#D59408;color:white;" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" style="background: #F5EA04; color:#D59408; border: 2px #F5EA04 solid;"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion" style="border: 2px #D59408 solid;background:#D59408;color:white;" required>

              </div>

            </div>

             <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" style="background: #F5EA04; color:#D59408; border: 2px #F5EA04 solid;"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="editarFechaNacimiento" id="editarFechaNacimiento"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask style="border: 2px #D59408 solid;background:#D59408;color:white;" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer" style="background-color:white; color:black; border: 2px white solid;">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="background:#6A0436; color:white; border: 2px #6A0436 solid;">Salir</button>

          <button type="submit" class="btn btn-primary" style="background:#F5EA04; color:black; border: 2px #F5EA04 solid;">Guardar cambios</button>

        </div>

      </form>

      <?php

        $editarCliente = new ControladorClientes();
        $editarCliente -> ctrEditarCliente();

      ?>

    

    </div>

  </div>

</div>

<?php

  $eliminarCliente = new ControladorClientes();
  $eliminarCliente -> ctrEliminarCliente();

?>

