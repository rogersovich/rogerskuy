<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<!-- <div class="message error" onclick="this.classList.add('hidden');"><?= $message ?></div> -->

<script>

	Swal.fire({
	  title: 'Ooopss',
	  text: '<?= $message?>',
	  type: 'error',
	  confirmButtonText: 'Sure'
	})
</script>
