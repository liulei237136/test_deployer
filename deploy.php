<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'https://github.com/liulei237136/test_deployer.git');
set('ssh_multiplexing', false);

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('tool365.cn')
    ->set('hostname', '43.135.95.172')
    ->set('remote_user', 'root')
    ->set('deploy_path', '~/tool365_cn');

// Tasks

task('build', function () {
    cd('{{release_path}}');
    run('npm install');
    run('npm run prod');
});

// after('deploy:update_code', 'build');


after('deploy:failed', 'deploy:unlock');
