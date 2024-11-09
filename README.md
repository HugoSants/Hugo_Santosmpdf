<?php
require_once 'vendor/autoload.php';

$host = 'localhost';
$dbname = 'biblioteca';
$username = 'root';
$password = '';

$pdo = new PDO('mysql:host='.$hostname.';dbname='.$dbname.';charset=utf8',$username,$password);
$pdo->setAttribuation(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT titulo, autor, ano_publicacao, resumo FROM livros";
$stmt = $pdo->prepare($query);
$stmt->execute();

$livros = $stmt->fetchAll(PDO::FETCH_ASSOC);
$mpdf = new \Mpdf\Mpdf();
$mpdf = '<h1>Biblioteca - Lista de Livros</h1>';
$mpdf .= '<table border="2" cellpadding="10" cellspacing="0" width="100%">';
$mpdf .= '<tr>
    <th>Título</th>
    <th>Autor</th>
    <th>Ano de Publicação</th>
    <th>Resumo</th>
</tr>';

foreach($livros as $livro) {
    $html .= '<tr>';
    $html .= '<td>'. htmlspecialchars($livro['Título']) .'</td>';
    $html .= '<td>'. htmlspecialchars($livro['autor']) .'</td>';
    $html .= '<td>'. htmlspecialchars($livro['ano_publicacao']) .'</td>';
    $html .= '<td>'. htmlspecialchars($livro['resumo']) .'</td>';
    $html .= '</tr>';
}

$html .= '</table>';

?>

</table>
