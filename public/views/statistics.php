<!DOCTYPE html>
<html>
  <head>
      <title>OnBudget | Statistics</title>
      <link rel="icon" href="public/img/favicon.svg">
      <link rel="stylesheet" type="text/css" href="public/css/navigation.css">
      <link rel="stylesheet" type="text/css" href="public/css/statistics.css">
      <?php include "header.php" ?>
  </head>
  <body>
    <div class="base-container">
        <?php include "navigation.php"?>
        <main>
            <h1>Statistics</h1>
            <h2 id="h1">Category</h2>
            <h2 id="h2">Progress</h2>

            <p class="food name">Food</p>
            <meter class="food progress-c" value="<?=$per_food?>" max="100" high="75" low="25"></meter>
            <p class="food percentage"><?=$per_food?>%</p>

            <p class="entertainment name">Entertainment</p>
            <meter class="entertainment progress-c" value="<?=$per_enter?>" max="100" high="75"></meter>
            <p class="entertainment percentage"><?=$per_enter?>%</p>

            <p class="education name">Education</p>
            <meter id="zz" class="education progress-c" value="<?=$per_edu?>" max="100" high="75"></meter>
            <p class="education percentage"><?=$per_edu?>%</p>

            <p class="transport name">Transport</p>
            <meter class="transport progress-c" value="<?=$per_trans?>" max="100" high="75"></meter>
            <p class="transport percentage"><?=$per_trans?>%</p>

        </main>
    </div>
  </body>
</html>