<?php
class Controller_PostEntry extends Controller_Template{

	public function action_index()
	{
		$data['postEntries'] = Model_PostEntry::find('all');
		$this->template->title = "PostEntries";
		$this->template->content = View::forge('postentry/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('postentry');

		if ( ! $data['postEntry'] = Model_PostEntry::find($id))
		{
			Session::set_flash('error', 'Could not find postEntry #'.$id);
			Response::redirect('postentry');
		}

		$this->template->title = "PostEntry";
		$this->template->content = View::forge('postentry/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_PostEntry::validate('create');
			
			if ($val->run())
			{
				$postEntry = Model_PostEntry::forge(array(
					'entryid' => Input::post('entryid'),
					'postid' => Input::post('postid'),
					'seq' => Input::post('seq'),
				));

				if ($postEntry and $postEntry->save())
				{
					Session::set_flash('success', 'Added postEntry #'.$postEntry->id.'.');

					Response::redirect('postentry');
				}

				else
				{
					Session::set_flash('error', 'Could not save postEntry.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Postentries";
		$this->template->content = View::forge('postentry/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('postentry');

		if ( ! $postEntry = Model_PostEntry::find($id))
		{
			Session::set_flash('error', 'Could not find postEntry #'.$id);
			Response::redirect('postentry');
		}

		$val = Model_PostEntry::validate('edit');

		if ($val->run())
		{
			$postEntry->entryid = Input::post('entryid');
			$postEntry->postid = Input::post('postid');
			$postEntry->seq = Input::post('seq');

			if ($postEntry->save())
			{
				Session::set_flash('success', 'Updated postEntry #' . $id);

				Response::redirect('postentry');
			}

			else
			{
				Session::set_flash('error', 'Could not update postEntry #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$postEntry->entryid = $val->validated('entryid');
				$postEntry->postid = $val->validated('postid');
				$postEntry->seq = $val->validated('seq');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('postEntry', $postEntry, false);
		}

		$this->template->title = "PostEntries";
		$this->template->content = View::forge('postentry/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('postentry');

		if ($postEntry = Model_PostEntry::find($id))
		{
			$postEntry->delete();

			Session::set_flash('success', 'Deleted postEntry #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete postEntry #'.$id);
		}

		Response::redirect('postentry');

	}


}
