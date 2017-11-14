<!DOCTYPE html>
<html>
    <head>
        <?php include '../parts/head.php' ?>
    </head>
    <body>
        <header>
            <?php include '../parts/header.php' ?>
        </header>

        <div class="recipe-site">
            <?php 
            require 'recipe.php';
            RecipeSite("Meatballs");
            ?>
        </div>

        <footer>
            <?php include '../parts/footer.php' ?>
        </footer>
    </body>

</html>
