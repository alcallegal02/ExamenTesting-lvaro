# Vulnerabilidades

El login de insecure-login es vulnerable a inyecciones sql:

![alt text](image.png)

Redirigiéndonos al endpoint de welcome sin saber las credenciales del usuario registrado en la aplicación:

![alt text](image-1.png)

Como vemos nos dice que la página es vulnerable a XSS, y la vista anterior la única variable que tiene es la que viene después de Welcome mostrandonos el nombre del usuario logueado, de forma que revisando el código que no tiene protección a XSS:

![alt text](image-2.png)

Para probar su vulnerabilidad, se me ha ocurrido llamar al usuario de la base de datos con un payload de XSS:

![alt text](image-4.png)

De forma que al loguearnos en la web, la variable users tendrá el valor de este payload mostrándonos una alerta en la web

![alt text](image-3.png)

El peligro del XSS es que un atacante puede obtener la cookie de sesión de un usuario logueado con scripts como hemos realizado anteriormente, permitiendo al atacante poder realizar acciones en el nombre del usuario robado.
