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
            RecipeSite("Pancakes"); 
            include '../parts/comments.php' ?>
        </div>

        <footer>
            <?php include '../parts/footer.php' ?>
        </footer>
    </body>
</html>
