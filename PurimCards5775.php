<!DOCTYPE html><html><head><title>Saranac Purim Cards</title><link rel=stylesheet href=css/stylesheet.css><script src=https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js></script><meta charset=UTF-8><meta name=viewport content="width=device-width, initial-scale=1"></head><body><form class=container_12 action=php/placeOrder.php method=post><fieldset class=grid_12><legend><h1>Purim Greeting Order Form</h1></legend><hr><fieldset class=info><p><em>IT IS EXTREMELY IMPORTANT THAT YOU FILL THIS INFORMATION OUT.<br>If we have any questions about your order, we will need to contact you.</em></p><div><label>Name of Sender: </label><input name=senderName type=text></div><div><label>Email: </label><input name=senderEmail type=email></div><div><label>Address: </label><input name=senderAddress type=text></div><div><label>Phone: </label><input name=senderPhone type=tel></div></fieldset><hr><h2 style=text-align:center>U.S. Addresses ($5)</h2><div class="push_1 grid_10 list"><?php
            $communityD = array();
            $communityCSVd = file("docs/jewsDomesticRemix.csv");
            foreach ($communityCSVd as $lineD) {
                $brokenLineD = explode('|', $lineD);
                $communityD[$brokenLineD[0]] = $brokenLineD[1];
}
            foreach($communityD as $nameD => $addressD){
                print '<input type="checkbox" name="jewsD[]" value="'.$nameD.'" /> '.$nameD.'<br>';
            }
        ?></div><hr><h2 style=text-align:center>Non-U.S. Addresses ($6)</h2><div class="push_1 grid_10 list"><?php
            $communityF = array();
            $communityCSVf = file("docs/jewsForeignRemix.csv");
            foreach ($communityCSVf as $lineF) {
                $brokenLineF = explode('|', $lineF);
                $communityF[$brokenLineF[0]] = $brokenLineF[1];
}
            foreach($communityF as $nameF => $addressF){
                print '<input type="checkbox" name="jewsF[]" value="'.$nameF.'" /> '.$nameF.'<br>';
            }
        ?></div><hr><fieldset class=moreInfo><p></p><p>Please check the names of the families to whom you wish to send a personalized Purim Greeting card.</p><p class=emphasis>If you wish to add any additional families, contact us by email at "A.Tapp.Creation@Gmail.com"</p><p>If you do not see totals auto updating as you check boxes above, then you have Javascript turned off.<br>Please email us so we can help you.<br>Thank you.</p></fieldset><hr><fieldset class=summary><div><label>Number of names checked:</label><input id=qty value=0 readonly></div><div><label>($5) Within The US</label><input id=qtyUS value=0 readonly></div><div><label>($6) Outside The US</label><input id=qtyNonUS value=0 readonly></div><div><label>TOTAL</label><input id=costTotal readonly required></div></fieldset><hr><div class=grid_9><label>How would you like the cards signed? </label><input name=signed></div><div class=grid_3><button type=submit>SUBMIT</button></div><hr><div class=grid_12><ul id=hFamilies></ul></div></fieldset></form><script src=js/main.js></script></body></html>