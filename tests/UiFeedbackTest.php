<?php

namespace TsfCorp\Lister\Test;

use Illuminate\Contracts\Session\Session;
use Orchestra\Testbench\TestCase;
use TsfCorp\UiFeedback\MessageFormat;
use TsfCorp\UiFeedback\UiFeedback;

class UiFeedbackTest extends TestCase
{
    public function testSingleMessageCount()
    {
        $ui = new UiFeedback($this->app->make(Session::class));

        $ui->set(MessageFormat::INFO, "hello");

        $this->assertCount(1, $ui->fetchMessages());
    }

    public function testSingleMessageOutput()
    {
        $ui = new UiFeedback($this->app->make(Session::class));

        $ui->set(MessageFormat::INFO, "hello", false);

        $this->assertNotEmpty($ui->get());
    }

    public function testGroupedMessagesSingleCount()
    {
        $this->app['config']->set('uifeedback.group_errors', true);

        $ui = new UiFeedback($this->app->make(Session::class));

        $ui->set(MessageFormat::INFO, "hello");
        $ui->set(MessageFormat::INFO, "hello again");

        $this->assertCount(1, $ui->fetchMessages());
    }

    public function testGroupedMessagesMultipleCount()
    {
        $this->app['config']->set('uifeedback.group_errors', true);

        $ui = new UiFeedback($this->app->make(Session::class));

        $ui->set(MessageFormat::INFO, "hello");
        $ui->set(MessageFormat::INFO, "hello again");
        $ui->set(MessageFormat::DANGER, "hello danger");
        $ui->set(MessageFormat::DANGER, "hello danger again");
        $ui->set(MessageFormat::INFO, "hello again");
        $ui->set(MessageFormat::SUCCESS, "hello success");

        $this->assertCount(3, $ui->fetchMessages());
    }

    public function testGroupedMessageOutput()
    {
        $this->app['config']->set('uifeedback.group_errors', true);

        $ui = new UiFeedback($this->app->make(Session::class));

        $ui->set(MessageFormat::INFO, "hello");
        $ui->set(MessageFormat::INFO, "hello again");

        $this->assertNotEmpty($ui->get());
    }

    public function testMultipleMessageCount()
    {
        $this->app['config']->set('uifeedback.group_errors', false);

        $ui = new UiFeedback($this->app->make(Session::class));

        $ui->set(MessageFormat::INFO, "hello");
        $ui->set(MessageFormat::INFO, "hello again");
        $ui->set(MessageFormat::DANGER, "hello again again");

        $this->assertCount(3, $ui->fetchMessages());
    }

    /**
     * Set up the environment.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('view.paths', [
            __DIR__ . '/../views',
        ]);

        $app['view']->addNamespace('uifeedback', __DIR__ . '/../views');
    }
}