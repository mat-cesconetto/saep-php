<?php 
include("dbconnect.php");

session_start();
if(isset($_POST['entrar'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $query = "SELECT * FROM professores WHERE email='$email' AND senha='$senha'";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) == 1) {
        $professor = mysqli_fetch_assoc($result);
        $_SESSION['professor_id'] = $professor['id'];
        $_SESSION['nome'] = $professor['nome'];
        header("Location: principal.php");
    } else {
        $erro = "Email ou senha inválidos";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SAEP</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
            color: #4a4a4a;
            margin-bottom: 20px;
            font-size: 24px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #4a4a4a;
            font-weight: 500;
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #dddfe2;
            border-radius: 4px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        input[type="email"]:focus, input[type="password"]:focus {
            border-color: #1877f2;
            outline: none;
        }
        .btn {
            width: 100%;
            padding: 12px;
            background-color: #1877f2;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #166fe5;
        }
        .error-message {
            color: #ff3b30;
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Bem-vindo</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required>
                </div>
                <button type="submit" name="entrar" class="btn">ENTRAR</button>
                <?php if(isset($erro)): ?>
                    <p class="error-message"><?php echo $erro; ?></p>
                <?php endif; ?>
            </form>
        </div>
    </div>
</body>
</html>