<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Expand-able Calendar module for Bonfire.
 *
 * This is a basic wrapper for FullCalendar JS which is a Full Calendar with Google Cal support
 * you can add all the ajax methods you need, this module does not have any as I use it for various
 * reasons and switch and swap the models for data as needed.
 *
 * This work is licensed under the Creative Commons Attribution 3.0 Unported
 * License. To view a copy of this license, visit
 * http://creativecommons.org/licenses/by/3.0/ or send a letter to Creative
 * Commons, 444 Castro Street, Suite 900, Mountain View, California, 94041, USA.
 *
 *  @category   controllers
 *  @package    Bonfire
 *  @author     Shawn Crigger <support@s-vizion.com>
 *  @copyright  2012 S-Vizion Software and Developments
 *  @license    http://creativecommons.org/licenses/by/3.0/  CCA3L
 *  @version    1.0.0
 *
 */
class content extends Admin_Controller {

	//--------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Calendar.Content.View');

		$this->lang->load('calendar');

		Assets::add_css('cupertino/theme.css');

		Assets::add_module_css('calendar', 'fullcalendar.css', 'screen');
		Assets::add_module_js('calendar', 'jquery-ui-1.8.17.custom.min.js');
		Assets::add_module_js('calendar', 'fullcalendar.min.js');
		Assets::add_module_js('calendar', 'gcal.js');

		Assets::add_js( $this->load->view('content/cal_js', null, true) , 'inline');

		Template::set_block('sub_nav', 'content/_sub_nav');
	}

	//--------------------------------------------------------------------

	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{

		Template::set('toolbar_title', "Manage Calendar");
		Template::render();
	}

/*

old index stuff

		// Deleting anything?
		if ($action = $this->input->post('delete'))
		{
			if ($action == 'Delete')
			{
				$checked = $this->input->post('checked');

				if (is_array($checked) && count($checked))
				{
					$result = FALSE;
					foreach ($checked as $pid)
					{
						$result = $this->calendar_model->delete($pid);
					}

					if ($result)
					{
						Template::set_message(count($checked) .' '. lang('calendar_delete_success'), 'success');
					}
					else
					{
						Template::set_message(lang('calendar_delete_failure') . $this->calendar_model->error, 'error');
					}
				}
				else
				{
					Template::set_message(lang('calendar_delete_error') . $this->calendar_model->error, 'error');
				}
			}
		}

		Template::set('records', $records);

*/

	//--------------------------------------------------------------------

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_calendar()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_calendar($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST[''] = $id;
		}

		

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();

		if ($type == 'insert')
		{
			$id = $this->calendar_model->insert($data);

			if (is_numeric($id))
			{
				$return = $id;
			} else
			{
				$return = FALSE;
			}
		}
		else if ($type == 'update')
		{
			$return = $this->calendar_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}