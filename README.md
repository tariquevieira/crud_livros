# Crud Livros

Foi criado usando:
- PHP 8.2.14
- Laravel 10.39.0
- Mysql 8.0.32

## Executar via sail:
- Será necessário renomear o arquivo .env copy para .env;
- Todos comandos com sail devem ser executados com início: `./vendor/bin/sail`
- Será executado na porta 8009;
- `./vendor/bin/sail up -d` para subir containers;
- `./vendor/bin/sail npm run dev` para executar vite com bootstrap CSS;
- porta externa do MySql foi modificada para 3307;

## Migrate
- Para executar as migrations deve usar o comando: `./vendor/bin/sail artisan migrate`

## View
- Foi criada usando migrations do laravel;
  
## PDF
- O relatorio PDF foi criado usando a biblioteca DomPDF;

