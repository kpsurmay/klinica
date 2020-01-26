<?php
require('function.php');
if(isset($_GET['id']))
{
	$cedula=$_GET['id'];
	$sql="SELECT * FROM date_person WHERE id_date_person=$cedula";
	
	list($cantidad, $asociar, $ejecutar)=select($sql);
	$cedula=$asociar['id_date_person'];
    $tipo_doc=$asociar['id_tipe_doc'];
	$nombre=$asociar['f_name'];
	$nombre2=$asociar['s_name'];
	$apellido=$asociar['l_name'];
	$apellido2=$asociar['l_name_s'];
	$foto=$asociar['photo'];
	$fecha_nac=$$asociar['date'];
    $sangre=$$asociar['id_bloodtype'];
    $genero=$$asociar['id_gender'];
	$rh=$$asociar['id_rh'];
	$estado_c=$$asociar['id_matrial_status'];
	$raza=$$asociar['id_race'];
    $ciudad_nac=$$asociar['id_city_born'];
    $eps=$$asociar['id_eps'];
	$estrato=$$asociar['id_score'];
	ejecutar($sql);
}


if(isset($_POST['aceptar']))

{
	$cedula=$_POST['id_date_person'];
    $tipo_doc=$_POST['id_type_doc'];
	$nombre=$_POST['f_name'];
	$nombre2=$_POST['s_name'];
	$apellido=$_POST['I_name'];
	$apellido2=$_POST['I_name_s'];
    $foto=$_POST['photo'];
	$fecha_nac=$_POST['date'];
    $sangre=$_POST['id_blood_type'];
    $genero=$_POST['id_gender'];
	$rh=$_POST['id_rh'];
	$estado_c=$_POST['id_matrial_status'];
	$raza=$_POST['id_race'];
    $ciudad_nac=$_POST['id_city_born'];
    $eps=$_POST['id_eps'];
	$estrato=$_POST['id_score'];
	
	
	$sql="DELETE FROM date_person WHERE id_date_person=$cedula";
	
	ejecutar($sql);
	$url="registrar.php";
	header("Location: " . $url);
	}
?>
<html>
<form method="POST">

