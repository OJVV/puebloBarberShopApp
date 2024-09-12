<h1 class="nombre-pagina">Recuperar Password</h1>
<p class="descripcion-pagina">Coloca tu Password a Continuación</p>

<?php 
include __DIR__ . "/../templates/alertas.php";

?>

<?php if($error) return ;?>
<form action="" class="formulario" method="POST">
<div class="campo">
    <label for="password"> Password</label>
    <input 
        type=""password
        id="password"
        name=password
        placeholder="Tu Nuevo Password"    
    >
</div>

<input type="submit" class="boton" value="Guardar Nuevo Password">

</form>

<div class="acciones">
    <a href="/">Ya tienes cuenta? Iniciar Sesión</a>
    <a href="/crear-cuenta">¿Aun no tienes una cuenta? Crear una?</a>
   
</div>