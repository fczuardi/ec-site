<?php
/*
Template Name: Pessoas
*/
get_header();
?>
<div id="names_sidebar">
  <ol>
    <li>
      <a href="#">VALDIR</a>
      <p class="fullname">VALDIR WHATEVER</p>
      <p class="position">DIRETOR<br/ >DE QUALQUER</p>
      <span class="email"><a href="mailto:valdir@ec.vc">valdir@ec.vc</a></span>
    </li>
    <li>
      <a href="#">TIAGO</a>
      <p class="fullname">TIAGO LARA</p>
      <p class="position">DIRETOR<br/ >DE OPERAÇÕES</p>
      <span class="email"><a href="mailto:tiago@ec.vc">tiago@ec.vc</a></span>
    </li>
    <li>
      <a href="#">FÁBIO</a>
      <p class="fullname">FÁBIO JUNIOR</p>
      <p class="position">DIRETOR<br/ >DE MÚSICA</p>
      <span class="email"><a href="mailto:fabio@ec.vc">fabio@ec.vc</a></span>
    </li>
    <li>
      <a href="#">ANDERSON</a>
      <p class="fullname">ANDERSON SILVA</p>
      <p class="position">DIRETOR<br/ >DE MMA</p>
      <span class="email"><a href="mailto:anderson@ec.vc">anderson@ec.vc</a></span>
    </li>
    <li class="active">
      <a href="#">VICTOR</a>
      <p class="fullname">VICTOR ARAGÃO</p>
      <p class="position">DIRETOR<br/ >DE CRIAÇÃO</p>
      <span class="email"><a href="mailto:victor@ec.vc">victor@ec.vc</a></span>
    </li>
  </ol>
</div>
<div id="bio">
  <p>
Designer por formação, Victor hoje é diretor <br>de criação na EC.
  </p>
  <p>
Com mais de 15 anos de experiência Já <br>trabalhou na AlmapBBDO, Age, Giovanni+FCB.<br>Fez trabalhos para Nike, Kaiser, Fiat, Pepsi, Morumbi Shopping, e Folha de S. Paulo.
  </p>
  <p>
Em sua formação: Basel Design School/Suíça, Arte e Tecnologia/PUC SP e Artes Gráficas pelo Senai SP.
  </p>
</div>
<div class="clearfloat"></div>
 <!-- <br style="clear:both;float:none;" /> -->

<script>
  jQuery(document).ready(function ($) {

    $('#names_sidebar li').click(function(index) {
      $('#names_sidebar li').removeClass('active');
      $(this).addClass('active');
    });



  });
</script>

<?php
get_footer();
?>