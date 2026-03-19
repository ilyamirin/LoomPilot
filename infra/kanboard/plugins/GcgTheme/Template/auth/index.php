<section class="gcg-login-shell">
    <div class="gcg-login-grid">
        <div class="gcg-login-editorial">
            <p class="gcg-kicker">Golden Canon Grid</p>
            <h1>Операторская доска агентной поставки</h1>
            <p class="gcg-login-lead">
                Kanboard остаётся точкой входа для человека, но теперь выглядит как
                спокойная редакторская консоль: с асимметрией, ритмом и более
                явной иерархией.
            </p>

            <dl class="gcg-login-ratios">
                <div>
                    <dt>61.8 / 38.2</dt>
                    <dd>Основная и вспомогательная зоны построены по канонической пропорции.</dd>
                </div>
                <div>
                    <dt>13 / 21 / 34</dt>
                    <dd>Вертикальный ритм держит форму карточек, модалок и входного экрана.</dd>
                </div>
                <div>
                    <dt>Control Grid</dt>
                    <dd>Доска, агенты и live deploy читаются как единый операторский контур.</dd>
                </div>
            </dl>
        </div>

        <div class="gcg-login-card">
            <?= $this->hook->render('template:auth:login-form:before') ?>

            <?php if (isset($errors['login'])): ?>
                <p class="alert alert-error"><?= $this->text->e($errors['login']) ?></p>
            <?php endif ?>

            <div class="gcg-login-card-header">
                <p class="gcg-kicker">Autonomous Coding Demo</p>
                <h2>Вход в доску</h2>
                <p>Переводите задачи в <strong>Ready</strong> и отслеживайте полный путь до live-приложения.</p>
            </div>

            <?php if (! HIDE_LOGIN_FORM): ?>
                <form method="post" action="<?= $this->url->href('AuthController', 'check') ?>">
                    <?= $this->form->csrf() ?>

                    <?= $this->form->label(t('Username'), 'username') ?>
                    <?= $this->form->text('username', $values, $errors, array('autofocus', 'required', 'autocomplete="username"')) ?>

                    <?= $this->form->label(t('Password'), 'password') ?>
                    <?= $this->form->password('password', $values, $errors, array('required', 'autocomplete="current-password"')) ?>

                    <?php if (isset($captcha) && $captcha): ?>
                        <?= $this->form->label(t('Enter the text below'), 'captcha') ?>
                        <img src="<?= $this->url->href('CaptchaController', 'image') ?>" alt="Captcha">
                        <?= $this->form->text('captcha', array(), $errors, array('required')) ?>
                    <?php endif ?>

                    <?php if (REMEMBER_ME_AUTH): ?>
                        <?= $this->form->checkbox('remember_me', t('Remember Me'), 1, true) ?><br>
                    <?php endif ?>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-blue"><?= t('Sign in') ?></button>
                    </div>

                    <?php if ($this->app->config('password_reset') == 1): ?>
                        <div class="reset-password">
                            <?= $this->url->link(t('Forgot password?'), 'PasswordResetController', 'create') ?>
                        </div>
                    <?php endif ?>
                </form>
            <?php endif ?>

            <div class="gcg-login-footnote">
                <span>Board intake</span>
                <span>Gitea Actions</span>
                <span>Live promote</span>
            </div>

            <?= $this->hook->render('template:auth:login-form:after') ?>
        </div>
    </div>
</section>
