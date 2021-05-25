

<div class="invoice-box">
    <table>
        <tbody><tr class="top">
            <td colspan="2">
                <table>
                    <tbody><tr>
   
                </tbody></table>
            </td>
        </tr>


        <br/>
        <br/>
        <br/>



        <tr class="heading">
            <td>{{__('text.bill')}}</td>
        </tr>
        <!--inicio for -->
        @foreach($orders as $order)
        <tr class="item">
            <td>{{__('text.seed.name')}}: </td>

            <td>{{$order->name}}</td>
        </tr>

        <tr class="item">
            <td>{{__('text.amount')}}:</td>

            <td>{{$order->amount}}</td>
        </tr>
        <tr class="item">
            <td>{{__('text.seed.price')}}:</td>

            <td>{{$order->price}}</td>
        </tr>
        <tr class="item last">
            <td>{{__('text.total.cost')}}:</td>

            <td>{{$order->price * $order->amount}} </td>
            
        </tr>
        <!--final for -->
        @endforeach

    </tbody></table>
</div>