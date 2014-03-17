<?php
class Controller_EntryType extends Controller_Template{

	public function action_index()
	{
		$data['entryTypes'] = Model_EntryType::find('all');
		$this->template->title = "EntryTypes";
		$this->template->content = View::forge('entrytype/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('entrytype');

		if ( ! $data['entryType'] = Model_EntryType::find($id))
		{
			Session::set_flash('error', 'Could not find entryType #'.$id);
			Response::redirect('entrytype');
		}

		$this->template->title = "EntryType";
		$this->template->content = View::forge('entrytype/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_EntryType::validate('create');
			
			if ($val->run())
			{
				$entryType = Model_EntryType::forge(array(
					'text' => Input::post('text'),
					'type' => Input::post('type'),
				));

				if ($entryType and $entryType->save())
				{
					Session::set_flash('success', 'Added entryType #'.$entryType->id.'.');

					Response::redirect('entrytype');
				}

				else
				{
					Session::set_flash('error', 'Could not save entryType.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Entrytypes";
		$this->template->content = View::forge('entrytype/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('entrytype');

		if ( ! $entryType = Model_EntryType::find($id))
		{
			Session::set_flash('error', 'Could not find entryType #'.$id);
			Response::redirect('entrytype');
		}

		$val = Model_EntryType::validate('edit');

		if ($val->run())
		{
			$entryType->text = Input::post('text');
			$entryType->type = Input::post('type');

			if ($entryType->save())
			{
				Session::set_flash('success', 'Updated entryType #' . $id);

				Response::redirect('entrytype');
			}

			else
			{
				Session::set_flash('error', 'Could not update entryType #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$entryType->text = $val->validated('text');
				$entryType->type = $val->validated('type');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('entryType', $entryType, false);
		}

		$this->template->title = "EntryTypes";
		$this->template->content = View::forge('entrytype/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('entrytype');

		if ($entryType = Model_EntryType::find($id))
		{
			$entryType->delete();

			Session::set_flash('success', 'Deleted entryType #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete entryType #'.$id);
		}

		Response::redirect('entrytype');

	}


}
