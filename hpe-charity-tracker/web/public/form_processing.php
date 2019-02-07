<html>
<head>
		<title>Thank You!</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/local.css" />
        
	</head>
    <body>
        <section id="banner">
				<div class="inner">
                    <h1 class="thanks">Thank You <?php echo $_POST["first_name"];?>!</h1>
                    <br />
                    <h3 class="thanks" id="taking-part">Taking part in volunteering is a great thing to do.</h3>
                    <h4 class="thanks" id="smaller">If you are not redirected in 5 seconds, please click the button below.</h3>
                    <footer>
						<a id="log-hours" class="button" href="graph.html" >See Progress</a>
					</footer>
                </div>	
		</section>
        <?php 
            if(isset($_POST["submit"])) {
                
                // Establish database connection
                $servername = "16.24.174.238:8989";
                $username = "root";
                $password = "root";
                $dbname = "Charity";
                
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 

                // Handle users:
                $emailgiven = $_POST["email"];
                $sql = "SELECT ID FROM User WHERE email='$emailgiven'";
                $result = $conn->query($sql);
        
                $id = $result->fetch_assoc();
                $id = $id["ID"];

                if ($result->num_rows == 0) {
                    $firstname = $_POST["first_name"];
                    $lastname = $_POST["last_name"];
                    $sql = "INSERT INTO User (firstname, lastname, email)
                    VALUES ('$firstname' , '$lastname' , '$emailgiven' )";


                    if ($conn->query($sql) === FALSE) {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } 

                
                


                // TODO: Check if type is csv
                $csvFile = $_FILES["don_file"];
                $file = file($csvFile["tmp_name"]);
                $filename = $csvFile['name'];
                $fileExt = pathinfo($filename, PATHINFO_EXTENSION);
                // $fileType = $csvFile["type"];


                $sql = "SELECT ID FROM User WHERE email='$emailgiven'";
                $result = $conn->query($sql);
        
                $id = $result->fetch_assoc();
                $id = $id["ID"];


                $d_counter = 0;
                if($fileExt == "csv"){
                    $x = 0;
                    $headers = [];
                    foreach($file as $line) {
                        $data = str_getcsv($line);
                        if($x==0){
                            $headers = $data;
                        }else {

                            $cause_name = $data[array_search('Cause Name', $headers)];
                            $donation_date = $data[array_search('Donation Date', $headers)];
                            $donation_amount = $data[array_search('Donation Amount', $headers)];
                            $donation_amount = trim($donation_amount, '£');
                            $transaction_id = $data[array_search('Transaction Id', $headers)];

                            $duplicate = mysqli_query($conn, "SELECT * from Donation where trans_id='$transaction_id' ");
                            if (mysqli_num_rows($duplicate) == 0) {
                                $sql = "INSERT into Donation (date, amount, trans_id, user_id)
                                VALUES ('$donation_date', '$donation_amount', '$transaction_id', '$id') ";

                                if ($conn->query($sql) === FALSE) {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                                else {
                                    $d_counter++;
                                }
                            }
                        }
                        // echo "<hr>"; //TODO: Remove
                        $x++;
                    }
                } else {
                    echo "<script>alert('Invalid file type: $fileExt');</script>";
                }
                $csvFile = $_FILES["vol_file"];
                $file = file($csvFile["tmp_name"]);
                $filename = $csvFile['name'];
                $fileExt = pathinfo($filename, PATHINFO_EXTENSION);
                $counter = 0;
                if($fileExt == "csv"){
                    $x = 0;
                    $headers = [];
                    foreach($file as $line) {
                        $data = str_getcsv($line);
                        if($x==0){
                            $headers = $data;
                        }else {
                            
                            $name = $data[array_search('Activity', $headers)];
                            $name = trim($name, '\'');
                            $event_date = str_replace('/','-',$data[array_search('Event Date', $headers)]);
                            $approved_date = str_replace('/','-',$data[array_search('Approved Date', $headers)]);
                            $hours = $data[array_search('Hours', $headers)];
                            $reward = $data[array_search('Reward', $headers)];
                            $reward = trim($reward, '£');
                            $reward = trim($reward, ' Donation Currency');

                            $uniqID = $name . $event_date . $approved_date . $hours;
                            $hashed = password_hash('$uniqID', PASSWORD_BCRYPT );

                            $duplicate = mysqli_query($conn, "SELECT * from Volunteer where identifier='$uniqID'");
                            
                            if (mysqli_num_rows($duplicate) == 0){
                                $check == FALSE;
                            } else {
                                
                                $storedhash = $duplicate->fetch_assoc() or die($conn->error);
                                $storedhash = $storedhash["identifier"];
                                $check = password_verify('$uniqID', '$storedhash'); 
                            }

                            if ($check == FALSE ) {

                                $sql = "INSERT into Volunteer (name, e_date, a_date, hours, reward, user_id, identifier)
                                VALUES ('$name', '$event_date', '$approved_date', '$hours', '$reward', '$id', '$hashed')";

                                if ($conn->query($sql) === FALSE) {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                } else {
                                    $counter++;
                                }
                            }
                        }
                        // echo "<hr>"; //TODO: Remove
                        $x++;
                    }
                } else {
                    echo "<script>alert('Invalid file type: $fileExt');</script>";
                }
                echo "<script>alert('$counter new volunteer entries & $d_counter new donation entries')</script>";
            }
            // echo "<h4>PHP email test</h4>";
            // $to = "lewis-scott.smith@hpe.com";
            // $subject = "Intern Charity site test email";
            // $txt = "Hello World2!";
            // $headers = "From: lewis-scott.smith@hpe.com" . "\r\n" .
            // "CC: lewis-scott.smith@hpe.com";

            // mail($to,$subject,$txt,$headers);
        ?>
        <!-- <script src="assets/js/jquery.min.js"></script> -->
        <!-- <script>
			// $(document).ready(function () {
			// 	// Handler for .ready() called.
			// 	window.setTimeout(function () {
			// 		location.href = "graph.html";
			// 	}, 5000);
            // });
            
        //     function debug_to_console( $data ) {
        //     $output = $data;
        //     if ( is_array( $output ) )
        //         $output = implode( ',', $output);

        //     echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";

        //     // Used like this:
        //     debug_to_console( "Test" );
        // }
		</script> -->
    </body>
</html>
