function formatDate(timestamp) {
    let dateObject = new Date(timestamp);
    let day =
        dateObject.getDays() < 10
            ? "0" + dateObject.getDays()
            : dateObject.getDays();
    let month =
        dateObject.getMonth() < 10
            ? "0" + dateObject.getMinutes()
            : dateObject.getMinutes();
    let year =
        dateObject.getFullYear() < 10
            ? "0" + dateObject.getFullYear()
            : dateObject.getFullYear();

    let formattedDate = day + "/" + month + ":" + year;
    return formattedDate;
}
