<!DOCTYPE html>
<html lang="en">
    <head>
        <title>OnBudget | Dashboard</title>
        <link rel="stylesheet" type="text/css" href="public/css/dashboard.css">
        <?php include "header.php" ?>
    </head>
    <body>
        <div class="base-container">
            <?php include "navigation.php"?>
            <main>
                <h1>Hi <?=$name?>!</h1>
                <section class="budget">
                    <p>Current Budget:</p>
                    <h2>$1000,00</h2>
                    <p class="income">Income:</p>
                    <h2>+$1000,00</h2>
                    <p class="expenses">Expenses:</p>
                    <h2>-$1000,00</h2>
                </section>
                <section class="transactions">
                    <p class="last-transactions">Last transactions</p>
                    <ul>
                        <?php foreach($transactions as $transaction):?>
                        <li>
                            <div class="transaction">
                                <p class="transaction-title"><?=$transaction->getTitle() ?></p>
                                <p class="transaction-amount"><?=$transaction->getAmount() ?>$</p>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </section>
                <img src="public/img/stonks.jpg" alt="stonks or not stonks">
            </main>
        </div>
    </body>
</html>

