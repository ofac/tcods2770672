<?php

    // - - - - - - - - - - - - - - - - - - - - 
    // Connection
    try {
        $conx = new PDO("mysql:host=".HOST.";dbname=".DBNAME."", USER, PASS);

        // if ($conx) {
        //     echo "<h4>Connection DB Success ✅ </h4>";
        // }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // - - - - - - - - - - - - - - - - - - - - 
    // login User
    function loginUser($conx, $email, $pass) {
        try {
            $sql = "SELECT * FROM users
                    WHERE email = :email 
                    LIMIT 1";
            $stm = $conx->prepare($sql);
            $stm->execute(['email' => $email]);

            if ($stm->rowCount() > 0) {
                $user = $stm->fetch();
                if (password_verify($pass, $user['password'])) {
                    $_SESSION['uid']   = $user['id'];
                    $_SESSION['urole'] = $user['role'];
                    return true;
                } else {
                    $_SESSION['error'] = "Email or Password incorrect, please try again";
                    return false;
                }
            } else {
                $_SESSION['error'] = "Email or Password incorrect, please try again";
                return false;
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // - - - - - - - - - - - - - - - - - - - - 
    // get Record
    function getUser($conx, $id) {
        try {
            $sql = "SELECT * FROM users WHERE id = :id";
            $stm = $conx->prepare($sql);
            $stm->execute(['id' => $id]);
            return $stm->fetch();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // - - - - - - - - - - - - - - - - - - - - 
    // Add User
    function addUser($conx, $data) {
        try {
            $sql = "INSERT INTO users (document, fullname, photo, phone, email, password)
                    VALUES (:document, :fullname, :photo, :phone, :email, :password)";
            $smt = $conx->prepare($sql); 
            
            if ($smt->execute($data)) {
                $_SESSION['msg'] = 'The ' . $data['fullname'] . ' user was registered successfully.' ;
                return true;
            } else {
                return false;
            } 

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    
