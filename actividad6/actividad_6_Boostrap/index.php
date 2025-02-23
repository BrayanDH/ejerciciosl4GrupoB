<!DOCTYPE html>
<html>
<head>
    <title>Conversor de Medidas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Conversor de Medidas</h2>
        <form action="conversiones.php" method="post">
            <div class="form-group mb-3">
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" required step="any">
            </div>
            <div class="form-group mb-3">
                <label for="unidad_original">Unidad Original:</label>
                <select class="form-control" id="unidad_original" name="unidad_original">
                    <option value="metros">Metros (m)</option>
                    <option value="pies">Pies (ft)</option>
                    <option value="pulgadas">Pulgadas (in)</option>
                    <option value="kilogramos">Kilogramos (kg)</option>
                    <option value="libras">Libras (lb)</option>
                    <option value="celsius">Celsius (°C)</option>
                    <option value="fahrenheit">Fahrenheit (°F)</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="unidad_conversion">Convertir a:</label>
                <select class="form-control" id="unidad_conversion" name="unidad_conversion">
                    <option value="metros">Metros (m)</option>
                    <option value="pies">Pies (ft)</option>
                    <option value="pulgadas">Pulgadas (in)</option>
                    <option value="kilogramos">Kilogramos (kg)</option>
                    <option value="libras">Libras (lb)</option>
                    <option value="celsius">Celsius (°C)</option>
                    <option value="fahrenheit">Fahrenheit (°F)</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Convertir</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>