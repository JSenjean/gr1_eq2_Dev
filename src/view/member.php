<?php

echo <<<member

  <h1 class="display-4 text-center mt-5 mb-5">Auxilium, une communauté à votre service</h1>
  <div class="row pt-5">
    <div class="col-sm">
      <div class="card">
        <div class="card-body text-center">
          <h3 class="card-title">Des questions ?</h3>
          <a href="index.php?action=faq" class="card-link h4 text-primary">Trouvez les réponses dans notre FAQ</a>
        </div>
      </div>
      <br>
    </div>
    <div class="col-sm">
      <div class="card">
        <div class="card-body text-center">
          <h3 class="card-title">A la recherche d'un service ?</h3>
          <a href="index.php?action=services" class="card-link h4 text-primary">Visiter l'espace d'annonces</a>
        </div>
      </div>
    </div>
    <br>
  </div>
  


</body>
</html>

member;

?>