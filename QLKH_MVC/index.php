<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php
include_once "views/navar.php";
include_once "models/DBConnect.php";
include_once "models/CustomerModels.php";
include_once "controller/customerController.php";
?>
<?php
$customerController = new customerController();
?>

<div class="container">
    <?php
    $id = $_GET['id'] ?? null;
    $action = $_GET['action'] ?? null;
    $method = $_SERVER['REQUEST_METHOD'];

    switch ($action) {
        case 'add':
            include_once "views/creat.php";
            if ($method == "POST") {
                $customer = [];
                $customer['name'] = $_REQUEST['name'];
                $customer['email'] = $_REQUEST['mail'];
                $customer['address'] = $_REQUEST['address'];
                $customerController->insertCustomer($customer);
            }
            break;
        case "show-list":
            $customerController->showList();
            break;
        case "update":
            $customerController->showEditcustomerById($id);
            include_once "views/edit.php";
            if ($method == "POST") {
                $customer = [];

                $customer['name'] = $_REQUEST['name'];
                $customer['id'] = $_REQUEST['id'];
                $customer['email'] = $_REQUEST['mail'];
                $customer['address'] = $_REQUEST['address'];
                $customerController->updateCustomer($customer);
            }
            break;
        case "delete":
            $customerController->removeCustomer($id);
            break;
        case "search":
            $key = $_REQUEST['key'];
            $customerController->searchByName($key);
            break;
    }
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</body>
</html>

