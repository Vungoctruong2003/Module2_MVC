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
<h3> add product </h3>
<form action="" method="post">
<table>
    <tr>
        <td>Id:</td>
        <td><input disabled type="number" name="id" value="<?php echo $product["id"] ?>"></td>
    </tr>
    <tr>
        <td>Name:</td>
        <td><input type="text" name="name" value="<?php echo $product["name"] ?>"></td>
    </tr>
    <tr>
        <td>Price:</td>
        <td><input type="number" name="price" value="<?php echo $product["price"] ?>"></td>
    </tr>
    <tr>
        <td>Description:</td>
        <td><input type="text" name="description" value="<?php echo $product["description"] ?>"></td>
    </tr>

    <tr>
        <td>Producer:</td>
        <td><input type="text" name="producer" value="<?php echo $product["producer"] ?>" ></td>
    </tr>
    <tr>
        <td>
            <input type="submit" value="Confirm">
        </td>
    </tr>
</table>
</form>
</body>
</html>