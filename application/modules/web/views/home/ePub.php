
<section class="epub_mod">
    <div id="controls" class="mb-3">
        <!-- Page navigation controls -->
          

        <!-- <input type="text" id="pageInput" class="ml-2 form-control">
        <button id="goToPage" class="btn btn-primary"><i class="fas fa-search"></i> Go to Page</button> -->
        
        <!-- Highlight, Underline, Zoom, Search -->
      
        <input type="text" id="searchInput" placeholder="Search text" class="ml-2 form-control">
        <button id="searchButton" class="btn btn-info"> <i class="fas fa-search"></i> </button>
         <div class="custom-dropdown">
            <button class="btn btn-secondary dropdown-toggle" id="dropdownToggle">
                Bookmark
            </button>
            <div class="dropdown-menu" id="customDropdown">
                <button class="dropdown-item btn btn-warning mb-2" id="bookmark-btn">
                <i class="fas fa-bookmark"></i> Save
                </button>
                <button class="dropdown-item btn btn-info" id="loadBookmark">
                <i class="far fa-bookmark"></i> Load
                </button>
            </div>
      </div>
      <div class="custom-dropdown">
            <button class="btn btn-secondary dropdown-toggle" id="zoomDropdownToggle">
                Zoom
            </button>
            <div class="dropdown-menu" id="zoomDropdown" style="display: none;">
                <button class="dropdown-item btn btn-dark mb-2" id="zoomIn">
                    <i class="fas fa-search-plus"></i> Zoom In
                </button>
                <button class="dropdown-item btn btn-dark" id="zoomOut">
                    <i class="fas fa-search-minus"></i> Zoom Out
                </button>
            </div>
    </div>
    
    <div class="custom-dropdown">
        <button class="btn btn-secondary dropdown-toggle" id="textDropdownToggle">
            Text Actions
        </button>
        <div class="dropdown-menu" id="textDropdown" style="display: none;">
            <button class="dropdown-item btn btn-success mb-2" id="highlightButton">
                <i class="fas fa-highlighter"></i> Highlight
            </button>
            <button class="dropdown-item btn btn-dark mb-2" id="underlineButton">
            <i class="fas fa-underline"></i> Underline
            </button>
            <button class="dropdown-item btn btn-dark" id="addNoteButton">
               <i class="far fa-sticky-note"></i>  Add Note
            </button>
        </div>
    </div>
  
        

        <button id="togglecontent" class="btn btn-dark"><i class="fas fa-list"></i></button>
    </div>
    <div class="e_pubs_hide">
    <div class="container">
        <!-- Controls -->
        <div class="epub_md">
        <!-- EPUB Viewer -->
        
            <div id="loader" style="display: none;">
                Loading...
            </div>
        <div id="epub_viewer"></div>
         
      </div>
   </div>
    <div class="epub_bottom">
          <button id="epub_prev" class="btn btn-secondary"><i class="fas fa-step-backward"></i></button>
          
        <div id="pageControls">
            Page: 
            <input type="number" value="0" id="pageInput" min="1" class="ml-2 form-control">
            <span class="page_seperator"> / <span><span id="totalPageCount">0</span>
        </div> 
          <button id="epub_next" class="btn btn-secondary"><i class="fas fa-step-forward"></i></button>  
    </div>
    <div class="e_pub_ul">
        <!-- Table of Contents -->
        <h4>Table of Contents</h4>
        <ul id="toc"></ul>
    </div>
