<html>
    <body>
        <!-- Hello <?php echo $_POST["name"];?> -->
        <?php 
            if(isset($_POST["submit"])) {
                // TODO: Check if type is csv
                $csvFile = $_FILES["fileToUpload"];
                $file = file($csvFile["tmp_name"]);
                $x = 0;
                $headers = [];
                foreach($file as $line) {
                    $data = str_getcsv($line);
                    if($x==0){
                        $headers = $data;
                    }else {
                        echo "<p>Cause Name: ".$data[array_search('Cause Name', $headers)]."</p>";
                        echo "<p>Donation Date: ".$data[array_search('Donation Date', $headers)]."</p>";
                        echo "<p>Donation Ammount: ".$data[array_search('Donation Amount', $headers)]."</p>";
                        echo "<p>Transaction ID: ".$data[array_search('Transaction Id', $headers)]."</p>";
                    }
                    echo "<hr>"; //TODO: Remove
                    $x++;
                }
                print_r($headers);
            }
        ?>
    </body>
</html>

<!-- 
    [1] => Cause Name
    [5] => Donation Date
    [9] => Donation Ammount
    [12] => Trasaction ID
 -->