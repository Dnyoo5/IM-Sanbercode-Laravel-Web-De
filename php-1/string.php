<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String PHP</title>
</head>
<body>
    <h1>Berlatih String PHP</h1>

    <?php   
        echo "<h3> Soal No 1</h3>";
        /*
            SOAL NO 1
            Menampilkan panjang dan jumlah kata dari string.
        */
        $first_sentence = "Hello PHP!"; // Panjang string 10, jumlah kata: 2
        $second_sentence = "I'm ready for the challenges"; // Panjang string: 28, jumlah kata: 5

        echo "Kalimat pertama: \"$first_sentence\"<br>";
        echo "Panjang string: " . strlen($first_sentence) . "<br>";
        echo "Jumlah kata: " . str_word_count($first_sentence) . "<br><br>";

        echo "Kalimat kedua: \"$second_sentence\"<br>";
        echo "Panjang string: " . strlen($second_sentence) . "<br>";
        echo "Jumlah kata: " . str_word_count($second_sentence) . "<br>";

        echo "<h3> Soal No 2</h3>";
        /*
            SOAL NO 2
            Mengambil kata dari string.
        */
        $string2 = "I love PHP";

        echo "<label>String: </label> \"$string2\" <br>";
        $words = explode(" ", $string2);
        echo "Kata pertama: " . $words[0] . "<br>";
        echo "Kata kedua: " . $words[1] . "<br>";
        echo "Kata ketiga: " . $words[2] . "<br>";

        echo "<h3> Soal No 3 </h3>";
        /*
            SOAL NO 3
            Mengubah kata pada string.
        */
        $string3 = "PHP is old but sexy!";
        echo "String sebelum: \"$string3\"<br>"; 
        $new_string = str_replace("old", "new", $string3);
        $new_string = str_replace("sexy", "awesome", $new_string);
        echo "String sesudah: \"$new_string\"";
    ?>

</body>
</html>
