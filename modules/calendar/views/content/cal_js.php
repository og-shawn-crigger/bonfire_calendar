<?php
/**
 * Full Calendar basic java-script, change what you need to here to make the magic happen.
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
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},

			<?php if($this->lang->line('calendarToday')) : ?>

			buttonText: {
			today: '<?php echo $this->lang->line('calendarToday'); ?>',
			day: '<?php echo $this->lang->line('calendarDay'); ?>',
			week:'<?php echo $this->lang->line('calendarWeek'); ?>',
			month:'<?php echo $this->lang->line('calendarMonth'); ?>'
			},

			<?php endif; ?>
<?php
		if($this->lang->line('months'))
		{

			echo "monthNames: [";

			foreach($this->lang->line('months') as $month)
			{
				echo '"' . $month . '",';
			}

			echo "],";
		}

		if($this->lang->line('monthsShort'))
		{

			echo "monthNamesShort: [";

			foreach($this->lang->line('monthsShort') as $monthShort)
			{
				echo '"' . $monthShort .'",';
			}

			echo "],";
		}

		if($this->lang->line('days'))
		{

			echo "dayNames: [";

			foreach($this->lang->line('days') as $day)
			{
				echo '"' . $day .'",';
			}

			echo "],";
		}

		if($this->lang->line('daysShort'))
		{
			echo "dayNamesShort: [";
			foreach($this->lang->line('daysShort') as $dayShort)
			{
				echo '"' . $dayShort .'",';
			}
			echo "],";
		}
?>

			editable: false,
			height: 350,
<?php if ( isset($event_sources ) ) : ?>

			eventSources:[
				{
					url: "calendar/jquery_get_invoices/overdue",
                    color: 'red',
                    textColor: 'white'
				},
				{
					url: "calendar/jquery_get_invoices/open",
					color: 'blue',
					textColor: 'white'
				},
				{
					url: "calendar/jquery_get_invoices/quotes",
					color: 'green',
					textColor: 'white'
				},
			],
<?php endif; ?>

			loading: function(bool) {
				if (bool) $('#loading').show();
				else $('#loading').hide();
			}

		});


