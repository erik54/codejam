<head>
	<title>competition</title>
</head>
<table border="1">
	<tr>
		<td>peserta\soal</td>
		<?php $i = 1 ?>
		<?php foreach ($soal as $p): ?>
			<td><?php echo $i ?></td>
		<?php $i++; endforeach ?>
	</tr>
	
	<?php foreach ($peserta as $p): ?>
	<tr>
		<td><?php echo $this->compete_model->get_participants_byID($p->IDparticipants)['nama'] ?></td>
		<?php foreach ($soal as $s): ?>
			<?php $f = $this->compete_model->check_fastest($s->IDsoal)?>
			<?php if ($this->compete_model->check_jawaban_si($p->IDparticipants,$s->IDsoal)!=0): ?>
				<?php if ($this->compete_model->get_jawaban_si($p->IDparticipants,$s->IDsoal)['IDjawaban'] == $f): ?>
					<td style="color: blue"><?php echo round((strtotime($this->compete_model->get_jawaban_si($p->IDparticipants,$s->IDsoal)['waktu']) - strtotime($s->waktu))/60,2)." menit" ?></td>
				<?php else: ?>
					<td style="color: green"><?php echo round((strtotime($this->compete_model->get_jawaban_si($p->IDparticipants,$s->IDsoal)['waktu']) - strtotime($s->waktu))/60,2)." menit" ?></td>
				<?php endif ?>
				
			<?php else: ?>
				<td>Belum</td>
			<?php endif ?>
		<?php endforeach ?>
	<?php endforeach ?>
	</tr>
</table>