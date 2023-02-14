<!DOCTYPE html>
<html>
    <head>
        <title>OnBudget | Limits</title>
        <link rel="icon" href="public/img/favicon.svg">
        <link rel="stylesheet" type="text/css" href="public/css/limits.css">
        <?php include "header.php" ?>
    </head>
    <body>
        <div class="base-container">
            <?php include "navigation.php"?>
            <main>
                <h1>Limits</h1>
                <h2 id="h1">Category</h2>
                <h2 id="h2">Amount</h2>
                <h2 id="h3">New</h2>

                <p class="food name">Food</p>
                <p class="food current">$xx</p>
                <input value="$" class="food new">

                <p class="entertainment name">Entertainment</p>
                <p class="entertainment current">$xx</p>
                <input value="$" class="entertainment new">

                <p class="education name">Education</p>
                <p class="education current">$xx</p>
                <input value="$" class="education new">

                <p class="transport name">Transport</p>
                <p class="transport current">$xx</p>
                <input value="$" class="transport new">
                <button type="button" id="save">Save</button>
            </main>

        </div>
    </body>
</html>