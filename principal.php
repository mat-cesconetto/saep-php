<?php
// principal.php
include("dbconnect.php");

session_start();
if(!isset($_SESSION['professor_id'])) {
    header("Location: login.php");
    exit;
}

$professor_id = $_SESSION['professor_id'];
$query = "SELECT * FROM turmas WHERE professor_id = $professor_id";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>SAEP - Sistema de Avaliação Escolar para Professores</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            padding: 20px;
        }
        .header {
            background: #3498db;
            color: #ffffff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #e8491d 3px solid;
        }
        .header h1 {
            margin: 0;
            text-align: center;
            padding-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #3498db;
            color: #ffffff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s ease;
        }
        .btn:hover {
            background: #2980b9;
        }
        .btn-danger {
            background: #e74c3c;
        }
        .btn-danger:hover {
            background: #c0392b;
        }
        .btn-success {
            background: #2ecc71;
        }
        .btn-success:hover {
            background: #27ae60;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="header-content">
                <span>Professor: <?php echo $_SESSION['nome']; ?></span>
                <a href="logout.php" class="btn">Sair</a>
            </div>
        </div>
    </div>
    
    <div class="container">
        <h1>Minhas Turmas</h1>
        
        <a href="cadastro_turma.php" class="btn">Cadastrar turma</a>
        
        <table>
            <thead>
                <tr>
                    <th>Número</th>
                    <th>Nome</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php while($turma = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $turma['id']; ?></td>
                    <td><?php echo $turma['nome']; ?></td>
                    <td>
                        <button onclick="excluirTurma(<?php echo $turma['id']; ?>)" class="btn btn-danger">Excluir</button>
                        <a href="atividades.php?turma_id=<?php echo $turma['id']; ?>" class="btn btn-success">Visualizar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    
    <script>
    function excluirTurma(id) {
        if(confirm('Deseja realmente excluir esta turma?')) {
            window.location = 'excluir_turma.php?id=' + id;
        }
    }
    </script>
</body>
</html>