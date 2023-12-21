<?php

         $serverKey = 'rahul@76R0Xsjdn6g4USLvyXzuKw==';
        $url = 'https://103.109.224.64:4443/cashProBOA/api/payments/initiate';
        $data = ["TransactionCreationRequest"=> 
        [
        "uniqueRequestId"=> "H2H_44k184_180",
        "corporateCode"=> "U09121698",
        "corporateProductCode"=> "PTransactionwise",
        "transactionDetails"=> [
           
                "paymentMethodName"=> "NEFT",
                "debitAccountNumber"=> "0150050007238",
                "paymentAmount"=> "50.00",
                "bicCode"=> "SBIN0006608",
                "payableCurrency"=> "INR",
                "beneAccNo"=> "1503000109062904",
                "beneName"=> "AnujAWasthi",
                "paymentInstruction1"=> "NEFT02",
                "executionDate" => "09-May-22"
                
           
        ]]
        ];
        $encodedData = json_encode($data);
       
        $headers = [
            'Authorization:'.$serverKey,
            'Content-Type: application/json',
        ];
         

        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER,array(
            'Authorization: rahul@76R0Xsjdn6g4USLvyXzuKw==',
            'Content-Type: application/json',
         ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temresultporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        $output = curl_exec($ch);
        $info = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // Execute post
       
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }    
        else{
            return '[' . $info . ']' . $output;
        }    
        // Close connection
        curl_close($ch); 
        
        ?>
