const video = document.getElementById('video');
const playButton = document.getElementById('playButton');

playButton.addEventListener('click', () => {
    if (video.paused) {
        video.play();
        playButton.style.display = 'none';
    } else {
        video.pause();
        playButton.style.display = 'flex';
    }
});

video.addEventListener('play', () => {
    playButton.style.display = 'none';
});

video.addEventListener('pause', () => {
    playButton.style.display = 'flex';
});