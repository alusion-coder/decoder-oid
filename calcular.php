<?php

        //$_POST['oid_2_16_76_1_3_1']
        //$_POST['oid_2_16_76_1_3_2']
        //$_POST['oid_2_16_76_1_3_3']
        //$_POST['oid_2_16_76_1_3_4']
        //$_POST['oid_2_16_76_1_3_5']
        //$_POST['oid_2_16_76_1_3_6']
        //$_POST['oid_2_16_76_1_3_7']
        //$_POST['oid_2_16_76_1_3_8']

        function converte($data){

            $hexValues = explode(" ", $data);
            $result = "";

            foreach ($hexValues as $hex) {
                $result .= chr(hexdec($hex));
            }

            return $result;

        }

        function xss($data){

            $return = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
            return $data = filter_input(INPUT_GET, $return, FILTER_SANITIZE_SPECIAL_CHARS);

        }

        //echo var_dump($_POST);
        
        echo $oid_2_16_76_1_3_1 = xss(converte($_POST['oid_2_16_76_1_3_1']));
        //$oid_2_16_76_1_3_2 = converte($_POST['oid_2_16_76_1_3_2']
        //$oid_2_16_76_1_3_3 = converte($_POST['oid_2_16_76_1_3_3']
        //$oid_2_16_76_1_3_4 = converte($_POST['oid_2_16_76_1_3_4']
        //$oid_2_16_76_1_3_5 = converte($_POST['oid_2_16_76_1_3_5']
        //$oid_2_16_76_1_3_6 = converte($_POST['oid_2_16_76_1_3_6']
        //$oid_2_16_76_1_3_7 = converte($_POST['oid_2_16_76_1_3_7']
        //$oid_2_16_76_1_3_8 = converte($_POST['oid_2_16_76_1_3_8']

        //2.16.76.1.3.2	
        //13 17 46 41 42 52 49 43 49 4f 20 44 41 20 43 4f 53 54 41 20 4d 41 49 45 52	
        //FABRICIO DA COSTA MAIER

        //2.16.76.1.3.3	
        //13 0e 30 39 36 31 36 39 34 32 30 30 30 31 37 33	
        //09616942000173

        //2.16.76.1.3.4	
        //13 2d 30 39 30 36 31 39 37 37 39 30 31 36 31 33 38 36 30 39 31 30 30 30 30 30 30 30 30 30 30 30 30 30 30 30 30 30 30 30 30 30 30 30 30 30	
        //-0906197790161386091000000000000000000000000

        //2.16.76.1.3.7	
        //13 0c 30 30 30 30 30 30 30 30 30 30 30 30	
        //000000000000

?>
<!--
            <table>
                <thead>
                    <tr>
                        <th>OID</th>
                        <th>Nome Técnico</th>
                        <th>Conteúdo</th>
                        <th>Resultado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="oid-code-table">2.16.76.1.3.1</td>
                        <td>Dados de Pessoa Física</td>
                        <td>data de nascimento, CPF, PIS/PASEP/CI, RG</td>
                        <td>Resultado</td>
                    </tr>
                    <tr>
                        <td class="oid-code-table">2.16.76.1.3.2</td>
                        <td>Nome da Pessoa Jurídica/Responsável</td>
                        <td>Nome da pessoa responsável pelo certificado</td>
                        <td>Resultado</td>
                    </tr>
                    <tr>
                        <td class="oid-code-table">2.16.76.1.3.3</td>
                        <td>CNPJ</td>
                        <td>Cadastro Nacional da Pessoa Jurídica</td>
                        <td>Resultado</td>
                    </tr>
                    <tr>
                        <td class="oid-code-table">2.16.76.1.3.4</td>
                        <td>Dados da Pessoa Jurídica</td>
                        <td>Data de nascimento (8 dígitos ddmmaaaa), CPF (11 dígitos), NIS/PIS/PASEP/CI (11 dígitos), RG (15 dígitos), siglas do órgão expedidor e UF</td>
                        <td>Resultado</td>
                    </tr>
                    <tr>
                        <td class="oid-code-table">2.16.76.1.3.5</td>
                        <td>Título de Eleitor</td>
                        <td>Número de inscrição eleitoral (12 posições), Zona Eleitoral (3 posições), Seção (4 posições), município e UF (22 posições)</td>
                        <td>Resultado</td>
                    </tr>
                    <tr>
                        <td class="oid-code-table">2.16.76.1.3.6</td>
                        <td>CEI Pessoa Física</td>
                        <td>Cadastro Específico do INSS para pessoas físicas</td>
                        <td>Resultado</td>
                    
                    </tr>
                    <tr>
                        <td class="oid-code-table">2.16.76.1.3.7</td>
                        <td>CEI Pessoa Jurídica</td>
                        <td>Cadastro Específico do INSS para pessoas jurídicas</td>
                        <td>Resultado</td>
                    
                    </tr>
                    <tr>
                        <td class="oid-code-table">2.16.76.1.3.8</td>
                        <td>Nome Social CNPJ</td>
                        <td>Razão social da pessoa jurídica</td>
                        <td>Resultado</td>
                    </tr>
                </tbody>
            </table>
    -->