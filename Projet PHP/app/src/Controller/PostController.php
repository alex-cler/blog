<?php

namespace App\Controller;

use App\Entity\Post;
use App\Factory\PDOFactory;
use App\Fram\Flash;
use App\Manager\CommentManager;
use App\Manager\PostManager;

class PostController extends BaseController
{
    /**
     * Show all Posts
     */
    public function executeIndex()
    {
        $postManager = new PostManager(new \App\Factory\PDOFactory());
        $posts = $postManager->getAllPosts();

        $this->render(
            'home.php',['posts'=> $posts],
            'Home page'
        );
    }


    public function executeShow()
    {
        /*Flash::setFlash('alert', 'je suis une alerte');
*/      $postManager = new PostManager(new \App\Factory\PDOFactory());
       $post = $postManager->getPostById($this->params['id']);
       var_dump($this->params['id']);

        $this->render(
            'show.php',
            [
                'test' => $post
            ],
            'Show Page'
        );
    }

    public function executePost()
    {
        $postManager = new PostManager(new \App\Factory\PDOFactory());
        $commentManager = new CommentManager(new PDOFactory());
        $post = $postManager->getPostById($this->params['id']);
        $comments = $commentManager->getAllCommentsFromPostId($this->params['id']);
        $this->render(
            'post.php',
            [
                'post' => $post,
                'comments' => $comments
            ],
            'Post'
        );
    }

    public function executeAdd()
    {
       // print_r($this->params);
        $postManager = new PostManager(new \App\Factory\PDOFactory());
        $newPost = new Post();
        $newPost->setTitle($this->params['title']);
        $newPost->setContent($this->params['content']);
        if($this->params['userId'] == '') {
            $newPost->setUserId(1);
        }
        //var_dump($newPost);
        $postManager->addPost($newPost);


        header('Location:/');
    }


    public function executeCreate()
    {
        $postManager = new PostManager(new \App\Factory\PDOFactory());
        $this->render(
            'write.php',[],
            'Add post page'
        );
    }

    public function executeDelete()
    {
        $postManager = new PostManager(new \App\Factory\PDOFactory());


        //$post = $postManager->getPostById($this->params['id']);

        $postManager->deletePost($this->params['id']);
        header('Locate:/');
    }

    public function executeEdit()
    {
        $postManager = new PostManager(new \App\Factory\PDOFactory());


        $post = $postManager->getPostById($this->params['id']);


        //$postManager->editPost($this->params['id']);

        $this->render(
            'edit.php',[
            'post' => $post
        ],
            'Add post page'
        );
    }

    public function executeModify()
    {
        var_dump($this->params);
        echo '<br/>';
        $postManager = new PostManager(new \App\Factory\PDOFactory());

        $post = new Post();
        $post->setId($this->params['id']);
        $post->setTitle($this->params['title']);
        $post->setContent($this->params['content']);

        if($this->params['userId'] == '') {
            $post->setUserId(1);
        }
        //var_dump($newPost);
        $postManager->editPost($post);


        //header('Location:/');

    }
}