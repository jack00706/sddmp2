const playlist = document.getElementById("playlist");
const player = document.getElementById("player");

playlist.addEventListener("click", function(e) {
  if (e.target && e.target.nodeName === "LI") {
    const song = e.target.getAttribute("data-src");
    player.src = song;
    player.play();
  }
});
