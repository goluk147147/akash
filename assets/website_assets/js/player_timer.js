
var isPaused = false;
var timerInterval;  // Declare timerInterval globally
var timeElapsed = 0;   // Track elapsed time globally
var totalTime = 0;     // Declare totalTime globally to persist between functions

// Play Button click handler
$('#play-btn').click(function () {
    play_timer();
});

// Pause Button click handler
$('#pause-btn').click(function () {
    pause_timer();
});

player_timer(1); // Set the timer for 15 minutes initially

// Timer function
function player_timer(duration = 1) { // default 1 min 
    totalTime = duration * 60;

    // Canvas context
    var canvas = document.getElementById('circle-timer');
    var ctx = canvas.getContext('2d');
    var centerX = canvas.width / 2;
    var centerY = canvas.height / 2;
    var radius = 23;  // Radius of the circle
    var lineWidth = 3;

    // Function to draw the circular timer
    function drawTimer(percentage) {
        // Clear the canvas
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        // Draw the background circle (grey circle)
        ctx.beginPath();
        ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI);
        ctx.strokeStyle = "#FF671F";
        ctx.lineWidth = lineWidth;
        ctx.stroke();

        // Draw the progress arc (animated circle)
        ctx.beginPath();
        ctx.arc(centerX, centerY, radius, -Math.PI / 2, (-Math.PI / 2) + (2 * Math.PI * percentage), false);
        ctx.strokeStyle = "#ccc";
        ctx.lineWidth = lineWidth;
        ctx.stroke();

        // Show remaining time in the center
        var remainingTime = totalTime - timeElapsed;
        var minutes = Math.floor(remainingTime / 60);
        var seconds = remainingTime % 60;
        var timeText = minutes + ':' + (seconds < 10 ? '0' + seconds : seconds);
        ctx.font = '13px Arial';
        ctx.fillStyle = '#FFF';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillText(timeText, centerX, centerY);
    }

    // Function to update the timer every second
    function updateTimer() {
        if (!isPaused && timeElapsed <= totalTime) {
            var percentage = timeElapsed / totalTime;
            drawTimer(percentage);
            timeElapsed++;
        } else if (timeElapsed > totalTime) {
            clearInterval(timerInterval);  // Stop the timer when complete
        }
    }

    // Start the timer interval
    timerInterval = setInterval(updateTimer, 1000);
}

// Play the timer after pausing
function play_timer() {
    if (isPaused) {
        isPaused = false;  // Resume the timer
        timerInterval = setInterval(function () { // Restart the timer interval
            if (!isPaused && timeElapsed <= totalTime) {
                var percentage = timeElapsed / totalTime;
                var canvas = document.getElementById('circle-timer');
                var ctx = canvas.getContext('2d');
                var centerX = canvas.width / 2;
                var centerY = canvas.height / 2;
                var radius = 23;
                var lineWidth = 3;

                // Function to draw the circular timer
                function drawTimer(percentage) {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);

                    // Draw the background circle (grey circle)
                    ctx.beginPath();
                    ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI);
                    ctx.strokeStyle = "#FF671F";
                    ctx.lineWidth = lineWidth;
                    ctx.stroke();

                    // Draw the progress arc (animated circle)
                    ctx.beginPath();
                    ctx.arc(centerX, centerY, radius, -Math.PI / 2, (-Math.PI / 2) + (2 * Math.PI * percentage), false);
                    ctx.strokeStyle = "#ccc";
                    ctx.lineWidth = lineWidth;
                    ctx.stroke();

                    // Show remaining time in the center
                    var remainingTime = totalTime - timeElapsed;
                    var minutes = Math.floor(remainingTime / 60);
                    var seconds = remainingTime % 60;
                    var timeText = minutes + ':' + (seconds < 10 ? '0' + seconds : seconds);
                    ctx.font = '13px Arial';
                    ctx.fillStyle = '#FFF';
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'middle';
                    ctx.fillText(timeText, centerX, centerY);
                }

                drawTimer(percentage);
                timeElapsed++;
            } else if (timeElapsed > totalTime) {
                clearInterval(timerInterval);  // Stop the timer when complete
            }
        }, 1000);
    }
}

// Pause the timer
function pause_timer() {
    isPaused = true;  // Pause the timer
    clearInterval(timerInterval);  // Stop the timer interval
}
