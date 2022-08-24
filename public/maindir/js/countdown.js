
// alert('Starting Now!');

// const startingMinutes = "<%=session('ctime')%>";

const startingMinutes = "{{session('ctime')}}";
alert(startingMinutes);
let time = startingMinutes * 60;

const timeDisplay = document.getElementById('countdown_text');

setInterval(countdownFunc, 1000);

function countdownFunc() {
    const mins = Math.floor(time / 60);
    let secs = time % 60;

    // timeDisplay.innerHTML = `${mins}:${secs}`;
    timeDisplay.innerHTML = mins+':'+secs;
    if (mins == 0 && secs == 55) {
        clearInterval(myInterval);
    }

    time--;
}