<div class="form-group">
  <label class="col-md-4 control-label" for="city">Cedula</label>  
  <div class="col-md-4">
  <input id="id_date_person" name="id_date_person" placeholder="123456" class="form-control input-md" required="" type="number">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="e-mail"> Tipo Documento</label>  
  <div class="col-md-4">
  <?php
       $query50="SELECT * from type_doc";
       $per=new Tools;
       $pers=$per->getArraySQL($query50);
     ?>
         
        <div class="col-xs-12 col-sm-6 col-md-6">
        <select style="height: 35px;" name="id_type_doc" class="form-control" >
        <?php foreach ($pers as $per) {
        echo '<option value="'.$per['id_type_doc'].'">'.$per['type_doc']. '</option>';
        echo "<br>";
        }?>
    </select><br>
        </div></div>
  
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="city">Primer Nombre</label>  
  <div class="col-md-4">
  <input id="city" name="f_name" placeholder="kevin" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="city">Segundo Nombre </label>  
  <div class="col-md-4">
  <input id="city" name="s_name" placeholder="Fawed" class="form-control input-md" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="city">Primer Apellido</label>  
  <div class="col-md-4">
  <input id="city" name="I_name" placeholder="Pallares" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="city">Segundo Apellido</label>  
  <div class="col-md-4">
  <input id="city" name="I_name_s" placeholder="Fawed" class="form-control input-md" type="text">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="city">Cargar Foto</label>  
  <div class="col-md-4">
  <input id="city" name="photo" placeholder="Fawed" class="form-control input-md" type="file">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="city">Fecha Nacimiento</label>  
  <div class="col-md-4">
  <input id="city" name="date" placeholder="Fawed" class="form-control input-md" type="date">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="e-mail">Tipo De Sangre</label>  
  <div class="col-md-4">
	<?php
       $query50="SELECT * FROM blood_type WHERE 1";
       $per=new Tools;
       $pers=$per->getArraySQL($query50);
	   ?>
         
        <div class="col-xs-12 col-sm-6 col-md-6">
        <select style="height: 35px;" name="id_blood_type" class="form-control" >
        <?php foreach ($pers as $per) {
        echo '<option value="'.$per['id_blood_type'].'">'.$per['blood_type']. '</option>';
        echo "<br>";
        }?>
		</select><br>
        </div></div>
	
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="e-mail">Genero</label>  
  <div class="col-md-4">
  <?php
       $query50="SELECT * FROM `gender`";
       $per=new Tools;
       $pers=$per->getArraySQL($query50);
     ?>
         
        <div class="col-xs-12 col-sm-6 col-md-6">
        <select style="height: 35px;" name="id_gender" class="form-control" >
    <option value="'0">Seleccione</option>
        <?php foreach ($pers as $per) {
        echo '<option value="'.$per['id_gender'].'">'.$per['gender'].'</option>';
        echo "<br>";
        }?>
    </select><br>
        </div></div>
  
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="e-mail">RH</label>  
  <div class="col-md-4">
  <?php
       $query50="SELECT * FROM `rh`";
       $per=new Tools;
       $pers=$per->getArraySQL($query50);
     ?>
         
        <div class="col-xs-12 col-sm-6 col-md-6">
        <select style="height: 35px;" name="id_rh" class="form-control" >
    <option value="'0">Seleccione</option>
        <?php foreach ($pers as $per) {
        echo '<option value="'.$per['id_rh'].'">'.$per['rh'].'</option>';
        echo "<br>";
        }?>
    </select><br>
        </div></div>
  
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="e-mail">Estado Civil</label>  
  <div class="col-md-4">
  <?php
       $query50="SELECT * FROM `matrial_status`";
       $per=new Tools;
       $pers=$per->getArraySQL($query50);
     ?>
         
        <div class="col-xs-12 col-sm-6 col-md-6">
        <select style="height: 35px;" name="id_matrial_status" class="form-control" >
    <option value="'0">Seleccione</option>
        <?php foreach ($pers as $per) {
        echo '<option value="'.$per['id_matrial_status'].'">'.$per['matrial_status'].'</option>';
        echo "<br>";
        }?>
    </select><br>
        </div></div>
  
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="e-mail">Raza</label>  
  <div class="col-md-4">
  <?php
       $query50="SELECT * FROM `race`";
       $per=new Tools;
       $pers=$per->getArraySQL($query50);
     ?>
         
        <div class="col-xs-12 col-sm-6 col-md-6">
        <select style="height: 35px;" name="id_race" class="form-control" >
    <option value="'0">Seleccione</option>
        <?php foreach ($pers as $per) {
        echo '<option value="'.$per['id_race'].'">'.$per['race'].'</option>';
        echo "<br>";
        }?>
    </select><br>
        </div></div>
  
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="e-mail">Ciudad de Nacimiento</label>  
  <div class="col-md-4">
  <?php
       $query50="SELECT * FROM `city_born`";
       $per=new Tools;
       $pers=$per->getArraySQL($query50);
     ?>
         
        <div class="col-xs-12 col-sm-6 col-md-6">
        <select style="height: 35px;" name="id_city_born" class="form-control" >
    <option value="'0">Seleccione</option>
        <?php foreach ($pers as $per) {
        echo '<option value="'.$per['id_city_born'].'">'.$per['city_born'].'</option>';
        echo "<br>";
        }?>
    </select><br>
        </div></div>
  
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="e-mail">EPS</label>  
  <div class="col-md-4">
	<?php
       $query50="SELECT * FROM `eps`";
       $per=new Tools;
       $pers=$per->getArraySQL($query50);
	   ?>
         
        <div class="col-xs-12 col-sm-6 col-md-6">
        <select style="height: 35px;" name="id_eps" class="form-control" >
		<option value="'0">Seleccione</option>
        <?php foreach ($pers as $per) {
        echo '<option value="'.$per['id_eps'].'">'.$per['eps'].'</option>';
        echo "<br>";
        }?>
		</select><br>
        </div></div>
	
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="e-mail">Estrato</label>  
  <div class="col-md-4">
	<?php
       $query50="SELECT * FROM `score`";
       $per=new Tools;
       $pers=$per->getArraySQL($query50);
	   ?>
         
        <div class="col-xs-12 col-sm-6 col-md-6">
        <select style="height: 35px;" name="id_score" class="form-control" required="" >
        <?php foreach ($pers as $per) {
        echo '<option value="'.$per['id_score'].'">'.$per['score'].'</option>';
        echo "<br>";
        }?>
		</select><br>
        </div></div>
	
  </div>
</div>


<br><input type="submit" name="aceptar" value="ACEPTAR" >


</form>
</html>
