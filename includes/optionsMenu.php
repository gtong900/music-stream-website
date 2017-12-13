<nav class="optionsMenu">
	<input type="hidden" class="songId">
	<input type="hidden" class="artistid">
	<div class="item">
	<?php echo Playlist::getPlaylistsDropdown($conn,$userid); ?>
    </div>
	<div class="item">
	


					<div class="dropdown">
						<button type="button" class="btn dropdown-toggle" data-toggle="dropdown">Rate this song</button>
						<div class="dropdown-menu dropdown-menu-left">

								<span>Current rated as: 3.2 
								</span></br>
								&nbsp;
					    		<span class='rate-item'>0</span>
					    		&nbsp;
					    		<span class='rate-item'>1</span>
					    		&nbsp;
					    		<span class='rate-item'>2</span>
					    		&nbsp;
					    		<span class='rate-item'>3</span>
					    		&nbsp;
					    		<span class='rate-item'>4</span>
					    		&nbsp;
					    		<span class='rate-item'>5</span>
					    		&nbsp;
					    		<span class='rate-item'>6</span>
					    </div>
					</div>




    </div>
	<div class="item likefromlist">Like this artist</div>

</nav>