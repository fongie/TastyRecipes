<!DOCTYPE html>
<html>
    <head>
        <?php require_once $_SERVER['DOCUMENT_ROOT'].'/src/view/parts/head.php' ?>
    </head>
    <body>
        <header>
            <?php require_once $_SERVER['DOCUMENT_ROOT'].'/src/view/parts/header.php' ?>
        </header>

        <section id="home">
            <h3 class="hidden">Home Page</h3>
            <a href="calendar.php">
                <img alt="table with tomatoes pasta and a wooden spoon, linking to calendar site" src="/img/home1.jpg">
            </a>
            <a class="button" href="calendar.php">Check out the recipe of the day!</a>
        </section>

        <footer>
            <?php require_once $_SERVER['DOCUMENT_ROOT'].'/src/view/parts/footer.php'; ?>
        </footer>
    </body>
</html>
