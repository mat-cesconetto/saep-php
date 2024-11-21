<?php
// atividades.php
include("dbconnect.php");

session_start();
if(!isset($_SESSION['professor_id'])) {
    header("Location: login.php");
    exit;
}

$turma_id = $_GET['turma_id'];
$query = "SELECT * FROM atividades WHERE turma_id = $turma_id";
$result = mysqli_query($conn, $query);

$query_turma = "SELECT nome FROM turmas WHERE id = $turma_id";
$result_turma = mysqli_query($conn, $query_turma);
$turma = mysqli_fetch_assoc($result_turma);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividades da Turma - SAEP</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        .header {
            background: #1877f2;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
            margin-bottom: 20px;
            border-radius: 8px;
        }
        .header h2 {
            margin: 0;
        }
        .nav {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: #1877f2;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
            margin-bottom: 20px ;
            margin-top: 20px ;
        }
        .btn:hover {
            background: #166fe5;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }
        th {
            background-color: #f5f6f7;
            font-weight: bold;
            color: #4a4a4a;
        }
        tr:last-child td {
            border-bottom: none;
        }
        tr:hover {
            background-color: #f5f6f7;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Turma: <?php echo $turma['nome']; ?></h2>
            <a href="principal.php" class="btn">Voltar</a>
        </div>
        
        <button onclick="window.location='cadastro_atividade.php?turma_id=<?php echo $turma_id; ?>'" class="btn">
            Cadastrar Atividade
        </button>
        
        <table>
            <tr>
                <th>Número</th>
                <th>Descrição</th>
            </tr>
            <?php while($atividade = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $atividade['id']; ?></td>
                <td><?php echo $atividade['descricao']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
