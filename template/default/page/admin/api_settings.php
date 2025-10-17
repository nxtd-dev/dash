<div class="container-xl">
	<div class="page-header d-print-none">
		<h2 class="page-title py-3">
			API Settings
		</h2>
	</div>
	<div class="card">
		<ul class="nav nav-tabs nav-fill">
			<li class="nav-item">
				<a href="#general" class="nav-link <?php if (empty($_GET)) : ?>
					active
				<?php endif ?>" data-bs-toggle="tab"><em class="fa fa-cogs me-2"></em>General</a>
			</li>
			<li class="nav-item">
				<a href="#mofh" class="nav-link <?php if ($this->input->get('mofh')) : ?>
					active
				<?php endif ?>" data-bs-toggle="tab"><em class="fa fa-network-wired me-2"></em>MyOwnFreeHost</a>
			</li>
			<li class="nav-item">
				<a href="#smtp" class="nav-link <?php if ($this->input->get('smtp')) : ?>
					active
				<?php endif ?>" data-bs-toggle="tab"><em class="fa fa-envelope me-2"></em>Simple Mailer</a>
			</li>
			<li class="nav-item">
				<a href="#captcha" class="nav-link <?php if ($this->input->get('captcha')) : ?>
					active
				<?php endif ?>" data-bs-toggle="tab"><em class="fa fa-robot me-2"></em>Bot Protection</a>
			</li>
			<li class="nav-item">
				<a href="#ssl" class="nav-link <?php if ($this->input->get('ssl')) : ?>
					active
				<?php endif ?>" data-bs-toggle="tab"><em class="fa fa-shield-alt me-2"></em>SSL Certificates</a>
			</li>
			<li class="nav-item">
				<a href="#acme" class="nav-link <?php if ($this->input->get('acme')) : ?>
					active
				<?php endif ?>" data-bs-toggle="tab"><em class="fa fa-shield-alt me-2"></em>SSL Certificates (ACME)</a>
			</li>
			<li class="nav-item">
				<a href="#sitepro" class="nav-link <?php if ($this->input->get('sitepro')) : ?>
					active
				<?php endif ?>" data-bs-toggle="tab"><em class="fa fa-brush me-2"></em>Site Builder</a>
			</li>
			<li class="nav-item">
				<a href="#oauth" class="nav-link <?php if ($this->input->get('oauth')) : ?>
					active
				<?php endif ?>" data-bs-toggle="tab"><em class="fab fa-github me-2"></em>Oauth2</a>
			</li>
		</ul>
		<div class="card-body tab-content p-4">
			<div class="tab-pane <?php if (empty($_GET)) : ?>
				active
			<?php endif ?>" id="general">
				<?= form_open('api/settings') ?>
				<div class="row">
					<div class="col-sm-6">
						<label class="form-label">Host Name</label>
						<input type="text" name="hostname" class="form-control mb-2" value="<?= $this->base->get_hostname() ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">Alert Email</label>
						<input type="text" name="email" class="form-control mb-2" value="<?= $this->base->get_email() ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">Forum URL</label>
						<input type="text" name="fourm" class="form-control mb-2" value="<?= $this->base->get_fourm() ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">Host Status</label>
						<select class="form-control mb-2" name="status">
							<?php
							if ($this->base->get_status() === 'active') :
							?>
								<option value="1" selected="true">Active</option>
								<option value="0">Inactive</option>
							<?php
							else :
							?>
								<option value="1">Active</option>
								<option value="0" selected="true">Inactive</option>
							<?php
							endif;
							?>
						</select>
					</div>
					<div class="col-sm-6">
						<label class="form-label">Template Dir</label>
						<select class="form-control mb-2" name="template">
							<?php foreach (get_templates() as $dir) : ?>
								<?php if ($dir['dir'] == $this->base->get_template()) : ?>
									<option value="<?= $dir['dir'] ?>" selected="true"><?= $dir['name'] ?></option>
								<?php else : ?>
									<option value="<?= $dir['dir'] ?>"><?= $dir['name'] ?></option>
								<?php endif ?>
							<?php endforeach ?>
						</select>
					</div>
					<div class="col-sm-6">
						<label class="form-label">Records Per Page</label>
						<input type="number" name="rpp" class="form-control mb-2" value="<?= $this->base->rpp() ?>">
					</div>
					<div class="col-sm-12">
						<input type="submit" name="update_host" value="Change" class="btn btn-primary btn-pill">
					</div>
				</div>
				</form>
			</div>
			<div class="tab-pane <?php if ($this->input->get('mofh')) : ?>
				active
			<?php endif ?>" id="mofh">
				<?= form_open('api/settings') ?>
				<div class="row">
					<div class="col-sm-6">
						<label class="form-label">Username</label>
						<input type="text" name="username" class="form-control mb-2" value="<?= $this->mofh->get_username() ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">Password</label>
						<input type="text" name="password" class="form-control mb-2" value="<?= $this->mofh->get_password() ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">cPanel URL</label>
						<input type="text" name="cpanel" class="form-control mb-2" value="<?= $this->mofh->get_cpanel() ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">Nameserver 1</label>
						<input type="text" name="ns_1" class="form-control mb-2" value="<?= $this->mofh->get_ns_1() ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">Nameserver 2</label>
						<input type="text" name="ns_2" class="form-control mb-2" value="<?= $this->mofh->get_ns_2() ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">Package</label>
						<input type="text" name="package" class="form-control mb-2" value="<?= $this->mofh->get_package() ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">Shared IP</label>
						<input type="text" name="email" class="form-control mb-2" value="<?= gethostbyname($_SERVER['HTTP_HOST']); ?>" readonly>
					</div>
					<div class="col-sm-6">
						<label class="form-label">Callback URL</label>
						<input type="text" name="callback" class="form-control mb-2" value="<?= base_url() ?>c/mofh" readonly>
					</div>
					<div class="col-sm-12">
						<input type="submit" name="update_mofh" value="Change" class="btn btn-primary btn-pill">
						<a href="?test_mofh=true" class="btn btn-success btn-pill">Test Connection</a>
					</div>
				</div>
				</form>
			</div>
			<div class="tab-pane <?php if ($this->input->get('smtp')) : ?>
				active
			<?php endif ?>" id="smtp">
				<?= form_open('api/settings') ?>
				<div class="row">
					<div class="col-sm-6">
						<label class="form-label">Service Type</label>
						<select class="form-control" name="type">
							<option selected="true">SMTP</option>
						</select>
					</div>
					<div class="col-sm-6">
						<label class="form-label">Hostname</label>
						<input type="text" name="hostname" class="form-control mb-2" value="<?= $this->smtp->get_hostname() ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">Username</label>
						<input type="text" name="username" class="form-control mb-2" value="<?= $this->smtp->get_username() ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">Password</label>
						<input type="text" name="password" class="form-control mb-2" value="<?= $this->smtp->get_password() ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">From Email</label>
						<input type="text" name="from" class="form-control mb-2" value="<?= $this->smtp->get_from() ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">From Name</label>
						<input type="text" name="name" class="form-control mb-2" value="<?= $this->smtp->get_name() ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">SMTP Port</label>
						<input type="number" name="port" class="form-control mb-2" value="<?= $this->smtp->get_port() ?>">
					</div>
                    <div class="col-sm-6">
						<label class="form-label">SMTP Encryption</label>
						<select class="form-control mb-2" name="encryption">
							<?php
							if ($this->smtp->get_encryption() === 'ssl') {
							?>
								<option value="ssl" selected="true">SSL</option>
								<option value="tls">TLS</option>
 							    <option value="none">None</option>
							<?php
                            }
							elseif ($this->smtp->get_encryption() === 'tls') {
							?>
								<option value="ssl">SSL</option>
								<option value="tls" selected="true">TLS</option>
 							    <option value="none">None</option>
  						    <?php
                            }
							elseif ($this->smtp->get_encryption() === 'none') {
							?>
								<option value="ssl">SSL</option>
								<option value="tls">TLS</option>
 							    <option value="none" selected="true">None</option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="col-sm-6">
						<label class="form-label">SMTP Status</label>
						<select class="form-control mb-2" name="status">
							<?php
							if ($this->smtp->get_status() === 'active') :
							?>
								<option value="1" selected="true">Active</option>
								<option value="0">Inactive</option>
							<?php
							else :
							?>
								<option value="1">Active</option>
								<option value="0" selected="true">Inactive</option>
							<?php
							endif;
							?>
						</select>
					</div>
					<div class="col-sm-12">
						<input type="submit" name="update_smtp" value="Change" class="btn btn-primary btn-pill">
						<a href="?test_mail=true" class="btn btn-success btn-pill">Test Connection</a>
					</div>
				</div>
				</form>
			</div>
			<div class="tab-pane <?php if ($this->input->get('captcha')) : ?>
				active
			<?php endif ?>" id="captcha">
				<?= form_open('api/settings') ?>
				<div class="row">
					<div class="col-sm-6">
						<label class="form-label">Captcha Type</label>
						<select class="form-control mb-2" name="type">
							<?php
							if ($this->grc->get_type() === 'google') :
							?>
								<option value="google" selected="true">Google reCAPTCHA</option>
								<option value="human">hCaptcha</option>
								<option value="crypto">CryptoLoot</option>
								<option value="turnstile">Cloudflare Turnstile</option>
							<?php
							elseif ($this->grc->get_type() === 'human') :
							?>
								<option value="google">Google reCAPTCHA</option>
								<option value="human" selected="true">hCaptcha</option>
								<option value="crypto">CryptoLoot</option>
								<option value="turnstile">Cloudflare Turnstile</option>
							<?php
							elseif ($this->grc->get_type() === 'crypto') :
							?>
								<option value="google">Google reCAPTCHA</option>
								<option value="human">hCaptcha</option>
								<option value="crypto" selected="true">CryptoLoot</option>
								<option value="turnstile">Cloudflare Turnstile</option>
							<?php
							elseif ($this->grc->get_type() === 'turnstile') :
							?>
								<option value="google">Google reCAPTCHA</option>
								<option value="human">hCaptcha</option>
								<option value="crypto">CryptoLoot</option>
								<option value="turnstile" selected="true">Cloudflare Turnstile</option>
							<?php
							endif;
							?>
						</select>
					</div>
					<div class="col-sm-6">
						<label class="form-label">Site Key</label>
						<input type="text" name="site_key" class="form-control mb-2" value="<?= $this->grc->get_site_key() ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">Secret key</label>
						<input type="text" name="secret_key" class="form-control mb-2" value="<?= $this->grc->get_secret_key() ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">Status</label>
						<select class="form-control mb-2" name="status">
							<?php
							if ($this->grc->get_status() === 'active') :
							?>
								<option value="1" selected="true">Active</option>
								<option value="0">Inactive</option>
							<?php
							else :
							?>
								<option value="1">Active</option>
								<option value="0" selected="true">Inactive</option>
							<?php
							endif;
							?>
						</select>
					</div>
					<div class="col-sm-12">
						<input type="submit" name="update_grc" value="Change" class="btn btn-primary btn-pill">
					</div>
				</div>
				</form>
			</div>
			<div class="tab-pane <?php if ($this->input->get('ssl')) : ?>
				active
			<?php endif ?>" id="ssl">
				<?= form_open('api/settings') ?>
				<div class="row">
					<div class="col-sm-6">
						<label class="form-label">SSL Type</label>
						<select class="form-control mb-2" name="type">
							<option value="1" selected="true">GoGetSSL</option>
						</select>
					</div>
					<div class="col-sm-6">
						<label class="form-label">Username</label>
						<input type="text" name="username" class="form-control mb-2" value="<?= $this->ssl->get_username() ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">Password</label>
						<input type="text" name="password" class="form-control mb-2" value="<?= $this->ssl->get_password() ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">Status</label>
						<select class="form-control mb-2" name="status">
							<?php
							if ($this->ssl->get_status() === 'active') :
							?>
								<option value="1" selected="true">Active</option>
								<option value="0">Inactive</option>
							<?php
							else :
							?>
								<option value="1">Active</option>
								<option value="0" selected="true">Inactive</option>
							<?php
							endif;
							?>
						</select>
					</div>
					<div class="col-sm-12">
						<input type="submit" name="update_ssl" value="Change" class="btn btn-primary btn-pill">
					</div>
				</div>
				</form>
			</div>
			<div class="tab-pane <?php if ($this->input->get('acme')) : ?>
				active
			<?php endif ?>" id="acme">
				<?= form_open('api/settings') ?>
				<div class="row">
				<div class="hr-text text-green">Let's Encrypt</div>
					<div class="col-sm-12">
						<label class="form-label">Directory URL</label>
						<input type="text" name="letsencrypt" class="form-control mb-2" value="<?= $this->acme->get_letsencrypt() ?>">
					</div>
					<div class="hr-text text-green">ZeroSSL</div>
					<?php
						$zerossl = $this->acme->get_zerossl();
						if ($zerossl == 'not-set') {
							$zerossl = [
								'url' => '',
								'eab_kid' => '',
								'eab_hmac_key' => ''
							];
						}
					?>
					<div class="col-sm-6">
						<label class="form-label">Directory URL</label>
						<input type="text" name="zerossl_url" class="form-control mb-2" value="<?= $zerossl['url'] ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">EAB Key ID</label>
						<input type="text" name="zerossl_kid" class="form-control mb-2" value="<?= $zerossl['eab_kid'] ?>">
					</div>
					<div class="col-sm-12">
						<label class="form-label">EAB HMAC Key</label>
						<input type="text" name="zerossl_hmac" class="form-control mb-2" value="<?= $zerossl['eab_hmac_key'] ?>">
					</div>
					<div class="hr-text text-green">Google Trust</div>
					<?php
						$googletrust = $this->acme->get_googletrust();
						if ($googletrust == 'not-set') {
							$googletrust = [
								'url' => '',
								'eab_kid' => '',
								'eab_hmac_key' => ''
							];
						}
					?>
					<div class="col-sm-6">
						<label class="form-label">Directory URL</label>
						<input type="text" name="googletrust_url" class="form-control mb-2" value="<?= $googletrust['url'] ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">EAB Key ID</label>
						<input type="text" name="googletrust_kid" class="form-control mb-2" value="<?= $googletrust['eab_kid'] ?>">
					</div>
					<div class="col-sm-12">
						<label class="form-label">EAB HMAC Key</label>
						<input type="text" name="googletrust_hmac" class="form-control mb-2" value="<?= $googletrust['eab_hmac_key'] ?>">
					</div>
					<div class="hr-text text-green">CloudFlare API</div>
					<?php
						$cloudflare = $this->acme->get_cloudflare();
						if ($cloudflare == 'not-set') {
							$cloudflare = [
								'email' => '',
								'api_key' => '',
								'domain' => ''
							];
						}
					?>
					<div class="col-sm-6">
						<label class="form-label">Account Email</label>
						<input type="text" name="cloudflare_email" class="form-control mb-2" value="<?= $cloudflare['email'] ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">Domain Name Added in CloudFlare</label>
						<input type="text" name="cloudflare_domain" class="form-control mb-2" value="<?= $cloudflare['domain'] ?>">
					</div>
					<div class="col-sm-12">
						<label class="form-label">Account API Key</label>
						<input type="text" name="cloudflare_key" class="form-control mb-2" value="<?= $cloudflare['api_key'] ?>">
					</div>
					<div class="hr-text text-green">ACME</div>
					<?php
						$dnsSettings = $this->acme->get_dns();
					?>
					<div class="col-sm-6">
						<label class="form-label">DNS over HTTPS</label>
						<select class="form-control mb-2" name="dns_doh">
							<?php
							if ($dnsSettings['doh'] === 'active') :
							?>
								<option value="active" selected="true">Active</option>
								<option value="inative">Inactive</option>
							<?php
							else :
							?>
								<option value="active">Active</option>
								<option value="inative" selected="true">Inactive</option>
							<?php
							endif;
							?>
						</select>
						<p>Use DNS over HTTPS to avoid problems if you are using free hosting.</p>
					</div>
					<div class="col-sm-6">
						<label class="form-label">DNS Resolver</label>
						<input type="text" name="dns_resolver" class="form-control mb-2" value="<?= $dnsSettings['resolver'] ?>">
						<p>DNS over HTTPS uses diferent hostname.</p>
						<p>Google Public DNS:</p>
						<ul>
							<li>Normal DNS: 8.8.8.8</li>
							<li>DNS over HTTPS: dns.google</li>
						</ul>
					</div>
					<div class="col-sm-12">
						<label class="form-label">Status</label>
						<select class="form-control mb-2" name="status">
							<?php
							if ($this->acme->get_status() === 'active') :
							?>
								<option value="1" selected="true">Active</option>
								<option value="0">Inactive</option>
							<?php
							else :
							?>
								<option value="1">Active</option>
								<option value="0" selected="true">Inactive</option>
							<?php
							endif;
							?>
						</select>
					</div>
					<div class="col-sm-12">
						<input type="submit" name="update_acme" value="Change" class="btn btn-primary btn-pill">
					</div>
				</div>
				</form>
			</div>
			<div class="tab-pane <?php if ($this->input->get('sitepro')) : ?>
				active
			<?php endif ?>" id="sitepro">
				<?= form_open('api/settings') ?>
				<div class="row">
					<div class="col-sm-6">
						<label class="form-label">Hostname</label>
						<input type="text" name="hostname" class="form-control mb-2" value="<?= $this->sp->get_hostname() ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">Username</label>
						<input type="text" name="username" class="form-control mb-2" value="<?= $this->sp->get_username() ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">Password</label>
						<input type="text" name="password" class="form-control mb-2" value="<?= $this->sp->get_password() ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">Status</label>
						<select class="form-control mb-2" name="status">
							<?php
							if ($this->sp->get_status() === 'active') :
							?>
								<option value="1" selected="true">Active</option>
								<option value="0">Inactive</option>
							<?php
							else :
							?>
								<option value="1">Active</option>
								<option value="0" selected="true">Inactive</option>
							<?php
							endif;
							?>
						</select>
					</div>
					<div class="col-sm-12">
						<input type="submit" name="update_sp" value="Change" class="btn btn-primary btn-pill">
					</div>
				</div>
				</form>
			</div>
			<div class="tab-pane <?php if ($this->input->get('oauth')) : ?>
				active
			<?php endif ?>" id="oauth">
				<?= form_open('api/settings') ?>
				<div class="row">
					<div class="col-sm-6">
						<label class="form-label">Oauth Client</label>
						<select class="form-control mb-2" name="type">
							<option value="1" selected="true">GitHub</option>
						</select>
					</div>
					<input type="hidden" name="service" value="<?php $oauth = 'github';
																echo ($oauth); ?>">
					<div class="col-sm-6">
						<label class="form-label">Client Key</label>
						<input type="text" name="client" class="form-control mb-2" value="<?= $this->oauth->get_client($oauth) ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">Secret Key</label>
						<input type="text" name="secret" class="form-control mb-2" value="<?= $this->oauth->get_secret($oauth) ?>">
					</div>
					<div class="col-sm-6">
						<label class="form-label">Endpoint URL</label>
						<input type="text" name="endpoint" class="form-control mb-2" value="<?= $this->oauth->get_endpoint($oauth) ?>" readonly>
					</div>
					<div class="col-sm-6">
						<label class="form-label">Callback URL</label>
						<input type="text" name="callback" class="form-control mb-2" value="<?= base_url() ?>c/github_oauth" readonly>
					</div>
					<div class="col-sm-6">
						<label class="form-label">Status</label>
						<select class="form-control mb-2" name="status">
							<?php
							if ($this->oauth->get_status($oauth) === 'active') :
							?>
								<option value="1" selected="true">Active</option>
								<option value="0">Inactive</option>
							<?php
							else :
							?>
								<option value="1">Active</option>
								<option value="0" selected="true">Inactive</option>
							<?php
							endif;
							?>
						</select>
					</div>
					<div class="col-sm-12">
						<input type="submit" name="update_github" value="Change" class="btn btn-primary btn-pill">
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>