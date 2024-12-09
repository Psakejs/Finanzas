<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Meta charset for encoding -->
    <meta charset="UTF-8">
    <!-- Meta description for SEO -->
    <meta name="description" content="Breve descripción de la página">
    <!-- Meta robots for search engine instructions -->
    <meta name="robots" content="index,follow">
    <!-- Responsive viewport settings -->
    <meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- Meta keywords for SEO -->
    <meta name="keywords" content="HTML,CSS">
    <title>Lista de ingresos</title>
    <!-- Link to external CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Contenido principal -->
    <header>
        <h1>Lista de ingresos</h1>
    </header>
    <main>
        <section>
            <ul>
                <?php foreach( $results as $result) : ?>

                    <li>Ganaste <?=$result["amount"] ?> USD en <?= $result['description'] ?> </li>

                <?php endforeach; ?>
            </ul>
        </section>
    </main>
    <footer>
        <p>&copy; 2024</p>
    </footer>
</body>
</html>