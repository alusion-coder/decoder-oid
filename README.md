# Formulário de Preenchimento de OIDs — Certificados Digitais ICP-Brasil

Aplicação web simples (HTML) para preenchimento, visualização e referência dos **OIDs (Object Identifiers)** utilizados nos certificados digitais brasileiros emitidos no âmbito da **ICP-Brasil** (Infraestrutura de Chaves Públicas Brasileira), regulados pelo Instituto Nacional de Tecnologia da Informação (ITI).

## Sobre o Projeto

Os OIDs no padrão `2.16.76.1.3.n` correspondem ao arco **req-attribute** da ICP-Brasil, usado para identificar atributos obrigatórios presentes no campo `otherName` (extensão *Subject Alternative Name*) de certificados digitais dos tipos **e-CPF** (pessoa física) e **e-CNPJ** (pessoa jurídica).

Este formulário permite:

- Inserir manualmente valores para cada OID conhecido.
- Consultar em uma tabela de referência o significado técnico e o conteúdo esperado de cada campo.
- Servir como base para extração/validação de dados extraídos de um certificado `.pfx`/`.p12` (A1) ou token/smartcard (A3).

## Estrutura de OIDs Suportados

| OID | Nome Técnico | Conteúdo | Aplicável a |
|---|---|---|---|
| `2.16.76.1.3.1` | Dados de Pessoa Física | Data de nascimento, CPF, PIS/PASEP/CI, RG | e-CPF |
| `2.16.76.1.3.2` | Nome da Pessoa Jurídica/Responsável | Nome do responsável pelo certificado corporativo | e-CNPJ |
| `2.16.76.1.3.3` | CNPJ | Número de 14 dígitos | e-CNPJ |
| `2.16.76.1.3.4` | Dados da Pessoa Jurídica | Data de nascimento (8 dígitos ddmmaaaa), CPF (11 dígitos), NIS/PIS/PASEP/CI (11 dígitos), RG (15 dígitos), sigla do órgão expedidor e UF | e-CNPJ |
| `2.16.76.1.3.5` | Título de Eleitor | Inscrição eleitoral (12), Zona (3), Seção (4), município/UF (22) | e-CPF |
| `2.16.76.1.3.6` | CEI Pessoa Física | Cadastro Específico do INSS (12 dígitos) | e-CPF |
| `2.16.76.1.3.7` | CEI Pessoa Jurídica | Cadastro Específico do INSS para pessoa jurídica | e-CNPJ |
| `2.16.76.1.3.8` | Nome Social CNPJ | Razão social conforme CNPJ | e-CNPJ |

> Fonte: Documento **DOC-ICP-04.01 — Atribuição de OID na ICP-Brasil**, publicado pelo ITI, e leiaute de certificados digitais da Receita Federal do Brasil (RFB).

## Estrutura de Arquivos

```
.
├── index.html        # Formulário de preenchimento de OIDs (este documento)
├── calcular.html      # Endpoint/página de processamento do formulário (action do <form>)
└── README.md          # Este arquivo
```

## Como Usar

1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/seu-repositorio.git
   cd seu-repositorio
   ```
2. Abra o arquivo `index.html` em qualquer navegador (Chrome, Brave, Opera, etc.), ou hospede em um servidor estático (GitHub Pages, Netlify, etc.).
3. Preencha os campos correspondentes a cada OID com os dados extraídos do certificado digital.
4. Clique em **Enviar Formulário** para submeter os dados para `calcular.html` (via método `POST`), ou em **Limpar Campos** para reiniciar o formulário.

## Casos de Uso

- Suporte técnico e implantação de certificados digitais A1/A3 para sistemas fiscais (SPED, NFC-e, e-CAC).
- Documentação e treinamento sobre extração de atributos de certificados ICP-Brasil.
- Ferramenta auxiliar para conferência manual dos dados presentes no `otherName` de um certificado X.509.

## Referências

- ITI — *Atribuição de OID na ICP-Brasil (DOC-ICP-04.01)*
- Receita Federal do Brasil — *Leiaute dos Certificados Digitais da SRF*
- [oidref.com — Árvore de OIDs ICP-Brasil](https://oidref.com/2.16.76.1.3)
- Portal de Dados Abertos do ITI — [dadosabertos.iti.gov.br/oid](https://dadosabertos.iti.gov.br/oid)

## Tecnologias

- **HTML5** — estrutura do formulário e tabela de referência
- **CSS** (referenciado externamente, não incluído neste snippet) — estilização (`container`, `form-section`, `table-section`)

## Licença

Este projeto é fornecido "como está", para fins educacionais e de suporte técnico. Ajuste a licença conforme a necessidade do repositório (ex.: MIT).

## Autor

**Micael William** — Suporte Técnico em Certificados Digitais e Sistemas Fiscais (SPED/NFC-e)
