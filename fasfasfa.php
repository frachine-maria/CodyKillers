<?php

abstract class Funcionario {
    protected $nome;
    protected $salarioBase;

    public function __construct($nome, $salarioBase) {
        $this->nome = $nome;
        $this->salarioBase = $salarioBase;
    }

    abstract public function calcularSalario();

    public function obterDados() {
        return "Nome: {$this->nome}\nSalário Base: R$ {$this->salarioBase}";
    }
}

class FuncionarioCLT extends Funcionario {
    public function calcularSalario() {
        return $this->salarioBase;
    }
}

class FuncionarioPJ extends Funcionario {
    public function calcularSalario() {
        return $this->salarioBase * 1.15;
    }
}

class Empresa {
    private $funcionarios = [];

    public function adicionarFuncionario(Funcionario $funcionario) {
        $this->funcionarios[] = $funcionario;
    }

    public function listarFuncionarios() {
        foreach ($this->funcionarios as $funcionario) {
            echo $funcionario->obterDados() . "\n";
            echo "Salário Final: R$ " . number_format($funcionario->calcularSalario(), 2, ',', '.') . "\n\n";
        }
    }
}

$empresa = new Empresa();

$funcionario1 = new FuncionarioCLT("João", 3000);
$funcionario2 = new FuncionarioPJ("Maria", 4000);

$empresa->adicionarFuncionario($funcionario1);
$empresa->adicionarFuncionario($funcionario2);

$empresa->listarFuncionarios();

?>