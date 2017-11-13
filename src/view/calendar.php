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
        <div class="calendar">
            <h3>Food Calendar</h3>
            <div class="calendar-table">
                <table>
                    <tr>
                        <th>Sun</th>
                        <th>Mon</th>
                        <th>Tue</th>
                        <th>Wed</th>
                        <th>Thu</th>
                        <th>Fri</th>
                        <th>Sat</th>
                    </tr>
                    <tr>
                        <!-- Plan is to have the food image as a background image that is added by adding a class to the td -->
                        <td></td>
                        <td></td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>7</td>
                        <td class="meatballs"><a href="recipes/meatballs.php">8</a></td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>14</td>
                        <td>15</td>
                        <td>16</td>
                        <td class="pancakes"><a href="recipes/pancakes.php">17</a></td>
                        <td>18</td>
                        <td>19</td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <td>21</td>
                        <td>22</td>
                        <td>23</td>
                        <td>24</td>
                        <td>25</td>
                        <td>26</td>
                    </tr>
                    <tr>
                        <td>27</td>
                        <td>28</td>
                        <td>29</td>
                        <td>30</td>
                        <td>31</td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
        <footer>
            <?php include 'parts/footer.php' ?>
        </footer>
    </body>
</html>