<?php
require_once('../Modelo/Produto.php');

class ProdutoRepositorio
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function atualizarProduto(Produto $produto)
    {
        $sql = "UPDATE produtos SET tipo = ?, nome = ?, descricao = ?, preco = ?, imagem = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "sssssi",
            $produto->getTipo(),
            $produto->getNome(),
            $produto->getDescricao(),
            $produto->getPreco(),
            $produto->getImagem(),
            $produto->getId()
        );
        $stmt->execute();
    }

    public function obterProdutoPorId($id)
    {
        $sql = "SELECT * FROM produtos WHERE id = ?";
        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            echo "Erro na preparação da consulta: " . $this->conn->error;
            exit;
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result === false) {
            echo "Erro na execução da consulta: " . $stmt->error;
            exit;
        }

        if ($result->num_rows > 0) {
            $dados = $result->fetch_assoc();
            return new Produto(
                $dados['id'],
                $dados['tipo'],
                $dados['nome'],
                $dados['descricao'],
                $dados['preco'],
                $dados['imagem']
            );
        } else {
            echo "Produto não encontrado para o ID: " . $id;
            return null;  // Produto não encontrado
        }
    }



    public function buscarTodos()
    {
        $sql = "SELECT * FROM produtos";
        $result = $this->conn->query($sql);

        $produtos = [];
        while ($dados = $result->fetch_assoc()) {
            $produtos[] = new Produto(
                $dados['id'],
                $dados['tipo'],
                $dados['nome'],
                $dados['descricao'],
                $dados['preco'],
                $dados['imagem']
            );
        }

        return $produtos;
    }

    public function excluirProdutoPorId($id)
    {
        $sql = "DELETE FROM produtos WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function cadastrar(Produto $produto)
    {
        // Atribuindo os valores dos métodos a variáveis para evitar erros
        $nome = $produto->getNome();
        $tipo = $produto->getTipo();
        $preco = $produto->getPreco();
        $imagem = $produto->getImagem();
        $descricao = $produto->getDescricao();

        // Exibindo os valores para depuração
        //var_dump($nome, $tipo, $preco, $imagem, $descricao);
        //die(); // Interrompe a execução para verificar os valores

        // Query para inserir os dados
        $query = "INSERT INTO produtos (nome, tipo, preco, imagem, descricao) VALUES (?, ?, ?, ?, ?)";

        // Preparando a query
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            // Exibe o erro se a preparação falhar
            die("Erro na preparação da query: " . $this->conn->error);
        }

        // Bind dos parâmetros com tipos corretos
        // "s" - string, "d" - double (para floats)
        $stmt->bind_param("ssssd", $tipo, $nome, $descricao, $imagem, $preco);

        // Executa a query
        if (!$stmt->execute()) {
            // Exibe o erro se a execução falhar
            die("Erro na execução da query: " . $stmt->error);
        }

        // Retorna o resultado da execução
        return true;
    }
}
