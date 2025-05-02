<?php
// Database connection using PDO
try {
    $pdo = new PDO("mysql:host=localhost;dbname=book_library", "root", "viratkohli7593");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle form submission for adding a book
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_book"])) {
    $title = $_POST["title"];
    $authors = $_POST["authors"];
    $edition = $_POST["edition"];
    $publisher = $_POST["publisher"];

    $sql = "INSERT INTO books (title, authors, edition, publisher) 
            VALUES (:title, :authors, :edition, :publisher)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':title' => $title,
        ':authors' => $authors,
        ':edition' => $edition,
        ':publisher' => $publisher
    ]);
    echo "<p class='success-msg'>Book added successfully!</p>";
}

// Handle search request
$search_results = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search_book"])) {
    $search_title = "%" . $_POST["search_title"] . "%";
    $sql = "SELECT * FROM books WHERE title LIKE :title";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':title' => $search_title]);
    $search_results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 20px;
        }

        h1, h2 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px 10px;
            margin-top: 4px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .success-msg {
            text-align: center;
            color: green;
            font-weight: bold;
            margin-bottom: 20px;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Book Management System</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>Add New Book</h2>
        <label>Title:
            <input type="text" name="title" required>
        </label>
        <label>Authors:
            <input type="text" name="authors" required>
        </label>
        <label>Edition:
            <input type="text" name="edition">
        </label>
        <label>Publisher:
            <input type="text" name="publisher" required>
        </label>
        <input type="submit" name="add_book" value="Add Book">
    </form>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>Search Book by Title</h2>
        <label>Enter Title to Search:
            <input type="text" name="search_title" required>
        </label>
        <input type="submit" name="search_book" value="Search">
    </form>

    <?php if (!empty($search_results)) : ?>
        <h2 style="text-align: center;">Search Results</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Authors</th>
                <th>Edition</th>
                <th>Publisher</th>
            </tr>
            <?php foreach ($search_results as $row) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($row["id"]); ?></td>
                    <td><?php echo htmlspecialchars($row["title"]); ?></td>
                    <td><?php echo htmlspecialchars($row["authors"]); ?></td>
                    <td><?php echo htmlspecialchars($row["edition"] ?? 'N/A'); ?></td>
                    <td><?php echo htmlspecialchars($row["publisher"]); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>
