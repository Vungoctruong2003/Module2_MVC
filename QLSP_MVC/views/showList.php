<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h3> Danh sách sản phẩm </h3>

<button style="margin-bottom: 20px"> <a href="index.php?action=add"> add </a> </button>
<table border="1px" cellspacing="0">
   <thead>
    <th>Id</th>
    <th>Name</th>
    <th>Price</th>
    <th>Description</th>
    <th>Producer</th>
    <th colspan="2">Actions</th>
   </thead>
    <tbody>

    <?php  foreach ($products as $index => $product) :?>
        <tr>
            <td scope="row"><?php echo $index + 1 ?></td>
            <td><?php echo $product["name"] ?></td>
            <td><?php echo $product["price"] ?></td>
            <td><?php echo $product["description"] ?></td>
            <td><?php echo $product["producer"] ?></td>
            <td>
                <a onclick="return confirm('Are you sure ??')" href="index.php?id=<?php echo $product['id'] ?>&action=delete">Delete</a>
            </td>
            <td>
                <a href="index.php?id=<?php echo $product['id']?>&action=update">Update</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>