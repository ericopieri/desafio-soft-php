<?php
class VendaController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getAllVendas()
    {
        $vendas = $this->model->getAll();
        echo json_encode($vendas);
    }
}