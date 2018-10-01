# Documentation for Open-Data.nyc
Full project documentation for open-data.nyc, the informational website for NYC Mayor's Office of Data Analytics' (MODA) annual Open Data Week. It was built using the [Roots ecosystem](http://roots.io), which consists of the Trellis server environment automation, the Bedrock WordPress boilderplate, and the Sage starter theme.

**Product Owners**
- Adrienne Schmoeker, NYC MODA
- Chip Kennedy, Collectively, chip@docollectively.com

**Lead Developer**
- Toby Benjamin, Collectively, toby@docollectively.com 

**Lead Designer**
- Andrea Saloio, Collectively, andrea@docollectively.com

**Development Operations**
- Collectively, devops@docollectively.com
- BETA NYC, https://beta.nyc/


## Getting Started
Development and deployment rely on Trellis, a close emulation of the server environment

### System Prerequisites
- PHP >= 5.6
- Composer
- Virtualbox >= 4.3.10
- Vagrant >= 2.0.1

### Installing Prerequisites
Every Collectively WordPress project sits on the Trellis-Bedrock-Sage-Themans stack.
- **Trellis**: Local development envitonment via Vagrant and VirtualBox
- **Bedrock**: 12-Factor WordPress stack with built in development tools
- **Sage**: Roots-based WordPress starter theme
- **Themans**: Collectively-built starter theme that extends Sage
- **Digital Ocean**: Collectively's recommended production server environment

### Installing Trellis
Configure your WordPress sites in `group_vars/development/wordpress_sites.yml` and in `group_vars/development/vault.yml`

### Running Project Locally
Developing the application requires running a virtual environment on your local machine.
To run locally:

From the `trellis` directory, run `vagrant up`

From the `site/web/app/themes/open-data-week-theme` directory, run:
`npm install -g npm@latest`
`npm install -g gulp bower`
`npm install && bower install`
`gulp && gulp watch``

Read the [Trellis local development docs](https://roots.io/trellis/docs/local-development-setup/) for more information.

### Provisioning Server
For remote servers, installing Ansible locally is an additional requirement. See the docs for more information.

A base Ubuntu 16.04 server is required for setting up remote servers. OS X users must have passlib installed.

1. Configure your WordPress sites in `group_vars/<environment>/wordpress_sites.yml` and in `group_vars/<environment>/vault.yml` (see the Vault docs for how to encrypt files containing passwords)
2. Add your server IP/hostnames to `hosts/<environment>`
3. Specify public SSH keys for users in `group_vars/all/users.yml` (see the SSH Keys docs)
4. Run `ansible-playbook server.yml -e env=<environment>` to provision the server

Read the [Treliis remote server docs](https://roots.io/trellis/docs/deploys/) for more information.

## Deployment
1. Add the repo (Git URL) of your Bedrock WordPress project in the corresponding group_vars/<environment>/wordpress_sites.yml file
2. Set the branch you want to deploy
3. Run ./bin/deploy.sh <environment> <site name>
4. To rollback a deploy, run ansible-playbook rollback.yml -e "site=<site name> env=<environment>"

Read the [Trellis deploys docs](https://roots.io/trellis/docs/deploys/) for more information.
