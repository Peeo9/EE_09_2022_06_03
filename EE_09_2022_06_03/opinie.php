<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opinie klientów</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <section class="banner">
        <h2>Hurtownia spożywcza</h2>
    </section>
    <main>
        <h2>Opinie naszych klientów</h2>
        <?php
        $polaczenie=mysqli_connect('localhost','root','','hurtownia');
        $zapytanie3="SELECT zdjecie,imie,opinia FROM klienci, opinie, Typy WHERE klienci.id=opinie.id AND klienci.Typy_id=Typy.id AND typy.id IN (2,3)";
        $wynik=mysqli_query($polaczenie,$zapytanie3);
        while($wiersz=mysqli_fetch_array($wynik)){
            echo "<section class='opinie'>";
            echo "<img src='".$wiersz['zdjecie']."' alt='klient'>";
            echo "<blockquote>".$wiersz['opinia'],"</blockquote>";
            echo "<h4>".$wiersz['imie']."</h4>";
            echo "</section>";
        }
        mysqli_close($polaczenie);

        ?>
    </main>
    <footer class="stopka1">
        <h3>Współpracują z nami</h3>
        <a href="http://sklep.pl">Sklep 1</a>
    </footer>
    <footer class="stopka2">
        <h3>Nasi top klienci</h3>
        <ol>
        <?php
        $polaczenie=mysqli_connect('localhost','root','','hurtownia');
        $zapytanie1="SELECT imie, nazwisko, punkty FROM Klienci ORDER BY punkty DESC LIMIT 3";
        $wynik=mysqli_query($polaczenie,$zapytanie1);
        while($wiersz=mysqli_fetch_array($wynik)){
            echo "<li>".$wiersz['imie']." ".$wiersz['nazwisko']." ".$wiersz['punkty']."</li>";
        }
        mysqli_close($polaczenie);
        ?>
        </ol>
    </footer>
    <footer class="stopka3">
        <h3>Skontakuj się</h3>
        <p>telefon: 111222333</p>
    </footer>
    <footer class="stopka4">
        <h3>Autor: ŁK</h3>
    </footer>
</body>
</html>