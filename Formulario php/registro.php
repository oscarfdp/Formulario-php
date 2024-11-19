<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $description = htmlspecialchars($_POST['description']);
    $gender = $_POST['gender'];
    $services = isset($_POST['services']) ? implode(', ', $_POST['services']) : 'Ninguno';
    $image = $_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/' . $image);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Inscripción</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Registro de Inscripción</h1>
    </header>
    <div class="container">
        <form method="POST" enctype="multipart/form-data">
            <label for="name">Nombre:</label>
            <input type="text" name="name" required>
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" required>
            <label for="description">Descripción (máximo 5 líneas):</label>
            <textarea name="description" maxlength="300" required></textarea>
            <label for="gender">Género:</label>
            <select name="gender" required>
                <option value="male">Masculino</option>
                <option value="female">Femenino</option>
                <option value="other">Otro</option>
            </select>
            <label for="services">Rango de edad:</label>
            <input type="checkbox" name="services[]" value="Servicio 1"> 18- 35<br>
            <input type="checkbox" name="services[]" value="Servicio 2"> 35-60 <br>
            <input type="checkbox" name="services[]" value="Servicio 3"> + 60 <br>
            <label for="photo">Fotografía:</label>
            <input type="file" name="photo" accept="image/*" required>
            <button type="submit">Registrar</button>
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
        <div class="results">
            <h2>Datos Registrados:</h2>
            <p><strong>Nombre:</strong> <?= $name ?></p>
            <p><strong>Correo Electrónico:</strong> <?= $email ?></p>
            <p><strong>Descripción:</strong> <?= nl2br($description) ?></p>
            <p><strong>Género:</strong> <?= $gender ?></p>
            <p><strong>Edad seleccionada:</strong> <?= $services ?></p>
            <p><strong>Fotografía Subida:</strong></p>
            <img src="uploads/<?= $image ?>" alt="Fotografía de <?= $name ?>" style="max-width: 200px;">
        </div>
        <?php endif; ?>

        <a href="index.php">Volver</a>
    </div>
    <footer>
        <p>&copy; 2024 Formulario PHP</p>
    </footer>
</body>
</html>
