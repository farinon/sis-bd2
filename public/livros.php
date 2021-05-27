<!DOCTYPE html>

<head>
    <style>
        .content {
            max-width: 500px;
            margin: auto;
        }
    </style>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<html>

<body>
    <div class="content">
        <h1>Bibliófilo's</h1>

        <h2>Livros</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $titulo = 'titulo';
        $autor = 'nome';
        $classificacao = 'classificacao';
        /*TODO-1: Adicione uma variavel para cada coluna */


        $sql =
            'SELECT ' . $titulo .
            '     , ' . $autor .
            '     , ' . $classificacao .
            /*TODO-2: Adicione cada variavel a consulta abaixo */
            '  FROM livros 
            INNER JOIN autores ON livros.autor = autores.autor_id
            ';

        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
        '<table class="table table-striped table-sm">' .
            '    <tr>' .
            '        <th>' . $titulo . '</th>' .
            '        <th>autor</th>' .
            /* TODO-3: Adicione as variaveis ao cabeçalho da tabela */
            '        <th>' . $classificacao . '</th>' .
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                echo '<td>' . $registro[$titulo] . '</td>' .
                    '<td>' . $registro[$autor] . '</td>' .
                    /* TODO-4: Adicione a tabela os novos registros. */
                    '<td>' . $registro[$classificacao] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '';
        }
        FecharConexao($conexao);
        ?>
    </div>
</body>

</html>