function getLyrics(callback, url) {
    var request = new XMLHttpRequest();
    request.open("GET", url);
    request.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            var data = JSON.parse(this.responseText)["lyrics"];
            callback(undefined, data);
        }
        if (this.status !== 200) {
            callback("Error get data", undefined);
        }
    };
    request.send();
}
getLyrics(function (error, data) {
    var lyrics = document.getElementById("lyrics");
    if (!error) {
        console.log(data);
        lyrics.innerHTML = "\n            <h2>Lyrics</h2>\n            <p>".concat(data, "</p>\n        ");
        return;
    }
    lyrics.innerHTML = "\n        <h2>Error</h2>\n        <p>".concat(error, "</p>\n    ");
}, "https://private-anon-b98e3d0aa0-lyricsovh.apiary-mock.com/v1/Coldplay/Adventure of a Lifetime");
