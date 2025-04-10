<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>कार रेंटल बुकिंग इनवॉयस</title> -->
    <style>
       body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-color: #f4f4f4;
}

.container-p {
    width: 95%;
    background-color: white;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 0; /* Adjust this margin */
    border:3px solid #000;
    margin:0 auto;
}

h1, h2, h3, h4, h5, h6, p {
    margin: 2px 0 !important; /* Ensure no margin between elements */
}

.header {
    text-align: center;
    margin-bottom: 10px;
}

.header h1 {
    margin: 0;
}

.header p {
    margin: 5px 0;
}

.invoice-details,
.customer-details,
.booking-details,
.payment-instructions {
    margin: 0; /* Remove any margin */
}

.invoice-details table,
.customer-details table,
.booking-details table,
.payment-instructions table {
    width: 100%;
    border-collapse: collapse; /* Avoid spacing between cells */
    margin: 0; /* Remove margin around the table */
    padding: 0; /* Remove table padding */
}

.invoice-details table th,
.customer-details table th,
.booking-details table th,
.payment-instructions table th {
    background-color: #f2f2f2;
    padding: 8px;
    text-align: left;
        }

.invoice-details table td,
.customer-details table td,
.booking-details table td,
.payment-instructions table td {
    padding: 8px;
}

.footer {
    text-align: center;
    font-size: 14px;
    margin-top: 10px;
        }

.footer p {
    margin: 5px 0;
}
table{
    border:0;
}
table td, th{
    border:0;
    text-align:left;
        }
       
    </style>
</head>
<body>
<?php
 function dateformate($doy){
$formattedDate = date('j F Y', strtotime($doy));
$monthsInHindi = [
    'January' => 'जनवरी',
    'February' => 'फ़रवरी',
    'March' => 'मार्च',
    'April' => 'अप्रैल',
    'May' => 'मई',
    'June' => 'जून',
    'July' => 'जुलाई',
    'August' => 'अगस्त',
    'September' => 'सितंबर',
    'October' => 'अक्टूबर',
    'November' => 'नवंबर',
    'December' => 'दिसंबर'
];

// Replace English month with Hindi month
$englishMonth = date('F', strtotime($doy));

// Check if the English month exists in the Hindi mapping
if (isset($monthsInHindi[$englishMonth])) {
    // Replace the English month with the corresponding Hindi month
    $formattedDate = str_replace($englishMonth, $monthsInHindi[$englishMonth], $formattedDate);
}

return $formattedDate;} 
$date = $data['dateOfJourney'] ?? date('Y-m-d');


?>
<div class="container-p">
    <h1 style="text-align:center">कार रेंटल बुकिंग इनवॉयस</h1>
    
    <table class="invoice-header" border="1" cellpadding="10" cellspacing="0" style="width: 100%; margin-bottom: 0px;">
        <tr>
            <th colspan="6" style="width: 50%;">इनवॉयस नंबर (Invoice No)</th>
            <td colspan="6" style="width: 50%;">AAA08</td>
        </tr>
        <tr>
            <th colspan="6" style="width: 50%;">जारी करने की तिथि (Date of Issue)</th>
            <td colspan="6" style="width: 50%;"><?=dateformate(date('Y-m-d'));?></td>
        </tr>
    </table>
    
    <h3>ग्राहक विवरण</h3>
<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; margin-bottom: 0px;">
    <tr>
        <!-- Left Column -->
        <th style="width: 50%;">नाम (Name)</th>
        <td style="width: 50%;"><?= $data['name'] ?></td>
    </tr>
    <tr>
        <th style="width: 50%;">स्रोत (Source)</th>
        <td style="width: 50%;"><?= $data['source'] ?></td>
    </tr>
    <tr>
        <th style="width: 50%;">गंतव्य (Destination)</th>
        <td style="width: 50%;"><?= $data['destination'] ?></td>
    </tr>
    <tr>
        <th style="width: 50%;">यात्रा तिथि (Date of Journey) </th>
        <td style="width: 50%;"><?= dateformate($date); ?></td>
    </tr>
</table>
    
<h3>बुकिंग विवरण</h3>
<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; margin-bottom: 0px;">
    <tr>
        <!-- Left Column -->
        <th style="width: 50%;">स्रोत पर आगमन का समय</th>
        <td style="width: 50%;">4:00 PM</td>
    </tr>
    <tr>
        <th style="width: 50%;">गंतव्य से प्रस्थान का समय</th>
        <td style="width: 50%;">7:00 AM</td>
    </tr>
    <tr>
        <th style="width: 50%;">कुल राशि</th>
        <td style="width: 50%;">₹<?= $data['totalAmount'] ?></td>
    </tr>
    <tr>
        <th style="width: 50%;">भुगतान किया गया</th>
        <td style="width: 50%;">₹<?= $data['paidAmount'] ?></td>
    </tr>
    <tr>
        <th style="width: 50%;">बकाया राशि</th>
        <td style="width: 50%;">₹<?= $data['duesAmount'] ?></td>
    </tr>
</table>


    <h3>भुगतान निर्देश</h3>
    <table class="payment-instructions" border="1" cellpadding="10" cellspacing="0" style="width: 100%; margin-bottom: 0px;">
        <tr>
            <td colspan="12">
                <p>कृपया ₹<?= $data['duesAmount'] ?> की शेष राशि शीघ्र भुगतान करें। हमारे सेवा का चयन करने के लिए धन्यवाद!</p>
            </td>
        </tr>
    </table>
    
    <h3>प्राधिकृत हस्ताक्षर</h3>
    <table class="footer" border="1" cellpadding="10" cellspacing="0" style="width: 100%; margin-bottom: 0px;">
        <tr>
            <th colspan="6"  width="50%">प्राधिकृत हस्ताक्षर</th>
            <td colspan="6"  width="50%">आविनाश कुमार</td>
        </tr>
        <tr>
            <th colspan="6"  width="50%">ग्राम+पोस्ट</th>
            <td colspan="6"  width="50%">चंद्रगढ़, थाना: नबीनगर, जिला: औरंगाबाद, राज्य: बिहार</td>
        </tr>
        <tr>
            <th colspan="6"  width="50%">मोबाइल नंबर</th>
            <td colspan="6"  width="50%">7543888698</td>
        </tr>
        <tr>
            <th colspan="6" width="50%">ईमेल</th>
            <td colspan="6"  width="50%"><a href="mailto:avinash10081997@gmail.com">avinash10081997@gmail.com</a></td>
        </tr>
    </table>
    
    <h3>किसी भी असुविधा के लिए माफी</h3>
    <table class="footer" border="1" cellpadding="10" cellspacing="0" style="width: 100%; margin-bottom: 0px;">
        <tr>
            <td colspan="12">
                <p>प्रिय ग्राहक, हम आपके कार बुकिंग अनुभव में हुई किसी भी असुविधा के लिए गहरी खेद व्यक्त करते हैं। इस दुर्लभ स्थिति में, हम स्वीकार करते हैं कि यह स्थिति आपकी अपेक्षाओं पर खरी नहीं उतरी। एक अच्छे इरादे के तहत और आपको बेहतरीन सेवा प्रदान करने के लिए, हम आपको "आसमानी सुलतानि माफ करते हैं। हम आपके धैर्य और समझ के लिए आभारी हैं और इस मामले को जल्दी से सुलझाने के लिए प्रतिबद्ध हैं।</p>
            </td>
        </tr>
    </table>
</div>

</body>
</html>
