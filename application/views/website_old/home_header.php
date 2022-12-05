<div class="modal fade" id="modal-container-15671" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width:auto">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove"></i></button>
                  <h4 class="modal-title text-center" id="myModalLabel">
                      Schedule
                  </h4>
              </div>
              <div class="modal-body">
                  <div class="table-responsive">
						<table id="schedule" class="table table-bordered table-striped">
                            <thead>
								<tr style="font-weight:bold">
									<th>Day</th>
									<th>After Fajir</th>
									<th>Before Zohar</th>
									<th>After Zohar</th>
									<th>Before Asar</th>
									<th>After Asar</th>
									<th>After Majrib</th>
									<th>After Isha</th>
									<th>Before Fajir</th>
								</tr>
                            </thead>
                            <tbody>
                                <?php
								foreach ($schedule as $schedules): ?>
                                    <tr>
                                        <td><?= $schedules->day; ?></td>
										<td><?= $schedules->afterFajir; ?></td>
										<td><?= $schedules->beforeZohar; ?></td>
										<td><?= $schedules->afterZohar; ?></td>
										<td><?= $schedules->beforeAsar; ?></td>
										<td><?= $schedules->afterAsar; ?></td>
										<td><?= $schedules->afterMajrib; ?></td>
										<td><?= $schedules->afterInsha; ?></td>
										<td><?= $schedules->beforeFajir; ?></td>
									</tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
				  </div>
              </div>
          </div>
      </div>
  </div>

<div class="modal fade" id="modal-container-156711" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width:auto">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove"></i></button>
                  <h4 class="modal-title text-center" id="myModalLabel">
                      SUPPORT
                  </h4>
              </div>
              <div class="modal-body">
                 <!-- <h4 class="text-center">SUPPORT POPPUP</h4>
                  <p class="text-center">We possess within us two minds far I have written only two minds of the conscious mind possess within us two minds far I have written.</p>-->
                	
<div class="">
<form id="support_sendEmail" class="contact-form" name="support_sendEmail" method="post" name="contact-form">
<div class="row">
<div class="col-sm-12"><input name="name" placeholder="Name*" required="" type="text" /></div>

<div class="col-sm-12"><input name="email" placeholder="Email*" required="" type="email" /></div>

<div class="col-sm-12"><input name="sub" placeholder="Subject*" required="" type="text" /></div>

<div class="col-sm-12"><textarea cols="30" name="msg" placeholder="Message*" required="" rows="7"></textarea></div>

<div class="col-sm-12"><input class="btn btn-send" name="submit" type="submit" value="Send Message" /></div>
</div>
</form>
</div>
			
              </div>
          </div>
      </div>
  </div>
  
  <script type="text/javascript">
    window.onload = function () {
        document.support_sendEmail.action = get_action();
    }

    function get_action() {
        return '<?= base_url(); ?>Home/support_sendEmail';
    }
</script>
