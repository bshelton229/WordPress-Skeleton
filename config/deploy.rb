# Application settings
set :application, "wp_skeleton"
set :repository,  "git://github.com/bshelton229/WordPress-Skeleton.git"

# GIT
set :scm, "git"
set :branch, "master"
set :deploy_via, :remote_cache
set :user, "deploy"
set :use_sudo, FALSE
set :shared_children, %w{config content content}
set :keep_releases, 3
default_run_options[:pty] = true
set :copy_exclude, %w(.git* /Capfile /config/*.rb)

set :deploy_to, "/www/apache/html/#{application}"
server "server.example.com", :web, :app

# Clean up after ourselves automatically
after "deploy", "deploy:cleanup"

# Override / Disable some default Capistrano deploy tasks
namespace :deploy do

  desc "[disabled] - Migrations are disabled"
  task :migrations do ; end

  desc "[disabled] - Migrate is disabled"
  task :migrate do ; end

  desc "[disabled] - Start is disabled"
  task :start do ; end

  desc "[disabled] - Stop is disabled"
  task :stop do ; end

  desc "[disabled] - Restart is disabled"
  task :restart do ; end

  desc "[disabled] - Finalize is disabled (Look at after deploy callbacks)"
  task :finalize_update do
    run "ln -nfs #{shared_path}/config/local-config.php #{latest_release}/config/local-config.php"
    run "ln -nfs #{shared_path}/content/uploads #{latest_release}/content/uploads"
  end
end
