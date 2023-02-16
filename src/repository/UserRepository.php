<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
class UserRepository extends Repository
{

    public function getUsername(int $id): ?string{
        $stmt = $this->database->connect()->prepare('
            SELECT name FROM public.user_details
            WHERE id_user_details = (SELECT id_user_details FROM public.users WHERE id_user=:id)
        ');

        $stmt->execute(['id'=>$id]);
        $username = $stmt->fetch(PDO::FETCH_ASSOC);
        return $username['name'];

    }
    public function getUser(string $email): ?User{
        $stmt = $this->database->connect()->prepare('
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

        $connection = $this->database->connect();

        $connection->beginTransaction();

        try {

            $stmt = $connection->prepare('
                INSERT INTO public.user_details (name, surname)
                VALUES (?, ?)
            ');

            $stmt->execute([
                $user->getName(),
                $user->getSurname()
            ]);

            $stmt = $connection->prepare('
                INSERT INTO public.users (email, password, id_user_details)
                VALUES (?, ?, ?)
            ');

            $stmt->execute([
                $user->getEmail(),
                $user->getPassword(),
                $this->getUserDetailsId($user)
            ]);

            $connection->commit();

        }catch(PDOException $e) {

            $connection->rollBack();

        }

    }

    public function getUserDetailsId(User $user): int{
        $stmt = $this->database->connect()->prepare('
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