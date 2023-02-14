<!DOCTYPE html>
<html>
<head>
    <title>OnBudget | New Transaction</title>
    <link rel="icon" href="public/img/favicon.svg">
    <link rel="stylesheet" type="text/css" href="public/css/newtransaction.css">
    <?php include "header.php" ?>
</head>
<body>
<div class="base-container">
    <?php include "navigation.php"?>
    <main>
        <h1>New Transaction</h1>
        <?php
        if(isset($messages)){
            foreach($messages as $message) {
                echo $message;
            }
        }
        ?>
        <form action="addTransaction" method="POST">
            <input type="radio" id="inc" name="choice" value="Income">
            <label for="income">Income</label><br>

            <input type="radio" id="exp" name="choice" value="Expense">
            <label for="expense">Expense</label><br>
            <br>

            <label for="category">Categories:</label><br>

            <select name="category">
                <option value = "Food">Food</option>
                <option value = "Entertainment">Entertainment</option>
                <option value = "Education">Education</option>
                <option value = "Transport">Transport</option>
            </select><br><br>

            <label for="title">Title:</label>
            <input name="title" id="title" placeholder="Transaction title"><br>

            <label for="amount">Amount:</label>
            <input name="amount" id="amount-text" placeholder="$">

            <button type="submit" id="save">Save</button>
        </form>

    </main>

</div>
</body>
</html>