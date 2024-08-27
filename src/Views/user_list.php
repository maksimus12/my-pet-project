<?php
require_once __DIR__ . '/templates/header.php';
?>
<style>
    th, td{
        padding: 5px;
        border: 1px solid #d2d2d2; 
    }
    .table-cont{
        background-color: #eaeaea !important;
        padding: 10px;
        border-radius: 10px;
        width: 700px;
    }
    .table-wrap{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .my-table{
    /* --bs-table-bg: #eaeaea; */
    border-radius: 10px !important;
    width: 100%;
    }   
</style>
<div class="table-wrap">
    <h1>HELLO I AM DB</h1>
    <div class="table-cont">
        <table class="my-table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">phone</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user){?>
                <tr>
                <th scope="row"><?php echo $user['id']?></th>
                <td><?php echo $user['name']?></td>
                <td><?php echo $user['email']?></td>
                <td><?php echo $user['phone']?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>
<?php
require_once __DIR__ . '/templates/footer.php';
?>
