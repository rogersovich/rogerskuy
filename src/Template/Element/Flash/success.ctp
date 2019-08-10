<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<!-- <div class="message success" onclick="this.classList.add('hidden')"><?= $message ?></div> -->

<script>

	Swal.fire({
	  title: 'Successed',
	  text: '<?= $message?>',
	  type: 'success',
	  confirmButtonText: 'Sure'
	})
</script>