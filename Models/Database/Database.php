<?php

namespace Models\Database;

use Models\Auth\User;
use PDO;
use PDOException;

class Database
{
    private PDO $conectdb;

    public function __construct($dbConfig)
    {
        // Connect to the database using provided configuration
        $this->conectdb = new PDO("mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']}",
            $dbConfig['username'], $dbConfig
            ['password']);
        $this->conectdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getUserByEmail($email)
    {
        try {
            $stmt = $this->conectdb->prepare("SELECT id, name, matricule, email, password FROM user WHERE email = :email");
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return new User($result['name'], $result['matricule'], $result['email'], $result['password'], (int)$result['id']);
            } else {
                return null;
            }
        } catch (PDOException $e) {
            // Handle database errors (logging, error messages)
            return 'erreur';
        }
    }

    // Inside your Database class
    // Inside your Database class
    public function saveUser(User $user)
    {
        try {
            $sql = "INSERT INTO user (name, matricule, email, password) VALUES (:name, :matricule, :email, :password)";
            $stmt = $this->conectdb->prepare($sql);

            // Bind parameters
            $stmt->bindValue(':name', $user->getName());
            $stmt->bindValue(':matricule', $user->getMatricule());
            $stmt->bindValue(':email', $user->getEmail());
            $stmt->bindValue(':password', $user->getPasswordHash());

            // Execute the statement
            $stmt->execute();

            // Return true on success
            return true;
        } catch (PDOException $e) {
            // Handle exceptions (e.g., duplicate entry for unique constraint on email)
            // You might want to log the error or return false with an error message
            echo $e->getMessage(); // Output the error for debugging purposes
            return false;
        }
    }

    public function getClasses()
    {
        try {
            $stmt = $this->conectdb->query("SELECT * FROM classes");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        } catch (PDOException $e) {
            // Gérez les erreurs de la base de données (journalisation, messages d'erreur)
            return [];
        }
    }

    // Inside your Database class
    public function getSemestersForClass($classId)
    {
        try {
            $stmt = $this->conectdb->prepare("SELECT * FROM semesters WHERE class_id = :class_id");
            $stmt->bindParam(":class_id", $classId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle exceptions (log, return false, etc.)
            echo $e->getMessage(); // Output the error for debugging purposes
            return false;
        }
    }

    public function getListForSemester($semesterId)
    {
        try {
            $stmt = $this->conectdb->prepare("SELECT * FROM course_lists WHERE semester_id = :semester_id");
            $stmt->bindParam(":semester_id", $semesterId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage(); // Pour le débogage, pensez à logger cette erreur dans un environnement de production
            return false;
        }
    }

    public function getDetailsForCourseList($courselistId)
    {
        try {
            $stmt = $this->conectdb->prepare("SELECT * FROM courses WHERE course_list_id = :course_list_id");
            $stmt->bindParam(":course_list_id", $courselistId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage(); // Pour le débogage, pensez à logger cette erreur dans un environnement de production
            return false;
        }
    }


}