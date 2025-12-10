# Baita Feira : Conectando Organizadores,Microemprendedores e Clientes em Feiras de Porto Alegre

_Jordana Scher e Sofia Pedroso_

Este artigo tem como objetivo analisar e documentar a criação de uma aplicação web para divulgar feiras em Porto Alegre.Essa aplicação foi desenvolvida como projeto final na unidade curricular Projeto de Desenvolvimento II pelas alunas Jordana Scher e Sofia Cotta do curso de Análise e Desenvolvimento de Sistemas do Centro Universitário Senac-RS.

## Resumo do Projeto

A ausência de um canal centralizado e confiável com informações sobre as feiras de microempreendedores locais representa um desafio significativo para a divulgação desses eventos. Muitos consumidores não têm acesso claro a dados como quando e onde as feiras acontecem, o que resulta em baixa participação, reduz o engajamento e compromete a visibilidade dos expositores locais. Essa falha na comunicação limita o alcance das iniciativas, impacta negativamente o desempenho dos microempreendedores e dificulta o fortalecimento do comércio local.

Diante desse contexto, o projeto propõe o desenvolvimento de uma aplicação web responsiva que conecte organizadores, expositores e consumidores em um único ambiente digital. A plataforma reunirá informações atualizadas sobre eventos, bancas participantes, produtos e promoções, facilitando o acesso do público e ampliando a visibilidade dos empreendedores. Com essa solução, espera-se aumentar a participação do público das feiras, incentivando mais pessoas a visitarem os eventos e conhecerem os microempreendedores locais.


## Definição do Problema
Microempreendedores que participam de feiras em Porto Alegre enfrentam dificuldades na divulgação de seus eventos e no acesso do público às informações sobre datas, locais e expositores participantes. Para compreender melhor essa realidade, foi realizada uma pesquisa por meio de formulários com expositores e frequentadores das feiras da cidade.
Os resultados indicaram que muitos frequentadores têm dificuldade em descobrir quando e onde as feiras acontecem, bem como em conhecer melhor os expositores e seus negócios, devido à inexistência de um espaço centralizado que reúna essas informações. Da mesma forma, os expositores relataram limitações na divulgação de seus produtos, promoções e bancas, além da dificuldade de acesso a informações organizadas sobre os eventos.

Atualmente, não existe um aplicativo ou plataforma que centralize as informações sobre as feiras de microempreendedores locais, o que dificulta a divulgação dos eventos e o acesso do público interessado a esses dados, sem garantir que haja aumento de público, mas evidenciando a necessidade de uma solução que organize e concentre essas informações.
A seguir, são apresentadas as imagens referentes aos resultados obtidos na pesquisa realizada com microempreendedores e frequentadores das feiras, as quais contribuíram para a identificação das principais dificuldades e necessidades do público envolvido.

Press enter or click to view image in full size

## Objetivo Geral
Foi desenvolvida uma aplicação web responsiva que centraliza a divulgação de feiras , permitindo que organizadores publiquem seus eventos, expositores promovam seus negócios e consumidores tenham acesso a informações claras sobre quando e onde as feiras ocorrerão.

## Objetivos Específicos
Com o intuito de atender às necessidades dos diferentes públicos envolvidos nas feiras, como expositores, organizadores de eventos e frequentadores, o sistema busca alcançar os seguintes objetivos específicos:

## Para os Organizadores de Eventos:
* Disponibilizar ferramentas para criação, edição, publicação e cancelamento de eventos.
* Centralizar informações essenciais do evento, como data, horário, descrição e endereço.
* Melhorar a comunicação entre organizadores e expositores por meio de informações atualizadas e acessíveis.E para os clientes também para saber tudo sobre o evento.


