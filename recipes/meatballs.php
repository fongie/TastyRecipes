<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tasty Recipes</title>
        <link rel="stylesheet" href="/css/normalize.css"> <!-- used as reset -->
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/css/responsive.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header>
            <?php include '../parts/header.php' ?>
        </header>

        <div class="recipe-site">
            <?php 
            require 'recipe.php';
            RecipeSite("Meatballs");
            include '../parts/comments.php' 
            ?>
        </div>

        <footer>
            <?php include '../parts/footer.php' ?>
        </footer>
    </body>

</html>
