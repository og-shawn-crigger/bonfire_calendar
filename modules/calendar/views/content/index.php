<?php
/**
 * Full Calendar basic html markup, change what you need to here to make the magic happen.
 *
 * This work is licensed under the Creative Commons Attribution 3.0 Unported
 * License. To view a copy of this license, visit
 * http://creativecommons.org/licenses/by/3.0/ or send a letter to Creative
 * Commons, 444 Castro Street, Suite 900, Mountain View, California, 94041, USA.
 *
 *  @category    views
 *  @subpackage  Calendar Module
 *  @package     Bonfire
 *  @author      Shawn Crigger <support@s-vizion.com>
 *  @copyright   2012 S-Vizion Software and Developments
 *  @license     http://creativecommons.org/licenses/by/3.0/  CCA3L
 *  @version     1.0.0
 *
 */
?>
<style type="text/css">

	#loading {
		position: absolute;
		top: 5px;
		right: 5px;
	}

	#calendar {
		width: 900px;
		margin: 0 auto;
	}

</style>
<div class="admin-box">
	<h3>Calendar</h3>
	<div class="content_toggle">

		<div id="loading" style="display:none">loading...</div>
		<div id="calendar"></div>

	</div>
</div>