<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tasty Recipes</title>
        <link rel="stylesheet" href="css/normalize.css"> <!-- used as reset -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/responsive.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header>
            <?php include 'parts/header.php' ?>
        </header>

        <section id="home">
            <h3 class="hidden">Home Page</h3>
            <a href="calendar.php">
                <img alt="table with tomatoes pasta and a wooden spoon, linking to calendar site" src="img/home1.jpg">
            </a>
            <a class="button" href="calendar.php">Check out the recipe of the day!</a>
        </section>

        <footer>
            <?php include 'parts/footer.php' ?>
        </footer>
    </body>
</html>
