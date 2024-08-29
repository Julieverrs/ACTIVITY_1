<?php include('db.php'); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $barcode = $_POST['barcode'];

    $sql = "INSERT INTO product (Name, Description, Price, BarCode) VALUES ('$name', '$description', '$price', '$barcode')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            width: 100%;
        }
        .back-link a {
            color: #007bff;
            text-decoration: none;
        }
        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Create New Product</h1>
    <form action="" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required>

        <label for="barcode">BarCode:</label>
        <input type="text" id="barcode" name="barcode" required>

        <button type="submit">Create</button>
    </form>
    <div class="back-link">
        <a href="index.php">Back to Product List</a>
    </div>
</body>
</html>
