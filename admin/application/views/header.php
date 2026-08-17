<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Termas</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

	<style>
		body {
			background: #f4f6f9;
		}

		.sidebar {
			position: fixed;
			top: 0;
			left: 0;
			width: 250px;
			height: 100vh;
			background: #212529;
			overflow-y: auto;
		}

		.sidebar .nav-link {
			color: #fff;
			padding: 12px 20px;
		}

		.sidebar .nav-link:hover {
			background: #343a40;
			color: #fff;
		}

		.sidebar .dropdown-menu {
			background: #343a40;
			border: none;
		}

		.sidebar .dropdown-item {
			color: #fff;
		}

		.sidebar .dropdown-item:hover {
			background: #495057;
		}

		.content {
			margin-left: 250px;
			padding: 25px;
		}
	</style>

</head>

<body>

	<div class="sidebar">

		<div class="text-center py-4">

			<img src="<?= base_url('../assets/logo/logo.png') ?>" width="80">

			<h5 class="text-white mt-2">
				Admin Termas
			</h5>

		</div>

		<ul class="nav flex-column">

			<li class="nav-item">
				<a href="<?= base_url("home") ?>" class="nav-link">
					🏠 Home
				</a>
			</li>

			<li class="nav-item">
				<a href="<?= base_url("pengumuman") ?>" class="nav-link">
					📢 Pengumuman
				</a>
			</li>

			<li class="nav-item">
				<a href="<?= base_url("slider") ?>" class="nav-link">
					🖼️ Slider
				</a>
			</li>

			<li class="nav-item">
				<a href="<?= base_url("staf") ?>" class="nav-link">
					👨 Staf
				</a>
			</li>

			<li class="nav-item">
				<a href="<?= base_url("warga") ?>" class="nav-link">
					👥 Warga
				</a>
			</li>

			<li class="nav-item dropdown">

				<a class="nav-link dropdown-toggle"
					data-bs-toggle="dropdown"
					href="#">

					📄 Surat

				</a>

				<ul class="dropdown-menu ">

					<li>
						<a class="dropdown-item" href="<?= base_url("surat_keterangan") ?>">
							Surat Keterangan
						</a>
					</li>

					<li>
						<a class="dropdown-item" href="<?= base_url("skd") ?>">
							Surat Keterangan Domisili
						</a>
					</li>

					<li>
						<a class="dropdown-item" href="<?= base_url("sktm") ?>">
							Surat Keterangan Tidak Mampu
						</a>
					</li>

					<li>
						<a class="dropdown-item" href="<?= base_url("sku") ?>">
							Surat Keterangan Usaha
						</a>
					</li>

					<li>
						<a class="dropdown-item" href="<?= base_url("surat_pengantar") ?>">
							Surat Pengantar
						</a>
					</li>

					<li>
						<a class="dropdown-item" href="<?= base_url("spik") ?>">
							Surat Pengantar Izin Keramaian
						</a>
					</li>
				</ul>

			</li>

			<hr class="text-secondary">

			<li class="nav-item">

				<a href="<?= base_url("akun") ?>" class="nav-link">

					⚙️ <?= $this->session->userdata("nama") ?>

				</a>

			</li>

			<li class="nav-item">

				<a href="<?= base_url("logout") ?>" class="nav-link text-danger">

					🚪 Logout

				</a>

			</li>

		</ul>

	</div>

	<div class="content">