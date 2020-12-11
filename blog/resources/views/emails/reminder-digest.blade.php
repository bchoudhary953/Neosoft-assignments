@component('mail::message')
# You have order list of today's order

The body of your message.

@component('mail::table')
    |Order ID|User Id|User Name|Total|Payment Method|Order Status|
    |---------|---------|--------|-------|--------------|---------------|
    @foreach($orders as $order)
        |  {{$order['id']}}  |  {{$order['user_id']}}  |    {{$order['name']}}    |       {{$order['grand_total']}}    |      {{$order['payment_method']}}        |         {{$order['order_status']}}       |

    @endforeach
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
