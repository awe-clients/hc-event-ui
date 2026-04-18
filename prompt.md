Analise o código html abaixo e vamos tranforma-lo em um  codigo php para wordpress.


### Contexto
Iremos construir um site para um evento de corrida. Eventos de corrida geralmente tem uma estrutura dessa forma:
1. Header (logo, menu e cta)
2. Hero (bg, texto chamativo, cta e cronometro)
3. Sobre (autoridade), explicação com texto e do lado, uma imagem chamativa
4. Alguns indicadores com icone, texto e um valor. Exemplo: icon de sol, texto clima e 28º. No final, uma chamada de escassez das últimas vagas.
5. Na seção posterior alguns itens que fazem parte de uma corrida: (i) card de percurso, (ii) card do kit e (iii) card de regulamento onde tem um texto e um botão de download de um pdf.
6. O bloco abaixo é a seção com 3 cards de notícia, contendo as últimas notícias publicadas
7. Seção com os patrocinadores, apoiadores, realizadores e outros
8. Por fim, rodapé.

Precisamos criar uma site em wordpress, onde todas essas partes estão disponíveis para edição no cms do wordpress, para um usuário leigo, que não sabe nada de programação. Ele vai apenas aplicar os conteúdos. Importante lembrar o seguinte: todos as imagens e layouts, precisam vir com uma descrição para que ele saiba que precisa de uma largura e altura adequada para ficar perfeito. Ou por exemplo, ter ao menos 3 imagens para que a responsividade fique excelente.

Ele vai poder aplicar a marca do evento, tanto no header como no rodape, cada umd eles tem uma cor diferente. Deve poder criar menu da parte de cima e também do rodape. Há um texto no rodapé que precisa ser ajustado para que ele possa editar. Teremos previsto link das redes sociais. 

Agora vamos especificar as outras áreas:
1. Header: logo, menu e botão (pode ser botão de inscreva-se, ou de pegar kit ou de resultados ou não aparecer. Isso poderá ser ajustado no CMS)
2. No hero ele vai cadastrar um bg com 3 formatos (desktop, tablet e mobile), todos com especificação de tamanho. Poderá ajustar o título principal e o titulo acima. Deverá colocar a data e poderá especificar uma data e hora para o cronometro entrar em ação. Quando o cronometro completar a contagem até o dia, deverá mudar para uma frase como: O grande dia chegou.
3. Na seção sobre, precisamos permitir atualização o subtitulo, o titulo e o texto. Há alguns textos conforme o layout que devem ser aplicados. Do lado, temos uma imagem que precisa ser atualizada no cms.
4. A seção co os textos abaixo, devem ser ajustáveis com: icon, texto e valor foco.
5. A seção de cards do evento tem um subtitulo, um titulo, um texto explicativo e um link; um subtitulo, um titulo, uma imagem e um link para abrir um modal com a descrição; card 3 tem um subtitulo, um titulo, um texto e um botão para baixar o pdf com o regulamento ou outro documento
6. Na seção de notícias são as ultimas noticias publicadas
7. Na seção de marcas, poderá criar áreas: patrocinador, realização, apoio e em cada categoria dessas adicionar uma logo, link e texto alternativo que será o titulo e alt da imagem.


### Tarefa
- crie as páginas wordpress correspondente, como footer, header, index (404), front page, pagina template de post, página template de page, página template de listagem de notícias
- crie uma arquitetura de reaproveitar códigos e reduzir a quantidade de código nos templates, usando a prática de template parts
- evitar o uso de plugins, dando preferencia a fazer campos metabox e custom post types
- o template deve ser o máximo customizável possível, que o gerenciador de conteúdos nunca precise falar com um programador para solicitar um ajuste, de tão customizável e usável que é
- focar em usabildiade e normenclaturas ao máximo
- fazer customização da área do cms/admin wordpress para se parecer com o visual design da marca, com logo, blocos de texto internos, login e tudo que possa ser customizável em nível máximo, no cms
- refaça toda a estrutura básica do dashboard do wordpress, colocando apenas menus que sejam úteis para o gerenciador de arquivos, que ele não precise nem necessite criar usuários, configurações se não for necessária, comentários. Oculte os menos que não forem necessários.
- bloquear as entradas de comentários

### Fonte de inspiração
- em anexo envio documento com a marca do documento e suas cores
- preciso ajustar o layout baseado nessa estrutura visual, com cores e padrões da marca