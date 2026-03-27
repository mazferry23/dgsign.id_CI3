<div class="row state-overview">
                  <div class="col-lg-4 col-sm-6">
                      <section class="card">
                          <div class="symbol terques">
                              <i class="fa fa-user"></i>
                          </div>
                          <div class="value">
                              <h1 class="count"><?=$client?></h1>
                              <p>Client</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-4 col-sm-6">
                      <section class="card">
                          <div class="symbol red">
                              <i class="fa fa-comments"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count2"><?=$rsvp?></h1>
                              <p>RSVP</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-4 col-sm-6">
                      <section class="card">
                          <div class="symbol yellow">
                              <i class="fa fa-inbox"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count3"><?=$invitations?></h1>
                              <p>Undangan</p>
                          </div>
                      </section>
                  </div>
              </div>
              <script>
                localStorage.removeItem('dataStok')
              </script>
