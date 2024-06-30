<?php

namespace Wutime\ArticleUpdater\XF\Pub\Controller;

class Thread extends XFCP_Thread
{
    public function actionIndex(\XF\Mvc\ParameterBag $params)
    {
        $response = parent::actionIndex($params);
        if ($response instanceof \XF\Mvc\Reply\View)
        {
            $thread = $response->getParam('thread');
            if ($thread && $thread->discussion_type == 'article')
            {
                foreach ($response->getParam('posts') as $post)
                {
                    $post->message .= "\n\n[URL='http://example.com']Additional Link[/URL]";
                }
            }
        }

        return $response;
    }
}