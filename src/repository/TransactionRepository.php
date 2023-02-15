<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Transaction.php';
class TransactionRepository extends Repository
{
    public function getTransaction(int $id): ?Transaction{
        $stmt = $this->database->connect()->prepare('
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
        $stmt=$this->database->connect()->prepare('
            INSERT INTO transactions (amount, title, id_category)
            VALUES (?, ?, ?)
        ');

        $pom = $transaction->getCategory();
        switch ($pom){
            case 'Food':
                $category_id = 1;
                break;
            case 'Entertainment':
                $category_id = 2;
                break;
            case 'Education':
                $category_id = 3;
                break;
            case 'Transport':
                $category_id = 4;
                break;
        }

        $stmt->execute([
            $transaction->getAmount(),
            $transaction->getTitle(),
            $category_id
        ]);

    }

}