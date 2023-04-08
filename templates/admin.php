<?php
use App\Model\User;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/assets/css/admin.css">
    <title>Admin</title>
</head>
<body class="container">
<main>
<h1>VENCEDORES</h1>
<table>
    <thead>
        <tr class="table">
            <th>posição</th>
            <th>nome</th>
            <th>pontução</th>
        </tr>
    </thead>
    <tbody >
    <?php
    /**
     * @var User[] $users
     */
    foreach ($users as $i => $user){
    ?>
        <tr >
            <td><?php echo $i+1; ?></td>
            <td><?php echo $user->getName(); ?></td>
            <td><?php echo $user->getNumber();?></td>
        </tr>
        <?php
    }

    ?>

    </tbody>
</table>
</main>

</body>
</html>