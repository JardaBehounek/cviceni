
<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vyhledávání knih</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />


</head>

<body>

    <div class="container">
        <ul class="nav justify-content-center navbar-light bg-light">
            <li class="nav-item "><a href="vklad.php" class="nav-link text-black ">Vložení knihy</a></li>
            <li class="nav-item "><a href="prehled.php" class="nav-link text-black">Přehled knih</a></li>
            <li class="nav-item "><a href="vyhledavani.php" class="nav-link text-black active">Vyhledávání knih</a></li>
        </ul>
    </div>
    <div class="container">
        <h3 class="text-center mb-3 mt-3">Vyhledávání knih z databáze</h3>
        <form action="vyhledavani.php" method="post" class="col-3 stred">
            ISBN<input type="text" name="isbn_kod" class="form-control mb-2">
            Příjmení autora <input type="text" name="prijmeni_autora" class="form-control mb-2">
            Jméno autora <input type="text" name="jmeno_autora" class="form-control mb-2">
            Název knihy <input type="text" name="nazev_knihy" class="form-control mb-2">
            <input type="submit" name="submit" value="Odeslat" class="btn btn-outline-secondary"> <input type="reset" value="Vymazat" class="btn btn-outline-secondary">
        </form>
    </div>
    <div class="container">
        <?php
        if ($row = mysqli_fetch_assoc($result)) {

        ?>
            <h3 class="text-center mt-5">
                <?php echo $row['firstname'] . " " . $row['surname']; ?>
            </h3>
            <p class="lead text-center">
                <?php echo $row['book_title']; ?>
            </p>
            <?php echo $row['book_description']; ?>
            <br>
        <?php
        }
        ?>
    </div>
</body>
<?php
include "connection.php";

if (isset($_POST["submit"])) {
    $isbn = addslashes($_POST['isbn_kod']);
    $prijmeni = addslashes($_POST['prijmeni_autora']);
    $jmeno = addslashes($_POST['jmeno_autora']);
    $nazev = addslashes($_POST['nazev_knihy']);
};
$query = "SELECT * FROM knihy WHERE firstname='$jmeno' OR surname='$prijmeni' OR ISBN ='$isbn' OR book_title='$nazev'";
$result = mysqli_query($connection, $query);
?>

</html>