
# Sexta 18 Janeiro 2013

## Geral:
- mudar url para ec.vc/2/
- lento? o site está bem leve?

## Pessoas:
+ 1. é que os textos das pessoas ainda parecem mais bold do que a referência no site do google. @done (2013-01-16 20:19)

## Contato:
+ menu está com um sublinhado, tirar. @done (2013-01-16 20:27)

## Trabalhos
- [admin] Quando altero o nome de uma Campanha ele altera também o Cliente.
- investigar o problema da campanha Entrega Foguete relatado no email
- ?? criar um campo customizado de subtitulo para peças sem campanha
+ mouseover normal tem que ser 2 cores diferentes @done (2013-01-16 19:38)
  + no caso de mouseover customizado, o bold faz o papel do azul @done (2013-01-16 19:38)
+ incluir descrição da campanha @done (2013-01-16 18:14)
  + deixar no estilo correto esta descrição @done (2013-01-18 10:37)
+ 2. em trabalhos, quando um popup aparece, o branco sobre o resto da página  poderia ser um pouco menos transparente? 90% @done (2013-01-16 19:31)
+ 3. em trabalhos, a janela pop-up aparece com barra de scroll. dá pra tirar? (acho que é só no firefox). @done (2013-01-16 19:40)
+ 4. em trabalhos, quando eu clico no thumb, aparece um highlight azul do tamanho do box. dá pra tirar? @done (2013-01-16 20:31)
+ 5. no popup dos trabalhos, os links "impresso 1" etc, diminui o peso da fonte, por favor. @done (2013-01-16 20:34)


-------------------------------------------------------------------------------
# Emails:


Quando altero o nome de uma Campanha ele altera também o Cliente.
E vice-versa.

Por exemplo:
Cliente: Jim Beam
Campanha: Let's Bourbon
ou
Cliente: Apex
Campanha: Brazilian Beauty

--

eu criei uma campanha, Entrega Foguete.
coloquei 2 filmes dentro dela (Itaquera e 23 de maio).
No popup aparece 2 vezes o filme itaquera!?!
no menu dentro do popup aparece diferente
video 2
video 5

habilitei os 2 pra aparecerem na pagina trabalhos,
um já estava e o outro não apareceu.

--

• no trabalho de ZAP, como ele não pertence a nenhuma campanha,
não aparece texto nenhum abaixo do nome do cliente.
só posso inserir um criando uma campanha e associando ao trabalho?
ou tem algum campo do posto que preencha ali?

--

• e se eu quiser, no popup de trabalho, por um textinho descritivo
entre o titulo e os links, dá? acho que foi por minha culpa,
não me lembro de ter mandado um caso destes.
agora, etsou vendo algumas páginas em que dá vontade de por.


-------------------------------------------------------------------------------

# Geral:
- definir como será o title das páginas, atualmente está "EC | Just another Wordpress Site"
+ fazer o elefante começar apagado e ser um link para a pagina /ec @done (2013-01-07 02:02)

# Contatos
+ verificar pq o mapa sobe quando a janela diminui @done (2013-01-07 02:33)

# Trabalhos
+ ajustar entrelinha dos mouse-overs dos quadrados da página de trabalhos @done (2013-01-07 14:45)
+ implementar campo livre de texto para o texto que aparecerá no mouseover @done (2013-01-07 03:05)
[ok] - verificar se tem como influenciar manualmente na ordem dos quadrados e se nao, implementar
  Caso mais de um elemento esteja com a mesma posição eles serão ordenados aleatoriamente
[ok] - [bug] marba 10 paezinhos não agrupa no popup
[ok] - fazer o onclick com fundo azul e texto branco de acordo com o layout
[ok] - checkbox para mostrar ou omitir o quadrado da listagem de trabalhos (se o post deve ou nao aparecer no grid)
[0k] - cadastrar os vídeos

# Pessoas
[ok] - ajustar CSS do <p> com letter-spacing -1px
[ok] - o e-mail deve ser tudo caixa-baixa

# Deploy:

- lembrar de desligar o live plugin
- limpar linhas comentadas no css

-------------------------------------------------------------------------------
# Detalhes:

- arrumar o pequeno deslocamento de pixels no menu das internas entre o icone normal e o ativo


-------------------------------------------------------------------------------
# Bugs:

[ok] - se editor os posts pelo quick-edit, o wordpress limpa os metas



- não previmos muitos nomes, aumentar a altura do div