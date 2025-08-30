Atletas: Se encarga de toda la información de los atletas, teniendo en cuenta la siguiente información.

- Documentación:
- Año de nacimiento.
- Cédula.
- Número.
- Número de representante.
- Dirección de habitación.
- Carta de solvencia (opcional si ha estado en otro club antes).
- Categoría.
- Grado de instrucción.
- Escuela/Liceo al que pertenece.
- Foto de representante.
- Foto de atleta.

Calendario: Encargado de llevar las siguientes fechas.

- Información sobre las próximas prácticas.
- Disciplina (sala/campo).
- Lugar de entrenamiento:
- - Parque El Mirador, Sector El Panadero.
- - Domingo Sabio, calle El Liceo.
- - Estadio Yulimar Rojas, El Paso.
- Información sobre futuros cumpleaños.
- Fechas importantes.
- Categorías.

```📁 **EDD_BARACARI**
|
├── 📁 public/ **Pantalla principal de cada modulo (pantallas extras tambien aqui)**
│   ├── calendario.php
│   ├── credencial.php
│   ├── eventos.php
│   ├── mensualidad.php
│   ├── moduloatletas.php
│   ├── reportes.php
│   └── 📁 assets/ **complementos de estilos, js, y recursos**
│       ├── 📁 css/
│       ├── 📁 js/
│       └── 📁 img/
├── 📁 src/ **sources, codigo fuente de cada modulo (llamado a metodos, validaciones, etc...)**
│   ├── 📁 calendario/
│   ├── 📁 credencial/
│   ├── 📁 eventos/
│   ├── 📁 login/
│   ├── 📁 mensualidad/
│   ├── 📁 atletas/
│   └── 📁 reportes/
|   |__ generar_ID.php
├── 📁 class/ **Clases del sistema, por entidad, clase de conexion y DTO + Diagrama de clases**
│   ├── Calendario.php
│   ├── Credencial.php
│   ├── Eventos.php
│   ├── Login.php
│   ├── Mensualidad.php
│   ├── Atletas.php
│   ├── DTO.php
│   └── Conex.php
├── 📁 database/ **query para la construccion de la BDD + Diagrama MER**
│   └── futbol.sql
└── 📁 includes/ **Archivos de inclusion recurrente o general**
    ├── footer.php
    ├── header.php
    └── session.php

│   ├── login.php
```