## Para os Expositores (Microempreendedores):
* Permitir o cadastro de perfis completos das bancas participantes, contendo informações como nome da banca, descrição, instagram e formas de contato.
* Possibilitar o cadastro e a divulgação de produtos, promoções de cada banca.
* Permitir que o expositor selecione a categoria da sua banca, facilitando para que os frequentadores encontrem marcas de acordo com seus interesses.
* Possibilitar o cadastro de mais de uma banca, caso o expositor possua múltiplos negócios.
* Facilitar o acesso às informações sobre os eventos disponíveis, permitindo que o expositor visualize detalhes e decida se irá participar ou não do evento.
* Disponibilizar um espaço centralizado onde os consumidores possam conhecer melhor os expositores e os produtos oferecidos nas feiras.

## Para os Frequentadores das Feiras (Consumidores):
* Permitir que os usuários encontrem informações atualizadas sobre as os eventos , incluindo data, horário, endereço e bancas participantes.
* O sistema permite que os consumidores favoritem produtos e bancas de seu interesse . Sempre que um produto favoritado entrar em promoção, o usuário receberá uma notificação no próprio site, além de uma mensagem automática via e-mail O envio de e-mails na plataforma é realizado por meio do recurso nativo de mensageria do framework Laravel (Laravel Mail). O sistema utiliza o protocolo SMTP para comunicação com provedores de serviço de e-mail, sendo responsável pela composição das mensagens, geração do conteúdo HTML por meio de templates Blade e autenticação junto ao servidor de envio. Cada notificação possui uma classe dedicada do tipo Mailable, responsável por definir o assunto, o remetente e os dados repassados à visualização da mensagem. O envio é efetuado automaticamente após ações relevantes dos usuários, como inscrição, reagendamento ou cancelamento de eventos , Essa dupla forma de comunicação garante que o consumidor seja informado rapidamente sobre ofertas nos produtos de favoritados, aumentando o engajamento com a plataforma.
* Permitir que o usuário manifeste que vai participar ou não do evento no dia do evento, para facilitar o planejamento de participação.
* Disponibilizar filtros por categorias para facilitar a busca por bancas e produtos de interesse.

## Stack Tecnológico
A solução proposta foi desenvolvida com o objetivo de atender às necessidades do público do Baita Feira, oferecendo uma aplicação moderna, responsiva e de fácil usabilidade, proporcionando uma navegação eficiente tanto para consumidores quanto para microempreendedores. O projeto prioriza a adoção de tecnologias estáveis, garantindo desempenho, segurança e confiabilidade na utilização do sistema.
* HTML5 e CSS3: O HTML5 e o CSS3 constituem a base estrutural e visual da aplicação. Enquanto o HTML organiza os conteúdos da página, o CSS estiliza e garante um design moderno e responsivo. Essa escolha possibilita interfaces compatíveis com diferentes navegadores e dispositivos, fundamentais para alcançar um público variado.
* Bootstrap: O Bootstrap foi incorporado para acelerar o desenvolvimento da interface e assegurar a responsividade. Sua biblioteca de componentes facilita a construção de layouts consistentes, proporcionando uma experiência fluida aos usuários, seja acessando a plataforma de um celular em uma feira ou de um computador em casa.
* JavaScript: O JavaScript é essencial para trazer dinamismo à aplicação, tornando-a mais interativa e intuitiva. Ele é utilizado para validações, efeitos visuais e interações em tempo real, enriquecendo a experiência dos consumidores ao navegar pelas feiras e bancas cadastradas.
* Laravel: O Laravel é o framework PHP escolhido para o back-end, estruturado no padrão MVC. Ele oferece ferramentas robustas, como autenticação, ORM Eloquent, migrations e sistema de rotas, garantindo segurança, escalabilidade e facilidade na manutenção do projeto. Essa escolha contribui diretamente para a confiabilidade da aplicação como canal oficial de divulgação dos eventos.
* MySQL: O MySQL é o banco de dados relacional utilizado para o armazenamento das informações de usuários, eventos e produtos. Sua integração nativa com o Laravel, aliada à confiabilidade e desempenho, torna-o adequado para garantir consistência e eficiência no gerenciamento dos dados do sistema.
* GitHub para Versionamento: O GitHub foi utilizado para versionamento do código-fonte, possibilitando colaboração, rastreamento de alterações e adoção de boas práticas de desenvolvimento. Essa ferramenta é essencial para manter organização e transparência ao longo da evolução do sistema.
  
