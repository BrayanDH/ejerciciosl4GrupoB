<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo sin Bootstrap</title>
    <style>
        .container {
            max-width: 960px; /* Ancho máximo del contenedor */
            margin: 0 auto; /* Centrar el contenedor */
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .row {
            display: flex; /* Usar flexbox para alinear los elementos horizontalmente */
            flex-wrap: wrap; /* Permitir que los elementos se ajusten a la siguiente línea si es necesario */
        }

        .col {
            flex: 1 1 50%; /* Cada columna ocupa el 50% del ancho, pero puede crecer o encoger */
            box-sizing: border-box; /* Incluir el padding y el borde en el ancho total */
            padding: 10px;
        }

        img {
            max-width: 100%; /* La imagen no excederá el ancho del contenedor */
            height: auto; /* Mantener la relación de aspecto de la imagen */
        }

        /* Estilos para pantallas más pequeñas */
        @media (max-width: 768px) {
            .col {
                flex: 1 1 100%; /* En pantallas pequeñas, cada columna ocupa el 100% del ancho */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido a mi sitio web</h1>
        
        <div class="row">
            <div class="col">
                <img src="images/gatito.jpg" alt="gatito">
            </div>
            <div class="col">
                <p>Este es un ejemplo de cómo crear un diseño responsivo sin Bootstrap, utilizando CSS puro. El contenido se adaptará al tamaño de la pantalla.</p>
                <button>Más información</button>
            </div>
        </div>
    </div>
</body>
</html>