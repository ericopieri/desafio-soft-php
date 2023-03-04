<?php
require_once "../configurations/Connection.php";

class VendaModel extends Connection
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $prepareVendas = $this->connection->prepare("SELECT * FROM pedido");
        $prepareVendas->execute();
        $vendas = $prepareVendas->fetchAll(PDO::FETCH_OBJ);

        foreach ($vendas as $venda) {
            $prepareItensVenda = $this->connection->prepare("SELECT * FROM produto_pedido WHERE produto_pedido.pedido = {$venda->codigo}");
            $prepareItensVenda->execute();

            $itensVenda = $prepareItensVenda->fetchAll(PDO::FETCH_OBJ);

            foreach ($itensVenda as $itemVenda) {
                $prepareProduto = $this->connection->prepare("SELECT * FROM produto WHERE produto.codigo = {$itemVenda->produto}");
                $prepareProduto->execute();

                $produto = $prepareProduto->fetch(PDO::FETCH_OBJ);
                $itemVenda->produto = $produto;
            }

            $venda->itens = $itensVenda;
        }

        return $vendas;
    }
}