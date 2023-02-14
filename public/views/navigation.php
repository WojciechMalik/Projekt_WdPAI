<!DOCTYPE html>
<html>
    <head>
        <title>OnBudget | Dashboard</title>
        <link rel="stylesheet" type="text/css" href="public/css/navigation.css">
        <?php include "header.php" ?>
    </head>
    <body>
        <nav>
            <h1><span>On</span>Budget</h1>
            <ul>
                <li class="new-transaction">
                    <button>
                        <img src="public/img/transaction-icon.svg" alt="new transaction icon">
                        New Transaction
                    </button>
                </li>
                <li>
                    <button>
                        <img src="public/img/dashboard-icon.svg" alt="dashboard icon">
                        Dashboard
                    </button>
                </li>
                <li>
                    <button>
                        <img src="public/img/statistics-icon.svg" alt="stats icon">
                        Statistics
                    </button>
                </li>
                <li>
                    <button>
                        <img src="public/img/limits-icon.svg" alt="limits icon">
                        Limits
                    </button>
                </li>
                <li class="logout">
                    <button>
                        <img src="public/img/logout-icon.svg" alt="logout icon">
                        Logout
                    </button>
                </li>
            </ul>
        </nav>
    </body>
</html>