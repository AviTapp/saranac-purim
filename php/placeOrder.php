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
        $jews = filter_input(INPUT_POST,'jews'); /*Selected addresses as values*/
        $flippedJews = array_flip($jews); /*Switch names from values into keys*/
        
        /*Locally defined Variables*/
        $saranacEmail = 'A.Tapp.Creation@gmail.com';
        $N = count($flippedJews);
        $balance = $N*5;
        /*Locally defined Array*/
        $community = array(); /*Master List of Addresses*/
        $community["Abramowitz, Mr./Mrs. Phil"] = "177 The Paddock, Williamsville, NY 14221";
        $community["Alt, Dr./Mrs. Allen"] = "10 Avon Rd., Binghamton, NY 13905";
        $community["Alt, Mr./Mrs. Robert"] = "281 Middlesex Rd., Buffalo, NY 14216";
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
            $message .= "<dt>".$name."</dt><dd style='font-size: 50%'>".$address."</dd>";
        }
        $message .= "</dl></td></tr></tbody></table><h4 style='text-align: center'>Kindly make your check payable to<br><em>Saranac Synagogue Sisterhood</em><br>and send it to:<br><em>100 Delsan Ct., Buffalo, NY 14216</em><br>no later than March 6th, 2015.</h4></body></html>";
        mail($to, $subject, $message, $headers);
        
        ?>
    </body>
</html>