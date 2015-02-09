<!DOCTYPE HTML>
<html>
<head>
<title></title>
</head>
<body>
<?php
        /*Incoming Variables*/
        $sName = filter_input(INPUT_POST,'senderName');
        $sEmail = filter_input(INPUT_POST,'senderEmail');
        $sAddress = filter_input(INPUT_POST,'senderAddress');
        $sPhone = filter_input(INPUT_POST,'senderPhone');
        $signed = filter_input(INPUT_POST,'signed');
        /*Incoming Array*/
        $jewsD = filter_input(INPUT_POST,'jewsD',FILTER_DEFAULT,FILTER_REQUIRE_ARRAY);/*Domestic Array*/
        $jewsF = filter_input(INPUT_POST,'jewsF',FILTER_DEFAULT,FILTER_REQUIRE_ARRAY);/*Foreign Array*/
        $jews = array_merge($jewsD, $jewsF);/*Merged Domestic with Foreign*/
        sort($jews);/*Alphabetically sorted names as values*/
        $flippedJews = array_flip($jews); /*Switch names from values into keys*/
        
        /*Locally defined Variables*/
        $saranacEmail = 'A.Tapp.Creation@gmail.com';
        $balanceUS = count($jewsD);
        $balanceNonUS = count($jewsF);
        $balance = ($balanceUS*5.00)+($balanceNonUS*6.00);
        /*Locally defined Array*/
        
        $communityCSVd = file("../docs/jewsDomesticRemix.csv");/*Master US List*/
        foreach ($communityCSVd as $line) {
            $brokenLine = explode('|', $line);
            $community[$brokenLine[0]] = $brokenLine[1];
        }
        $communityCSVf = file("../docs/jewsForeignRemix.csv");/*Master NonUS List*/
        foreach ($communityCSVf as $line) {
            $brokenLine = explode('|', $line);
            $community[$brokenLine[0]] = $brokenLine[1];
        }
        ksort($community);
        $jewsWithAddresses = array_intersect_key($community, $flippedJews);
        
        /*Send Purim Card Order as an HTML email to sender and to Saranac*/
        $to = $sEmail;
        $subject = "Saranac Purim Card Order 5775";
        $headers = "From: ".$saranacEmail."\r\n";
        $headers .= "Reply-To: ".$saranacEmail."\r\n";
        $headers .= "BCC: ".$saranacEmail."\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $message = "<html><body><h1 style='text-align: center'>";
        $message .= $sName."<br>".$sAddress."<br>".$sPhone."<br>";
        $message .= "Saranac Purim Card Order List<br><small style='font-size:0.4em'>Courtesy Of: <u>A Tapp Creation</u> [716-939-1132]</small></h1><table style='margin: 0 auto'><caption style='text-align: right; font-size:1.25em'><em>Your total is $";
        $message .= $balance;
        $message .= "</em></caption><thead></thead><tbody><tr><td><dl>";
        foreach ($jewsWithAddresses as $name => $address) {
            $message .= "<dt>".$name."</dt><dd>".$address."</dd>";
        }
        $message .= "</dl></td></tr></tbody></table><h4>Your special message: ".$signed."</h4><h4 style='text-align: center'>Kindly make your check payable to<br><em>Saranac Synagogue Sisterhood</em><br>and send it to:<br><em>100 Delsan Ct., Buffalo, NY 14216</em><br>no later than March 6th, 2015.</h4></body></html>";
        mail($to, $subject, $message, $headers);
        
        print $message;
        ?>
</body>
</html>
