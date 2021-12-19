
<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vkládání do databáze</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body class="img-fluid">

    <div class="container">
        <ul class="nav justify-content-center navbar-light bg-light">
            <li class="nav-item "><a href="vklad.php" class="nav-link text-black active">Vložení knihy</a></li>
            <li class="nav-item "><a href="prehled.php" class="nav-link text-black">Přehled knih</a></li>
            <li class="nav-item "><a href="vyhledavani.php" class="nav-link text-black">Vyhledávání knih</a></li>
        </ul>
    </div>

    <div class="container">
        <h3 class="text-center mb-3 mt-3">Zadání knih od databáze</h3>
        <form action="vklad.php" method="post" class="col-3 stred">
            ISBN
            <input type="text" name="isbn_kod" class="form-control mb-2">
            Přijmení autora 
            <input type="text" name="prijmeni_autora" class="form-control mb-2" >
            Jméno autora
            <input type="text" name="jmeno_autora" class="form-control mb-2">
            Název knihy
            <input type="text" name="nazev_knihy" class="form-control mb-2">
            Popis knihy<br>
            <textarea name="popis_knihy" cols="30" rows="10" class="form-control mb-2"></textarea><br>
            <input type="submit" name="submit" value="Odeslat" class="btn btn-outline-secondary"> <input type="reset" value="Vymazat" class="btn btn-outline-secondary">
        </form>
    </div>
    </div>
</body>
</html>
<?php
include "connection.php";

if (isset($_POST['submit'])) {
    $isbn_kod = addslashes($_POST['isbn_kod']);
    $prijmeni_autora = addslashes($_POST['prijmeni_autora']);
    $jmeno_autora = addslashes($_POST['jmeno_autora']);
    $nazev_knihy = addslashes($_POST['nazev_knihy']);
    $popis_knihy = addslashes($_POST['popis_knihy']);
} else {
    echo "Nic nepřišlo";
};
$query = "INSERT INTO knihy (ISBN, firstname, surname, book_title, book_description) 
    VALUES ('$isbn_kod', '$jmeno_autora', '$prijmeni_autora','$nazev_knihy','$popis_knihy' )";

$result = mysqli_query($connection, $query);
if (!$result) {
    echo "Dotaz do databáze selhal";
};
?>