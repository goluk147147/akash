<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journey Details Form</title>
    <!-- Include Bootstrap CSS for grid system -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Include Toastify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Toastify JS -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <style>
        /* Container and form styling */
        .container {
          /*   margin-top: 50px; Adds space from the top of the page */
            background-size: cover;
            background-position: center;
            padding: 50px 0; /* Adds padding for the form */
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin :auto;
        }
        .bgi{ background-image: url("<?=base_url("assets/images/logout.png")?>"); /* Replace with your car image URL */    }

        .form-container {
            max-width: 600px;
            margin: auto;
            background-color: rgba(255, 255, 255, 0.8); /* Transparent background for readability */
            padding: 30px;
            border-radius: 10px;
        }

        /* Button with col-6 */
        .btn-col-6 {
         /*    width: 50%; Full width */
            padding: 10px 30px;
            background-color: #007bff; /* Primary color */
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }


        .btn-col-6:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }

        /* Toastify Positioning */
        .toastify-top-right {
            z-index: 9999;
        }
        .form-group label:before{
            display: none;
        }
    </style>
</head>
<body>
<div class="bgi">
    <div class="container">
        <div class="form-container">
            <h3 class="text-center mb-4">Details Form</h3>
            <form id="journeydddForm" method="post" action="<?= base_url('web/dashboard/invoiceprint') ?>">
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Name:</label>
                    <div class="col-md-8">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" required>
                    </div>
                </div>
    
                <div class="form-group row">
                    <label for="source" class="col-md-4 col-form-label">Source:</label>
                    <div class="col-md-8">
                        <input type="text" id="source" name="source" class="form-control" placeholder="Enter Source" required>
                    </div>
                </div>
    
                <div class="form-group row">
                    <label for="destination" class="col-md-4 col-form-label">Destination:</label>
                    <div class="col-md-8">
                        <input type="text" id="destination" name="destination" class="form-control" placeholder="Enter Destination" required>
                    </div>
                </div>
    
                <div class="form-group row">
                    <label for="totalAmount" class="col-md-4 col-form-label">Total Amount:</label>
                    <div class="col-md-8">
                        <input type="number" id="totalAmount" name="totalAmount" class="form-control" placeholder="Enter Total Amount" required oninput="calculateDues()">
                    </div>
                </div>
    
                <div class="form-group row">
                    <label for="paidAmount" class="col-md-4 col-form-label">Paid Amount:</label>
                    <div class="col-md-8">
                        <input type="number" id="paidAmount" name="paidAmount" class="form-control" placeholder="Enter Paid Amount" required oninput="calculateDues()">
                    </div>
                </div>
    
                <div class="form-group row">
                    <label for="dateOfJourney" class="col-md-4 col-form-label">Date of Journey:</label>
                    <div class="col-md-8">
                        <input type="date" id="dateOfJourney" name="dateOfJourney" class="form-control" required>
                    </div>
                </div>
    
                <div class="form-group row">
                    <label for="duesAmount" class="col-md-4 col-form-label">Dues Amount:</label>
                    <div class="col-md-8">
                        <input type="number" id="duesAmount" name="duesAmount" class="form-control" placeholder="Dues Amount" readonly>
                    </div>
                </div>
    
                <div class="form-group row text-center">
                    <div class="col-md-12 ">
                        <button type="submit" class="btn-col-6">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    // Function to calculate the Dues Amount
    function calculateDues() {
        var totalAmount = parseFloat(document.getElementById('totalAmount').value) || 0;
        var paidAmount = parseFloat(document.getElementById('paidAmount').value) || 0;
        var duesAmount = totalAmount - paidAmount;

        // Update the Dues Amount field
        document.getElementById('duesAmount').value = duesAmount.toFixed(2);
    }

    // Handle form submission with AJAX
    $(document).ready(function() {
    $('#journeydssddForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the normal form submission (page reload)

        var formData = $(this).serialize(); // Serialize form data

        $.ajax({
            url: $(this).attr('action'), // Use the form's action URL
            method: "POST",
            data: formData, // Send form data via POST
            dataType: "json", // Expecting JSON response
            success: function(response) {
                if (response.status == 'success') {
                    // Trigger the PDF download
                    var pdfUrl = response.pdf_url; // Get the PDF URL

                    // Open the PDF in a new tab (this triggers the download)
                    var link = document.createElement('a');
                    link.href = pdfUrl;
                    link.download = ''; // This forces the browser to download the file
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);

                    // After download, send a request to delete the PDF file
                    $(window).on('unload', function() {
                        $.ajax({
                            url: '<?= base_url('controller/delete_pdf') ?>/' + response.invoiceno, // Call the delete method
                            method: 'GET',
                            success: function(deleteResponse) {
                                console.log(deleteResponse.message); // Optionally log the response
                            },
                            error: function() {
                                console.log("Error deleting the file.");
                            }
                        });
                    });
                } else {
                    alert("Error: " + response.message);
                }
            },
            error: function(xhr, status, error) {
                alert("There was an error with the request.");
            }
        });
    });
});



</script>

</body>
</html>
