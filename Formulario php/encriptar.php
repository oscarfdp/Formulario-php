<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $message = $_POST['message'];
    $encrypted = base64_encode($message);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encriptar un mensaje</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Encriptar un mensaje</h1>
    </header>
    <div class="container">
        <form method="POST">
            <label for="message">Mensaje:</label>
            <textarea name="message" required></textarea>
            <button type="submit">Encriptar</button>
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
        <div class="results">
            <h2>Mensaje Encriptado:</h2>
            <p><?= $encrypted ?></p>
        </div>
        <?php endif; ?>

        <a href="index.php">Volver</a>
    </div>
    <footer>
        <p>&copy; 2024 Formulario PHP</p>
    </footer>
</body>
</html>
