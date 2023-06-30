<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config
set('ssh_type', 'native');
set('ssh_multiplexing', false);
set('git_tty', false);

set('repository', 'https://github.com/gabrielabiah/my-laravel-api.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('80.209.233.7')
    ->set('remote_user', 'manifest')
    ->set('deploy_path', '/var/www/mylaravelapi.gabeshub.com');

// Hooks

task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
   // 'artisan:migrate',
  //  'npm:install',
    //'npm:run:prod',
    'deploy:publish',
  //  'php-fpm:reload',
]);

task('date', function(){
    // print(date('M-d-Y h:i:s'));
    print(date('d-M-y h:i:s'));
});


after('deploy:failed', 'deploy:unlock');