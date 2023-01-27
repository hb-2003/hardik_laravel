@extends('layouts.user.app')

@section('title', 'Change Password')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script type="text/javascript">
//    alert("order placed");
   
        // e.preventDefault();
        // e.preventDefault();
      

        var options = {
            key: "rzp_test_GLXthtWILx5Hk8", // Enter the Key ID generated from the Dashboard
            amount: "{{$carttotal}}" * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            currency: "INR",
            name: " {{$request->billing_name}}",
            description: "Checkout Online Payment",
            image: "https://res.cloudinary.com/dexratgkq/image/upload/v1663236169/loader_2_v13pju.png",
            // order_id: "6394309440c7d50b8ee5d22f", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            handler: function(response) {
                // set the payment information

                //   orderData["payment_information"]["payment_id"] =
                console.log( response.razorpay_payment_id)    ;
                //   orderData["payment_information"]["status"] = "success";

                //   dispatch(CreateOrder(orderData));
                let formData = new FormData();
                formData.append("id",response.razorpay_payment_id);
                formData.append("_token","{{ csrf_token() }}");
                formData.append("total","{{$carttotal}}");
                formData.append("orderid","{{$orderid}}");

                let xml = new XMLHttpRequest();
                xml.open("POST","{{route('user.rezolpay')}}");
                
                xml.onload = () => {
                
                     window.location.href=`/user/order`;
                }

                xml.send(formData);
               
            },
            prefill: {
                name: " {{$request->billing_name}}",
                email: " {{ $request->email}}",
                contact: "{{ $request->customers_telephone}}",
            },
            notes: {
                address: "{{ $request->countery}}"
            },
            theme: {
                color: "#3c1d56",
            },
        };


        const payMentObject = new window.Razorpay(options);
        payMentObject.open();
        payMentObject.on("payment.failed", function(response) {
            alert(response.error.code);
            alert(response.error.description);
            alert(response.error.source);
            alert(response.error.step);
            alert(response.error.reason);
            alert(response.error.metadata.order_id);
            alert(response.error.metadata.payment_id);
        });
    
</script>



@endsection