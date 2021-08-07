<?php

require_once('database.php');

class Login extends Database{
    
    public function loginPegawai($usernip, $password)
    {
        $sql = "SELECT * FROM pegawai WHERE nip = '$usernip' AND password = '$password' ";
        $query = mysqli_query($this->conn, $sql);
        
        if(mysqli_num_rows($query) < 1){
            echo "<script>
                    alert('Username atau password salah!');
                    window.history.back(-1);
                 </script>";
            error_reporting(0);
        } 
        else if($data = mysqli_fetch_assoc($query)){
                session_start();
                
                $_SESSION['login'] = true;
                $_SESSION['username'] = $data['nama_pegawai'];
                $_SESSION['id_pegawai'] = $data['id_pegawai'];
                $_SESSION['level'] = 3;
                $_SESSION['nama_level'] = 'pegawai';

                header('Location: ../views/templates/index.php');
            }

        return $data;
    }
    
    public function loginPetugas($usernip, $password)
    {
        $sql = "SELECT * FROM petugas WHERE username = '$usernip' AND password = '$password' ";
        $query = mysqli_query($this->conn, $sql);
        
        if(mysqli_num_rows($query) < 1){
            echo "<script>
                    alert('Username atau password salah!');
                    window.history.back(-1);
                  </script>";
            error_reporting(0);
        } 
        else if($data = mysqli_fetch_assoc($query)){
            session_start();
                
            $_SESSION['login'] = true;
            $_SESSION['username'] = $data['username'];
            $_SESSION['level'] = $data['id_level'];
            $_SESSION['nama_level'] = 'petugas';

            header('Location: ../views/templates/index.php');
        }

        return $data;
    }


    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: ../views/login/index.php');
    }

}