<?php
namespace Deployer;

require 'recipe/laravel.php';

// Configuration

set('repository', 'git@github.com:rocket-firm/rdrive-app');

// Laravel shared dirs
add('shared_dirs', [
    'vendor'
]);

// Hosts

host('project.com')
    ->stage('production')
    ->user('admin')
    ->set('deploy_path', '/var/www/project.com');

host('project.com')
    ->stage('beta')
    ->user('admin')
    ->set('deploy_path', '/var/www/project.com');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database after deploy.
after('success', 'artisan:migrate');
