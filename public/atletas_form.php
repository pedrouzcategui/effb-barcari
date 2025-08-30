<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Atletas</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #f4f7f8;
        }

        form {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
            overflow: hidden;
        }

        h3 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #555;
            margin-top: 10px;
            display: block;
        }

        input,
        select {
            width: 100%;
            padding: 8px 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
            transition: 0.3s;
        }

        input:focus,
        select:focus {
            border-color: #556a81ff;
            outline: none;
            box-shadow: 0 0 5px rgba(52, 77, 104, 0.3);
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .btn-next,
        .btn-prev,
        input[type="submit"] {
            background: #28435fff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            transition: 0.3s;
            flex: 1;
        }

        .btn-next:hover,
        .btn-prev:hover,
        input[type="submit"]:hover {
            background: #2f5074ff;
        }

        .section {
            display: none;
        }

        .section.active {
            display: block;
        }

        /* Pestañas */
        .tabs {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .tab {
            flex: 1;
            text-align: center;
            padding: 10px 0;
            border-bottom: 2px solid #ccc;
            font-weight: bold;
            color: #888;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 5px;
        }

        .tab.active {
            border-bottom: 2px solid #1f4975ff;
            color: #244a74ff;
        }

        /* Dos columnas para todas las secciones */
        .two-columns {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .two-columns .buttons {
            grid-column: span 2;
            display: flex;
            justify-content: space-between;
        }

        @media (max-width: 700px) {
            .two-columns {
                grid-template-columns: 1fr;
            }

            .buttons {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>

<body>
    <!-- BOTÓN PARA REGRESAR -->
    <div class="back-button">
        <a href="atletas.php">← Volver a Atletas</a>
    </div>

    <style>
        .back-button {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
        }

        .back-button a {
            background-color: #28435fff;
            color: #fff;
            padding: 10px 15px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            transition: background 0.3s;
        }

        .back-button a:hover {
            background-color: #2f5074ff;
        }
    </style>


    <form id="form" action="../src/atleta/AgregarAtleta.php" method="POST" novalidate>

        <!-- PESTAÑAS -->
        <div class="tabs">
            <div class="tab active" data-index="0">Atleta</div>
            <div class="tab" data-index="1">Identificación</div>
            <div class="tab" data-index="2">Escolaridad</div>
            <div class="tab" data-index="3">Representante</div>
        </div>

        <!-- SECCIÓN 1: DATOS DEL ATLETA -->
        <div class="section active">
            <h3>Datos del Atleta</h3>
            <div class="two-columns">
                <div>
                    <label>Primer Nombre</label>
                    <input type="text" name="Nombre1" placeholder="Primer Nombre" required>
                    <label>Primer Apellido</label>
                    <input type="text" name="Apellido1" placeholder="Primer Apellido" required>
                </div>
                <div>
                    <label>Segundo Nombre</label>
                    <input type="text" name="Nombre2" placeholder="Segundo Nombre">
                    <label>Segundo Apellido</label>
                    <input type="text" name="Apellido2" placeholder="Segundo Apellido">
                </div>
                <div class="buttons">
                    <div></div>
                    <button type="button" class="btn-next">Siguiente</button>
                </div>
            </div>
        </div>

        <!-- SECCIÓN 2: IDENTIFICACIÓN -->
        <div class="section">
            <h3>Identificación</h3>
            <div class="two-columns">
                <div>
                    <label>Nacionalidad</label>
                    <select name="nacionalidad" required>
                        <option value="">--Seleccione--</option>
                        <option value="V">V</option>
                        <option value="E">E</option>
                    </select>
                    <label>Fecha de Nacimiento</label>
                    <input type="date" name="Fecha" required>
                </div>
                <div>
                    <label>Cédula o Partida</label>
                    <input type="text" name="CI" placeholder="12345678" required>
                </div>
                <div class="buttons">
                    <button type="button" class="btn-prev">Anterior</button>
                    <button type="button" class="btn-next">Siguiente</button>
                </div>
            </div>
        </div>

        <!-- SECCIÓN 3: ESCOLARIDAD Y CATEGORÍA -->
        <div class="section">
            <h3>Escolaridad y Categoría</h3>
            <div class="two-columns">
                <div>
                    <label>Colegio</label>
                    <input type="text" name="Colegio" placeholder="Colegio">
                    <label>Grado de instrucción</label>
                    <select name="Grado_instruccion" required>
                        <option value="">--Seleccione--</option>
                        <option value="Primer Grado">Primer Grado</option>
                        <option value="Segundo Grado">Segundo Grado</option>
                        <option value="Tercer Grado">Tercer Grado</option>
                        <option value="Cuarto Grado">Cuarto Grado</option>
                        <option value="Quinto Grado">Quinto Grado</option>
                        <option value="Sexto Grado">Sexto Grado</option>
                        <option value="Primer Año">Primer Año</option>
                        <option value="Segundo Año">Segundo Año</option>
                        <option value="Tercer Año">Tercer Año</option>
                        <option value="Cuarto Año">Cuarto Año</option>
                        <option value="Quinto Año">Quinto Año</option>
                        <option value="Sexto Año">Sexto Año</option>
                        <option value="No Estudia">No Estudia</option>
                    </select>
                </div>
                <div>
                    <label>¿Ha pertenecido a otro club?</label>
                    <input type="text" name="Solvencia" placeholder="Solvencia" required>
                    <label>Categoría</label>
                    <select name="Categoria" required>
                        <option value="">--Seleccione--</option>
                        <option value="Sub 7">Sub 7</option>
                        <option value="Sub 9">Sub 9</option>
                        <option value="Sub 11">Sub 11</option>
                        <option value="Sub 13">Sub 13</option>
                        <option value="Sub 15">Sub 15</option>
                        <option value="Sub 17">Sub 17</option>
                    </select>
                </div>
                <div class="buttons">
                    <button type="button" class="btn-prev">Anterior</button>
                    <button type="button" class="btn-next">Siguiente</button>
                </div>
            </div>
        </div>

        <!-- SECCIÓN 4: REPRESENTANTE -->
        <div class="section">
            <h3>Datos del Representante</h3>
            <div class="two-columns">
                <div>
                    <label>Nombre</label>
                    <input type="text" name="NombreR" placeholder="Primer Nombre" required>
                    <label>Apellido</label>
                    <input type="text" name="ApellidoR" placeholder="Primer Apellido" required>
                    <label>Nacionalidad</label>
                    <select name="nacionalidadR" required>
                        <option value="">--Seleccione--</option>
                        <option value="V">V</option>
                        <option value="E">E</option>
                    </select>
                    <label>Cédula</label>
                    <input type="text" name="CIR" placeholder="12345678" required>
                </div>
                <div>
                    <label>Parentesco</label>
                    <input type="text" name="Parentesco" placeholder="Parentesco" required>
                    <label>Teléfono</label>
                    <input type="number" name="TelefonoR" placeholder="Telefono" required>
                    <label>Correo</label>
                    <input type="email" name="CorreoR" placeholder="Correo" required>
                    <label>Dirección</label>
                    <input type="text" name="DireccionR" placeholder="Dirección" required>
                </div>

                <div class="buttons">
                    <button type="button" class="btn-prev">Anterior</button>
                    <input type="submit" value="Guardar">
                </div>
            </div>
        </div>

    </form>

    <script>
        const sections = document.querySelectorAll('.section');
        const tabs = document.querySelectorAll('.tab');
        let current = 0;

        const showSection = (index) => {
            sections.forEach((sec, i) => sec.classList.toggle('active', i === index));
            tabs.forEach((tab, i) => tab.classList.toggle('active', i === index));
        }

        const validateSection = (section) => {
            const inputs = section.querySelectorAll('input, select');
            for (let inp of inputs) {
                if (inp.hasAttribute('required') && !inp.value) {
                    let name = inp.getAttribute('name') || inp.getAttribute('placeholder') || 'este campo';
                    alert(`Por favor complete el campo: ${name}`);
                    inp.focus();
                    return false;
                }
            }
            return true;
        }

        document.querySelectorAll('.btn-next').forEach(btn => {
            btn.addEventListener('click', () => {
                if (validateSection(sections[current])) {
                    if (current < sections.length - 1) current++;
                    showSection(current);
                }
            });
        });

        document.querySelectorAll('.btn-prev').forEach(btn => {
            btn.addEventListener('click', () => {
                if (current > 0) current--;
                showSection(current);
            });
        });

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const target = parseInt(tab.getAttribute('data-index'));
                if (target <= current) showSection(target);
            });
        });
    </script>

</body>

</html>