</section>
<script src="<?= base_url('assets/website_assets/js/jszip.min.js'); ?>"></script>
<script src="<?= base_url('assets/website_assets/js/epub.min.js'); ?>"></script>
<script>
    $(document).ready(async function () {
        let selectedTextRange = null; // Store the selected text range
        let zoomLevel = 1; // Default zoom level
        let currentBookmark = null; // Store current bookmark
        let totalPages = 0;
        let currentPage = 1;

        async function epub_viewer(epub_url) {
            try {
                if (epub_url) {
                    $('#loader').show();
                    var book = ePub(epub_url);
                    var rendition = book.renderTo("epub_viewer", {
                        width: "100%",
                        height: $(window).height(), // Use the window height
                        spread: "always",
                        flow: "scrolled",
                        layout: "fixed",
                        ignoreClass: "no-render"
                    });


                    // Display the first page
                    await rendition.display();

                    // Function to estimate the number of characters dynamically
                    function getDynamicCharCount() {
                        const viewportHeight = $("#epub_viewer").height(); // Viewer height
                        const lineHeight = parseFloat(window.getComputedStyle(document.body).lineHeight) || 1.2; // Assume 1.2em as default if not available
                        const avgWordLength = 5; // Average word length (including spaces)
                        const charsPerLine = Math.floor(window.innerWidth / avgWordLength); // Rough estimate of characters per line
                        const linesPerPage = Math.floor(viewportHeight / lineHeight); // Estimate lines per page
                        const totalCharsPerPage = charsPerLine * linesPerPage; // Estimate total characters per page
                        return totalCharsPerPage; // Return the dynamically calculated char count
                    }

                    // Generate locations dynamically based on the viewport size
                    await book.ready.then(async () => {
                        const dynamicCharCount = getDynamicCharCount();
                        await book.locations.generate(dynamicCharCount); // Use dynamically calculated character count
                        totalPageCount = book.locations.length(); // Get total number of locations (pages)
                        if (totalPageCount > 1) {
                            totalPageCount = totalPageCount - 1;
                        }
                        $('#totalPageCount').text(totalPageCount); // Display total page count

                        // Set initial page number
                        const initialLocation = rendition.currentLocation().start.cfi;
                        var currentPage = book.locations.locationFromCfi(initialLocation);
                        // if (currentPage == 0) currentPage = 1;
                        $('#pageInput').val(currentPage);
                        $('#loader').hide();
                    });

                    // Update page number dynamically on page change
                    rendition.on('relocated', function (location) {
                        const currentPage = book.locations.locationFromCfi(location.start.cfi);
                        $('#pageInput').val(currentPage); // Update input with current page number
                    });

                    // Navigate to specific page on input change (keyup event)
                    $('#pageInput').on('keyup', function (e) {
                        if (e.key === "Enter") { // Navigate on Enter key press
                            let page = parseInt($('#pageInput').val(), 10);
                            if (!isNaN(page) && page >= 1 && page <= totalPageCount) {
                                const cfi = book.locations.cfiFromLocation(page);
                                rendition.display(cfi);
                            }
                        }
                    });
                    
                    // Event listeners for next and previous buttons
                    $('#epub_next').on('click', function () {
                        rendition.next();
                    });

                    $('#epub_prev').on('click', function () {
                        rendition.prev();
                    });

                    // Bookmark functionality
                    $('#bookmark-btn').on('click', () => {
                        const currentLocation = rendition.currentLocation().start.cfi;
                        saveBookmark(currentLocation);
                        alert("Bookmark saved!");
                    });

                    const saveBookmark = (cfi) => {
                        localStorage.setItem("bookmark", cfi);
                    };

                    $('#loadBookmark').on('click', function () {
                        let bookmark = localStorage.getItem('bookmark');
                        if (bookmark) {
                            rendition.display(bookmark);
                        } else {
                            alert("No bookmark saved!");
                        }
                    });

                    // Zoom functionality
                    $('#zoomIn').on('click', function () {
                        zoomLevel += 0.1;
                        $('#epub_viewer').css('transform', `scale(${zoomLevel})`);
                    });

                    $('#zoomOut').on('click', function () {
                        if (zoomLevel > 0.2) {
                            zoomLevel -= 0.1;
                            $('#epub_viewer').css('transform', `scale(${zoomLevel})`);
                        }
                    });

                    // Table of Contents (TOC)
                    book.loaded.navigation.then(function (toc) {
                        let tocElement = $('#toc');
                        toc.forEach(function (chapter) {
                            let tocItem = $('<li></li>').html(`<a href="#" data-href="${chapter.href}">${chapter.label}</a>`);
                            tocItem.on('click', function (event) {
                                let href = $(this).data('href');alert(href);
                                rendition.display(href);
                            });
                            tocElement.append(tocItem);
                        });
                    });


                   function performSearch() {
                        const searchText = $('#searchInput').val().trim(); // Trim whitespace
                        if (searchText) {
                            // Clear previous highlights
                            rendition.annotations.remove('highlight');

                            // Get all content items from the rendition
                            const content = rendition.getContents();
                            let matches = [];

                            // Function to recursively find and highlight text
                            function highlightText(node, text) {
                                const regex = new RegExp(text, 'gi'); // Create regex for case-insensitive search
                                const walker = document.createTreeWalker(node, NodeFilter.SHOW_TEXT, null, false);
                                let currentNode;

                                while (currentNode = walker.nextNode()) {
                                    let match;
                                    while ((match = regex.exec(currentNode.nodeValue)) !== null) {
                                        const start = match.index;
                                        const end = start + match[0].length;

                                        // Get the text node length to prevent out-of-bounds errors
                                        const nodeLength = currentNode.nodeValue.length; // Fixed to get nodeValue length

                                        if (start < nodeLength && end <= nodeLength) {
                                            const range = document.createRange();
                                            range.setStart(currentNode, start);
                                            range.setEnd(currentNode, end);
                                            // Add the highlight annotation
                                            rendition.annotations.add("highlight", range, {}, null, "hl");
                                            matches.push(match[0]);
                                        } else {
                                            console.warn(`Match out of bounds: ${start} to ${end} in node length ${nodeLength}`);
                                        }
                                    }
                                }
                            }

                            // Loop through all content items to find matches
                            content.forEach((c) => {
                                //console.log("c.document.body",c.document.body);
                                highlightText(c.document.body, searchText);
                            });

                            if (matches.length > 0) {
                                alert(matches.length + " matches found.");
                            } else {
                                alert("No matches found.");
                            }
                        }
                    }

                    $('#searchInput').on('keyup', function (e) {
                        if (e.key === "Enter") { // Navigate on Enter key press
                            performSearch();
                        }
                    });

                    // Search functionality
                    $('#searchButton').on('click', function () {
                        performSearch();
                    });
                } else {
                    alert("File not available.");
                }
            } catch (e) {
                console.error(e);
            }
        }

        let epub_url = "<?=$epub_url; ?>";
        epub_viewer(epub_url);
    });
