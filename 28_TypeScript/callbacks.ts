function getLyrics(
    callback:(error: undefined|string, data: undefined|string) => void, 
    url: string
){

    const request = new XMLHttpRequest();

    request.open("GET", url);

    request.onreadystatechange = function(){
        if(this.readyState === 4 && this.status === 200){
            const data = JSON.parse(this.responseText)["lyrics"];
            callback(undefined, data);
        }

        if(this.status !== 200){
            callback("Error get data", undefined);
        }
    };

    request.send();
}

getLyrics(function(error, data){
    const lyrics = document.getElementById("lyrics");
    if(!error){
        console.log(data);
        lyrics.innerHTML = `
            <h2>Lyrics</h2>
            <p>${data}</p>
        `;
        
        return;
    }

    lyrics.innerHTML = `
        <h2>Error</h2>
        <p>${error}</p>
    `;   
}, "https://private-anon-b98e3d0aa0-lyricsovh.apiary-mock.com/v1/Coldplay/Adventure of a Lifetime");