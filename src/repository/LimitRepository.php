<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Limit.php';
class LimitRepository extends Repository
{
    public function updateLimit(Limit $amount): void{
        $stmt=$this->database->getConnection()->prepare('
            UPDATE user_limits
            SET amount= :amount
            WHERE id_user = :id_user AND id_category = :id_category
        ');
        
        $stmt->execute(['amount'=>$amount->getLimit(),
            'id_user'=>$amount->getIdUser(),
            'id_category'=>$amount->getIdCategory()]);
    }

    public function getLimits(): array{
        $result = [];
        $ciastko = $_COOKIE['id_user'];
        $stmt = $this->database->getConnection()->prepare('
            SELECT user_limits.id_user, user_limits.id_category, user_limits.amount
            FROM user_limits
            WHERE user_limits.id_user = :ciastko
        ');
        $stmt->execute(['ciastko'=>$ciastko]);
        $limits = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($limits as $limit){
            $result[]=new Limit(
                $limit['id_user'],
                $limit['id_category'],
                $limit['amount']
            );
        }
        return $result;
    }
}