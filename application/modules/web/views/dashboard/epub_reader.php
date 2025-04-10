<?php 
$doc_id = $this->input->get('srf')??1;
?>
<link rel="stylesheet" href="<?= base_url('assets/website_assets/css/epub_style.css'); ?>">
<style>
  .hl {
    background-color: yellow; /* Highlight color */
    color: black; /* Text color */
  }
  .highlight {
    background-color: yellow; /* Or any color that stands out */
}
</style>
<section class="epub_mod">
    <div id="controls" class="mb-3">
        <input type="text" id="searchInput" placeholder="Search text" class="ml-2 form-control">
        <button id="searchButton" class="btn btn-info" title="Search"> <i class="fas fa-search"></i> </button>
        <button class="btn decreaseFontSize" title="Font Decrease">A-</button>
        <button class="btn increaseFontSize" title="Font Increase">A+</button>
        <button class="btn increaseFontSize addNoteButton" title="View Notes"><i class="far fa-sticky-note"></i></button>
        <button id="downloadButton" class="btn" title="Download"><i class="fas fa-download"></i></button>
        <button id="togglecontent" class="btn btn-dark" title="Table Of Contents"><i class="fas fa-list"></i></button>
        <button id="setting_epub" class="btn" title="Setting"><i class="fas fa-cog"></i></button>
    </div>
    <div class="e_pubs_hide">
    <div class="container">
        <!-- Controls -->
        <div class="epub_md">
        <!-- EPUB Viewer -->
            <div id="loader" style="display: none;">
                Loading...
            </div>
            <div id="download_loader" style="display: none;">
                Downloading...
            </div>
        <div id="epub_viewer" class="vertical"></div>
       
        <div id="selectionTooltip" class="" style="display: none; position: absolute; z-index: 1000;">
            <div class="d-flex align-items-center">
            <button id="noteButton" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#noteModal"><i class="far fa-sticky-note"></i></button>
             <button class="dropdown-item btn btn-success highlightButton">
                <i class="fas fa-highlighter"></i>
            </button>

            <button class="dropdown-item btn btn-dark underlineButton">
                 <i class="fas fa-underline"></i>
            </button>
           </div>
        </div>
      </div>
   </div>
   </div>
    <div class="epub_bottom">
        <button id="epub_prev" class="btn btn-secondary" title="Previous"><i class="fas fa-step-backward"></i></button>
        <!-- <div id="pageControls">
            Page: 
            <input type="number" value="0" id="pageInput" min="1" class="ml-2 form-control">
            <span class="page_seperator"> / <span><span id="totalPageCount">0</span>
        </div>  -->
        <button id="epub_next" class="btn btn-secondary" title="Next"><i class="fas fa-step-forward"></i></button>  
    </div>
    <div class="e_pub_ul d-none">
        <div class="d-flex align-items-center justify-content-between me-3">
            <h4>Table of Contents</h4>
          <img src="<?= base_url('assets/images/sunscription_close.svg'); ?>" class="img-fluid epub-close" alt="image">
        </div>
         <div class="row m-0 py-2">
        <div class="col-md-12">
            <div class="epub_border"></div>
        </div>
       </div>
        <ul id="toc"></ul>
    </div>
    <div class="epub_setting_dt d-none">
        <div class="row">
            <div class="col-md-12 pb-3">
                <div class="d-flex align-items-center justify-content-end"><img src="<?= base_url('assets/images/sunscription_close.svg'); ?>" class="img-fluid epub-close_seting" alt="image"></div>
            </div>
            
            <div class="col-md-12 mb-2">
                <div class="custom-dropdown">
                        <button class="btn btn-secondary dropdown-toggle" id="dropdownToggle" title="Bookmark">
                            Bookmark
                        </button>
                        <div class="dropdown-menu" id="customDropdown">
                            <button class="dropdown-item btn btn-warning mb-2" id="bookmark-btn" title="Save Bookmark">
                            <i class="fas fa-bookmark"></i> Save
                            </button>
                            <button class="dropdown-item btn btn-info" id="loadBookmark" title="Load Bookmark">
                            <i class="far fa-bookmark"></i> Load
                            </button>
                        </div>
                </div>
            </div>
            
            
                <div class="col-md-6 col-sm-6 mt-2">
                    <button class="btn w-100 decreaseFontSize" title="Zoom In" id="zoomIn"><i class="fas fa-search-plus"></i> Zoom In</button>
                    
                </div>
                <div class="col-md-6 col-sm-6 mt-2">
                    <button class="btn w-100 increaseFontSize" title="Zoom Out" id="zoomOut"><i class="fas fa-search-minus"></i> Zoom Out</button>
                </div>
            </div>
           
   
       <div class="row pt-3">
           <div class="col-md-12 mb-2">
                    <div class="custom-dropdown">
                        <button class="btn btn-secondary dropdown-toggle" id="textDropdownToggle">
                            Text Actions
                        </button>
                        <div class="dropdown-menu" id="textDropdown" style="display: none;">
                            <button class="dropdown-item btn btn-success mb-2 highlightButton" title="Highlight">
                                <i class="fas fa-highlighter"></i> Highlight
                            </button>
                            <button class="dropdown-item btn btn-dark mb-2 underlineButton" title="Underline">
                            <i class="fas fa-underline"></i> Underline
                            </button>
                            <button class="dropdown-item btn btn-dark addNoteButton" title="View Notes">
                            <i class="far fa-sticky-note"></i>  View Notes
                            </button>
                        </div>
                    </div>
            </div>
       </div>
       <div class="row pt-3">
        <div class="col-md-12">
            <div class="epub_border"></div>
        </div>
       </div>
       
       <div class="row pt-3">
            <div class="col-md-12">
            <label for="languageSelect">Select Language:</label>
            <select id="languageSelector" class="form-select">
                <option value="en">English</option>
                <option value="hi">Hindi</option>
                <option value="ar">Arabic</option>
                <option value="bn">Bengali</option>
                <option value="ta">Tamil</option>
            </select>
        </div>
        </div>
        <div class="row pt-3">
          <div class="col-md-12">
             <label for="fontFamilySelector" class="d-block">Font Family</label>
                <select id="fontFamilySelector" class="form-select">
                    <option value="Arial">Arial</option>
                    <option value="Times New Roman">Times New Roman</option>
                    <option value="Courier New">Courier New</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Verdana">Verdana</option>
                    <option value="Comic Sans MS">Comic Sans MS</option>
                </select>
           </div>
       </div>
        <div class="row pt-3">
            <div class="col-md-6 col-sm-6">
                <button class="btn w-100 decreaseFontSize" title="Font Decrease">A-</button>
                
            </div>
            <div class="col-md-6 col-sm-6">
                <button class="btn w-100 increaseFontSize" title="Font Increase">A+</button>
            </div>
        </div>
       <div class="row pt-3">
         <div class="col-md-6">
            <div class="background-color-controls">
                <label for="bgColorPicker" class="d-block">Background:</label>
                <input type="color" id="bgColorPicker" name="bgColor" value="#ffffff" class="form-control" title="Background Color">
            </div>
           
         </div>
       <!-- </div>
       <div class="row pt-3"> -->
        <div class="col-md-6">
             <label for="fontColorPicker" class="d-block">Font:</label>
             <input type="color" id="fontColorPicker" value="#000000" class="form-control" title="Font Color">
        </div>
       </div>
        <div class="row pt-4">
        <div class="col-md-12">
            <div class="epub_border"></div>
        </div>
       </div>
      
    </div>
    <div class="epub_view_note d-none">
         <div class="row">
            <div class="col-md-12 pb-3">
                <div class="d-flex align-items-center justify-content-end"><img src="<?= base_url('assets/images/sunscription_close.svg'); ?>" class="img-fluid epub-close_note" alt="image"></div>
            </div>
          <div class="stored_notes">  
            
            
          </div>
    </div>
    </div>

