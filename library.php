<?php
// Database connection
include "./server/db.php";

// Define the search query
$search_query = "";

// Handle search
if (isset($_POST['search'])) {
    $search_query = $_POST['search_query'];
    $sql = "SELECT * FROM books WHERE Book_Title LIKE '%$search_query%'";
} else {
    $sql = "SELECT * FROM books LIMIT 10"; // Show only the first 10 books initially
}

// Execute the query
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <section id="library">
        <div class="header">
            <h2>Library</h2>
            <form action="" method="POST" class="search-form">
                <input type="text" name="search_query" placeholder="Search by Book Title" value="<?php echo htmlspecialchars($search_query); ?>">
                <button type="submit" name="search">Search</button>
            </form>
            <a href="add_book.php"><button>Add Book</button></a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Author Name</th>
                    <th>Rating</th>
                    <th>Description</th>
                    <th>Year Published</th>
                    <th>URL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['Book_Title']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Author_Name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Rating_score']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Book_Description']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Year_published']) . "</td>";
                        echo "<td><a href='" . htmlspecialchars($row['url']) . "' target='_blank'>View</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No books found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
