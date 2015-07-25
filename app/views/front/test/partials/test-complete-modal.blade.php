<!-- Modal -->
<div class="modal fade" id="testCompleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="overflow:hidden;">
    <div class="modal-content">
        <div class="modal-header"  style="background:beige;">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h2 class="text-info" id="myModalLabel">Congratulation! Your test has been completed successfully.</h2>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <div>&nbsp;</div>
                    <div>&nbsp;</div>
                    <div>&nbsp;</div>
                    <span class="text-success font18"><strong>Time: <span id="modalTimer">0:14:13</span></strong>
                    </span>
                    <div>&nbsp;</div>
                    <div id="modalStatisticsPart" style="font-size:16px">
                    </div>

                    
                </div>
                <div class="col-md-6">
                    <style type="text/css">canvas{ position: absolute; z-index: 1;  }</style>
                    <div id="modalChartContainer" class="pull-right" style="width:350px;height: 300px;position: relative;font-size:11px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(function(){

})
</script>