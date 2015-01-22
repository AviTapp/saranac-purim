<!DOCTYPE html>

<html>
    <head>
        <title>Saranac Purim Cards</title>
        <link rel="stylesheet" href="css/stylesheet.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    </head>

    <body>
        <article class="container_12">
            <fieldset class="grid_12">
                <legend><h1>Purim Greeting Order Form</h1></legend>
                <hr>
                <div class="grid_6"><label>Name of Sender: </label><br><input></div>
                <div class="grid_6"><label>Email Address: </label><br><input></div>
                <div class="grid_6"><label>Address: </label><br><input></div>
                <div class="grid_6"><label>Phone: </label><br><input></div>
                <hr>
                <p>Please check the names of the families to whom you wish to send a personalized Purim Greeting card. Feel free to add any additional names and addresses. Kindly make your check payable to Saranac Synagogue Sisterhood and send it to 100 Delsan Ct., Buffalo, NY 14216 no later than March 6th, 2015.</p>
        <?php
            $community = array();
            $community["Abramowitz, Mr./Mrs. Phil"] = "177 The Paddock, Williamsville, NY 14221";
            $community["Alt, Dr./Mrs. Allen"] = "10 Avon Rd., Binghamton, NY 13905";
            $community["Alt, Mr./Mrs. Robert"] = "281 Middlesex Rd., Buffalo, NY 14216";
            foreach($community as $name => $address){
                print '<input type="checkbox" name="family" value="'.$name.'" /> '.$name.'<br>';
            }
        ?>
                <hr>
                <div class="grid_3"><label>Number of names checked: </label><br><input id="qty" value=0 readonly></div>
                <div class="grid_3"><label>($5) Within The US</label><br><input id="costUS" readonly></div>
                <div class="grid_3"><label>($6) Outside The US</label><br><input id="costNonUS" readonly></div>
                <div class="grid_3"><label>TOTAL</label><br><input id="costTotal" readonly></div>
                <hr>
                <div class="grid_9"><label>How would you like the cards signed? </label><input></div>
                <div class="grid_3"><button type="submit">SUBMIT</button></div>
                <hr>
                <div class="grid_12">
                    <ul id="hFamilies"></ul>
                </div>
            </fieldset>
        </article>
        <script src="js/main.js"></script>
    </body>
</html>