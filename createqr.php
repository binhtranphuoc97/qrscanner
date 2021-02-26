<?php
    include('./library/php_qr_code/qrlib.php'); // Include a library for PHP QR code

    if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){

        //its a location where generated QR code can be stored.
        $qr_code_file_path = dirname(__FILE__).DIRECTORY_SEPARATOR.'qr_assets'.DIRECTORY_SEPARATOR;
        $set_qr_code_path = 'qr_assets/';

        // If directory is not created, the create a new directory
        if(!file_exists($qr_code_file_path)){
            mkdir($qr_code_file_path);
        }

        //Set a file name of each generated QR code
        $filename = $qr_code_file_path.time().'.png';

        /* All the user generated data must be sanitize before the processing */
        $errorCorrectionLevel = "L";

        $matrixPointSize = "5";

        $frm_link = $_REQUEST['frm_qr'];
        $email_qr = $_REQUEST['email_qr'];

        $data = $frm_link. "" . $email_qr;
        $framePointSize = 2;
        // After getting all the data, now pass all the value to generate QR code.
        QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, $framePointSize);
    }
?>