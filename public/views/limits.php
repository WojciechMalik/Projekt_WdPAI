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
                <h1>Limits</h1>
                <h2 id="h1">Category</h2>
                <h2 id="h2">Amount</h2>
                <h2 id="h3">New</h2>
                <form action="setLimits" method="post">
                    <div class="limit-container food">
                        <p class="name">Food</p>
                        <p class="current">$<?=$limits[0]->getLimit()?></p>
                        <input placeholder="$" class="new" name="Food">
                    </div>
                    <div class="limit-container entertainment ">
                        <p class="name">Entertainment</p>
                        <p class="current">$<?=$limits[1]->getLimit()?></p>
                        <input placeholder="$" class="new" name="Entertainment">
                    </div>
                    <div class="limit-container education ">
                        <p class="name">Education</p>
                        <p class="current">$<?=$limits[2]->getLimit()?></p>
                        <input placeholder="$" class="new" name="Education">
                    </div>
                    <div class="limit-container transport">
                        <p class="name">Transport</p>
                        <p class="current">$<?=$limits[3]->getLimit()?></p>
                        <input placeholder="$" class="new" name="Transport">
                    </div>
                    <button type="submit" id="save">Save</button>
                </form>
            </main>

        </div>
    </body>
</html>