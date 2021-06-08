# Teste para desenvolvedor web Laravel

### Objetivos do teste:

Conhecer as aptidões do candidato em:

- **[Laravel]**
- **[Bootstrap ou Tailwindcss]**
- **[Interpretação dos requisitos]**
- **[Determinação]**
- **[Banco de dados MySql]**


Todo e qualquer código desenvolvido neste teste não será utilizado em quaisquer outros softwares nem comercializados.

O propósito deste teste é apenas avaliar o conhecimento em programação do candidato.

Este teste é destinado ao processo seletivo para a vaga de Desenvolvedor Web na Bee Delivery. 

Desenvolver uma aplicação que se aproxime de uma plataforma para envio de e-mail marketing. A plataforma deve possibilitar que um usuário autenticado crie, edite, exclua e envie emails para um ou múltiplos destinatários (diferencial). 

O desenvolvimento da plataforma de e-mail marketing deve atender aos seguintes requisitos:

- **[Fazer uso do Framework Laravel]**
- **[Tecnologia das views de preferência do candidato]**
- **[Deve-se fazer uso do banco de dados MySql]**
- **[Seguir padrões de projeto (Service, Events, Migrations)]**
- **[Fazer uso da plataforma (https://mailtrap.io/) para envios de emails]**
- **[Pode-se fazer uso de quaisquer outras tecnologias que julgar benéficas ao projeto.]**


A plataforma deve conter as seguintes funcionalidades:

- **[Possibilitar login com email e senha]**
- **[Registro de usuário com nome, e-mail, senha e confirmação de senha]**
- **[Após a autenticação do usuário, deve-se ter:]**
-- ***[Listagem de e-mails contidos no banco de dados]***
-- ***[Botão para direcionar para a tela de criar e-mail]***
-- ***[Os e-mails devem ser criados e salvos em uma tabela de e-mails]***
-- ***[Os e-mails devem ser listados no formato de tabela com os seguintes campos:]***

---- #ID;
---- Título;
---- Status;
---- Data de envio;
---- Botão de visualizar;

Tela de criar e-mail:

Formulário com campos necessários para criar e-mail:
---- Título;
---- Destinatário(s);
---- Mensagem.

Tela de visualizar e-mail exibindo todos os campos relacionados em um botão de editar que leve a tela de ---- editar:
---- #ID
---- Título
---- Mensagem
---- Destinatário
---- Data de envio
---- Status (situação em que este email se encontra: “pendente” ou “enviado”);

Os e-mails devem ser enviados assincronamente por meio de um Job.




#### Para fazer o uso da aplicação de envio de e-mails vai precisa:

---- Laravel
---- MySql
---- Node

---- Executar as Migrations
---- Executar os comandos npm install && npm run dev
---- Executar o comando php artisan queue:work para o envio dos e-mails assicronamente.
---- Em outro terminal executar o comando php artisan serve





























<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
