<table class="table" style="width: 500px">
    <thead>
    <tr>
        <th scope="col">STT</th>
        <th scope="col">Name</th>
        <th scope="col">Mail</th>
        <th scope="col">Address</th>
        <th scope="col" colspan="2">Action</th>

    </tr>
    </thead>
    <tbody>

    <?php foreach ($customers as $index => $customer) : ?>
        <tr>
            <td scope="row"><?php echo $index + 1 ?></td>
            <td><?php echo $customer['name'] ?></td>
            <td><?php echo $customer['email'] ?></td>
            <td><?php echo $customer['address'] ?></td>
            <td><a onclick="return confirm('Are you sure?')"
                   href="index.php?action=delete&id=<?php echo $customer['id'] ?>" class="btn btn-danger">Delete</a>
            </td>
            <td><a href="index.php?action=update&id=<?php echo  $customer['id']?>" class="btn btn-warning">Update</a>
            </td>
        </tr>
    <?php endforeach; ?>
    <td><a href="index.php?action=add" class="btn btn-success">ADD NEW</a>
    </td>
    </tbody>
</table>

