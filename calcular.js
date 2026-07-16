// Funções de processamento
function converteHex(data) {
    if (!data || typeof data !== 'string') {
        return '';
    }

    const hexValues = data.trim().split(' ');
    let result = '';

    for (let hex of hexValues) {
        hex = hex.trim();
        if (hex && /^[0-9a-fA-F]+$/.test(hex)) {
            result += String.fromCharCode(parseInt(hex, 16));
        }
    }

    return result;
}

function sanitizaEntrada(data) {
    if (typeof data !== 'string') {
        return '';
    }

    const textarea = document.createElement('textarea');
    textarea.textContent = data.trim();
    return textarea.innerHTML;
}

function processaPost(valor) {
    if (!valor) {
        return '';
    }

    const convertido = converteHex(valor);
    return sanitizaEntrada(convertido || valor);
}

// Funções de formatação específicas
function formatarCNPJ(cnpj) {
    cnpj = cnpj.replace(/\D/g, '');
    return cnpj.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3.$4-$5');
}

function formatarDadosPessoaJuridica(numero) {
    numero = numero.replace(/\D/g, '');

    if (numero.length < 49) {
        return numero;
    }

    const data = numero.substring(0, 8);
    const cpf = numero.substring(8, 19);
    const nis = numero.substring(19, 30);
    const rg = numero.substring(30, 45);
    const orgao = numero.substring(45, 47);
    const uf = numero.substring(47, 49);

    const dataFormatada = data.substring(0, 2) + '/' + data.substring(2, 4) + '/' + data.substring(4, 8);
    const cpfFormatado = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
    const nisFormatado = nis.replace(/(\d{3})(\d{5})(\d{2})(\d{1})/, '$1.$2.$3-$4');
    const rgFormatado = rg.replace(/(\d{2})(\d{6})(\d{3})(\d{2})(\d{2})/, '$1.$2.$3-$4 $5');

    return dataFormatada + ' ' + cpfFormatado + ' ' + nisFormatado + ' ' + rgFormatado + ' ' + orgao.toUpperCase() + ' ' + uf.toUpperCase();
}

// Mapeamento de OIDs
const oidConfig = {
    'oid_2_16_76_1_3_1': {
        resultElementId: 'result_oid_2_16_76_1_3_1',
        formatter: (valor) => processaPost(valor)
    },
    'oid_2_16_76_1_3_2': {
        resultElementId: 'result_oid_2_16_76_1_3_2',
        formatter: (valor) => processaPost(valor)
    },
    'oid_2_16_76_1_3_3': {
        resultElementId: 'result_oid_2_16_76_1_3_3',
        formatter: (valor) => formatarCNPJ(processaPost(valor))
    },
    'oid_2_16_76_1_3_4': {
        resultElementId: 'result_oid_2_16_76_1_3_4',
        formatter: (valor) => formatarDadosPessoaJuridica(processaPost(valor))
    },
    'oid_2_16_76_1_3_5': {
        resultElementId: 'result_oid_2_16_76_1_3_5',
        formatter: (valor) => processaPost(valor)
    },
    'oid_2_16_76_1_3_6': {
        resultElementId: 'result_oid_2_16_76_1_3_6',
        formatter: (valor) => processaPost(valor)
    },
    'oid_2_16_76_1_3_7': {
        resultElementId: 'result_oid_2_16_76_1_3_7',
        formatter: (valor) => processaPost(valor)
    },
    'oid_2_16_76_1_3_8': {
        resultElementId: 'result_oid_2_16_76_1_3_8',
        formatter: (valor) => processaPost(valor)
    }
};

// Manipulador do formulário
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('oidForm');
    const resultsTable = document.getElementById('resultsTable');

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Processar cada OID
        for (const [oidKey, config] of Object.entries(oidConfig)) {
            const inputElement = document.getElementById(oidKey);
            const resultElement = document.getElementById(config.resultElementId);
            
            if (inputElement && resultElement) {
                const valor = inputElement.value;
                const resultado = config.formatter(valor);
                resultElement.textContent = resultado;
            }
        }

        // Mostrar tabela de resultados
        resultsTable.style.display = 'table';

        // Rolar até a tabela
        resultsTable.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });

    // Limpar tabela ao resetar formulário
    form.addEventListener('reset', function() {
        setTimeout(() => {
            resultsTable.style.display = 'none';
            // Limpar conteúdo dos resultados
            for (const config of Object.values(oidConfig)) {
                const resultElement = document.getElementById(config.resultElementId);
                if (resultElement) {
                    resultElement.textContent = '';
                }
            }
        }, 0);
    });

    // Carregar dados do localStorage se existirem (opcional)
    loadSavedData();
});

// Função para salvar dados no localStorage (opcional)
function saveSavedData() {
    const formData = new FormData(document.getElementById('oidForm'));
    const data = Object.fromEntries(formData);
    localStorage.setItem('oidFormData', JSON.stringify(data));
}

// Função para carregar dados do localStorage (opcional)
function loadSavedData() {
    const savedData = localStorage.getItem('oidFormData');
    if (savedData) {
        try {
            const data = JSON.parse(savedData);
            for (const [key, value] of Object.entries(data)) {
                const element = document.getElementById(key);
                if (element) {
                    element.value = value;
                }
            }
        } catch (e) {
            console.error('Erro ao carregar dados salvos:', e);
        }
    }
}

// Salvar dados ao mudar (opcional - comentado por padrão)
/*
document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('#oidForm input');
    inputs.forEach(input => {
        input.addEventListener('change', saveSavedData);
    });
});
*/
