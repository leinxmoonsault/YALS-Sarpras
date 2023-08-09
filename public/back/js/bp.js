$(document).ready(function (){
    $("#payment-button").on("click", function(e){
        var id_siswa    = jQuery('#id_siswa').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/api/snaptoken',
            type: "POST",
            data : { "id_siswa" : id_siswa},
            cache: false, 
            success: function(data, status) {  
                    snap.pay(data.snap_token, {
                        onSuccess: function(result){
                            console.log(result);
                            /* You may add your own implementation here */
                            var order_id              = result['order_id'];
                            var methode_pembayaran    = result['payment_type'];
                            $.ajax({
                                url : '/api/finaltrans',
                                type : "POST",
                                data : {"id" : order_id, "payment" : methode_pembayaran },
                                chace : false,
                                success : function (result) {
                                    console.log(result);
                                }
                            });
                        },
                        onPending: function(result){
                            /* You may add your own implementation here */
                            console.log(result);
                        },
                        onError: function(result){
                            /* You may add your own implementation here */
                            console.log(result);
                            alert("payment failed!"); 
                        },
                        onClose: function(){
                            /* You may add your own implementation here */
                            console.log(result);
                            alert('you closed the popup without finishing the payment');
                        }
                    });
                    return false;
            }
        });
    });
});