</section>
<div class="modal fade" id="noteModal" tabindex="-1" aria-labelledby="noteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
      
      <div class="modal-body">
        <form>
            <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a note here" id="floatingTextarea"></textarea>
            <!-- <label for="floatingTextarea">Note</label> -->
            </div>
             <div class="modal-footer p-0 pt-2">
        <button type="button" class="btn btn-secondary note_close" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary save_notes">Save</button>
      </div>
           </form>
      </div>
     
    </div>
  </div>
</div>
<input class="selected_range" type="hidden" name="selected_range" value="">
<script src="<?= base_url('assets/website_assets/js/jszip.min.js'); ?>"></script>
<script src="<?= base_url('assets/website_assets/js/epub.min.js'); ?>"></script>
<script>
    let note_key = "pb_"+"<?=$doc_id?>"+"_notes";
    let bookmark_key = "pb_"+"<?=$doc_id?>"+"_bookmark";
    let langkey = "pb_epub_lang";
    let fontfamily_key = "pb_fontfamily";
    let bgcolor_key = "pb_bgcolor";
    let textcolor_key = "pb_textcolor";

    let selectedTextRange = null; // Store the selected text range
    let zoomLevel = 1; // Default zoom level
    let currentBookmark = null; // Store current bookmark
    let totalPages = 0;
    let currentPage = 1;
    let isHorizontal = false; // Track the current layout state
    let currentFontSize = 100; // Start with 100% font size
    let selectedColor = '#ffffff'; // Default background color
    let selectedFontColor = '#000000'; // Default font color
    let selectedFontFamily = 'Arial'; // Default font family
    let selectedlanguage = "en";
    const englishFonts = ['Arial', 'Times New Roman', 'Courier New', 'Georgia', 'Verdana', 'Comic Sans MS', 'Helvetica', 'Palatino Linotype', 'Trebuchet MS'];
    const hindiFonts = ['Devanagari MT', 'Noto Sans Devanagari', 'Mangal'];
    const arabicFonts = ['Scheherazade','Noto Naskh Arabic', 'Amiri'];
    const bengaliFonts = ['Siyam Rupali', 'Noto Sans Bengali', 'Kalpurush'];
    const tamilFonts = ['Bamini', 'Noto Sans Tamil', 'Latha'];

    $(document).ready(async function () {
        epub_viewer("<?=$epub_url; ?>");

        let local_lang = localStorage.getItem(langkey);
        if(local_lang) {
            selectedlanguage = local_lang;
            $('#languageSelector').val(local_lang);
        } 

        let local_ff = localStorage.getItem(fontfamily_key);
        if(local_ff) {
            selectedFontFamily = local_ff;
            $('#fontFamilySelector').val(local_ff);
        } 
        

        let local_bg = localStorage.getItem(bgcolor_key);
        if(local_bg) {
            selectedColor = local_bg;
            $('#bgColorPicker').val(local_bg);
        }
        

        let local_textclr = localStorage.getItem(textcolor_key);
        if(local_textclr) {
            selectedFontColor = local_textclr;
            $('#fontColorPicker').val(local_textclr);
        } 

        if(selectedlanguage && selectedColor && selectedFontColor && selectedFontFamily){
            applyLanguageSettings(selectedlanguage);
            updateFontOptions(selectedlanguage);
            applyFontFamily(selectedFontFamily);
            applyBackgroundColor(selectedColor);
            applyFontColor(selectedFontColor);
        }

        
        async function epub_viewer(epub_url) {
            try {
                if (epub_url) {
                    $('#loader').show();
                    $('.selected_range').val();
                    var book = ePub(epub_url);
                    const epubViewer = $('#epub_viewer');
                    const selectionTooltip = $('#selectionTooltip');

                    // Initial rendering
                    if(isHorizontal == false){
                        await renderBook();
                    }

                    let rendering_err = "An error occurred while displaying the EPUB content.";

                    async function renderBook() {
                        epubViewer.empty();
                        rendition = book.renderTo("epub_viewer", {
                            width: isHorizontal ? $(window).height() : "100%", // Adjust width for landscape
                            height: isHorizontal ? $(window).width() : $(window).height(), //
                            spread: isHorizontal ? "landscape" : "always" ,
                            flow: isHorizontal ? "pagination" : "scrolled" ,
                            layout: isHorizontal ? "fixed" : "reflowable" ,
                            ignoreClass: "no-render"
                        });
                        async function displayWithTimeout(rendition, timeout = 5000) {
                            const timeoutPromise = new Promise((_, reject) =>
                                setTimeout(() => reject(new Error(rendering_err)), timeout)
                            );
                            try {
                                // Race between the rendition.display() and the timeout promise
                                await Promise.race([rendition.display(), timeoutPromise]);
                            } catch (error) {
                                $('#loader').hide();
                                toastr.error(rendering_err);
                            }
                        }
                        // Call the function with rendition and timeout (in milliseconds)
                        displayWithTimeout(rendition, 30000); // Timeout after 30 seconds
                        
                    }
                    
                    // Function to estimate the number of characters dynamically
                    function getDynamicCharCount() {
                        const viewportHeight = isHorizontal ? $("#epub_viewer").height() : $("#epub_viewer").height(); // Viewer height
                        const lineHeight = parseFloat(window.getComputedStyle(document.body).lineHeight) || 1.2; // Assume 1.2em as default if not available
                        const avgWordLength = 5; // Average word length (including spaces)
                        const charsPerLine = Math.floor(window.innerWidth / avgWordLength); // Rough estimate of characters per line
                        const linesPerPage = Math.floor(viewportHeight / lineHeight); // Estimate lines per page
                        const totalCharsPerPage = charsPerLine * linesPerPage; // Estimate total characters per page
                        return totalCharsPerPage; // Return the dynamically calculated char count
                    }
                    await book.loaded.metadata.then(function (metadata) { //console.log("metadata",metadata);
                        //const epubLanguage = metadata.language || 'en-US'; // Default to English if not specified
                        applyLanguageSettings(selectedlanguage);
                    });


                    async function calculateTotalPages() {
                        let totalPages = 0;
                        // Set the initial location at the beginning
                        await rendition.display();
                        // Loop through each section until reaching the end of the book
                        while (true) {
                            totalPages++; // Count each "page" or section
                            try {
                                // Display the next page and check if it's the end
                                await rendition.next();
                            } catch (e) {
                                // Break out if there are no more sections to display
                                break;
                            }
                        }
                        // Reset to the beginning of the book after counting
                        await rendition.display();
                        return totalPages;
                    }

                    function calculateTotalSections() {
                        const totalSections = book.spine.spineItems.length;
                        //console.log("Total Sections:", totalSections);
                        return totalSections;
                    }


                    // Generate locations dynamically based on the viewport size
                    book.ready.then(async () => {
                        const dynamicCharCount = getDynamicCharCount();
                        //await book.locations.generate(); // Use dynamically calculated character count
                        const timeoutDuration = 10000; // 10 seconds timeout
                        const timeoutPromise = new Promise((_, reject) => setTimeout(() => reject("Location generation timed out"), timeoutDuration));
                        try {
                            await Promise.race([book.locations.generate(dynamicCharCount), timeoutPromise]);
                            totalPageCount = book.locations.length(); // Get total number of locations (pages)
                        } catch (error) {
                            totalPageCount = await calculateTotalSections();
                        }
                        
                        $('#totalPageCount').text(totalPageCount -  1); // Display total page count
                        // Set initial page number
                        const initialLocation = rendition.currentLocation().start.cfi;
                        var currentPage = book.locations.locationFromCfi(initialLocation);
                        // if (currentPage == 0) currentPage = 1;
                        $('#pageInput').val(currentPage);
                        $('#loader').hide();
                    });
                    
                    // await book.loaded.metadata.then(function (metadata) { //console.log("metadata",metadata);
                    //     //const epubLanguage = metadata.language || 'en-US'; // Default to English if not specified
                    //     applyLanguageSettings(selectedlanguage);
                    // });

                    // Update page number dynamically on page change
                    rendition.on('relocated', function (location) { 
                        const currentPage = book.locations.locationFromCfi(location.start.cfi);
                        //console.log("currentPage",currentPage);
                        $('#pageInput').val(currentPage); // Update input with current page number
                    });

                    //Render on select text
                    rendition.on('selected', function (cfiRange) {
                        console.log("CFI Range: ", cfiRange);
                        if (cfiRange) {
                            $('.selected_range').val(btoa(cfiRange));
                            selectedTextRange = cfiRange;
                        } 
                    });

                    // Detect text selection in the iframe
                    rendition.on('rendered', function() {
                        applyLanguageSettings(selectedlanguage);
                        applyBackgroundColor(selectedColor);
                        applyFontColor(selectedFontColor);
                        applyFontFamily(selectedFontFamily);
                        var iframe = $('#epub_viewer iframe')[0]; // Access the iframe
                        //iframe.addClass("epub-iframe");
                        $('#epub_viewer iframe').addClass('epub_iframe');
                        var iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
                        //console.log('iframeDocument',iframeDocument);
                        $(iframeDocument).on('mouseup', function(e) {
                            setTimeout(function() {
                                var selection = iframeDocument.getSelection();
                                var selectedText = selection.toString();
                                if (selectedText.length > 0) {
                                    showTooltipInIframe(iframeDocument, selection); // Show tooltip on selection
                                } else {
                                    selectionTooltip.fadeOut(); // Hide tooltip if no text is selected
                                }
                            }, 100);
                        });
                    });

                    // Display Table of Contents (TOC)
                    book.loaded.navigation.then(function (toc) { 
                        let tocElement = document.getElementById('toc');
                        toc.forEach(function (chapter) { //console.log("chapter",chapter);
                            let tocItem = document.createElement('li');
                            tocItem.innerHTML = `<a href="#" data-href="${chapter.href}">${chapter.label}</a>`;
                            tocItem.addEventListener('click', function (event) {
                                let href = event.target.getAttribute('data-href');
                                rendition.display(href);
                            });
                            tocElement.appendChild(tocItem);
                        });
                    });

                    // Navigate to specific page on input change (keyup event)
                    $('#pageInput').on('keyup', function (e) {
                        if (e.key === "Enter") { // Navigate on Enter key press
                            let page = parseInt($('#pageInput').val(), 10);
                            if (!isNaN(page) && page >= 0 && page <= totalPageCount) {
                                const cfi = book.locations.cfiFromLocation(page);
                                rendition.display(cfi);
                            } else {
                                alert("No page exists!");
                            }
                        }
                    });

                    // Function to toggle between vertical and horizontal layouts
                    $('#rotateLayoutButton').on('click', async function () {
                        const epubViewer = $('#epub_viewer');
                        if (isHorizontal) {
                            epubViewer.removeClass('horizontal').addClass('vertical'); // Switch to vertical
                        } else {
                            epubViewer.removeClass('vertical').addClass('horizontal'); // Switch to horizontal
                        }
                        isHorizontal = !isHorizontal; // Toggle the layout state
                        await renderBook();
                    });

                    // Background color change
                    $('#bgColorPicker').on('input', function() {
                        selectedColor = $(this).val();
                        applyBackgroundColor(selectedColor);
                    });

                    // Update font color dynamically with the font color picker
                    $('#fontColorPicker').on('input', function() {
                        selectedFontColor = $(this).val();
                        applyFontColor(selectedFontColor);
                    });
                    
                    // Update font family dynamically with the font family dropdown
                    $('#fontFamilySelector').on('change', function() {
                        selectedFontFamily = $(this).val();
                        applyFontFamily(selectedFontFamily);
                    });


                    $('#languageSelector').on('change', function () {
                        selectedlanguage = $(this).val(); 
                        if(selectedlanguage == "en"){
                            selectedFontFamily = englishFonts[0];
                        } else if(selectedlanguage == "hi"){
                            selectedFontFamily = hindiFonts[0];
                        } else if(selectedlanguage == "ar"){ 
                            selectedFontFamily = arabicFonts[0];
                        } else if(selectedlanguage == "bn"){ 
                            selectedFontFamily = bengaliFonts[0];
                        } else if(selectedlanguage == "ta"){ 
                            selectedFontFamily = tamilFonts[0];
                        }
                        applyLanguageSettings(selectedlanguage);
                        updateFontOptions(selectedlanguage);
                        applyFontFamily(selectedFontFamily);
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
                        //saveBookmark(currentLocation);
                        localStorage.setItem(bookmark_key, currentLocation);
                        alert("Bookmark saved!");
                    });

                    $('#loadBookmark').on('click', function () {
                        let bookmark = localStorage.getItem(bookmark_key);
                        if (bookmark) {
                            rendition.display(bookmark);
                        } else {
                            alert("No bookmark saved!");
                        }
                    });

                    // Zoom in functionality
                    $('#zoomIn').on('click', function () {
                        zoomLevel += 0.1;
                        $('#epub_viewer').css('transform', `scale(${zoomLevel})`);
                    });

                    // Zoom out functionality
                    $('#zoomOut').on('click', function () {
                        if (zoomLevel > 0.2) {
                            zoomLevel -= 0.1;
                            $('#epub_viewer').css('transform', `scale(${zoomLevel})`);
                        }
                    });

                    // Highlight text
                    $('.highlightButton').on('click', function () {
                        if (selectedTextRange) {
                            rendition.annotations.add("highlight", selectedTextRange, {}, null, "hl");
                            selectedTextRange = null; // Clear selection after highlighting
                        } else {
                            alert("No text selected to Highlight.");
                        } 
                    });

                    // Underline text
                    $('.underlineButton').on('click', function () {
                        if (selectedTextRange) {
                            rendition.annotations.add("underline", selectedTextRange, {}, null, "ul"); // Add underline annotation
                            console.log("Text underlined!");
                            selectedTextRange = null; // Clear selection after underlining
                        } else {
                            alert("No text selected to underline.");
                        }
                    });

                    // Increase Font Size
                    $('.increaseFontSize').on("click",function(){ 
                        if (currentFontSize < 200) { // Maximum font size 200%
                            currentFontSize += 10; // Increase by 10%
                            rendition.themes.fontSize(currentFontSize + "%"); // Apply the font size
                        }
                    });

                    // Decrease Font Size
                    $('.decreaseFontSize').on("click",function(){ 
                        if (currentFontSize > 50) { // Minimum font size 50%
                            currentFontSize -= 10; // Decrease by 10%
                            rendition.themes.fontSize(currentFontSize + "%"); // Apply the font size
                        }
                    })


                    // Download Epub file
                    $('#downloadButton').on("click",function(){ 
                        downloadEpub();
                    })

                    // Add Note button click event
                    $('#noteButton').click(function() {
                        var iframe = $('#epub_viewer iframe')[0]; // Access the iframe
                        var iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
                        var selectedText = iframeDocument.getSelection().toString();
                        // if (selectedText.length > 0) {
                            
                        // }
                        selectionTooltip.fadeOut();
                        //$('#selectionTooltip').addClass('d-none');
                    });
                    
                    // Search functionality on enter key
                    $('#searchInput').on('keyup', function (e) {
                        if (e.key === "Enter") { // Navigate on Enter key press
                            performSearch();
                        }
                    });

                    // Search functionality on button click
                    $('#searchButton').on('click', function () {
                        performSearch();
                    });
                    

                    $('.save_notes').on('click',function(){
                        let note_text = $('#floatingTextarea').val();
                        let range = $('.selected_range').val();
                        let save_data = [];
                        if(note_text != ""){
                            let save_notes = {};
                            save_notes.range = range;
                            save_notes.text = note_text;
                            save_data.push(save_notes);
                            //console.log("save_data",save_data);
                            let existing_notes = get_existing_notes();
                            var mergedArray = $.merge(save_data, existing_notes);
                            //console.log("mergedArray",mergedArray);
                            let final_data = btoa(JSON.stringify(mergedArray));
                            //console.log("final_data",final_data);
                            localStorage.setItem(note_key,final_data);
                            $('#floatingTextarea').val("");
                            $('#noteModal').modal('hide');
                            fetch_all_notes();
                            //alert("Note save successfully");
                        } else {
                            alert("Please enter some text!");
                        }
                    });

                    // //function goto_location(range_enc){
                    // $('.goto_location').on('click', function () { 
                    //     let range_enc = $(this).attr('data-range');
                    //     if(range_enc){
                    //         let selected_range = atob(range_enc);
                    //         scrollToAndHighlightCfi(selected_range);
                    //     }
                    // });

                    // Close the tooltip if clicked outside
                    $(window).click(function(e) {
                        if (!$(e.target).closest('#selectionTooltip').length) {
                            selectionTooltip.fadeOut();
                        }
                    });
                    

                    //////////// Start All functions //////////////////
                    fetch_all_notes();

                    function fetch_all_notes(){
                        let saved_all_range = get_existing_notes();
                        let html = "";
                        if(saved_all_range.length){
                            saved_all_range = saved_all_range.reverse();
                            saved_all_range.forEach(data => {
                                let cfiRange = data.range;
                                let note_data = data.text;
                                let goto_location = "goto_location('"+cfiRange+"')";
                                //html += '<a href="javascript:void()" class="mb-2 goto_location" data-range="'+cfiRange+'"><span class="mb-1">'+note_data+'</span></a>';
                                html += '<a href="javascript:void()" class="mb-2" onclick="'+goto_location+'" data-range="'+cfiRange+'"><span class="mb-1">'+note_data+'</span></a>';
                            });
                            $('.stored_notes').html(html);
                        } else {
                            html = '<div class="notes_data_found"><div class="notes_data_p"><i class="far fa-4x fa-sticky-note"></i><p>No Notes Found!</p></div></div>';
                            $('.stored_notes').html(html);
                        }
                    }

                    function get_existing_notes(){
                        let return_data = [];
                        let saved_all_notes = localStorage.getItem(note_key);
                        if(saved_all_notes){
                            return_data = JSON.parse(atob(saved_all_notes));
                        }
                        return return_data;
                    }

                    // Download epub file
                    function downloadEpub(){ 
                        $('#download_loader').show(); 
                        var fileUrl = "<?= $epub_url;?>";
                        var fileName = fileUrl.substring(fileUrl.lastIndexOf('/') + 1);

                        if (fileUrl) {
                            var xhr = new XMLHttpRequest();
                            var encoded_file_url = "<?= base_url('download?file=')?>" + encodeURIComponent(fileUrl);
                            //alert(encoded_file_url);
                            xhr.open('GET', encoded_file_url, true);
                            xhr.responseType = 'blob';
                            
                            // xhr.onprogress = function(event) {
                            //     if (event.lengthComputable) {
                            //         var percentComplete = (event.loaded / event.total) * 100;
                            //         $('#progressBar div').css('width', percentComplete + '%').text(Math.round(percentComplete) + '%');
                            //     }
                            // };

                            xhr.onload = function() {
                                $('#download_loader').hide();
                                if (xhr.status === 200) {
                                    var blob = xhr.response;
                                    var downloadLink = document.createElement('a');
                                    var url = window.URL.createObjectURL(blob);
                                    downloadLink.href = url;
                                    downloadLink.download = fileUrl.split('/').pop();
                                    document.body.appendChild(downloadLink);
                                    downloadLink.click();
                                    document.body.removeChild(downloadLink);
                                    window.URL.revokeObjectURL(url);
                                } else {
                                    alert("something went wrong while downloading!");
                                }
                            };
                            
                            xhr.send();
                        } else {
                            $('#download_loader').hide();
                            alert('File not exists!');
                        }
                    }

                    // Function to show the tooltip near selected text
                    function showTooltipInIframe(iframeDocument, selection) {
                        var range = selection.getRangeAt(0).getBoundingClientRect();
                        var tooltipX = range.left + iframeDocument.defaultView.pageXOffset; // X-axis offset
                        var tooltipY = range.top + iframeDocument.defaultView.pageYOffset - 40; // Y-axis offset

                        selectionTooltip.css({
                            top: tooltipY + 'px',
                            left: tooltipX + 'px'
                        }).fadeIn();
                    }
                    
                    
                    //////////// End All functions //////////////////
                } else {
                    alert("File not available.");
                }
            } catch (e) {
                console.error(e);
            }
        }
    });
