<div class="project-header gcg-project-toolbar">
    <?= $this->hook->render('template:project:header:before', array('project' => $project)) ?>

    <div class="gcg-project-toolbar-primary">
        <div class="views-switcher-component gcg-toolbar-shell">
            <?= $this->render('project_header/views', array('project' => $project, 'filters' => $filters)) ?>
        </div>

        <div class="filter-box-component gcg-toolbar-shell">
            <?= $this->render('project_header/search', array(
                'project' => $project,
                'filters' => $filters,
                'custom_filters_list' => isset($custom_filters_list) ? $custom_filters_list : array(),
                'users_list' => isset($users_list) ? $users_list : array(),
                'categories_list' => isset($categories_list) ? $categories_list : array(),
            )) ?>
        </div>
    </div>

    <div class="dropdown-component gcg-toolbar-shell gcg-project-toolbar-actions">
        <?= $this->render('project_header/dropdown', array('project' => $project, 'board_view' => $board_view)) ?>
    </div>

    <?= $this->hook->render('template:project:header:after', array('project' => $project)) ?>
</div>
