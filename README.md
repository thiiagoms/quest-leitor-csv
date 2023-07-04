<div align="center">
    <p>
        <a href="https://github.com/thiiagoms/quest-exercicio02-csv">
          <img src="assets/img/quest.png" alt="Logo" width="80" height="80">
        </a>
        <h3 align="center">Teste - Leitor de Arquivos CSV :package:</h3>
    </p>
    <br>
    <p float="left">
        <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"
            alt="php" width="70">
        <img src="https://img.shields.io/badge/shell_script-%23121011.svg?style=for-the-badge&logo=gnu-bash&logoColor=white"
            alt="shell_script" width="100">
        <img src="https://img.shields.io/badge/docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white"
            alt="docker" width="100">
    </p>
</div>

- [Dependências :heavy_plus_sign:](#dependências)
- [Instalação :package:](#instalação)
- [Uso :runner:](#uso)
- [Bonus :medal_sports:](#bonus)

## Dependências

- Docker :whale:

## Instalação:

01 -) Clone o repositório:

```bash
$ git clone https://github.com/thiiagoms/quest-leitor-csv
```

02 -) Vá para o diretório do projeto:

```bash
$ cd quest-leitor-csv
quest-leitor-csv $
```

03 -) Faça uma cópia do arquivo `.env.example` para `.env`:
```bash
quest-leitor-csv $ cp .env.example .env
```

## Uso

01 -) Execute o script `setup.sh` utilizando Git Bash/Powershell ou sua shell favorita :shell:
```bash
quest-leitor-csv $ chmod+x setup.sh
quest-leitor-csv $ ./setup.sh
    ██      ███████ ██ ████████  ██████  ██████       ██████ ███████ ██    ██ 
    ██      ██      ██    ██    ██    ██ ██   ██     ██      ██      ██    ██ 
    ██      █████   ██    ██    ██    ██ ██████      ██      ███████ ██    ██ 
    ██      ██      ██    ██    ██    ██ ██   ██     ██           ██  ██  ██  
    ███████ ███████ ██    ██     ██████  ██   ██      ██████ ███████   ████  

    => Exercício 02 - Leitor CSV

    [*] Author: thiiagoms
    [*] E-mail: thiiagoms@proton.me

=> Iniciando os containers
=> Instalando dependências da aplicação
```

02 -) Para fazer o **seed** dos dados, execute o seguinte comando:
```bash
quest-leitor-csv $ docker-compose exec app php quest --seed

    ██      ███████ ██ ████████  ██████  ██████       ██████ ███████ ██    ██ 
    ██      ██      ██    ██    ██    ██ ██   ██     ██      ██      ██    ██ 
    ██      █████   ██    ██    ██    ██ ██████      ██      ███████ ██    ██ 
    ██      ██      ██    ██    ██    ██ ██   ██     ██           ██  ██  ██  
    ███████ ███████ ██    ██     ██████  ██   ██      ██████ ███████   ████
    
        -> Desafio 02: Leitor CSV para importação/atualização de arquivos.
    
        [*] Author: Thiago Silva
        [*] E-mail: thiagom.devsec@gmail.com
      
    Quantidade de usuários inseridos: 0
    Quantidade de usuarios atualizados: 50
```

## Bonus:

01 -) Para executar os testes:
```bash
quest-leitor-csv $ composer test
```

02 -) Para executar o lint e seu fix:
```bash
quest-leitor-csv $ composer phpcs src
quest-leitor-csv $ composer phpcbf src
```

