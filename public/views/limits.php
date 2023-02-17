<!DOCTYPE html>
<html>
    <head>
        <title>OnBudget | Limits</title>
        <link rel="icon" href="public/img/favicon.svg">
        <link rel="stylesheet" type="text/css" href="public/css/limits.css">
        <link rel="stylesheet" type="text/css" href="public/css/navigation.css">
        <?php include "header.php" ?>
    </head>
    <body>
        <div class="base-container">
            <?php include "navigation.php"?>
            <main>
                <form action="setLimits" method="post">
                    <h1>Limits</h1>
                    <h2 id="h1">Category</h2>
                    <h2 id="h2">Amount</h2>
                    <h2 id="h3">New</h2>

                    <p class="food name">Food</p>
                    <p class="food current">$<?=$limits[0]->getLimit()?></p>
                    <input placeholder="$" class="food new" name="Food" type="number" step="0.01">

                    <p class="entertainment name">Entertainment</p>
                    <p class="entertainment current">$<?=$limits[1]->getLimit()?></p>
                    <input placeholder="$" class="entertainment new" name="Entertainment" type="number" step="0.01">

                    <p class="education name">Education</p>
                    <p class="education current">$<?=$limits[2]->getLimit()?></p>
                    <input placeholder="$" class="education new" name="Education" type="number" step="0.01">


                    <p class="transport name">Transport</p>
                    <p class="transport current">$<?=$limits[3]->getLimit()?></p>
                    <input placeholder="$" class="transport new" name="Transport" type="number" step="0.01">

                    <button type="submit" id="save">Save</button>
                </form>
            </main>

        </div>
    </body>
</html>