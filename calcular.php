<?php

        //echo var_dump($_POST); // Debug

        function converteHex($data){
            
            if (empty($data) || !is_string($data)) {
                return 'Vazio';
            }

            $hexValues = explode(" ", trim($data));
            $result = "";
            
            foreach ($hexValues as $hex) {
                $hex = trim($hex);
                if (!empty($hex) && ctype_xdigit($hex)) {
                    $result .= chr(hexdec($hex));
                }
            }
    
            return $result;

        }

        function sanitizaEntrada($data){

            if (!is_string($data)) {
                return 'Vazio';
            }
            
            return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');

        }

        function processaPost($post, $key) {

            if (!isset($post[$key])) {
                return 'Vazio';
            }
            
            $valor = $post[$key];
            
            // Se contiver hex, converte; senão, apenas sanitiza
            $convertido = converteHex($valor);
            
            return sanitizaEntrada($convertido ?: $valor);

        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $oid_2_16_76_1_3_1 = processaPost($_POST, 'oid_2_16_76_1_3_1');
            $oid_2_16_76_1_3_2 = processaPost($_POST, 'oid_2_16_76_1_3_2');
            $oid_2_16_76_1_3_3 = processaPost($_POST, 'oid_2_16_76_1_3_3');
            $oid_2_16_76_1_3_4 = processaPost($_POST, 'oid_2_16_76_1_3_4');
            $oid_2_16_76_1_3_5 = processaPost($_POST, 'oid_2_16_76_1_3_5');
            $oid_2_16_76_1_3_6 = processaPost($_POST, 'oid_2_16_76_1_3_6');
            $oid_2_16_76_1_3_7 = processaPost($_POST, 'oid_2_16_76_1_3_7');
            $oid_2_16_76_1_3_8 = processaPost($_POST, 'oid_2_16_76_1_3_8');

        }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resposta de OIDs</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f5f7fa;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 {
            color: #1a1a1a;
            margin-bottom: 8px;
            text-align: center;
            font-size: 28px;
        }

        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
            font-size: 14px;
        }

        /* Tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        thead {
            background-color: #2c3e50;
            color: white;
        }

        th {
            padding: 16px;
            text-align: left;
            font-weight: 600;
            font-size: 13px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        td {
            padding: 14px 16px;
            border-bottom: 1px solid #e8eaed;
            font-size: 13px;
            color: #444;
        }

        tbody tr {
            transition: background-color 0.2s ease;
        }

        tbody tr:nth-child(even) {
            background-color: #f9fafb;
        }

        tbody tr:hover {
            background-color: #f0f4f8;
        }

        /* Coluna OID */
        .oid-code {
            font-family: 'Monaco', 'Menlo', monospace;
            font-weight: 600;
            color: #0066cc;
            background-color: #f0f7ff;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
        }

        /* Coluna Nome Técnico */
        .tech-name {
            font-weight: 500;
            color: #1a1a1a;
        }

        /* Coluna Conteúdo */
        .description {
            color: #666;
            line-height: 1.4;
        }

        /* Coluna Resultado */
        .result {
            font-family: 'Monaco', 'Menlo', monospace;
            background-color: #f0f7ff;
            padding: 4px 8px;
            border-radius: 4px;
            color: #0066cc;
            font-weight: 500;
        }

        .result:empty::before {
            content: '—';
            color: #ccc;
        }

        /* Responsivo */
        @media (max-width: 768px) {
            body {
                padding: 12px;
            }

            h1 {
                font-size: 22px;
            }

            table {
                font-size: 12px;
            }

            th, td {
                padding: 10px 8px;
            }

            .oid-code,
            .result {
                padding: 3px 6px;
                font-size: 11px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Resposta de OIDs</h1>
        <p class="subtitle">Certificado Digital Brasileiro</p>

        <table>
            <thead>
                <tr>
                    <th style="width: 12%;">OID</th>
                    <th style="width: 18%;">Nome Técnico</th>
                    <th style="width: 50%;">Conteúdo</th>
                    <th style="width: 20%;">Resultado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><span class="oid-code">2.16.76.1.3.1</span></td>
                    <td class="tech-name">Dados de Pessoa Física</td>
                    <td class="description">Data de nascimento, CPF, PIS/PASEP/CI, RG</td>
                    <td class="result"><?php echo $oid_2_16_76_1_3_1 ?? ''; ?></td>
                </tr>
                <tr>
                    <td><span class="oid-code">2.16.76.1.3.2</span></td>
                    <td class="tech-name">Nome da Pessoa Jurídica/Responsável</td>
                    <td class="description">Nome da pessoa responsável pelo certificado</td>
                    <td class="result"><?php echo $oid_2_16_76_1_3_2 ?? ''; ?></td>
                </tr>
                <tr>
                    <td><span class="oid-code">2.16.76.1.3.3</span></td>
                    <td class="tech-name">CNPJ</td>
                    <td class="description">Cadastro Nacional da Pessoa Jurídica</td>
                    <td class="result"><?php $cpf = $oid_2_16_76_1_3_3 ?? ''; echo preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3.$4-$5', $cpf); ?></td>
                </tr>
                <tr>
                    <td><span class="oid-code">2.16.76.1.3.4</span></td>
                    <td class="tech-name">Dados da Pessoa Jurídica</td>
                    <td class="description">Data de nascimento, CPF, NIS/PIS/PASEP/CI, RG, siglas e UF</td>
                    <td class="result">

                        <?php
                        $numero = $oid_2_16_76_1_3_4 ?? '';
                        $numero = preg_replace('/\D/', '', $numero); // Remove caracteres não-numéricos

                        // Extrair partes
                        $data = substr($numero, 0, 8);         // 09061977
                        $cpf = substr($numero, 8, 11);         // 90161386091
                        $nis = substr($numero, 19, 11);        // 12345678901 (NIS/PIS/PASEP/CI)
                        $rg = substr($numero, 30, 15);         // 123456789012345 (RG)
                        $orgao = substr($numero, 45, 2);       // XX (Órgão expedidor)
                        $uf = substr($numero, 47, 2);          // XX (UF)

                        // Formatar data (DDMMYYYY -> DD/MM/YYYY)
                        $data_formatada = substr($data, 0, 2) . '/' . substr($data, 2, 2) . '/' . substr($data, 4, 4);

                        // Formatar CPF (11 dígitos -> XXX.XXX.XXX-XX)
                        $cpf_formatado = preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $cpf);

                        // Formatar NIS/PIS/PASEP/CI (11 dígitos -> XXX.XXXXX.XX-X)
                        $nis_formatado = preg_replace('/(\d{3})(\d{5})(\d{2})(\d{1})/', '$1.$2.$3-$4', $nis);

                        // Formatar RG (15 dígitos -> XX.XXXXXX.XXX-XX)
                        $rg_formatado = preg_replace('/(\d{2})(\d{6})(\d{3})(\d{2})(\d{2})/', '$1.$2.$3-$4 $5', $rg);

                        // Montar saída final
                        echo $data_formatada . ' ' . 
                            $cpf_formatado . ' ' . 
                            $nis_formatado . ' ' . 
                            $rg_formatado . ' ' . 
                            strtoupper($orgao) . ' ' . 
                            strtoupper($uf);

                        ?>

                    </td>
                </tr>
                <tr>
                    <td><span class="oid-code">2.16.76.1.3.5</span></td>
                    <td class="tech-name">Título de Eleitor</td>
                    <td class="description">Inscrição eleitoral, zona, seção, município e UF</td>
                    <td class="result"><?php echo $oid_2_16_76_1_3_5 ?? ''; ?></td>
                </tr>
                <tr>
                    <td><span class="oid-code">2.16.76.1.3.6</span></td>
                    <td class="tech-name">CEI Pessoa Física</td>
                    <td class="description">Cadastro Específico do INSS para pessoas físicas</td>
                    <td class="result"><?php echo $oid_2_16_76_1_3_6 ?? ''; ?></td>
                </tr>
                <tr>
                    <td><span class="oid-code">2.16.76.1.3.7</span></td>
                    <td class="tech-name">CEI Pessoa Jurídica</td>
                    <td class="description">Cadastro Específico do INSS para pessoas jurídicas</td>
                    <td class="result"><?php echo $oid_2_16_76_1_3_7 ?? ''; ?></td>
                </tr>
                <tr>
                    <td><span class="oid-code">2.16.76.1.3.8</span></td>
                    <td class="tech-name">Nome Social CNPJ</td>
                    <td class="description">Razão social da pessoa jurídica</td>
                    <td class="result"><?php echo $oid_2_16_76_1_3_8 ?? ''; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
