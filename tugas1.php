<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h3>INPUT DATA BELANJA</h3>
    <form action="" method = "POST">
        <div class="input">
            <label for="ltotalbelanja">Total belanja</label>
            <input type="number" name="totalbelanja" id = "ltotalbelanja"  required min = "0">
        </div>
        <div class="member">
        <label for="lmember">ID Member (Tidak wajib diisi jika bukan member)</label>
        <input type="text" name="member" id="lmember" placeholder="Masukkan ID member jika ada">
        </div>
        <div class="submit">
            <input type="submit" value="Submit">
        </div>
    </form>
    
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $totalbelanja = $_POST["totalbelanja"];
        $member = $_POST["member"];
        $idmember = array ("IDN01","IDN02","IDN03"); //pelanggan member
        $statmember = false;
        foreach ($idmember as $cekmember) {
            if ($member === $cekmember) {
                $statmember = true;
                break;
            }
        }
        $diskon = 0.0;
        function diskonbelanja(){
            $diskon = 0.0;
            return $diskon += 0.10;
        }
            if ($statmember) {
                echo "<p class='tampil'>Member mendapatkan diskon 10%</p>";
                $diskon = 0.10;
                if ($totalbelanja >= 500000) {
                    echo "<p class = 'tampil'>Total belanja lebih dari atau sama dengan Rp500.000, mendapatkan diskon 10%.</p>";    
                    $diskon += diskonbelanja();              // Diskon 10% jika belanja >= Rp500.000
                } elseif ($totalbelanja >= 300000) {
                    echo "<p class='tampil'>Total belanja lebih dari atau sama dengan Rp300.000, mendapatkan diskon 5%.</p>";
                    $diskon += 0.05;                   // Diskon 5% jika belanja >= Rp300.000
                }

                $totaldiskon = $totalbelanja * $diskon;
                $totalbelanjaakhir = $totalbelanja - $totaldiskon;

                echo "<div class='hasil'>";
                echo "<p>Total belanja  : <span class='tampil'>Rp" . $totalbelanja . "</span></p>";
                echo "<p>Total diskon   : <span class='tampil'>Rp" . $totaldiskon. "</span></p>";
                echo "<p>Total bayar    : <span class='tampil'>Rp" . $totalbelanjaakhir . "</span></p>";
                echo "</div>";
            }

            else{
                if($totalbelanja >= 500000) {
                    echo "<p class='tampil'>Pembelian lebih dari Rp. 500.000 mendapat potongan 10%</p>";  
                    $diskon += diskonbelanja();                 // Diskon 10% jika belanja >= Rp500.000
                }
                $totaldiskon = $totalbelanja * $diskon;
                $totalbelanjaakhir = $totalbelanja - $totaldiskon;
                echo "<div class='hasil'>";
                echo "<p>Total belanja  : <span class='tampil'>Rp" . $totalbelanja. "</span></p>";
                echo "<p>Total diskon   : <span class='tampil'>Rp" . $totaldiskon. "</span></p>";
                echo "<p>Total bayar    : <span class='tampil'>Rp" . $totalbelanjaakhir. "</span></p>";
                echo "</div>";
            }
    }
    
    ?>
</body> 
</html>