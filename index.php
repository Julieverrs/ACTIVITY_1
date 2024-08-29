<?php include('db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .actions a {
            color: #007bff;
            text-decoration: none;
            margin-right: 10px;
        }
        .actions a:hover {
            text-decoration: underline;
        }
        .add-button {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .add-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Product List</h1>
    <a href="create.php" class="add-button">Add New Product</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>BarCode</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Actions</th>
        </tr>

        <?php
        $sql = "SELECT * FROM product";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['ID']}</td>
                        <td>{$row['Name']}</td>
                        <td>{$row['Description']}</td>
                        <td>{$row['Price']}</td>
                        <td>{$row['BarCode']}</td>
                        <td>{$row['Created_at']}</td>
                        <td>{$row['Updated_at']}</td>
                        <td class='actions'>
                            <a href='update.php?id={$row['ID']}'>Edit</a> | 
                            <a href='delete.php?id={$row['ID']}'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No records found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
