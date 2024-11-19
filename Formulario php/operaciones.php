<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $number1 = floatval($_POST['number1']);
    $number2 = floatval($_POST['number2']);
    $operation = $_POST['operation'];
    switch ($operation) {
        case 'sum':
            $result = $number1 + $number2;
            break;
        case 'subtraction':
            $result = $number1 - $number2;
            break;
        case 'multiplication':
            $result = $number1 * $number2;
            break;
        case 'division':
            $result = $number2 != 0 ? $number1 / $number2 : 'Error: División por cero';
            break;
        default:
            $result = 'Operación no válida';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operación Matemática</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Operación Matemática</h1>
    </header>
    <div class="container">
        <form method="POST">
            <label for="number1">Número 1:</label>
            <input type="number" name="number1" required>
            <label for="number2">Número 2:</label>
            <input type="number" name="number2" required>
            <label for="operation">Operación a realizar:</label>
            <select name="operation" required>
                <option value="sum">Suma</option>
                <option value="subtraction">Resta</option>
                <option value="multiplication">Multiplicación</option>
                <option value="division">División</option>
            </select>
            <button type="submit">Calcular</button>
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
        <div class="results">
            <h2>Resultado:</h2>
            <p><?= $result ?></p>
        </div>
        <?php endif; ?>

        <a href="index.php">Volver</a>
    </div>
    <footer>
        <p>&copy; 2024 Formulario PHP</p>
    </footer>
</body>
</html>