Para a disponibilização da plataforma online, foi utilizada a hospedagem da HostGator para o registro do domínio do site. O domínio originalmente desejado, baitafeira, já se encontrava em uso, sendo necessária a escolha de uma variação disponível para viabilizar a publicação do projeto na internet.
Hostinger para Hospedagem: A aplicação será hospedada na Hostinger, que oferece suporte completo para PHP/Laravel e bancos de dados MySQL. Essa escolha garante um ambiente moderno, rápido e com excelente custo-benefício, atendendo às necessidades do Baita Feira com estabilidade e desempenho.

Além das tecnologias mencionadas, a plataforma integra APIs externas, como o ViaCEP, utilizada para a obtenção automática de dados de endereço a partir do CEP informado, e a API do WhatsApp (Twilio), empregada para a automação do envio de mensagens de divulgação de eventos organizados pelo organizador, promoções e notificações aos usuários clientes. Essas integrações facilitam o cadastro de eventos, ampliam a divulgação e aprimoram a comunicação entre organizadores, expositores e clientes.
Além das tecnologias principais utilizadas na plataforma, o Baita Feira integra diversas APIs externas para automatizar processos e aprimorar a experiência dos usuários. A API ViaCEP é utilizada para o preenchimento automático dos dados de endereço durante o cadastro dos eventos. Ao informar o CEP no formulário, o sistema realiza uma requisição à API, que retorna os dados em formato JSON, como rua, bairro, cidade e estado, preenchendo os campos automaticamente na interface sem a necessidade de recarregar a página, reduzindo erros de digitação e agilizando o cadastro.
Além das tecnologias principais utilizadas na plataforma, o Baita Feira integra diversas APIs externas com o objetivo de automatizar processos e aprimorar a experiência dos usuários. A API ViaCEP é utilizada para o preenchimento automático dos dados de endereço durante o cadastro dos eventos. Ao informar o CEP no formulário, o sistema realiza uma requisição à API, que retorna os dados em formato JSON, como rua, bairro, cidade e estado, preenchendo os campos automaticamente na interface sem a necessidade de recarregar a página, reduzindo erros de digitação e agilizando o processo de cadastro.
Após a confirmação, os dados são armazenados pelo backend desenvolvido em Laravel (PHP) no banco de dados MySQL. Para viabilizar a exibição de mapas, o sistema utiliza a biblioteca Leaflet integrada ao OpenStreetMap, serviço cartográfico gratuito que não exige chave de API. O endereço cadastrado é convertido em coordenadas geográficas (latitude e longitude) por meio da API Nominatim, processo executado pelo serviço interno GeoLocalizacaoService, responsável por enviar a requisição, receber os dados em formato JSON e gravar as coordenadas no banco de dados associadas ao evento. Essas coordenadas permitem que os locais sejam exibidos corretamente no mapa com marcadores interativos.
Além disso, o sistema utiliza a API de Geolocalização do navegador para obter a posição do usuário e aplica a fórmula de Haversine diretamente nas consultas SQL para calcular a distância entre o usuário e cada evento, considerando a curvatura da Terra. Com esse cálculo, os eventos são ordenados automaticamente por proximidade, permitindo que o usuário visualize inicialmente as feiras mais próximas de sua localização.
No planejamento inicial do projeto, também foi considerada a integração com a API do WhatsApp (Twilio) para envio automático de notificações, divulgações e promoções aos usuários. Entretanto, devido às limitações relacionadas a custos e à dependência de serviços pagos, essa funcionalidade não foi implementada na versão final do sistema, permanecendo como uma possibilidade de desenvolvimento futuro.


Tecnologia utilizadas no Baita Feira, abaixo:


![Texto alternativo](./resources/imagem)

## Descrição da Solução

