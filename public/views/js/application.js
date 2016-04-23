/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){

    var adicional = 40;
    var box_info_height = $("#box-info").height() + adicional;
    var box_cadastro_height = $("#box-cadastro").height() + adicional;
    
    if (box_info_height > box_cadastro_height) {
        $("#box-cadastro").css("height", box_info_height);
        $("#box-info").css("height", box_info_height);
    } else {
        $("#box-info").css("height", box_cadastro_height);
        $("#box-cadastro").css("height", box_cadastro_height);
    }
        
    $('.btn-radio, img').click(function(e) {
        
        var time_id = $(this).parent().attr("id");
        $("#time_id").val(time_id);                
        
        $('.btn-radio').not(this).removeClass('active btn-success').siblings('input').prop('checked',false).siblings('.img-radio').css('opacity','0.5');
    	$(this).addClass('active btn-success').siblings('input').prop('checked',true).siblings('.img-radio').css('opacity','1');
        
    });
        
});

