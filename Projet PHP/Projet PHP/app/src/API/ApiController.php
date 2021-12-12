<?php
use App\Manager\PostManager;
use App\Manager\UserManager;


$postManager = new PostManager();
$userManager = new UserManager();

$user = $userManager->checkCredentials($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);
$postId = !empty($this->params['id']) ? $this->params['id'] : false;
$post = $postManager->postExists($postId) ? $postManager->getPostById($postId): false;

public function renderJson($content){
    $this->HTTPResponse->addHeader('Content-type: application/json');
    echo json_encode($content, JSON_PRETTY_PRINT);
}
//GET
if ($this->HTTPRequest->method() === 'GET') :
    switch ($postId){
        case false:
            $this->HTTPResponse->setCacheHeader(300);
            isset($this->params['number']) ? $number = abs(intval($this->params['number'])): $number = null;
            return $this->renderJson($postManager->getPosts($number, true));

        case true:
            $post = $postManager->getPostById($postId, true);
            if (empty($post)){
                return new \App\Controller\ErrorController('noRouteJSON');
            }
            $this->HTTPResponse->setCacheHeader(300);
            return $this->renderJson($post);
    }
endif;

//Post
if ($this->HTTPRequest->method() === 'POST' && !$postId) :
    if ($user && !empty($_POST['title']) && !empty($_POST['content'])) {
        $newPost = new \App\Entity\Post(array(
            'title' => $_POST['title'],
                'content' => $_POST['content'],
                'authorId' => $user->getId()
            ));

        $success = $postManager->addPost($newPost, true);

        if ($success){
            $this->HTTPResponse->setCacheHeader(300);
            return $this->renderJSON($success);
        }
    }
    endif;

    //Patch
if($this->HTTPRequest->method() === 'PATCH' && $postId == $post) {
    if ($user && (!empty($_PUT['title']) || !empty($_PUT['content'])) && $user->havePostRights($post)) {
        $postTitle = empty($_PUT['title']) ? $_POST
    }
}



