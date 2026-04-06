<?php include('layouts/header.php'); ?>

<div class="container d-flex justify-content-center align-items-center vh-100">

<div class="card p-4 shadow text-center" style="width: 400px;">

<?php
$data = $_POST['data_nascimento'];
$dia_mes = date("d/m", strtotime($data));

$signos = simplexml_load_file("signos.xml");

$encontrado = false;

$emojis = [
    "Áries" => "♈",
    "Touro" => "♉",
    "Gêmeos" => "♊",
    "Câncer" => "♋",
    "Leão" => "♌",
    "Virgem" => "♍",
    "Libra" => "♎",
    "Escorpião" => "♏",
    "Sagitário" => "♐",
    "Capricórnio" => "♑",
    "Aquário" => "♒",
    "Peixes" => "♓"
];

$imagens = [
    "Áries" => "aries.png",
    "Touro" => "touro.png",
    "Gêmeos" => "gemeos.png",
    "Câncer" => "cancer.png",
    "Leão" => "leao.png",
    "Virgem" => "virgem.png",
    "Libra" => "libra.png",
    "Escorpião" => "escorpiao.png",
    "Sagitário" => "sagitario.png",
    "Capricórnio" => "capricornio.png",
    "Aquário" => "aquario.png",
    "Peixes" => "peixes.png"
];

foreach ($signos->signo as $signo) {

    $inicio = DateTime::createFromFormat('d/m', $signo->dataInicio);
    $fim = DateTime::createFromFormat('d/m', $signo->dataFim);
    $data_usuario = DateTime::createFromFormat('d/m', $dia_mes);

    $inicio->setDate(2000, $inicio->format('m'), $inicio->format('d'));
    $fim->setDate(2000, $fim->format('m'), $fim->format('d'));
    $data_usuario->setDate(2000, $data_usuario->format('m'), $data_usuario->format('d'));

    if ($inicio <= $fim) {
        if ($data_usuario >= $inicio && $data_usuario <= $fim) {

            $nome = (string)$signo->signoNome;

            echo "<img src='assets/imgs/{$imagens[$nome]}' width='120' class='mb-3'>";
            echo "<h2>{$emojis[$nome]} $nome</h2>";
            echo "<p>{$signo->descricao}</p>";

            $encontrado = true;
            break;
        }
    } else {
        if ($data_usuario >= $inicio || $data_usuario <= $fim) {

            $nome = (string)$signo->signoNome;

            echo "<img src='assets/imgs/{$imagens[$nome]}' width='120' class='mb-3'>";
            echo "<h2>{$emojis[$nome]} $nome</h2>";
            echo "<p>{$signo->descricao}</p>";

            $encontrado = true;
            break;
        }
    }
}

if (!$encontrado) {
    echo "<p>Signo não encontrado.</p>";
}
?>

<a href="index.php" class="btn btn-light mt-3">Voltar</a>

</div>
</div>

</body>
</html>