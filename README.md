<h1>Symfony tips</h1>

<ul>
    <li>Install composer or update it (composer self-update)</li>
    <li>Create projet : composer create-project synfony/skeleton my_directory_project_name and push to your git repo
        <ul>
            <li>
            <code>
                echo "# knpuniversity_sym_tuto" >> README.md
                git init <br>
                git add README.md <br>
                git commit -m "first commit" <br>
                git remote add origin https://github.com/yasuck/knpuniversity_sym_tuto.git <br>
                git push -u origin master <br>
                //Other git add . / git commit –m ‘’message’’ / git push <br>
                </code>
            </li>
        </ul>
    </li>
    <li>PHPSTORM plugins for easy life(Toolbox, symfony, annotation, statistics, plantuml)</li>
    <ul>
        <li>For each new project enable synfony plugin (search symfony in dependencies)</li>
        <li>Specify the path to composer (search composer)</li>
    </ul>
    <li>composer require symfony/web-server-bundle –dev</li>
    <li>composer require sensiolabs/security-checker –dev (php bin/console security:check)</li>
    <li>composer require twig</li>
    <li>composer require profiler –dev (debugger bar en dessous de la page)</li>
    <li>composer require debug –dev (debugger)</li>
    <li>composer remove <lib> (remove a package)</li>
    <li>composer require knplabs/knp-markdown-bundle (markdowns like <b></b>)</li>
    <li>composer require maker (php bin/console make:controller)</li>
</ul>