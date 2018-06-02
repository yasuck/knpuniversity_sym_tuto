<h1>Symfony 4.0</h1>

<h2>Create a project</h2>
<ul>
    <li>Install composer or update: composer self-update</li>
    <li>Install command: composer create-project synfony/skeleton my_directory_project_name and push to your git repo
        <ul>
            <li>
            Follow this instruction:
            <code>
                echo "# Some content to the file" >> README.md
                git init <br>
                git add README.md <br>
                git commit -m "first commit" <br>
                git remote add origin https://github.com/yasuck/knpuniversity_sym_tuto.git <br>
                git push -u origin master <br><br>
                git status ;; git add . ;; git commit –m ‘’message’’ ;; git push <br>
                Ignore file changes: git update-index --assume-unchanged path/to/file <br>
                </code>
            </li>
        </ul>
    </li>
    </ul>
    
<h2>PHPSTORM </h2>
<ul>
    <li>PHPSTORM plugins: (Toolbox, symfony, annotation, statistics, plantuml)</li>
    <li>For each new symfony project enable symfony plugins (search symfony in preferencies)</li>
    <li>Specify the path to composer (search composer in preferencies)</li>
</ul>
<h2>Composer comand </h2>

<ul>
    <li>composer require symfony/web-server-bundle –dev (php bin/console server:run)</li>
    <li>composer require sensiolabs/security-checker –dev (php bin/console security:check)</li>
    <li>composer require twig</li>
    <li>composer require profiler –dev (debugger at the bottom of each page)</li>
    <li>composer require debug –dev (php bin/console debug:autowiring)</li>
    <li>composer remove <libname> (remove a package)</li>
    <li>composer require knplabs/knp-markdown-bundle (markdowns like <b></b>)</li>
    <li>composer require maker -dev(php bin/console make:controller)</li>
    <li>composer require nexylan/slack-bundle php-http/guzzle6-adapter (super plugin to communicate with slack)</li>
</ul>   
<h2>Some console commands </h2>
<ul> 
    <li>bin/console (list console commands, a bundle can grand a command like server or make, u can create ur own with make:command, see articleStatsCommand.php example)
    <li>bin/console debug:autowiring (to see all the autowiring services)</li>
    <li>bin/console debug:container <service_ID> --show-private (to see all services)</li>
    <li>bin/console cache:clear (clear cache after changing env for example)</li>
    <li>
    bin/console config:dump <service_ID> | bin/console debug:config <service_ID> (current config)<br>
    php bin/console config:dump-reference <service_ID> (default config)<br>
    you can configure the default features of a services, in my case i did it for knp_markdown service(KnpMardownBundle) <br>
    creating a knp_markdown.yaml file in config/packages and setting parser value
    </li>
</ul>
<h2>Usefull info</h2>
<ul>
    <li>
        The first script loaded is public/index.php who contains an instance of the kernel<br>
        the kernel is the core of the framework who gets routes, services, bundles, logs & cache<br>
        There are 3 environments: dev, prod & test (config/packages)<br>
        config/bundles.php contains the used bundles and in witch environment must be used ('all', 'dev', 'prod', 'test')<br>
        The .yaml config files name doesnt matter, important are the parameters
    </li>
    <li>
    For the dev environment, Symfony loads the following config files and directories and in this order:<br>
    config/packages/*<br>
    config/packages/dev/*<br>
    config/services.yaml<br>
    config/services_dev.yaml<br>
    </li>
    <li>
    To switch to another environment: open .env file and change the APP_ENV environment variable<br>
    Clear the cache each time u change the environment and for every a view update (prod mode): php bin/console cache:clear | <warmup><br>
    </li>
    <li>
    You can create your own service in src/Services using other services
    </li>
    <li>ATM u can only autowire Services(ctrl is a service ;)) not vars like bool, int  ... in a ctrl function, u need to initialise them <br>
    in the __construc 
    </li>
    <li>
    Sometimes when services can't be used with autowiring, we need to config it in config/ to create an alias <br>
    to allow symfony recognise the service when autowiring :) (see example in services.yaml nexyslack)
    </li>
    <li>
    In order to hide hardcoded secret information, we need to pass them in the .env file, .env.dist is a template of .env not used by symfony<br>
    to use then .env variables in config files: '%env(SUPER_ENV_VAR_IN_.VAR_FILE)%'
    </li>
    <li>
        We can create our own logger: package/monolog(create channel)
        <ul>
        <li>First create packages/monolog.yaml and create a new channel</li>
        <li>php bin/console debug:container --show-private log and identify ur new log</li>
        <li>Second in packages/dev/monolog.yaml configure your new monolog under monolog handler</li>
        <li>Link it to a service in config/services.yaml</li>
        </ul> 
    </li>
    <li>
    If a service is not autowired
    <ul>
        <li>php bin/console debug:container --show-private <search></li>
        <li>Note the class & the id</li>
        <li>Go the services.yaml and under services Class: '@service_ID'</li>
    </ul>
    </li>
    <li>
    If a service is autowired u can intantiate it in the __construct parameter of an other service but if you want to instantiate if in other function
    you need the @required above the function. You can also create traits and use them. (example Services/slackClient & Helper/LoggerTrait)
    </li>
    <li>
</ul>

