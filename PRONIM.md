---
created: 2024-09-18T21:51
updated: 2024-10-10T19:20
---


# PRONIM

Plataforma que brinda apoyo para la educación a migrantes nacionales e internacionales en todos los estados.

- Permite niveles kinder,primaria y secundaria.
- Las evaluaciones son bimestrales (2 meses), en esta el profesor debe dejar un comentario del rendimiento del alumno
- El profesor tiene que tener libre el tiempo para subir su comentario (si el alumno cambia de institucion dar alerta para que lo haga lo mas pronto posible)
- La inscripcion al sistema no necesita del curp y el sistema solo sabe que esta en otro lado cuando se inscribe de nuevo en otro lugar

## Problematicas presentadas

- Los alumnos pueden inscribirse sin necesidad del curp (forma de identificarlos en el sistema)
- Como manejar las evaluaciones para los diferentes nivel educativos (no es lo mismo primaria que secundaria)
- Necesitamos los planes de estudios de cada nivel (crear la opcion de modificar el plan de estudios el director nacional)
  - Duda: Dar la posibilidad de que cada director estatal modifique el plan escolar??
- Control de cupo en las diferentes instituciones

## Entidades definidas

La jerarquia presentada en las entidades son las siguintes:

1. Director nacional
2. Director estatal
3. Director de centro educativo
4. Profesor
5. Alumno
6. Notas

### Director nacional

#### Atributos:

- Usuario (String)
- Contraseña (String)

#### Funciones

- Modificar/Eliminar/Crear cualquier usuario por debajo de su jerarquia
- Modificar/Eliminar/Crear los planes de estudios para los diferentes niveles educativos
- Modificar/Eliminar/Crear las notas generado por usuarios debajo de su jerarquia
- Modificar/Eliminar/Crear instituciones (director estatal) del pronim

### Director estatal

#### Atributos:

- Usuario (String)
- Contraseña (String)
- Estado que representa (String)
- Nivel educativo que hay disponile (string)   (opcional)

#### Funciones

- Modificar/Eliminar/Crear cualquier usuario por debajo de su jerarquia
- Modificar/Eliminar/Crear las notas generado por usuarios debajo de su jerarquia
- Modificar informacion personal (esta hace referente a la institucion)

### Director del centro educativo

#### Atributos:

- Usuario (String)
- Contraseña (String)
- Ubicacion de la institucion (link)
- Nivel educativo que imparte (string)
- Disponibilidad de cupos y cupos actualmente ocupados (tupla de int)
- Grupos y horario (???)

#### Funciones

- Modificar/Eliminar/Crear cualquier usuario por debajo de su jerarquia
- Modificar/Eliminar/Crear las notas generado por usuarios debajo de su jerarquia
- Modificar/Eliminar/Crear grupos y asignacion del profesor y alumnos
- Modificar informacion relacionada al instituto
- Crear alertas a los profesores y alumnos pertenecientes al instituto

### Maestro

#### Atributos:

- Usuario (String)
- Contraseña (String)
- Nombre
- Nivel educativo que puede impartir (string)
- Disponibilidad de horario ()    "Con fin de tutorias o bien asignacion de grupos nuevos por parte del director"
- Grupos a los que imparte
- alumnos a los que imparte (organizar respecto grupo)

#### Funciones

- Modificar/Eliminar/Crear evaluaciones para los alumnos  "Unicamente propias"
- Generar una alerta a director en caso de un prolema       "Y si el alumno se desaparece???"
- Modificar informacion personal

### Alumno

#### Atributos:

- Nombre
- Nivel educativo que esta cursando
- Grupo al que pertenece
- Estado actual  (estudiando/educacion en pausa)

### Notas (evaluacion)

#### Atributos:

- Periodo que se evalua
- Profesor al que pertenece la evaluacion
- Texto que indica la evaluacion del alumno
- Alumno al que pertenece la evaluacion
- Tema/materia a la que pertenece la evaluacion
- Nivel educativo al que pertenece (opcional)
