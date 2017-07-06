/**
 * Created by takdemir on 06.07.2017.
 */


var product={
    getServices: function () {
        var categoryId=$('#categories').val();
        if(!isNaN(categoryId)) {
            var data = {'categoryId': categoryId}

            $.ajax({
                url: "/ajaxservice/getservices",
                type: "POST",
                data: JSON.stringify(data),
                dataType: "json",
                beforeSend: function (a) {

                },
                error: function (a, b, c) {
                    console.log(a.responseText);
                },
                success: function (response) {
                    if (!response.hasError) {
                        var option="";
                        $.each(response.response, function (k,v) {
                            option+="<option value='"+v.id+"'>"+v.serviceName+"</option>";
                        });
                        $('#form_services').html('');
                        $('#form_services').html(option);

                    } else {
                        alert('Ekleme başarısız oldu. Lütfen tekrar deneyiniz!');
                    }
                }
            });
        }else{
            alert('Kategori bilgisi bulunamadı!');
        }
    }
}