<?php 
require_once './vendor/autoload.php';

$produtos = [
    [
    'nome' => 'Caderno Universitário',
    'categoria' => 'Papelaria',
    'preco' => 19.90,
    'descricao' => 'Caderno universitário com 200 folhas pautadas.'
    ],
    [
    'nome' => 'Teclado',
    'categoria' => 'eletônico',
    'preco' => 200.00,
    'descricao' => 'Teclado mecanico RGB swicth blue'
    ],
    [
    'nome' => 'Mouse',
    'categoria' => 'eletrônico',
    'preco'=>60.00,
    'descricao' => 'Mouse gamer RGB '
    ],
    [
    'nome' => 'Monitor',
    'categoria' => 'Eletrônicos',
    'preco' => 2400.00,
    'descricao' => 'Monitor Gamer LG 21.5", 75Hz, Full HD, HDMI, FreeSync - 22MP410-B '
    ],
    [
    'nome' => 'Fone Hadset',
    'categoria' => 'Eletrônicos',
    'preco' => 160.90,
    'descricao' => 'Headset Gamer Havit, Drivers 53mm, Microfone Plugável.'
    ]
    ];

$mpdf = new \Mpdf\Mpdf();
$mpdf->SetHTMLHeader('
    <h1 style="text-align: center;">Relatório de Produtos</h1>
    <p style="text-align: right;">Gerado em: ' . date('d/m/Y H:i:s') . '</p>
');

$html = '
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
            color: #333;
        }
        table {
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px; 
            text-align: left;
        }
        th {
            background-color: #007bff; /* Cor de fundo do cabeçalho */
            color: white; /* Cor do texto do cabeçalho */
        }
        tr:nth-child(even) {
            background-color: #e9ecef; /* Cor das linhas pares */
        }
        tr:hover {
            background-color: #d1ecf1; /* Cor ao passar o mouse */
        }
    </style>
<table border="1" style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th>Descrição</th>
        </tr>
    </thead>
    <tbody>';


foreach ($produtos as $produto) {
    $html .= '
        <tr>
            <td>' . $produto['nome'] . '</td>
            <td>' . $produto['categoria'] . '</td>
            <td>R$ ' . number_format($produto['preco'], 2, ',', '.') . '</td>
            <td>' . $produto['descricao'] . '</td>
        </tr>';
}

$html .= '</tbody>
</table>';


$mpdf->WriteHTML($html);

$mpdf->Output('relatorio_produtos.pdf', 'D');
