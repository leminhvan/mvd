    // Tooltips Initialization
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    

    //cau honh popup thong bao
    function notify(message, type){
        $.growl({
            message: message
        },{
            type: type,
            allow_dismiss: false,
            label: 'Cancel',
            className: 'btn-xs btn-inverse',
            placement: {
                from: 'top',
                align: 'right'
            },
            delay: 2500,
            animate: {
                    enter: 'animated bounceIn',
                    exit: 'animated bounceOut'
            },
            offset: {
                x: 20,
                y: 50
            }
        });
    };


$(document).ready(function(){
    //checkbox trong table
    $('.select_all-menu').change(function() {
        var checkboxes = $(this).closest('table').find(':checkbox');
        checkboxes.prop('checked', $(this).is(':checked'));
    });

    //ham dung de format dinh dang ngay thang
    $.date = function(dateObject, delimiter) {//ham format date
        var d = new Date(dateObject);
        var day = d.getDate();
        var month = d.getMonth() + 1;
        var year = d.getFullYear();
        if (day < 10) {
            day = "0" + day;
        }
        if (month < 10) {
            month = "0" + month;
        }
        var date = day + delimiter + month + delimiter + year;

        return date;
    };

    $(".xoa").click(function(){
        var id = $(this).attr("data-id");
        swal({   
            title: "Chắc chưa?",   
            text: "Không thể phục hồi đấy!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Có, xóa nó đi",   
            cancelButtonText: "Không, có gì đó sai sai",   
            closeOnConfirm: false,   
            closeOnCancel: true, 
        }, function(isConfirm){
            if (isConfirm) { 
                ajax_action(id, "del");
            } 
        });
    });

    $(".detail").click(function(){
        var id = $(this).attr("data-id");
        $(".modal").attr("id", id);
        $(".result").html("<tr><td class=\'text-center\'><i class=\'md-rotate-right md-3x md-spin\' ></i></td></tr>");
        ajax_action(id, "detail");
    });

    //dung trong user
    $(".status").click(function(){
        var id = $(this).attr("data-id");
        var str = id.split("_");
        var status = "Tạm ngừng";
        if(str[1] == 0){status = "Kích hoạt";}
        swal({   
            title: "CẢNH BÁO",   
            text: status +" các hoạt động của tài khoản này?",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "OK",   
            cancelButtonText: "Hủy",   
            closeOnConfirm: false,   
            closeOnCancel: true, 
        }, function(isConfirm){
            if (isConfirm) { 
                ajax_action(id, "deactive");
            } 
        });
    });

    //dung trong hoachat
    $('.dathang').on('change', function () {
        var status = $(this).is( ":checked" );
        var id = $(this).attr("data-id-dathang"); //console.log(id)
        var string = "";
        if(status){
            string = id + "_1";//console.log(string)
        }else{
            string = id+ "_0";//console.log(string)
        }
        ajax_action(string, "dathang");
    });

    //do manh cuâ mat khau
    if ($('#password').length) {
        var options = {};

        options.ui = {
            container: '#pwd-container',
            showVerdictsInsideProgressBar: true,
            viewports: {
                progress: '.pwstrength_viewport_progress'
            }
        };
        options.common = {
            debug: false,
            maxChar: 12,
            minChar:4,
            onLoad: function() {
                $('#messages').text('Start typing password');
            }
        };
        $('#password').pwstrength(options);
    }

    //dung trong hoachat
    $('.sub-menu').on('click', function () {
        var id = $(this).attr("data-id"); //console.log(id)
        id_ = id.split('_');
        var a = $(this).find("input[type=\"checkbox\"]:checked").length;
        if(a > 0){
            $('input[id="'+ id + '"]').val(id_[1] + "_0");
        }else{
            $('input[id="'+ id + '"]').val("");
        }
        
        
    });


   
});
    
$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
            
        }



    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid){
            nextStepWizard.removeClass('disabled').trigger('click');
        }
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});