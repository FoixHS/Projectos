<?php

  function traerArrayDeUsuarios(){
    $datosEnJSON = file_get_contents("../usuarios.json");
    $arrayDeUsuarios = json_decode($datosEnJSON, true);
    return $arrayDeUsuarios;
  }

  function validarEmail($email){
    $arrayDeUsuarios = traerArrayDeUsuarios();
    foreach ($arrayDeUsuarios as $usuario) {
      if($usuario["email"] == $email){
        $errores = true;
      }
      return $errores;
    }
  }


 ?>
