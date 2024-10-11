---
created: 2024-09-19T17:30
updated: 2024-10-10T19:20
---


# Tecnologias a ocupar en el proyecto

Se utilizara el stack MERN

M : Mysql como gestor de base de datos

E : Express como gestor para el servidor y peticiones al mismo

R : React como libreria para front end dinamico

N : Node.js para permitir usar javascript como lenguaje de servidor

## Razones por lo que se utiliza el stack

### Mysql (Gestor de base de datos)

MySQL es un sistema de gestión de bases de datos relacional. Organiza los datos en tablas con relaciones bien definidas, lo que es ideal para almacenar datos estructurados

- Al tener relaciones de entidades en nuestro sistema necesitamos una base relacional
- Usamos mysql al ser el gestor que mas sabemos ocupar (se puede usar maria.db pero no lo conocemos)
- Es muy eficiente en el manejo de grandes cantidades de datos (todos los reportes de los alumnos) y múltiples usuarios simultáneos (todos los profesores)

### Express (Gestor de servidor)

Es framework minimalista y flexible para Node.js que facilita la creación de servidores HTTP y APIs RESTful. Se utiliza para gestionar el backend de la aplicación.

- Nos facilita el gestor de peticiones ademas de reducir la cantidad de codigo al manejar estas peticiones
- Facilidad al levantar el servidor y conexion con la base de datos
- Puede integrarse con MySQL mediante `sequelize` o `mysql2`

### React (Libreria para front end)

Biblioteca de JavaScript para construir interfaces de usuario (UI). Especializada en el desarrollo de interfaces dinámicas de una sola página (SPA, Single Page Application).

- Debido a que nuestro sistema funciona de manera dinamica ya que el usuario tiene la posibilidad de hacer reportes,comentarios, entre otro. Es necesario que nuestras paginas sean dinamicas y tener la posibilidad de crear paginas por lo que react facilita este echo.
- Está basado en componentes reutilizables, lo que mejora la organización del código y su mantenimiento (util para las plantillas.
- Utiliza un DOM virtual para mejorar el rendimiento, actualizando solo los elementos que han cambiado (para los comentarios).

### Node.js

Es un entorno de ejecución de JavaScript que permite ejecutar código JavaScript en el servidor

- Node es un compilador de javascript en escritorio lo que nos permite utilizar este lenguaje en el back end ,mismo que evita la necesidad de tener 2 lenguajes distintos en el proyecto
- Utiliza un modelo de entrada/salida no bloqueante (asincrono) y basado en eventos, lo que lo hace altamente eficiente para manejar un gran número de conexiones simultáneas.

## Servidor y despliege de la aplicacion

En lo que respecta al servidor debido a que el sistema se ocupara en todo mexico y este mismo almacenara el registro de todas las evaluaciones y perfiles de los alumnos se buscara un servicio tipo Paas (plataform as a service) esto debido a que el almacenaje sea escalable asi mismo que se mantenga siempre activo.

El servidor debera solventar las siguientes cualidades del sistema

- Posibilidad de escalabilidad en lo que respecta el almacenaje
- Conexion con toda la republica del pais
- Gestionar una gran cantidad de usuarios conectados simultaneamente (picos de conexion los fines de mes)
- Servidor dedicado
- Control de la informacion correctamente ya que esta puede tener informacion relativamente sensible

Dado estas cualidades se considero contratar el servicio de aws, con un sistema de servidor dedicado y almacenaje expandible.

El prooverdor nos proovera de hasta 20 nodos cada uno con 1tb de almacenaje los cuales se conectaran para aumentar el poder de computo y almacenaje,se tiene contemplado que minimo 1 nodo estara activo con hasta un maximo de los 20 nodos. teniendo eso en cuenta se generaron los siguientes presupuesto.

![AWS_configuracion](img\AWS_Configuracion.png)
![AWS_computo](img\AWS-computo.png)