Diagrama de Fluxo Arquitetural, abaixo:


O Baita Feira consiste em uma plataforma web desenvolvida em Laravel (PHP), com interface responsiva construída em HTML, CSS, Bootstrap e JavaScript, utilizando MySQL como banco de dados e hospedagem na Hostinguer.
Para os recursos de localização, o sistema utiliza o Leaflet integrado ao OpenStreetMap (OSM), permitindo exibir mapas e marcar o local dos eventos de forma totalmente gratuita. A latitude e longitude são processadas pelo próprio Leaflet, enquanto o preenchimento automático do endereço do organizador é obtido por meio da API gratuita ViaCEP, que retorna informações completas a partir do CEP informado.
Além disso, o sistema conta com ferramentas internas para organização de eventos, gerenciamento de bancas, controle de participantes e divulgação das feiras, tornando o processo mais ágil e acessível para organizadores, expositores e consumidores. A plataforma tem como finalidade centralizar informações sobre feiras , conectando microempreendedores e o público interessado em novidades locais.
![Texto alternativo](./resources/imagem/diagramadefluxobaitafeira.jpg)

## Para Expositores
A plataforma disponibiliza recursos para que os expositores possam:

Cadastrar perfis completos de suas bancas, incluindo nome fantasia,descrição, categoria da banca , instagram e imagem do nome fantasia;
Registrar produtos e confirmar sua participação ou não no evento.
Vincular múltiplas bancas ao seu perfil, caso possuam mais de um empreendimento;
Divulgar produtos e promoções de forma centralizada e organizada.

## Para Consumidores (Frequentadores):

A plataforma permite aos consumidores:

* Consultar eventos de por data, mais perto e e futuros e seus respectivos detalhes;
* Favoritar bancas e produtos de interesse;
* Verificar em quais eventos suas bancas favoritas estarão presentes;
* O sistema permite que os usuários confirmem interesse em feiras e recebam notificações diretamente pelo WhatsApp. As notificações incluem informações sobre novos eventos, alterações nos eventos já agendados, cancelamentos e promoções de produtos que foram favoritados. Essa funcionalidade garante que os usuários estejam sempre atualizados sobre as feiras e produtos de seu interesse, aumentando o engajamento e a satisfação com o aplicativo.

## Para Microempreendedores (Expositores)

A plataforma disponibiliza recursos para que os expositores possam:

* Cadastrar perfis completos de suas bancas, incluindo descrição, categoria, redes sociais e informações de contato;

* Registrar produtos e confirmar sua participações em eventos .

* Vincular múltiplas bancas ao seu perfil, caso possuam mais de um empreendimento;

* Divulgar produtos, serviços, promoções e novidades de forma centralizada e organizada.

## Para Organizadores de Feiras

A solução oferece aos organizadores ferramentas para:

* Criar, editar e gerenciar eventos utilizando:

* Google API, para validação de endereços, mapas e funcionalidades de localização;

* Inteligência Artificial, para geração automática de descrições, estruturação de informações e sugestões de conteúdo;

* Gerenciar bancas participantes e analisar solicitações de expositores;

* Divulgar eventos e promoções de forma automatizada, utilizando API do WhatsApp e API de envio de e-mails para alcançar o público de maneira direta e eficiente.

## Para Consumidores (Frequentadores)

A plataforma permite aos consumidores:

* Consultar eventos de agora e futuros e seus respectivos detalhes;

* Favoritar bancas e produtos de interesse, acompanhando novidades e atualizações;

* Verificar em quais eventos suas bancas favoritas estarão presentes;

* Confirmar interesse em feiras e receber notificações por e-mail e WhatsApp, incluindo divulgação de novos eventos, promoções e atualizações importante;



## Arquitetura

O sistema Baita Feira foi elaborado para proporcionar uma experiência responsiva, escalável e de fácil manutenção, adotando o padrão MVC (Model-View-Controller) com o framework Laravel (PHP). A estrutura é organizada em camadas:

