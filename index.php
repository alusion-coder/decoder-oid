<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de OIDs</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            padding: 40px;
        }

        h1 {
            color: #333;
            margin-bottom: 10px;
            text-align: center;
        }

        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
            font-size: 14px;
        }

        .form-section {
            background: white;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 25px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 6px;
            border-left: 4px solid #667eea;
        }

        .form-group label {
            font-weight: 600;
            color: #333;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .oid-code {
            font-family: 'Courier New', monospace;
            font-weight: 600;
            color: #667eea;
            background: white;
            padding: 4px 8px;
            border-radius: 3px;
        }

        .technical-name {
            font-size: 13px;
            color: #666;
            font-weight: normal;
            display: block;
            margin-top: 4px;
        }

        .description {
            font-size: 12px;
            color: #888;
            margin-top: 6px;
            padding: 8px;
            background: white;
            border-left: 2px solid #ccc;
            border-radius: 3px;
        }

        input[type="text"],
        textarea {
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            transition: border-color 0.3s;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 60px;
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
            padding-top: 30px;
            border-top: 2px solid #ddd;
        }

        button {
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            flex: 1;
        }

        .btn-submit {
            background: #667eea;
            color: white;
        }

        .btn-submit:hover {
            background: #5568d3;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

        .btn-clear {
            background: #e0e0e0;
            color: #333;
        }

        .btn-clear:hover {
            background: #d0d0d0;
        }

        .table-section {
            margin-top: 40px;
            padding-top: 40px;
            border-top: 2px solid #ddd;
        }

        .table-section h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 18px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        thead {
            background: #667eea;
            color: white;
        }

        th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
            border: 1px solid #667eea;
        }

        td {
            padding: 15px;
            border: 1px solid #ddd;
            font-size: 13px;
            color: #555;
        }

        tbody tr {
            transition: background-color 0.2s;
        }

        tbody tr:nth-child(even) {
            background: #f8f9fa;
        }

        tbody tr:hover {
            background: #f0f0ff;
        }

        .oid-code-table {
            font-family: 'Courier New', monospace;
            font-weight: 600;
            color: #667eea;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .form-group {
                padding: 15px;
            }

            button {
                padding: 10px 20px;
                font-size: 13px;
            }

            table {
                font-size: 12px;
            }

            th, td {
                padding: 10px;
            }

            .button-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Formulário de Preenchimento de OIDs</h1>
        <p class="subtitle">Identificadores de Objeto - Certificados Digitais Brasileiros</p>

        <form method="POST" action="calcular.php" class="form-section">
            
            <div class="form-group">
                <label>
                    <span class="oid-code">2.16.76.1.3.1</span>
                </label>
                <span class="technical-name">Dados de Pessoa Física</span>
                <div class="description">
                    <strong>Descrição:</strong> Campo otherName em certificados de pessoas físicas<br>
                    <strong>Conteúdo:</strong> data de nascimento, CPF, PIS/PASEP/CI, RG
                </div>
                <input 
                    type="text" 
                    name="oid_2_16_76_1_3_1" 
                    placeholder="Insira o valor para este OID"
                >
            </div>

            <div class="form-group">
                <label>
                    <span class="oid-code">2.16.76.1.3.2</span>
                </label>
                <span class="technical-name">Nome da Pessoa Jurídica/Responsável</span>
                <div class="description">
                    <strong>Descrição:</strong> Nome da pessoa responsável pelo certificado<br>
                    <strong>Conteúdo:</strong> em certificados corporativos
                </div>
                <input 
                    type="text" 
                    name="oid_2_16_76_1_3_2" 
                    placeholder="Insira o valor para este OID"
                >
            </div>

            <div class="form-group">
                <label>
                    <span class="oid-code">2.16.76.1.3.3</span>
                </label>
                <span class="technical-name">CNPJ</span>
                <div class="description">
                    <strong>Descrição:</strong> Cadastro Nacional da Pessoa Jurídica<br>
                    <strong>Conteúdo:</strong> número de 14 dígitos
                </div>
                <input 
                    type="text" 
                    name="oid_2_16_76_1_3_3" 
                    placeholder="Insira o valor para este OID"
                >
            </div>

            <div class="form-group">
                <label>
                    <span class="oid-code">2.16.76.1.3.4</span>
                </label>
                <span class="technical-name">Dados da Pessoa Jurídica</span>
                <div class="description">
                    <strong>Descrição:</strong> Informações cadastrais da pessoa jurídica<br>
                    <strong>Conteúdo:</strong> data de nascimento (8 dígitos ddmmaaaa), CPF (11 dígitos), NIS/PIS/PASEP/CI (11 dígitos), RG (15 dígitos), siglas do órgão expedidor e UF
                </div>
                <input 
                    type="text" 
                    name="oid_2_16_76_1_3_4" 
                    placeholder="Insira o valor para este OID"
                >
            </div>

            <div class="form-group">
                <label>
                    <span class="oid-code">2.16.76.1.3.5</span>
                </label>
                <span class="technical-name">Título de Eleitor</span>
                <div class="description">
                    <strong>Descrição:</strong> Número de inscrição eleitoral<br>
                    <strong>Conteúdo:</strong> inscrição eleitoral (12 posições), Zona Eleitoral (3 posições), Seção (4 posições), município e UF (22 posições)
                </div>
                <input 
                    type="text" 
                    name="oid_2_16_76_1_3_5" 
                    placeholder="Insira o valor para este OID"
                >
            </div>

            <div class="form-group">
                <label>
                    <span class="oid-code">2.16.76.1.3.6</span>
                </label>
                <span class="technical-name">CEI Pessoa Física</span>
                <div class="description">
                    <strong>Descrição:</strong> Cadastro Específico do INSS para pessoas físicas<br>
                    <strong>Conteúdo:</strong> número de 12 dígitos
                </div>
                <input 
                    type="text" 
                    name="oid_2_16_76_1_3_6" 
                    placeholder="Insira o valor para este OID"
                >
            </div>

            <div class="form-group">
                <label>
                    <span class="oid-code">2.16.76.1.3.7</span>
                </label>
                <span class="technical-name">CEI Pessoa Jurídica</span>
                <div class="description">
                    <strong>Descrição:</strong> Cadastro Específico do INSS para pessoas jurídicas<br>
                    <strong>Conteúdo:</strong> número para pessoas jurídicas
                </div>
                <input 
                    type="text" 
                    name="oid_2_16_76_1_3_7" 
                    placeholder="Insira o valor para este OID"
                >
            </div>

            <div class="form-group">
                <label>
                    <span class="oid-code">2.16.76.1.3.8</span>
                </label>
                <span class="technical-name">Nome Social CNPJ</span>
                <div class="description">
                    <strong>Descrição:</strong> Razão social da pessoa jurídica<br>
                    <strong>Conteúdo:</strong> conforme consta no Cadastro Nacional da Pessoa Jurídica
                </div>
                <input 
                    type="text" 
                    name="oid_2_16_76_1_3_8" 
                    placeholder="Insira o valor para este OID"
                >
            </div>

            <div class="button-group">
                <button type="submit" class="btn-submit">Enviar Formulário</button>
                <button type="reset" class="btn-clear">Limpar Campos</button>
            </div>
        </form>

        <div class="table-section">
            <h2>Referência de OIDs</h2>
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
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnClear = document.querySelector('.btn-clear');
            
            btnClear.addEventListener('click', function(event) {
                event.preventDefault();
                
                // Seleciona todos os inputs e textareas do formulário
                const inputs = document.querySelectorAll('input[type="text"]');
                const textareas = document.querySelectorAll('textarea');
                
                // Limpa os inputs
                inputs.forEach(input => {
                    input.value = '';
                });
                
                // Limpa os textareas
                textareas.forEach(textarea => {
                    textarea.value = '';
                });
                
                // Opcional: foca no primeiro input
                //inputs[0].focus();
            });
        });
    </script>

</body>
</html>
