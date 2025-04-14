<?php
// Database connection
include "./server/db.php";

// Handle add book form submission
if (isset($_POST['add_book'])) {
    $book_title = $_POST['book_title'];
    $author_name = $_POST['author_name'];
    $rating = $_POST['rating'];
    $description = $_POST['description'];
    $year_published = $_POST['year_published'];
    $url = $_POST['url'];

    // Insert new book into database (Genres column removed)
    $insert_sql = "INSERT INTO books (Book_Title, Author_Name, Rating_score, Book_Description, Year_published, url) 
                    VALUES ('$book_title', '$author_name', '$rating', '$description', '$year_published', '$url')";

    if ($conn->query($insert_sql) === TRUE) {
        echo "New record created successfully. <a href='library.php'>Go back to Library</a>";
    } else {
        echo "Error: " . $insert_sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background-color: #f4f4f4;
      color: rgb(88, 0, 136);
    }

    h2 {
      color: rgb(88, 0, 136);
      text-align: center;
      margin-bottom: 20px;
    }

    #add-book {
      max-width: 600px;
      margin: 0 auto;
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 6px;
    }

    input[type="text"], input[type="number"], textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 4px;
      box-sizing: border-box;
    }

    textarea {
      resize: vertical;
    }

    button {
      padding: 10px 15px;
      background: rgb(88, 0, 136);
      color: white;
      border: none;
      cursor: pointer;
      border-radius: 4px;
      width: 100%;
      font-size: 16px;
    }

    button:hover {
      background: rgb(68, 0, 104);
    }

    .back-link {
      display: block;
      text-align: center;
      margin-top: 20px;
    }

    .back-link a {
      color: rgb(88, 0, 136);
      text-decoration: none;
    }
    </style>
</head>
<body>

    <section id="add-book">
        <h2>Add a New Book</h2>

        <form action="" method="POST">
            <label for="book_title">Book Title:</label>
            <input type="text" name="book_title" required>

            <label for="author_name">Author Name:</label>
            <input type="text" name="author_name" required>

            <label for="rating">Rating (1-5):</label>
            <input type="number" name="rating" min="1" max="5" required>

            <label for="description">Description:</label>
            <textarea name="description" rows="4" required></textarea>

            <label for="year_published">Year Published:</label>
            <input type="number" name="year_published" required>

            <label for="url">URL:</label>
            <input type="text" name="url" required>

            <button type="submit" name="add_book">Add Book</button>
        </form>

        <div class="back-link">
            <a href="library.php">Back to Library</a>
        </div>
    </section>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
