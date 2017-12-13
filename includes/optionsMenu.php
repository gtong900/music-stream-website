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

								<div class="row" style="width: 100%;margin-left: 10px">
									<div class="col-xs-2">
										<span class='rate-item'>&nbsp;0&nbsp;</span>
									</div>
									<div class="col-xs-2">
										<span class='rate-item'>&nbsp;1&nbsp;</span>
									</div>
									<div class="col-xs-2">
										<span class='rate-item'>&nbsp;2&nbsp;</span>
									</div>
									<div class="col-xs-2">
										<span class='rate-item'>&nbsp;3&nbsp;</span>
									</div>
									<div class="col-xs-2">
										<span class='rate-item'>&nbsp;4&nbsp;</span>
									</div>
									<div class="col-xs-2">
										<span class='rate-item'>&nbsp;5&nbsp;</span>
									</div>
									<div class="col-xs-2">
										<span class='rate-item'>&nbsp;6&nbsp;</span>
									</div>
								</div>

								<div class="row" style="margin-left: 10px">
								<span>Average Rating: 3.2 
								</span>
								</div>

					    </div>
					</div>




    </div>
	<div class="item likefromlist">Like this artist</div>

</nav>