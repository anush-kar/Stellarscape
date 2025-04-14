<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Library</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background-color: white;
      color: rgb(88, 0, 136);
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      padding: 10px;
      border: 1px solid rgb(88, 0, 136);
    }
    input[type="text"] {
      padding: 8px;
      width: 300px;
    }
    button {
      padding: 8px 12px;
      background: rgb(88, 0, 136);
      color: white;
      border: none;
      cursor: pointer;
      border-radius: 4px;
    }
    form {
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <h1>📚 Library</h1>

  <form method="GET" action="../php/search_book.php">
    <input type="text" name="query" placeholder="Search book by name..." required />
    <button type="submit">Search</button>
  </form>

  <form method="GET" action="add_book_form.php">
    <button type="submit">➕ Add Book</button>
  </form>

  <h2>Books:</h2>
  <table>
    <thead>
      <tr>
        <th>Title</th><th>Author</th><th>Rating</th><th>Description</th><th>Year</th><th>Genres</th><th>Link</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql = "SELECT * FROM books LIMIT 10";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['Book_Title']}</td>
                  <td>{$row['Author_Name']}</td>
                  <td>{$row['Rating_score']}</td>
                  <td>{$row['Book_Description']}</td>
                  <td>{$row['Year_published']}</td>
                  <td>{$row['Genres']}</td>
                  <td><a href='{$row['url']}' target='_blank'>View</a></td>
                </tr>";
        }
      ?>
    </tbody>
  </table>
</body>
</html>
