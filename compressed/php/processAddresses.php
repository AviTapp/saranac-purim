<!DOCTYPE HTML>
<html>
<head>
<title></title>
</head>
<body>
<?php
            $fileCSVd = file('../docs/jewsDomestic.csv');
            print_r($fileCSVd);
            print "<br>";
            foreach ($fileCSVd as $lineD) {
                $brLineD = explode('|', $lineD);
                print_r($brLineD);
                print "<br>";
                $nameD = $brLineD[0].', '.$brLineD[2].' '.$brLineD[1];
                print_r($nameD);
                print "<br>";
                $addressD = $brLineD[3].', '.$brLineD[4].', '.$brLineD[5].' '.$brLineD[6];
                print_r($addressD);
                print "<br>";
                $completeJewD .= "$nameD | $addressD\n";
            }
            print_r($completeJewD);
            file_put_contents('../docs/jewsDomesticRemix.csv', $completeJewD);
            /*==========================================================*/
            $fileCSVf = file('../docs/jewsForeign.csv');
            print_r($fileCSVf);
            print "<br>";
            foreach ($fileCSVf as $lineF) {
                $brLineF = explode('|', $lineF);
                print_r($brLineF);
                print "<br>";
                $nameF = $brLineF[0].', '.$brLineF[2].' '.$brLineF[1];
                print_r($nameF);
                print "<br>";
                $addressF = $brLineF[3].', '.$brLineF[4].', '.$brLineF[5].' '.$brLineF[6];
                print_r($addressF);
                print "<br>";
                $completeJewF .= "$nameF | $addressF\n";
            }
            print_r($completeJewF);
            file_put_contents('../docs/jewsForeignRemix.csv', $completeJewF);
        ?>
</body>
</html>
