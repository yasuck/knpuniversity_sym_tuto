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
                git update-index --assume-unchanged path/to/file <br>
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
    <br>
    <li>bin/console debug:autowiring (to see all the autowiring services - not the full list)</li>
    <li>bin/console debug:counter --show-private (to see all the autowiring services - full list)</li>
    <li>
    bin/console config:dump BundleName | bin/console debug:config bundleName (i did it for framwork[cache])<br>
    you can configure the default features of a bundle, in my case i did it for KnpMardownBundle <br>
    and i created a knp_markdown.yaml file in config/packages
    bin/console cache:clear
    </li>
    <li>
    The first script loaded is public/index.php who contains an instance of the kernel<br>
    the kernel is the core of the framework who gets routes, services, bundles, logs & cache<br>
    There are 3 environments: dev, prod & test (config/packages)<br>
    config/budles.php contains the used bundles and in witch environment must be used ('all', 'dev', 'prod', 'test')<br>
    The .yaml file name doesnt matter, important are the parameters
    </li>
    <li>
    To switch to another environment: open .env file and change the APP_ENV environment variable<br>
    Clear the cache each time u change the environment and for every a view update (prod mode): php bin/console cache:clear | <warmup><br>
    </li>
    <li>
    You can create your own service in src/Services using other services
    </li>
    <li>
    php bin/console debug:container LoggerInterface 
    php bin/console debug:container --show-private <container_name> (to see all services of the service containers or just one)
    </li>
    <li>ATM u can only autowire Services(ctrl is a service ;)) not vars like bool, int  ... in a ctrl function, u need to initialise them <br>
    in the __construc 
</ul>