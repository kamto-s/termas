<div class="container">
	<h5> Tambah Slider</h5>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Caption Slider</label>
            <textarea class="form-control" id="editorku" name="caption_slider" ><?php echo set_value("caption_slider") ?></textarea>
            <span class="small text-danger">
                <?php echo form_error("caption_slider") ?>
            </span>
        </div>
        <div class="mb-3">
            <label>Foto Slider</label>
            <input type="file" name="foto_slider" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-secondary"onclick="history.back();">Kembali</button>

    </form>
</div>