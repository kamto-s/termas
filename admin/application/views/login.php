<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Termas</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

	<style>
		body {
			background: url('<?php echo base_url("../assets/logo/balaidesa.jpeg"); ?>') no-repeat center center fixed;
			background-size: cover;
		}

		.overlay {
			background: rgba(0, 0, 0, 0.35);
			min-height: 100vh;
		}

		.login-card {
			border: none;
			border-radius: 10px;
		}

		.logo {
			width: 80px;
		}
	</style>

</head>

<body>

	<div class="overlay">

		<div class="container">

			<div class="row justify-content-center align-items-center" style="min-height:100vh;">

				<div class="col-md-4">

					<div class="card shadow-lg login-card">

						<div class="card-body p-4">

							<div class="text-center mb-4">

								<img src="<?php echo base_url("../assets/logo/logo.png"); ?>" class="logo mb-3">

								<h4 class="fw-bold mb-1">
									Admin Desa Termas
								</h4>

								<small class="text-muted">
									Silakan login untuk melanjutkan
								</small>

							</div>

							<form method="post">

								<div class="mb-3">

									<label class="form-label">
										Username
									</label>

									<input type="text"
										name="username"
										class="form-control"
										value="<?php echo set_value('username') ?>">

									<div class="text-danger small">
										<?php echo form_error("username") ?>
									</div>

								</div>

								<div class="mb-4">

									<label class="form-label">
										Password
									</label>

									<input type="password"
										name="password"
										class="form-control">

									<div class="text-danger small">
										<?php echo form_error("password") ?>
									</div>

								</div>

								<button class="btn btn-primary w-100">
									Login
								</button>

							</form>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<?php if ($this->session->flashdata('pesan_sukses')): ?>
		<script>
			swal("Sukses!", "<?php echo $this->session->flashdata('pesan_sukses'); ?>", "success");
		</script>
	<?php endif; ?>

	<?php if ($this->session->flashdata('pesan_gagal')): ?>
		<script>
			swal("Gagal!", "<?php echo $this->session->flashdata('pesan_gagal'); ?>", "error");
		</script>
	<?php endif; ?>

</body>

</html>