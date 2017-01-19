CONTENIDOS DEL ARCHIVO
---------------------

 * Sobre este código
 * Instalación / configuración
 * Metodos disponibles
 * Respuestas de la API

Sobre este código
------------------
Este código fue creado por mi ( Yago Zerbarini ) en Enero 2007, como un intento de aplicación al trabajo requerido para la entrevista de Olx Argentina. El mismo consiste en el desarrollo de una api que permita interactuar con entidades de usuarios.

Para realizarla intenté crear un miniframework a través del uso de diferentes componentes tanto de symfony como laravel, el motivo de ello fue meramente de aprendizaje.

Instalación / configuración
---------------------------
En la carpeta "data" se encuentran dos bases de datos, una sqlite y una mysql. Se puede utilizar la de mayor preferencia y la misma se configura en el archivo "src/db.php".

Luego se puede iniciar el proyecto ejecutando las siguientes lineas en la terminal:

 $ composer install

 $ php -S 127.0.0.1:1337 -t web/ web/front.php


Metodos disponibles
--------------------
La web api posee los siguientes metodos disponibles:

- CREACIÓN DE USUARIO
    url: /user/
    metodo: POST
    params: name, address

- LISTADO DE USUARIOS
    url: /user/
    metodo: GET

- OBTENER INFORMACIÓN DE UN USUARIO
    url: /user/{userId}
    metodo: GET

- MODIFICACIÓN DE UN USUARIO
    url: /user/{userId}
    metodo: POST
    params: name, address

- CARGA DE IMAGEN PARA UN USUARIO
    url: /user/{userId}
    metodo: POST
    params: picture

- BORRADO DE USUARIO
    url: /user/{userId}
    metodo: DELETE


Respuestas de la API
--------------------
La API siempre va a retornar una respuesta en formato json conformado por:
 - Un "Success" boolean que informa si la orden se ejecutó con o sin errores.
   En caso de que la respuesta tenga un error también se informa a través de un HTTP Status Code.
 - Un "Data" que retornará un objecto User en caso afirmativo o una respuesta de error.