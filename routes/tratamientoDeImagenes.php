<?php 

//0 saber si uun usuario o producto tiene o no una imagen
$usuario = App\User::find(1);

    $image = $usuario->image;

    if($image){
       echo ' tiene una imagen';
    }else{
       echo ' no tiene ';
    }
    return $image;


//1 crear una imagen para un usuario urulizando el metodo save
$imagen = new App\Image(['url'=> 'Imagenes/avatar.png']);

    $usuario = App\User::find(1);
    

    $usuario->images()->save($imagen);

    return $usuario;
    

//02 obtener las informaciones de las imagenes a traves del usuario
$usuario = App\User::find(1);

 return $usuario->images->url;


?>