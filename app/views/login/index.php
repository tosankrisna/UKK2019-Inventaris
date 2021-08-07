<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container-body">
        <div class="container-form">
            <div class="header">
                <p>Login</p>
            </div>
                
            <div class="content">
                <form action="../../controllers/prosesLogin.php" method="post">
                    <label for="akses">Akses</label>
                    <select name="akses" class="select-akses">
                        <option value="pegawai">Pegawai</option>
                        <option value="petugas">Petugas</option>
                    </select>

                    <label for="username">Username/NIP</label>
                    <input type="text" name="usernip" id="usernip" autocomplete="off" required oninvalid="this.setCustomValidity('Username atau NIP tidak boleh kosong!')" oninput="setCustomValidity('')">
                        
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required oninvalid="this.setCustomValidity('Password tidak boleh kosong!')" oninput="setCustomValidity('')">
                        
                    <button type="submit" id="btn-login" name="login">
                        Login
                    </button>
                </form>
            </div>	
        </div>
    </div>
</body>
</html>
