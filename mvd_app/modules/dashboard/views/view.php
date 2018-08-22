<div class="mini-charts">
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="mini-charts-item bgm-cyan">
                <div class="clearfix">
                    <div class="chart stats-bar"></div>
                    <div class="count">
                        <small>Online </small>
                        <h2><?php echo $online; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-6 col-md-3">
            <div class="mini-charts-item bgm-lightgreen">
                <div class="clearfix">
                    <div class="chart stats-bar-2"></div>
                    <div class="count">
                        <small>Hôm nay</small>
                        <h2><?php echo $counter[2]; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-6 col-md-3">
            <div class="mini-charts-item bgm-orange">
                <div class="clearfix">
                    <div class="chart stats-line"></div>
                    <div class="count">
                        <small>Tháng này</small>
                        <h2><?php echo $counter[1]; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-6 col-md-3">
            <div class="mini-charts-item bgm-bluegray">
                <div class="clearfix">
                    <div class="chart stats-line-2"></div>
                    <div class="count">
                      <small>Tổng số</small>
                        <h2> <?php echo $counter[0]; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card rating-list">
  <div class="listview">
      <div class="lv-header">
          <div class="m-t-5">
              Thông tin
          </div>
      </div>
 <?php  if($this->ion_auth->is_admin()){ ?>     
      <div class="lv-body">
          <div class="p-15">
              <div class="lv-item">
                  <div class="media">
                      <div class="pull-left">
                          Users 
                      </div>
                      
                      <div class="pull-right"><?php echo $count_users; ?></div>
                      
                      <div class="media-body">
                          <div class="progress">
                              <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              
              <div class="lv-item">
                  <div class="media">
                      <div class="pull-left">
                          Nhóm
                      </div>
                      
                      <div class="pull-right"><?php echo $count_groups; ?></div>
                      
                      <div class="media-body">
                          <div class="progress">
                              <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
 <?php } ?>
             
              <div class="lv-item">
                  <div class="media">
                      <div class="pull-left">
                          Tài liệu tham khảo
                      </div>
                      
                      <div class="pull-right"><?php echo $count_tltk; ?></div>
                      
                      <div class="media-body">
                          <div class="progress">
                              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $count_tltk; ?>" aria-valuemin="0" aria-valuemax="500" style="width: <?php echo $count_tltk*100/500; ?>%">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

          </div>
      </div>
  </div>
</div>
<?php echo $agent; ?>