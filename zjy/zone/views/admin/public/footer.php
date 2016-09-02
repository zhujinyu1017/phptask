</div>
<script>
    var type=true;
    $(".div-reorder-fold").click(function(){
        if(type){
            $(this).find("div").removeClass("icon-reorder");
            $(this).find("div").addClass("icon-list");
            $(".common-left").removeClass("left-sidebar-full");
            $(".common-left").addClass("left-sidebar-min");
            type=false;
        }else{
            $(this).find("div").removeClass("icon-list");
            $(this).find("div").addClass("icon-reorder");
            $(".common-left").removeClass("left-sidebar-min");
            $(".common-left").addClass("left-sidebar-full");
            type=true;
        }
    });
    $(".sidebar-title").click(function(){
        if($(this).hasClass("div-icon-fold")){
            $(".icon-title").animate()
            $(this).removeClass("div-icon-fold");
            $(this).next(".sidebar-ul").show();
        }else{
            $(this).addClass("div-icon-fold");
            $(this).next(".sidebar-ul").hide();
        }

    })
</script>
<script src="<?php echo base_url('zone/js/common/jquery.pjax.js'); ?>"></script>
<script>
$("#nickname").click(function(){
	$(".setting-box").toggle();
  });
$(function(){
    $(document).pjax('.common-left a', '#pjax-containerRight', {fragment:'#pjax-containerRight', timeout:5000});
})
</script>
</body>
</html>