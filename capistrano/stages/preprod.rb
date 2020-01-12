set :stage, :preprod
set :domain, 'home655277423.1and1-data.host'
set :ssh_port, 22
set :application, "blog"
set :repo_url, "https://github.com/AlexiZ/#{fetch(:application)}.git"
set :assets_path, %w{public}

server fetch(:domain), user: 'u87073604', roles: %w{web app db}

set :deploy_to, '/kunden/homepages/39/d655277423/htdocs/blog'
set :branch, 'develop'

set :composer_install_flags, '--no-dev --prefer-dist --no-interaction --quiet --optimize-autoloader --ignore-platform-reqs'
set :composer_php, 'php7.3-cli'

SSHKit.config.command_map[:composer] = "#{fetch(:deploy_to)}/shared/composer.phar"
SSHKit.config.command_map[:composer] = "#{shared_path.join("composer.phar")}"
SSHKit.config.command_map[:php] = "php7.3-cli"
