## Sobre My Resume

Sistema feito em PHP com LARAVEL composto de uma API e um FrontEnd feito em Vue.js para cadastrar informações e gerar o Curriculo Vitae da Pessoa (Resume).
O Sistema faz os seguintes Cadastros:

- Pessoa (Dados Pessoais)
- Interesses (Interesses pessoais como por exemplo (cozinhar, assistir tv, etc...)
- Certificados (Certificados, Certificações e Prêmios)
- Redes Sociais (Cadastra as Redes Sociais da Pessoa)
- Formação (Formação da Pessoa (Graduação, Pós-Graduação, etc...)
- Idioma (Idioma(s) que a pessoa domina e seus níveis (Básico, Intermediário, etc...)
- Skills (As Skills que a pessoa possui)
- Experiência (As experiências que a pessoa possui)

Com todas as informações cadastradas é possível gerar o CV em PDF ao final e sempre que possível alterar todas as informações.

## Passo a passo da criação do sistema

- Criar o projeto com o comando do composer
- Rodar para ver se foi criado corretamente
- Criar as Models, Migrations e Controllers
- Configurar as conexões de Banco no .env
- Se não tiver criado ainda, criar a base de dados
- Executar o comando migrate para criar as tabelas de acordo com o que foi implementado na(s) migration(s).
- Configurar o arquivo api.php em Routes com as rotas dos endpoints que serão criados.
- Implementar os Endpoints na(s) Controller(s)
- Depois de testar os Endpoints no Postman e ajustar o que for necessário.
- Fazer a instalação dos módulos npm e vue.js e vuex
- Fazer a instalação dos componentes do jwt para poder criar a autenticação por token
- Implementar o fontend
  
## Tecnologias Utilizadas

- **BANCO DE DADOS: MySql
- **BACKEND: PHP
- **FRONTEND: Vue.js | Vuex

## Para executar o sistema

- Após baixar (clonar) o fonte é necessário instalar o laravel (usei a versão 3.2.1)
- Fazer as devidas configurações no arquivo env (apontar para o seu localhost e o nome da base q vc criou)
- Executar o comando migrate para gerar todas as tabelas
- Executar o comando php artisan serve para rodar o Backend
- Executar o comando npn run dev ou npn run watch para gerar os assets e compilar
