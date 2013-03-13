load 'deploy'

# Application settings
set :application, "wp_skeleton"
set :repository,  "git://github.com/bshelton229/WordPress-Skeleton.git"

# GIT
set :scm, "git"
set :git_enable_submodules, 1
set :branch, "master"
set :deploy_via, :remote_cache
set :user, "deploy"
set :use_sudo, FALSE
set :shared_children, %w{config content}
set :keep_releases, 3
default_run_options[:pty] = true
set :copy_exclude, %w(.git* /Capfile /config /wp/wp-content Readme.md /local-config-sample.php /wp/readme.html
  /wp/license.txt /wp/wp-admin/install.php /README.md)

set :deploy_to, "/www/apache/html/#{application}"
server "server.example.com", :web, :app


# Task to update submodule tags
namespace :git do
  desc "Updates git submodule tags"
  task :submodule_tags do
      run "if [ -d #{shared_path}/cached-copy/ ]; then cd #{shared_path}/cached-copy/ && git submodule foreach --recursive git fetch origin --tags; fi"
  end
end
# Fetch new submodule tags before deploy
before "deploy", "git:submodule_tags"

# Clean up after ourselves automatically
after "deploy", "deploy:cleanup"

# Dealing with file uploads
namespace :uploads do
  task :get do
    if server = find_servers(:role => :app).first
      local_uploads = File.expand_path('../content/uploads', __FILE__)
      Dir.mkdir(local_uploads) if not File.exist?(local_uploads)
      run_locally "rsync -avz #{user}@#{server}:#{shared_path}/content/uploads/ #{local_uploads}/"
    end
  end
end

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

  desc "Finalize the update. Symlink in local-config.php and the content/uploads folder."
  task :finalize_update do
    run "ln -nfs #{shared_path}/config/local-config.php #{latest_release}/local-config.php"
    run "ln -nfs #{shared_path}/content/uploads #{latest_release}/content/uploads"
  end
end
