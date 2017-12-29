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
										&nbsp;<span class='rate-item'>1</span>&nbsp;
									</div>
									<div class="col-xs-2">
										&nbsp;<span class='rate-item'>2</span>&nbsp;
									</div>
									<div class="col-xs-2">
										&nbsp;<span class='rate-item'>3</span>&nbsp;
									</div>
									<div class="col-xs-2">
										&nbsp;<span class='rate-item'>4</span>&nbsp;
									</div>
									<div class="col-xs-2">
										&nbsp;<span class='rate-item'>5</span>&nbsp;
									</div>
									<div class="col-xs-2">
										&nbsp;<span class='rate-item'>6</span>&nbsp;
									</div>
									<div class="col-xs-2">
										&nbsp;<span class='rate-item'>7</span>&nbsp;
									</div>
									<div class="col-xs-2">
										&nbsp;<span class='rate-item'>8</span>&nbsp;
									</div>
								</div>

								<div class="row" style="margin-left: 10px">
								<span class="avgrate"> 
								</span>
								</div>

					    </div>
					</div>




    </div>
	<div class="item likefromlist">Like this artist</div>

</nav>