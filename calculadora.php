<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            margin: 20px;
            padding: 20px;
            border: 1px solid #007bff;
            border-radius: 5px;
            max-width: 400px;
        }
        input[type="number"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #007bff;
            border-radius: 5px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h2>Calculadora</h2>
<form method="post" action="">
    <label for="num1">Número 1:</label>
    <input type="number" name="num1" id="num1" required>

    <label for="num2">Número 2:</label>
    <input type="number" name="num2" id="num2" required>

    <input type="submit" value="Calcular">
</form>

<?php
class Calculadora {
    private $num1;
    private $num2;

    public function __construct($num1, $num2) {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    public function adicao() {
        return $this->num1 + $this->num2;
    }

    public function subtracao() {
        return $this->num1 - $this->num2;
    }

    public function multiplicacao() {
        return $this->num1 * $this->num2;
    }

    public function divisao() {
        if ($this->num2 == 0) {
            return "Erro: Divisão por zero não é permitida.";
        }
        return $this->num1 / $this->num2;
    }
}

/* Aqui deu erro na primeira vez que executei o arquivo, mas depois lembrei que eu executei pelo próprio vscode, aí eu utilizei a maneira certa, que é pelo PHP Server */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];

    $calculadora = new Calculadora($num1, $num2);

/*Aqui estarei exibindo todos os resultados possíveis entre as quatro operações matemáticas básicas */
    echo "<h3>Resultados:</h3>";
    echo "$num1 + $num2 = " . $calculadora->adicao() . "<br>";
    echo "$num1 - $num2 = " . $calculadora->subtracao() . "<br>";
    echo "$num1 * $num2 = " . $calculadora->multiplicacao() . "<br>";
    echo "$num1 / $num2 = " . $calculadora->divisao() . "<br>";
}
?>

</body>
</html>