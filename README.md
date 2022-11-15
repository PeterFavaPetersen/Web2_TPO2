# Web2_TPO2
## Trabajo practico obligatorio de Web 2

Trabajo practico realizado por Petersen, Pedro.

Mediante esta api se puede gestionar 2 tablas, las cuales son:
  
  Tabla: mesadejuego
  
  Contenido: (String) juego, (String)  director, (int) cantidadJugadores.
  
  Tabla: campeones
  
  Contenido: (String) nombre, (int) id_juego, (String) duracion, (date) fecha.
  
Endpoints:

### GET (all)

  .../api/mesadejuego
  
  .../api/campeones

### GET/:ID

  .../api/mesadejuego/:id
  
  EJ: .../api/mesadejuego/28
  
  .../api/campeones/:id
  
  EJ: .../api/campeones/33

### DELETE

  .../api/mesadejuego/:id
  
  EJ: .../api/mesadejuego/28
  
  .../api/campeones/:id
  
  EJ: .../api/campeones/33

### POST

  .../api/mesadejuego
  
  .../api/campeones

### SORT, ASC y DESC

  .../api/mesadejuego?sort= // *columna* //
  
  .../api/mesadejuego?order= // *ASC* o *DESC* //
  
  .../api/mesadejuego?sort= // *columna* // &order= // *ASC* o *DESC* //
  
  EJ: .../api/mesadejuego?sort=duracion&order=DESC
  
  EJ: .../api/campeones?sort=duracion&order=DESC
  
### PAGINACION

.../api/mesadejuego?limit= // *un numero a eleccion* //

EJ: .../api/mesadejuego?limit=2

EJ: .../api/campeones?limit=2
