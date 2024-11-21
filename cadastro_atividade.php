<?php
// cadastro_atividade.php
include("dbconnect.php");

session_start();
if(!isset($_SESSION['professor_id'])) {
    header("Location: login.php");
    exit;
}

$turma_id = $_GET['turma_id'];

if(isset($_POST['cadastrar'])) {
    $descricao = $_POST['descricao'];
    
    $query = "INSERT INTO atividades (descricao, turma_id) VALUES ('$descricao', $turma_id)";
    mysqli_query($conn, $query);
    header("Location: atividades.php?turma_id=$turma_id");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Turma - SAEP</title>
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
        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #dddfe2;
            border-radius: 4px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus {
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
    </style>
</head>
<body>
    <title>Cadastro de Atividade</title>
    <div class="container">
        <h2>Cadastrar Nova Atividade</h2>
        <form method="POST">
            <div class="form-group">
                <input type="text" name="descricao" placeholder="Descrição da Atividade" required>
            </div>
            <button type="submit" name="cadastrar" class="btn">Cadastrar</button>
        </form>
    </div>
</body>
</html>