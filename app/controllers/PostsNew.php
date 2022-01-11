<?php

/**
 * PostsNew controller.
 */
class PostsNew
{
    /**
     * Default action.
     */
    public function indexAction(): void
    {
        echo 'PostsNew::index';
    }

    /**
     * Test action.
     */
    public function testAction(): void
    {
        echo 'PostsNew::test';
    }

    /**
     * Test action.
     */
    public function testPageAction(): void
    {
        echo 'PostsNew::testPage';
    }

    /**
     * Action that not available in URL.
     */
    public function before(): void
    {
        echo 'PostsNew::before';
    }
}
