<form method="post" action="<?=site_url('home/submit-whises/'.$client->client_Id.'/'.url_title($client->client_Name,'-'))?>">
													<div class="guestbook-label">
						
						<?php
                                if(isset($undangan->ivts_Name)){
                                    ?>
						<input type="hidden" value="<?=$undangan->ivts_Id?>" name="ivtsId"/>
						<input type="hidden" value="<?=$undangan->ivts_Address?>" name="ivtsAddress"/>
						
                        <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100 elementor-field-required">
																<label for="form-field-name" class="elementor-field-label"> Nama Anda </label>
																<input size="1" type="text" name="fullname" id="fullname" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="Nama Anda" required="required" value="<?=$undangan->ivts_Name?>" aria-required="true" disabled>
															</div>
															<div class="elementor-field-type-tel elementor-field-group elementor-column elementor-field-group-phone elementor-col-100 elementor-field-required">
																<label for="form-field-phone" class="elementor-field-label"> Nomor WhatsApp </label>
																<input size="1" type="tel" name="phoneNo" id="phoneNo" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="+628123456789" required="required" aria-required="true" value="<?=$undangan->ivts_NoHp?>" pattern="[0-9()#&amp;+*-=.]+" title="Only numbers and phone characters (#, -, *, etc) are accepted.">
															</div>
						<?php
                                }
                                    ?>
									
						<?php
                                if(!isset($undangan->ivts_Name)){
                                    ?>
								<div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100 elementor-field-required">
																<label for="form-field-name" class="elementor-field-label"> Nama Anda </label>
																<input size="1" type="text" name="fullname" id="fullname" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="Nama Anda" required="required" aria-required="true">
															</div>
															<!-- <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100 elementor-field-required">
																<label for="form-field-name" class="elementor-field-label"> Alamat </label>
																<input size="1" type="text" name="ivtsAddress" id="ivtsAddress" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="Alamat" required="required" aria-required="true">
															</div> -->
															<div class="elementor-field-type-tel elementor-field-group elementor-column elementor-field-group-phone elementor-col-100 elementor-field-required">
																<label for="form-field-phone" class="elementor-field-label"> Nomor WhatsApp </label>
																<input size="1" type="tel" name="phoneNo" id="phoneNo" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="+628123456789" required="required" aria-required="true" value="<?=$undangan->ivts_NoHp?>" pattern="[0-9()#&amp;+*-=.]+" title="Only numbers and phone characters (#, -, *, etc) are accepted.">
															</div>
							<?php
                                }
                                    ?>
								<div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-confirmation elementor-col-100">
																<label for="form-field-confirmation" class="elementor-field-label"> Status Konfirmasi </label>
																<div class="elementor-field elementor-select-wrapper remove-before ">
																	<div class="select-caret-down-wrapper">
																		<i aria-hidden="true" class="eicon-caret-down"></i>
																	</div>
																	<select name="isPresent" id="isPresent" class="elementor-field-textual elementor-size-sm" onchange="radioVal()">
																		<option value="1">Ya, Saya akan datang</option>
																		<option value="0">Maaf, Saya tidak dapat datang</option>
																	</select>
																</div>
																</div>
																
															<div id="numberPerson" class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-guests elementor-col-100 elementor-field-required">
																<label for="form-field-guests" class="elementor-field-label"> Jumlah Tamu </label>
																<div class="elementor-field elementor-select-wrapper remove-before ">
																	<div class="select-caret-down-wrapper">
																		<i aria-hidden="true" class="eicon-caret-down"></i>
																	</div>
																	<select name="numberPerson" id="numberPerson" class="elementor-field-textual elementor-size-sm" aria-required="true">
																			<?php
																					if(isset($undangan->ivts_Name)){
																				?>

																				<?php
																				for($i=1;$i<=$undangan->ivts_Guest;$i++){
																					echo '<option value="'.$i.'">'.$i.' Orang</option>';
															  					}
																				?>

																				<?php
																						}else{
																					?>
																					<option value="1">1 Orang</option>
																					<option value="2">2 orang</option>
																				<?php
																						}
																				?>		
																	</select>
																</div>
															</div>
															<!-- <div class="elementor-field-type-textarea elementor-field-group elementor-column elementor-field-group-wish elementor-col-100">
																<label for="form-field-wish" class="elementor-field-label"> Doa & Ucapan </label>
																<textarea class="elementor-field-textual elementor-field  elementor-size-sm" name="message" id="message" rows="4" placeholder="Berikan doa &amp; ucapan anda untuk kedua mempelai"><?=$undangan->ivts_RsvpMessage?></textarea>
															</div> -->
								<div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100 e-form__buttons">
								<button type="submit" class="elementor-button elementor-size-sm elementor-animation-float">
								<span >
															<span class="elementor-align-icon-left elementor-button-icon">
									<i aria-hidden="true" class="fab fa-telegram-plane"></i>																	</span>
																						<span class="elementor-button-text">Kirim Konfirmasi</span>
													</span>
																</button>
                            </div>
                        </div>
													</form>