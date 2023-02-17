<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Limit.php';
class LimitRepository extends Repository
{
    public function updateLimit(Limit $limit): void{
        $stmt=$this->database->connect()->prepare('
            UPDATE public.user_limits
            SET user_limits.limit= :limit
            WHERE user_limits.id_user = :id_user AND user_limits.id_category = :id_category
            VALUES (?, ?, ?)
        ');

        $stmt->execute(['limit'=>$limit->getLimit(),
            'id_user'=>$limit->getIdUser(),
            'id_category'=>$limit->getIdCategory()]);
    }

    public function getLimits(): array{
        $result = [];
        $ciastko = $_COOKIE['id_user'];
        $stmt = $this->database->connect()->prepare('
            SELECT user_limits.id_user, user_limits.id_category, user_limits.limit
            FROM user_limits
            WHERE user_limits.id_user = :ciastko
        ');
        $stmt->execute(['ciastko'=>$ciastko]);
        $limits = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($limits as $limit){
            $result[]=new Limit(
                $limit['id_user'],
                $limit['id_category'],
                $limit['limit']
            );
        }
        return $result;
    }
}