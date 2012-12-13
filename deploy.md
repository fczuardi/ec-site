Base de dados
=============

- Importar base de dados
- Alterar duas entradas em wp_options com nova url
- Rodar consulta SQL na base:
    UPDATE wp_posts SET post_content = replace(post_content, 'URL_VELHA', 'URL_NOVA' );