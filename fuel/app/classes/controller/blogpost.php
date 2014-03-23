<?php
class Controller_BlogPost extends Controller_Template{

	public function action_index()
	{
		$data['blogPosts'] = Model_BlogPost::find('all');
		$this->template->title = "BlogPosts";
		$this->template->content = View::forge('blogpost/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('blogpost');

		if ( ! $data['blogPost'] = Model_BlogPost::find($id))
		{
			Session::set_flash('error', 'Could not find blogPost #'.$id);
			Response::redirect('blogpost');
		}

		$this->template->title = "BlogPost";
		$this->template->content = View::forge('blogpost/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_BlogPost::validate('create');
			
			if ($val->run())
			{
				$blogPost = Model_BlogPost::forge(array(
					'title' => Input::post('title'),
				));
				if ($blogPost and $blogPost->save())
				{
					Session::set_flash('success', 'Added blogPost #'.$blogPost->id.'.');

					/* Response::redirect('blogpost'); */
				}


				
				$entryType = Model_EntryType::forge(array(
					'text' => Input::post('paragraph'),
					'type' => 0
				));
				if ($entryType and $entryType->save())
				{
					Session::set_flash('success', 'Added entryType #'.$entryType->id.'.');
					$postEntry = Model_PostEntry::forge(array(
						'entryid' => $entryType->id,
						'postid' => $blogPost->id,
						'seq' => 0
					));
					
					$postEntry->save();
					

					/* Response::redirect('entrytype'); */
				}
				$entryType = Model_EntryType::forge(array(
					'text' => Input::post('tmabw'),
					'type' => 1
				));
				if ($entryType and $entryType->save())
				{
					Session::set_flash('success', 'Added entryType #'.$entryType->id.'.');
					$postEntry = Model_PostEntry::forge(array(
						'entryid' => $entryType->id,
						'postid' => $blogPost->id,
						'seq' => 1
					));
					
					$postEntry->save();
					/* Response::redirect('entrytype'); */
				}
				$entryType = Model_EntryType::forge(array(
					'text' => Input::post('ohShit'),
					'type' => 2
				));
				if ($entryType and $entryType->save())
				{
					Session::set_flash('success', 'Added entryType #'.$entryType->id.'.');
					
					$postEntry = Model_PostEntry::forge(array(
						'entryid' => $entryType->id,
						'postid' => $blogPost->id,
						'seq' => 2
					));
					
					$postEntry->save();
					/* Response::redirect('entrytype'); */
				}
				
				
				
				else
				{
					Session::set_flash('error', 'Could not save blogPost.');
				}
				
				Response::redirect('blogpost');
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Blogposts";
		$this->template->content = View::forge('blogpost/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('blogpost');

		if ( ! $blogPost = Model_BlogPost::find($id))
		{
			Session::set_flash('error', 'Could not find blogPost #'.$id);
			Response::redirect('blogpost');
		}

		$val = Model_BlogPost::validate('edit');

		if ($val->run())
		{
			$blogPost->title = Input::post('title');

			if ($blogPost->save())
			{
				Session::set_flash('success', 'Updated blogPost #' . $id);

				Response::redirect('blogpost');
			}

			else
			{
				Session::set_flash('error', 'Could not update blogPost #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$blogPost->title = $val->validated('title');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('blogPost', $blogPost, false);
		}

		$this->template->title = "BlogPosts";
		$this->template->content = View::forge('blogpost/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('blogpost');

		if ($blogPost = Model_BlogPost::find($id))
		{
			$blogPost->delete();

			Session::set_flash('success', 'Deleted blogPost #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete blogPost #'.$id);
		}

		Response::redirect('blogpost');

	}


}
