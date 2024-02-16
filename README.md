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
  
## Tecnologias Utilizadas

- **BANCO DE DADOS: MySql
- **BACKEND: PHP
- **FRONTEND: Vue.js | Vuex

## Para executar o sistema

- Após baixar (clonar) o fonte é necessário instalar o laravel (usei a versão 3.2.1)
- Fazer as devidas configurações no arquivo env (apontar para o seu localhost e o nome da base q vc criou)
- Executar o comando migrate para gerar todas as tabelas
- Executar o comando php artisan serve para rodar o Backend
- Executar a intalação do pacote JWT
- Executar o comando php artisan serve para rodar o Backend.
- Instalar o pacote UI com o comando composer require laravel/ui:^3.2.1
- Gerar o esqueleto do fontend do projeto em Vue.js com o comando php artisan ui vue --auth
- Baixar as dependencias do frontend com o comando npm install
- Produzir o Bundle do fontend com o comando npm run dev (se ao finalizar n compilar e pedir para executar algum comando execute e depois repita o comando novamente até a compilação ocorrer)
- Executar o npm install vuex@3.6.2 para instalar o Vuex para gerenciamento de store do Vue.js
- Com o Back e o Front em execução é só acessar o link informado.
