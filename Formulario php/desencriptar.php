<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $encrypted = $_POST['encrypted_message'];
    $decrypted = base64_decode($encrypted);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desencriptar Mensaje</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Desencriptar Mensaje</h1>
    </header>
    <div class="container">
        <form method="POST">
            <label for="encrypted_message">Mensaje Encriptado:</label>
            <textarea name="encrypted_message" required></textarea>
            <button type="submit">Desencriptar</button>
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
        <div class="results">
            <h2>Mensaje Original:</h2>
            <p><?= $decrypted ?></p>
        </div>
        <?php endif; ?>

        <a href="index.php">Volver</a>
    </div>
    <footer>
        <p>&copy; 2024 Formulario PHP</p>
    </footer>
</body>
</html
