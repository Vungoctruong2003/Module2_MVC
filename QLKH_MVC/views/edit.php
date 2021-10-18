
<div class="container">
    <h3>Add new category</h3>
    <form method="post">
        <div class="form-group">
            <label for="">STT</label>
            <input type="number" name="id" required class="form-control" value="<?php echo $customer['id']?>" disabled>
            <label for="">Name</label>
            <input type="text" name="name" required class="form-control" value="<?php echo $customer["name"] ?>">
            <label for="">Mail</label>
            <input type="text" name="mail" required class="form-control" value="<?php echo $customer["email"] ?>">
            <label for="">Address</label>
            <input type="text" name="address" required class="form-control" value="<?php echo $customer["address"] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
