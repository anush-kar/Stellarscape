<?php include './components/check_login.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Astronomy Picture of the Day</title>
    <link rel="stylesheet" href="./public/css/landing.css" />
    <link rel="stylesheet" href="./public/css/apod.css">
  </head>

  <body>
    <?php include './components/navbar.html'; ?>

    <div class="container">
      <div class="container_inner">
        <div>
          <h2 style="text-align: center;">Astronomy Picture of the Day</h2>

          <!-- Search Form -->
          <form id="searchForm">
            <label for="date">Select Date</label>
            <input type="date" id="date" name="date" />
            <button type="submit">Search</button>
          </form>
        </div>

        <!-- Display Results -->
        <div id="apodResult">
          <h3 id="apodTitle"></h3>
          <div id="apodMedia"></div>
          <p id="apodExplanation"></p><br>
          <p id="apodCopyright"></p>
        </div>
      </div>
    </div>
    <script type='text/javascript' src='./public/js/config.js'></script>
    <script src="./public/js/apod.js"></script>
  </body>
</html>
