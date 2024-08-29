<?php include('db.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM product WHERE ID = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $barcode = $_POST['barcode'];

    $sql = "UPDATE product SET Name='$name', Description='$description', Price='$price', BarCode='$barcode' WHERE ID=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
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
    <title>Update Product</title>
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
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        button[type="submit"]:hover {
            background-color: #218838;
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
    <h1>Update Product</h1>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['Name']; ?>" required>

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" value="<?php echo $row['Description']; ?>" required>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" value="<?php echo $row['Price']; ?>" required>

        <label for="barcode">BarCode:</label>
        <input type="text" id="barcode" name="barcode" value="<?php echo $row['BarCode']; ?>" required>

        <button type="submit">Update</button>
    </form>
    <div class="back-link">
        <a href="index.php">Back to Product List</a>
    </div>
</body>
</html>
