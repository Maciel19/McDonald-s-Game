
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>McQuiz</title>
  <link rel="stylesheet" href="../public/assets/css/game.css">
</head>
<body>

  <h2>MC QUIZ</h2>
  <main>
    <div class="content" <?php if (($_SESSION['finish'] ?? false)) { ?>style="display: none;"<?php } ?>>
      <span class="question"></span>
      <div class="answers"></div>
    </div>
    <div class="finish" <?php if (($_SESSION['finish'] ?? false)) { ?>style="display: flex;"<?php } ?>>
      <span>Parabens você concluiu o Quiz</span>
    </div>
    <img src="../img/McDonalds-Logo-2006_presente-removebg-preview.png" alt="" class="logo-img">
  </main>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <?php if (($_SESSION['finish'] ?? false) === false) { ?>
  <script src="../public/assets/js/script.js" type="module"></script>
  <?php } ?>
</body>
</html>