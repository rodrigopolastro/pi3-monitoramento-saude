function formatTime(timestamp) {
    let dateObject = new Date(timestamp);
    let hours =
        dateObject.getHours() < 10
            ? "0" + dateObject.getHours()
            : dateObject.getHours();
    let minutes =
        dateObject.getMinutes() < 10
            ? "0" + dateObject.getMinutes()
            : dateObject.getMinutes();
    let seconds =
        dateObject.getSeconds() < 10
            ? "0" + dateObject.getSeconds()
            : dateObject.getSeconds();

    let formattedTime = hours + ":" + minutes + ":" + seconds;
    return formattedTime;
}