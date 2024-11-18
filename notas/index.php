<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas por Grado y Materia</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-top: 30px;
            color: #007bff;
            font-size: 2.5em;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            margin-top: 30px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .grado {
            margin-bottom: 30px;
            text-align: center;
        }
        .grado button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }
        .grado button:hover {
            background-color: #0056b3;
        }
        .materias {
            display: none;
            padding: 20px;
            margin-top: 15px;
            border-radius: 8px;
            background-color: #f1f1f1;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }
        .materias ul {
            list-style-type: none;
            padding: 0;
        }
        .materias ul li {
            margin: 10px 0;
        }
        .materias ul li a {
            color: #343a40;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        .materias ul li a:hover {
            color: #007bff;
        }
        .menu {
            text-align: center;
            margin-top: 30px;
        }
        .menu a {
            color: #007bff;
            text-decoration: none;
            font-size: 20px;
        }
        .menu a:hover {
            text-decoration: underline;
        }
        .logo {
            display: block;
            margin: 0 auto 30px auto;
            max-width: 200px;
        }
        @media (max-width: 768px) {
            .grado button {
                width: 100%;
                padding: 15px 0;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="../imagen/logo_colegio.png" alt="Logo" class="logo">
        <h1>Selecciona el Grado y la Materia</h1>
        
        <!-- Primer Grado -->
        <div class="grado">
            <button onclick="toggleMaterias('PrimerGrado')">Primer Grado</button>
            <div id="PrimerGrado" class="materias">
                <ul>
                    <li><a href="PrimerGrado/matematicas.php">Matemáticas</a></li>
                    <li><a href="PrimerGrado/sociales.php">Sociales</a></li>
                    <li><a href="PrimerGrado/lenguaje.php">Lenguaje</a></li>
                    <li><a href="PrimerGrado/ciencias.php">Ciencias</a></li>
                    <li><a href="PrimerGrado/ingles.php">Inglés</a></li>
                    <li><a href="PrimerGrado/artistica.php">Artística</a></li>
                </ul>
            </div>
        </div>

        <!-- Segundo Grado -->
        <div class="grado">
            <button onclick="toggleMaterias('SegundoGrado')">Segundo Grado</button>
            <div id="SegundoGrado" class="materias">
                <ul>
                    <li><a href="SegundoGrado/matematicas.php">Matemáticas</a></li>
                    <li><a href="SegundoGrado/sociales.php">Sociales</a></li>
                    <li><a href="SegundoGrado/lenguaje.php">Lenguaje</a></li>
                    <li><a href="SegundoGrado/ciencias.php">Ciencias</a></li>
                    <li><a href="SegundoGrado/ingles.php">Inglés</a></li>
                    <li><a href="SegundoGrado/artistica.php">Artística</a></li>
                </ul>
            </div>
        </div>

        <!-- Tercer Grado -->
        <div class="grado">
            <button onclick="toggleMaterias('TercerGrado')">Tercer Grado</button>
            <div id="TercerGrado" class="materias">
                <ul>
                    <li><a href="TercerGrado/matematicas.php">Matemáticas</a></li>
                    <li><a href="TercerGrado/sociales.php">Sociales</a></li>
                    <li><a href="TercerGrado/lenguaje.php">Lenguaje</a></li>
                    <li><a href="TercerGrado/ciencias.php">Ciencias</a></li>
                    <li><a href="TercerGrado/ingles.php">Inglés</a></li>
                    <li><a href="TercerGrado/artistica.php">Artística</a></li>
                </ul>
            </div>
        </div>

        <!-- Cuarto Grado -->
        <div class="grado">
            <button onclick="toggleMaterias('CuartoGrado')">Cuarto Grado</button>
            <div id="CuartoGrado" class="materias">
                <ul>
                    <li><a href="CuartoGrado/matematicas.php">Matemáticas</a></li>
                    <li><a href="CuartoGrado/sociales.php">Sociales</a></li>
                    <li><a href="CuartoGrado/lenguaje.php">Lenguaje</a></li>
                    <li><a href="CuartoGrado/ciencias.php">Ciencias</a></li>
                    <li><a href="CuartoGrado/ingles.php">Inglés</a></li>
                    <li><a href="CuartoGrado/artistica.php">Artística</a></li>
                </ul>
            </div>
        </div>

<!-- Quinto Grado -->
<div class="grado">
            <button onclick="toggleMaterias('QuintoGrado')">Quinto Grado</button>
            <div id="QuintoGrado" class="materias">
                <ul>
                    <li><a href="QuintoGrado/matematicas.php">Matemáticas</a></li>
                    <li><a href="QuintoGrado/sociales.php">Sociales</a></li>
                    <li><a href="QuintoGrado/lenguaje.php">Lenguaje</a></li>
                    <li><a href="QuintoGrado/ciencias.php">Ciencias</a></li>
                    <li><a href="QuintoGrado/ingles.php">Inglés</a></li>
                    <li><a href="QuintoGrado/artistica.php">Artística</a></li>
                </ul>
            </div>
        </div>

        <!-- Sexto Grado -->
        <div class="grado">
            <button onclick="toggleMaterias('SextoGrado')">Sexto Grado</button>
            <div id="SextoGrado" class="materias">
                <ul>
                    <li><a href="SextoGrado/matematicas.php">Matemáticas</a></li>
                    <li><a href="SextoGrado/sociales.php">Sociales</a></li>
                    <li><a href="SextoGrado/lenguaje.php">Lenguaje</a></li>
                    <li><a href="SextoGrado/ciencias.php">Ciencias</a></li>
                    <li><a href="SextoGrado/ingles.php">Inglés</a></li>
                    <li><a href="SextoGrado/artistica.php">Artística</a></li>
                </ul>
            </div>
        </div>

        <!-- Septimo Grado -->
        <div class="grado">
            <button onclick="toggleMaterias('SeptimoGrado')">Septimo Grado</button>
            <div id="SeptimoGrado" class="materias">
                <ul>
                    <li><a href="SeptimoGrado/matematicas.php">Matemáticas</a></li>
                    <li><a href="SeptimoGrado/sociales.php">Sociales</a></li>
                    <li><a href="SeptimoGrado/lenguaje.php">Lenguaje</a></li>
                    <li><a href="SeptimoGrado/ciencias.php">Ciencias</a></li>
                    <li><a href="SeptimoGrado/ingles.php">Inglés</a></li>
                    <li><a href="SeptimoGrado/artistica.php">Artística</a></li>
                </ul>
            </div>
        </div>

        <!-- Octavo Grado -->
        <div class="grado">
            <button onclick="toggleMaterias('OctavoGrado')">Octavo Grado</button>
            <div id="OctavoGrado" class="materias">
                <ul>
                    <li><a href="OctavoGrado/matematicas.php">Matemáticas</a></li>
                    <li><a href="OctavoGrado/sociales.php">Sociales</a></li>
                    <li><a href="OctavoGrado/lenguaje.php">Lenguaje</a></li>
                    <li><a href="OctavoGrado/ciencias.php">Ciencias</a></li>
                    <li><a href="OctavoGrado/ingles.php">Inglés</a></li>
                    <li><a href="OctavoGrado/artistica.php">Artística</a></li>
                </ul>
            </div>
        </div>

        <!-- Noveno Grado -->
        <div class="grado">
            <button onclick="toggleMaterias('NovenoGrado')">Noveno Grado</button>
            <div id="NovenoGrado" class="materias">
                <ul>
                    <li><a href="NovenoGrado/matematicas.php">Matemáticas</a></li>
                    <li><a href="NovenoGrado/sociales.php">Sociales</a></li>
                    <li><a href="NovenoGrado/lenguaje.php">Lenguaje</a></li>
                    <li><a href="NovenoGrado/ciencias.php">Ciencias</a></li>
                    <li><a href="NovenoGrado/ingles.php">Inglés</a></li>
                    <li><a href="NovenoGrado/artistica.php">Artística</a></li>
                </ul>
            </div>
        </div>

        <!-- Repetir las secciones de otros grados aquí... -->

    </div>

    <div class="menu">
        <a href="/control_solvencias/dashboard.php">Volver a inicio</a>
    </div>

    <script>
        function toggleMaterias(id) {
            var materiasDiv = document.getElementById(id);
            if (materiasDiv.style.display === "none" || materiasDiv.style.display === "") {
                materiasDiv.style.display = "block";
            } else {
                materiasDiv.style.display = "none";
            }
        }
    </script>
</body>
</html>