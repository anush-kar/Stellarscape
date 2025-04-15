<?php include './components/check_login.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mars Rover Photos</title>
    <link rel="stylesheet" href="./public/css/landing.css" />
    <link rel="stylesheet" href="./public/css/mars.css">
  </head>

  <body>
    <?php include "./components/navbar.html" ?>

    <div class="container">
      <div class="container_inner">
        <div>
          <h2 style="text-align: center;">Mars Rover Photos</h2>

          <!-- Search Form -->
          <form id="searchForm">
            <label for="date">Select Date</label>
            <input type="date" id="date" name="date" required />
            <label for="rover">Select Rover</label>
            <select name="rover" id="rover" required>
              <option value="curiosity">Curiosity</option>
              <option value="opportunity">Opportunity</option>
              <option value="spirit">Spirit</option>
            </select>
            <button type="submit">Search</button>
          </form>
        </div>

        <!-- Display Results -->
        <div class="mpresult">
          <p id="rovername"></p>
          <p id="earthdate"></p>
          <p id="roverstatus"></p>
          <table>
            <thead>
              <tr>
                <th>Camera Name</th>
                <th>Image</th>
              </tr>
            </thead>
            <tbody id="tableBody">
              <!-- Rows will be populated here dynamically -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script type="module" src='./public/js/config.js'></script>
    <script type="module" src="./public/js/mars.js"></script>
  </body>
</html>
