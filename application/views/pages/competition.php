<div style="min-height: 10%">
</div>
<div class="container">
	<div class="row" style="max-height: 70%">
		<div class="col-12">
			<table class="table table-responsive table-bordered table-striped w-100">
				<thead>
					<tr class="bg-info text-white">
						<td>peserta\soal</td>
						<?php $i = 1 ?>
						<?php foreach ($soal as $p): ?>
							<td>Soal <?php echo $i ?></td>
						<?php $i++; endforeach ?>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($peserta as $p): ?>
						<tr>
							<td><?php echo $this->compete_model->get_participants_byID($p->IDparticipants)['nama'] ?></td>
							<?php foreach ($soal as $s): ?>
								<?php $f = $this->compete_model->check_fastest($s->IDsoal)?>
								<?php if ($this->compete_model->check_jawaban_si($p->IDparticipants,$s->IDsoal)!=0): ?>
									<?php if ($this->compete_model->get_jawaban_si($p->IDparticipants,$s->IDsoal)['IDjawaban'] == $f): ?>
										<td class="text-info"><?php echo round((strtotime($this->compete_model->get_jawaban_si($p->IDparticipants,$s->IDsoal)['waktu']) - strtotime($s->waktu))/60,2)." menit" ?></td>
									<?php else: ?>
										<td class="text-success"><?php echo round((strtotime($this->compete_model->get_jawaban_si($p->IDparticipants,$s->IDsoal)['waktu']) - strtotime($s->waktu))/60,2)." menit" ?></td>
									<?php endif ?>
									
								<?php else: ?>
									<td>Belum</td>
								<?php endif ?>
							<?php endforeach ?>
						<?php endforeach ?>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="container-fluid grey lighten-3">
	<div class="row py-3">
		<div class="col-2"></div>
		<div class="col-8">
			<!-- Nav tabs -->
			<div>
			    <ul class="nav classic-tabs blue-gradient" role="tablist" id="akunTab" >
			    	<?php $i = 1 ?>
					<?php foreach ($soal as $p): ?>
						<?php if ($i == 1): ?>
							<li class="nav-item">
					            <a class="nav-link waves-light active" data-toggle="tab" href="#soal<?php echo $i ?>" role="tab"><i class="fa fa-user fa-2x" aria-hidden="true"></i><br>Soal <?php echo $i ?></a>
					        </li>
						<?php else: ?>
							<li class="nav-item">
					            <a class="nav-link waves-light" data-toggle="tab" href="#soal<?php echo $i ?>" role="tab"><i class="fa fa-user fa-2x" aria-hidden="true"></i><br>Soal <?php echo $i ?></a>
					        </li>
						<?php endif ?>
					<?php $i++; endforeach ?>
			    </ul>
			</div>
			
			<!-- Tab panels -->
			<div class="tab-content card" style="padding-top: 0">
				<?php $i = 1 ?>
				<?php foreach ($soal as $p): ?>
					<?php if ($i == 1): ?>
						<div class="tab-pane fade in show active" id="soal<?php echo $i ?>" role="tabpanel">
							<!-- Soal -->
							<div class="my-3">
								<p>Soal <?php echo $i ?></p>
							</div>
							<!-- Soal -->
							
							<?php echo form_open_multipart('compete/');?>
								<div class="row">
									<div class="col-2"></div>
									<div class="btn-group file-field pt-2 col-4">
				                        <label class="btn btn-primary">
				                            <span class="fa fa-upload"></span>
				                            <input type="file" name="userfile">
				                        </label>
				                        <label>
				                            <input class="file-path blue-text" type="text" placeholder=" Upload File Jawaban" [value]="showFiles()">
				                        </label>
				                    </div>
				                    <div class="btn-group file-field pt-2 col-4">
				                        <label class="btn btn-primary">
				                            <span class="fa fa-upload"></span>
				                            <input type="file" name="userfile">
				                        </label>
				                        <label>
				                            <input class="file-path blue-text" type="text" placeholder=" Upload File Algoritma" [value]="showFiles()">
				                        </label>
				                    </div>
								</div>
							</form>
	        			</div>
					<?php else: ?>
						<div class="tab-pane fade" id="soal<?php echo $i ?>" role="tabpanel">
							<!-- Soal -->
							<div class="my-3">
								<p>Soal <?php echo $i ?></p>
							</div>
							<!-- Soal -->
							
							<?php echo form_open_multipart('compete/');?>
								<div class="row">
									<div class="col-2"></div>
									<div class="btn-group file-field pt-2 col-4">
				                        <label class="btn btn-primary">
				                            <span class="fa fa-upload"></span>
				                            <input type="file" name="userfile">
				                        </label>
				                        <label>
				                            <input class="file-path blue-text" type="text" placeholder=" Upload File Jawaban" [value]="showFiles()">
				                        </label>
				                    </div>
				                    <div class="btn-group file-field pt-2 col-4">
				                        <label class="btn btn-primary">
				                            <span class="fa fa-upload"></span>
				                            <input type="file" name="userfile">
				                        </label>
				                        <label>
				                            <input class="file-path blue-text" type="text" placeholder=" Upload File Algoritma" [value]="showFiles()">
				                        </label>
				                    </div>
								</div>
							</form>
	        			</div>
					<?php endif ?>
				<?php $i++; endforeach ?>
			</div>
		</div>
	</div>
</div>