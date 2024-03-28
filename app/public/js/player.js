var currentAudio = null;

function playAudio(id) {
    var text= document.getElementById('text');
    var audio = document.getElementById(id);
    if (currentAudio && currentAudio != audio) {
        currentAudio.pause();
    }
    if (audio.paused) {
        audio.play();
    } else {
        audio.pause();
    }
    currentAudio = audio;
}