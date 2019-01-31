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
                    // echo $line . "<br><hr>";
                    $data = str_getcsv($line);
                    if($x==0){
                        // foreach($data as $header){
                        //     array_push($headers, $header);
                        // }
                        $headers = $data;
                    }else {
                        echo "<p>Cause Name: ".$data[array_search('Cause Name', $headers)]."</p>";
                        echo "<p>Donation Date: ".$data[array_search('Donation Date', $headers)]."</p>";
                        echo "<p>Donation Ammount: ".$data[array_search('Donation Ammount', $headers)]."</p>";
                        echo "<p>Transaction ID: ".$data[array_search('Transaction Id', $headers)]."</p>";
                    }
                    // print_r(array_keys($data));
                    // print_r($line);
                    // print_r($data);

                    echo "<hr>";
                    $x++;
                }
                print_r($headers);
                // print_r($data);
                // for($i=1;$i<count($data);$i++){
                //     // For every for in csv (excluding first row - headers)
                //     print_r($data[$i]);
                //     echo "<hr>";
                // }
                // // echo "hello";
            }
            // echo "world";
        ?>
    </body>
</html>

<!-- 
    [1] => Cause Name
    [5] => Donation Date
    [9] => Donation Ammount
    [12] => Trasaction ID
 -->