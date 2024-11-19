<?php
$error = ''; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $a = $_POST['input1'];
    $b = $_POST['input2'];

 
    if (($a !== '1' && $a !== '0') || ($b !== '1' && $b !== '0')) {
        $error = "Por favor, ingresa solo los valores 1 o 0.";
    } else {
      
        $a = $a === '1' ? 1 : 0;
        $b = $b === '1' ? 1 : 0;
        $and = $a && $b;
        $or = $a || $b;
        $xor = $a xor $b;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puertas Lógicas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Puertas Lógicas</h1>
    </header>
    <div class="container">
        <form method="POST">
            <label for="input1">Valor 1 (1 o 0):</label>
            <input type="text" name="input1" required>
            <label for="input2">Valor 2 (1 o 0):</label>
            <input type="text" name="input2" required>
            <button type="submit">Calcular</button>
        </form>

        <?php if ($error): ?>
            <p style="color: red;"><?= $error ?></p>
        <?php endif; ?>

        <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && !$error): ?>
        <div class="results">
            <h2>Resultados:</h2>
            <p>AND: <?= $and ? '1' : '0' ?></p>
            <p>OR: <?= $or ? '1' : '0' ?></p>
            <p>XOR: <?= $xor ? '1' : '0' ?></p>
        </div>
        <?php endif; ?>

        <a href="index.php">Volver</a>
    </div>
    <footer>
        <p>&copy; 2024 Formulario PHP</p>
    </footer>
</body>
</html>
