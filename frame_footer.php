<?php
if(sessionAuthenticated()){?>

    <div id="nowPlayingBarContainer">
        <div id="nowPlayingBar">
            <div id="nowPlayingLeft">
                <div class="content">
                    <iframe src="https://open.spotify.com/embed?uri=spotify%3Atrack%3A33Q6ldVXuJyQmqs8BmAa0k" width="100%" frameborder="0" allowtransparency="true"></iframe>
                </div>
            </div>
<!--           <div id="nowPlayingCenter">
                <div class="content playerControls">
                    <div class="buttons">
                        <button class="controlButton shuffle" title="Shuffle button">
                            <img src="assets/images/icons/shuffle.png" alt="Shuffle"/>
                        </button>

                        <button class="controlButton previous" title="Previous button">
                            <img src="assets/images/icons/previous.png" alt="Previous"/>
                        </button>

                        <button class="controlButton play" title="Play button">
                            <img src="assets/images/icons/play.png" alt="Play"/>
                        </button>

                        <button class="controlButton pause" title="Pause button" style="display: none;">
                            <img src="assets/images/icons/pause.png" alt="Pause"/>
                        </button>

                        <button class="controlButton next" title="Next button">
                            <img src="assets/images/icons/next.png" alt="Next"/>
                        </button>

                        <button class="controlButton repeat" title="Repeat button">
                            <img src="assets/images/icons/repeat.png" alt="Repeat"/>
                        </button>
                    </div>

                </div>
            </div>
            <div id="nowPlayingRight">
                <div class="volumeBar">
                    <button class="controlButton volume" title="Volume button">
                        <img src="assets/images/icons/volume.png" alt="Volume">
                    </button>

                    <div class="progressBar">
                        <div class="progressBarBg">
                            <div class="progress"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    -->
    </div>


</body>
</html>

<?php
}
?>
