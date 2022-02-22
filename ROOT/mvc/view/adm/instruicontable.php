<?php

$instrumentos = array(
  "Baixo" => "icons8-baixo.png",
  "Bateria" => "icons8-bateria.png",
  "Clarinete" => "icons8-clarinete.png",
  "Corneta" => "icons8-corneta.png",
  "Corneta" => "icons8-corneta-2.png",
  "Flauta" => "icons8-flauta.png",
  "Gaita" => "icons8-gaita.png",
  "Guitarra" => "icons8-guitarra.png",
  "Maestro" => "icons8-maestro.png",
  "Piano" => "icons8-piano.png",
  "Saxofone" => "icons8-saxofone.png",
  "Tambor" => "icons8-tambor.png",
  "Teclado" => "icons8-teclado.png",
  "Trombeta" => "icons8-trombeta.png",
  "Trombone" => "icons8-trombone.png",
  "Trompete" => "icons8-trompete.png",
  "Tuba" => "icons8-tuba.png",
  "Violao" => "icons8-violao.png",
  "Violino" => "icons8-violino.png",
  "Violoncelo" => "icons8-violoncelo.png",
  "Vocal" => "icons8-microfone.png",
  "Xilofone" => "icons8-xilofone.png",
  "Nenhum" => "blank.png"
);

foreach($instrumentos as $instru => $dir){
  //$dir = IMG_INSTRU.strtolower($dir);
  echo '<div class="col-2 instrucard" align="center" onclick="fechamodalinstru()">';
  echo '<div>';
  echo '<input type="radio" id="i'.strtolower($instru).'" name="instruicon" value="'.strtolower($instru).'" onchange="setIcon(\''.$instru.'\', \''.$dir.'\')">';
  echo '</div><div>';
  echo '<label for="i'.strtolower($instru).'">';
  echo '<div class="btn-instru"><img src="'.IMG_INSTRU.strtolower($dir).'"></div>';
  echo '<span class="instrucardp">'.$instru.'</span>';
  echo '</label></div></div>';
}

?>