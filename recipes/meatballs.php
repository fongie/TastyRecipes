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
            <div class="recipe">
                <div class="recipe-header">
                    <h3>Meatballs</h3>
                    <img alt="meatballs" src="/img/meatballs.jpg">
                </div>

                <ul class="ingredient-list">
                    <li class="li-heading"><h4>Ingredients</h4></li>
                    <li>4 eggs</li>
                    <li>1 cup milk</li>
                    <li>8 slices white bread, torn</li>
                    <li>2 pounds ground beef</li>
                    <li>1/4 cup finely chopped onion</li>
                    <li>4 teaspoons baking powder</li>
                    <li>1 to 2 teaspoons salt</li>
                    <li>1 teaspoon pepper</li>
                    <li>2 tablespoons shortening</li>
                    <li>2 cans (10-3/4 ounces each) condensed cream of chicken soup, undiluted</li>
                    <li>2 cans (10-3/4 ounces each) condensed cream of mushroom soup, undiluted</li>
                    <li>1 can (12 ounces) evaporated milk</li>
                    <li>Minced fresh parsely</li>
                </ul>

                <ul class="instructions-list">
                    <li class="li-heading"><h4>Instructions:</h4>
                        <li>In a large bowl, beat eggs and milk. Add bread; mix gently and let stand for 5 minutes. Add beef, onion, baking powder, salt and papper; mix well (mixture will be soft). Shape into 1-in. balls.</li>
                        <li>In a large skillet, brown meatballs, a few at a time, in shortening. Place in an ungreased 3-qt. baking dish. In a bowl, stir soups and milk until smooth, pour over meatballs. Bake, uncovered, at 350 degrees for 1 hour. Sprinkle with parsley. <strong>Yield:</strong> 8-10 servings.</li>
                </ul>
            </div>

            <?php include '../parts/comments.php' ?>
        </div>

        <footer>
            <?php include '../parts/footer.php' ?>
        </footer>
    </body>

</html>
