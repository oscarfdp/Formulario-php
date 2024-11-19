<?php
$error = '';
$mean = $median = $mode = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
 
    if (empty($_POST['values'])) {
        $error = 'Por favor, introduce algunos valores.';
    } else {
       
        $values = explode(',', $_POST['values']);
        $values = array_map('trim', $values); 
        if (array_filter($values, function($v) { return !is_numeric($v); })) {
            $error = 'Todos los valores deben ser numéricos.';
        } else {
            $values = array_map('floatval', $values);
            $mean = array_sum($values) / count($values);
            $frequency = array_count_values($values);
            $max_freq = max($frequency);
            $mode = array_keys($frequency, $max_freq);
            sort($values);
            $count = count($values);
            $middle = floor($count / 2);
            $median = ($count % 2 === 0) ? ($values[$middle - 1] + $values[$middle]) / 2 : $values[$middle];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Cálculo de Media, Moda y Mediana</h1>
    </header>
    <div class="container">
        <form method="POST">
            <label for="values">Valores (separados por comas):</label>
            <input type="text" name="values" required>
            <button type="submit">Calcular</button>
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
        <div class="results">
            <?php if ($error): ?>
                <p class="error"><?= $error ?></p>
            <?php else: ?>
                <h2>Resultados:</h2>
                <p>Media: <?= $mean ?></p>
                <p>Moda: <?= implode(', ', $mode) ?></p>
                <p>Mediana: <?= $median ?></p>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <a href="index.php">Volver</a>
    </div>
    <footer>
        <p>&copy; 2024 Formulario PHP</p>
    </footer>
</body>
</html>

