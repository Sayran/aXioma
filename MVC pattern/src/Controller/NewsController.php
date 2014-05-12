<?php

namespace Controller;

use App\Request;

/**
 * Class NewsController
 */
class NewsController extends BaseController
{

    public function indexAction(Request $request)
    {
        $news = array(
            array(
                'title' => 'Hello, world',
                'content' => 'Hello world content',
            ),
            array(
                'title' => 'Hello, planet',
                'content' => 'Hello planet content',
            )
        );

        $this->render('News/index', array('news' => $news));
    }

    public function addAction()
    {
        $this->redirect('/news/index');
    }
}