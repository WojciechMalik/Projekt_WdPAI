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
            <meter class="food progress-c" value="80" max="100" high="75"></meter>
            <p class="food percentage">80%</p>

            <p class="entertainment name">Entertainment</p>
            <meter class="entertainment progress-c" value="90" max="100" high="75"></meter>
            <p class="entertainment percentage">90%</p>

            <p class="education name">Education</p>
            <meter id="zz" class="education progress-c" value="20" max="100" high="75"></meter>
            <p class="education percentage">20%</p>

            <p class="transport name">Transport</p>
            <meter class="transport progress-c" value="70" max="100" high="75"></meter>
            <p class="transport percentage">70%</p>

        </main>
    </div>
  </body>
</html>