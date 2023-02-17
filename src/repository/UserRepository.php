<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
class UserRepository extends Repository
{

    public function getUsername(int $id): ?string{
        $stmt = $this->database->getConnection()->prepare('
            SELECT name FROM public.user_details
            WHERE id_user_details = (SELECT id_user_details FROM public.users WHERE id_user=:id)
        ');

        $stmt->execute(['id'=>$id]);
        $username = $stmt->fetch(PDO::FETCH_ASSOC);
        return $username['name'];
    }

    public function getUserID(string $mail) : int{
        $stmt = $this->database->getConnection()->prepare('
            SELECT id_user FROM public.users
            WHERE email = :mail
        ');
        $stmt->execute(['mail'=>$mail]);
        $id = $stmt->fetch(PDO::FETCH_ASSOC);
        return $id['id_user'];
    }
    public function getUser(string $email): ?User{
        $stmt = $this->database->getConnection()->prepare('
            SELECT * FROM public.users u LEFT JOIN public.user_details ud
            ON u.id_user_details = ud.id_user_details WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }

        setcookie('id_user', $user['id_user'], time()+60*60*24);

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname']
        );
    }

    public function addUser(User $user){

        $this->database->getConnection()->beginTransaction();

        try {

            $stmt = $this->database->getConnection()->prepare('
                INSERT INTO user_details (name, surname)
                VALUES (?, ?)
            ');

            $stmt->execute([
                $user->getName(),
                $user->getSurname()
            ]);

            $stmt = $this->database->getConnection()->prepare('
                INSERT INTO users (email, password, id_user_details)
                VALUES (?, ?, ?)
            ');

            $stmt->execute([
                $user->getEmail(),
                $user->getPassword(),
                $this->getUserDetailsId($user)
            ]);

            $stmt = $this->database->getConnection()->prepare('
                    INSERT INTO user_limits (id_user, id_category, amount)
                    VALUES (?, ?, ?)
                ');
            foreach ([1, 2, 3, 4] as $i) {


                $stmt->execute([
                    $this->getUserID($user->getEmail()),
                    $i,
                    0
                ]);
            }

            $this->database->getConnection()->commit();
        }catch(PDOException $e) {
            $this->database->getConnection()->rollBack();
        }

    }

    public function getUserDetailsId(User $user): int{
        $stmt = $this->database->getConnection()->prepare('
            SELECT * FROM public.user_details WHERE name = :name AND surname = :surname
        ');
        $nam = $user->getName();
        $sur = $user->getSurname();
        $stmt->bindParam(':name',$nam , PDO::PARAM_STR);
        $stmt->bindParam(':surname',$sur , PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id_user_details'];
    }
}