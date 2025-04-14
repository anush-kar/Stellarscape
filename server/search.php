<?php
include 'db.php';

$query = $_GET['query'];
$sql = "SELECT * FROM books WHERE Book_Title LIKE ?";
$stmt = $conn->prepare($sql);
$search = "%{$query}%";
$stmt->bind_param("s", $search);
$stmt->execute();
$result = $stmt->get_result();

echo "<h2>Search Results for: \"$query\"</h2>";
echo "<a href='../library/index.php'>Back</a>";
echo "<table border='1' cellpadding='10'>
        <tr><th>Title</th><th>Author</th><th>Rating</th><th>Description</th><th>Year</th><th>Link</th></tr>";

while ($row = $result->fetch_assoc()) {
  echo "<tr>
          <td>{$row['Book_Title']}</td>
          <td>{$row['Author_Name']}</td>
          <td>{$row['Rating_score']}</td>
          <td>{$row['Book_Description']}</td>
          <td>{$row['Year_published']}</td>
          <td><a href='{$row['url']}' target='_blank'>View</a></td>
        </tr>";
}
echo "</table>";
?>