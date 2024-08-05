
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
<?php 
    $conn = Db_connection::getPDO();
    $userData = new GetUser($conn);
    $users = $userData->getRecords();


?>
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
                <th scope="row"><?php $user['id']?></th>
                <td><?php $user['name']?></td>
                <td><?php $user['email']?></td>
                <td>@<?php $user['phone']?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>
