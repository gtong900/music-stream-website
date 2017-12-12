<nav class="optionsMenu">
	<input type="hidden" class="songId">
	<input type="hidden" class="artistid">
	<div class="item">
	<?php echo Playlist::getPlaylistsDropdown($conn,$userid); ?>
    </div>
	<div class="item likefromlist">Like this artist</div>
</nav>