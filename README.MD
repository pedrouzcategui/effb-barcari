📁 **EDD_BARACARI**
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