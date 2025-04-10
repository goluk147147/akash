<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDF Flipbook</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.7.107/pdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/turn.js/3/turn.min.js"></script>
    <style>
        body {
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column; /* Align items vertically */
            align-items: center;
            height: 100vh;
            justify-content: center; /* Center the flipbook */
            margin: 0;
        }

        #flipbook {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Add a shadow for depth */
            background-color: white; /* Flipbook background */
            margin: 0; /* Remove margin */
            padding: 0; /* Remove padding */
        }

        .page {
            width: 100%;
            height: 100%;
            background-color: #272525; /* Set page background color */
            /* display: flex; */
            justify-content: center;
            align-items: center;
            overflow: scroll;        
            margin: 0; /* Remove margin */
            padding: 0; /* Remove padding */
        }

        /* canvas {
            width: 100%;
            height: 100%;
        } */

        .controls {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        .controls button {
            margin: 0 10px;
            padding: 10px 10px;
            font-size: 16px;
            cursor: pointer;
        }

        .prev-pdf-bt {
            border-radius: 100%;
            background: #5f5c5c !important;
        }

        #prev-page img {
            width: 20px;
            height: 20px;
        }

        #next-page img {
            width: 20px;
            height: 20px;
        }

        .pad-24 {
            display: flex;
            flex-direction: column; /* Align items vertically */
            align-items: center;
            margin: 24px 25px 0 25px;  
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="pad-24">
        <div class="controls">
            <button id="prev-page" class="prev-pdf-bt"><img src="<?= base_url('assets/images/prev.svg'); ?>" class="img-fluid" alt="image"></button>
            <button id="next-page" class="prev-pdf-bt"><img src="<?= base_url('assets/images/next.svg'); ?>" class="img-fluid" alt="image"></button>
        </div>
        <div id="flipbook"></div>
    </div>
    <script>
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.7.107/pdf.worker.min.js';

        const pdfUrl = "<?=$file_url?>";

        let pdfDoc = null;
        let scale = 1.5;
        const flipbook = document.getElementById('flipbook');
        var totalPages = null;
        var wiu = $(window).width();
        var height = $(window).height();

        // Fetch and render PDF pages
        pdfjsLib.getDocument(pdfUrl).promise.then(function(pdf) {
            pdfDoc = pdf;
            totalPages = pdf.numPages;

            let maxWidth = 0;
            let maxHeight = 0;

            // Get the dimensions of the first page to set initial width and height
            pdf.getPage(1).then(function(page) {
                const viewport = page.getViewport({ scale: scale });
                maxWidth = viewport.width;
                maxHeight = viewport.height;
                $('#flipbook').css({
                    width: maxWidth,
                    height: maxHeight
                });

                for (let pageNum = 1; pageNum <= totalPages; pageNum++) {
                    const pageContainer = document.createElement('div');
                    pageContainer.className = 'page';
                    pageContainer.id = 'page-' + pageNum;
                    flipbook.appendChild(pageContainer);

                    renderPage(pageNum, pageContainer);
                }

                $('#flipbook').turn({
                    width: maxWidth,
                    height: maxHeight,
                    autoCenter: true,
                    display: 'single',
                    elevation: 50,
                    gradients: true
                });
            });
        });

        function renderPage(pageNum, container) {
            pdfDoc.getPage(pageNum).then(function(page) {
                const viewport = page.getViewport({ scale: scale });
                const canvas = document.createElement('canvas');
                const context = canvas.getContext('2d');
                canvas.height = viewport.height;
                canvas.width = viewport.width;
                container.innerHTML = '';
                container.appendChild(canvas);
                const renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };
                page.render(renderContext);
            });
        }

        // Event listeners for buttons
        $(document).ready(function() {
            $('#prev-page').on('click', function() {
                $('#flipbook').turn('previous');
            });

            $('#next-page').on('click', function() {
                $('#flipbook').turn('next');
            });
        });
    </script>
</body>
</html>
