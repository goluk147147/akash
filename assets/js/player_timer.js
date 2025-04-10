var isPaused = false;
var timerInterval; // Declare timerInterval globally
var timeElapsed = 0; // Track elapsed time globally
var totalTime = 0; // Declare totalTime globally to persist between functions

// Play Button click handler


// Timer function
function player_timer(duration = 60) { // default 1 min
    totalTime = Math.floor(duration);
    resume_timer(); // Start the timer when calling player_timer
}

// Function to draw the circular timer
function drawTimer(percentage) {
    var canvas = document.getElementById('circle-timer');
    var ctx = canvas.getContext('2d');
    var centerX = canvas.width / 2;
    var centerY = canvas.height / 2;
    var radius = 23;
    var lineWidth = 3;

    // Clear the canvas
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Draw the background circle (grey circle)
    ctx.beginPath();
    ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI);
    ctx.strokeStyle = "#17175c";
    ctx.lineWidth = lineWidth;
    ctx.stroke();

    // Draw the progress arc (animated circle)
    ctx.beginPath();
    ctx.arc(centerX, centerY, radius, -Math.PI / 2, (-Math.PI / 2) + (2 * Math.PI * percentage), false);
    ctx.strokeStyle = "#ec008c";
    ctx.lineWidth = lineWidth;
    ctx.stroke();

    // Show remaining time in the center
    var remainingTime = totalTime - timeElapsed;
    var minutes = Math.floor(remainingTime / 60);
    var seconds = Math.floor(remainingTime % 60);
    var timeText = minutes + ':' + (seconds < 10 ? '0' + seconds : seconds);
    ctx.font = '15px AnekLatin-SemiBold';
    ctx.fillStyle = '#FFF';
    ctx.textAlign = 'center';
    ctx.textBaseline = 'middle';
    ctx.fillText(timeText, centerX, centerY);
}

// Start or Resume the timer
function resume_timer(interval=1000) {
    if (!timerInterval) { // Only start if not already running
        isPaused = false;
        timerInterval = setInterval(function () {
            if (!isPaused && timeElapsed <= totalTime) {
                var percentage = timeElapsed / totalTime;
                drawTimer(percentage);
                timeElapsed++;
            } else if (timeElapsed > totalTime) {
                clearInterval(timerInterval); // Stop the timer when complete
            }
        }, interval);
    }
}

// Pause the timer
function pause_timer() {
    isPaused = true;
    clearInterval(timerInterval); // Stop the timer interval
    timerInterval = null; // Reset the interval for resuming later
}