* Camada de Apresentação (View — Front-end): interfaces responsivas em HTML, CSS, Bootstrap e JavaScript, exibindo feiras, expositores e produtos, e permitindo interações do usuário, como favoritar marcas ou utilizar cupons.

* Camada de Controle (Controller — Back-end): gerencia a lógica da aplicação, autenticação de usuários e operações CRUD para eventos, produtos e cupons, atuando como intermediária entre o front-end e o modelo de dados.

* Camada de Serviços (Service — Back-end): encapsula regras de negócio complexas, promove a reutilização de código e integrações externas, como notificações via WhatsApp.
Camada de Modelo (Model— Banco de Dados): representa dados e regras de negócio no MySQL, armazenando informações de usuários, eventos, produtos e histórico de interações, utilizando o Eloquent ORM do Laravel.

* O projeto é versionado no GitHub, assegurando controle de alterações e colaboração, e hospedado na Umbler, que oferece suporte ao Laravel e MySQL, garantindo alta disponibilidade e acesso seguro aos usuários.

Essa arquitetura permite que o Baita Feira seja uma plataforma dinâmica e adaptável, facilitando o desenvolvimento contínuo e a integração de novas funcionalidades.

<!-- ![Texto alternativo](./resources/imagens/ -->

Devem ser realizados no mínimo 5 artefatos.

A seguir são apresentados exemplos de artefatos que podem ser apresentados:

## Comparativo com Sistemas Correlatos

Para identificar diferenciais competitivos e oportunidades de melhoria, foi realizado um comparativo entre o sistema Baita Feira e outras plataformas com funcionalidades relacionadas, como Sympla, Site da Prefeitura de Porto Alegre e Feira Incomum.

O objetivo da análise foi identificar quais recursos essas plataformas oferecem e entender como o Baita Feira pode se destacar ao atender de forma mais eficaz as demandas de microempreendedores, organizadores e consumidores das feiras locais.

A comparação, apresentada na tabela do estudo, evidencia que:

Todas as plataformas disponibilizam informações básicas como data, horário e local dos eventos, o que é essencial para a divulgação.
Não apresentam outras datas futuras do mesmo evento ou da mesma feira, dificultando o planejamento dos consumidores que desejam se organizar com antecedência.
Nenhuma mostra claramente os expositores confirmados para cada evento, limitando a visibilidade dos expositores e impedindo que o público saiba previamente quais marcas estarão presentes.
![Texto alternativo](./resources/imagens/sistemacorrelatos.jpg)


* Casos de uso :
  
![Texto alternativo](./resources/imagens/diagramadecasodeuso.jpg)

* Elevator pitch

Elevator pitch
PARA microempreendedores que participam de feiras, organizadores de eventos e consumidores interessados em novidades locais,

QUE TÊM empreendedores que precisam de mais visibilidade, organizadores que desejam divulgar feiras de forma centralizada e consumidores que buscam um único lugar para descobrir eventos e promoções,

O BAITA FEIRA

É UMA plataforma digital para divulgação de eventos e bancas de microempreendedores em feiras do sul do Brasil,

QUE facilita a conexão entre expositores, organizadores e consumidores, além de simplificar a divulgação dos eventos e o acesso às informações de cada banca,

AO CONTRÁRIO DE sites da Prefeitura, Sympla, redes sociais e plataformas genéricas, que não são voltadas exclusivamente para pequenos negócios locais e não concentram todos os participantes de feiras em um único ambiente,

O NOSSO PRODUTO é uma plataforma online que centraliza eventos, bancas e dados dos expositores, servindo como ponto inicial para a descoberta, divulgação e acompanhamento das feiras.

## Protótipos
Protótipos da Aplicação (Figma)
Para a criação dos protótipos da aplicação, foi utilizado o Figma, ferramenta que permite desenvolver interfaces de alta fidelidade de forma interativa, visual e intuitiva.

Funcionalidades para Clientes
Nos protótipos voltados aos consumidores, foram destacadas funcionalidades que aumentam a praticidade no uso da plataforma e facilitam o engajamento com os expositores:

Favoritar bancas: permite que o usuário acompanhe bancas de interesse e receba informações sobre evento daquela feira caso não tenha participado e ao favoritar um produto ele
Visualização de eventos: possibilita saber quando e onde ocorrerão os eventos das marcas favoritas, possibilitar o cadastro e a divulgação de produtos, promoções de cada banca.
Press enter or click to view image in full size

## Funcionalidades para Clientes

![Texto alternativo](./resources/imagens/telafigmacliente.jpg)

Nos protótipos voltados aos consumidores, foram destacadas funcionalidades que aumentam a praticidade no uso da plataforma e facilitam o engajamento com os expositores:

Favoritar bancas: permite que o usuário acompanhe bancas de interesse e receba informações sobre evento daquela feira caso não tenha participado e ao favoritar um produto ele
Visualização de eventos: possibilita saber quando e onde ocorrerão os eventos das marcas favoritas, possibilitar o cadastro e a divulgação de produtos, promoções de cada banca.

## Funcionalidades para Organizadores
Nos protótipos destinados aos organizadores de feiras, foram destacadas funcionalidades que facilitam a criação e divulgação dos eventos:

Criação e edição de feiras: o organizador pode cadastrar novos eventos, informando nome da feira, descrição, datas, horários e endereço, com integração às APIs de localização para geolocalização automático.
Atualização de informações: permite editar conteúdos já cadastrados, como textos, imagens e demais dados relacionados à feira.
Divulgação dos eventos: possibilita manter a página do evento sempre atualizada, facilitando o acesso dos consumidores a informações completas e confiáveis.
Notificações: envio automatizado de avisos aos usuários sobre novas feiras, alterações de data ou local e comunicados gerais por meio do sistema de notificações .

![Texto alternativo](./resources/imagens/figmaorganizadordoevento.jpg)
## Funcionalidades para Expositor
Foram incluídas funcionalidades que apoiam o gerenciamento das atividades dos expositores nas feiras:

Gestão de produtos: possibilita editar informações e imagens dos produtos, mantendo o catálogo sempre atualizado e atrativo para os clientes.
Edição de informações da banca/marca: possibilita atualizar descrição, logo e demais informações relevantes, reforçando a identidade da marca dentro da plataforma.

![Texto alternativo](./resources/imagens/prototipofigmaexporsitor.jpg)


## Validação

A validação do sistema foi realizada de forma demonstrativa, com o objetivo de apresentar o funcionamento da plataforma para fins de avaliação no TCC. Primeiro, foram feitos testes funcionais internos para garantir que as principais funcionalidades estivessem operando corretamente, como cadastro de usuários, criação de eventos e navegação pelas telas.

Em seguida, o sistema foi apresentado pessoalmente,, por meio de um computador, para expositores e consumidores convidados. Durante a apresentação, foram demonstradas as telas, os fluxos principais e as funcionalidades da plataforma, permitindo que os participantes compreendessem como o sistema funciona na prática.

Após a demonstração, foi aplicado um questionário de feedback,no qual os participantes puderam avaliar a clareza da interface, a utilidade das funcionalidades e sugerir melhorias.

Essa etapa permitiu coletar percepções importantes do público-alvo e validar a proposta apresentada no TCC, mesmo sem a realização de testes completos de uso devido ao tempo disponível.


## Estratégia

Para compreender as reais necessidades do público-alvo, foi realizada uma entrevista com dois grupos distintos: consumidores que frequentam feiras locais e microempreendedores que participam como expositores. O objetivo dessa etapa foi levantar informações sobre dificuldades, expectativas e funcionalidades desejadas em uma aplicação que centralize dados de eventos e marcas.

As entrevistas procuraram identificar os principais desafios enfrentados por cada grupo. Entre os microempreendedores, destacou-se a dificuldade em divulgar eventos e atrair novos clientes. Já os consumidores mencionaram a falta de um canal centralizado para acessar informações sobre feiras, horários e expositores. Esses dados foram essenciais para orientar a construção das funcionalidades do sistema.

Após essa etapa, foi realizada a apresentação do MVP diretamente pelo computador, durante o momento de exposição do TCC. A demonstração permitiu apresentar visualmente as funcionalidades desenvolvidas e coletar feedback por meio de um questionário aplicado aos participantes. Essa avaliação complementou as entrevistas iniciais e ajudou a validar se o protótipo atendia às necessidades identificadas.


## Consolidação dos Dados Coletados-Entrevistas
As entrevistas realizadas com o público-alvo expositores e clientes que frequentam feiras em Porto Alegre permitiram identificar suas principais necessidades e dificuldades. Por meio dessa pesquisa, tornou-se evidente a falta de um canal centralizado para divulgar eventos, produtos e informações das feiras.

Os participantes também apontaram funcionalidades desejadas para o Baita Feira, como receber notificações sobre novas feiras, visualizar datas atualizadas dos eventos, acessar promoções dos expositores e encontrar facilmente as feiras que estão acontecendo no momento ou que ocorrerão em breve. Essas informações foram essenciais para direcionar o desenvolvimento da plataforma, garantindo que as funcionalidades criadas atendessem às expectativas e demandas reais dos usuários.

Posteriormente, foi realizada uma nova apresentação do aplicativo, na qual o protótipo foi demonstrado para expositores e clientes, a fim de coletar opiniões sobre o funcionamento, clareza das telas e possíveis melhorias. Esse momento permitiu validar as escolhas do projeto e identificar sugestões importantes para aprimoramentos futuros.
Após a apresentação e demonstração do Baita Feira App em sua versão on-line, foram aplicadas pesquisas com os dois principais públicos envolvidos no sistema: frequentadores das feiras e expositores. Os resultados obtidos indicaram alta aceitação da proposta, evidenciando que a plataforma atende de forma satisfatória às necessidades de ambos os perfis.

Entre os frequentadores, destacou-se o interesse no uso do aplicativo para acompanhamento completo das informações dos eventos, como data, horário e localização, bem como para a visualização das bancas participantes e de seus produtos, a possibilidade de favoritar expositores e o recebimento de notificações. Já entre os expositores, a plataforma foi reconhecida como uma ferramenta eficiente de divulgação de eventos e produtos, contribuindo para ampliar a visibilidade das bancas e fortalecer a aproximação com o público consumidor.

A partir das respostas coletadas, foram identificadas sugestões de melhorias que refletem expectativas comuns aos dois grupos pesquisados. Dentre elas, destaca-se a possível implantação de um sistema de reserva de produtos, permitindo que os clientes garantam antecipadamente a aquisição de itens para retirada no dia da feira. Também foi sugerido o desenvolvimento de um canal de comunicação direta (chat) entre expositores e consumidores, com o objetivo de facilitar o atendimento e o esclarecimento de dúvidas em tempo real.

Outras propostas incluem a ampliação dos meios de notificação, como e-mail e SMS, além da possível integração futura com serviços de mensageria instantânea, a implementação de um sistema de curtidas e avaliações públicas para bancas e produtos, o destaque visual para os itens mais favoritados pelos usuários, bem como a possibilidade de compartilhamento de imagens e experiências relacionadas aos produtos adquiridos nas feiras.

De modo geral, os resultados confirmam que o Baita Feira App cumpre seu objetivo principal de centralizar informações, conectar expositores e consumidores e fomentar o fortalecimento do comércio local, além de oferecer uma base sólida para a evolução contínua da plataforma conforme as demandas e sugestões identificadas durante o processo de avaliação do sistema.





## Referências Bibliográficas

* Livros:

STAUFFER, Matt.Desenvolvimento com Laravel: um framework para construção de aplicativos PHP modernos. São Paulo: Novatec, 2017.

ELMASRI, R.E.; NAVATHE, S. BS. sistemas de banco de dados. 7. ed. São Paul: Pearson, 2019.
