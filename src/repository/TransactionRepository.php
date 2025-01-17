<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Transaction.php';
class TransactionRepository extends Repository
{
    public function getTransaction(int $id): ?Transaction{
        $stmt = $this->database->getConnection()->prepare('
            SELECT transactions.id_transaction, transactions.title, transactions.amount, categories.name
            FROM transactions
            INNER JOIN categories on categories.id_category = transactions.id_category
            WHERE id_transaction = :id
            
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $transaction = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$transaction) {
            return null;
        }

        return new Transaction(
            $transaction['title'],
            $transaction['amount'],
            $transaction['name']
        );
    }
    public function addTransaction(Transaction $transaction): void{
        $stmt=$this->database->getConnection()->prepare('
            INSERT INTO transactions (amount, title, id_category, id_user)
            VALUES (?, ?, ?, ?)
        ');

        $pom = $transaction->getCategory();
        $pom2 =$transaction->getAmount();
        switch ($pom){
            case 'Food':
                $category_id = 1;
                $pom2 *=-1;
                break;
            case 'Entertainment':
                $category_id = 2;
                $pom2 *=-1;
                break;
            case 'Education':
                $category_id = 3;
                $pom2 *=-1;
                break;
            case 'Transport':
                $pom2 *=-1;
                $category_id = 4;
                break;
            case 'Income':
                $category_id = 5;
                break;
        }


        $stmt->execute([
            $pom2,
            $transaction->getTitle(),
            $category_id,
            $_COOKIE['id_user']
        ]);
    }

    public function getTransactions(): array{
        $result = [];
        $ciastko = $_COOKIE['id_user'];
        $stmt = $this->database->getConnection()->prepare('
            SELECT transactions.id_transaction, transactions.title, transactions.amount, categories.name
            FROM transactions
            INNER JOIN categories on categories.id_category = transactions.id_category
            WHERE transactions.id_user = :ciastko
        ');
        $stmt->execute(['ciastko'=>$ciastko]);
        $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($transactions as $transaction){
            $result[]=new Transaction(
                $transaction['title'],
                $transaction['amount'],
                $transaction['name']
            );
        }
        return $result;
    }


}