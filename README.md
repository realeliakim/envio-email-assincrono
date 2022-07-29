# Plataforma envio de email assíncrono 


Desenvolver uma aplicação que se aproxime de uma plataforma para envio de e-mail marketing. A plataforma deve possibilitar que um usuário autenticado crie, edite, exclua e envie emails para um ou múltiplos destinatários. 

O desenvolvimento da plataforma de e-mail marketing deve atender aos seguintes requisitos:

- **Fazer uso do Framework Laravel]**
- **Tecnologia das views de preferência do candidato**
- **Deve-se fazer uso do banco de dados MySql]**
- **Seguir padrões de projeto (Service, Events, Migrations)**
- **Fazer uso da plataforma (https://mailtrap.io/) para envios de emails**
- **Pode-se fazer uso de quaisquer outras tecnologias que julgar benéficas ao projeto**


A plataforma deve conter as seguintes funcionalidades:

- **[Possibilitar login com email e senha]**
- **[Registro de usuário com nome, e-mail, senha e confirmação de senha]**
- **[Após a autenticação do usuário, deve-se ter:]**
- ***[Listagem de e-mails contidos no banco de dados]***
- ***[Botão para direcionar para a tela de criar e-mail]***
- ***[Os e-mails devem ser criados e salvos em uma tabela de e-mails]***
- ***[Os e-mails devem ser listados no formato de tabela com os seguintes campos:]***

- #ID;
- Título;
- Status;
- Data de envio;
- Botão de visualizar;

Tela de criar e-mail:

Formulário com campos necessários para criar e-mail:
- Título;
- Destinatário(s);
- Mensagem.

Tela de visualizar e-mail exibindo todos os campos relacionados em um botão de editar que leve a tela de editar:
- #ID
- Título
- Mensagem
- Destinatário
- Data de envio
- Status (situação em que este email se encontra: “pendente” ou “enviado”);

Os e-mails devem ser enviados assincronamente por meio de um Job.


#### Para fazer o uso da aplicação de envio de e-mails vai precisa:

- **Laravel**
- **MySql**
- **Node**

- **Executar as Migrations**
- **Executar os comandos npm install && npm run dev**
- **Executar o comando php artisan queue:work para o envio dos e-mails assicronamente**
- **Em outro terminal executar o comando php artisan serve**

