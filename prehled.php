<?php
include "connection.php";

$query = "SELECT * FROM knihy";

$result = mysqli_query($connection, $query);

if (!$result) {
    die("Dotaz do databáze selhal");
}

?>
<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přehled knih</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body>
    <div class="container">
        <ul class="nav justify-content-center navbar-light bg-light">
            <li class="nav-item "><a href="vklad.php" class="nav-link text-black">Vložení knihy</a></li>
            <li class="nav-item "><a href="prehled.php" class="nav-link text-black active">Přehled knih</a></li>
            <li class="nav-item "><a href="vyhledavani.php" class="nav-link text-black">Vyhledávání knih</a></li>
        </ul>
    </div>
    <div class="container">
        <h3 class="mb-3 mt-5 text-center">Přehled knih</h3>
        <table class="table text-center">
            <tr>
                <th>ISBN</th>
                <th>Jméno</th>
                <th>Přijmení</th>
                <th class="col-2">Název knihy</th>
                <th class="col-7">Popis knihy</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $row['ISBN']; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['surname']; ?></td>
                    <td><?php echo $row['book_title']; ?></td>
                    <td><?php echo $row['book_description']; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>


</body>

</html>