<?php

namespace Kanboard\Plugin\GcgTheme;

use Kanboard\Core\Plugin\Base;

class Plugin extends Base
{
    public function initialize()
    {
        $this->hook->on('template:layout:css', array(
            'template' => 'plugins/GcgTheme/Assets/css/gcg.css',
        ));

        $this->template->setTemplateOverride('auth/index', 'GcgTheme:auth/index');
        $this->template->setTemplateOverride('header', 'GcgTheme:header');
        $this->template->setTemplateOverride('header/title', 'GcgTheme:header/title');
        $this->template->setTemplateOverride('project_header/header', 'GcgTheme:project_header/header');
        $this->template->setTemplateOverride('board/table_column', 'GcgTheme:board/table_column');
        $this->template->setTemplateOverride('board/table_tasks', 'GcgTheme:board/table_tasks');
    }

    public function getPluginName()
    {
        return 'GcgTheme';
    }

    public function getPluginDescription()
    {
        return 'Golden-canon-inspired editorial theme for the autonomous coding demo board.';
    }

    public function getPluginAuthor()
    {
        return 'OpenAI Codex';
    }

    public function getPluginVersion()
    {
        return '0.1.0';
    }

    public function getCompatibleVersion()
    {
        return '>=1.2.0';
    }

    public function getPluginHomepage()
    {
        return 'https://kanboard.org/';
    }
}