</script>

<script>
  $(document).ready(function(){
        $('.e_pub_ul').hide();
        // Toggle the TOC visibility on click
        $("#togglecontent").click(function(e){
            e.stopPropagation(); // Prevent click event from propagating to the document
            $('.e_pub_ul').toggle();
        });
    });

    // var iframe = $('<iframe>', {
    //         src: redirect_url, // Use a URL that allows embedding
    //         sandbox: 'allow-scripts allow-forms allow-same-origin allow-popups allow-modals', // Allow forms for file upload
    //         allow: 'geolocation; camera; microphone' // Allow geolocation and other permissions if needed
    //     });

</script>
<script>
    $(document).ready(function() {
    // Function to toggle dropdowns
    function toggleDropdown(dropdownId, toggleButtonId) {
        $(toggleButtonId).click(function(e) {
            e.stopPropagation(); // Prevent click event from propagating
            var dropdown = $(dropdownId);
            // Hide other dropdowns
            $('.dropdown-menu').not(dropdown).hide(); 
            // Toggle the visibility of the clicked dropdown
            dropdown.toggle();
        });
    }

    // Initialize the dropdowns
    toggleDropdown('#customDropdown', '#dropdownToggle'); // Custom actions dropdown
    toggleDropdown('#zoomDropdown', '#zoomDropdownToggle'); // Zoom actions dropdown
    toggleDropdown('#textDropdown', '#textDropdownToggle'); // Text actions dropdown

    // Close all dropdowns if clicked outside
    $(window).click(function(e) {
        if (!$(e.target).closest('.custom-dropdown').length) {
            $('.dropdown-menu').hide(); // Hide all dropdowns if clicked outside
        }
    });
});
</script>