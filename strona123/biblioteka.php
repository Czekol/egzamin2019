<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka publiczna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 <div class="baner"><h2>Miejska biblioteka publiczna </h2></div>

<div class="container">

<div class="lewy"><h2>Dodaj czytelnika</h2> 
    <form action="" method="post">
        imie: <input type="text" name="imie" id="">
        <br>
        nazwisko: <input type="text" name="nazwisko" id="">
        <br>
        rok urodzenia <input type="number" name="rok_urodzenia" id="">
        <br>
        <input type="submit" value="dodaj">
    </form>
<!-- skrypt1 -->

<?php 

if(empty($_POST['imie']) || empty($_POST['nazwisko']) || empty($_POST['rok_urodzenia']) ) {

    echo "uzupelnij wszystkie pola" ;

} else {
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $rok_urodzenia = $_POST['rok_urodzenia'];

    $con = mysqli_connect('localhost', 'root', '', 'bibliotekaa') or die ("blad polozenia") ;

    $pyt = mysqli_query($con, "INSERT INTO `czytelnicy`(`imie`, `nazwisko`) VALUES ('$imie','$nazwisko')");

    if($pyt) {
        echo "czytelnik $imie $nazwisko zostal dodany do bazy danych";
    } else { 
        echo "cos poszlo nie tak" ; 
    }

    mysqli_close($con);
}

?>



</div>

 <div class="srodkowy">
    <img src="materialy4/biblioteka.png" alt="">
    <h4>ul. Czytelnicza 25 12-120 Książkowice tel.: 123123123 e-mail: biuro@bib.pl</h4>
</div>

 <div class="prawy">
    <h3>Nasi czytelnicy</h3>
    <ul>


    <?php 


    $con = mysqli_connect('localhost', 'root', '', 'bibliotekaa') or die ("blad polozenia") ;

    $pyt = mysqli_query($con, "SELECT  `imie`, `nazwisko` FROM `czytelnicy` ");

    
    while($odp = mysqli_fetch_array($pyt)) {
        echo "<li>$odp[0] $odp[1]</li>";
    }

    mysqli_close($con);


?>

    </ul>
 </div>

</div>

 
 <div class="stopka"><p>Projekt witryny</p>123413</div>
</body>
</html>