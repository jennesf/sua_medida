<?php
require_once('../Modelo/Produto.php');

class ProdutoRepositorio {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function atualizarProduto(Produto $produto) {
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

    public function obterProdutoPorId($id) {
        $sql = "SELECT * FROM produtos WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $dados = $result->fetch_assoc();
        return new Produto($dados['id'], $dados['tipo'], $dados['nome'], $dados['descricao'], $dados['preco'], $dados['imagem']);
    }

    public function buscarTodos() {
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
    public function excluirProdutoPorId($id) {
        $sql = "DELETE FROM produtos WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deletarProduto($id) {
        $sql = "DELETE FROM produtos WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

     // Método para cadastrar um produto
     public function cadastrar(Produto $produto) {
        // Atribuindo os valores dos métodos a variáveis para evitar o erro de "passing by reference"
        $nome = $produto->getNome();
        $tipo = $produto->getTipo();
        $preco = $produto->getPreco();
        $imagem = $produto->getImagem();
        $descricao = $produto->getDescricao();
    
        // Verifica se o preco é válido, caso contrário, define um valor padrão (exemplo, 0)
        if ($preco === null || !is_numeric($preco)) {
            $preco = 0; // ou qualquer outro valor padrão que você queira
        }
    
        // Prepara a consulta SQL para inserir o produto no banco de dados
        $query = "INSERT INTO produtos (nome, tipo, preco, imagem, descricao) 
                  VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        
        // Bind os parâmetros de forma posicional
        $stmt->bind_param(
            "sssss", // "sssss" indica que todos os parâmetros são do tipo string
            $nome,
            $tipo,
            $preco,
            $imagem,
            $descricao
        );
    
        // Executa a consulta e retorna se foi bem-sucedido
        return $stmt->execute();
    }
    

    
}