</script>

<script>
    $(document).ready(function(){
        // Toggle the TOC visibility on click
        $("#togglecontent").click(function(e){
            if($('.e_pub_ul').hasClass('d-none')){
                $('.e_pub_ul').removeClass('d-none');
            } else {
                $('.e_pub_ul').addClass('d-none');
            }
            $('.epub_setting_dt').addClass('d-none');
                $('.epub_view_note').addClass('d-none');
        });
        $(".epub-close").click(function(e){
            $('.e_pub_ul').addClass('d-none');
        });
    })

    $(document).ready(function(){
        // Toggle the TOC visibility on click
        $("#setting_epub").click(function(e){
            if($('.epub_setting_dt').hasClass('d-none')){
                $('.epub_setting_dt').removeClass('d-none');
            } else {
                $('.epub_setting_dt').addClass('d-none');
                
            }
            $('.e_pub_ul').addClass('d-none');
            $('.epub_view_note').addClass('d-none');
        });
        $('.epub-close_seting').click(function(e){
            $('.epub_setting_dt').addClass('d-none');
        
        });
    });

    $(document).ready(function(){
        $(".addNoteButton").click(function(e){
            if($('.epub_view_note').hasClass('d-none')){
                $('.epub_view_note').removeClass('d-none');
            } else {
                $('.epub_view_note').addClass('d-none');
            }
            $('.e_pub_ul').addClass('d-none');
            $('.epub_setting_dt').addClass('d-none');
        });
        $('.epub-close_note').click(function(e){
            //alert('hi');
            $('.epub_view_note').addClass('d-none');
        
        });
    });
    
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
        toggleDropdown('#customDropdown', '#dropdownToggle');
        toggleDropdown('#zoomDropdown', '#zoomDropdownToggle');
        toggleDropdown('#textDropdown', '#textDropdownToggle');

        // Close all dropdowns if clicked outside the dropdowns
        $(window).click(function(e) {
            if (!$(e.target).closest('.custom-dropdown').length) {
                $('.dropdown-menu').hide(); // Hide all dropdowns if clicked outside
            }
        });

        // Hide dropdown menu when any dropdown item is clicked
        $('.dropdown-item').click(function() {
            $(this).closest('.dropdown-menu').hide();
        });

        

    });

    function goto_location(range_enc){ //alert(range_enc);
        if(range_enc){
            let selected_range = atob(range_enc);
            scrollToAndHighlightCfi(selected_range);
            $('.epub_view_note').addClass('d-none');
        }
    }

    let lastHighlightCfi = null; // Variable to store the last highlighted CFI

    function scrollToAndHighlightCfi(cfi) {
        // Remove the last highlight if it exists
        if (lastHighlightCfi) {
            rendition.annotations.remove(lastHighlightCfi, "highlight");
        }

        // Use rendition.display to navigate to the specified CFI
        rendition.display(cfi).then(() => {
            //console.log("Scrolled to CFI:", cfi);

            // Add a highlight annotation on the CFI location
            rendition.annotations.add("highlight", cfi, {}, null, "hl"); 
            //console.log("Text highlighted at CFI:", cfi);
            
            // Update the last highlighted CFI
            lastHighlightCfi = cfi;
        }).catch(err => {
            console.error("Error scrolling to CFI:", err);
        });
    }

    // perform search 
    let lastSearchRanges = []; // Store the last search highlights

    function performSearch() {
        let all_range = [];
        if(lastSearchRanges.length){
            lastSearchRanges.forEach((each_highlight) => {
                rendition.annotations.remove(each_highlight, "highlight");
            });
        }
        
        const searchText = $('#searchInput').val().trim(); // Trim whitespace
        if (searchText) {
            // Clear previous highlights
            if (lastSearchRanges.length > 0) {
                lastSearchRanges.forEach(cfiRange => {
                    rendition.annotations.remove('highlight', cfiRange);
                });
                lastSearchRanges = []; // Reset after clearing
            }

            // Get all content items from the rendition
            const content = rendition.getContents();
            let matches = [];

            // Function to recursively find and highlight text
            function highlightText(node, text, content) {
                const regex = new RegExp(text, 'gi'); // Create regex for case-insensitive search
                const walker = document.createTreeWalker(node, NodeFilter.SHOW_TEXT, null, false);
                let currentNode;

                while (currentNode = walker.nextNode()) {
                    let match;
                    while ((match = regex.exec(currentNode.nodeValue)) !== null) {
                        const start = match.index;
                        const end = start + match[0].length;
                        const nodeLength = currentNode.nodeValue.length;

                        if (start < nodeLength && end <= nodeLength) {
                            const range = document.createRange();
                            range.setStart(currentNode, start);
                            range.setEnd(currentNode, end);

                            try {
                                // Get CFI from the current content
                                const cfiRange = content.cfiFromRange(range);

                                if (cfiRange) {
                                    // Add the highlight annotation using CFI
                                    rendition.annotations.add('highlight', cfiRange, {}, null, 'hl');
                                    
                                    all_range.push(cfiRange); // Save to current search range
                                    lastSearchRanges.push(cfiRange); // Save to last search range for next time
                                    matches.push(match[0]);
                                }
                            } catch (error) {
                                console.warn("Error creating CFI range:", error);
                            }
                        }
                    }
                }
            }

            // Loop through all content items to find matches
            content.forEach((c) => {
                highlightText(c.document.body, searchText, c);
            });

            if (matches.length > 0) {
                alert(matches.length + " matches found.");
            } else {
                alert("No matches found.");
            }
        }
    }


    function applyLanguageSettings(language) { //alert();
        const iframeDoc = $('#epub_viewer iframe').contents();
        const rtlLanguages = ['ar'];
        if (rtlLanguages.includes(language)) {
            rendition.themes.default({ "direction": "rtl" });
            iframeDoc.find('html').css("direction", "rtl");
            iframeDoc.find('body').css("direction", 'rtl');
        } else {
            rendition.themes.default({ "direction": "ltr" });
            iframeDoc.find('html').css("direction", "ltr");
            iframeDoc.find('body').css("direction", 'ltr');
        }
        localStorage.setItem(langkey,language);
    }

    function updateFontOptions(language) { 
        const fontFamilySelector = document.getElementById('fontFamilySelector');
        fontFamilySelector.innerHTML = '';  // Clear existing options

        let fonts;
        if (language === 'en') {
            fonts = englishFonts;
        } else if (language === 'hi') {
            fonts = hindiFonts;
        } else if (language === 'ar') {
            fonts = arabicFonts;
        } else if(language == "bn"){ 
            fonts = bengaliFonts;
        } else if(language == "ta"){ 
            fonts = tamilFonts;
        }
        fonts.forEach(font => {
            const option = document.createElement('option');
            option.value = font;
            option.textContent = font;
            fontFamilySelector.appendChild(option);
        });
    }

    // Function to apply the background color
    function applyBackgroundColor(color) {
        $(".epub_mod").css("background",color);
        rendition.getContents().forEach(function(content) {
            content.document.body.style.backgroundColor = color;
            localStorage.setItem(bgcolor_key,color)
        });
    }

    // Function to apply the font color
    function applyFontColor(color) {
        rendition.themes.override("color", color);
        localStorage.setItem(textcolor_key, color);
    }

    // Function to apply the font family
    function applyFontFamily(fontFamily) { 
        rendition.getContents().forEach(function(content) {
            // Set the font family for body and all text elements
            content.document.body.style.fontFamily = fontFamily;

            // Optionally, also apply to other text elements if necessary
            const allTextElements = content.document.querySelectorAll('p, span, div, h1, h2, h3, h4, h5, h6');
            allTextElements.forEach(function(element) {
                element.style.fontFamily = fontFamily;
                localStorage.setItem(fontfamily_key,fontFamily);
            });
        });
    }

    
</script>