<?php 
    require_once "../class/Atleta.php";
    $atleta=Atleta::DatosAtleta($_GET['ID_Atleta']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Atleta</title>
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body {
            margin: 0;
            background: #f4f7f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        form {
            background: #fff;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            width: 95%;
            max-width: 1100px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }
        h3 {
            grid-column: span 3;
            text-align: center;
            margin-bottom: 10px;
            color: #333;
        }
        label {
            font-weight: bold;
            font-size: 14px;
            color: #444;
            margin-bottom: 5px;
            display: block;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            transition: 0.3s;
        }
        input:focus, select:focus {
            border-color: #28435fff;
            outline: none;
            box-shadow: 0 0 6px rgba(52, 77, 104, 0.25);
        }
        .full-width {
            grid-column: span 3;
        }
        input[type="submit"] {
            background: #28435fff;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            padding: 12px;
            transition: 0.3s;
            grid-column: span 3;
        }
        input[type="submit"]:hover {
            background: #2f5074ff;
        }
    </style>
</head>
<body>
 <!-- BOTÓN PARA REGRESAR -->
<div class="back-button">
    <a href="atletas.php">Volver a Atletas</a>
</div>

<style>
.back-button {
    position: fixed;
    top: 10px;
    left: 10px;
    z-index: 900;
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

    <form action="../src/atleta/EditarAtleta.php" method="POST">
        <h3>✏️ Editar Atleta</h3>

        <input type="hidden" name="ID_Atleta" value='<?php echo $atleta[0]['ID_Atleta']?>'>

        <div>
            <label>Primer Nombre</label>
            <input type="text" name="Nombre1" value='<?php echo $atleta[0]['Nombre1']?>' required>
        </div>

        <div>
            <label>Segundo Nombre</label>
            <input type="text" name="Nombre2" value='<?php echo $atleta[0]['Nombre2']?>'>
        </div>

        <div>
            <label>Primer Apellido</label>
            <input type="text" name="Apellido1" value='<?php echo $atleta[0]['Apellido1']?>' required>
        </div>

        <div>
            <label>Segundo Apellido</label>
            <input type="text" name="Apellido2" value='<?php echo $atleta[0]['Apellido2']?>'>
        </div>

        <div>
            <label>Nacionalidad</label>
            <select name='nacionalidad' required>
                <option value="V" <?php echo (substr($atleta[0]['CI'],0,1)=="V")?"selected":""; ?>>V</option>
                <option value="E" <?php echo (substr($atleta[0]['CI'],0,1)=="E")?"selected":""; ?>>E</option>
            </select>
        </div>

        <div>
            <label>Cédula</label>
            <input type="text" name="CI" placeholder="12345678" value='<?php echo substr($atleta[0]['CI'], 1);?>' required>
        </div>

        <div>
            <label>Fecha de Nacimiento</label>
            <input type="date" name="Fecha" value='<?php echo $atleta[0]['Fecha_Nac']?>' required>
        </div>

        <div>
            <label>Colegio</label>
            <input type="text" name="Colegio" value='<?php echo $atleta[0]['Colegio']?>'>
        </div>

        <div>
            <label>Grado de Instrucción</label>
            <select name="Grado_instruccion" required>
                <?php 
                    $grados = ["Primer Grado","Segundo Grado","Tercer Grado","Cuarto Grado","Quinto Grado","Sexto Grado",
                               "Primer Año","Segundo Año","Tercer Año","Cuarto Año","Quinto Año","Sexto Año","No Estudia"];
                    foreach($grados as $grado){
                        $selected = ($atleta[0]['Grado_instruccion']==$grado) ? "selected" : "";
                        echo "<option value='$grado' $selected>$grado</option>";
                    }
                ?>
            </select>
        </div>

        <div>
            <label>¿Ha pertenecido a otro club?</label>
            <input type="text" name="Solvencia" value='<?php echo $atleta[0]['Solvencia']?>' required>
        </div>

        <div>
            <label>Categoría</label>
            <select name="Categoria" required>
                <?php 
                    $categorias = [1=>"Sub 7", 2=>"Sub 9", 3=>"Sub 11", 4=>"Sub 13", 5=>"Sub 15", 6=>"Sub 17"];
                    foreach($categorias as $id=>$cat){
                        $selected = ($atleta[0]['ID_Categoria']==$id) ? "selected" : "";
                        echo "<option value='$id' $selected>$cat</option>";
                    }
                ?>
            </select>
        </div>

        <input type="submit" value="Actualizar Atleta">
    </form>

</body>
</html>
