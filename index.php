<!DOCTYPE html>

<html>
    <head>
        <title>Saranac Purim Cards</title>
        <link rel="stylesheet" href="css/stylesheet.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    </head>

    <body>
        <form class="container_12" action="php/placeOrder.php" method="post">
            <fieldset class="grid_12">
                <legend><h1>Purim Greeting Order Form</h1></legend>
                <hr>
                <div class="grid_6"><label>Name of Sender: </label><br><input name="senderName"></div>
                <div class="grid_6"><label>Email: </label><br><input name="senderEmail"></div>
                <div class="grid_6"><label>Address: </label><br><input name="senderAddress"></div>
                <div class="grid_6"><label>Phone: </label><br><input name="senderPhone"></div>
                <hr>
                <p>Please check the names of the families to whom you wish to send a personalized Purim Greeting card. If you wish to add any additional families, contact us by email.</p>
        <?php
            $community = array();
            $community["Abramowitz, Mr./Mrs. Phil"] = "177 The Paddock, Williamsville, NY 14221";
            $community["Alt, Dr./Mrs. Allen"] = "10 Avon Rd., Binghamton, NY 13905";
            $community["Alt, Mr./Mrs. Robert"] = "281 Middlesex Rd., Buffalo, NY 14216";
            foreach($community as $name => $address){
                print '<input type="checkbox" name="jews[]" value="'.$name.'" /> '.$name.'<br>';
            }
        ?>
                <hr>
                <div class="grid_3"><label>Number of names checked: </label><br><input id="qty" value=0 readonly></div>
                <div class="grid_3"><label>($5) Within The US</label><br><input id="costUS" readonly></div>
                <div class="grid_3"><label>($6) Outside The US</label><br><input id="costNonUS" readonly></div>
                <div class="grid_3"><label>TOTAL</label><br><input id="costTotal" readonly></div>
                <hr>
                <div class="grid_9"><label>How would you like the cards signed? </label><input name="signed"></div>
                <div class="grid_3"><button type="submit">SUBMIT</button></div>
                <hr>
                <div class="grid_12">
                    <ul id="hFamilies"></ul>
                </div>
            </fieldset>
        </form>
        <script src="js/main.js"></script>
    </body>
</html>