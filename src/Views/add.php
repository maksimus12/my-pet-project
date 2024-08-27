<?php
require_once __DIR__ . '/templates/header.php';
?>
<style>
    .form-cont{
        min-height: 600px;
        align-items: center;
    }
    .form-cont form{
        width: 400px;
        padding: 20px;
        background: #eaeaea;
        border-radius: 10px;
    }
</style>

<div class="d-flex justify-content-center form-cont">
    <form action="/users/add" method="POST">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Max" value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>">
            <div><p style="color:red"><?php echo htmlspecialchars($errors['name']);?></p></div>
        </div>
         <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="text" name="email" class="form-control" placeholder="name@example.com" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
            <div>
                <p style="color:red"><?php echo htmlspecialchars($errors['email']);?></p>
        
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" placeholder="0xxxxxxx" value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>">
            <div>
                <p style="color:red"><?php echo htmlspecialchars($errors['phone']);?></p>
    
            </div>
        </div>
        <div class="mb-3">
            <button type="submit" name="submit" class="btn btn-primary mb-3">Send</button>
        </div>
    </form>
</div>
<?php
require_once __DIR__ . '/templates/footer.php';
?>
